<?php

/** @var mysqli $conn */
include "../../config/database.php";

$id = $_GET['id'];
$stmt = $conn->prepare(

"
DELETE FROM penjualan_mobil
WHERE id_jual=?
"

);

$stmt->bind_param(
    "i", $id
);

$stmt->execute();

header(
    "Location: ../dashboard.php?page=penjualan"
);

exit;
