<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- NAV BRAND -->
    <a href="index.php" class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <img src="img/<?php echo $deskripsi_logo_nav; ?>" alt="Logo" class="img-fluid">
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $deskripsi_title_app; ?></div>
    </a>
    <!-- NAV LINE -->
    <hr class="sidebar-divider">
    <!-- NAV HEAD -->
    <div class="sidebar-heading">
        Menu Utama
    </div>
    <!-- NAV ITEM DASBOR -->
    <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "dasbor") {
                echo '<li class="nav-item active">';
            } else {
                echo '<li class="nav-item">';
            }
        } else {
            echo '<li class="nav-item">';
        }
    ?>
        <a class="nav-link" href="index.php?page=dasbor">
            <i class="fas fa-fw fa-display"></i>
            <span>Dasbor</span>
        </a>
    </li>
    <!-- NAV ITEM BALITA -->
    <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "balita") {
                echo '<li class="nav-item active">';
            } else if ($_GET['page'] == "detail_balita") {
                echo '<li class="nav-item active">';
            } else {
                echo '<li class="nav-item">';
            }
        } else {
            echo '<li class="nav-item">';
        }
    ?>
        <a class="nav-link" href="index.php?page=balita">
            <i class="fas fa-fw fa-children"></i>
            <span>Balita</span>
        </a>
    </li>
    <!-- NAV ITEM ORANG TUA -->
    <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "orang_tua") {
                echo '<li class="nav-item active">';
            } else {
                echo '<li class="nav-item">';
            }
        } else {
            echo '<li class="nav-item">';
        }
    ?>
        <a class="nav-link" href="index.php?page=orang_tua">
            <i class="fas fa-fw fa-person-breastfeeding"></i>
            <span>Orang Tua</span>
        </a>
    </li>
    <!-- NAV ITEM POSYANDU -->
    <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "posyandu") {
                echo '<li class="nav-item active">';
            } else {
                echo '<li class="nav-item">';
            }
        } else {
            echo '<li class="nav-item">';
        }
    ?>
        <a class="nav-link" href="index.php?page=posyandu">
            <i class="fas fa-fw fa-house"></i>
            <span>Posyandu</span>
        </a>
    </li>
    <!-- NAV LINE -->
    <hr class="sidebar-divider">
    <!-- NAV HEAD -->
    <div class="sidebar-heading">
        Menu Lainnya
    </div>
    <!-- NAV ITEM AKUN -->
    <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "akun") {
                echo '<li class="nav-item active">';
            } else {
                echo '<li class="nav-item">';
            }
        } else {
            echo '<li class="nav-item">';
        }
    ?>
        <a class="nav-link" href="index.php?page=akun">
            <i class="fas fa-fw fa-user"></i>
            <span>Akun</span>
        </a>
    </li>
    <!-- NAV ITEM PENGATURAN -->
    <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "pengaturan") {
                echo '<li class="nav-item active">';
            } else {
                echo '<li class="nav-item">';
            }
        } else {
            echo '<li class="nav-item">';
        }
    ?>
        <a class="nav-link" href="index.php?page=pengaturan">
            <i class="fas fa-fw fa-gear"></i>
            <span>Pengaturan</span>
        </a>
    </li>
    <!-- NAV ITEM KELUAR -->
    <li class="nav-item">
        <a class="nav-link" href="#modal_keluar" data-toggle="modal">
            <i class="fas fa-fw fa-right-from-bracket"></i>
            <span>Keluar</span>
        </a>
    </li>
    <!-- NAV ITEM PENGEMBANG -->
    <li class="nav-item">
        <a class="nav-link" href="https://www.instagram.com/yudickck" target="_blank">
            <i class="fas fa-fw fa-code"></i>
            <span>Pengembang</span>
        </a>
    </li>
    <!-- NAV LINE -->
    <hr class="sidebar-divider">
    <!-- NAV TOGGLER -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>