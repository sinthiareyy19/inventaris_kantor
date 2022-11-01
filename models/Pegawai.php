<?php
class Pegawai{
    //member 1 variabel
    private $koneksi;
    //member 2 konstruktor sebagai jembatan class
    public function __construct(){
        global $dbh; //panggil instance object di koneksi .php
        $this->koneksi = $dbh;
    }
    //member 3 CRUD
    public function dataPegawai(){
        $sql = "SELECT p.id, p.nip,p.nama,p.gender,p.no_hp,p.alamat
        FROM pegawai p 
        ORDER BY p.id DESC";
        /*$data_pegawai = $dbh->query($sql);*/
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
    return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO pegawai (nip, nama, gender, no_hp, alamat) VALUES (?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

}