<?php
class Member{
    //member 1 variabel
    private $koneksi;
    //member 2 konstruktor sebagai jembatan class
    public function __construct(){
        global $dbh; //panggil instance object di koneksi .php
        $this->koneksi = $dbh;
    }
    //member 3 CRUD
    public function dataMember(){
        $sql = "SELECT * FROM member
        ORDER BY id DESC";
        /*$data_pegawai = $dbh->query($sql);*/
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
    return $rs;
    }

    public function getMember($id){
        $sql = "SELECT * FROM member WHERE id = ?";
        /*$data_pegawai = $dbh->query($sql);*/
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch ();
    return $rs;
    }


    public function simpan($data){
        $sql = "INSERT INTO member (fullname, email, username, password, role, foto) VALUES 
                (?,?,?,SHA1(MD5(SHA1(?))),?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function ubah($data){
        $sql = "UPDATE member SET fullname=?, email=?, username=?, 
                password=SHA1(MD5(SHA1(?))), role=?, foto=? WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function hapus($id){
        $sql = "DELETE FROM member WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }
    public function cekLogin($data){
        $sql = "SELECT * FROM member WHERE username = ? AND password = SHA1(MD5(SHA1(?)))";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch(); 
        return $rs;   
    }
}