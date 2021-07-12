<?php
include("config.php"); 

session_start();
 
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level']==""){
                header("location:index.php?pesan=gagal");
            }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="rafandy.css">
</head>
<body>
	<div class="konten">
		 
             <?php include("navbar_admin.php"); ?>
            
	            
        	<h1>ini dashboard admin</h1>
		 <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
    </div>
</body>
</html>