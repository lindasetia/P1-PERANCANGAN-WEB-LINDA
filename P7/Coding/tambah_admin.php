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

    <form action="proses_upload.php" method="POST" enctype="multipart/form-data">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Foto Admin</label>
        <input type="file" name="foto" required>

        <button type="submit" name="simpan">Tambah Admin</button>
    </form>

    <a href="admin.php" class="back">← Kembali ke Data Admin</a>
</div>

</body>
</html>
