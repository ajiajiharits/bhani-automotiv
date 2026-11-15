<?php

/** @var mysqli $conn */

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID tidak ditemukan";
    exit;
}

$query = mysqli_query(
    $conn,
    "
    SELECT * FROM mobil
    WHERE id_mobil='$id'"
);

$mobil = mysqli_fetch_assoc($query);

if (!$mobil) {

    echo "Data mobil tidak ditemukan";
    exit;
}

if (isset($_POST['submit'])) {

    $nama = $_POST['nama_mobil'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $tahun = $_POST['tahun'];
    $mesin = $_POST['mesin'];
    $transmisi = $_POST['transmisi'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];
    $gambarBaru = $mobil['gambar'];

    if ($_FILES['gambar']['name'] != "") {

        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $gambarBaru = time() . '_' . $gambar;
        $folder = $_SERVER['DOCUMENT_ROOT'] . "/Bhani-Automotiv/uploads/mobil/";

        move_uploaded_file(
            $tmp,
            $folder . $gambarBaru
        );

        if (
            file_exists(
                $folder . $mobil['gambar']
            )
        ) {

            unlink(
                $folder . $mobil['gambar']
            );
        }
    }

    $stmt = $conn->prepare(
        "
        UPDATE mobil SET

        nama_mobil=?,
        kategori=?,
        harga=?,
        tahun=?,
        mesin=?,
        transmisi=?,
        deskripsi=?,
        gambar=?,
        status=?

        WHERE id_mobil=?
        "

    );

    $stmt->bind_param(

        "ssiisssssi",

        $nama,
        $kategori,
        $harga,
        $tahun,
        $mesin,
        $transmisi,
        $deskripsi,
        $gambarBaru,
        $status,
        $id

    );

    if ($stmt->execute()) {

        echo "
        <script>
        alert('Data mobil berhasil diperbarui');
        window.location='dashboard.php?page=mobil';
        </script>
        ";

        exit;
    }
}

?>

<div class="page-header">
    <div>
        <h1>
            Edit Mobil
        </h1>
        <p>
            Perbarui data kendaraan Bhani Automotiv.
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
            value="<?= $mobil['nama_mobil']; ?>"
            required>

        <label>
            Kategori
        </label>

        <select name="kategori">
            <option value="Sport"
                <?= $mobil['kategori'] == "Sport" ? 'selected' : '' ?>>
                Sport
            </option>

            <option value="SUV"
                <?= $mobil['kategori'] == "SUV" ? 'selected' : '' ?>>
                SUV
            </option>

            <option value="Luxury"
                <?= $mobil['kategori'] == "Luxury" ? 'selected' : '' ?>>
                Luxury
            </option>

            <option value="Supercar"
                <?= $mobil['kategori'] == "Supercar" ? 'selected' : '' ?>>
                Supercar
            </option>
        </select>

        <label>
            Harga
        </label>

        <input
            type="number"
            name="harga"
            value="<?= $mobil['harga']; ?>"
            required>

        <label>
            Tahun
        </label>

        <input
            type="number"
            name="tahun"
            value="<?= $mobil['tahun']; ?>"
            required>

        <label>
            Mesin
        </label>

        <input
            type="text"
            name="mesin"
            value="<?= $mobil['mesin']; ?>">

        <label>
            Transmisi
        </label>

        <input
            type="text"
            name="transmisi"
            value="<?= $mobil['transmisi']; ?>">

        <label>
            Deskripsi
        </label>

        <textarea
            name="deskripsi"
            rows="5"><?= $mobil['deskripsi']; ?></textarea>

        <label>
            Gambar Saat Ini
        </label>

        <img
            src="uploads/mobil/<?= $mobil['gambar']; ?>"
            style="
            width:200px;
            height:130px;
            object-fit:cover;
            margin-bottom:15px;
            ">

        <label>
            Ganti Gambar (Opsional)
        </label>

        <input
            type="file"
            name="gambar"
            accept="image/*">

        <label>
            Status
        </label>

        <select name="status">
            <option value="Available"
                <?= $mobil['status'] == "Available" ? 'selected' : '' ?>>
                Available
            </option>

            <option value="Sold"
                <?= $mobil['status'] == "Sold" ? 'selected' : '' ?>>
                Sold
            </option>
        </select>

        <button
            name="submit"
            type="submit"
            class="btn">
            <i class="fa-solid fa-save"></i>
            Update Mobil
        </button>

        <a
            href="dashboard.php?page=mobil"
            class="btn">
            Kembali
        </a>

    </form>

</div>