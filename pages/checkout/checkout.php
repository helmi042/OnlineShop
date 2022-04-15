
<?php 

if(isset($_POST['checkout'])){
  $idPelanggan = $_POST['id_pelanggan'];
  $namaProvinsi = $_POST['nama_provinsi'];
  $namaKota = $_POST['nama_kota'];
  $alamat = $_POST['alamat'];
  $kodepos = $_POST['kodepos'];
  $ekspedisi = $_POST['ekspedisi'];
  $ongkir = $_POST['biaya'];
  $berat = $_POST['berat'];
  $tanggalPenjualan = date('Y-m-d');
  $totalPenjualan = $_POST['totalPenjualan'];

  // INSERT table Pengiriman
  $insertPengiriman = "INSERT INTO pengiriman 
                      VALUES('', '$namaProvinsi', '$namaKota', '$alamat', '$kodepos', '$ekspedisi', '$ongkir','$berat')";
  saveData($insertPengiriman);

  // INSERT table Penjualan
  $last_id_pengiriman = mysqli_insert_id($conn);
  $insertPenjualan = "INSERT INTO penjualan VALUES('', '$idPelanggan', '$last_id_pengiriman', '$tanggalPenjualan', '$totalPenjualan')";
  saveData($insertPenjualan);

  // INSERT table Penjualan_produk
  $last_id_penjualan = mysqli_insert_id($conn);

  foreach($_SESSION['keranjang'] as $id_produk => $jumlah){
    $insertPenjualanProduk = "INSERT INTO penjualan_produk VALUES('', '$last_id_penjualan', '$id_produk', '$jumlah')";
    saveData($insertPenjualanProduk);

    // UPDATE stok produk
    $updateStokProduk = "UPDATE produk SET stok = stok - '$jumlah' WHERE id_produk = $id_produk";
    saveData($updateStokProduk);
  }


  // Hapus SESSION keranjang
  unset($_SESSION['keranjang']);

  header('location: index.php?halaman=nota&id_penjualan=' . $last_id_penjualan);

}

?>

<div class="container">
  <h2 class="my-4">Checkout</h2>
  <table class="table table-bordered text-center bg-light">
    <tr>
      <th>No</th>
      <th>Foto</th>
      <th>Nama</th>
      <th>Harga</th>
      <th>Jumlah yang dibeli</th>
      <th>Sub Total</th>
    </tr>

    <?php 
    $no = 1; 
    $total = 0;
    $berat = 0;
    foreach($_SESSION['keranjang'] as $id_produk => $jumlah) : 
      $query = "SELECT * FROM produk WHERE id_produk = $id_produk";
      $data = ambilData($query);
      $data = $data[0];

      $subTotal = $data['harga_jual'] * $jumlah;
      $total += $subTotal;

      $berat += $data['berat'];

    ?>
      <tr>
        <td class="align-middle"><?php echo $no++ ?></td>
        <td class="align-middle"><img src="assets/img/<?php echo $data['foto'] ?>" class="img-thumbnail" width="80"></td>
        <td class="align-middle"><?php echo $data['nama'] ?></td>
        <td class="align-middle"><?php echo number_format($data['harga_jual']) ?></td>
        <td class="align-middle"><?php echo $jumlah ?></td>
        <td class="align-middle"><?php echo number_format($subTotal) ?></td>

      </tr>
    <?php endforeach; ?>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Total: </th>
        <th><?php echo number_format($total) ?></th>
      </tr>

  </table>

  <form class="mt-3" method="post">
    <div class="row">

      <input type="hidden" class="form-control" value="<?php echo $_SESSION['id_login'] ?>" name="id_pelanggan">
      <input type="hidden" class="form-control" value="<?php echo $berat ?>" name="berat">
      <input type="hidden" class="form-control" name="nama_provinsi">
      <input type="hidden" class="form-control" name="nama_kota">
      <input type="hidden" class="form-control" name="kodepos">
      <input type="hidden" class="form-control" value="<?php echo $total ?>" name="totalPenjualan">

      <div class="mb-3 col-md-4">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" readonly value="<?php echo $_SESSION['nama'] ?>">
      </div>
      <div class="mb-3 col-md-4">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" readonly value="<?php echo $_SESSION['email'] ?>">
      </div>
      <div class="mb-3 col-md-4">
        <label class="form-label">Nomer Hp</label>
        <input type="text" class="form-control" readonly value="<?php echo $_SESSION['nohp'] ?>">
      </div>
      <div class="mb-3 col-md-3">
        <label class="form-label">Alamat Rumah</label>
        <textarea class="form-control" rows="3" name="alamat" required></textarea>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <label class="form-label">Provinsi</label>
        <select class="form-select" name="provinsi" id="provinsi" required></select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Kota</label>
        <select class="form-select" name="kota" id="kota" required></select>
      </div>
      <div class="col-md-3">
      <label class="form-label">Ekspedisi</label>
        <select class="form-select" name="ekspedisi" id="ekspedisi" required></select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Biaya & Estimasi</label>
        <select class="form-select" name="biaya" id="biaya" required></select>
      </div>
    </div>

      <button type="submit" name="checkout" class="btn btn-primary mt-3" onclick="return confirm('Yakin mau Checkout?')">Checkout</button>
  </form>

</div>


  <script src="assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
  <script type="text/javascript">

    // Mendapatkan provinsi
    $(document).ready(function(){

      // Mendapatkan Provinsi
      $.ajax({
        type: 'post',
        url: 'API-RajaOngkir/provinsi.php',
        success: function(hasil_provinsi){
          $('#provinsi').html(hasil_provinsi);
        }
      })

      // Ketika Provinsi berubah
      $('#provinsi').on('change', function(){
        let id_provinsi = $("option:selected", this).attr("id_provinsi");
        $.ajax({
          type: 'post',
          url: 'API-RajaOngkir/kota.php',
          data: 'id_provinsi=' + id_provinsi,
          success: function(hasil_kota){
            $('#kota').html(hasil_kota);
          }
        })
      })

      // Ketika Kota Berubah
      $('#kota').on('change', function(){
        let nama_provinsi = $("option:selected", this).attr("nama_provinsi");
        let nama_kota = $("option:selected", this).attr("nama_kota");
        let type = $("option:selected", this).attr("type");
        let kodepos = $("option:selected", this).attr("kodepos");
        
        $("input[name=nama_provinsi]").val(nama_provinsi);
        $("input[name=nama_kota]").val(nama_kota);
        $("input[name=kodepos]").val(kodepos);

        $.ajax({
          type: 'post',
          url: 'API-RajaOngkir/ekspedisi.php',
          success: function(hasil_ekspedisi){
            $('#ekspedisi').html(hasil_ekspedisi);

          }
        })        
      })

      $('#ekspedisi').on('change', function(){
        let kota = $("select[name=kota]").val();
        let kurir = $("option:selected", this).attr("value");
        let berat = $("input[name=berat]").attr("value");
        $.ajax({
          type: 'post',
          url: 'API-RajaOngkir/biaya.php',
          data: 'kota=' + kota +
            '&kurir=' + kurir +
            '&berat=' + berat,
          success: function(hasil){
            $('#biaya').html(hasil);
          }
        })
      })




    })


  </script>