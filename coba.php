<?php
$conn = mysqli_connect("localhost", "root", "", "codeme");

$query = "SELECT * FROM penjualan_produk JOIN produk ON penjualan_produk.id_produk = produk.id_produk WHERE id_penjualan = 1";
$result = mysqli_query($conn, $query);

$data = [];
while($a = mysqli_fetch_assoc($result)){
	$data[] = $a;
}
?>

<pre><?php print_r($data) ?></pre>