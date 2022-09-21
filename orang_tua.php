<?php
    if (isset($_POST['tambah_data'])) {
        $no_kk_orang_tua = $_POST['no_kk_orang_tua'];
        $ibu_orang_tua = $_POST['ibu_orang_tua'];
        $ayah_orang_tua = $_POST['ayah_orang_tua'];

        $insert_data_orang_tua = mysqli_query($koneksi, "INSERT INTO orang_tua(no_kk_orang_tua, ibu_orang_tua, ayah_orang_tua) VALUES('$no_kk_orang_tua', '$ibu_orang_tua', '$ayah_orang_tua')");
        if ($insert_data_orang_tua) {
            echo '
                <script>
                    window.location.replace("index.php?page=orang_tua&notif=berhasil_tambah_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$insert_data_orang_tua."<br>".mysqli_error($koneksi);
        }
    } else if (isset($_POST['ubah_data'])) {
        $id_orang_tua = $_POST['id_orang_tua'];
        $no_kk_orang_tua = $_POST['no_kk_orang_tua'];
        $ibu_orang_tua = $_POST['ibu_orang_tua'];
        $ayah_orang_tua = $_POST['ayah_orang_tua'];

        $update_data_orang_tua = mysqli_query($koneksi, "UPDATE orang_tua SET no_kk_orang_tua = '$no_kk_orang_tua', ibu_orang_tua = '$ibu_orang_tua', ayah_orang_tua = '$ayah_orang_tua' WHERE id_orang_tua = '$id_orang_tua'");
        if ($update_data_orang_tua) {
            echo '
                <script>
                    window.location.replace("index.php?page=orang_tua&notif=berhasil_ubah_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$update_data_orang_tua."<br>".mysqli_error($koneksi);
        }
    } else if (isset($_POST['hapus_data'])) {
        $id_orang_tua = $_POST['id_orang_tua'];

        $delete_data_orang_tua = mysqli_query($koneksi, "DELETE FROM orang_tua WHERE id_orang_tua = '$id_orang_tua'");
        if ($delete_data_orang_tua) {
            echo '
                <script>
                    window.location.replace("index.php?page=orang_tua&notif=berhasil_hapus_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$delete_data_orang_tua."<br>".mysqli_error($koneksi);
        }
    }
?>

<div class="container-fluid">
    <?php
        if (isset($_GET['notif'])) {
            if ($_GET['notif'] == "berhasil_tambah_data") {
                echo '
                    <div class="alert alert-success d-flex justify-content-between" role="alert">
                        <span>Berhasil menambahkan data.</span>
                        <button class="close ml-3" type="button" data-dismiss="alert">
                            <i class="fas fa-xmark"></i>
                        </button>
                    </div>
                ';
            } else if ($_GET['notif'] == "berhasil_ubah_data") {
                echo '
                    <div class="alert alert-success d-flex justify-content-between" role="alert">
                        <span>Berhasil mengubah data.</span>
                        <button class="close ml-3" type="button" data-dismiss="alert">
                            <i class="fas fa-xmark"></i>
                        </button>
                    </div>
                ';
            } else if ($_GET['notif'] == "berhasil_hapus_data") {
                echo '
                    <div class="alert alert-success d-flex justify-content-between" role="alert">
                        <span>Berhasil menghapus data.</span>
                        <button class="close ml-3" type="button" data-dismiss="alert">
                            <i class="fas fa-xmark"></i>
                        </button>
                    </div>
                ';
            }
        }
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orang Tua</h1>
        <a href="#tambah_data" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal">
            <i class="fas fa-plus mr-2"></i>Tambah Data
        </a>
    </div>
    <!-- DATATABLES ORANG TUA -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Orang Tua</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Kartu Keluarga</th>
                            <th>Ibu</th>
                            <th>Ayah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Kartu Keluarga</th>
                            <th>Ibu</th>
                            <th>Ayah</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $no = 1;
                            $query_orang_tua = mysqli_query($koneksi, "SELECT * FROM orang_tua");
                            while ($data_orang_tua = mysqli_fetch_array($query_orang_tua)) {
                                $id_orang_tua = $data_orang_tua['id_orang_tua'];
                                $no_kk_orang_tua = $data_orang_tua['no_kk_orang_tua'];
                                $ibu_orang_tua = $data_orang_tua['ibu_orang_tua'];
                                $ayah_orang_tua = $data_orang_tua['ayah_orang_tua'];
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $no_kk_orang_tua; ?></td>
                            <td><?php echo $ibu_orang_tua; ?></td>
                            <td><?php echo $ayah_orang_tua; ?></td>
                            <td>
                                <div class="row" style="gap: 0.75rem; column-gap: 0;">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah_<?php echo $id_orang_tua; ?>">
                                            <i class="fas fa-pen-to-square mr-2"></i>Ubah
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_<?php echo $id_orang_tua; ?>">
                                            <i class="fas fa-trash mr-2"></i>Hapus
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- MODAL UBAH DATA -->
                        <div class="modal fade" id="ubah_<?php echo $id_orang_tua; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ubah Data</h5>
                                        <button class="close ml-3" type="button" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-xmark"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                            <input type="hidden" name="id_orang_tua" value="<?php echo $id_orang_tua; ?>">
                                            <div class="mb-3">
                                                <label class="form-label">Nomor Kartu Keluarga</label>
                                                <input type="number" class="form-control" name="no_kk_orang_tua" value="<?php echo $no_kk_orang_tua; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ibu</label>
                                                <input type="text" class="form-control" name="ibu_orang_tua" value="<?php echo $ibu_orang_tua; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ayah</label>
                                                <input type="text" class="form-control" name="ayah_orang_tua" value="<?php echo $ayah_orang_tua; ?>">
                                            </div>
                                            <div class="text-right">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    <i class="fas fa-xmark mr-2"></i>Batal
                                                </button>
                                                <button type="submit" name="ubah_data" class="btn btn-primary">
                                                    <i class="fas fa-floppy-disk mr-2"></i>Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- MODAL HAPUS DATA -->
                        <div class="modal fade" id="hapus_<?php echo $id_orang_tua; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Data</h5>
                                        <button class="close ml-3" type="button" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-xmark"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                            <input type="hidden" name="id_orang_tua" value="<?php echo $id_orang_tua; ?>">
                                            <div class="mb-3">
                                                Yakin ingin menghapus data ini?
                                            </div>
                                            <div class="text-right">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    <i class="fas fa-xmark mr-2"></i>Batal
                                                </button>
                                                <button type="submit" name="hapus_data" class="btn btn-danger">
                                                    <i class="fas fa-trash mr-2"></i>Hapus
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- MODAL TAMBAH DATA -->
    <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button class="close ml-3" type="button" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nomor Kartu Keluarga</label>
                            <input type="number" class="form-control" name="no_kk_orang_tua" placeholder="Nomor Kartu Keluarga">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ibu</label>
                            <input type="text" class="form-control" name="ibu_orang_tua" placeholder="Ibu">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ayah</label>
                            <input type="text" class="form-control" name="ayah_orang_tua" placeholder="Ayah">
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-xmark mr-2"></i>Batal
                            </button>
                            <button type="submit" name="tambah_data" class="btn btn-primary">
                                <i class="fas fa-floppy-disk mr-2"></i>Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>