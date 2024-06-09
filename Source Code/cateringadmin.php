<?php
    $conn = new mysqli('localhost', 'root', '', 'web');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Wedding Organizer - Catering</title>
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
        .detail-section {
            display: none;
            text-align: left;
            margin-top: 10px;
        }
        .detail-section p {
            margin: 0;
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
    <script>
        function toggleDetails(id) {
            var details = document.getElementById(id);
            if (details.style.display === "none") {
                details.style.display = "block";
            } else {
                details.style.display = "none";
            }
        }
    </script>
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
            <li><a href="orderadmin.php">Order</a></li>
            <img src="pro-pic.png" class="user-pic">
            <a href="logout.php">Logout</a>
        </ul>
    </nav>
</header>

<div class="container">
    <div class="card-container">
        <?php
        // Add new catering package
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_catering'])) {
            $paket_catering = $_POST['paket_catering'];
            $deskripsi = $_POST['deskripsi'];
            $harga = $_POST['harga'];
            $menu = $_POST['menu'];
            $porsi = $_POST['porsi'];

            $nama_gambar = $paket_catering . '.jpg';
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $folder = "picture/" . $nama_gambar;
            move_uploaded_file($tmp_name, $folder);

            $sql = "INSERT INTO catering (paket_catering, deskripsi, harga, menu, porsi, gambar) VALUES ('$paket_catering', '$deskripsi', '$harga', '$menu', '$porsi', '$folder')";

            if ($conn->query($sql) === TRUE) {
                echo "";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Delete catering package
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_catering'])) {
            $id_catering = $_POST['id_catering'];

            $sql = "DELETE FROM catering WHERE id_catering = '$id_catering'";

            if ($conn->query($sql) === TRUE) {
                echo "";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Display catering packages
        $sql = "SELECT id_catering, paket_catering, deskripsi, harga, menu, porsi, gambar FROM catering";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="vendor-card">';
                echo '<img src="'.$row["gambar"].'" alt="'.$row["paket_catering"].'">';
                echo '<h3>'.$row["paket_catering"].'</h3>';
                echo '<p>'.$row["deskripsi"].'</p>';
                echo '<button onclick="toggleDetails(\'details-'.$row["id_catering"].'\')">View Detail</button>';
                echo '<div id="details-'.$row["id_catering"].'" class="detail-section">';
                echo '<p>Harga: Rp'.number_format($row["harga"], 0, ',', '.').'</p>';
                echo '<p>Menu: '.$row["menu"].'</p>';
                echo '<p>Porsi: '.$row["porsi"].'</p>';
                echo '</div>';
                echo '<form method="POST" action="" style="margin-top: 10px;">';
                echo '<input type="hidden" name="id_catering" value="'.$row["id_catering"].'">';
                echo '<button type="submit" name="delete_catering" style="background-color: red;">Delete Package</button>';
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
        <!-- Form to add a new catering package -->
        <form method="POST" action="" enctype="multipart/form-data">
            <h3>Add New Catering Package</h3>
            <label for="paket_catering">Nama Paket:</label>
            <input type="text" id="paket_catering" name="paket_catering" required>

            <label for="deskripsi">Deskripsi:</label>
            <input type="text" id="deskripsi" name="deskripsi" required>

            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" required>

            <label for="menu">Menu:</label>
            <input type="text" id="menu" name="menu" required>

            <label for="porsi">Porsi:</label>
            <input type="number" id="porsi" name="porsi" required>

            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" required>

            <button type="submit" name="add_catering">Add Package</button>
        </form>
    </div>
</div>

</body>
</html>