<?php

/** @var mysqli $conn */

if (isset($_POST['submit'])) {

    $nama = $_POST['nama_mobil'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $tahun = $_POST['tahun'];
    $mesin = $_POST['mesin'];
    $transmisi = $_POST['transmisi'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $gambarBaru = time() . '_' . $gambar;
    $folder = __DIR__ . "/../../uploads/mobil/";

    if (move_uploaded_file(
        $tmp,
        $folder . $gambarBaru
    )) {
    } else {

        die("Upload gambar gagal");
    }

    $stmt = $conn->prepare(
        "INSERT INTO mobil
        (
        nama_mobil,
        kategori,
        harga,
        tahun,
        mesin,
        transmisi,
        deskripsi,
        gambar,
        status
        )

        VALUES
        (?,?,?,?,?,?,?,?,?)"
    );

    $stmt->bind_param(
        "ssiisssss",
        $nama,
        $kategori,
        $harga,
        $tahun,
        $mesin,
        $transmisi,
        $deskripsi,
        $gambarBaru,
        $status

    );

    if ($stmt->execute()) {
        echo "
        <script>
        alert('Data mobil berhasil ditambahkan');
        window.location='dashboard.php?page=mobil';
        </script>";
    }
}

?>

<div class="page-header">
    <div>
        <h1>
            Tambah Mobil
        </h1>
        <p>
            Tambahkan koleksi kendaraan baru Bhani Automotiv.
        </p>
    </div>
</div>

<div class="form-box">
    <form method="POST" enctype="multipart/form-data">
        <label>
            Nama Mobil
        </label>
        <input
            type="text"
            name="nama_mobil"
            required>
        <label>
            Kategori
        </label>
        <select name="kategori">
            <option value="Sport">
                Sport
            </option>
            <option value="SUV">
                SUV
            </option>
            <option value="Luxury">
                Luxury
            </option>
            <option value="Supercar">
                Supercar
            </option>
        </select>
        <label>
            Harga
        </label>
        <input
            type="number"
            name="harga"
            required>
        <label>
            Tahun
        </label>
        <input
            type="number"
            name="tahun"
            required>
        <label>
            Mesin
        </label>
        <input
            type="text"
            name="mesin">
        <label>
            Transmisi
        </label>
        <input
            type="text"
            name="transmisi">
        <label>
            Deskripsi
        </label>
        <textarea
            name="deskripsi"
            rows="5"></textarea>
        <label>
            Gambar Mobil
        </label>
        <input
            type="file"
            name="gambar"
            accept="image/*"
            required>
        <label>
            Status
        </label>

        <select name="status">
            <option value="Available">
                Available
            </option>
            <option value="Sold">
                Sold
            </option>
        </select>

        <button
            name="submit"
            type="submit">
            <i class="fa-solid fa-save"></i>
            Simpan Mobil
        </button>

        <a href="dashboard.php?page=mobil" class="btn" style="margin-left:10px">Kembali</a>

    </form>

</div>