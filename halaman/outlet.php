<div class="container">
    <div class="col-md-16">
        <h4 align="center">Outlet</h4>
        <br>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        Input Outlet
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <table class="table table-hover">
                                <tr>
                                    <td>ID Outlet</td>
                                    <td><input type="text" name="id_oulet" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" name="nama" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input type="text" name="alamat" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Telpon</td>
                                    <td><input type="text" name="tlp" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-primary">Simpan</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        Data Outlet
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID Outlet</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Telpon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            require_once "function/class.outlet.php";
                            $outlet = new Outlet();
                            $no = 1;
                            $select = $outlet->tampil();
                            foreach ($select as $data) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $data['id_outlet'] ?> </td>
                                        <td> <?php echo $data['nama'] ?> </td>
                                        <td> <?php echo $data['alamat'] ?> </td>
                                        <td> <?php echo $data['tlp'] ?> </td>
                                        <td>
                                            <a href="admin.php?halaman=editoutlet&id_outlet=<?php echo $data['id_outlet'] ?>"> Edit </a> |
                                            <a href="proses/proses.outlet.php?id_outlet=<?php echo $data['id_outlet'] ?>&aksi=hapus"> Hapus </a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>