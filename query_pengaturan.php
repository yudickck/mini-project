<?php
    // TITLE BAR
    $query_title_bar = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'title_bar'");
    $data_title_bar = mysqli_fetch_array($query_title_bar);
    $id_title_bar = $data_title_bar['id_pengaturan'];
    $nama_title_bar = $data_title_bar['nama_pengaturan'];
    $deskripsi_title_bar = $data_title_bar['deskripsi_pengaturan'];

    // TITLE APP
    $query_title_app = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'title_app'");
    $data_title_app = mysqli_fetch_array($query_title_app);
    $id_title_app = $data_title_app['id_pengaturan'];
    $nama_title_app = $data_title_app['nama_pengaturan'];
    $deskripsi_title_app = $data_title_app['deskripsi_pengaturan'];

    // FAVICON
    $query_favicon = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'shortcut_icon'");
    $data_favicon = mysqli_fetch_array($query_favicon);
    $id_favicon = $data_favicon['id_pengaturan'];
    $nama_favicon = $data_favicon['nama_pengaturan'];
    $deskripsi_favicon = $data_favicon['deskripsi_pengaturan'];

    // APPLE TOUCH ICON
    $query_apple_touch_icon = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'apple_touch_icon'");
    $data_apple_touch_icon = mysqli_fetch_array($query_apple_touch_icon);
    $id_apple_touch_icon = $data_apple_touch_icon['id_pengaturan'];
    $nama_apple_touch_icon = $data_apple_touch_icon['nama_pengaturan'];
    $deskripsi_apple_touch_icon = $data_apple_touch_icon['deskripsi_pengaturan'];

    // LOGO NAV
    $query_logo_nav = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'logo_nav'");
    $data_logo_nav = mysqli_fetch_array($query_logo_nav);
    $id_logo_nav = $data_logo_nav['id_pengaturan'];
    $nama_logo_nav = $data_logo_nav['nama_pengaturan'];
    $deskripsi_logo_nav = $data_logo_nav['deskripsi_pengaturan'];

    // LOGO MASUK
    $query_logo_masuk = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'logo_masuk'");
    $data_logo_masuk = mysqli_fetch_array($query_logo_masuk);
    $id_logo_masuk = $data_logo_masuk['id_pengaturan'];
    $nama_logo_masuk = $data_logo_masuk['nama_pengaturan'];
    $deskripsi_logo_masuk = $data_logo_masuk['deskripsi_pengaturan'];
?>