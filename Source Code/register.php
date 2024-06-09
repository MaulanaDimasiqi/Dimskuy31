<?php
session_start();
include 'config.php';

$registerErrorMessage = '';

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin.php");
    } else {
        header("Location: user.php");
    }
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $query = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header("Location: register.php");
        exit();
    } else {
        $registerErrorMessage = "Gagal melakukan registrasi!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
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
        max-height: 200px;
        margin: 0 auto 10px auto;
}

        @media (max-width: 480px) {
    .logo {
        max-width: 150px;
        max-height: 150px;
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
        input[type="email"],
        select,
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
        input[type="email"]:focus,
        select:focus {
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

        .notification {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
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
            animation: spin 1s linear infinite;
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
            input[type="email"],
            select,
            button {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
<div class="container">
        <form class="register-form" action="register.php" method="POST" onsubmit="showRegisterLoading()">
            <img src="logo no outline2.png" alt="Logo" class="logo">
            <h2>Register</h2>
            <div class="loading-spinner" id="registerLoadingSpinner"></div>

            <?php if ($registerErrorMessage) { echo "<p class='message error'>$registerErrorMessage</p>"; } 
            ?>

    <?php 
    if (isset($_SESSION['success'])) {
        echo "<p class='message success'>" . $_SESSION['success'] . "</p>"; 
        unset($_SESSION['success']);
    }
    ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <select name="role" required>
                <option value="user">User</option>

            </select>
            <button type="submit" name="submit" id="registerButton">Register</button>
            <p class="message">Sudah punya akun? <a href="login.php">Login</a></p>
        </form>
    </div>

    <script>
        function showRegisterLoading() {
            document.getElementById('registerButton').style.display = 'none';
            document.getElementById('registerLoadingSpinner').style.display = 'block';
        }
    </script>
</body>
</html>