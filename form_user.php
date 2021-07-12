<?php
    session_start();
     // Cek role user
        if($_SESSION['level'] == 'admin'){ // Jika role-nya admin
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
		<h2 align="center">Form Tambah User </h2>
		<div class="form_rv" align="center">
			<form method="POST" action="proses_tambah_user.php">
				<input name="id" type="hidden" value="">
				<br>
				<label>Nama</label>
				<input type="text" name="nama" value="">
				<br>
				<label>No Hp</label>
				<input type="text" name="no_hp" value="">
				<br>
				<label>Username</label>
				<input type="text" name="username" value="">
				<br>
				<label>Password</label>
				<input type="Password" name="password" value="">
				<br>
				<label>Level</label>
				<select name="level">
	                <option>admin</option>
	                <option>resepsionis</option>
	                <option>pengelola_keuangan</option>
	                <option>pelanggan</option>
            	</select>
				<br>
				<br>
				<input type="submit" name="tambah" value="Tambah User">
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