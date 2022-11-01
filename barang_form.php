<?php
//membuat object dari class Kategori
$obj_kategori = new Kategori();
$obj_barang = new Barang();
//memanggil fungsi untuk menampilkan data kategori
$data_kategori = $obj_kategori->dataKategori();
/*
foreach ($data_pegawai as $row) {
    print $row['nip'] . "\t";
    print $row['nama'] . "\t";
    print $row['alamat'] . "\n";
}
*/

//----proses edit data----
//tangkap req idedit di url (setelah klik tombol edit)
$idedit = $_REQUEST['idedit'];
//jika ada req id edit maka di form menampilkan data lama
$brg = !empty($idedit) ? $obj_barang->getBarang($idedit) : array() ;
?>

<section class="contact-form-wrap section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-sm-12 col-sm-12">
            <p class="h3 mb-2 text-center">Tambah Barang</p>
            <form class="border border-light p-5" action="barang_controller.php" method="POST">

            <label class="form-label">Kode Barang</label>
            <input class="form-control mb-4" name="kode" id="kode" type="text" placeholder="Kode Barang" value="<?= $brg['kode_brg'] ?>">
        
            <label class="form-label">Nama Barang</label>
            <input class="form-control mb-4" name="nama" id="nama" type="text" placeholder="Nama Barang" value="<?= $brg['nama'] ?>">

            <label class="form-label">Jumlah Barang</label>
            <input class="form-control mb-4" name="jumlah" id="jumlah" type="text" placeholder="Jumlah Barang" value="<?= $brg['jumlah'] ?>">

            <label class="form-label">Katerangan Barang</label>
            <textarea class="form-control mb-4" name="keterangan" id="keterangan"  placeholder="Keterangan Barang"><?= $brg['keterangan'] ?></textarea>

            <label class="form-label">Status Barang</label>
            <input class="form-control mb-4" name="status" id="status" type="text" placeholder="Status Barang" value="<?= $brg['status_barang'] ?>">

            <label class="form-label">Foto Barang</label>
                <input type="text" class="form-control mb-4" name="foto" id="foto" placeholder="Foto Barang" value="<?= $brg['foto'] ?>">

            <label class="form-label">Kategori Barang</label>
            <select class="browser-default custom-select mb-4" name="kategori">
                <option selected>Kategori Barang</option>
                <?php
                foreach($data_kategori as $kat){
                    //edit kategori
                    $selected = $brg['kategori_id'] == $kat['id'] ? 'selected' : '';
                ?> 
                <option value="<?= $kat['id'] ?>" <?= $selected ?>><?= $kat['nama'] ?></option>
                <?php } ?>
            </select>         
             <div class="submit col-12 text-center">
                <?php
                //jika kosong maka simpan data
                if(empty($idedit)){
                ?>
                <button type="submit" name="proses" value="simpan" class="btn btn-success">Simpan</button>
                <?php
                }
                else{
                ?>
                <button type="submit" name="proses" value="ubah" class="btn btn-info">Ubah</button>
                <input type="hidden" name="idx" value="<?= $idedit ?>">
                <?php } ?>

                <button type="submit" name="proses" value="batal" class="btn btn-danger">Batal</button>
            </div>
         </form>
        </div>
	  </div>
	</div>
</section>

