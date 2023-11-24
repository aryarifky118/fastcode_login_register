<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//koneksi Ke database
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "fastcode";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Koneksi Gagal");
}

function registrasi($data) {
    global $conn;
    
    $fullname = mysqli_real_escape_string($conn, $data["fullname"]);
    $username = strtolower(stripslashes($data["username"]));
    $email = mysqli_real_escape_string($conn, $data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $cekusername = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' OR email = '$email'");

    if (mysqli_fetch_assoc($cekusername)) {
        echo "<script>
                alert('Username atau Email sudah terdaftar')
              </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi Password tidak sesuai')
             </script>";
        return false;
    }

    if (strlen($password) < 8) {
        echo "<script>
                alert('Kata sandi harus terdiri dari minimal 8 karakter')
             </script>";
        return false;
    }

    //tambahkan user baru ke dalam database
    mysqli_query($conn, "INSERT INTO users (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$password')");

    return mysqli_affected_rows($conn);
}
?>