<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Selamat Datang Admin</h2>
        <p>Anda telah berhasil login sebagai admin.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
