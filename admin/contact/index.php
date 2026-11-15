<?php

/** @var mysqli $conn */

$query = mysqli_query(
    $conn,
    "
    SELECT * FROM contact
    ORDER BY id_contact DESC
    "
);


?>


<div class="page-header">
    <div>
        <h1>
            Pesan Customer
        </h1>

        <p>
            Daftar pesan masuk dari pelanggan Bhani Automotiv.
        </p>
    </div>
</div>

<div class="table-box">
    <table>
        <tr>
            <th>
                Nama
            </th>

            <th>
                Email
            </th>

            <th>
                Telepon
            </th>

            <th>
                Pesan
            </th>

            <th>
                Aksi
            </th>
        </tr>

        <?php while ($contact = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td>
                    <?= $contact['nama']; ?>
                </td>


                <td>
                    <?= $contact['email']; ?>
                </td>

                <td>
                    <?= $contact['telepon']; ?>
                </td>

                <td>
                    <?= substr($contact['pesan'], 0, 50); ?>...
                </td>

                <td>
                    <a
                        href="dashboard.php?page=detail-contact&id=<?= $contact['id_contact']; ?>"
                        class="btn-edit">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a
                        onclick="return confirm('Hapus pesan ini?')"
                        href="contact/hapus.php?id=<?= $contact['id_contact']; ?>"
                        class="btn-delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>