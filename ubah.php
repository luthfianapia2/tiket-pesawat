<?php
require 'middleware_admin.php';
require 'functions.php';

// ambil id dari URL
$id = $_GET["id"];

// ambil data dari database
$data = query("SELECT * FROM tpesawat WHERE id = $id")[0];

// cek tombol submit
if(isset($_POST["submit"])) {

    if(ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah!');
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Tiket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>✈️ Admin Tiket</h2>
    <div>
        <a href="index.php">Dashboard</a>
        <a href="tambah.php">Tambah</a>
    </div>
</div>

<!-- CONTENT -->
<div class="container">
    <div class="card">
        <h2>Edit Tiket</h2>

        <form action="" method="post" enctype="multipart/form-data">

            <!-- WAJIB -->
            <input type="hidden" name="id" value="<?= $data["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $data["gambar"]; ?>">

            <label>Maskapai</label>
            <input type="text" name="maskapai" value="<?= $data["maskapai"]; ?>" required>

            <label>Asal</label>
            <input type="text" name="asal" value="<?= $data["asal"]; ?>" required>

            <label>Tujuan</label>
            <select name="tujuan">
                <option value="Jakarta" <?= $data["tujuan"] == "Jakarta" ? "selected" : ""; ?>>Jakarta</option>
                <option value="Bali" <?= $data["tujuan"] == "Bali" ? "selected" : ""; ?>>Bali</option>
                <option value="Surabaya" <?= $data["tujuan"] == "Surabaya" ? "selected" : ""; ?>>Surabaya</option>
                <option value="Yogyakarta" <?= $data["tujuan"] == "Yogyakarta" ? "selected" : ""; ?>>Yogyakarta</option>
            </select>

            <label>Harga</label>
            <input type="number" name="harga" value="<?= $data["harga"]; ?>" required>

            <label>Stok</label>
            <input type="number" name="stok" value="<?= $data["stok"]; ?>" required>

            <label>Gambar Lama</label><br>
            <img src="gambar/<?= $data["gambar"]; ?>" width="100"><br><br>

            <label>Gambar Baru</label>
            <input type="file" name="gambar">

            <button type="submit" name="submit">Ubah</button>

            <a href="index.php" class="btn btn-kembali">← Kembali</a>

        </form>

    </div>
</div>

</body>
</html>