<?php

/** @var mysqli $conn */

$id = $_GET['id'];
$query = mysqli_query(
    $conn,
    "
    SELECT * FROM contact
    WHERE id_contact='$id'
    "
);

$data = mysqli_fetch_assoc($query);
if (!$data) {
    echo "Pesan tidak ditemukan";
    exit;
}

?>

<div class="page-header">
    <h1>
        Detail Pesan Customer
    </h1>
</div>

<div class="form-box">
    <label>
        Nama
    </label>

    <p>
        <?= $data['nama']; ?>
    </p>

    <label>
        Email
    </label>

    <p>
        <?= $data['email']; ?>
    </p>

    <label>
        Nomor Telepon
    </label>

    <p>
        <?= $data['telepon']; ?>
    </p>

    <label>
        Pesan
    </label>

    <p>
        <?= nl2br($data['pesan']); ?>
    </p>

    <a
        href="dashboard.php?page=contact"
        class="btn">
        Kembali
    </a>

</div>