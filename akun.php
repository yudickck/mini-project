<?php
    if (isset($_POST['info_akun'])) {
        $id_akun = $_POST['id_akun'];
        $nama_akun = $_POST['nama_akun'];
        $nama_pengguna_akun = $_POST['nama_pengguna_akun'];
        $kata_sandi_akun = $_POST['kata_sandi_akun'];

        $update_info_akun = mysqli_query($koneksi, "UPDATE akun SET nama_akun = '$nama_akun', nama_pengguna_akun = '$nama_pengguna_akun', kata_sandi_akun = '$kata_sandi_akun' WHERE id_akun = '$id_akun'");
        if ($update_info_akun) {
            echo '
                <script>
                    window.location.replace("keluar.php?notif=akun_berubah");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$update_info_akun."<br>".mysqli_error($koneksi);
        }
    } else if (isset($_POST['foto_akun'])) {
        $random = rand();
        $id_akun = $_POST['id_akun'];
        $tmp_file = $_FILES['foto_akun']['tmp_name'];
        $nama_file = $_FILES['foto_akun']['name'];
        $format =  array('png', 'jpg', 'jpeg');
        $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
        if (!in_array($extensi, $format)) {
            echo '
                <script>
                    window.location.replace("index.php?page=akun&notif=format_gambar_salah");
                </script>
            ';
        } else {
            $file = strtolower(str_replace(" ", "_", $nama_file));
            $file_input = $random.'_'.$file;
            $lokasi_simpan = "img/".$file_input;
            move_uploaded_file($tmp_file, $lokasi_simpan);
            $update_foto_akun = mysqli_query($koneksi, "UPDATE akun SET foto_akun = '$file_input' WHERE id_akun = '$id_akun'");
            if ($update_foto_akun) {
                echo '
                    <script>
                        window.location.replace("index.php?page=akun&notif=berhasil_ubah_data");
                    </script>
                ';
            } else {
                echo "Terjadi kesalahan.<br>Error : ".$update_foto_akun."<br>".mysqli_error($koneksi);
            }
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
            } else if ($_GET['notif'] == "format_gambar_salah") {
                echo '
                    <div class="alert alert-warning d-flex justify-content-between" role="alert">
                        <span>Format gambar salah!, harus PNG/JPG/JPEG.</span>
                        <button class="close ml-3" type="button" data-dismiss="alert">
                            <i class="fas fa-xmark"></i>
                        </button>
                    </div>
                ';
            }
        }
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Akun</h1>
        <!-- <a href="#tambah_data" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal">
            <i class="fas fa-plus mr-2"></i>Tambah Data
        </a> -->
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gambar</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <img src="img/<?php echo $foto_akun_masuk; ?>" class="img-fluid">
                    </div>
                    <form method="POST" enctype="multipart/form-data" class="mb-3">
                        <input type="hidden" name="id_akun" value="<?php echo $id_akun_masuk; ?>">
                        <div class="mb-3">
                            <input type="file" class="form-control" name="foto_akun">
                        </div>
                        <button type="submit" name="foto_akun" class="btn btn-primary btn-block"><i class="fas fa-floppy-disk mr-2"></i>Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
                </div>
                <div class="card-body">
                    <form method="POST" class="mb-3">
                        <input type="hidden" name="id_akun" value="<?php echo $id_akun_masuk; ?>">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_akun" value="<?php echo $nama_akun_masuk; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama_pengguna_akun" value="<?php echo $nama_pengguna_akun_masuk; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" name="kata_sandi_akun" value="<?php echo $kata_sandi_akun_masuk; ?>">
                        </div>
                        <button type="submit" name="info_akun" class="btn btn-primary btn-block"><i class="fas fa-floppy-disk mr-2"></i>Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>