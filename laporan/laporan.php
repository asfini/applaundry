<div class="col-sm-9">
    <div class="card">
        <div class="card-header">
            Laporan
        </div>
        <div class="card-body">
            <?php
            include_once "function/class.laporan.php";
            //rror_reporting(0);
            $lap = new Laporan();
            ?>
            <table class="table table-hover" align="center" border="1" width="600px">
                <thead class="thead-dark">
                    <tr>
                        <td colspan="7" align="center">
                            <strong> Laporan </strong>
                        </td>
                    </tr>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>ID Outlet</th>
                        <th>Tanggal</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <?php
                $total = 0;
                require_once "function/class.laporan.php";
                $select = $lap->laporan();
                foreach ($select as $data) {

                ?>

                    <body>
                        <tr>
                            <td><?php echo $data['id_transaksi'] ?></td>
                            <td><?php echo $data['id_outlet'] ?></td>
                            <td><?php echo $data['tgl'] ?></td>
                            <td><?php echo $data['biaya_tambahan'] ?></td>
                        </tr>
                    </body>

                <?php
                    $total = $total + $data['biaya_tambahan'];
                } ?>
                <tr>
                    <td colspan="3">Total</td>
                    <td><?php echo $total ?></td>
                </tr>
            </table>

            <button type="submit" id="myfunction" onclick="myFunction();" class="btn btn-primary">Print</button>

            <script>
                window.print();
            </script>
        </div>
    </div>
</div>

<script>
    function myFunction() {
        window.print();
    }
</script>