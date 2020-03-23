<?php
require_once "function/class.transaksi.php";
$transaksi = new Transaksi();
foreach ($transaksi->get_idtrans($_GET['id_transaksi']) as $data) {
?>
    <div class="container">
        <div class="col-md-16">
            <h4 align="center">Transaksi</h4>
            <br>
            <div class="row">
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-header">
                            Edit Transaksi
                        </div>
                        <div class="card-body">
                            <form action="proses/proses.transaksi.php?aksi=update" method="POST">
                                <table class="table table-hover">
                                    <tr>
                                        <td>ID Transaksi</td>
                                        <td><input type="text" name="id_transaksi" class="form-control" value="<?php echo $_GET['id_transaksi'] ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><select name="status" class="form-control">
                                                <option value="proses">Proses</option>
                                                <option value="selesai">Selesai</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td><button type="submit" class="btn btn-primary"> Update </button></td>
                                    </tr>
                                </table>
                            <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>