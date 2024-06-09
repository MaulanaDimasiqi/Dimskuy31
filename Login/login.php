<?php
session_start();
include 'config.php';

$loginErrorMessage = '';

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin.php");
    } else {
        header("Location: user.php");
    }
    exit();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        if ($row['role'] == 'admin') {
            $_SESSION['success'] = "Login berhasil! Selamat datang, admin.";
            header("Location: admin.php");
        } else {
            $_SESSION['success'] = "Login berhasil! Selamat datang.";
            header("Location: user.php");
        }
        exit();
    } else {
        $loginErrorMessage = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    
    <style>

        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 400px;
            margin: 0 auto;
            padding-top: 100px;
            text-align: center;
        }

        @media (max-width: 480px) {
    .container {
        padding-top: 50px;
    }
}

.logo {
    max-width: 200px;
    height: auto;
    margin: 0 auto 10px auto;
}

@media (max-width: 480px) {
    .logo {
        max-width: 150px;
    }
}

        form,
        .welcome-message {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        button {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-family: arial, sans-serif;
        }

        .message a {
            color: #007bff;
            text-decoration: none;
        }

        .message a:hover {
            text-decoration: underline;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            margin: 20px auto;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            animation: spin 3s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 480px) {
            .container {
                padding-top: 50px;
            }

            form,
            .welcome-message {
                padding: 20px;
            }

            input[type="text"],
            input[type="password"],
            button {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="login-form" action="login.php" method="POST" onsubmit="showLoading()">
            <img src="logo no outline2.png" alt="Logo" class="logo">
            <h2>Login</h2>
            <div class="loading-spinner" id="loadingSpinner"></div>

            <?php if ($loginErrorMessage) { echo "<p class='message error'>$loginErrorMessage</p>"; } ?>
            <?php 
    if (isset($_SESSION['success'])) {
        echo "<p class='message success'>" . $_SESSION['success'] . "</p>"; 
        unset($_SESSION['success']);
    }
    ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" id="loginButton">Login</button>
            <p class="message">Belum punya akun? <a href="register.php">Daftar</a></p>
        </form>
    </div>

    <script>
        function showLoading() {
            document.getElementById('loginButton').style.display = 'none';
            document.getElementById('loadingSpinner').style.display = 'block';
        }
    </script>
</body>
</html>
