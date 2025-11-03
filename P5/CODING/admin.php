<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Data Admin</title>

<style>
/* ===== GENERAL ===== */
body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: #f5f7fb;
}

/* ===== SIDEBAR ===== */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 230px;
    height: 100vh;
    background: #1E3A8A;
    padding-top: 20px;
    color: #fff;
}

.sidebar .logo {
    text-align: center;
    margin-bottom: 30px;
    font-size: 22px;
    font-weight: bold;
}

.sidebar a {
    display: block;
    padding: 12px 20px;
    color: white;
    text-decoration: none;
    font-size: 15px;
    transition: .2s;
}

.sidebar a:hover, 
.sidebar a.active {
    background: #0F1F59;
}

/* ===== MAIN CONTENT ===== */
.main-content {
    margin-left: 230px;
    padding: 25px;
}

/* Page Header */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.page-header h2 {
    margin: 0;
    font-size: 24px;
    font-weight: 600;
}

/* Buttons */
.btn-back {
    text-decoration: none;
    padding: 8px 14px;
    background: #475569;
    color: #fff;
    border-radius: 6px;
    font-size: 14px;
}
.btn-back:hover { background: #334155; }

.btn-primary {
    background: #2563EB;
    color: white;
    padding: 10px 16px;
    text-decoration: none;
    border-radius: 6px;
    font-weight: 500;
}
.btn-primary:hover { background: #1E40AF; }

.btn-edit {
    background: #10B981;
    padding: 6px 10px;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}
.btn-edit:hover { background: #059669; }

.btn-delete {
    background: #EF4444;
    padding: 6px 10px;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}
.btn-delete:hover { background: #DC2626; }

/* Table */
.data-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
.data-table th, .data-table td {
    padding: 12px;
    text-align: left;
}
.data-table thead {
    background: #1E3A8A;
    color: white;
}
.data-table tbody tr:nth-child(even) {
    background: #f1f5f9;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2 class="logo">SIRJTM</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="admin.php" class="active">Data Admin</a>
    <a href="dosen.php">Data Dosen</a>
    <a href="mahasiswa.php">Data Mahasiswa</a>
    <a href="jadwal.php">Jadwal Kuliah</a>
    <a href="tugas.php">Data Tugas</a>
    <a href="reminder.php">Reminder</a>
    <a href="laporan.php">Laporan</a>
    <a href="logout.php">Logout</a>
</div>

<!-- CONTENT -->
<div class="main-content">

<div class="page-header">
    <h2>Data Admin</h2>
    <a href="dashboard.php" class="btn-back">← Kembali</a>
</div>

<a href="tambah_admin.php" class="btn-primary">+ Tambah Admin</a>

<table class="data-table">
<thead>
<tr>
    <th>No</th>
    <th>Username</th>
    <th>Password</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM admin");
while ($data = mysqli_fetch_array($query)) {
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data['username']; ?></td>
    <td><?= $data['password']; ?></td>
    <td>
        <a href="edit_admin.php?id=<?= $data['id_admin']; ?>" class="btn-edit">Edit</a>
        <a href="hapus_admin.php?id=<?= $data['id_admin']; ?>" class="btn-delete" onclick="return confirm('Yakin hapus data?')">Hapus</a>
    </td>
</tr>
<?php } ?>

</tbody>
</table>

</div>

</body>
</html>
