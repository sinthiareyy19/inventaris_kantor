<?php
class Pinjam{
    //member 1 variabel
    private $koneksi;
    //member 2 konstruktor sebagai jembatan class
    public function __construct(){
        global $dbh; //panggil instance object di koneksi .php
        $this->koneksi = $dbh;
    }

    public function dataPinjam(){
        $sql = "SELECT m.id,m.no_peminjaman,m.tgl_pinjam,m.tgl_kembali,p.nama AS pegawai,b.nama AS barang,m.keterangan
        FROM peminjaman_brg m
        INNER JOIN pegawai p ON p.id = m.pegawai_id
        INNER JOIN barang b ON b.id = m.barang_id
        ORDER BY m.id DESC";
        /*$data_pegawai = $dbh->query($sql);*/
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
    return $rs;
    }
    
    public function simpan($data){
        $sql = "INSERT INTO peminjaman_brg (no_peminjaman, tgl_pinjam, tgl_kembali, pegawai_id, barang_id, keterangan) VALUES (?,?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function hapus($id){
        $sql = "DELETE FROM peminjaman_brg WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }

}