<?php
session_start();

$index = $_GET["index"];

// hapus item
unset($_SESSION["keranjang"][$index]);

// rapihin index
$_SESSION["keranjang"] = array_values($_SESSION["keranjang"]);

header("Location: lihat.php");
exit;