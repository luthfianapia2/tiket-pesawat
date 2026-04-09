<?php
require 'middleware_admin.php';
require 'functions.php';

if(isset($_POST["submit"])) {

    if(tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan!');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tiket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar">
    <h2>✈️ Admin Tiket</h2>
    <div>
        <a href="index.php">Dashboard</a>
        <a href="tambah.php">Tambah</a>
    </div>
</div>

<div class="container">
    <div class="card">
        <h2>Tambah Tiket</h2>

        <form action="" method="post" enctype="multipart/form-data">

            <label>Maskapai</label>
            <input type="text" name="maskapai" required>

            <label>Asal</label>
            <input type="text" name="asal" required>

            <label>Tujuan</label>
            <select name="tujuan">
                <option value="Jakarta">Jakarta</option>
                <option value="Bali">Bali</option>
                <option value="Surabaya">Surabaya</option>
                <option value="Yogyakarta">Yogyakarta</option>
            </select>

            <label>Harga</label>
            <input type="number" name="harga" required>

            <label>Stok</label>
            <input type="number" name="stok" required>

            <label>Gambar</label>
            <input type="file" name="gambar" required>

            <button type="submit" name="submit">Tambah</button>

        </form>
    </div>
</div>
</body>
</html>