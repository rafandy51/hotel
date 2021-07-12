<?php
    session_start();
     // Cek role user
        if($_SESSION['level'] == 'admin'){ // Jika role-nya admin
?>
                        
                       
<!DOCTYPE html>
<html>
<head>
    <title>Form Kamar </title>
</head>

<body>
   
    <header>
        <h3>Form Input Kamar</h3>
    </header>

    <form action="proses_tambah_kamar.php" method="POST">

        <fieldset>

        <p>
            <label for="kd_kamar">Kode Kamar: </label>
            <input type="text" name="kd_kamar" placeholder="kode kamar" />
        </p>
        <p>
            <label for="fitur">Fitur: </label>
            <select name="fitur">
                <option>ac</option>
                <option>no ac</option>
                <option>ac+wifi</option>
            </select>
        </p>

        <p>
            <label for="harga_sewa">Harga sewa: </label>
            <input type="text" name="harga_sewa" placeholder="harga sewa" />
        </p>
        
        <p>
            <input type="submit" value="Simpan" name="tambah" />
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
 
