<?php
	date_default_timezone_set("Asia/Jakarta");
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "posyandu";
	$koneksi = mysqli_connect($host, $user, $pass, $db);
	if (mysqli_connect_errno()) {
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
?>