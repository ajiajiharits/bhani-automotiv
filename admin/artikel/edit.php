<?php

/** @var mysqli $conn */
$id = $_GET['id'];

$data = mysqli_query(

    $conn,
    "SELECT * FROM artikel WHERE id_artikel='$id'"

);

$artikel = mysqli_fetch_assoc($data);

if (isset($_POST['submit'])) {


    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $status = $_POST['status'];

    if ($_FILES['gambar']['name']) {


        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $gambarBaru = time() . '_' . $gambar;


        move_uploaded_file(

            $tmp,

            "../uploads/artikel/" . $gambarBaru

        );

        mysqli_query(

            $conn,

            "
UPDATE artikel SET

judul='$judul',
gambar='$gambarBaru',
isi='$isi',
status='$status'

WHERE id_artikel='$id'

"

        );
    } else {


        mysqli_query(

            $conn,

            "
UPDATE artikel SET

judul='$judul',
isi='$isi',
status='$status'

WHERE id_artikel='$id'

"

        );
    }

    echo "

<script>
alert('Artikel berhasil diperbarui');
window.location='dashboard.php?page=artikel';
</script>

";
}

?>

<div class="page-header">
    <h1>
        Edit Artikel
    </h1>
</div>

<div class="form-box">
    <form method="POST" enctype="multipart/form-data">
        <label>
            Judul
        </label>

        <input
            type="text"
            name="judul"
            value="<?= $artikel['judul']; ?>">

        <label>
            Gambar Baru
        </label>

        <input
            type="file"
            name="gambar">

        <label>
            Isi Artikel
        </label>

        <textarea
            name="isi"
            rows="8"><?= $artikel['isi']; ?></textarea>

        <label>
            Status
        </label>

        <select name="status">
            <option <?= $artikel['status'] == "Publish" ? "selected" : "" ?>>
                Publish
            </option>

            <option <?= $artikel['status'] == "Draft" ? "selected" : "" ?>>
                Draft
            </option>
        </select>

        <button name="submit">
            Update
        </button>
    </form>
</div>