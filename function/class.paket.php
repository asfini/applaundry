<?php
include_once "config.php";

class Paket
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }
    public function input($id_paket, $id_outlet, $jenis, $nama_paket, $harga)
    {
        $query = $this->db->prepare("INSERT INTO paket VALUES 
        ('$id_paket','$id_outlet','$jenis','$nama_paket','$harga')");
        $query->execute();
        return true;
    }
    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM paket");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
}
