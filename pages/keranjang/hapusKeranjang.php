<?php
$id_produk = $_GET['id_produk'];

unset($_SESSION['keranjang'][$id_produk]);
header('location: index.php?halaman=keranjang');

?>