<div class="col-md-9">
    <div align="center">
        <table class="table table-hover" align="center">
            <thead class="thead-dark">
                <tr>
                    <td colspan="7" align="center">
                        <strong> Data Transaksi </strong>
                    </td>
                </tr>
                <tr>
                    <th>ID Transaksi</th>
                    <th>ID Outlet</th>
                    <th>Tanggal</th>
                    <th>Pembayaran</th>
                    <th>ID User</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            require_once "function/class.transaksi.php";
            $trans = new Transaksi();
            $select = $trans->tampil_transaksi();
            foreach ($select as $data) {
            ?>

                <body>
                    <tr>
                        <td><?php echo $data['id_transaksi'] ?></td>
                        <td><?php echo $data['id_outlet'] ?></td>
                        <td><?php echo $data['tgl'] ?></td>
                        <td><?php echo $data['dibayar'] ?></td>
                        <td><?php echo $data['id_user'] ?></td>
                        <td><?php echo $data['status'] ?></td>
                        <?php if ($data['status'] != 'diambil') {
                        ?>
                            <td><a href=" admin.php?halaman=pembayarandetail&id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-primary">Detail</a>
                                | <a href=" admin.php?halaman=edittransaksi&id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-success">Edit</a></td>
                        <?php } ?>

                    </tr>
                </body>
            <?php } ?>
        </table>
    </div>
</div>