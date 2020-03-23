<?php
include_once "../function/class.laporan.php";
//rror_reporting(0);
$lap = new Laporan();
$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];
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
    require_once "../function/class.laporan.php";
    $select = $lap->laporan($tgl1, $tgl2);
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

<script>
    window.print();
</script>