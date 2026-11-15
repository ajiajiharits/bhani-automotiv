<?php

/** @var mysqli $conn */

if (!isset($_GET['id'])) {

    echo "ID gallery tidak ditemukan";
    exit;
}


$id = $_GET['id'];




// ambil data lama

$query = mysqli_query(

    $conn,

    "
    SELECT * FROM gallery
    WHERE id_gallery='$id'
    "

);


$gallery = mysqli_fetch_assoc($query);



if (!$gallery) {

    echo "Data gallery tidak ditemukan";
    exit;
}




// proses update

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambarBaru = $gallery['gambar'];

    if ($_FILES['gambar']['name'] != "") {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $gambarBaru = time() . '_' . $gambar;
        $folder = __DIR__ . "/../../uploads/gallery/";

        move_uploaded_file(
            $tmp,
            $folder . $gambarBaru

        );

        if (file_exists($folder . $gallery['gambar'])) {
            unlink(
                $folder . $gallery['gambar']

            );
        }
    }

    $stmt = $conn->prepare(

        "
        UPDATE gallery SET

        judul=?,
        gambar=?,
        deskripsi=?
        WHERE id_gallery=?

        "
    );

    $stmt->bind_param(
        "sssi",
        $judul,
        $gambarBaru,
        $deskripsi,
        $id

    );

    if ($stmt->execute()) {
        echo "
        <script>
        alert('Gallery berhasil diperbarui');
        window.location='dashboard.php?page=gallery';
        </script>

        ";

        exit;
    }
}

?>

<div class="page-header">
    <div>
        <h1>
            Edit Gallery
        </h1>

        <p>
            Perbarui foto showroom Bhani Automotiv.
        </p>
    </div>
</div>

<div class="form-box">
    <form method="POST"
        enctype="multipart/form-data">

        <label>
            Judul Gallery
        </label>

        <input
            type="text"
            name="judul"
            value="<?= $gallery['judul']; ?>"
            required>

        <label>
            Deskripsi
        </label>

        <textarea
            name="deskripsi"
            rows="5"><?= $gallery['deskripsi']; ?></textarea>

        <label>
            Gambar Saat Ini
        </label>

        <img

            src="uploads/gallery/<?= $gallery['gambar']; ?>"

            style="
width:250px;
height:160px;
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

        <button
            type="submit"
            name="submit"
            class="btn">
            <i class="fa-solid fa-save"></i>
            Update Gallery
        </button>

        <a
            href="dashboard.php?page=gallery"
            class="btn">
            Kembali
        </a>
    </form>
</div>