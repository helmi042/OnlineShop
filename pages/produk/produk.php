
<?php 
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$limit = 5; 
$limit_start = ($page - 1) * $limit;
$no = $limit_start + 1;

$query = "SELECT * FROM produk 
          INNER JOIN kategori_produk ON produk.id_kategori_produk = kategori_produk.id_kategori_produk 
          ORDER BY produk.id_produk 
          LIMIT $limit_start, $limit";
$data = ambilData($query);
?>

    <!-- Content -->
    <div class="container">
      <div class="row my-3">
        <div class="col-md-6">
          <h2 class="mt-2">Data Produk</h2>    
        </div>
        <div class="col-md-6 text-end">
          <a href="index.php?halaman=tambahProduk" class="btn btn-primary mt-2">Tambah Data</a>
        </div>
      </div>
      <div class="row">

        <table class="table table-bordered text-center bg-light">
          <tr>
            <th>No.</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga Beli(Rp)</th>
            <th>Harga Akhir(Rp)</th>
            <th>Berat</th>
            <th>Opsi</th>
          </tr>

          <?php foreach($data as $d): ?>
          <tr>
            <td class="align-middle"><?php echo $no++ ?></td>
            <td><img src="assets/img/<?php echo $d['foto'] ?>" width="70"></td>
            <td class="align-middle"><?php echo $d['nama'] ?></td>
            <td class="align-middle"><?php echo $d['nama_kategori'] ?></td>
            <td class="align-middle"><?php echo $d['stok'] ?></td>
            <td class="align-middle"><?php echo number_format($d['harga_beli'], 0, ".", ".") ?></td>
            <td class="align-middle"><?php echo number_format($d['harga_jual'], 0, ".", ".") ?></td>
            <td class="align-middle"><?php echo $d['berat'] ?></td>
            <td class="align-middle">
              <a href="index.php?halaman=ubahProduk&id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-warning btn-sm">Ubah</a>
              <a href="index.php?halaman=hapusProduk&id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Produk?')">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>

        <!-- Pagination -->
        <?php
          $query_jumlah = "SELECT count(*) AS jumlah FROM produk";
          $result_jumlah = mysqli_query($conn, $query_jumlah);
          $isi_jumlah = mysqli_fetch_array($result_jumlah);
          $total_records = $isi_jumlah['jumlah'];
        ?>
        <p>Total Data : <?php echo $total_records; ?></p>
        <nav class="mb-5">
          <ul class="pagination justify-content-end">
            <?php
              $jumlah_page = ceil($total_records / $limit);
              $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
              
              if($page == 1){
                echo '<li class="page-item disabled"><a class="page-link" href="?halaman=produk">Awal</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="?halaman=produk"><span aria-hidden="true">&laquo;</span></a></li>';
              } else {
                $link_prev = ($page > 1)? $page - 1 : 1;
                echo '<li class="page-item"><a class="page-link" href="?halaman=produk&page=1">Awal</a></li>';
                echo '<li class="page-item"><a class="page-link" href="?halaman=produk&page='.$link_prev.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
              }
         
              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' active' : '';
                echo '<li class="page-item '.$link_active.'"><a class="page-link" href="?halaman=produk&page='.$i.'">'.$i.'</a></li>';
              }
         
              if($page == $jumlah_page){
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Akhir</a></li>';
              } else {
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                echo '<li class="page-item"><a class="page-link" href="?halaman=produk&page='.$link_next.'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item"><a class="page-link" href="?halaman=produk&page='.$jumlah_page.'">Akhir</a></li>';
              }
            ?>
          </ul>
        </nav>
        <!-- End Pagination -->

      </div>
    </div>
    <!-- End Content -->