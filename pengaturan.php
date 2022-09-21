<?php
    if (isset($_POST['title_bar'])) {
        $nama_title_bar = $_POST['nama_pengaturan'];
        $deskripsi_title_bar = $_POST['deskripsi_pengaturan'];

        $update_title_bar = mysqli_query($koneksi, "UPDATE pengaturan SET deskripsi_pengaturan = '$deskripsi_title_bar' WHERE nama_pengaturan = '$nama_title_bar'");
        if ($update_title_bar) {
            echo '
                <script>
                    window.location.replace("index.php?page=pengaturan&notif=berhasil_ubah_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$update_title_bar."<br>".mysqli_error($koneksi);
        }
    } else if (isset($_POST['title_app'])) {
        $nama_title_app = $_POST['nama_pengaturan'];
        $deskripsi_title_app = $_POST['deskripsi_pengaturan'];

        $update_title_app = mysqli_query($koneksi, "UPDATE pengaturan SET deskripsi_pengaturan = '$deskripsi_title_app' WHERE nama_pengaturan = '$nama_title_app'");
        if ($update_title_app) {
            echo '
                <script>
                    window.location.replace("index.php?page=pengaturan&notif=berhasil_ubah_data");
                </script>
            ';
        } else {
            echo "Terjadi kesalahan.<br>Error : ".$update_title_app."<br>".mysqli_error($koneksi);
        }
    } else if (isset($_POST['logo_masuk'])) {
        $random = rand();
        $nama_logo_masuk = $_POST['nama_pengaturan'];
        $tmp_file = $_FILES['deskripsi_pengaturan']['tmp_name'];
        $nama_file = $_FILES['deskripsi_pengaturan']['name'];
        $format =  array('png', 'jpg', 'jpeg');
        $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
        if (!in_array($extensi, $format)) {
            echo '
                <script>
                    window.location.replace("index.php?page=pengaturan&notif=format_gambar_salah");
                </script>
            ';
        } else {
            $file = strtolower(str_replace(" ", "_", $nama_file));
            $file_input = $random.'_'.$file;
            $lokasi_simpan = "img/".$file_input;
            move_uploaded_file($tmp_file, $lokasi_simpan);
            $update_logo_masuk = mysqli_query($koneksi, "UPDATE pengaturan SET deskripsi_pengaturan = '$file_input' WHERE nama_pengaturan = '$nama_logo_masuk'");
            if ($update_logo_masuk) {
                echo '
                    <script>
                        window.location.replace("index.php?page=pengaturan&notif=berhasil_ubah_data");
                    </script>
                ';
            } else {
                echo "Terjadi kesalahan.<br>Error : ".$update_logo_masuk."<br>".mysqli_error($koneksi);
            }
        }
    } else if (isset($_POST['logo_sidebar'])) {
        $random = rand();
        $nama_logo_nav = $_POST['nama_pengaturan'];
        $tmp_file = $_FILES['deskripsi_pengaturan']['tmp_name'];
        $nama_file = $_FILES['deskripsi_pengaturan']['name'];
        $format =  array('png', 'jpg', 'jpeg');
        $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
        if (!in_array($extensi, $format)) {
            echo '
                <script>
                    window.location.replace("index.php?page=pengaturan&notif=format_gambar_salah");
                </script>
            ';
        } else {
            $file = strtolower(str_replace(" ", "_", $nama_file));
            $file_input = $random.'_'.$file;
            $lokasi_simpan = "img/".$file_input;
            move_uploaded_file($tmp_file, $lokasi_simpan);
            $update_logo_nav = mysqli_query($koneksi, "UPDATE pengaturan SET deskripsi_pengaturan = '$file_input' WHERE nama_pengaturan = '$nama_logo_nav'");
            if ($update_logo_nav) {
                echo '
                    <script>
                        window.location.replace("index.php?page=pengaturan&notif=berhasil_ubah_data");
                    </script>
                ';
            } else {
                echo "Terjadi kesalahan.<br>Error : ".$update_logo_nav."<br>".mysqli_error($koneksi);
            }
        }
    } else if (isset($_POST['favicon'])) {
        $random = rand();
        $nama_favicon = $_POST['nama_pengaturan'];
        $tmp_file = $_FILES['deskripsi_pengaturan']['tmp_name'];
        $nama_file = $_FILES['deskripsi_pengaturan']['name'];
        $format =  array('png', 'jpg', 'jpeg');
        $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
        if (!in_array($extensi, $format)) {
            echo '
                <script>
                    window.location.replace("index.php?page=pengaturan&notif=format_gambar_salah");
                </script>
            ';
        } else {
            $file = strtolower(str_replace(" ", "_", $nama_file));
            $file_input = $random.'_'.$file;
            $lokasi_simpan = "img/".$file_input;
            move_uploaded_file($tmp_file, $lokasi_simpan);
            $update_favicon = mysqli_query($koneksi, "UPDATE pengaturan SET deskripsi_pengaturan = '$file_input' WHERE nama_pengaturan = '$nama_favicon'");
            if ($update_favicon) {
                echo '
                    <script>
                        window.location.replace("index.php?page=pengaturan&notif=berhasil_ubah_data");
                    </script>
                ';
            } else {
                echo "Terjadi kesalahan.<br>Error : ".$update_favicon."<br>".mysqli_error($koneksi);
            }
        }
    } else if (isset($_POST['apple_touch_icon'])) {
        $random = rand();
        $nama_apple_touch_icon = $_POST['nama_pengaturan'];
        $tmp_file = $_FILES['deskripsi_pengaturan']['tmp_name'];
        $nama_file = $_FILES['deskripsi_pengaturan']['name'];
        $format =  array('png', 'jpg', 'jpeg');
        $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
        if (!in_array($extensi, $format)) {
            echo '
                <script>
                    window.location.replace("index.php?page=pengaturan&notif=format_gambar_salah");
                </script>
            ';
        } else {
            $file = strtolower(str_replace(" ", "_", $nama_file));
            $file_input = $random.'_'.$file;
            $lokasi_simpan = "img/".$file_input;
            move_uploaded_file($tmp_file, $lokasi_simpan);
            $update_apple_touch_icon = mysqli_query($koneksi, "UPDATE pengaturan SET deskripsi_pengaturan = '$file_input' WHERE nama_pengaturan = '$nama_apple_touch_icon'");
            if ($update_apple_touch_icon) {
                echo '
                    <script>
                        window.location.replace("index.php?page=pengaturan&notif=berhasil_ubah_data");
                    </script>
                ';
            } else {
                echo "Terjadi kesalahan.<br>Error : ".$update_apple_touch_icon."<br>".mysqli_error($koneksi);
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
        <h1 class="h3 mb-0 text-gray-800">Pengaturan</h1>
        <!-- <a href="#tambah_data" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal">
            <i class="fas fa-plus mr-2"></i>Tambah Data
        </a> -->
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Judul</h6>
        </div>
        <div class="card-body">
            <form method="POST" class="mb-3">
                <input type="hidden" name="nama_pengaturan" value="<?php echo $nama_title_bar; ?>">
                <div class="mb-3">
                    <label class="form-label">Judul Website</label>
                    <input type="text" class="form-control" name="deskripsi_pengaturan" value="<?php echo $deskripsi_title_bar; ?>">
                </div>
                <button type="submit" name="title_bar" class="btn btn-primary btn-block"><i class="fas fa-floppy-disk mr-2"></i>Simpan</button>
            </form>
            <form method="POST">
                <input type="hidden" name="nama_pengaturan" value="<?php echo $nama_title_app; ?>">
                <div class="mb-3">
                    <label class="form-label">Judul Aplikasi</label>
                    <input type="text" class="form-control" name="deskripsi_pengaturan" value="<?php echo $deskripsi_title_app; ?>">
                </div>
                <button type="submit" name="title_app" class="btn btn-primary btn-block"><i class="fas fa-floppy-disk mr-2"></i>Simpan</button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Gambar</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <form method="POST" enctype="multipart/form-data" class="mb-3">
                        <input type="hidden" name="nama_pengaturan" value="<?php echo $nama_logo_masuk; ?>">
                        <div class="mb-3 text-center">
                            <img src="img/<?php echo $deskripsi_logo_masuk; ?>" class="img-fluid">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Halaman Masuk</label>
                            <input type="file" class="form-control" name="deskripsi_pengaturan">
                        </div>
                        <button type="submit" name="logo_masuk" class="btn btn-primary btn-block"><i class="fas fa-floppy-disk mr-2"></i>Simpan</button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-6">
                    <form method="POST" enctype="multipart/form-data" class="mb-3">
                        <input type="hidden" name="nama_pengaturan" value="<?php echo $nama_logo_nav; ?>">
                        <div class="mb-3 text-center">
                            <img src="img/<?php echo $deskripsi_logo_nav; ?>" class="img-fluid">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Halaman Admin</label>
                            <input type="file" class="form-control" name="deskripsi_pengaturan">
                        </div>
                        <button type="submit" name="logo_sidebar" class="btn btn-primary btn-block"><i class="fas fa-floppy-disk mr-2"></i>Simpan</button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-6">
                    <form method="POST" enctype="multipart/form-data" class="mb-3">
                        <input type="hidden" name="nama_pengaturan" value="<?php echo $nama_favicon; ?>">
                        <div class="mb-3 text-center">
                            <img src="img/<?php echo $deskripsi_favicon; ?>" class="img-fluid">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Favicon</label>
                            <input type="file" class="form-control" name="deskripsi_pengaturan">
                        </div>
                        <button type="submit" name="favicon" class="btn btn-primary btn-block"><i class="fas fa-floppy-disk mr-2"></i>Simpan</button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-6">
                    <form method="POST" enctype="multipart/form-data" class="mb-3">
                        <input type="hidden" name="nama_pengaturan" value="<?php echo $nama_apple_touch_icon; ?>">
                        <div class="mb-3 text-center">
                            <img src="img/<?php echo $deskripsi_apple_touch_icon; ?>" class="img-fluid">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Favicon Apple</label>
                            <input type="file" class="form-control" name="deskripsi_pengaturan">
                        </div>
                        <button type="submit" name="apple_touch_icon" class="btn btn-primary btn-block"><i class="fas fa-floppy-disk mr-2"></i>Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>