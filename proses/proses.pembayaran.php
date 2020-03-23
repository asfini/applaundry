<?php
include_once "../function/class.transaksi.php";

$trans = new Transaksi();
$aksi = $_GET['aksi'];
if ($aksi == "bayar") {
    $trans->pembayaran(
        $_POST['id_transaksi'],
        $_POST['kode_invoice'],
        $_POST['tgl'],
        $_POST['total_bayar'],
        $_POST['diskon'],
        $_POST['pajak'],
        $_POST['status'],
        $_POST['dibayar']
    );
    header("location:../admin.php?halaman=pembayaran");
}
