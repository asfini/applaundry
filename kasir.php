<?php
session_start();
include_once 'function/class.user.php';
$user = new User();

$id_user = $_SESSION['id_user'];
$level = $_SESSION['level'];

if ($level != "kasir") {
    header("location:index.php");
}
if (!$user->get_session()) {
    header("location:index.php");
}

if (isset($_GET['logout'])) {
    $user->logout();
    header("location:index.php");
}
?>

<html>

<head>
    <title>
        App Laundry
    </title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="assets/js/jquery.js"></script>

</head>

<body>
    <center>
        <div class="jumbotron">
            <h1 class="display-4">App Laundry</h1>
        </div>
    </center>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-info" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="kasir.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="kasir.php?halaman=transaksi">Transaksi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="kasir.php?halaman=pembayaran">Pembayaran</a>
                </li>
            </ul>

        </div>
        <div class="nav navbar-nav navbar-right">
            <a class="nav-item nav-link bg-danger" href="kasir.php?logout=logout">Logout</a>
        </div>
    </nav>

    <center>
        <div>
            <?php
            if (isset($_GET['halaman'])) {
                $halaman  = $_GET['halaman'];
                switch ($halaman) {

                    case 'transaksi':
                        include "halaman/transaksi.php";
                        break;
                    case 'pembayaran':
                        include "halaman/pembayaran.php";
                        break;
                }
            }
            ?>
        </div>
    </center>
</body>

</html>