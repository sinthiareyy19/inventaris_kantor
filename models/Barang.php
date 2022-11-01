<?php
class Barang{
    //member 1 variabel
    private $koneksi;
    //member 2 konstruktor sebagai jembatan class
    public function __construct(){
        global $dbh; //panggil instance object di koneksi .php
        $this->koneksi = $dbh;
    }
    //member 3 CRUD
    public function dataBarang(){
        $sql = "SELECT b.id,b.kode_brg,b.nama,b.jumlah,b.keterangan,b.status_barang,b.foto,  k.nama AS kategori_brg
        FROM barang b
        INNER JOIN kategori_brg k ON k.id = b.kategori_id
        ORDER BY b.id DESC";
        /*$data_pegawai = $dbh->query($sql);*/
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
    return $rs;
    }

    public function getBarang($id){
        $sql = "SELECT b.*, k.nama AS kategori_brg
        FROM barang b
        INNER JOIN kategori_brg k ON k.id = b.kategori_id
        WHERE b.id = ?";
        /*$data_pegawai = $dbh->query($sql);*/
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch ();
    return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO barang (kode_brg, nama, jumlah, keterangan, status_barang, foto, kategori_id)
        VALUES (?,?,?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function ubah($data){
        $sql = "UPDATE barang SET kode_brg=?, nama=?, jumlah=?, keterangan=?, 
        status_barang=?, foto=?, kategori_id=? WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function hapus($id){
        $sql = "DELETE FROM barang WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }
}