<?php
session_start();
// error_reporting(0);
//file koneksi
include_once 'koneksi.php';
//model
include_once 'models/Pegawai.php';
include_once 'models/Barang.php';
include_once 'models/Kategori.php';
include_once 'models/Pinjam.php';
include_once 'models/Member.php';



include_once 'header.php';
include_once 'navigation.php';


//menampilkan halamna jika di req oleh url
if (isset($_REQUEST['hal'])) {
    $hal = $_REQUEST['hal'];
    if(!empty($hal)){
        include_once $hal.'.php';
    }
    else{
        include_once 'home.php';
    }
}else{
    include_once 'home.php';
}
include_once 'footer.php';