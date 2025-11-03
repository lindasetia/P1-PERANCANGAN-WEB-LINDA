<?php 
require_once "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Reminder & Tugas Mahasiswa</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0; padding: 0; box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    body {
        height: 100vh;
        width: 100%;
        background-image:('gambar_website'); /* GANTI DENGAN GAMBAR-MU */
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    /* Overlay gelap elegan */
    body::before {
        content: "";
        position: absolute;
        top:0; left:0; right:0; bottom:0;
        background: rgba(0,0,0,0.55);
        backdrop-filter: blur(3px);
    }

    .wrapper {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        max-width: 680px;
        padding: 20px;
    }

    h1 {
        font-size: 2.6rem;
        font-weight: 800;
        margin-bottom: 10px;
        text-shadow: 0 5px 15px rgba(0,0,0,0.6);
    }

    p {
        font-size: 1.1rem;
        font-weight: 300;
        margin-bottom: 30px;
        line-height: 1.6;
        opacity: .9;
    }

    .btn-box {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 12px 26px;
        border: none;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        transition: .25s;
    }

    .btn-primary {
        background: #0d6efd;
        color: white;
    }
    .btn-primary:hover {
        background: #0b5ed7;
    }

    .btn-outline {
        border: 2px solid white;
        color: white;
        background: transparent;
    }
    .btn-outline:hover {
        background: white;
        color: black;
    }

    footer {
        position: absolute;
        bottom: 12px;
        color: rgba(255,255,255,0.75);
        font-size: .85rem;
    }
</style>
</head>
<body>

<div class="wrapper">
    <h1>Sistem Reminder & Tugas Mahasiswa</h1>
    <p>
        Platform pengingat jadwal kuliah & tugas mahasiswa untuk membantu
        perencanaan studi yang lebih teratur, produktif, dan terarah.
    </p>

    <div class="btn-box">
        <a href="login.php" class="btn btn-primary">Masuk Sistem</a>
        <a href="dashboard.php" class="btn btn-outline">Dashboard</a>
    </div>
</div>

<footer>
    © <?= date("Y") ?> Sistem Reminder Mahasiswa — Politeknik Purbaya
</footer>

</body>
</html>
