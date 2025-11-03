<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost","root","","reminder_kuliah");

$notif = "";
if (isset($_POST["simpan"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Insert sesuai table kamu
    $query = mysqli_query($koneksi, 
        "INSERT INTO admin (username, password) VALUES ('$username', '$password')"
    );

    if ($query) {
        $notif = "✅ Data admin berhasil ditambahkan!";
    } else {
        $notif = "❌ Gagal menambahkan data!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Admin</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #eef2f7;
    margin: 0;
}
.container {
    width: 350px;
    background: #fff;
    margin: 60px auto;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}
h2 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 15px;
}
label {
    font-size: 14px;
    font-weight: bold;
}
input {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
}
button {
    width: 100%;
    padding: 10px;
    background: #3498db;
    border: none;
    color: white;
    font-size: 15px;
    border-radius: 6px;
    cursor: pointer;
}
button:hover {
    background: #2980b9;
}
.notif {
    background: #d4edda;
    color: #155724;
    padding: 10px;
    border-left: 4px solid #28a745;
    margin-bottom: 10px;
    border-radius: 4px;
    font-size: 14px;
}
.back {
    display: block;
    text-align: center;
    margin-top: 10px;
    text-decoration: none;
    color: #34495e;
    font-size: 14px;
}
.back:hover {
    text-decoration: underline;
}
</style>
</head>
<body>

<div class="container">
    <h2>Tambah Admin</h2>

    <?php if($notif != "") echo "<div class='notif'>$notif</div>"; ?>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="simpan">Tambah Admin</button>
    </form>

    <a class="back" href="dashboard.php">← Kembali ke Dashboard</a>
</div>

</body>
</html>
