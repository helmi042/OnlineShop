<?php 

$id = $_GET['id_pelanggan'];
$query = "SELECT * FROM pelanggan WHERE id_pelanggan = $id";
$data = ambilData($query, $id);
$data = $data[0];


// Jika klik submit
if(isset($_POST['simpan'])){

  $email = $_POST['email'];
  $password = $_POST['password'];
  $nama = htmlspecialchars($_POST['nama']);
  $nohp = $_POST['nohp'];
  $fotoSekarang = $_POST['fotoSekarang'];


  // Validasi Foto
  $foto = $_FILES['foto']['name'];
  $ukuranFoto = $_FILES['foto']['size'];
  $typeFoto = $_FILES['foto']['type'];

  // Jika upload foto baru
  if($typeFoto == 'image/jpg' || $typeFoto == 'image/jpeg' || $typeFoto == 'image/png'){
    if($ukuranFoto > 100000){
      echo "Error";
    }else{
      $query = "UPDATE pelanggan SET 
          foto_pelanggan     = '$foto',
          email_pelanggan    = '$email',
          password_pelanggan = '$password',
          nama_pelanggan     = '$nama',
          nohp_pelanggan     = '$nohp'
          WHERE id_pelanggan = $id";
      saveData($query);
      header('location: index.php?halaman=pelanggan');
    }
  }

  // Jika tidak upload foto baru
  if(!$foto){
    $foto = $fotoSekarang;
    $query = "UPDATE pelanggan SET 
        foto_pelanggan     = '$foto',
        email_pelanggan    = '$email',
        password_pelanggan = '$password',
        nama_pelanggan     = '$nama',
        nohp_pelanggan     = '$nohp'
        WHERE id_pelanggan = $id";
    saveData($query);
    header('location: index.php?halaman=pelanggan');
  }

}

?>

<!-- Content -->
<div class="container">
  <h2 class="my-4 text-center">Ubah pelanggan</h2>
  <div class="card">
    <div class="card-body">

      <form method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <label class="form-label">Email pelanggan</label>
            <input type="email" class="form-control" name="email" value="<?php echo $data['email_pelanggan'] ?>" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Password pelanggan</label>
            <input type="password" class="form-control" name="password" value="<?php echo $data['password_pelanggan'] ?>" required>
          </div>
        </div>

        <div class="row my-2">
          <div class="col-md-6">
            <label class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_pelanggan'] ?>" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">No Hp</label>
            <input type="number" class="form-control" name="nohp" value="<?php echo $data['nohp_pelanggan'] ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Foto Sekarang</label><br>
          <img class="img-thumbnail" src="assets/img/<?php echo $data['foto_pelanggan'] ?>" width="100">
          <input type="hidden" name="fotoSekarang" value="<?php echo $data['foto_pelanggan'] ?>">
        </div>

        <div class="mb-3">
          <label for="formFile" class="form-label">Foto Baru (optional)</label>
          <input class="form-control" type="file" id="formFile" name="foto">
        </div>

        <div class="text-end">
          <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Content -->