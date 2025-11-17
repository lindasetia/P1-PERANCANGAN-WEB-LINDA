<?php
session_start();
include "koneksi.php"; 

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #0a0f24;
            color: white;
        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: 
                linear-gradient(rgba(0, 15, 40, 0.7), rgba(0, 10, 35, 0.9)),
                url('https://images.unsplash.com/photo-1555949963-aa79dcee981c?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
        }

        .card {
            background: rgba(255,255,255,0.1);
            padding: 35px;
            width: 380px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 15px rgba(0,150,255,0.5);
            animation: fadeIn .9s ease;
        }

        @keyframes fadeIn {
            from {opacity:0; transform: translateY(15px);}
            to   {opacity:1; transform: translateY(0);}
        }

        h2 {
            text-align: center;
            font-size: 26px;
            font-weight: 600;
            text-shadow: 0 0 10px #00c3ff;
        }

        label {
            font-size: 14px;
            opacity: 0.9;
        }

        input {
            width: 100%;
            padding: 11px;
            margin: 8px 0 18px;
            border-radius: 8px;
            border: none;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            background: linear-gradient(45deg, #007BFF, #00d4ff);
            color: white;
            border: none;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0,150,255,0.5);
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: #00b4ff;
            text-decoration: none;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="card">

        <h2>Registrasi Admin</h2>

        <?php if(isset($_SESSION['error'])) { ?>
            <div style="color: #ff7a7a; margin-bottom: 10px;">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php } ?>

        <?php if(isset($_SESSION['success'])) { ?>
            <div style="color: #7dff9c; margin-bottom: 10px;">
                <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php } ?>

        <form action="proses_register_admin.php" method="POST">

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn">Daftar</button>

        </form>

        <p class="login-link">
            Sudah punya akun? <a href="login.php">Login</a>
        </p>
    </div>
</div>

</body>
</html>
