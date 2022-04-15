<?php
include 'functions.php';

session_start();

if(isset($_POST['login'])){    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE email_pelanggan = '$email' AND password_pelanggan = '$password'");

    $num = mysqli_num_rows($result);

    if($num > 0){
        $data = mysqli_fetch_assoc($result);

        $_SESSION['email'] = $email;
        $_SESSION['nama'] = $data['nama_pelanggan'];
        $_SESSION['foto'] = $data['foto_pelanggan'];
        $_SESSION['nohp'] = $data['nohp_pelanggan'];
        $_SESSION['status'] = 'login';
        $_SESSION['id_login'] = $data['id_pelanggan'];
        echo "hehe";
        header('location: index.php');
    }else{
        header('location: login.php?login=gagal');
    }
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


    <!-- My CSS -->
    <style type="text/css">
      body{
        background-color: rgb(235,235,235);
      }

    </style>

    <title>Toko Online | Code Me</title>

  </head>
  <body>
      <br><br><br><br><br>  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form method="post" class="row g-3">
                        <h4 class="text-center">Sign-In E-Commerce</h4>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email...">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password...">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Ingat saya</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-dark float-end">Login</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Belum punya akun? <a href="registrasi.php">Daftar di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>

  </body>
</html>