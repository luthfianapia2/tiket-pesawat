<?php
require 'functions.php';

// ambil data dari tabel tiket
$tiket = query("SELECT * FROM tpesawat");
?>

<!DOCTYPE html>
<html>
<head>
    <title>✈️Data Tiket Pesawat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Data Tiket Pesawat✈️</h1>
<div class="navbar">
    <h2>✈️ Admin Tiket</h2>
    <div>
        <a href="#">Dashboard</a>
        <a href="tambah.php">Tambah</a>
        <a href="users/login.php">Login</a>
        <a href="users/register.php">Register</a>
    </div>
</div>

<div class="container"></div>
<br><br>

<div class="card">
    <h2>Data Tiket</h2>

    <table></table>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Maskapai</th>
        <th>Rute</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach($tiket as $row) : ?>
    <tr>
        <td><?= $no++; ?></td>

        <td>
            <img src="gambar/<?= $row["gambar"]; ?>" width="80">
        </td>

        <td><?= $row["maskapai"]; ?></td>

        <td>
            <?= $row["asal"]; ?> → <?= $row["tujuan"]; ?>
        </td>

        <td>
            Rp <?= number_format($row["harga"]); ?>
        </td>

        <td><?= $row["stok"]; ?></td>

        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-edit">Edit</a>
            <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-hapus">Hapus</a>        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>