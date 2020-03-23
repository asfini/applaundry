<?php
include_once "function/class.transaksi.php";
error_reporting(0);
$trans = new Transaksi();
if ($_POST['btnpaket']) {
    $trans->input_paket(
        $_POST['id_paket'],
        $_POST['qty']
    );
} else if ($_POST['btntransaksi']) {
    $trans->input_transaksi(
        $_POST['id_transaksi'],
        $_POST['id_outlet'],
        $_POST['id_member'],
        $_POST['tgl'],
        $_POST['batas_waktu'],
        $_POST['id_paketx'],
        $_POST['qtyx'],
        $_POST['sub_total'],
        $_POST['keterangan'],
        $_POST['id_user']
    );
    header("location:../applaundry/admin.php?halaman=pembayaran");
}
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

                            <tr>
                                <td>Tanggal</td>
                                <?php $tgl = date('Y-m-d'); ?>
                                <td><input type="text" name="tgl" value="<?php echo $tgl ?>" class="form-control" readonly></td>

                                <td>Batas Waktu</td>
                                <?php $tgl = date('Y-m-d');
                                $tgl2 = date('Y-m-d', strtotime('+3 days', strtotime($tgl)));
                                ?>
                                <td><input type="text" name="batas_waktu" value="<?php echo $tgl2 ?>" class="form-control" readonly></td>
                            </tr>
                            <tr>
                                <td>ID User</td>
                                <td><input type="text" name="id_user" value="<?php echo $_SESSION['id_user'] ?>" readonly class="form-control"></td>

                                <td>Keterangan</td>
                                <td><input type=text name="keterangan" value="" class="form-control"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-header">
                        Paket
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Paket</td>
                                <td><select name="id_paket" class="form-control">
                                        <?php
                                        require_once "function/class.paket.php";
                                        $paket = new Paket;
                                        $select = $paket->tampil();
                                        foreach ($select as $data) {
                                            echo "<option value =$data[id_paket]> $data[nama_paket] - $data[harga] </option>";
                                        }
                                        ?>
                                    </select></td>
                                <td>Quantity</td>
                                <td>
                                    <input type="number" min="1" name="qty" class="form-control">
                                </td>

                                <td>
                                    <input type="submit" name="btnpaket" value="Masukkan" class="btn btn-primary">
                                </td>
                            </tr>
                        </table>

                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID Paket</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($trans->tampil_paket() as $data) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td> <input type="text" class="form-control" readonly name="id_paketx[<?php echo $data['id_paket'] ?>]" value="<?php echo $data['id_paket'] ?>"> </td>
                                        <td> <input type="text" class="form-control" readonly name="nama_paketx[<?php echo $data['id_paket'] ?>]" value="<?php echo $data['nama_paket'] ?>"> </td>
                                        <td> <input type="text" class="form-control" readonly name="hargax[<?php echo $data['id_paket'] ?>]" value="<?php echo $data['harga'] ?>"> </td>
                                        <td> <input type="text" class="form-control" readonly name="qtyx[<?php echo $data['id_paket'] ?>]" value="<?php echo $data['qty'] ?>"> </td>
                                        <td> <input type="text" class="form-control" readonly name="sub_total[<?php echo $data['id_paket'] ?>]" value="<?php echo $data['sub_total'] ?>"> </td>
                                        <td>
                                            <a href="proses/proses.transaksi.php?id_paket=<?php echo $data['id_paket'] ?>&aksi=hapus"> Hapus </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                        </table>
                        <br>
                        <br>
                        <table class="table table-striped">
                            <tr>

                                <td>ID Member</td>
                                <td><select name="id_member" class="form-control">
                                        <?php
                                        require_once "function/class.member.php";
                                        $member = new Member;
                                        $select = $member->tampil();
                                        foreach ($select as $data) {
                                            echo "<option value =$data[id_member]> $data[nama] </option>";
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body">
                        <input type="submit" name="btntransaksi" value="Proses Transaksi" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>