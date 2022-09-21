<?php
	include_once "koneksi.php";
	if (isset($_GET['notif'])) {
		if ($_GET['notif'] == "akun_berubah") {
			session_start();
			unset($_SESSION["nama_pengguna_akun"]);
			header("location: masuk.php?notif=akun_berubah");
		} else {
			session_start();
			unset($_SESSION["nama_pengguna_akun"]);
			header("location: masuk.php");
		}
	} else {
		session_start();
		unset($_SESSION["nama_pengguna_akun"]);
		header("location: masuk.php");
	}
?>