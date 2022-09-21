<?php
    include_once "koneksi.php";
    include_once "query_pengaturan.php";
    include_once "query_total_data.php";
    include_once "query_total_data_gizi.php";
    include_once "kalender_indonesia.php";

    session_start();
    if (isset($_SESSION['nama_pengguna_akun'])) {
        $nama_pengguna_akun_masuk = $_SESSION['nama_pengguna_akun'];
        $query_akun_masuk = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun_masuk'");
        $data_akun_masuk = mysqli_fetch_array($query_akun_masuk);
        $id_akun_masuk = $data_akun_masuk['id_akun'];
        $nama_akun_masuk = $data_akun_masuk['nama_akun'];
        $kata_sandi_akun_masuk = $data_akun_masuk['kata_sandi_akun'];
        $foto_akun_masuk = $data_akun_masuk['foto_akun'];
    } else {
        header("location: masuk.php");
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
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- SIDEBAR -->
            <?php
                include_once "sidebar.php";
            ?>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama_akun_masuk; ?></span>
                                    <img class="img-profile rounded-circle"
                                        src="img/<?php echo $foto_akun_masuk; ?>">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="index.php?page=akun">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Akun
                                    </a>
                                    <a class="dropdown-item" href="index.php?page=pengaturan">
                                        <i class="fas fa-gear fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Pengaturan
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#modal_keluar" data-toggle="modal">
                                        <i class="fas fa-right-from-bracket fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Keluar
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <?php
                        if (isset($_GET['page'])) {
                            if ($_GET['page'] == "dasbor") {
                                include_once "dasbor.php";
                            } else if ($_GET['page'] == "balita") {
                                include_once "balita.php";
                            } else if ($_GET['page'] == "orang_tua") {
                                include_once "orang_tua.php";
                            } else if ($_GET['page'] == "posyandu") {
                                include_once "posyandu.php";
                            } else if ($_GET['page'] == "balita") {
                                include_once "balita.php";
                            } else if ($_GET['page'] == "pengaturan") {
                                include_once "pengaturan.php";
                            } else if ($_GET['page'] == "akun") {
                                include_once "akun.php";
                            } else if ($_GET['page'] == "detail_balita") {
                                include_once "detail_balita.php";
                            } else {
                                include_once "dasbor.php";
                            }
                        } else {
                            include_once "dasbor.php";
                        }
                    ?>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; <a href="https://instagram.com/yudickck" target="_blank">CkckDeveloper</a> 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="modal_keluar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Keluar</h5>
                        <button class="close ml-3" type="button" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body">Yakin ingin keluar dari halaman admin?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger" href="keluar.php">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- VENDOR -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- MAIN JS -->
        <script src="js/sb-admin-2.min.js"></script>
        <!-- JS TAMBAHAN -->
        <script>
            // DATATABLES
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
            <?php
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == "dasbor") {
            ?>
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            // CHART GIZI
            var ctx = document.getElementById("gizi");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Gizi Lebih", "Gizi Baik", "Gizi Kurang", "Gizi Buruk"],
                    datasets: [{
                    label: "Total Balita",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    <?php
                        echo '
                            data : ['.$jumlah_gizi_lebih.', '.$jumlah_gizi_baik.', '.$jumlah_gizi_kurang.', '.$jumlah_gizi_buruk.'],
                        ';
                    ?>
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                            },
                            gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ' : ' + tooltipItem.yLabel;
                            }
                        }
                    }
                }
            });

            // CHART POSYANDU
            var ctx = document.getElementById("posyandu");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                    <?php
                        $query_posyandu = mysqli_query($koneksi, "SELECT * FROM posyandu");
                        while ($data_posyandu = mysqli_fetch_array($query_posyandu)) {
                            $id_posyandu = $data_posyandu['id_posyandu'];
                            $nama_posyandu = $data_posyandu['nama_posyandu'];
                            $alamat_posyandu = $data_posyandu['alamat_posyandu'];
                            echo '"'.$nama_posyandu.'", ';
                        }
                    ?>
                    ],
                    datasets: [{
                        label: "Total Balita",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: [
                        <?php
                            $query_posyandu = mysqli_query($koneksi, "SELECT * FROM posyandu");
                            while ($data_posyandu = mysqli_fetch_array($query_posyandu)) {
                                $id_posyandu = $data_posyandu['id_posyandu'];
                                $nama_posyandu = $data_posyandu['nama_posyandu'];
                                $alamat_posyandu = $data_posyandu['alamat_posyandu'];

                                $query_balita = mysqli_query($koneksi, "SELECT * FROM balita WHERE id_posyandu_balita = '$id_posyandu'");
                                $jumlah_balita = mysqli_num_rows($query_balita);
                                echo $jumlah_balita.', ';
                            }
                        ?>
                        ],
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                            },
                            gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ' : ' + tooltipItem.yLabel;
                            }
                        }
                    }
                }
            });
            <?php
                    } else if ($_GET['page'] == "detail_balita") {
            ?>
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            // CHART DETAIL BALITA
            var ctx = document.getElementById("detail_balita");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                    <?php
                        $query_diperiksa = mysqli_query($koneksi, "SELECT * FROM diperiksa WHERE id_balita_diperiksa = '$id_balita'");
                        while ($data_diperiksa = mysqli_fetch_array($query_diperiksa)) {
                            $id_diperiksa = $data_diperiksa['id_diperiksa'];
                            $usia_diperiksa = $data_diperiksa['usia_diperiksa'];
                            $berat_badan_diperiksa = $data_diperiksa['berat_badan_diperiksa'];
                            $gizi_diperiksa = $data_diperiksa['gizi_diperiksa'];
                            $tanggal_diperiksa = $data_diperiksa['tanggal_diperiksa'];
                            $urutan_diperiksa = $data_diperiksa['urutan_diperiksa'];
                            echo '"'.$usia_diperiksa.'", ';
                        }
                    ?>
                    ],
                    datasets: [{
                        label: "Berat Badan",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: [
                            <?php
                                $query_diperiksa = mysqli_query($koneksi, "SELECT * FROM diperiksa WHERE id_balita_diperiksa = '$id_balita'");
                                while ($data_diperiksa = mysqli_fetch_array($query_diperiksa)) {
                                    $id_diperiksa = $data_diperiksa['id_diperiksa'];
                                    $usia_diperiksa = $data_diperiksa['usia_diperiksa'];
                                    $berat_badan_diperiksa = $data_diperiksa['berat_badan_diperiksa'];
                                    $gizi_diperiksa = $data_diperiksa['gizi_diperiksa'];
                                    $tanggal_diperiksa = $data_diperiksa['tanggal_diperiksa'];
                                    $urutan_diperiksa = $data_diperiksa['urutan_diperiksa'];
                                    echo $berat_badan_diperiksa.', ';
                                }
                            ?>
                        ],
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                <?php
                                    $query_diperiksa = mysqli_query($koneksi, "SELECT MAX(berat_badan_diperiksa) AS max_berat_badan_diperiksa, MIN(berat_badan_diperiksa) AS min_berat_badan_diperiksa FROM diperiksa WHERE id_balita_diperiksa = '$id_balita'");
                                    $data_diperiksa = mysqli_fetch_array($query_diperiksa);
                                    $min_berat_badan_diperiksa = $data_diperiksa['min_berat_badan_diperiksa'];
                                    $max_berat_badan_diperiksa = $data_diperiksa['max_berat_badan_diperiksa'];
                                    $selisih_berat_badan_diperiksa = ($max_berat_badan_diperiksa - $min_berat_badan_diperiksa) + 1;
                                    echo 'maxTicksLimit: '.$selisih_berat_badan_diperiksa.',';    
                                ?>
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value) + ' kg';
                                }
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value) + ' bulan';
                                }
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ' : ' + tooltipItem.yLabel + ' kg';
                            }
                        }
                    }
                }
            });
            <?php
                    }
                }
            ?>
        </script>
    </body>
</html>