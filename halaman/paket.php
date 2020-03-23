<div class="container">
    <div class="col-md-16">
        <h4 align="center">Paket</h4>
        <br>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        Input Paket
                    </div>
                    <div class="card-body">
                        <form action="" method="POST"></form>
                        <table class="table table-hover">
                            <tr>
                                <td>ID Paket</td>
                                <td><input type="text" name="id_paket" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Outlet</td>
                                <td><select name="id_outlet" class="form-control">
                                        <?php
                                        require_once "function/class.outlet.php";
                                        $outlet = new Outlet;
                                        $select = $outlet->tampil();
                                        foreach ($select as $data) {
                                            echo "<option value =$data[id_outlet]> $data[nama] </option>";
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>
                                    <select name="jenis" class="form-control">
                                        <option value="kiloan">Kiloan</option>
                                        <option value="selimut">Selimut</option>
                                        <option value="bedcover">Bedcover</option>
                                        <option value="kaos">Kaos</option>
                                        <option value="lain">Lain</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Paket</td>
                                <td><input type="text" name="nama_paket" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><input type="number" min="1" name="harga" class="form-control"></td>
                            </tr>

                            <tr>
                                <td colspan="2" align="center"><button type="submit" class="btn btn-primary">Simpan</button></td>
                            </tr>
                        </table>
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
                                    <th scope="col">ID Paket</th>
                                    <th scope="col">ID Outlet</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            require_once "function/class.paket.php";
                            $paket = new Paket();
                            $no = 1;
                            $select = $paket->tampil();
                            foreach ($select as $data) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $data['id_paket'] ?> </td>
                                        <td> <?php echo $data['id_outlet'] ?> </td>
                                        <td> <?php echo $data['jenis'] ?> </td>
                                        <td> <?php echo $data['nama_paket'] ?> </td>
                                        <td> <?php echo $data['harga'] ?> </td>
                                        <td>
                                            <a href="admin.php?halaman=editpaket&id_paket=<?php echo $data['id_paket'] ?>"> Edit </a> |
                                            <a href="proses/proses.paket.php?id_paket=<?php echo $data['id_paket'] ?>&aksi=hapus"> Hapus </a>
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