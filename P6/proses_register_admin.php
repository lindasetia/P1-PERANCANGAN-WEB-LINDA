<?php
session_start();
include "koneksi.php";  // pastikan file ini benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // CEK username agar tidak dobel
    $cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['error'] = "Username sudah digunakan!";
        header("Location: register_admin.php");
        exit();
    }

    // INSERT data (tanpa id_admin karena AUTO_INCREMENT)
    $query = mysqli_query($koneksi, 
        "INSERT INTO admin (username, password)
         VALUES ('$username', '$password')"
    );

    if ($query) {
        $_SESSION['success'] = "Registrasi berhasil!";
        header("Location: register_admin.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan database!";
        header("Location: register_admin.php");
        exit();
    }
}
?>
