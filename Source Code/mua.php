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
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
            text-align: center;
            padding: 20px;
            position: relative;
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
        .detail-section {
            display: none;
            text-align: left;
            margin-top: 10px;
        }
        .detail-section p {
            margin: 0;
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
            <li><a href="Venueee.html">Venue</a></li>
            <li><a href="WO PHOTOGRAFER.html">Photography</a></li>
            <li><a href="#catering">Catering</a></li>
            <li><a href="#Dress">Dress</a></li>
            <li><a href="WO - TENTANG KAMI.html">About Us</a></li>
        </ul>
    </nav>
</header>

<section>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id_mua, paket_mua, deskripsi, harga, gambar FROM mua";
    $result = $conn->query($sql);

    $sql = "SELECT id_mua, paket_mua, deskripsi, harga, gambar FROM mua";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="vendor-card">';
            echo '<img src="'.$row["gambar"].'" alt="'.$row["paket_mua"].'">';
            echo '<h3>'.$row["paket_mua"].'</h3>';
            echo '<p>'.$row["deskripsi"].'</p>';
            echo '<p>Harga: Rp'.number_format($row["harga"], 0, ',', '.').'</p>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    
    ?>
</section>

</body>
</html>
