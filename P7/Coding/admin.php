<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Admin | Sistem Reminder Mahasiswa</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
/* ===== RESET & FONT ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* ===== BODY ===== */
body {
    background: linear-gradient(to bottom right, #eef2ff, #f8fafc);
    color: #333;
    display: flex;
}

/* ===== SIDEBAR ===== */
.sidebar {
    width: 250px;
    background: #1E3A8A;
    color: #fff;
    position: fixed;
    height: 100vh;
    display: flex;
    flex-direction: column;
    padding-top: 30px;
    box-shadow: 2px 0 12px rgba(0,0,0,0.1);
}

.sidebar h2 {
    text-align: center;
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 30px;
    letter-spacing: 1px;
}

.sidebar a {
    display: block;
    color: #e0e7ff;
    text-decoration: none;
    padding: 12px 18px;
    border-radius: 10px;
    margin: 6px 12px;
    transition: all 0.25s;
    font-weight: 500;
}

.sidebar a:hover,
.sidebar a.active {
    background: #ffffff;
    color: #1E3A8A;
    font-weight: 600;
}

.sidebar .logout {
    background: #DC2626;
    text-align: center;
    margin-top: auto;
    margin: 15px 12px;
}
.sidebar .logout:hover {
    background: #B91C1C;
}

/* ===== MAIN CONTENT ===== */
.main-content {
    margin-left: 250px;
    padding: 40px;
    width: calc(100% - 250px);
}

/* ===== HEADER ===== */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.page-header h2 {
    color: #1E3A8A;
    font-size: 26px;
    font-weight: 700;
}

.btn-back {
    text-decoration: none;
    background: #64748B;
    color: white;
    padding: 10px 16px;
    border-radius: 10px;
    font-weight: 500;
    transition: all 0.2s;
}
.btn-back:hover { background: #475569; }

.btn-primary {
    display: inline-block;
    background: #2563EB;
    color: white;
    padding: 10px 18px;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    margin-bottom: 20px;
    transition: 0.3s;
}
.btn-primary:hover { background: #1E40AF; }

/* ===== TABLE ===== */
.table-container {
    background: #ffffff;
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table thead {
    background: #1E3A8A;
    color: white;
}

.data-table th, .data-table td {
    padding: 12px 14px;
    text-align: left;
    font-size: 15px;
    border-bottom: 1px solid #e2e8f0;
}

.data-table tbody tr:nth-child(even) {
    background: #f8fafc;
}

.data-table tbody tr:hover {
    background: #e0e7ff;
}

/* ===== BUTTONS ===== */
.btn-edit {
    background: #10B981;
    color: white;
    padding: 7px 12px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    transition: 0.25s;
}
.btn-edit:hover { background: #059669; }

.btn-delete {
    background: #EF4444;
    color: white;
    padding: 7px 12px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    transition: 0.25s;
}
.btn-delete:hover { background: #DC2626; }

/* ===== FOOTER ===== */
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
    <a href="admin.php" class="active">👤 Data Admin</a>
    <a href="dosen.php">🎓 Data Dosen</a>
    <a href="mahasiswa.php">🧑‍🎓 Data Mahasiswa</a>
    <a href="jadwal.php">📅 Jadwal Kuliah</a>
    <a href="tugas.php">📝 Data Tugas</a>
    <a href="reminder.php">⏰ Reminder</a>
    <a href="laporan.php">📊 Laporan</a>
    <a href="logout.php" class="logout">🚪 Logout</a>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">

    <div class="page-header">
        <h2>Data Admin</h2>
        <a href="dashboard_admin.php" class="btn-back">← Kembali</a>
    </div>

    <a href="tambah_admin.php" class="btn-primary">+ Tambah Admin</a>

    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
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

                    // Jika foto kosong, gunakan default.png
                    $foto = $data['foto'] == "" ? "default.png" : $data['foto'];
                ?>
                <tr>
                    <td><?= $no++; ?></td>

                    <td>
                        <img src="uploads/<?= $foto; ?>" 
                             style="width:55px; height:55px; object-fit:cover; border-radius:10px;">
                    </td>

                    <td><?= htmlspecialchars($data['username']); ?></td>
                    <td><?= htmlspecialchars($data['password']); ?></td>

                    <td>
                        <a href="edit_admin.php?id=<?= $data['id_admin']; ?>" class="btn-edit">Edit</a>
                        <a href="hapus_admin.php?id=<?= $data['id_admin']; ?>" class="btn-delete" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

    <footer>
        © <?= date("Y") ?> Sistem Reminder Mahasiswa — Politeknik Purbaya
    </footer>

</div>

</body>
</html>
