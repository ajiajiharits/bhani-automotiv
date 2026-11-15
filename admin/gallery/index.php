<?php

/** @var mysqli $conn */

$query = mysqli_query(

    $conn,

    "SELECT * FROM gallery
ORDER BY id_gallery DESC"

);


?>


<div class="page-header">

    <div>
        <h1>
            Gallery
        </h1>

        <p>
            Kelola foto showroom Bhani Automotiv.
        </p>
    </div>


    <a href="dashboard.php?page=tambah-gallery"
        class="btn">
        <i class="fa fa-plus"></i>
        Tambah Gallery

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
                Deskripsi
            </th>

            <th>
                Aksi
            </th>

        </tr>

        <?php while ($gallery = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td>
                    <img
                        src="../uploads/gallery/<?php echo $gallery['gambar']; ?>"
                        class="car-img">
                </td>

                <td>
                    <?= $gallery['judul']; ?>
                </td>

                <td>
                    <?= $gallery['deskripsi']; ?>
                </td>

                <td>
                    <a
                        href="dashboard.php?page=edit-gallery&id=<?= $gallery['id_gallery'] ?>"
                        class="btn-edit">
                        <i class="fa fa-pen"></i>
                    </a>

                    <a
                        class="btn-delete"
                        onclick="return confirm('Hapus gallery?')"
                        href="gallery/hapus.php?id=<?= $gallery['id_gallery'] ?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>

        <?php } ?>
    </table>
</div>