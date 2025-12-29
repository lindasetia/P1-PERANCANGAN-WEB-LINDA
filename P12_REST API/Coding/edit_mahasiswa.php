<?php
include "koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $nim      = $_POST['nim'];
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $kelas    = $_POST['kelas'];
    $jurusan  = $_POST['jurusan'];

    $update = mysqli_query($koneksi, "UPDATE mahasiswa SET 
                nim='$nim', 
                nama='$nama', 
                email='$email', 
                password='$password',
                kelas='$kelas',
                jurusan='$jurusan'
              WHERE id_mahasiswa='$id'");

    if ($update) {
        echo "<script>alert('Data mahasiswa berhasil diperbarui!'); window.location='mahasiswa.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Mahasiswa | Sistem Reminder Mahasiswa</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
/* ===== GENERAL ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #f4f6f9;
    display: flex;
}

/* ===== SIDEBAR ===== */
.sidebar {
    width: 250px;
    background: #1E3A8A;
    color: white;
    position: fixed;
    height: 100vh;
    display: flex;
    flex-direction: column;
    padding-top: 25px;
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
}

.sidebar h2 {
    font-size: 22px;
    text-align: center;
    margin-bottom: 30px;
    font-weight: 700;
}

.sidebar a {
    display: block;
    text-decoration: none;
    color: #e0e7ff;
    padding: 12px 20px;
    border-radius: 8px;
    margin: 5px 10px;
    transition: all .25s;
}

.sidebar a:hover,
.sidebar a.active {
    background: #ffffff;
    color: #1E3A8A;
    font-weight: 600;
}

.sidebar .logout {
    background: #dc3545;
    color: white;
    margin-top: auto;
    margin: 15px 10px;
    text-align: center;
}
.sidebar .logout:hover {
    background: #b02a37;
}

/* ===== MAIN CONTENT ===== */
.main-content {
    margin-left: 250px;
    padding: 40px;
    width: calc(100% - 250px);
}

/* ===== FORM CARD ===== */
.form-container {
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    max-width: 600px;
    margin: auto;
}

h2 {
    text-align: center;
    color: #1E3A8A;
    margin-bottom: 25px;
    font-weight: 700;
}

form label {
    display: block;
    font-weight: 500;
    margin-bottom: 6px;
    color: #334155;
}

form input {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 15px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 15px;
    transition: 0.2s;
}

form input:focus {
    outline: none;
    border-color: #2563EB;
    box-shadow: 0 0 5px rgba(37,99,235,0.3);
}

/* ===== BUTTONS ===== */
.btn-submit {
    background: #2563EB;
    color: white;
    padding: 10px 16px;
    border: none;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    transition: background .25s;
}
.btn-submit:hover { background: #1E40AF; }

.btn-back {
    display: inline-block;
    background: #475569;
    color: white;
    text-decoration: none;
    padding: 10px 16px;
    border-radius: 8px;
    margin-top: 10px;
}
.btn-back:hover { background: #334155; }

footer {
    text-align: center;
    margin-top: 40px;
    color: #777;
    font-size: 13px;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>REMINDER</h2>
    <a href="dashboard_admin.php">🏠 Dashboard</a>
    <a href="admin.php">👤 Data Admin</a>
    <a href="dosen.php">🎓 Data Dosen</a>
    <a href="mahasiswa.php" class="active">🧑‍🎓 Data Mahasiswa</a>
    <a href="jadwal.php">📅 Jadwal Kuliah</a>
    <a href="tugas.php">📝 Data Tugas</a>
    <a href="reminder.php">⏰ Reminder</a>
    <a href="laporan.php">📊 Laporan</a>
    <a href="logout.php" class="logout">🚪 Logout</a>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">

<div class="form-container">
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST">
        <label>NIM</label>
        <input type="text" name="nim" value="<?= $data['nim']; ?>" required>

        <label>Nama</label>
        <input type="text" name="nama" value="<?= $data['nama']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= $data['email']; ?>" required>

        <label>Password</label>
        <input type="password" name="password" value="<?= $data['password']; ?>" required>

        <label>Kelas</label>
        <input type="text" name="kelas" value="<?= $data['kelas']; ?>" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" value="<?= $data['jurusan']; ?>" required>

        <button type="submit" name="update" class="btn-submit">Simpan Perubahan</button>
        <a href="mahasiswa.php" class="btn-back">← Kembali</a>
    </form>
</div>

<footer>
    © <?= date("Y") ?> Sistem Reminder Mahasiswa — Politeknik Purbaya
</footer>

</div>

</body>
</html>
