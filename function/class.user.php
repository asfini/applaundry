<?php
include_once "config.php";

class User
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->return_db();
    }

    public function cek_login($username, $password)
    {
        $query = "SELECT * FROM user WHERE username = '$username' AND `password` = '$password'";
        $hasil = $this->db->query($query) or die($this->query->error);
        $data = $hasil->fetch_array(MYSQLI_ASSOC);
        $jumlah_data = $hasil->num_rows;

        if ($jumlah_data == 1) {
            if ($data['level'] == "admin") {
                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['id_outlet'] = $data['id_outlet'];
                header("location:../admin.php");
                return true;
            }
            if ($data['level'] == "kasir") {
                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['id_outlet'] = $data['id_outlet'];
                header("location:../kasir.php");
                return true;
            }
            if ($data['level'] == "owner") {
                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['id_outlet'] = $data['id_outlet'];
                header("location:../owner.php");
                return true;
            }
        } else {
            return false;
        }
    }
    public function get_session()
    {
        return $_SESSION['login'];
    }
    public function logout()
    {
        $_SESSION['login'] = false;
        unset($_SESSION);
        session_destroy();
    }
    public function tampil()
    {
        $query = $this->db->prepare("SELECT * FROM user");
        $query->execute();
        $hasil = $query->get_result();
        return $hasil;
    }
    public function log($id_user)
    {
        $query = $this->db->prepare("INSERT INTO `log` VALUES 
        (null, '$id_user','login','date('[Y-d-m:H:i:s]')')");
        $query->execute();
        return true;
    }
}
