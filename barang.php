<?php
//membuat object dari class pegawai
$model = new Barang();
//memanggil fungsi untuk menampilkan data barang
$data_barang = $model->dataBarang();
/*
foreach ($data_pegawai as $row) {
    print $row['nip'] . "\t";
    print $row['nama'] . "\t";
    print $row['alamat'] . "\n";
}
*/
$sesi = $_SESSION['MEMBER'];
if(isset($sesi)){
?>

<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-4 text-lg">Barang Inventaris</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="index.php?hal=home" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item text-white-50">Barang Inventaris</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section barang">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <?php
                if($sesi['role'] != 'staff'){
                ?>
                <a href="index.php?hal=barang_form" class="btn btn-dark btn-sm" 
                role="button" title="Tambah Barang"> <i class="fa fa-plus" aria-hidden="true"></i></a><br /> <br />
                <?php } ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Kategori Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Status Barang</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($data_barang as $row){
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['kode_brg'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['kategori_brg'] ?></td>
                            <td><?= $row['jumlah'] ?></td>
                            <td><?= $row['status_barang'] ?></td>
                            <td>
                              <form action="barang_controller.php" method="POST">
                                <a href="index.php?hal=detail&id=<?= $row['id'] ?>"> 
                                <button type="button" class="btn btn-info btn-sm" title="Detail Barang"><i class="fa fa-eye"></i></button></a>

                                <?php
                                if($sesi['role'] != 'staff'){
                                ?>
                                <a href="index.php?hal=barang_form&idedit=<?= $row['id'] ?>"> 
                                <button type="button" class="btn btn-warning btn-sm" title="Ubah Barang"><i class="fa fa-edit"></i></button></a>

                                <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                onclick="return confirm('Anda Yakin Data Dihapus?')" title="Hapus Barang"><i class="fa fa-trash"></i></button>
                                <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                                <?php } ?>
                        </form>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php }
else{
  echo '<script>alert("Login Terlebih Dahulu");history.back();</script>';
} ?>