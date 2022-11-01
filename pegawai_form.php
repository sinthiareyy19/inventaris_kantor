<?php
$obj_pegawai = new Pegawai();
?>
<section class="Pegawai-form-wrap section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-sm-12 col-sm-12">
            <p class="h3 mb-2 text-center">Tambah Pegawai</p>
            <form class="border border-light p-5" action="pegawai_controller.php" method="POST">

            <input class="form-control mb-4" name="nip" id="nip" type="text" placeholder="NIP">
        
       
            <input class="form-control mb-4" name="nama" id="nama" type="text" placeholder="Nama">

            <label class="form-label">Jenis Kelamin</label>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="L">
                    <label class="form-check-label">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="P">
                    <label class="form-check-label">
                        Perempuan
                    </label>
                </div>
            </div>
<br />
            <input class="form-control mb-4" name="no_hp" id="no_hp"  placeholder="No Handphone"></textarea>

            <textarea class="form-control mb-4" name="alamat" id="alamat"  placeholder="Alamat"></textarea>

     
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

