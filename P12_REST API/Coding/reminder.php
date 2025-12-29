<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['role'])) {
    header("Location: ../login.php");
    exit;
}

/*
STATUS:
aktif   -> reminder aktif
selesai -> reminder selesai
*/
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reminder | Sistem Reminder</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: linear-gradient(to bottom right, #eef2ff, #f8fafc);
    display: flex;
    color: #333;
}

/* SIDEBAR */
.sidebar {
    width: 250px;
    background: #1E3A8A;
    color: #fff;
    position: fixed;
    height: 100vh;
    padding-top: 30px;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
    font-weight: 700;
}

.sidebar a {
    display: block;
    color: #e0e7ff;
    text-decoration: none;
    padding: 12px 18px;
    border-radius: 10px;
    margin: 6px 12px;
    transition: .2s;
}

.sidebar a:hover,
.sidebar a.active {
    background: #ffffff;
    color: #1E3A8A;
    font-weight: 600;
}

.sidebar .logout {
    background: #DC2626;
    color: white;
}
.sidebar .logout:hover {
    background: #B91C1C;
}

/* MAIN */
.main-content {
    margin-left: 250px;
    padding: 40px;
    width: calc(100% - 250px);
}

.main-content h2 {
    color: #1E3A8A;
    font-size: 26px;
    margin-bottom: 25px;
}

/* SECTION */
.section {
    background: #ffffff;
    border-radius: 18px;
    padding: 20px;
    margin-bottom: 35px;
    box-shadow: 0 4px 15px rgba(0,0,0,.08);
}

.section h3 {
    margin-bottom: 15px;
    font-size: 20px;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #1E3A8A;
    color: white;
}

th, td {
    padding: 12px 14px;
    text-align: left;
    border-bottom: 1px solid #e2e8f0;
    font-size: 14px;
}

tbody tr:nth-child(even) {
    background: #f8fafc;
}

tbody tr:hover {
    background: #e0e7ff;
}

/* BADGE */
.badge-aktif {
    background: #EF4444;
    color: white;
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 13px;
}

.badge-selesai {
    background: #10B981;
    color: white;
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 13px;
}

/* BUTTON */
.btn-selesai {
    background: #10B981;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 13px;
}
.btn-selesai:hover {
    background: #059669;
}

footer {
    text-align: center;
    margin-top: 40px;
    color: #555;
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
    <a href="mahasiswa.php">🧑‍🎓 Data Mahasiswa</a>
    <a href="jadwal_kuliah.php">📅 Jadwal Kuliah</a>
    <a href="tugas.php">📝 Data Tugas</a>
    <a href="reminder.php" class="active">⏰ Reminder</a>
    <a href="laporan.php">📊 Laporan</a>
    <a href="../logout.php" class="logout">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main-content">

<h2>Reminder Mahasiswa</h2>

<!-- REMINDER AKTIF -->
<div class="section">
<h3>🔴 Reminder Aktif</h3>
<table>
<thead>
<tr>
<th>No</th>
<th>ID Mahasiswa</th>
<th>Judul</th>
<th>Deskripsi</th>
<th>Tanggal</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$no = 1;
$data = mysqli_query($koneksi,"SELECT * FROM reminder WHERE status='aktif'");
if(mysqli_num_rows($data) > 0){
while($r = mysqli_fetch_assoc($data)){
?>
<tr>
<td><?= $no++ ?></td>
<td><?= $r['id_mahasiswa'] ?></td>
<td><?= $r['judul'] ?></td>
<td><?= $r['deskripsi'] ?></td>
<td><?= $r['tanggal_pengingat'] ?></td>
<td>
<button class="btn-selesai" onclick="selesaikan(<?= $r['id_reminder'] ?>)">
✔ Selesai
</button>
</td>
</tr>
<?php } } else { ?>
<tr>
<td colspan="6" align="center">Tidak ada reminder aktif</td>
</tr>
<?php } ?>

</tbody>
</table>
</div>

<!-- REMINDER SELESAI -->
<div class="section">
<h3>🟢 Reminder Selesai</h3>
<table>
<thead>
<tr>
<th>No</th>
<th>ID Mahasiswa</th>
<th>Judul</th>
<th>Deskripsi</th>
<th>Tanggal</th>
<th>Status</th>
</tr>
</thead>
<tbody>

<?php
$no = 1;
$data = mysqli_query($koneksi,"SELECT * FROM reminder WHERE status='selesai'");
if(mysqli_num_rows($data) > 0){
while($r = mysqli_fetch_assoc($data)){
?>
<tr>
<td><?= $no++ ?></td>
<td><?= $r['id_mahasiswa'] ?></td>
<td><?= $r['judul'] ?></td>
<td><?= $r['deskripsi'] ?></td>
<td><?= $r['tanggal_pengingat'] ?></td>
<td><span class="badge-selesai">Selesai</span></td>
</tr>
<?php } } else { ?>
<tr>
<td colspan="6" align="center">Belum ada reminder selesai</td>
</tr>
<?php } ?>

</tbody>
</table>
</div>

<footer>
© <?= date("Y") ?> Sistem Reminder Mahasiswa — Politeknik Purbaya
</footer>

</div>

<script>
function selesaikan(id) {
    if(confirm("Tandai reminder ini sebagai selesai?")){
        fetch("api/reminder.php", {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                id_reminder: id,
                status: "selesai"
            })
        })
        .then(res => res.json())
        .then(res => {
            if(res.success){
                location.reload();
            } else {
                alert("Gagal update reminder");
            }
        });
    }
}
</script>

</body>
</html>
