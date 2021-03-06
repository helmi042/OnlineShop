<?php 
$query = "SELECT * FROM produk ORDER BY id_kategori_produk";
$data = ambilData($query);
 ?>

<!-- Header-->
<header class="bg-success py-5 m-0">
  <div class="px-4 px-lg-5 my-5">
    <div class="text-center text-white">
      <h1 class="display-4 fw-bolder">Toko Online</h1>
      <p class="lead fw-normal text-white-50 mb-0">Code Me Palangkaraya</p>
    </div>
  </div>
</header>
<!-- End Header -->

<!-- Section-->
<section class="py-5">
  <div class="container">
    <div class="px-4 px-lg-5 mt-3">
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php foreach($data as $d) : ?>
        <div class="col mb-5">
          <div class="card h-100">
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo $d['stok'] ?></div>
            <img class="card-img-top img-thumbnail" src="assets/img/<?php echo $d['foto'] ?>" alt="..." >
            <div class="card-body p-4">
              <div class="text-center">
                <h5 class="fw-bolder"><?php echo $d['nama'] ?></h5>
                Rp. <?php echo number_format($d['harga_jual'], 0, '.', '.') ?>,-
              </div>
            </div>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="beli.php?id=<?php echo $d['id_produk'] ?>">Add to cart</a></div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        
      </div>
    </div>
  </div>
</section>