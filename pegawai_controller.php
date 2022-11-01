<?php
include_once 'koneksi.php';
include_once 'models/Pegawai.php';

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];

$data = [
    $nip,
    $nama,
    $gender,
    $no_hp,
    $alamat
];

$model = new Pegawai();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;
    
    default:
        header('Location:index.php?hal=pegawai');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=pegawai');
