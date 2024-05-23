<?php
$servername = "localhost"; // atau nama server database Anda
$username = "root"; // username database Anda
$password = ""; // password database Anda
$dbname = ""; // nama database Anda


// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) 
    {
    die("Koneksi gagal: " . $conn->connect_error);
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Menyimpan data ke tabel user
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password= $_POST['password'];
    
    $sql = "INSERT INTO user (first_name, last_name, email, 'password')
            VALUES ('$first_name', '$last_name', '$email', '$password',)";
    
        if ($conn->query($sql) === TRUE) {
            echo "Booking berhasil disimpan.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();

    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Wedding Organizer - Registration</title>
    <style>
        @font-face {
            font-family: font;
            src: url(Montserrat-VariableFont_wght.ttf);
        }
        
        body {
            font-family: font;
            src: url(Montserrat-VariableFont_wght.ttf);
            margin: 0;
            padding: 0;
            background-color: #bcbec0; /* Replace with your background image URL */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        header {
            font-family: font;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f2f2f2;
            padding: 1rem;
        }
        
        .logo {
            margin-left: 20px;
            width: 175px;
            height: auto;
        }
        
        nav ul {
            font-size: 20px;
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        
        nav li {
            margin-right: 1.5rem;
        }
        
        nav a {
            text-decoration: none;
            color: #000000; /* Changed to white for better contrast */
            transition: color 0.3s;
        }

        nav a:hover {
            color: #f0f0f0; /* Slightly lighter hover color */
        }

        section {
            padding: 20px;
            text-align: center;
        }

        form 
        {
            font-family: font;
            src:  url(Montserrat-VariableFont_wght.ttf);
            max-width: 800px;
            margin: 10vh auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }


        form h2 {
            text-align: left;
            color: #3c2415;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="date"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #4caf50;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <header>
        <img src="logo no outline2.png" alt="logo" class="logo">
        <nav>
          <ul>
            <li><a href="web.html">Home</a></li>
            <li><a href="galery.html" target="_self">Gallery</a></li>
            <li><a href="#vendor">Venue</a></li>
            <li><a href="WO PHOTOGRAFER.html">Photography</a></li>
            <li><a href="#booth-layout">Booth Layout</a></li>
            <li><a href="WO - TENTANG KAMI.html">About Us</a></li>
          </ul>
        </nav>
    </header>

    <section>
        <form>
            <h2>Register</h2>
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first-nabcbec0me" required>
            
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last-name" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
    </section>
</body>
</html>