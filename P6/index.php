<?php
session_start();
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Kampus</title>

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #0a0f24;
            color: white;
        }

        /* Background image */
        .hero {
            height: 100vh;
            background: 
                linear-gradient(rgba(0, 15, 40, 0.7), rgba(0, 10, 35, 0.9)),
                url('https://images.unsplash.com/photo-1555949963-aa79dcee981c?auto=format&fit=crop&w=1600&q=80')
                center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 80px;
        }

        .title {
            font-size: 50px;
            font-weight: 700;
            max-width: 520px;
            line-height: 1.2;
            animation: slideDown .9s ease;
            text-shadow: 0px 0px 15px rgba(0,150,255,0.5);
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .subtitle {
            font-size: 18px;
            max-width: 480px;
            margin-top: 15px;
            opacity: 0.9;
            animation: fadeIn 1.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        .btn-box {
            margin-top: 30px;
            animation: fadeIn 1.8s ease;
        }

        .btn {
            display: inline-block;
            padding: 14px 32px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            margin-right: 15px;
            transition: 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(45deg, #007BFF, #00d4ff);
            color: white;
            box-shadow: 0 0 10px rgba(0,150,255,0.6);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 14px rgba(0,200,255,0.9);
        }

        .btn-outline {
            border: 2px solid #00b4ff;
            color: #00b4ff;
        }

        .btn-outline:hover {
            background: #00b4ff;
            color: #001a2d;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #8faad9;
            font-size: 14px;
        }

    </style>
</head>
<body>

<div class="hero">
    <h1 class="title">Sistem Informasi Kampus Berbasis Teknologi Modern</h1>

    <p class="subtitle">
        Manajemen data akademik, jadwal kuliah, tugas, dan pengingat otomatis 
        dalam satu platform digital yang cerdas dan terintegrasi.
    </p>

    <div class="btn-box">
        <a href="login.php" class="btn btn-primary">Login</a>
        <a href="register_admin.php" class="btn btn-outline">Daftar Akun</a>
    </div>
</div>

<div class="footer">
    © <?= date("Y") ?> Sistem Informasi Kampus — Teknologi Masa Depan
</div>

</body>
</html>
