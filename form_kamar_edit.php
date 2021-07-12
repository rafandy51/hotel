<?php
    session_start();
     // Cek role user
    if($_SESSION['level'] == 'admin') { // Jika role-nya admin

        include("config.php");


        // kalau tidak ada id di query string
        if( !isset($_GET['id']) ){
            header('Location: list_kamar.php');
        }

        //ambil id dari query string
        $id = $_GET['id'];

        // buat query untuk ambil data dari database
        $sql = "SELECT * FROM kamar WHERE id=$id";
        $query = mysqli_query($db, $sql);
        $kamar = mysqli_fetch_assoc($query);

        // jika data yang di-edit tidak ditemukan
        if( mysqli_num_rows($query) < 1 ){
            die("data tidak ditemukan...");
        }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Edit kamar </title>
</head>

<body>
    <header>
        <h3>Formulir Edit kamar</h3>
    </header>

    <form action="proses_update_kamar.php" method="POST">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $kamar['id'] ?>" />

        <p>
            <label for="kd_kamar">kode kamar: </label>
            <input type="text" name="kd_kamar" placeholder="kd_kamar" value="<?php echo $kamar['kd_kamar'] ?>" />
        </p>
        <p>
            <label for="fitur">Fitur: </label>
            <?php $fitur = $kamar['fitur']; ?>
            <select name="fitur">
                <option <?php echo ($fitur == 'ac') ? "selected": "" ?>>AC</option>
                <option <?php echo ($fitur == 'no ac') ? "selected": "" ?>>NO AC</option>
                <option <?php echo ($fitur == 'ac+wifi') ? "selected": "" ?>>AC+WIFI</option>
                
            </select>
        </p>
        <p>
            <label for="harga_sewa">Harga Sewa: </label>
            <input type="text" name="harga_sewa" placeholder="harga sewa" value="<?php echo $kamar['harga_sewa'] ?>" />
        </p>
            
       
        <p>
            <input type="submit" value="Update" name="simpan" />
        </p>

        </fieldset>


    </form>

</body>
</html>
<?php
        }
        else{ //jika role bukan admin
            header("location:index.php?pesan=dilarang");
        }
?>