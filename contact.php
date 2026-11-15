<?php
include "config/database.php";

if (isset($_POST['submit'])) {

  $nama = htmlspecialchars($_POST['nama']);

  $email = htmlspecialchars($_POST['email']);

  $telepon = htmlspecialchars($_POST['telepon']);

  $pesan = htmlspecialchars($_POST['pesan']);
  if (
    empty($nama) ||
    empty($email) ||
    empty($telepon) ||
    empty($pesan)
  ) {

    die("Semua data wajib diisi.");
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email tidak valid");
  }

  $stmt = $conn->prepare(
    "INSERT INTO contact
        (
        nama,
        email,
        telepon,
        pesan
        )
        VALUES
        (?,?,?,?)"
  );

  $stmt->bind_param(
    "ssss",
    $nama,
    $email,
    $telepon,
    $pesan
  );

  if ($stmt->execute()) {

    header(
      "Location: contact.php?success=1"
    );

    exit;
  }
}

?>

<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact — Bhani Automotiv</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body>
  <header class="site-header">
    <nav class="navbar">
      <a href="index.php" class="brand">
        <img src="img/logo.png"
          class="logo-img">
        <span>
          BHANI AUTOMOTIV
        </span>
      </a>
      <button class="nav-toggle" aria-label="Buka menu" aria-expanded="false">
        &#9776;
      </button>
      <ul class="nav-links">
        <li><a href="index.php" data-page="index.php">HOME</a></li>
        <li><a href="about.php" data-page="about.php">ABOUT</a></li>
        <li class="has-dropdown">
          <a href="#">SERVICES</a>
          <ul class="dropdown">
            <li><a href="jual-mobil.php">Jual Mobil</a></li>
            <li><a href="beli-mobil.php">Beli Mobil</a></li>
          </ul>
        </li>
        <li><a href="gallery.php" data-page="gallery.php">GALLERY</a></li>
        <li><a href="artikel.php" data-page="artikel.php">ARTICLE</a></li>
        <li><a href="contact.php" data-page="contact.php" class="active">CONTACT</a></li>
      </ul>
    </nav>
  </header>
  <div class="m-stripe"></div>

  <section class="service-hero fade-up">

    <img
      src="img/showroomoffice.jpg"
      alt="Contact Bhani Automotiv"
      class="service-hero-img">
    <div class="about-overlay"></div>

    <div class="container">

      <div class="service-hero-content">
        <span class="eyebrow">
          Contact
        </span>
        <h1>
          Hubungi Bhani Automotiv
        </h1>
        <p>
          Konsultasikan kebutuhan kendaraan premium Anda
          bersama tim profesional kami.
          Kami siap membantu proses pembelian,
          penjualan, dan informasi kendaraan pilihan.
        </p>
      </div>

    </div>
  </section>

  <hr class="divider fade-up">

  <section class="fade-up">
    <div class="container contact-grid">
      <div>
        <h2>Informasi Showroom</h2>
        <div class="info-row">
          <span class="label">Alamat</span><span>Jl. Sudirman Kav. 45, Jakarta Selatan, DKI Jakarta</span>
        </div>
        <div class="info-row">
          <span class="label">Telepon</span><span>+62 812-3456-7890</span>
        </div>
        <div class="info-row">
          <span class="label">Email</span><span>info@bhaniautomotiv.co.id</span>
        </div>
        <div class="info-row">
          <span class="label">Jam Buka</span><span>Senin – Sabtu, 09.00 – 18.00 WIB</span>
        </div>
        <iframe
          class="map-frame"
          loading="lazy"
          title="Lokasi Showroom Bhani Automotiv"
          src="https://www.google.com/maps?q=Jl.+Jenderal+Sudirman,+Jakarta+Selatan&output=embed"></iframe>
      </div>

      <div>
        <h2>Kirim Pesan</h2>

        <?php if (isset($_GET['success'])) { ?>
          <div class="form-success show">
            Terima kasih, pesan Anda telah terkirim.
            Tim Bhani Automotiv akan segera menghubungi Anda.
          </div>
        <?php } ?>

        <form method="POST" id="contact-form" class="form-grid">
          <div class="field">
            <label for="c-nama">Nama Lengkap</label>
            <input type="text" name="nama" id="c-nama" required />
            <span class="error-msg">Nama wajib diisi.</span>
          </div>
          <div class="field">
            <label for="c-email">Email</label>
            <input type="email" name="email" id="c-email" required />
            <span class="error-msg">Masukkan alamat email yang valid.</span>
          </div>
          <div class="field">
            <label for="c-telepon">Nomor Telepon</label>
            <input type="tel" name="telepon" id="c-telepon" required />
            <span class="error-msg">Masukkan nomor telepon yang valid.</span>
          </div>
          <div class="field">
            <label for="c-pesan">Pesan</label>
            <textarea name="pesan" id="c-pesan" required></textarea>
            <span class="error-msg">Pesan wajib diisi.</span>
          </div>
          <button name="submit" type="submit" class="btn btn-accent btn-block">
            Kirim Pesan
          </button>
        </form>
      </div>
    </div>
  </section>

  <footer class="site-footer fade-up">
    <div class="container">
      <div class="footer-grid">
        <div>
          <span class="brand">Bhani Automotiv</span>
          <p>
            Showroom kendaraan premium terpercaya yang menghadirkan
            koleksi sport car, SUV, luxury car, dan supercar pilihan
            dengan pelayanan profesional.
          </p>
        </div>
        <div>
          <h4>Navigasi</h4>
          <ul>
            <li><a href="about.php">About</a></li>
            <li><a href="jual-mobil.php">Jual Mobil</a></li>
            <li><a href="beli-mobil.php">Beli Mobil</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="artikel.php">Article</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
        <div>
          <h4>Showroom</h4>
          <ul>
            <li>Jl. Sudirman Kav. 45, Jakarta Selatan</li>
            <li>Senin – Sabtu, 09.00 – 18.00</li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <span>&copy; 2026 Bhani Automotiv.</span>
      </div>
    </div>
  </footer>

  <a
    class="wa-float"
    data-wa-message="Halo Bhani Automotiv, saya ingin bertanya mengenai kendaraan premium."
    aria-label="Chat WhatsApp">
    <svg
      viewBox="0 0 32 32"
      fill="#08130d"
      xmlns="http://www.w3.org/2000/svg">
      <path
        d="M16 3C9 3 3.3 8.6 3.3 15.5c0 2.4.7 4.6 1.9 6.5L3 29l7.2-2.1c1.8 1 3.9 1.5 5.8 1.5 7 0 12.7-5.6 12.7-12.5S23 3 16 3zm0 22.7c-1.9 0-3.7-.5-5.3-1.5l-.4-.2-4.3 1.3 1.3-4.1-.2-.4c-1.1-1.7-1.7-3.7-1.7-5.8C5.4 9.7 10.2 5 16 5s10.6 4.7 10.6 10.5S21.8 25.7 16 25.7zm5.8-7.9c-.3-.2-1.9-.9-2.1-1-.3-.1-.5-.2-.7.2s-.8 1-1 1.2-.4.2-.7.1c-.3-.2-1.4-.5-2.6-1.6-1-.9-1.6-2-1.8-2.3-.2-.3 0-.5.1-.7.1-.1.3-.4.5-.5.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5s-.7-1.6-.9-2.2c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1 2.8 1.2 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.5-.1 1.7-.7 1.9-1.3.2-.6.2-1.2.2-1.3-.1-.1-.3-.2-.6-.3z" />
    </svg>
  </a>

  <script src="assets/js/script.js"></script>
</body>

</html>