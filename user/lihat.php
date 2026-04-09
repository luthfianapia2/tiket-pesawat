<?php
session_start();
require '../middleware_user.php';

$keranjang = $_SESSION["keranjang"] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>🛒 Keranjang Tiket</h2>
    <div>
        <a href="user.php">Beranda</a>
    </div>
</div>

<div class="container">
    <div class="card">
        <h2>Daftar Tiket</h2>

        <?php if(empty($keranjang)) : ?>
            <p>Keranjang kosong 😢</p>
        <?php else : ?>

            <?php foreach($keranjang as $index => $item) : 
                $total += $item["harga"];
            ?>
                <div style="border:1px solid #ccc; padding:10px; margin:10px; border-radius:10px;">

                    <img src="../gambar/<?= $item["gambar"]; ?>" width="100"><br><br>

                    <b><?= $item["maskapai"]; ?></b><br>
                    <?= $item["asal"]; ?> → <?= $item["tujuan"]; ?><br>
                    Rp <?= number_format($item["harga"]); ?><br><br>

                    <a href="hapusk.php?index=<?= $index; ?>" class="btn btn-hapus">
                        Hapus
                    </a>

                </div>
            <?php endforeach; ?>

            <!-- TOTAL -->
            <h3>Total: Rp <?= number_format($total); ?></h3>

        <?php endif; ?>

    </div>

    <br>
    <a href="user.php" class="btn btn-kembali">← Kembali</a>

</div>

</body>
</html>