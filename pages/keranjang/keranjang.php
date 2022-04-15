<?php if(!empty($_SESSION['keranjang'])) : ?>
<div class="container">
  <h2 class="my-4">Keranjang</h2>
  <table class="table table-bordered text-center bg-light">
    <tr>
      <th>No</th>
      <th>Foto</th>
      <th>Nama</th>
      <th>Harga</th>
      <th>Jumlah yang dibeli</th>
      <th>Sub Total</th>
      <th>Opsi</th>
    </tr>

    <?php 
    $no = 1; 
    $total = 0;
    foreach($_SESSION['keranjang'] as $id_produk => $jumlah) :  
      $query = "SELECT * FROM produk WHERE id_produk = $id_produk";
      $data = ambilData($query);
      $data = $data[0];

      $subTotal = $data['harga_jual'] * $jumlah;
      $total += $subTotal;

    ?>
      <tr>
        <td class="align-middle"><?php echo $no++ ?></td>
        <td class="align-middle"><img src="assets/img/<?php echo $data['foto'] ?>" class="img-thumbnail" width="80"></td>
        <td class="align-middle"><?php echo $data['nama'] ?></td>
        <td class="align-middle"><?php echo number_format($data['harga_jual']) ?></td>
        <td class="align-middle"><?php echo $jumlah ?></td>
        <td class="align-middle"><?php echo number_format($subTotal) ?></td>
        <td class="align-middle">
          <a href="index.php?halaman=hapusKeranjang&id_produk=<?php echo $data['id_produk'] ?>" onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger btn-sm">Hapus</a>
        </td>

      </tr>
    <?php endforeach; ?>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Total: </th>
        <th><?php echo number_format($total) ?></th>
        <th></th>
      </tr>


  </table>
    <div class="text-end">
      <a href="index.php" class="btn btn-primary">Beli Lagi</a>
      <a href="index.php?halaman=checkout" class="btn btn-success">Checkout</a>
    </div>

</div>
<?php else : ?>

  <h2>Kosong</h2>

<?php endif; ?>
