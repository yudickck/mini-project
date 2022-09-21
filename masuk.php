<?php
    include_once "koneksi.php";
    include_once "query_pengaturan.php";

    session_start();
    if (isset($_POST['masuk'])) {
        $nama_pengguna_akun = $_POST['nama_pengguna_akun'];
        $kata_sandi_akun = $_POST['kata_sandi_akun'];
        $proses_masuk_akun = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun' AND kata_sandi_akun = '$kata_sandi_akun'");
        $cek_akun = mysqli_num_rows($proses_masuk_akun);
        if ($cek_akun > 0) {
            $data_akun = mysqli_fetch_array($proses_masuk_akun);
            $_SESSION['nama_pengguna_akun'] = $data_akun['nama_pengguna_akun'];
            header("location: index.php?page=dasbor");
        } else {
            header("location: masuk.php?notif=data_salah");
        }
    }
    if (isset($_SESSION['nama_pengguna_akun'])) {
        header("location: index.php?page=dasbor");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Aplikasi Posyandu berbasis web">
        <meta name="author" content="NewSoft">
        <!-- TITLE -->
        <title>Admin <?php echo $deskripsi_title_bar; ?></title>
        <!-- FAVICON -->
        <link href="img/<?php echo $deskripsi_favicon; ?>" rel="icon">
        <link href="img/<?php echo $deskripsi_apple_touch_icon; ?>" rel="apple_touch_icon">
        <!-- VENDOR -->
        <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- MAIN CSS -->
        <link href="css/sb-admin-2.css" rel="stylesheet">
    </head>
    <body class="bg-gradient-primary d-flex justify-content-center align-items-center min-vh-100">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <img src="img/<?php echo $deskripsi_logo_masuk; ?>" alt="Logo" class="img-fluid" style="height: 70px;">
                        <h2 class="font-weight-bolder text-uppercase ml-3 mb-0"><?php echo $deskripsi_title_app; ?></h2>
                    </div>
                    <?php
                        if (isset($_GET['notif'])) {
                            if ($_GET['notif'] == "data_salah") {
                                echo '
                                    <div class="alert alert-danger d-flex justify-content-between" role="alert">
                                        <span>Data salah, silahkan masukan data dengan benar!.</span>
                                        <button class="close ml-3" type="button" data-dismiss="alert">
                                            <i class="fas fa-xmark"></i>
                                        </button>
                                    </div>
                                ';
                            } else if ($_GET['notif'] == "akun_berubah") {
                                echo '
                                    <div class="alert alert-primary d-flex justify-content-between" role="alert">
                                        <span>Berhasil mengubah data anda, silahkan masuk kembali.</span>
                                        <button class="close ml-3" type="button" data-dismiss="alert">
                                            <i class="fas fa-xmark"></i>
                                        </button>
                                    </div>
                                ';
                            }
                        }
                    ?>
                    <form method="post" class="user">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama_pengguna_akun" placeholder="Nama Pengguna" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="kata_sandi_akun" placeholder="Kata Sandi" autocomplete="off" required>
                        </div>
                        <button type="submit" name="masuk" class="btn btn-primary btn-user btn-block">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- VENDOR -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- MAIN JS -->
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>