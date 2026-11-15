<?php

/** @var mysqli $conn */

$query = mysqli_query(
    $conn,
    "
    SELECT * FROM mobil
    ORDER BY id_mobil DESC
    "
);

?>

<div class="page-header">
    <div>
        <h1>
            Data Mobil
        </h1>
        <p>
            Kelola koleksi kendaraan Bhani Automotiv.
        </p>
    </div>
    <a href="dashboard.php?page=tambah-mobil" class="btn">

        <i class="fa-solid fa-plus"></i>

        Tambah Mobil
    </a>
</div>


<div class="table-box">
    <table>
        <tr>
            <th>
                Gambar
            </th>
            <th>
                Nama Mobil
            </th>
            <th>
                Kategori
            </th>
            <th>
                Harga
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

        <?php while ($mobil = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td>
                    <img
                        src="../uploads/mobil/<?php echo $mobil['gambar']; ?>"
                        class="car-img">
                </td>
                <td>

                    <?php echo $mobil['nama_mobil']; ?>

                </td>
                <td>

                    <?php echo $mobil['kategori']; ?>

                </td>
                <td>Rp<?php echo number_format($mobil['harga'],0,',','.'); ?>
                </td>
                <td>
                    <?php echo $mobil['tahun']; ?>
                </td>
                <td>
                    <span class="status">
                        <?php echo $mobil['status']; ?>
                    </span>
                </td>
                <td>
                    <a
                        href="dashboard.php?page=edit-mobil&id=<?php echo $mobil['id_mobil']; ?>"
                        class="btn-edit">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <a

                        onclick="return confirm('Hapus data mobil ini?')"

                        href="mobil/hapus.php?id=<?php echo $mobil['id_mobil']; ?>"

                        class="btn-delete">


                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>

        <?php } ?>

    </table>

</div>