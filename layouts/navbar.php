<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="#!">Code Me</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
        <li class="nav-item me-3"><a class="nav-link <?php echo (!isset($_GET['halaman'])) ? 'active' : '' ?>" aria-current="page" href="index.php"><i class="fa-solid fa-house me-1"></i>Home</a></li>
        <li class="nav-item me-3"><a class="nav-link <?php echo ($_GET['halaman'] == 'profil') ? 'active' : '' ?>" href="index.php?halaman=profil"><i class="fa-solid fa-address-card me-1"></i></i>Profil</a></li>
        <li class="nav-item me-3"><a class="nav-link <?php echo ($_GET['halaman'] == 'produk') ? 'active' : '' ?>" href="index.php?halaman=produk"><i class="fa-solid fa-list me-1"></i>Data Produk</a></li>
        <li class="nav-item me-3"><a class="nav-link <?php echo ($_GET['halaman'] == 'pelanggan') ? 'active' : '' ?>" href="index.php?halaman=pelanggan"><i class="fa-solid fa-users me-1"></i>Data Pelanggan</a></li>
      </ul>
      <form class="d-flex">
        <a class="btn btn-outline-light" href="index.php?halaman=keranjang">
          <i class="bi-cart me-1"></i>
                  Cart
          <span class="badge bg-light text-dark ms-1 rounded-pill"><?php 
          if(isset($_SESSION['keranjang'])){
            echo count($_SESSION['keranjang']);
          }else{
            echo 0;
          } ?></span>
        </a>
      </form>
    </div>
  </div>
</nav>