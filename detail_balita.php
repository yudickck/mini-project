<?php
    $id_balita = $_GET['id_balita'];
    $query_balita = mysqli_query($koneksi, "SELECT * FROM balita WHERE id_balita = '$id_balita'");
    $data_balita = mysqli_fetch_array($query_balita);
    $no_kk_balita = $data_balita['no_kk_balita'];
    $id_posyandu_balita = $data_balita['id_posyandu_balita'];
    $nama_balita = $data_balita['nama_balita'];
    $kelamin_balita = $data_balita['kelamin_balita'];
    $tanggal_lahir_balita = kalender_indonesia($data_balita['tanggal_lahir_balita']);

    $query_posyandu = mysqli_query($koneksi, "SELECT * FROM posyandu WHERE id_posyandu = '$id_posyandu_balita'");
    $data_posyandu = mysqli_fetch_array($query_posyandu);
    $nama_posyandu = $data_posyandu['nama_posyandu'];
    $alamat_posyandu = $data_posyandu['alamat_posyandu'];

    if (isset($_POST['tambah_data'])) {
        $usia_diperiksa = $_POST['usia_diperiksa'];
        $berat_badan_diperiksa = $_POST['berat_badan_diperiksa'];
        $gizi_diperiksa = $_POST['gizi_diperiksa'];
        $tanggal_diperiksa = date("Y-m-d");
        $query_diperiksa = mysqli_query($koneksi, "SELECT MAX(urutan_diperiksa) AS urutan_periksa_balita FROM diperiksa WHERE id_balita_diperiksa = '$id_balita'");
        $cek_data_diperiksa = mysqli_num_rows($query_diperiksa);
        if ($cek_data_diperiksa > 0) {
            $no_tambahan = 1;
            $data_diperiksa = mysqli_fetch_array($query_diperiksa);
            $urutan_diperiksa = $data_diperiksa['urutan_periksa_balita'] + $no_tambahan;
            $insert_data_diperiksa = mysqli_query($koneksi, "INSERT INTO diperiksa(id_balita_diperiksa, usia_diperiksa, berat_badan_diperiksa, gizi_diperiksa, tanggal_diperiksa, urutan_diperiksa) VALUES('$id_balita', '$usia_diperiksa', '$berat_badan_diperiksa', '$gizi_diperiksa', '$tanggal_diperiksa', '$urutan_diperiksa')");
            if ($insert_data_diperiksa) {
                echo '
                    <script>
                        window.location.replace("index.php?page=detail_balita&id_balita='.$id_balita.'&notif=berhasil_tambah_data");
                    </script>
                ';
            } else {
                echo "Terjadi kesalahan.<br>Error : ".$insert_data_diperiksa."<br>".mysqli_error($koneksi);
            }
        } else {
            $urutan_diperiksa = 1;
            $insert_data_diperiksa = mysqli_query($koneksi, "INSERT INTO diperiksa(id_balita_diperiksa, usia_diperiksa, berat_badan_diperiksa, gizi_diperiksa, tanggal_diperiksa, urutan_diperiksa) VALUES('$id_balita', '$usia_diperiksa', '$berat_badan_diperiksa', '$gizi_diperiksa', '$tanggal_diperiksa', '$urutan_diperiksa')");
            if ($insert_data_diperiksa) {
                echo '
                    <script>
                        window.location.replace("index.php?page=detail_balita&id_balita='.$id_balita.'&notif=berhasil_tambah_data");
                    </script>
                ';
            } else {
                echo "Terjadi kesalahan.<br>Error : ".$insert_data_diperiksa."<br>".mysqli_error($koneksi);
            }
        }
    } else if (isset($_POST['ubah_data'])) {
        $id_diperiksa = $_POST['id_diperiksa'];
        $usia_diperiksa = $_POST['usia_diperiksa'];
        $berat_badan_diperiksa = $_POST['berat_badan_diperiksa'];
        $gizi_diperiksa = $_POST['gizi_diperiksa'];
        $tanggal_diperiksa = $_POST['tanggal_diperiksa'];

        $update_data_diperiksa = mysqli_query($koneksi, "UPDATE diperiksa SET usia_diperiksa = '$usia_diperiksa', berat_badan_diperiksa = '$berat_badan_diperiksa', gizi_diperiksa = '$gizi_diperiksa', tanggal_diperiksa = '$tanggal_diperiksa' WHERE id_diperiksa = '$id_diperiksa'");
        if ($update_data_diperiksa) {
            echo '
                <script>
                    window.location.replace("index.php?page=detail_balita&id_balita='.$id_balita.'&notif=berhasil_ubah_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$update_data_diperiksa."<br>".mysqli_error($koneksi);
        }
    } else if (isset($_POST['hapus_data'])) {
        $id_diperiksa = $_POST['id_diperiksa'];

        $delete_data_diperiksa = mysqli_query($koneksi, "DELETE FROM diperiksa WHERE id_diperiksa = '$id_diperiksa'");
        if ($delete_data_diperiksa) {
            echo '
                <script>
                    window.location.replace("index.php?page=detail_balita&id_balita='.$id_balita.'&notif=berhasil_hapus_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$delete_data_diperiksa."<br>".mysqli_error($koneksi);
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
        <h1 class="h3 mb-0 text-gray-800">Detail Data Balita</h1>
        <a href="index.php?page=balita" class="d-inline-block btn btn-sm btn-danger shadow-sm">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $nama_balita; ?></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-between">
                            <span class="text-secondary">No. KK</span>
                            <span class="text-secondary">:</span>
                        </div>
                        <div class="col-6">
                            <span class="font-weight-bolder"><?php echo $no_kk_balita; ?></span>
                        </div>
                        <div class="col-6 d-flex justify-content-between">
                            <span class="text-secondary">Jenis Kelamin</span>
                            <span class="text-secondary">:</span>
                        </div>
                        <div class="col-6">
                            <span class="font-weight-bolder"><?php echo $kelamin_balita; ?></span>
                        </div>
                        <div class="col-6 d-flex justify-content-between">
                            <span class="text-secondary">Tanggal Lahir</span>
                            <span class="text-secondary">:</span>
                        </div>
                        <div class="col-6">
                            <span class="font-weight-bolder"><?php echo $tanggal_lahir_balita; ?></span>
                        </div>
                        <div class="col-6 d-flex justify-content-between">
                            <span class="text-secondary">Posyandu</span>
                            <span class="text-secondary">:</span>
                        </div>
                        <div class="col-6">
                            <span class="font-weight-bolder"><?php echo $nama_posyandu; ?></span>
                        </div>
                        <div class="col-6 d-flex justify-content-between">
                            <span class="text-secondary">Alamat Posyandu</span>
                            <span class="text-secondary">:</span>
                        </div>
                        <div class="col-6">
                            <span class="font-weight-bolder"><?php echo $alamat_posyandu; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Detail Data</h6>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Usia (Bulan)</label>
                            <input type="number" class="form-control" name="usia_diperiksa" placeholder="Usia (Bulan)">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Berat Badan (KG)</label>
                            <input type="number" class="form-control" name="berat_badan_diperiksa" placeholder="Berat Badan (KG)">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Gizi</label>
                            <select class="form-control" name="gizi_diperiksa">
                                <option>Pilih Status Gizi</option>
                                <option value="Gizi Lebih">Gizi Lebih</option>
                                <option value="Gizi Baik">Gizi Baik</option>
                                <option value="Gizi Kurang">Gizi Kurang</option>
                                <option value="Gizi Buruk">Gizi Buruk</option>
                            </select>
                        </div>
                        <div class="text-right">
                            <button type="submit" name="tambah_data" class="btn btn-primary">
                                <i class="fas fa-floppy-disk mr-2"></i>Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!-- GRAFIK GIZI PERKEMBANGAN BALITA -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Perkembangan Balita</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="detail_balita"></canvas>
                    </div>
                </div>
            </div>
            <!-- DATATABLES DETAIL BALITA -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Perkembangan Balita</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No. Urutan</th>
                                    <th>Usia</th>
                                    <th>Berat Badan</th>
                                    <th>Gizi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No. Urutan</th>
                                    <th>Usia</th>
                                    <th>Berat Badan</th>
                                    <th>Gizi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $query_diperiksa = mysqli_query($koneksi, "SELECT * FROM diperiksa WHERE id_balita_diperiksa = '$id_balita'");
                                    while ($data_diperiksa = mysqli_fetch_array($query_diperiksa)) {
                                        $id_diperiksa = $data_diperiksa['id_diperiksa'];
                                        $usia_diperiksa = $data_diperiksa['usia_diperiksa'];
                                        $berat_badan_diperiksa = $data_diperiksa['berat_badan_diperiksa'];
                                        $gizi_diperiksa = $data_diperiksa['gizi_diperiksa'];
                                        $tanggal_diperiksa = $data_diperiksa['tanggal_diperiksa'];
                                        $urutan_diperiksa = $data_diperiksa['urutan_diperiksa'];
                                ?>
                                <tr>
                                    <td><?php echo $urutan_diperiksa; ?></td>
                                    <td><?php echo $usia_diperiksa; ?></td>
                                    <td><?php echo $berat_badan_diperiksa; ?></td>
                                    <td><?php echo $gizi_diperiksa; ?></td>
                                    <td><?php echo kalender_indonesia($tanggal_diperiksa); ?></td>
                                    <td>
                                        <div class="row" style="gap: 0.75rem;">
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubah_<?php echo $id_diperiksa; ?>">
                                                    <i class="fas fa-pen-to-square mr-2"></i>Ubah
                                                </button>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_<?php echo $id_diperiksa; ?>">
                                                    <i class="fas fa-trash mr-2"></i>Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- MODAL UBAH DATA -->
                                <div class="modal fade" id="ubah_<?php echo $id_diperiksa; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    <input type="hidden" name="id_diperiksa" value="<?php echo $id_diperiksa; ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label">Usia (Bulan)</label>
                                                        <input type="number" class="form-control" name="usia_diperiksa" value="<?php echo $usia_diperiksa; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Berat Badan (KG)</label>
                                                        <input type="number" class="form-control" name="berat_badan_diperiksa" value="<?php echo $berat_badan_diperiksa; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Gizi</label>
                                                        <select class="form-control" name="gizi_diperiksa">
                                                            <option value="<?php echo $gizi_diperiksa; ?>"><?php echo $gizi_diperiksa; ?></option>
                                                            <?php
                                                                if ($gizi_diperiksa == "Gizi Lebih") {
                                                                    echo '
                                                                        <option value="Gizi Baik">Gizi Baik</option>
                                                                        <option value="Gizi Kurang">Gizi Kurang</option>
                                                                        <option value="Gizi Buruk">Gizi Buruk</option>
                                                                    ';
                                                                } else if ($gizi_diperiksa == "Gizi Baik") {
                                                                    echo '
                                                                        <option value="Gizi Lebih">Gizi Lebih</option>
                                                                        <option value="Gizi Kurang">Gizi Kurang</option>
                                                                        <option value="Gizi Buruk">Gizi Buruk</option>
                                                                    ';
                                                                } else if ($gizi_diperiksa == "Gizi Kurang") {
                                                                    echo '
                                                                        <option value="Gizi Lebih">Gizi Lebih</option>
                                                                        <option value="Gizi Baik">Gizi Baik</option>
                                                                        <option value="Gizi Buruk">Gizi Buruk</option>
                                                                    ';
                                                                } else if ($gizi_diperiksa == "Gizi Buruk") {
                                                                    echo '
                                                                        <option value="Gizi Lebih">Gizi Lebih</option>
                                                                        <option value="Gizi Baik">Gizi Baik</option>
                                                                        <option value="Gizi Kurang">Gizi Kurang</option>
                                                                    ';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal</label>
                                                        <input type="date" class="form-control" name="tanggal_diperiksa" value="<?php echo $tanggal_diperiksa; ?>">
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
                                <div class="modal fade" id="hapus_<?php echo $id_diperiksa; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    <input type="hidden" name="id_diperiksa" value="<?php echo $id_diperiksa; ?>">
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
        </div>
    </div>
</div>