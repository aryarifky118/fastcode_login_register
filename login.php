<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit;
}

require 'functions.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $cekusername = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($cekusername) == 1) {
        $row = mysqli_fetch_assoc($cekusername);
        if ($password == $row["password"]) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['fullname'] = $row['fullname'];
            header("Location: dashboard.php");
            exit;
        }else {
            echo "<script>
                    alert('Password Salah');
                  </script>";
        }
    }else {
        echo "<script>
                alert('Username Tidak Terdaftar');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="login.php" method="post" class="form-container-login">
        <h4>Sign-In</h4>
        <div class="form-group-login">
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username" class="form-control-login" placeholder="Masukkan Username" required>
        </div>
        <div class="form-group-login">
            <label for="InputPassword">Password</label><br>
            <input type="password" name="password" id="InputPassword" class="form-control-login" placeholder="Masukkan Password" required>
        </div>
        <button type="submit" name="login">Sign In</button>
        <div>
            <p>Belum punya Account? <a href="registrasi.php">Register</a></p>
        </div>

    </form>
</body>
</html>