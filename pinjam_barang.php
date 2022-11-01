<?php
//membuat object dari class Kategori
$obj_pegawai = new Pegawai();
$obj_barang = new Barang();
//memanggil fungsi untuk menampilkan data kategori
$data_barang = $obj_barang->dataBarang(); 
$data_pegawai = $obj_pegawai->dataPegawai(); 
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

<section class="contact-form-wrap section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-sm-12 col-sm-12">
            <p class="h3 mb-2 text-center">Peminjaman Barang</p>
            <form class="border border-light p-5" action="pinjam_controller.php" method="POST">

            <label class="form-label">No Peminjaman</label>
            <input class="form-control mb-4" name="no_peminjaman" id="no_peminjaman" type="text" placeholder="No Peminjaman">
        
            <label class="form-label">Tanggal Peminjaman</label>
            <input class="form-control mb-4" name="tgl_pinjam" id="tgl_pinjam" type="date" placeholder="Tanggal Peminjaman">

            <label class="form-label">Tanggal Pengembalian</label>
            <input class="form-control mb-4" name="tgl_kembali" id="tgl_kembali" type="date" placeholder="Tanggal Pengembalian">

            <label class="form-label">Data Pegawai</label>
            <select class="browser-default custom-select mb-4" name="pegawai">
                <option selected>Data Pegawai</option>
                <?php
                foreach($data_pegawai as $peg){
                ?> 
                <option value="<?= $peg['id'] ?>"><?= $peg['nama'] ?></option>
                <?php } ?>
            </select>  
            
            <label class="form-label">Data Barang</label>
            <select class="browser-default custom-select mb-4" name="barang">
                <option selected>Data Barang</option>
                <?php
                foreach($data_barang as $brg){
                ?> 
                <option value="<?= $brg['id'] ?>"><?= $brg['nama'] ?></option>
                <?php } ?>
            </select> 
          
            <label class="form-label">Katerangan</label>
            <textarea class="form-control mb-4" name="keterangan" id="keterangan"  placeholder="Keterangan Peminjaman"></textarea>

             <div class="submit col-12 text-center">
                <button type="submit" name="proses" value="simpan" class="btn btn-success">Simpan</button>
                <button type="submit" name="proses" value="batal" class="btn btn-danger">Batal</button>
            </div>
         </form>
        </div>
	  </div>
	</div>
</section>

<?php }
else{
   echo '<script>alert("Login Terlebih Dahulu");history.back();</script>';
} ?>
