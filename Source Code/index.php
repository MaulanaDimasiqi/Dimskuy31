<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin.php");
    } else {
        header("Location: user.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 400px;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .logo {
            margin: 20px 0;
            width: 150px;
            max-width: 100%;
            height: auto;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        .button-container a {
            flex: 1;
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
            font-family: arial, sans-serif;
        }

        .button-container a:hover {
            background-color: #0056b3;
        }

        footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome</h2>
        <img src="logo no outline2.png" alt="Logo" class="logo">
        <p>Selamat datang di website kami! Silakan masuk atau daftar untuk mengakses semua fitur dan menikmati layanan kami.</p>
        <div class="button-container">
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
        <footer>
            &copy; <?php echo date("Y"); ?> Splendours. All rights reserved.
        </footer>
    </div>
</body>
</html>
