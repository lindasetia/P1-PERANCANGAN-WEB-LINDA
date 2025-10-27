<?php
$host = "localhost";
$user = "root";  
$pass = "";      
$db   = "db_reminder kuliah"; 

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$username   = $_POST['username'];
$password   = $_POST['password'];
$nama_admin = $_POST['nama_admin'];
$email      = $_POST['email'];
$no_telp    = $_POST['no_telp'];

// Masukkan data ke tabel admin
$sql = "INSERT INTO admin (username, password, nama_admin, email, no_telp)
        VALUES ('$username', '$password', '$nama_admin', '$email', '$no_telp')";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan!<br>";
    echo "<a href='form_admin.html'>Kembali</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
