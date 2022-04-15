<?php require_once('functions.php');

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $nama = $_POST['nama'];
  $password = $_POST['password'];
  $kpassword = $_POST['kpassword'];
  $no_hp = $_POST['no_hp'];

  if($password != $kpassword){
    return header('location: registrasi.php');
  }

  $insertPelanggan = "INSERT INTO pelanggan VALUES('', '$email', '$password', '$nama', '$no_hp', 'pelanggan1.png')";
  saveData($insertPelanggan);

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


    <!-- My CSS -->
    <style type="text/css">
    body{
      background-color: rgb(235,235,235);
    }

  </style>

  <title>Toko Online | Code Me</title>

</head>
<body>
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="signup-form">
          <form method="post" class="mt-5 border p-4 bg-light shadow">
            <h4 class="mb-4">Registrasi Akun</h4>
            <div class="row">

              <div class="mb-3 col-md-12">
                <label>Email<span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email...">
              </div>

              <div class="mb-3 col-md-6">
                <label>Password<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password...">
              </div>

              <div class="mb-3 col-md-6">
                <label>Konfirmasi Password<span class="text-danger">*</span></label>
                <input type="password" name="kpassword" class="form-control" placeholder="Masukkan Konfirmasi Password...">
              </div>

              <div class="mb-3 col-md-6">
                <label>Nama<span class="text-danger">*</span></label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama...">
              </div>

              <div class="mb-3 col-md-6">
                <label>Nomer HP<span class="text-danger">*</span></label>
                <input type="number" name="no_hp" class="form-control" placeholder="Masukkan Nomer HP...">
              </div>

              <div class="col-md-12">
               <button type="submit" name="submit" class="btn btn-primary float-end">Daftar</button>
             </div>
           </div>
         </form>
         <p class="text-center mt-3 text-secondary">Sudah punya akun? <a href="login.php">Masuk</a></p>
       </div>
     </div>
   </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>

</body>
</html>