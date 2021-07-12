<?php
session_start();
     // Cek role user
    if($_SESSION['level'] == 'admin') { // Jika role-nya admin
			include("config.php");

			// kalau tidak ada id di query string
			if( !isset($_GET['id']) ){
			    header('Location: list_user.php');
			}

			//ambil id dari query string
			$id = $_GET['id'];

			// buat query untuk ambil data dari database
			$sql = "SELECT * FROM user WHERE id=$id";
			$query = mysqli_query($db, $sql);
			$user = mysqli_fetch_assoc($query);

			// jika data yang di-edit tidak ditemukan
			if( mysqli_num_rows($query) < 1 ){
			    die("data tidak ditemukan...");
			}

?>

<!DOCTYPE html>
<html>
<head>
	<title>user</title>
	<link rel="stylesheet" type="text/css" href="rafandy.css">
</head>
<body>
	<div class="konten">
		<input type="button" value="<= Kembali" onclick="history.back()">
		<h2 align="center">Form Edit User </h2>
		<div class="form_rv" align="center">
			<form method="POST" action="proses_update_user.php">
				<input name="id" type="hidden" value="<?php echo $user['id'] ?>">
				<br>
				<label>Nama</label>
				<input type="text" name="nama" value="<?php echo $user['nama'] ?>">
				<br>
				<label>No Hp</label>
				<input type="text" name="no_hp" value="<?php echo $user['no_hp'] ?>">
				<br>
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $user['username'] ?>">
				<br>
				<label>Password</label>
				<input type="Password" name="password" value="<?php echo $user['password'] ?>">
				<br>
				<label>Level</label>
				<?php $level = $user['level']; ?>
				<select name="level">
	                <option <?php echo ($level == 'admin') ? "selected": "" ?>>admin</option>
	                <option <?php echo ($level == 'resepsionis') ? "selected": "" ?>>resepsionis</option>
	                <option <?php echo ($level == 'pelanggan') ? "selected": "" ?>>pelanggan</option>
	                <option <?php echo ($level == 'pengelola_keuangan') ? "selected": "" ?>>pengelola keuangan</option>
            	</select>
				<br>
				<br>
				<input type="submit" name="update" value="Update">
			</form>
		</div>
	</div>
</body>
</html>
<?php
        }
        else{ //jika role bukan admin
            header("location:index.php?pesan=dilarang");
        }
?>