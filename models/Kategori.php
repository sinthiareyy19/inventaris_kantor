<?php
class Kategori{
    //member 1 variabel
    private $koneksi;
    //member 2 konstruktor sebagai jembatan class
    public function __construct(){
        global $dbh; //panggil instance object di koneksi .php
        $this->koneksi = $dbh;
    }
    //member 3 CRUD
    public function dataKategori(){
        $sql = "SELECT * FROM kategori_brg";
        /*$data_pegawai = $dbh->query($sql);*/
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
    return $rs;
    }

}