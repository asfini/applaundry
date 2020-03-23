<?php
include_once "../function/class.transaksi.php";

$trans = new Transaksi();
$aksi = $_GET['aksi'];
if ($aksi == "hapus") {
    $trans->hapus($_GET['id_paket']);
    header("location:../admin.php?halaman=transaksi");
}
if ($aksi == "update") {
    $trans->update_status(
        $_POST['id_transaksi'],
        $_POST['status']
    );
    header("location:../admin.php?halaman=pembayaran");
}
