<?php 

$id = $_GET['id_produk'];

$query = "SELECT * FROM produk WHERE id_produk = $id";
$data = ambilData($query);
$data = $data[0];
unlink('assets/img/'. $data['foto']);

$queryDelete = "DELETE FROM produk WHERE id_produk = $id";
hapusData($queryDelete);


header('location: index.php?halaman=produk');

?>