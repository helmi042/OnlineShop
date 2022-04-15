<?php include 'functions.php'; ?>

<?php 
session_start();
if($_SESSION['status'] !== 'login'){
  header('location: login.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CDN Icon Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Font Awesome 6.0.0 -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">

    <script src="assets/js/jquery.js"></script>

    <!-- My CSS -->
    <style type="text/css">
      body{
        background-color: rgb(235,235,235);
      }

    </style>
    <title>Toko Online | Code Me</title>
  </head>
  <body>

    <!-- Navbar -->
    <?php include 'layouts/navbar.php' ?>
    <!-- End Navbar -->

    <!-- Content --><br><br><br>
    <!-- <pre><?php //print_r($_SESSION) ?></pre> -->


      <?php
       if(!isset($_GET['halaman'])){
        include 'pages/home.php';
       }
       elseif($_GET['halaman'] == 'produk'){
        include 'pages/produk/produk.php';
       }
       elseif($_GET['halaman'] == 'tambahProduk'){
        include 'pages/produk/tambahProduk.php';
       }
       elseif($_GET['halaman'] == 'ubahProduk'){
        include 'pages/produk/ubahProduk.php';
       }
       elseif($_GET['halaman'] == 'hapusProduk'){
        include 'pages/produk/hapusProduk.php';
       }
       elseif($_GET['halaman'] == 'pelanggan'){
        include 'pages/pelanggan/pelanggan.php';
       }
       elseif($_GET['halaman'] == 'ubahPelanggan'){
        include 'pages/pelanggan/ubahPelanggan.php';
       }
       elseif($_GET['halaman'] == 'hapusPelanggan'){
        include 'pages/pelanggan/hapusPelanggan.php';
       }
       elseif($_GET['halaman'] == 'keranjang'){
        include 'pages/keranjang/keranjang.php';
       }
       elseif($_GET['halaman'] == 'hapusKeranjang'){
        include 'pages/keranjang/hapusKeranjang.php';
       }
       elseif($_GET['halaman'] == 'checkout'){
        include 'pages/checkout/checkout.php';
       }
       elseif($_GET['halaman'] == 'nota'){
        include 'pages/checkout/nota.php';
       }
       elseif($_GET['halaman'] == 'profil'){
        include 'pages/profil/profil.php';
       }
       elseif($_GET['halaman'] == 'riwayatPembelian'){
        include 'pages/profil/riwayatPembelian.php';
       }

      ?>  
    <!-- End Content -->

    <?php include 'layouts/footer.php'; ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.js"></script>

  </body>
</html>