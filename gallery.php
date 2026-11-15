<?php
include "config/database.php";

$queryGallery = mysqli_query(
  $conn,
  "
SELECT * FROM gallery
ORDER BY id_gallery DESC
"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery — Bhani Automotiv</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
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
      <button class="nav-toggle" aria-label="Buka menu" aria-expanded="false">&#9776;</button>
      <ul class="nav-links">
        <li><a href="index.php" data-page="index.php">HOME</a></li>
        <li><a href="about.php" data-page="about.php">ABOUT</a></li>
        <li class="has-dropdown"><a href="#">SERVICES</a>
          <ul class="dropdown">
            <li><a href="jual-mobil.php">Jual Mobil</a></li>
            <li><a href="beli-mobil.php">Beli Mobil</a></li>
          </ul>
        </li>
        <li><a href="gallery.php" data-page="gallery.php" class="active">GALLERY</a></li>
        <li><a href="artikel.php" data-page="artikel.php">ARTICLE</a></li>
        <li><a href="contact.php" data-page="contact.php">CONTACT</a></li>
      </ul>
    </nav>
  </header>
  <div class="m-stripe"></div>

  <section class="service-hero fade-up">
    <img
      src="img/showroom2.jpg"
      alt="Gallery Bhani Automotiv"
      class="service-hero-img">
    <div class="service-overlay"></div>

    <div class="container">

      <div class="service-hero-content">
        <span class="eyebrow">
          Gallery
        </span>
        <h1>
          Showroom & Koleksi Kendaraan Premium
        </h1>
        <p>
          Jelajahi koleksi kendaraan pilihan Bhani Automotiv,
          mulai dari sport car, SUV, luxury car,
          hingga supercar dengan kualitas terbaik.
        </p>
      </div>

    </div>
  </section>

  <hr class="divider fade-up">

  <section>
    <div class="container">
      <div class="gallery-grid fade-up">

        <?php
        while ($gallery = mysqli_fetch_assoc($queryGallery)) {
        ?>

          <div
            class="gallery-item"
            data-title="<?php echo $gallery['judul']; ?>"
            data-desc="<?php echo $gallery['deskripsi']; ?>">

            <img
              src="uploads/gallery/<?php echo $gallery['gambar']; ?>"
              alt="<?php echo $gallery['judul']; ?>">

            <span class="g-label">

              <?php echo $gallery['judul']; ?>

            </span>
          </div>

        <?php } ?>

      </div>
    </div>
  </section>

  <div id="lightbox" class="lightbox">
    <button class="lightbox-close" aria-label="Tutup">&times;</button>
    <div class="lightbox-box"></div>
  </div>

  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div>
          <span class="brand">Bhani Automotiv</span>
          <p>Showroom kendaraan premium terpercaya yang menghadirkan koleksi sport car, SUV, luxury car, dan supercar pilihan dengan proses transaksi aman dan profesional.</p>
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

  <a class="wa-float" data-wa-message="Halo Bhani Automotiv, saya ingin bertanya mengenai kendaraan premium." aria-label="Chat WhatsApp">
    <svg viewBox="0 0 32 32" fill="#08130d" xmlns="http://www.w3.org/2000/svg">
      <path d="M16 3C9 3 3.3 8.6 3.3 15.5c0 2.4.7 4.6 1.9 6.5L3 29l7.2-2.1c1.8 1 3.9 1.5 5.8 1.5 7 0 12.7-5.6 12.7-12.5S23 3 16 3zm0 22.7c-1.9 0-3.7-.5-5.3-1.5l-.4-.2-4.3 1.3 1.3-4.1-.2-.4c-1.1-1.7-1.7-3.7-1.7-5.8C5.4 9.7 10.2 5 16 5s10.6 4.7 10.6 10.5S21.8 25.7 16 25.7zm5.8-7.9c-.3-.2-1.9-.9-2.1-1-.3-.1-.5-.2-.7.2s-.8 1-1 1.2-.4.2-.7.1c-.3-.2-1.4-.5-2.6-1.6-1-.9-1.6-2-1.8-2.3-.2-.3 0-.5.1-.7.1-.1.3-.4.5-.5.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5s-.7-1.6-.9-2.2c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1 2.8 1.2 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.5-.1 1.7-.7 1.9-1.3.2-.6.2-1.2.2-1.3-.1-.1-.3-.2-.6-.3z" />
    </svg>
  </a>

  <script src="assets/js/script.js"></script>
</body>

</html>