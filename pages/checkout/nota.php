<?php 

$id_penjualan = $_GET['id_penjualan'];

$query = "SELECT * FROM penjualan
            INNER JOIN pelanggan ON penjualan.id_pelanggan = pelanggan.id_pelanggan
            INNER JOIN pengiriman ON penjualan.id_pengiriman = pengiriman.id_pengiriman
            WHERE id_penjualan = $id_penjualan";

$data = ambilData($query);
$data = $data[0];

?>
<div class="container-fluid">
  <div id="ui-view" data-select2-id="ui-view">
    <br><br><br>
    <div class="card">
      <div class="card-header">Invoice
        <strong>#BBB-10010110101938</strong>
        <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
          <i class="fa fa-print"></i> Print</a>
          <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" data-abc="true">
            <i class="fa fa-save"></i> Save</a>
      </div>
      <div class="card-body">

        <div class="row mb-4">
          <div class="col-sm-4">
            <h6 class="mb-3">From:</h6>
            <div>
              <strong>Code Me</strong>
            </div>
            <div>Kalteng, Palangka Raya, 74874</div> 
            <div><b>Email:</b> helmiaps@gmail.com</div>
            <div><b>Telp:</b> 0819-9520-1372</div>
          </div>
          <div class="col-sm-4">
            <h6 class="mb-3">To:</h6>
            <div>
              <strong><?php echo $data['nama_pelanggan'] ?></strong>
            </div>
            <div><?php echo $data['nama_provinsi'] ?>, <?php echo $data['nama_kota'] ?>, <?php echo $data['kodepos'] ?></div>
            <div><b>Email:</b> <?php echo $data['email_pelanggan'] ?></div>
            <div><b>Telp:</b> <?php echo $data['nohp_pelanggan'] ?></div>
          </div>
          <div class="col-sm-4">
            <h6 class="mb-3">Details:</h6>
            <div>
              <strong>Penjualan ke-<?php echo $data['id_penjualan'] ?></strong>
            </div>
            <div><b>Tanggal: </b><?php echo $data['tanggal_penjualan'] ?></div>
            <div><b>Ekspedisi: </b><?php echo ucfirst($data['ekspedisi']) . ' (Rp. ' . number_format($data['ongkir']) . ')' ?></div>
            <div><b>Alamat</b>: <?php echo $data['alamat'] ?></div>
          </div>
        </div>

        <div class="table-responsive-sm my-5">
          
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Harga(Rp.)</th>
                <th>Jumlah yang dibeli</th>
                <th>Sub Total Produk(Rp.)</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $queryPenjualanProduk = "SELECT * FROM penjualan_produk JOIN produk ON penjualan_produk.id_produk = produk.id_produk WHERE id_penjualan = $id_penjualan";
              $dataPenjualanProduk = ambilData($queryPenjualanProduk);
              $subTotal = 0;

              foreach($dataPenjualanProduk as $d) : 
              $subTotalProduk = $d['harga_jual'] * $d['jumlah'];
              $subTotal += $subTotalProduk;
              ?>

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d['nama'] ?></td>
                <td><?php echo number_format($d['harga_jual']) ?></td>
                <td><?php echo $d['jumlah'] ?></td>
                <td><?php echo number_format($subTotalProduk) ?></td>
              </tr>
              <?php endforeach ?>

            </tbody>
          </table>
        </div>

        <div class="row justify-content-between">
          <div class="col-lg-4">Silahkan Melakukan Pembayaran Sejumlah Rp. <?php echo number_format($subTotal + $data['ongkir']) ?> <strong>Ke BANK BRI 454-40102057-8530 AN. Helmi S</strong></div>
          <div class="col-lg-4">
            <table class="table">
              <tbody>
                <tr>
                  <td><strong>Subtotal</strong></td>
                  <td>Rp. <?php echo number_format($subTotal) ?></td>
                </tr>
                <tr>
                  <td><strong>Ongkir</strong></td>
                  <td>Rp. <?php echo number_format($data['ongkir']) ?></td>
                </tr>
                <tr>
                  <td><strong>Total</strong></td>
                  <td><strong>Rp. <?php echo number_format($subTotal + $data['ongkir']) ?></strong></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
                <br><br><br><br><br>
      </div>
    </div>
  </div>
</div>