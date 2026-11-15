<?php

/** 
 * Variabel berasal dari dashboard.php
 * @var string $admin_nama
 * @var array $totalMobil
 * @var array $totalAvailable
 * @var array $totalSold
 * @var array $totalPesan
 * @var array $totalArtikel
 * @var mysqli_result $artikelTerbaru
 * @var mysqli_result $mobilTerbaru
 * @var mysqli_result $jualTerbaru
 */

?>

<div class="welcome">
    <h1>
        Selamat Datang, <?= $admin_nama; ?>
    </h1>
    <p>
        Panel administrasi Bhani Automotiv.
    </p>
</div>

<div class="dashboard-stat">
    <div class="stat-card">
        <i class="fa-solid fa-car"></i>
        <div>
            <span>
                Total Mobil
            </span>
            <h2>
                <?= $totalMobil['total']; ?>
            </h2>
        </div>
    </div>


    <div class="stat-card">
        <i class="fa-solid fa-circle-check"></i>
        <div>
            <span>
                Available
            </span>
            <h2>
                <?= $totalAvailable['total']; ?>
            </h2>
        </div>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-car-side"></i>
        <div>
            <span>
                Sold
            </span>
            <h2>
                <?= $totalSold['total']; ?>
            </h2>
        </div>
    </div>

    <div class="stat-card">
        <i class="fa-solid fa-envelope"></i>
        <div>
            <span>
                Pesan Customer
            </span>
            <h2>
                <?= $totalPesan['total']; ?>
            </h2>
        </div>
    </div>
</div>

<div class="dashboard-box">
    <h2>
        Kendaraan Terbaru
    </h2>
    <div class="vehicle-grid">
        <?php while ($mobil = mysqli_fetch_assoc($mobilTerbaru)) { ?>
            <div class="vehicle-card">
                <img src="../uploads/mobil/<?= $mobil['gambar']; ?>">
                <h3>
                    <?= $mobil['nama_mobil']; ?>
                </h3>
                <p>
                    <?= $mobil['kategori']; ?>
                </p>
                <strong>
                    Rp <?= number_format($mobil['harga'], 0, ',', '.'); ?>
                </strong>
            </div>
        <?php } ?>
    </div>
</div>

<!-- LALU LANJUT PERMINTAAN JUAL -->


<div class="dashboard-box">

    <div class="dashboard-box">
        <h2>
            Permintaan Jual Terbaru
        </h2>

        <table>
            <tr>
                <th>
                    Nama
                </th>

                <th>
                    Mobil
                </th>

                <th>
                    Tahun
                </th>

                <th>
                    Status
                </th>
            </tr>

            <?php while ($jual = mysqli_fetch_assoc($jualTerbaru)) { ?>

                <tr>
                    <td>
                        <?= $jual['nama']; ?>
                    </td>
                    <td>
                        <?= $jual['tipe_mobil']; ?>
                    </td>
                    <td>
                        <?= $jual['tahun']; ?>
                    </td>
                    <td>
                        <?= $jual['status']; ?>
                    </td>
                </tr>

            <?php } ?>

        </table>

    </div>