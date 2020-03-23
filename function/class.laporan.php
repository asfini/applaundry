<?php
include_once "config.php";

class Laporan
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }
    public function laporan()
    {
        $query = $this->db->prepare("SELECT * FROM transaksi WHERE dibayar = 'bayar'");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
}
