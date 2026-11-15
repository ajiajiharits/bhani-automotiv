<?php

/** @var mysqli $conn */
include "../config/database.php";


$query = mysqli_query(
    $conn,
    "
    SELECT *
    FROM artikel
    ORDER BY id_artikel DESC
    "
);


?>


<div class="page-header">
    <div>
        <h1>
            Data Artikel
        </h1>
        <p>
            Kelola berita dan informasi Bhani Automotiv.
        </p>

    </div>



    <a href="dashboard.php?page=tambah-artikel" class="btn">
        <i class="fa-solid fa-plus"></i>
        Tambah Artikel
    </a>
</div>





<div class="table-box">
    <table>
        <tr>
            <th>
                Gambar
            </th>

            <th>
                Judul
            </th>

            <th>
                Tanggal
            </th>

            <th>
                Status
            </th>

            <th>
                Aksi
            </th>
        </tr>



        <?php while ($artikel = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td>
                    <img
                        src="../uploads/artikel/<?php echo $artikel['gambar']; ?>"
                        class="car-img">
                </td>

                <td>
                    <?php echo $artikel['judul']; ?>
                </td>

                <td>
                    <?php echo date(
                        "d-m-Y",
                        strtotime($artikel['tanggal'])
                    ); ?>
                </td>

                <td>
                    <span class="status">
                        <?php echo $artikel['status']; ?>
                    </span>
                </td>

                <td>
                    <a
                        href="dashboard.php?page=edit-artikel&id=<?php echo $artikel['id_artikel']; ?>"
                        class="btn-edit">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    <a
                        onclick="return confirm('Hapus artikel ini?')"
                        href="artikel/hapus.php?id=<?php echo $artikel['id_artikel']; ?>"
                        class="btn-delete">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>