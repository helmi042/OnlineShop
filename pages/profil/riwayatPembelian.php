<?php 

$id_login = $_SESSION['id_login'];

$queryPenjualan = "SELECT * FROM penjualan WHERE id_pelanggan = $id_login";
$dataPenjualan = ambilData($queryPenjualan);

?>
<div class="container">
	<div class="row">
		<h2>Riwayat Pembelian</h2>
		<div class="col-md-5">
			<ul class="list-group">
				<?php $no = 1; ?>
				<?php foreach($dataPenjualan as $d) : ?>
			  <li class="list-group-item">
			  	<a href="index.php?halaman=nota&id_penjualan=<?php echo $d['id_penjualan'] ?>">Pembelian ke-<?php echo $no++ ?></a>
			  </li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>