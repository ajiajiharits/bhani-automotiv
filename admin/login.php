<?php

session_start();

if (isset($_SESSION['admin_id'])) {

    header("Location: dashboard.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Bhani Automotiv</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>


<body>
    <div class="login-page">
        <div class="login-box">
            <div class="brand-login">
                <img src="../img/logo.png" class="login-logo" alt="Bhani Automotiv Logo">

                <span>
                    BHANI AUTOMOTIV
                </span>
            </div>

            <div class="login-title">
                <h2>
                    ADMIN LOGIN
                </h2>
                <p>
                    Management Panel
                </p>
            </div>

            <?php

            if (isset($_GET['error'])) {

            ?>
                <div class="login-error">
                    Username atau password salah.
                </div>

            <?php

            }

            ?>

            <form action="auth.php" method="POST">
                <div class="field">
                    <label>
                        USERNAME
                    </label>

                    <div class="input-icon">
                        <i class="fa-solid fa-user"></i>
                        <input
                            type="text"
                            name="username"
                            placeholder="Masukkan username"
                            required>
                    </div>
                </div>

                <div class="field">
                    <label>
                        PASSWORD
                    </label>

                    <div class="input-icon">
                        <i class="fa-solid fa-lock"></i>
                        <input
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required>
                    </div>
                </div>

                <button
                    type="submit"
                    class="btn-login">
                    <i class="fa-solid fa-right-to-bracket"></i>LOGIN
                </button>
            </form>

            <div class="login-footer">
                Bhani Automotiv © 2026
            </div>

        </div>

    </div>

</body>

</html>