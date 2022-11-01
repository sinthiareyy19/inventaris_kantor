<?php
//membuat object dari class pegawai
$id = $_REQUEST['id'];
$model = new Barang();
//memanggil fungsi untuk menampilkan data pegawai
$barang = $model->getBarang($id);
/*
foreach ($data_pegawai as $row) {
    print $row['nip'] . "\t";
    print $row['nama'] . "\t";
    print $row['alamat'] . "\n";
}
*/
?>

<section class="section about position-relative">
	<div class="container">
		<div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Detail <span class="alternate">Barang Inventaris</span></h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 align-self-md-center">
                <div class="image-block">
                    <img src="images/barang/<?= $barang['foto'] ?>" class="img-fluid" alt="barang">
                </div>
            </div>
			<div class="col-lg-7 col-md-6 align-self-center">
				<div class="detail-produk">
                    <div class="nama">
                        <h4><?= $barang['nama'] ?></h4>
                    </div>
                    <div class="alert alert-secondary" role="alert">
                        <ul class="m-1 p-0">
                            <li>Kode Barang : <?= $barang['kode_brg'] ?></li>
                            <li>Kategori Barang : <?= $barang['kategori_brg'] ?></li>
                            <li>Jumlah Barang : <?= $barang['jumlah'] ?></li>
                            <li>Status Barang : <?= $barang['status_barang'] ?></li>
                            <li>Keterangan Barang : <?= $barang['keterangan'] ?></li>
                        </ul>
                    </div>
                    <br />
                    <input type="button" value="Go Back" class="btn btn-info btn-sm" onclick="history.back(-1)" />
				</div>
			</div>
		</div>
	</div>
</section>
