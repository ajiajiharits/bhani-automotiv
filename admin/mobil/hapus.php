<?php

/** @var mysqli $conn */

session_start();

if (!isset($_SESSION['admin_id'])) {

    header("Location: ../login.php");
    exit;
}

include "../../config/database.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = mysqli_query(
        $conn,
        "
        SELECT gambar 
        FROM mobil
        WHERE id_mobil='$id'
        "
    );

    $data = mysqli_fetch_assoc($query);

    if ($data) {

        $gambar = $data['gambar'];
        $file = "../../uploads/mobil/" . $gambar;
        if (file_exists($file)) {
            unlink($file);
        }

        mysqli_query(
            $conn,
            "
            DELETE FROM mobil
            WHERE id_mobil='$id'
            "
        );
    }
}

header(
    "Location: ../dashboard.php?page=mobil"
);

exit;
