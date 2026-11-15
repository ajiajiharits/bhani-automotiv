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

    $stmt = $conn->prepare(

        "DELETE FROM contact 
         WHERE id_contact=?"

    );


    $stmt->bind_param(
        "i",
        $id
    );

    if ($stmt->execute()) {

        echo "
        <script>
        alert('Pesan berhasil dihapus');
        window.location='../dashboard.php?page=contact';
        </script>

        ";
    } else {

        echo "
        <script>
        alert('Pesan gagal dihapus');
        window.location='../dashboard.php?page=contact';
        </script>

        ";
    }
} else {

    header("../dashboard.php?page=contact");
}
