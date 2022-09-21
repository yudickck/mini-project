<?php
    // BALITA
    $query_balita = mysqli_query($koneksi, "SELECT * FROM balita");
    $jumlah_data_balita = mysqli_num_rows($query_balita);

    // ORANG TUA
    $query_orang_tua = mysqli_query($koneksi, "SELECT * FROM orang_tua");
    $jumlah_data_orang_tua = mysqli_num_rows($query_orang_tua);

    // POSYANDU
    $query_posyandu = mysqli_query($koneksi, "SELECT * FROM posyandu");
    $jumlah_data_posyandu = mysqli_num_rows($query_posyandu);
?>