<?php
include_once 'koneksi.php';
include_once 'models/Barang.php';
// step 1 tangkap req form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];
$foto = $_POST['foto'];
$kategori = $_POST['kategori'];

//step 2 simpan di array
$data = [
    $kode, // ? 1
    $nama, // 2 ?
    $jumlah, // 3
    $keterangan, // 4
    $status, // 5
    $foto, // 6
    $kategori // 7
];

//step 3 proses tombol
$model = new Barang();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    case 'ubah':
        $data[] = $_POST['idx']; $model->ubah($data);
         break;
    
    case 'hapus':
        //hapus dulu data yg diatas
        unset($data); //hapus array
        $model->hapus($_POST['idx']);
         break;

    default:  //diarahkan jika batal
        header('Location:index.php?hal=barang');
        break;
}
//step 4 ke halaman jika sudah selesai prosesnya
header('Location:index.php?hal=barang');