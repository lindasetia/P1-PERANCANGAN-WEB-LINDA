<?php
include 'koneksi.php';

// Ambil ID dari URL
if (isset($_GET['id'])) {
    $id_admin = $_GET['id'];
} else {
    echo "ID Admin tidak ditemukan!";
    exit;
}

// Ambil data admin berdasarkan ID
$query = "SELECT * FROM admin WHERE id_admin = '$id_admin'";
$result = mysqli_query($koneksi, $query);

// Jika data tidak ditemukan
if (mysqli_num_rows($result) == 0) {
    echo "Data admin tidak ditemukan!";
    exit;
}

$data = mysqli_fetch_assoc($result);

// Jika form disubmit
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update data admin
    $update = "UPDATE admin SET username='$username', password='$password' WHERE id_admin='$id_admin'";

    if (mysqli_query($koneksi, $update)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='admin.php';</script>";
    } else {
        echo "Gagal update data!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 380px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #005f9e;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            background-color: #005f9e;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #003f6c;
        }
        a {
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #005f9e;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Admin</h2>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $data['username']; ?>" required>

        <label>Password</label>
        <input type="password" name="password" value="<?php echo $data['password']; ?>" required>

        <button type="submit" name="update">Update</button>
    </form>

    <a href="admin.php">⬅ Kembali ke Dashboard Admin</a>
</div>

</body>
</html>
