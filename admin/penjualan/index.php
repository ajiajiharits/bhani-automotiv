<?php

/** @var mysqli $conn */
$query = mysqli_query(
    $conn,
    "
    SELECT * FROM penjualan_mobil
    ORDER BY id_jual DESC
    "
);

?>

<div class="page-header">
    <div>
        <h1>
            Permintaan Jual Mobil
        </h1>

        <p>
            Data customer yang ingin menjual kendaraan.
        </p>
    </div>
</div>

<div class="table-box">
    <table>
        <tr>
            <th>
                Nama Customer
            </th>

            <th>
                Telepon
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

            <th>
                Aksi
            </th>

        </tr>

        <?php while ($jual = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td>
                    <?= $jual['nama']; ?>
                </td>

                <td>
                    <?= $jual['telepon']; ?>
                </td>

                <td>
                    <?= $jual['tipe_mobil']; ?>
                </td>

                <td>
                    <?= $jual['tahun']; ?>
                </td>

                <td>
                    <span class="status">
                        <?= $jual['status']; ?>
                    </span>
                </td>

                <td>
                    <a
                        href="dashboard.php?page=detail-penjualan&id=<?= $jual['id_jual']; ?>"
                        class="btn-edit">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a
                        onclick="return confirm('Hapus data ini?')"
                        href="penjualan/hapus.php?id=<?= $jual['id_jual']; ?>"
                        class="btn-delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>