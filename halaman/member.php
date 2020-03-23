<div class="container">
    <div class="col-md-16">
        <h4 align="center">Member</h4>
        <br>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        Input Member
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <table class="table table-hover">
                                <tr>
                                    <td>ID Member</td>
                                    <td><input type="text" name="id_member" class="form-control"></td>
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
                                    <td>Jenis Kelamin</td>
                                    <td>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
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
                        Data Member
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID Member</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Telpon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            require_once "function/class.member.php";
                            $member = new Member();
                            $no = 1;
                            $select = $member->tampil();
                            foreach ($select as $data) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $data['id_member'] ?> </td>
                                        <td> <?php echo $data['nama'] ?> </td>
                                        <td> <?php echo $data['alamat'] ?> </td>
                                        <td> <?php echo $data['jenis_kelamin'] ?> </td>
                                        <td> <?php echo $data['tlp'] ?> </td>
                                        <td>
                                            <a href="admin.php?halaman=editmember&id_member=<?php echo $data['id_member'] ?>"> Edit </a> |
                                            <a href="proses/proses.member.php?id_member=<?php echo $data['id_member'] ?>&aksi=hapus"> Hapus </a>
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