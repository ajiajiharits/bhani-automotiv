<?php

/** @var mysqli $conn */
$id = $_GET['id'];

$query = mysqli_query(

    $conn,

"
SELECT * FROM penjualan_mobil
WHERE id_jual='$id'
"

);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan";
    exit;
}

?>

<div class="page-header">
    <h1>
        Detail Penjualan Mobil
    </h1>
</div>

<div class="form-box">

    <label>
        Nama Customer
    </label>

    <p>
        <?= $data['nama']; ?>
    </p>

    <label>
        Nomor Telepon
    </label>

    <p>
        <?= $data['telepon']; ?>
    </p>

    <label>
        Tipe Mobil
    </label>

    <p>
        <?= $data['tipe_mobil']; ?>
    </p>

    <label>
        Tahun Kendaraan
    </label>

    <p>
        <?= $data['tahun']; ?>
    </p>

    <label>
        Kilometer
    </label>

    <p>
        <?= number_format($data['kilometer']); ?> KM
    </p>

    <label>
        Kondisi Kendaraan
    </label>

    <p>
        <?= nl2br($data['kondisi']); ?>
    </p>

    <label>
        Status
    </label>

    <p>
        <?= $data['status']; ?>
    </p>

    <a
        href="dashboard.php?page=penjualan"
        class="btn"> Kembali
    </a>
</div>