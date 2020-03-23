<?php
session_start();
include_once "../function/class.user.php";
$user = new User();

$aksi = $_GET['aksi'];
if ($aksi == "login") {
    $login = $user->cek_login(
        $_POST['username'],
        $_POST['password']
    );
    if ($login) {
        $user->log($_POST['$username']);
        return true;
    } else {
        echo "Username dan Password Salah";
        header("location:../index.php");
    }
}
