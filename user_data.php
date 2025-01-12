<style>
.img-circle img {
    border-radius: 50%;
    width: 50px;
    height: 50px;
    object-fit: cover;
}
</style>

<table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th class="w-75">Username</th>
                        <th class="w-5 ">Profile</th>
                        <th class="w-15">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";

                    $hlm = (isset($_POST['hlm'])) ? $_POST['hlm'] : 1;
                    $limit = 5;
                    $limit_start = ($hlm - 1) * $limit;
                    $no = $limit_start + 1;

                    $sql = "SELECT * FROM user LIMIT $limit_start, $limit";
                    $hasil = $conn->query($sql);

                    $no = 1;
                    while ($row = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                        <td><?= $no++ ?></td>
                            <td>
                                <b><?= $row["username"] ?></b>
                            </td>
                            <td class="img-circle">
                                <?php
                                if ($row["gambar"] != '') {
                                    if (file_exists('gambar/' . $row["gambar"] . '')) {
                                ?>
                                        <img src="gambar/<?= $row["gambar"] ?>" width="50">
                                <?php
                                    }
                                }
                                ?>
                            </td>
                                <td>
                                    <a href="#" title="edit" class="badge rounded-pill text-bg-success" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>"><i class="bi bi-pencil"></i></a>
                                    <a href="#" title="delete" class="badge rounded-pill text-bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>"><i class="bi bi-x-circle"></i></a>

                                    <!-- Awal Modal Edit -->
                                    <div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="formGroupExampleInput" class="form-label">Username</label>
                                                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                            <input type="text" class="form-control" name="username" placeholder="Ganti Username" value="<?= $row["username"] ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="floatingTextarea2">Password</label>
                                                            <textarea class="form-control" placeholder="Ganti Password" name="password" required><?= $row["password"] ?></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formGroupExampleInput2" class="form-label">Ganti Profile</label>
                                                            <input type="file" class="form-control" name="gambar">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formGroupExampleInput3" class="form-label">Profile Lama</label>
                                                            <?php
                                                            if ($row["gambar"] != '') {
                                                                if (file_exists('gambar/' . $row["gambar"] . '')) {
                                                            ?>
                                                                    <br><img src="gambar/<?= $row["gambar"] ?>" width="100">
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <input type="hidden" name="gambar_lama" value="<?= $row["gambar"] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Edit -->

                                    <!-- Awal Modal Hapus -->
                                    <div class="modal fade" id="modalHapus<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus profile</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="formGroupExampleInput" class="form-label">Yakin akan menghapus profile "<?= $row["gambar"] ?>"?</label>
                                                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                            <input type="hidden" name="gambar" value="<?= $row["gambar"] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                                                        <input type="submit" value="hapus" name="hapus" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Hapus -->
                                </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <?php 
            $sql3 = "SELECT * FROM user";
            $hasil3 = $conn->query($sql3); 
            $total_records = $hasil3->num_rows;
            ?>
            <p>Total Gambar : <?php echo $total_records; ?></p>
            <nav class="mb-2">
                <ul class="pagination justify-content-end">
                <?php
                    $jumlah_page = ceil($total_records / $limit);
                    $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
                    $start_number = ($hlm > $jumlah_number)? $hlm - $jumlah_number : 1;
                    $end_number = ($hlm < ($jumlah_page - $jumlah_number))? $hlm + $jumlah_number : $jumlah_page;

                    if($hlm == 1){
                        echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
                    } else {
                        $link_prev = ($hlm > 1)? $hlm - 1 : 1;
                        echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                        echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
                    }

                    for($i = $start_number; $i <= $end_number; $i++){
                        $link_active = ($hlm == $i)? ' active' : '';
                        echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
                    }

                    if($hlm == $jumlah_page){
                        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                        echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                    } else {
                    $link_next = ($hlm < $jumlah_page)? $hlm + 1 : $jumlah_page;
                        echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                        echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
                    }
                ?>
                </ul>
            </nav>