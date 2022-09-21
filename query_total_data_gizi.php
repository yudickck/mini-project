<?php
    // GIZI LEBIH
    $query_gizi_lebih = mysqli_query($koneksi, "SELECT * FROM diperiksa WHERE gizi_diperiksa = 'Gizi Lebih' GROUP BY id_balita_diperiksa");
    $jumlah_gizi_lebih = mysqli_num_rows($query_gizi_lebih);

    // GIZI LEBIH
    $query_gizi_baik = mysqli_query($koneksi, "SELECT * FROM diperiksa WHERE gizi_diperiksa = 'Gizi Baik' GROUP BY id_balita_diperiksa");
    $jumlah_gizi_baik = mysqli_num_rows($query_gizi_baik);

    // GIZI LEBIH
    $query_gizi_kurang = mysqli_query($koneksi, "SELECT * FROM diperiksa WHERE gizi_diperiksa = 'Gizi Kurang' GROUP BY id_balita_diperiksa");
    $jumlah_gizi_kurang = mysqli_num_rows($query_gizi_kurang);

    // GIZI LEBIH
    $query_gizi_buruk = mysqli_query($koneksi, "SELECT * FROM diperiksa WHERE gizi_diperiksa = 'Gizi Buruk' GROUP BY id_balita_diperiksa");
    $jumlah_gizi_buruk = mysqli_num_rows($query_gizi_buruk);
?>