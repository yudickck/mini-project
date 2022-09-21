<?php
    if (isset($_POST['tambah_data'])) {
        $no_kk_balita = $_POST['no_kk_balita'];
        $id_posyandu_balita = $_POST['id_posyandu_balita'];
        $nama_balita = $_POST['nama_balita'];
        $kelamin_balita = $_POST['kelamin_balita'];
        $tanggal_lahir_balita = $_POST['tanggal_lahir_balita'];

        $insert_data_balita = mysqli_query($koneksi, "INSERT INTO balita(no_kk_balita, id_posyandu_balita, nama_balita, kelamin_balita, tanggal_lahir_balita) VALUES('$no_kk_balita', '$id_posyandu_balita', '$nama_balita', '$kelamin_balita', '$tanggal_lahir_balita')");
        if ($insert_data_balita) {
            echo '
                <script>
                    window.location.replace("index.php?page=balita&notif=berhasil_tambah_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$insert_data_balita."<br>".mysqli_error($koneksi);
        }
    } else if (isset($_POST['ubah_data'])) {
        $id_balita = $_POST['id_balita'];
        $no_kk_balita = $_POST['no_kk_balita'];
        $id_posyandu_balita = $_POST['id_posyandu_balita'];
        $nama_balita = $_POST['nama_balita'];
        $kelamin_balita = $_POST['kelamin_balita'];
        $tanggal_lahir_balita = $_POST['tanggal_lahir_balita'];

        $update_data_balita = mysqli_query($koneksi, "UPDATE balita SET no_kk_balita = '$no_kk_balita', id_posyandu_balita = '$id_posyandu_balita', nama_balita = '$nama_balita', kelamin_balita = '$kelamin_balita', tanggal_lahir_balita = '$tanggal_lahir_balita' WHERE id_balita = '$id_balita'");
        if ($update_data_balita) {
            echo '
                <script>
                    window.location.replace("index.php?page=balita&notif=berhasil_ubah_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$update_data_balita."<br>".mysqli_error($koneksi);
        }
    } else if (isset($_POST['hapus_data'])) {
        $id_balita = $_POST['id_balita'];

        $delete_data_balita = mysqli_query($koneksi, "DELETE FROM balita WHERE id_balita = '$id_balita'");
        if ($delete_data_balita) {
            echo '
                <script>
                    window.location.replace("index.php?page=balita&notif=berhasil_hapus_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$delete_data_balita."<br>".mysqli_error($koneksi);
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
        <h1 class="h3 mb-0 text-gray-800">Balita</h1>
        <a href="#tambah_data" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal">
            <i class="fas fa-plus mr-2"></i>Tambah Data
        </a>
    </div>
    <div class="row">
        <!-- JUMLAH DATA GIZI LEBIH -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Gizi Lebih
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo number_format($jumlah_gizi_lebih); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-face-smile-beam fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JUMLAH DATA GIZI BAIK -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Gizi Baik
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo number_format($jumlah_gizi_baik); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-face-smile fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JUMLAH DATA GIZI KURANG -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Gizi Kurang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo number_format($jumlah_gizi_kurang); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-face-sad-tear fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JUMLAH DATA GIZI BURUK -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Gizi Kurang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo number_format($jumlah_gizi_buruk); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-face-sad-cry fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DATATABLES BALITA -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Balita</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Kartu Keluarga</th>
                            <th>Nama Balita</th>
                            <th>Kelamin Balita</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Kartu Keluarga</th>
                            <th>Nama Balita</th>
                            <th>Kelamin Balita</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $no = 1;
                            $query_balita = mysqli_query($koneksi, "SELECT * FROM balita");
                            while ($data_balita = mysqli_fetch_array($query_balita)) {
                                $id_balita = $data_balita['id_balita'];
                                $no_kk_balita = $data_balita['no_kk_balita'];
                                $id_posyandu_balita = $data_balita['id_posyandu_balita'];
                                $nama_balita = $data_balita['nama_balita'];
                                $kelamin_balita = $data_balita['kelamin_balita'];
                                $tanggal_lahir_balita = $data_balita['tanggal_lahir_balita'];
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $no_kk_balita; ?></td>
                            <td><?php echo $nama_balita; ?></td>
                            <td><?php echo $kelamin_balita; ?></td>
                            <td>
                                <div class="row" style="gap: 0.75rem; column-gap: 0;">
                                    <div class="col-auto">
                                        <a href="index.php?page=detail_balita&id_balita=<?php echo $id_balita; ?>" class="btn btn-primary">
                                            <i class="fas fa-magnifying-glass mr-2"></i>Detail
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah_<?php echo $id_balita; ?>">
                                            <i class="fas fa-pen-to-square mr-2"></i>Ubah
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_<?php echo $id_balita; ?>">
                                            <i class="fas fa-trash mr-2"></i>Hapus
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- MODAL UBAH DATA -->
                        <div class="modal fade" id="ubah_<?php echo $id_balita; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <input type="hidden" name="id_balita" value="<?php echo $id_balita; ?>">
                                            <div class="mb-3">
                                                <label class="form-label">Nomor Kartu Keluarga</label>
                                                <input type="number" class="form-control" name="no_kk_balita" value="<?php echo $no_kk_balita; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Posyandu</label>
                                                <select class="form-control" name="id_posyandu_balita">
                                                    <?php
                                                        $query_posyandu = mysqli_query($koneksi, "SELECT * FROM posyandu WHERE id_posyandu = '$id_posyandu_balita'");
                                                        $data_posyandu = mysqli_fetch_array($query_posyandu);
                                                        $nama_posyandu = $data_posyandu['nama_posyandu'];
                                                        echo '<option value="'.$id_posyandu_balita.'">'.$nama_posyandu.'</option>';
                                                        
                                                        $query_posyandu = mysqli_query($koneksi, "SELECT * FROM posyandu");
                                                        while ($data_posyandu = mysqli_fetch_array($query_posyandu)) {
                                                            $id_posyandu = $data_posyandu['id_posyandu'];
                                                            $nama_posyandu = $data_posyandu['nama_posyandu'];
                                                            $alamat_posyandu = $data_posyandu['alamat_posyandu'];
                                                            echo '<option value="'.$id_posyandu.'">'.$nama_posyandu.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="nama_balita" value="<?php echo $nama_balita; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <select class="form-control" name="kelamin_balita">
                                                    <?php
                                                        if ($kelamin_balita = "Laki-laki") {
                                                            echo '<option value="Laki-laki">Laki-laki</option>';
                                                            echo '<option value="Perempuan">Perempuan</option>';
                                                        } else {
                                                            echo '<option value="Perempuan">Perempuan</option>';
                                                            echo '<option value="Laki-laki">Laki-laki</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir_balita" value="<?php echo $tanggal_lahir_balita; ?>">
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
                        <div class="modal fade" id="hapus_<?php echo $id_balita; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <input type="hidden" name="id_balita" value="<?php echo $id_balita; ?>">
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
                            <input type="number" class="form-control" name="no_kk_balita" placeholder="Nomor Kartu Keluarga">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Posyandu</label>
                            <select class="form-control" name="id_posyandu_balita">
                                <option>Pilih Posyandu</option>
                                <?php
                                    $query_posyandu = mysqli_query($koneksi, "SELECT * FROM posyandu");
                                    while ($data_posyandu = mysqli_fetch_array($query_posyandu)) {
                                        $id_posyandu = $data_posyandu['id_posyandu'];
                                        $nama_posyandu = $data_posyandu['nama_posyandu'];
                                        $alamat_posyandu = $data_posyandu['alamat_posyandu'];
                                        echo '<option value="'.$id_posyandu.'">'.$nama_posyandu.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_balita" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="kelamin_balita">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir_balita">
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