<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard Sistem Reminder</title>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    display: flex;
    background: #f5f7fa;
}

/* Sidebar */
.sidebar {
    width: 230px;
    background: #1E3A8A; /* navy campus */
    min-height: 100vh;
    padding: 20px;
    color: #fff;
    position: fixed;
}

.logo {
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 30px;
    text-align: center;
}

.sidebar a {
    display: block;
    padding: 12px;
    margin: 6px 0;
    text-decoration: none;
    color: #e6e9f2;
    border-radius: 8px;
    transition: 0.3s;
}

.sidebar a:hover, .sidebar a.active {
    background: #ffffff;
    color: #1E3A8A;
    font-weight: 600;
}

.sidebar .logout {
    margin-top: 20px;
    background: #dc3545;
}

/* Content */
.main-content {
    margin-left: 230px;
    width: calc(100% - 230px);
    padding: 20px;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

header h2 {
    font-size: 26px;
    color: #1E3A8A;
}

.user-info {
    font-size: 14px;
    color: #555;
}

/* Dashboard Cards */
.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
}

.card {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    transition: transform .2s ease, box-shadow .2s ease;
    cursor: pointer;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.12);
}

.card h3 {
    color: #1E3A8A;
    font-size: 20px;
    margin-bottom: 6px;
}

.card p {
    color: #333;
    font-size: 14px;
}

</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2 class="logo">REMINDER</h2>
    <a href="dashboard.php" class="active">Dashboard</a>
    <a href="admin.php">Data Admin</a>
    <a href="dosen.php">Data Dosen</a>
    <a href="mahasiswa.php">Data Mahasiswa</a>
    <a href="jadwal.php">Jadwal Kuliah</a>
    <a href="tugas.php">Data Tugas</a>
    <a href="reminder.php">Reminder</a>
    <a href="laporan.php">Laporan</a>
    <a href="logout.php" class="logout">Logout</a>
</div>

<!-- Main Content -->
<div class="main-content">
    <header>
        <h2>Dashboard</h2>
        <div class="user-info">
            <span>Welcome, Admin</span>
        </div>
    </header>

    <section class="cards">
        <div class="card">
            <h3>Admin</h3>
            <p>Kelola akun admin</p>
        </div>

        <div class="card">
            <h3>Dosen</h3>
            <p>Data dosen dan login</p>
        </div>

        <div class="card">
            <h3>Mahasiswa</h3>
            <p>Data mahasiswa & reminder</p>
        </div>

        <div class="card">
            <h3>Jadwal Kuliah</h3>
            <p>Data jadwal dan ruang</p>
        </div>

        <div class="card">
            <h3>Tugas</h3>
            <p>Input tugas & deadline</p>
        </div>

        <div class="card">
            <h3>Reminder</h3>
            <p>Pengingat tugas mahasiswa</p>
        </div>

        <div class="card">
            <h3>Laporan</h3>
            <p>Rekap data & aktivitas</p>
        </div>
    </section>
</div>

</body>
</html>
