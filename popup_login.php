<!-- panel with buttons -->
        <div class="main">
            <div class="panel">
                <a href="#login_form" id="login_pop">Masuk</a>
                <a href="#join_form" id="join_pop">Daftar</a>
            </div>
        </div>
        <!-- popup form login -->
        <form action="proses_login.php" method="POST">
            <a href="#x" class="overlay" id="login_form"></a>
            <div class="popup">
                <h2>Silahkan Login</h2>
                <p></p>
                <div>
                    <label for="login">Username</label>
                    <input type="text" id="username" name="username"value="" />
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="pass" name="pass"value="" />
                </div>
                <input type="submit" value="Log In" />
                <a class="close" href="#close"></a>
            </div>
        </form>

        <!-- popup form daftar -->
        <form action="proses_daftar_akun.php" method="POST">
            <a href="#x" class="overlay" id="join_form"></a>
            <div class="popup">
                <h2>Buat Akun</h2>
                <p></p>

                <div>
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" name="no_hp" id="no_hp" value="" />
                </div>
                <div>
                    <label for="username">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" value="" />
                </div>
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="" />
                </div>
                <div>
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" value="" />
                </div>
                <input type="hidden" name="level" value="pelanggan" />
                
                <input type="submit" name="daftar" value="Daftar" />

                <a class="close" href="#close"></a>
        </form>
        </div>