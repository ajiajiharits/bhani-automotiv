<?php

/** @var mysqli $conn */

if (isset($_POST['submit'])) {

    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $gambarBaru = time() . '_' . $gambar;
    $folder = __DIR__ . "/../../uploads/gallery/";



    move_uploaded_file(
        $tmp,
        $folder . $gambarBaru
    );



    $stmt = $conn->prepare(

        "INSERT INTO gallery

(
judul,
gambar,
deskripsi
)

VALUES
(?,?,?)"

    );

    $stmt->bind_param(

        "sss",
        $judul,
        $gambarBaru,
        $deskripsi

    );


    if ($stmt->execute()) {


        echo "

        <script>
        alert('Gallery berhasil ditambahkan');
        window.location='dashboard.php?page=gallery';
        </script>
        ";
    }
}

?>

<div class="page-header">

    <h1>
        Tambah Gallery
    </h1>

</div>

<div class="form-box">
    <form method="POST"
        enctype="multipart/form-data">

        <label>
            Judul
        </label>


        <input
            type="text"
            name="judul"
            required>

        <label>
            Deskripsi
        </label>

        <textarea
            name="deskripsi"></textarea>

        <label>
            Gambar
        </label>

        <input
            type="file"
            name="gambar"
            accept="image/*"
            required>

        <button
            name="submit"
            class="btn">
            Simpan
        </button>

    </form>

</div>