<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem Akademik</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0a0f26, #1a2540);
            overflow: hidden;
        }

        /* Glow background animation */
        .glow {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(0,255,255,0.3) 0%, transparent 70%);
            animation: moveGlow 10s infinite alternate;
            filter: blur(60px);
        }

        @keyframes moveGlow {
            0% { top: -50px; left: -50px; }
            100% { top: 300px; left: 200px; }
        }

        .login-box {
            position: relative;
            width: 380px;
            padding: 30px;
            background: rgba(255,255,255,0.07);
            border-radius: 18px;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 0 25px rgba(0,255,255,0.2);
            animation: fadeIn 1.2s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #00eaff;
            text-shadow: 0 0 10px #00eaff;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-size: 14px;
            background: rgba(0,0,0,0.3);
            color: #00eaff;
            border: 1px solid #00eaff50;
        }

        input::placeholder {
            color: #9eefff8c;
        }

        select {
            color: #00eaff;
        }

        select option {
            background: #0a0f26;
            color: #00eaff;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #00eaff, #7a5cff);
            border: none;
            border-radius: 10px;
            color: #0d102b;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.07);
            box-shadow: 0 0 15px #00eaff;
        }
    </style>
</head>
<body>

<div class="glow"></div>

<div class="login-box">
    <h2>Login Sistem</h2>

    <form action="proses_login.php" method="POST">
        <input type="text" name="username" placeholder="Masukkan Username" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>

        <select name="role" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="mahasiswa">Mahasiswa</option>
        </select>

        <button type="submit">MASUK</button>
    </form>
</div>

</body>
</html>
