<?php

// koneksi database
$conn = mysqli_connect("localhost", "root", "", "webtiketp");

// ambil data
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// upload gambar
function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah file dipilih
    if ($namaFile == '') {
        return false;
    }

    // pindahkan file ke folder img
    move_uploaded_file($tmpName, 'gambar/' . $namaFile);

    return $namaFile;
}

// tambah data
function tambah($data) {
    global $conn;

    $maskapai = htmlspecialchars($data["maskapai"]);
    $asal = htmlspecialchars($data["asal"]);
    $tujuan = htmlspecialchars($data["tujuan"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok = htmlspecialchars($data["stok"]);

    $gambar = upload();
    if(!$gambar) {
        return false;
    }

    $query = "INSERT INTO tpesawat 
              VALUES ('','$maskapai','$tujuan','$asal','$stok','$harga','$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// hapus data
function hapus($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM tpesawat WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// ubah data
function ubah($data) {
    global $conn;

    $id = $data["id"];
    $maskapai = htmlspecialchars($data["maskapai"]);
    $asal = htmlspecialchars($data["asal"]);
    $tujuan = htmlspecialchars($data["tujuan"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok = htmlspecialchars($data["stok"]);
    $gambarLama = $data["gambarLama"];

    // cek apakah upload gambar baru
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE tpesawat SET
                maskapai = '$maskapai',
                asal = '$asal',
                tujuan = '$tujuan',
                gambar = '$gambar',
                stok = '$stok',
                harga = '$harga'
              WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>