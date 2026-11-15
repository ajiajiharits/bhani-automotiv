<?php

/** @var mysqli $conn */
session_start();

if (!isset($_SESSION['admin_id'])) {

    header("Location: login.php");
    exit;
}

include "../config/database.php";

$admin_nama = $_SESSION['username'];

$totalMobil = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) total FROM mobil"
    )
);

$totalAvailable = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "
        SELECT COUNT(*) total 
        FROM mobil
        WHERE status='Available'
        "
    )
);

$totalSold = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "
        SELECT COUNT(*) total 
        FROM mobil
        WHERE status='Sold'
        "
    )
);

$totalPesan = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) total FROM contact"
    )
);

$mobilTerbaru = mysqli_query(
    $conn,
    "
    SELECT *
    FROM mobil
    ORDER BY id_mobil DESC
    LIMIT 8
    "
);

$jualTerbaru = mysqli_query(
    $conn,
    "
    SELECT *
    FROM penjualan_mobil
    ORDER BY id_jual DESC
    LIMIT 5
    "
);

$pesanTerbaru = mysqli_query(
    $conn,
    "
    SELECT *
    FROM contact
    ORDER BY id_contact DESC
    LIMIT 5
    "
);

$page = isset($_GET['page'])
    ? $_GET['page']
    : "home";

$pages = [

    "home",
    "mobil",
    "tambah-mobil",
    "edit-mobil",
    "gallery",
    "tambah-gallery",
    "edit-gallery",
    "artikel",
    "tambah-artikel",
    "edit-artikel",
    "contact",
    "detail-contact",
    "penjualan",
    "detail-penjualan"

];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Bhani Automotiv</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <aside class="sidebar">
        <div class="brand-sidebar">
            <img src="../img/logo.png" class="sidebar-logo" alt="Bhani Automotiv Logo">
            <span>BHANI<br>AUTOMOTIV
            </span>
        </div>

        <ul>
            <li class="<?= $page == 'home' ? 'active' : '' ?>">
                <a href="dashboard.php?page=home">
                    <i class="fa-solid fa-gauge"></i>Dashboard
                </a>
            </li>

            <li class="<?=
                        ($page == 'mobil' ||
                            $page == 'tambah-mobil' ||
                            $page == 'edit-mobil')
                            ? 'active' : ''
                        ?>">
                <a href="dashboard.php?page=mobil">
                    <i class="fa-solid fa-car"></i>Data Mobil
                </a>
            </li>

            <li class="<?=
                        ($page == 'artikel' ||
                            $page == 'tambah-artikel' ||
                            $page == 'edit-artikel')
                            ? 'active' : ''
                        ?>">
                <a href="dashboard.php?page=artikel">
                    <i class="fa-solid fa-newspaper"></i>Artikel
                </a>
            </li>

            <li class="<?=
                        ($page == 'gallery' ||
                            $page == 'tambah-gallery' ||
                            $page == 'edit-gallery')
                            ? 'active' : ''
                        ?>">
                <a href="dashboard.php?page=gallery">
                    <i class="fa-solid fa-image"></i>Gallery
                </a>
            </li>

            <li class="<?=
                        ($page == 'contact' ||
                            $page == 'detail-contact')
                            ? 'active' : ''
                        ?>">
                <a href="dashboard.php?page=contact">
                    <i class="fa-solid fa-envelope"></i>Pesan Customer
                </a>
            </li>

            <li class="<?=
                        ($page == 'penjualan' ||
                            $page == 'detail-penjualan')
                            ? 'active' : ''
                        ?>">
                <a href="dashboard.php?page=penjualan">
                    <i class="fa-solid fa-file-invoice"></i>Penjualan Mobil
                </a>
            </li>

            <li>
                <a href="logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>Logout
                </a>
            </li>

        </ul>

    </aside>

    <div class="main">
        <header class="topbar">

            <h2>

                <?php

                $judulPage = [

                    "home" => "Dashboard",
                    "mobil" => "Data Mobil",
                    "tambah-mobil" => "Tambah Mobil",
                    "edit-mobil" => "Edit Mobil",

                    "gallery" => "Gallery",
                    "tambah-gallery" => "Tambah Gallery",
                    "edit-gallery" => "Edit Gallery",

                    "artikel" => "Artikel",
                    "tambah-artikel" => "Tambah Artikel",
                    "edit-artikel" => "Edit Artikel",

                    "contact" => "Pesan Customer",
                    "detail-contact" => "Detail Pesan",

                    "penjualan" => "Penjualan Mobil",
                    "detail-penjualan" => "Detail Penjualan"

                ];

                if (isset($judulPage[$page])) {

                    echo $judulPage[$page];
                } else {

                    echo "Dashboard";
                }

                ?>

            </h2>

            <div class="admin-profile">
                <div class="admin-icon">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div>
                    <b>
                        <?= $admin_nama; ?>
                    </b>

                    <small>
                        Administrator
                    </small>

                </div>
            </div>
        </header>


        <section class="content">

            <?php

            if (in_array($page, $pages)) {

                switch ($page) {

                    case "home":
                        include "pages/home.php";
                        break;

                    case "mobil":
                        include "mobil/index.php";
                        break;

                    case "tambah-mobil":
                        include "mobil/tambah.php";
                        break;

                    case "edit-mobil":
                        include "mobil/edit.php";
                        break;

                    case "gallery":
                        include "gallery/index.php";
                        break;

                    case "tambah-gallery":
                        include "gallery/tambah.php";
                        break;

                    case "edit-gallery":
                        include "gallery/edit.php";
                        break;

                    case "artikel":
                        include "artikel/index.php";
                        break;

                    case "tambah-artikel":
                        include "artikel/tambah.php";
                        break;

                    case "edit-artikel":
                        include "artikel/edit.php";
                        break;

                    case "contact":
                        include "contact/index.php";
                        break;

                    case "detail-contact":
                        include "contact/detail.php";
                        break;

                    case "penjualan":
                        include "penjualan/index.php";
                        break;

                    case "detail-penjualan":
                        include "penjualan/detail.php";
                        break;

                    default:
                        include "pages/home.php";
                }
            } else {
                echo "<h2>Halaman tidak ditemukan</h2>";
            }

            ?>

        </section>

    </div>

</body>

</html>