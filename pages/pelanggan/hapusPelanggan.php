<?php 

$id = $_GET['id_pelanggan'];

$query = "DELETE FROM pelanggan WHERE id_pelanggan = $id";
hapusData($query);

header('location: index.php?halaman=pelanggan');

 ?>