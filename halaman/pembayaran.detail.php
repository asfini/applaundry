<?php
include_once "function/class.transaksi.php";
error_reporting(0);
$trans = new Transaksi();
foreach ($trans->get_idtrans($_GET['id_transaksi']) as $data) {
?>
    <div class="container">
        <form action="proses/proses.pembayaran.php?aksi=bayar" method="POST">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Struk Pembayaran
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <td colspan="4">Kode Invoice</td>
                                    <td colspan="2"><input type="text" readonly name="kode_invoice" value="INV/<?php echo $data['id_transaksi'] ?>" class="form-control"></td>
                                    <td>Tanggal</td>
                                    <td>
                                        <input type="text" name="tgl" value="<?php echo $data['tgl'] ?>" readonly class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>ID</td>
                                    <td><input type="text" readonly name="id_transaksi" value="<?php echo $data['id_transaksi'] ?>" class="form-control"></td>
                                    <td>Outlet</td>
                                    <td>
                                        <input type="text" name="id_outlet" value="<?php echo $data['id_outlet'] ?>" readonly class="form-control">
                                    </td>

                                    <td>Member</td>
                                    <td>
                                        <input type="text" name="id_member" value="<?php echo $data['id_member'] ?>" readonly class="form-control">
                                    </td>
                                    <td>User</td>
                                    <td>
                                        <input type="text" name="id_user" value="<?php echo $data['id_user'] ?>" readonly class="form-control">
                                    </td>
                                </tr>

                            </table>
                            <table>
                                <table class="table table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID Paket</th>
                                            <th scope="col">Nama Paket</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $total = 0;
                                    foreach ($trans->tampil_detail_transaksi($_GET['id_transaksi']) as $data) { ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $data['id_paket'] ?></td>
                                                <td><?php echo $data['nama_paket'] ?></td>
                                                <td><?php echo $data['qty'] ?></td>
                                                <td><?php echo $data['sub_total'] ?></td>
                                            </tr>
                                            <?php $total = $total + $data['sub_total'] ?>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="3">Total</td>
                                            <h3>
                                                <td><input type="number" name="total" value="<?php echo $total ?>" class="form-control" readonly></td>
                                            </h3>
                                        </tr>
                                        <?php
                                        if ($total >= 50000) {
                                            $diskon = 5000;
                                        } else {
                                            $diskon = 0;
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="3">Diskon</td>
                                            <td><input type="text" name="diskon" value="<?php echo $diskon ?>" readonly class="form-control"></td>
                                        </tr>
                                        <?php
                                        $pajak = 0.1 * $total;
                                        ?>
                                        <tr>
                                            <td colspan="3">Pajak (10%)</td>
                                            <td><input type="text" name="pajak" value="<?php echo $pajak ?>" readonly class="form-control"></td>
                                        </tr>
                                        <?php
                                        $total_bayar = $total - $diskon - $pajak;
                                        ?>
                                        <tr>
                                            <td colspan="3">Total Bayar</td>
                                            <td><input type="number" name="total_bayar" id="total_bayar" value="<?php echo $total_bayar ?>" readonly class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Bayar</td>
                                            <td><input type="number" name="bayar" id="bayar" onkeyup="hitung();" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Kembalian</td>
                                            <td><input type="number" min="1" name="kembalian" id="kembalian" onkeyup="hitung();" class="form-control"></td>
                                        </tr>
                                        </tbody>
                                        <tr>
                                            <td colspan="4" align="center"><button type="submit" class="btn btn-primary" onclick="struk();"> Bayar </button></td>
                                        </tr>

                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function hitung() {
                    var total = document.getElementById('total_bayar').value;
                    var bayar = document.getElementById('bayar').value;
                    var result = parseInt(bayar) - parseInt(total);
                    if (!isNaN(result)) {
                        document.getElementById('kembalian').value = result;
                    }
                }

                function struk() {
                    window.print();
                }
            </script>
        </form>
    <?php } ?>