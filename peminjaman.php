<?php
//membuat object dari class pegawai
$model = new Pinjam();
//memanggil fungsi untuk menampilkan data pegawai
$data_peminjaman = $model->dataPinjam(); 

/*
foreach ($data_pegawai as $row) {
    print $row['nip'] . "\t";
    print $row['nama'] . "\t";
    print $row['alamat'] . "\n";
}
*/
?>

<section class="section schedule">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mt-3">
                    <h3>Daftar <span class="alternate">Peminjaman Barang</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped mt-2" style="width: 80%; margin : auto;">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                            <th scope="col">No.Peminjaman</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Tanggal Pengembalian</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($data_peminjaman as $row){
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['no_peminjaman'] ?></td>
                            <td><?= $row['tgl_pinjam'] ?></td>
                            <td><?= $row['tgl_kembali'] ?></td>
                            <td><?= $row['pegawai'] ?></td>
                            <td><?= $row['barang'] ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <td>
                              <form action="pinjam_controller.php" method="POST">
                                <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                onclick="return confirm('Anda Yakin Data Dihapus?')" title="Hapus Barang"><i class="fa fa-trash"></i></button>
                                <input type="hidden" name="idx" value="<?= $row['id'] ?>">
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

