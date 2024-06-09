<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wedding Organizer - Vendor</title>
    <style>
        @font-face {
            font-family: font;
            src: url(Montserrat-VariableFont_wght.ttf);
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
        section {
            padding: 20px;
            text-align: center;
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
        }
        .vendor-card {
            display: inline-block;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
            width: 300px;
            text-align: justify;
            margin: 0 10px;
            padding: 10px;
        }
        .vendor-card:hover {
            transform: scale(1.05);
        }
        .vendor-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 5px solid #eee;
        }
        .vendor-card h3 {
            padding: 5px;
        }
        .vendor-card p {
            display: inline-block;
        }
        .vendor-card button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            float: right;
        }
        .vendor-card button:hover {
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
    </style>
</head>
<body>

<header>
    <img src="logo no outline2.png" alt="logo" class="logo">
    <nav>
        <ul>
        <li><a href="web.php">Home</a></li>
        <li><a href="Venue.php">Venue</a></li>
        <li><a href="photography.php">photography</a></li>
        <li><a href="catering.php">Catering</a></li>
        <li><a href="order.php">Order</a></li>
        <li><a href="booking.php">Booking</a></li>
        <img src="pro-pic.png" class="user-pic">
        <a href="logout.php">Logout</a>
        </ul>
    </nav>
</header>

<section>
    <?php
    $sql = "SELECT id_venue, nama_venue, harga, kota, alamat, gambar FROM venue";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="vendor-card">';
            echo '<img src="'.$row["gambar"].'" alt="'.$row["nama_venue"].'">';
            echo '<h3>'.$row["nama_venue"].'</h3>';
            echo '<p>Kota: '.$row["kota"].'<br>Harga: Rp'.number_format($row["harga"], 0, ',', '.').'</p>';
            echo '<button onclick="window.location.href=\'https://maps.google.com/?q='.urlencode($row["alamat"]).'\'">View Location</button>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
    ?>
</section>

</body>
</html>
