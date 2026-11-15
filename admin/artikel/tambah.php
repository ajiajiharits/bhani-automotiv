<?php

/** @var mysqli $conn */
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $status = $_POST['status'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $gambarBaru = time() . '_' . $gambar;
    $folder = "../uploads/artikel/";

    move_uploaded_file(
        $tmp,
        $folder . $gambarBaru
    );

    $stmt = $conn->prepare(

        "INSERT INTO artikel

(
judul,
gambar,
isi,
status
)

VALUES
(?,?,?,?)

"
    );

    $stmt->bind_param(

        "ssss",
        $judul,
        $gambarBaru,
        $isi,
        $status

    );

    if ($stmt->execute()) {

        echo "

        <script>
        alert('Artikel berhasil ditambahkan');
        window.location='dashboard.php?page=artikel';
        </script>
        
        ";
    }
}

?>

<div class="page-header">
    <h1>
        Tambah Artikel
    </h1>
</div>

<div class="form-box">
    <form method="POST" enctype="multipart/form-data">

        <label>
            Judul Artikel
        </label>

        <input
            type="text"
            name="judul"
            required>

        <label>
            Gambar
        </label>


        <input
            type="file"
            name="gambar"
            accept="image/*"
            required>

        <label>
            Isi Artikel
        </label>

        <textarea
            name="isi"
            rows="8"
            required></textarea>

        <label>
            Status
        </label>

        <select name="status">
            <option value="Publish">
                Publish
            </option>

            <option value="Draft">
                Draft
            </option>

        </select>

        <button name="submit">
            <i class="fa-solid fa-save"></i>
            Simpan Artikel
        </button>
    </form>
</div>