<?php
//membuat object dari class pegawai
$model = new Kategori();
//memanggil fungsi untuk menampilkan data pegawai
$data_kategori = $model->dataKategori();
/*
foreach ($data_pegawai as $row) {
    print $row['nip'] . "\t";
    print $row['nama'] . "\t";
    print $row['alamat'] . "\n";
}
*/
?>

<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-4 text-lg">Kategori Barang</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="index.php?hal=home" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item text-white-50">Kategori Barang</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section schedule">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($data_kategori as $row){
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['nama'] ?></td>
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