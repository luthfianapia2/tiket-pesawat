<?php
require '../middleware_user.php';
require '../functions.php';

$tiket = query("SELECT * FROM tpesawat");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tiket</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>✈️ Booking Tiket</h2>
    <div>
        <a href="user.php">Beranda</a>
        <a href="lihat.php">Keranjang 🛒</a>
        <a href="../users/logout.php">Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="container">

    <h2>Daftar Tiket Pesawat</h2>

    <div style="display:flex; flex-wrap:wrap; gap:20px;">

        <?php foreach($tiket as $row) : ?>
            <div class="card" style="width:250px; text-align:center;">

                <img src="../gambar/<?= $row["gambar"]; ?>" width="200"><br><br>

                <b><?= $row["maskapai"]; ?></b><br>
                <?= $row["asal"]; ?> → <?= $row["tujuan"]; ?><br>
                Rp <?= number_format($row["harga"]); ?><br><br>

                <a href="keranjang.php?id=<?= $row["id"]; ?>" class="btn btn-edit">
                    🛒 Beli
                </a>

            </div>
        <?php endforeach; ?>

    </div>

</div>

</body>
</html>
```
