<?php 

// Jika klik submit
if(isset($_POST['simpan'])){
  $nama = htmlspecialchars($_POST['nama']);
  $kategori = $_POST['kategori'];
  $stok = $_POST['stok'];
  $hargaBeli = $_POST['hargaBeli'];
  $hargaJual = $_POST['hargaJual'];
  $berat = $_POST['berat'];
  $deskripsi = $_POST['deskripsi'];

  // Validasi Foto
  $foto = $_FILES['foto']['name'];
  $ukuranFoto = $_FILES['foto']['size'];
  $typeFoto = $_FILES['foto']['type'];
  $file_tmp = $_FILES['foto']['tmp_name'];

  // Jika upload foto
  if($typeFoto == 'image/jpg' || $typeFoto == 'image/jpeg' || $typeFoto == 'image/png'){
    if($ukuranFoto > 1000000){
      echo "Error";
    }else{
      $tanggal = md5(date('h:i:s'));
      $foto_nama_new = $tanggal . '-' . $foto; 
      move_uploaded_file($file_tmp, 'assets/img/' . $foto_nama_new);
      $query = "INSERT INTO produk VALUES('', '$nama', '$kategori', '$stok', '$hargaBeli', '$hargaJual', '$berat', '$foto_nama_new', '$deskripsi')";
      saveData($query);
      header('location: index.php?halaman=produk');
    }
  }else{
    echo $typeFoto;
  }

  // Jika tidak upload foto
  if(!$foto){
    $foto = $fotoSekarang;
    $query = "INSERT INTO produk VALUES('', '$nama', '$kategori', '$stok', '$hargaBeli', '$hargaJual', '$berat', 'no-image.jpg', '$deskripsi')";
    saveData($query);
    header('location: index.php?halaman=produk');
  }

}
?>

<!-- Content -->
<div class="container">
  <div class="card">
    <div class="card-body">
      <h2 class="text-center labele">Tambah Produk</h2>
    </div>
  </div>
  <div class="card">
    <div class="card-body">

      <form method="post" enctype="multipart/form-data">
        <div class="row">

          <div class="col-md-6">
            
            <div class="row my-2">
              <div class="form-group mt-2">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama" required>
              </div>

              <div class="form-group mt-2">
                <label class="form-label">Kategori Produk</label>
                <select class="form-select" name="kategori" required>
                  <option selected>Pilih Kategori...</option>
                  <?php
                  $queryKategori = "SELECT * FROM kategori_produk";
                  $dataKategori = ambilData($queryKategori);
                  foreach($dataKategori as $d) : ?>
                    <option value="<?php echo $d['id_kategori_produk'] ?>"><?php echo $d['nama_kategori'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group mt-2">
                <label class="form-label">Stok Produk</label>
                <input type="number" class="form-control" name="stok" required>
              </div>

              <div class="form-group mt-2">
                <label class="form-label">Harga Beli</label>
                <input type="number" class="form-control" name="hargaBeli" required>
              </div>

              <div class="form-group mt-2">
                <label class="form-label">Harga Jual</label>
                <input type="number" class="form-control" name="hargaJual" required>
              </div>

              <div class="form-group mt-2">
                <label class="form-label">Berat Produk</label>
                <input type="number" class="form-control" name="berat" required>
              </div>

              <div class="form-group mt-2">
                <label class="form-label">Deskripsi Produk</label>
                <input type="text" class="form-control" name="deskripsi" required>
              </div>

              <div class="form-group mt-2">
                <label for="formFile" class="form-label">Foto (optional)</label>
              <input class="form-control" type="file" id="formFile" name="foto">
              </div>

            </div>
          </div>

          <div class="col-md-6 penjelasan">
            <!-- Code Jquery -->
          </div>

          <div class="text-start">
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Content -->

<script type="text/javascript">

  $('input[name=nama]').on('click', function(){
    $('.penjelasan').html(`
          <div class="card mt-5 fixed">
            <div class="card-body">
              <h5><i class="bi bi-moon-stars me-3"></i>Nama Produk</h5>
              <p>Tulis nama produk beserta keterangannya, seperti tipe, merek, dan keterangan lainnya.</p><br>
              <h6>Contoh</h6>
              <p>Bila anda membuat produk sebuah Komputer, maka beri nama produk tersebut seperti "Macbook Pro 15 Inch Space Grey".</p>
            </div>
          </div> 
    `);
  })

  $('select[name=kategori]').on('click', function(){
    $('.penjelasan').html(`
          <div class="card mt-5">
            <div class="card-body">
              <h5><i class="bi bi-moon-stars me-3"></i>Kategori Produk</h5>
              <p>Tentukan kategori setiap produk untuk mengelompokkan produk per kategori.</p><br>
              <h6>Contoh</h6>
              <p>Laptop, Smartphone, Baju, Celana, Komponen dll.
              </p>
            </div>
          </div> 
    `);
  })

  $('input[name=stok]').on('click', function(){
    $('.penjelasan').html(`
          <div class="card mt-5">
            <div class="card-body">
              <h5><i class="bi bi-moon-stars me-3"></i>Stok Produk</h5>
              <p>Tentukan batas stok minimum dari produk tersebut.</p><br>
              <h6>Contoh</h6>
              <p>Batas Stok Minimum : 1.</p>
            </div>
          </div> 
    `);
  })

  $('input[name=hargaBeli]').on('click', function(){
    $('.penjelasan').html(`
          <div class="card mt-5">
            <div class="card-body">
              <h5><i class="bi bi-moon-stars me-3"></i>Harga Beli Satuan Produk</h5>
              <p>Isi harga beli produk. Harga ini tidak bersifat mutlak atau masih dapat diubah pada saat membuat pembelian</p><br>
              <h6>Contoh</h6>
              <p>Harga Beli Satuan : Rp25.000.000,00.</p>
            </div>
          </div> 
    `);
  })

  $('input[name=hargaJual]').on('click', function(){
    $('.penjelasan').html(`
          <div class="card mt-5">
            <div class="card-body">
              <h5><i class="bi bi-moon-stars me-3"></i>Harga Jual Satuan Produk</h5>
              <p>Isi harga jual produk. Harga ini tidak bersifat mutlak atau masih dapat diubah pada saat membuat penjualan.</p><br>
              <h6>Contoh</h6>
              <p>Harga Jual Satuan : Rp25.000.000,00.</p>
            </div>
          </div> 
    `);
  })

  $('input[name=berat]').on('click', function(){
    $('.penjelasan').html(`
          <div class="card mt-5">
            <div class="card-body">
              <h5><i class="bi bi-moon-stars me-3"></i>Berat Produk</h5>
              <p>Tulis berat produk dalam bentuk gram</p><br>
              <h6>Contoh</h6>
              <p>Berat: 400, 1000, 1200</p>
            </div>
          </div> 
    `);
  })

  $('input[name=deskripsi]').on('click', function(){
    $('.penjelasan').html(`
          <div class="card mt-5">
            <div class="card-body">
              <h5><i class="bi bi-moon-stars me-3"></i>Deskripsi Produk</h5>
              <p>Masukkan deskripsi mengenai produk untuk menggambarkan barang atau jasa Anda.</p><br>
              <h6>Contoh</h6>
              <p>Macbook Pro 15 Inch 256GB 3.7Ghz, Space Grey with ATI Radeon Graphics.</p>
            </div>
          </div> 
    `);
  })

  $('input[name=foto]').on('click', function(){
    $('.penjelasan').html(`
          <div class="card mt-5">
            <div class="card-body">
              <h5><i class="bi bi-moon-stars me-3"></i>Foto Produk</h5>
              <p>Format gambarnya .jpg, .jpeg, .png juga Ukuran gambar maksimal 10mb dan gunakan gambar yang lebar dan tingginya sama seperti 700 x 700.</p>
            </div>
          </div> 
    `);
  })
</script>