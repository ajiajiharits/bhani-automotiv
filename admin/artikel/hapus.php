<?php

/** @var mysqli $conn */
include "../../config/database.php";

$id = $_GET['id'];

$data = mysqli_query(

    $conn,

    "SELECT gambar FROM artikel WHERE id_artikel='$id'"

);

$artikel = mysqli_fetch_assoc($data);

if (file_exists(

    "../../uploads/artikel/" . $artikel['gambar']

)) {

    unlink(

        "../../uploads/artikel/" . $artikel['gambar']

    );
}



mysqli_query(

    $conn,

    "
DELETE FROM artikel
WHERE id_artikel='$id'

"

);

header(

    "Location: ../dashboard.php?page=artikel"

);

exit;
