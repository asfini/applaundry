<div class="container">
    <div class="col-lg-12">
        <h4 align="center">User</h4>
        <br>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        Input User
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <table class="table table-hover">
                                <tr>
                                    <td>ID User</td>
                                    <td><input type="text" name="id_user" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" name="nama" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="username" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="password" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Outlet</td>
                                    <td>
                                        <select name="id_outlet" class="form-control">
                                            <?php
                                            require_once "function/class.outlet.php";
                                            $outlet = new Outlet;
                                            $select = $outlet->tampil();
                                            foreach ($select as $data) {
                                                echo "<option value =$data[id_outlet]> $data[nama] </option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Level</td>
                                    <td>
                                        <select name="level" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="admin">Kasir</option>
                                            <option value="owner">Owner</option>
                                        </select>
                                    </td>
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
                        Data User
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID User</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Outlet</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            require_once "function/class.user.php";
                            $user = new User();
                            $no = 1;
                            $select = $user->tampil();
                            foreach ($select as $data) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $no++; ?> </td>
                                        <td> <?php echo $data['nama'] ?> </td>
                                        <td> <?php echo $data['username'] ?> </td>
                                        <td> <?php echo $data['id_outlet'] ?> </td>
                                        <td> <?php echo $data['level'] ?> </td>
                                        <td>
                                            <a href="admin.php?halaman=edituser&id_user=<?php echo $data['id_user'] ?>"> Edit </a> |
                                            <a href="proses/proses.user.php?id_user=<?php echo $data['id_user'] ?>&aksi=hapus"> Hapus </a>
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