<?php 
require_once 'models/Pegawai.php';
//Ciptakan object dari class produk
$obj = new Pegawai();

//panggil method tampilkan data
$rs = $obj->dataPegawai();
?>

<?php 
  $member = $_SESSION['MEMBER'];
  if(isset($member)){                      
?>
<a href="index.php?hal=formPegawai" name="proses" class="btn btn-primary mb-3">Tambah</a>
<?php
  }
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nip</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Agama</th>
      <th scope="col">Divisi</th>
      <th scope="col">Action </th>
    </tr>
  </thead>
  <tbody>
    <?php
        $no = 1;
        foreach($rs as $prod){
    ?>

    <tr>
      <td><?= $no; ?></td>
      <td><?= $prod['nip']; ?></td>
      <td><?= $prod['nama']; ?></td>
      <td><?= $prod['email']; ?></td>
      <td><?= $prod['agama']; ?></td>
      <td><?= $prod['divisi']; ?></td>
      <td>
        <form method="POST" action="controllers/pegawaiController.php">
            <a href="index.php?hal=detailPegawai&id=<?= $prod['id'] ?>" class="btn btn-info">Detail</a>

            <?php 
              $role = $member['role'];
              $member = $_SESSION['MEMBER'];
              if(isset($member)){                      
            ?>

            <a href="index.php?hal=formEditPegawai&id=<?= $prod['id'] ?>" class="btn btn-warning">Ubah</a>

            <?php
              if($role != 'staff'){
            ?>
            <button class="btn btn-danger" name="proses" value="hapus" onclick="return confirm('Anda yakin data dihapus?')">Hapus</button>
            <?php } ?>
            <input type="hidden" name="idx" value="<?= $prod['id'] ?>">
            
            <?php 
              }
            ?>
          </form>
      </td>
    </tr>
    <?php
        $no++;
        }
    ?>
  </tbody>
</table>