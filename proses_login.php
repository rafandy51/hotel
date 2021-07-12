<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include("config.php");
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['pass'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:dashboard_admin.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level']=="resepsionis"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "resepsionis";
		// alihkan ke halaman dashboard pegawai
		header("location:dashboard_resepsionis.php");
 
	// cek jika user login sebagai pengurus
	}else if($data['level']=="pengelola_keuangan"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pengelola_keuangan";
		// alihkan ke halaman dashboard pengurus
		header("location:dashboard_pengelola_keuangan.php");
	
	}else if($data['level']=="pelanggan"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pelanggan";
		// alihkan ke halaman dashboard pengurus
		header("location:list_kamar_public.php");
 
	
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
	}else{
		header("location:index.php?pesan=gagal");
	}
 
?>