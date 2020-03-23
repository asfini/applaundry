<?php
include_once "function/class.transaksi.php";
error_reporting(0);
$trans = new Transaksi();
?>
<div class="container">
    <h4 align="center">Transaksi</h4>
    <form action="" method="POST">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Input Transaksi
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <td>ID Transaksi</td>
                                <td><input type="text" readonly name="id_transaksi" value="<?php echo $trans->idauto('nextID'); ?>" class="form-control"></td>
                                <td>Outlet</td>
                                <td>
                                    <input type="text" name="id_outlet" value="<?php echo $_SESSION['id_outlet'] ?>" readonly class="form-control">
                                </td>
                            </tr>