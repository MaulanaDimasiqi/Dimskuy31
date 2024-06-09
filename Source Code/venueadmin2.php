<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wedding Organizer - Vendor</title>
    <style>
        @font-face {
            font-family: font;
            src:  url(Montserrat-VariableFont_wght.ttf);
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
            margin-top: 10px;
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
            color: #333;
        }
        main {
            font-family: font;
        }
        .banner {
            margin-top: 8px;
            width: 1500px;
            height: auto;
        }
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .card-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            flex: 3;
        }
        .vendor-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
            text-align: center;
            padding: 20px;
        }
        .vendor-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }
        .vendor-card:hover {
            transform: scale(1.05);
        }
        .vendor-card h3 {
            padding: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
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
        .form-container {
            flex: 1;
            margin-left: 20px;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 20px;
        }
    </style>
</head>
<body>

<header>
    <img src="logo no outline2.png" alt="logo" class="logo">
    <nav>
        <ul>
        <li><a href="webadmin.php">Home</a></li>
            <li><a href="venueadmin2.php">Venue</a></li>
            <li><a href="photographyadmin.php">photography</a></li>
            <li><a href="cateringadmin.php">Catering</a></li>
            <li><a href="dressadmin.php">Dress</a></li>
            <li><a href="muaadmin.php">Mua</a></li>
            <li><a href="orderaadmin.php">Order</a></li>
            <img src="pro-pic.png" class="user-pic">
            <a href="logout.php">Logout</a>
        </ul>
    </nav>
</header>

<div class="container">
    <div class="card-container">
        <?php
        // Add new venue
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_venue'])) {
            $nama_venue = $_POST['nama_venue'];
            $harga = $_POST['harga'];
            $kota = $_POST['kota'];
            $alamat = $_POST['alamat'];

            $nama_gambar = $nama_venue . '.jpg';
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $folder = "picture/" . $nama_gambar;
            move_uploaded_file($tmp_name, $folder);

            $sql = "INSERT INTO venue (nama_venue, harga, kota, alamat, gambar) VALUES ('$nama_venue', '$harga', '$kota', '$alamat', '$folder')";

            if ($conn->query($sql) === TRUE) {
                echo "";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Delete venue
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_venue'])) {
            $id_venue = $_POST['id_venue'];

            $sql = "DELETE FROM venue WHERE id_venue = '$id_venue'";

            if ($conn->query($sql) === TRUE) {
                echo "";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Display venues
        $sql = "SELECT id_venue, nama_venue, harga, kota, alamat, gambar FROM venue";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="vendor-card">';
                echo '<img src="'.$row["gambar"].'" alt="'.$row["nama_venue"].'">';
                echo '<h3>'.$row["nama_venue"].'</h3>';
                echo '<p>Kota: '.$row["kota"].'<br>Harga: Rp'.number_format($row["harga"], 0, ',', '.').'</p>';
                echo '<button onclick="window.location.href=\'https://maps.google.com/?q='.urlencode($row["alamat"]).'\'">View Location</button>';
                echo '<form method="POST" action="" style="margin-top: 10px;">';
                echo '<input type="hidden" name="id_venue" value="'.$row["id_venue"].'">';
                echo '<button type="submit" name="delete_venue" style="background-color: red;">Delete Venue</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>

    <div class="form-container">
        <!-- Form to add a new venue -->
        <form method="POST" action="" enctype="multipart/form-data">
            <h3>Add New Venue</h3>
            <label for="nama_venue">Nama Venue:</label>
            <input type="text" id="nama_venue" name="nama_venue" required>

            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" required>

            <label for="kota">Kota:</label>
            <input type="text" id="kota" name="kota" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" required>

            <button type="submit" name="add_venue">Add Venue</button>
        </form>
    </div>
</div>

</body>
</html>
