<?php
session_start();
// Mendapatkan id produk
$id_produk = $_GET['id'];

// Jika sudah ada produk itu dikeraniang, maka produk itu ditambah 1
if(isset($_SESSION['keranjang'][$id_produk])){
	$_SESSION['keranjang'][$id_produk] += 1;
}else{
	$_SESSION['keranjang'][$id_produk] = 1;
}
header('location: index.php');


?>
