
<?php 
$query = "SELECT * FROM pelanggan";
$data = ambilData($query);
?>

    <!-- Content -->
    <div class="container">
      <h2 class="my-4">Data Pelanggan</h2>    
      <div class="row">

        <table class="table table-bordered text-center bg-light">
          <tr>
            <th>No.</th>
            <th>Foto</th>
            <th>Email</th>
            <th>Password</th>
            <th>Nama</th>
            <th>No Hp</th>
            <th>Opsi</th>
          </tr>

          <?php $no = 1; ?>
          <?php foreach($data as $d): ?>
          <tr>
            <td class="align-middle"><?php echo $no++ ?></td>
            <td><img src="assets/img/<?php echo $d['foto_pelanggan'] ?>" width="70"></td>
            <td class="align-middle"><?php echo $d['email_pelanggan'] ?></td>
            <td class="align-middle"><?php echo $d['password_pelanggan'] ?></td>
            <td class="align-middle"><?php echo $d['nama_pelanggan'] ?></td>
            <td class="align-middle"><?php echo $d['nohp_pelanggan'] ?></td>
            <td class="align-middle">
              <a href="index.php?halaman=ubahPelanggan&id_pelanggan=<?php echo $d['id_pelanggan'] ?>" class="btn btn-warning btn-sm">Ubah</a>
              <a href="index.php?halaman=hapusPelanggan&id_pelanggan=<?php echo $d['id_pelanggan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pelanggan?')">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>

      </div>
    </div>
    <!-- End Content -->