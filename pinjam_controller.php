<?php
include_once 'koneksi.php';
include_once 'models/Pinjam.php';


$no_peminjaman = $_POST['no_peminjaman'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$pegawai_id = $_POST['pegawai'];
$barang_id = $_POST['barang'];
$keterangan = $_POST['keterangan'];

$data = [
    $no_peminjaman,
    $tgl_pinjam,
    $tgl_kembali,
    $pegawai_id,
    $barang_id,
    $keterangan
];

$model = new Pinjam();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;
    
    case 'hapus':
        //hapus dulu data yg diatas
        unset($data); //hapus array
        $model->hapus($_POST['idx']);
         break;
    
    default:
        header('Location:index.php?hal=peminjaman');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=peminjaman');
