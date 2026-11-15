<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "bhani_automotiv";


$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);


if (!$conn) {

    die("Database gagal terkoneksi");
}
