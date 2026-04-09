<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION["login"])){
    header("Location: ../users/login.php");
    exit;
}

if($_SESSION["role"] != "user"){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Akses Ditolak</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

    <div class="akses-ditolak">
        <h1>🚫 Akses Ditolak</h1>
        <p>Halaman ini hanya untuk user.</p>
        <a href="../users/login.php" class="btn">Kembali ke Login</a>
    </div>

    </body>
    </html>
    <?php
    exit;
}
?>