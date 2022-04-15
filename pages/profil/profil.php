<div class="container">
	<h2 class="text-center mb-5">Profil</h2>
	<div class="row">
		<div class="col-md-6">
			<ul class="list-group">
			  <li class="list-group-item"><strong><?php echo $_SESSION['nama'] ?></strong></li>
			  <li class="list-group-item"><?php echo $_SESSION['email'] ?></li>
			  <li class="list-group-item"><?php echo $_SESSION['nohp'] ?></li>
			</ul>
		</div>
		<div class="col-md-6">
			<a href="index.php?halaman=riwayatPembelian" class="btn btn-success">Riwayat Pembelian</a>
			<a href="logout.php" class="btn btn-danger">Logout</a>
		</div>
	</div>
</div>