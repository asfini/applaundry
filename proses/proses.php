<?php
include_once "../function/class.user.php";

$user = new User();
$aksi = $_GET['aksi'];
if ($aksi == "simpan") {
    $menu->input(
        $_POST['id_menu'],
        $_POST['nama_menu'],
        $_POST['harga'],
        $_POST['kategori']
    );
    header("location:../admin.php?halaman=user");
}
