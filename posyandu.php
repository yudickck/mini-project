<?php
    if (isset($_POST['tambah_data'])) {
        $nama_posyandu = $_POST['nama_posyandu'];
        $alamat_posyandu = $_POST['alamat_posyandu'];

        $insert_data_posyandu = mysqli_query($koneksi, "INSERT INTO posyandu(nama_posyandu, alamat_posyandu) VALUES('$nama_posyandu', '$alamat_posyandu')");
        if ($insert_data_posyandu) {
            echo '
                <script>
                    window.location.replace("index.php?page=posyandu&notif=berhasil_tambah_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$insert_data_posyandu."<br>".mysqli_error($koneksi);
        }
    } else if (isset($_POST['ubah_data'])) {
        $id_posyandu = $_POST['id_posyandu'];
        $nama_posyandu = $_POST['nama_posyandu'];
        $alamat_posyandu = $_POST['alamat_posyandu'];

        $update_data_posyandu = mysqli_query($koneksi, "UPDATE posyandu SET nama_posyandu = '$nama_posyandu', alamat_posyandu = '$alamat_posyandu' WHERE id_posyandu = '$id_posyandu'");
        if ($update_data_posyandu) {
            echo '
                <script>
                    window.location.replace("index.php?page=posyandu&notif=berhasil_ubah_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$update_data_posyandu."<br>".mysqli_error($koneksi);
        }
    } else if (isset($_POST['hapus_data'])) {
        $id_posyandu = $_POST['id_posyandu'];

        $delete_data_posyandu = mysqli_query($koneksi, "DELETE FROM posyandu WHERE id_posyandu = '$id_posyandu'");
        if ($delete_data_posyandu) {
            echo '
                <script>
                    window.location.replace("index.php?page=posyandu&notif=berhasil_hapus_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$delete_data_posyandu."<br>".mysqli_error($koneksi);
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
        <h1 class="h3 mb-0 text-gray-800">Posyandu</h1>
        <a href="#tambah_data" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal">
            <i class="fas fa-plus mr-2"></i>Tambah Data
        </a>
    </div>
    <!-- DATATABLES ORANG TUA -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Posyandu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $no = 1;
                            $query_posyandu = mysqli_query($koneksi, "SELECT * FROM posyandu");
                            while ($data_posyandu = mysqli_fetch_array($query_posyandu)) {
                                $id_posyandu = $data_posyandu['id_posyandu'];
                                $nama_posyandu = $data_posyandu['nama_posyandu'];
                                $alamat_posyandu = $data_posyandu['alamat_posyandu'];
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $nama_posyandu; ?></td>
                            <td><?php echo $alamat_posyandu; ?></td>
                            <td>
                                <div class="row" style="gap: 0.75rem; column-gap: 0;">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah_<?php echo $id_posyandu; ?>">
                                            <i class="fas fa-pen-to-square mr-2"></i>Ubah
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_<?php echo $id_posyandu; ?>">
                                            <i class="fas fa-trash mr-2"></i>Hapus
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- MODAL UBAH DATA -->
                        <div class="modal fade" id="ubah_<?php echo $id_posyandu; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <input type="hidden" name="id_posyandu" value="<?php echo $id_posyandu; ?>">
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="nama_posyandu" value="<?php echo $nama_posyandu; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Alamat</label>
                                                <input type="text" class="form-control" name="alamat_posyandu" value="<?php echo $alamat_posyandu; ?>">
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
                        <div class="modal fade" id="hapus_<?php echo $id_posyandu; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <input type="hidden" name="id_posyandu" value="<?php echo $id_posyandu; ?>">
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
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_posyandu" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat_posyandu" placeholder="Alamat">
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