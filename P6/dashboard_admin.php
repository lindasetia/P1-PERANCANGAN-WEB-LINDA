<?php

session_start();

// Jika belum login, paksa ke login.php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin | Sistem Reminder Mahasiswa</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
/* --------- RESET ----------- */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* -------- BACKGROUND FUTURISTIK -------- */
body {
    background: linear-gradient(135deg, #0a0f26, #1a2340);
    color: white;
    min-height: 100vh;
    overflow-x: hidden;
}

/* Glow animasi */
.glow {
    position: fixed;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(0,255,255,0.25), transparent 70%);
    filter: blur(60px);
    animation: glowMove 12s infinite alternate ease-in-out;
    z-index: -1;
}

@keyframes glowMove {
    0% { top: -100px; left: -100px; }
    100% { top: 200px; left: 250px; }
}

/* -------- HEADER -------- */
.header {
    text-align: center;
    padding: 50px 20px;
}

.header h1 {
    font-size: 34px;
    font-weight: 700;
    color: #00eaff;
    text-shadow: 0 0 12px #00eaff;
}

.header p {
    margin-top: 8px;
    opacity: .8;
}

/* -------- NAVIGATION BAR -------- */
.navbar {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 12px;
    padding: 20px;
}

.navbar a {
    text-decoration: none;
    padding: 12px 24px;
    background: rgba(255,255,255,0.08);
    border-radius: 12px;
    font-weight: 500;
    font-size: 14px;
    border: 1px solid rgba(0,255,255,0.3);
    color: #00eaff;
    transition: 0.3s ease;
}

.navbar a:hover,
.navbar a.active {
    background: #00eaff;
    color: #0b102a;
    box-shadow: 0 0 12px #00eaff;
}

/* -------- GRID CARD -------- */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 25px;
    padding: 30px 60px;
}

.card {
    background: rgba(255,255,255,0.07);
    padding: 25px;
    border-radius: 16px;
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 0 12px rgba(0,255,255,0.15);
    transition: .3s ease;
    backdrop-filter: blur(8px);
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 0 18px rgba(0,255,255,0.3);
}

.card h3 {
    font-size: 20px;
    color: #00eaff;
    margin-bottom: 8px;
}

.card p {
    font-size: 14px;
    margin-bottom: 18px;
    opacity: .85;
}

.card a {
    background: #00eaff;
    color: #0b102a;
    padding: 10px 16px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    transition: .3s ease;
}

.card a:hover {
    transform: scale(1.07);
    box-shadow: 0 0 12px #00eaff;
}

/* ------- FOOTER ------- */
footer {
    text-align: center;
    padding: 25px;
    margin-top: 40px;
    opacity: .7;
    font-size: 14px;
}
</style>
</head>
<body>

<div class="glow"></div>

<div class="header">
    <h1>Dashboard Admin</h1>
    <p>Selamat datang, kelola sistem akademik dengan fitur yang lengkap dan modern.</p>
</div>

<div class="navbar">
    <a href="index.php" class="active">🏠 Dashboard</a>
    <a href="admin.php">👤 Admin</a>
    <a href="dosen.php">🎓 Dosen</a>
    <a href="mahasiswa.php">🧑‍🎓 Mahasiswa</a>
    <a href="jadwal.php">📅 Jadwal</a>
    <a href="tugas.php">📝 Tugas</a>
    <a href="reminder.php">⏰ Reminder</a>
    <a href="../logout.php" style="background:#ff4b4b; color:white;">🚪 Logout</a>
</div>

<div class="grid">
    <div class="card">
        <h3>👤 Data Admin</h3>
        <p>Kelola akun admin sistem.</p>
        <a href="admin.php">Kelola</a>
    </div>

    <div class="card">
        <h3>🎓 Data Dosen</h3>
        <p>Manajemen data dosen pengampu mata kuliah.</p>
        <a href="dosen.php">Kelola</a>
    </div>

    <div class="card">
        <h3>🧑‍🎓 Data Mahasiswa</h3>
        <p>Lihat dan kelola data mahasiswa aktif.</p>
        <a href="mahasiswa.php">Kelola</a>
    </div>

    <div class="card">
        <h3>📅 Jadwal Kuliah</h3>
        <p>Atur jadwal kuliah dan ruang kelas.</p>
        <a href="jadwal.php">Atur</a>
    </div>

    <div class="card">
        <h3>📝 Data Tugas</h3>
        <p>Input dan kelola tugas mahasiswa.</p>
        <a href="tugas.php">Kelola</a>
    </div>

    <div class="card">
        <h3>⏰ Reminder</h3>
        <p>Pengingat otomatis untuk deadline.</p>
        <a href="reminder.php">Kelola</a>
    </div>

    <div class="card">
        <h3>📊 Laporan</h3>
        <p>Rekap data aktivitas sistem secara lengkap.</p>
        <a href="laporan.php">Lihat</a>
    </div>
</div>

<footer>
    © <?= date("Y") ?> Sistem Reminder Mahasiswa — Politeknik Purbaya
</footer>

</body>
</html>
