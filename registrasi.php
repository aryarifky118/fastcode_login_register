<?php
require 'functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Registrasi Berhasil!');
             </script>";
    }else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post" class="form-container">
        <h4>Sign Up</h4>

        <div class="form-group">
            <label for="fullname">Nama Lengkap</label><br>
            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Masukkan Nama Lengkap" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required>
        </div>
        <div class="form-group">
            <label for="email">Alamat Email</label><br>
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Alamat Email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="password2">Konfirmasi Password</label><br>
            <input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password" required>
        </div>
        <div class="form-button">
            <button type="submit" name="register">Register</button>
        </div>
        <div>
            <p>Sudah punya Account? <a href="login.php">Login</a></p>
        </div>
    </form>
</body>
</html>