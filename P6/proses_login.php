<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];

if ($role == "admin") {
    
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $data  = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($data) > 0) {

        $d = mysqli_fetch_array($data);

        $_SESSION['username'] = $d['username'];
        $_SESSION['role']     = "admin";

        header("Location: dashboard_admin.php");
        exit();

    } else {
        echo "<script>alert('Login gagal!'); window.location='login.php';</script>";
    }

} else {

    // login mahasiswa
    $query = "SELECT * FROM mahasiswa WHERE username='$username' AND password='$password'";
    $data  = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($data) > 0) {

        $d = mysqli_fetch_array($data);

        $_SESSION['username'] = $d['username'];
        $_SESSION['role']     = "mahasiswa";

        header("Location: dashboard_mahasiswa.php");
        exit();

    } else {
        echo "<script>alert('Login gagal!'); window.location='login.php';</script>";
    }

}
?>
