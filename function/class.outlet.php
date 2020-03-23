<?php
include_once "config.php";

class Outlet
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }
    public function input($id_outlet, $nama, $alamat, $tlp)
    {
        $query = $this->db->prepare("INSERT INTO outlet VALUES 
        ('$id_outlet','$nama','$alamat','$tlp')");
        $query->execute();
        return true;
    }
    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM outlet");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
}
