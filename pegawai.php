<?php
//membuat object dari class pegawai
$model = new Pegawai();
//memanggil fungsi untuk menampilkan data pegawai
$data_pegawai = $model->dataPegawai(); 

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
<section class="page-title bg-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-4 text-lg">Daftar Pegawai</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="index.php?hal=home" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item text-white-50">Daftar Pegawai</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section schedule">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <?php
                if($sesi['role'] != 'staff'){
                ?>
            <a href="index.php?hal=pegawai_form" class="btn btn-info btn-sm" 
                role="button" title="Tambah Pegawai"><i class="fa fa-plus" aria-hidden="true"></i></a><br /> <br />
                <?php } ?>
                <table class="table table-striped mt-2" style="width: 80%; margin : auto;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gender</th>
                            <th scope="col">No HandPhone</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($data_pegawai as $row){
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['nip'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['gender'] ?></td>
                            <td><?= $row['no_hp'] ?></td>
                            <td><?= $row['alamat'] ?></td>
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
