<?php

/** @var mysqli $conn */

include "../../config/database.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(

    mysqli_query(
        $conn,
        "SELECT gambar FROM gallery
WHERE id_gallery='$id'"

    )

);

$file = "../../uploads/gallery/" . $data['gambar'];

if (file_exists($file)) {

    unlink($file);
}

mysqli_query(

    $conn,

    "DELETE FROM gallery
WHERE id_gallery='$id'"

);

header(

    "Location: ../dashboard.php?page=gallery"

);

exit;
