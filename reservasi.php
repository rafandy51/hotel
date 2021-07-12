<?php
include("config.php"); 

session_start();
 
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level']==""){
                header("location:index.php?pesan=gagal");
            }

	if( !isset($_GET['id']) ){
	    header('Location: list_kamar_public.php');
	}

	//ambil id dari query string
	$id = $_GET['id'];

	// buat query untuk ambil data dari database
	$sql = "SELECT * FROM kamar WHERE id=$id";
	$query = mysqli_query($db, $sql);
	$kamar = mysqli_fetch_assoc($query);
	$q1 = "SELECT * FROM reservasi_kamar"  ;
	$no_bill = mysqli_query($db, $q1); 
	$username = $_SESSION['username']; 



	// jika data yang di-edit tidak ditemukan
	if( mysqli_num_rows($query) < 1 ){
	    die("data tidak ditemukan...");
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>reservasi</title>
	<link rel="stylesheet" type="text/css" href="rafandy.css">
</head>
<body>
	<div class="konten">
		<input type="button" value="<= Kembali" onclick="history.back()">
		<h2 align="center">Form reservasi</h2>
		<div class="form_rv" align="center">
			<form method="POST" action="proses_order.php">
				<input name="id" type="hidden" value="">
				<input name="username" type="hidden" value="<?php echo $username ?>">
				<br>
				
				<input name="no_bill" type="hidden" value="<?php echo mysqli_num_rows($no_bill)+1 ?>">
				<br>
				<label>Kode kamar</label>
				<input type="text" name="kd_kamar" value="<?php echo $kamar['kd_kamar'] ?>">
				<br>
				<label for="tgl_chkin">Tanggal Checkin</label>
				<input type="date" name="tgl_chkin" id="tgl_chkin">
				<br>
				<label for="tgl_chkout">Tanggal Checkout</label>
				<input type="date" name="tgl_chkout" id="tgl_chkout">
				<br>
				<input name="status" type="hidden" value="menunggu_pembayaran">
				<br>
				<input type="submit" name="order" value="Order">
			</form>
		</div>
	</div>
</body>
</html>