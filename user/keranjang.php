<?php
session_start();
require '../functions.php';

$id = $_GET["id"];

// ambil data tiket
$data = query("SELECT * FROM tpesawat WHERE id = $id")[0];

// masukin ke session
$_SESSION["keranjang"][] = $data;

// redirect ke lihat keranjang
header("Location: lihat.php");
exit;