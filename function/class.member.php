<?php
include_once "config.php";

class Member
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }
    public function input($id_member, $nama, $alamat, $jenis_kelamin, $tlp)
    {
        $query = $this->db->prepare("INSERT INTO member VALUES 
        ('$id_member','$nama','$alamat','$jenis_kelamin','$tlp')");
        $query->execute();
        return true;
    }
    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM member");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
}
