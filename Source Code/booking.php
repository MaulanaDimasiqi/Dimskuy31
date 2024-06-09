<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];

// Mendapatkan data untuk dropdown
$venues = $conn->query("SELECT id_venue, nama_venue, harga FROM venue");
$caterings = $conn->query("SELECT id_catering, paket_catering, harga FROM catering");
$dresses = $conn->query("SELECT id_dress, nama_dress, harga FROM dress");
$muas = $conn->query("SELECT id_mua, paket_mua, harga FROM mua");
$photographies = $conn->query("SELECT id_photo, paket_photo, harga FROM photography");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    
    list($id_venue, $harga_venue) = explode(',', $_POST['venue']);
    list($id_catering, $harga_catering) = explode(',', $_POST['catering']);
    list($id_dress, $harga_dress) = explode(',', $_POST['dress']);
    list($id_mua, $harga_mua) = explode(',', $_POST['mua']);
    list($id_photo, $harga_photo) = explode(',', $_POST['photography']);
    
    $total_harga = $harga_venue + $harga_catering + $harga_dress + $harga_mua + $harga_photo;

    $sql = "INSERT INTO booking (nama, venue, catering, dress, mua, photography, harga) VALUES ('$nama', '$id_venue', '$id_catering', '$id_dress', '$id_mua', '$id_photo', '$total_harga')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f2f2f2;
            padding: 1rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
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
            color: #333;
        }

        .user-pic {
            width: 40px;
            border-radius: 50%;
            cursor: pointer;
            margin-left: 30px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 100px auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"], select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
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
            <li><a href="photography.php">Photography</a></li>
            <li><a href="catering.php">Catering</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="booking.php">Booking</a></li>
            <img src="pro-pic.png" class="user-pic">
            <a href="logout.php">Logout</a>
        </ul>
    </nav>
</header>
<div class="container">
    <h2>Booking Form</h2>
    <form action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($username); ?>" readonly><br>

        <label for="venue">Venue:</label>
        <select id="venue" name="venue">
            <?php while ($row = $venues->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_venue'] . ',' . $row['harga']; ?>"><?php echo htmlspecialchars($row['nama_venue']); ?></option>
            <?php } ?>
        </select><br>

        <label for="catering">Catering:</label>
        <select id="catering" name="catering">
            <?php while ($row = $caterings->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_catering'] . ',' . $row['harga']; ?>"><?php echo htmlspecialchars($row['paket_catering']); ?></option>
            <?php } ?>
        </select><br>

        <label for="dress">Dress:</label>
        <select id="dress" name="dress">
            <?php while ($row = $dresses->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_dress'] . ',' . $row['harga']; ?>"><?php echo htmlspecialchars($row['nama_dress']); ?></option>
            <?php } ?>
        </select><br>

        <label for="mua">MUA:</label>
        <select id="mua" name="mua">
            <?php while ($row = $muas->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_mua'] . ',' . $row['harga']; ?>"><?php echo htmlspecialchars($row['paket_mua']); ?></option>
            <?php } ?>
        </select><br>

        <label for="photography">Photography:</label>
        <select id="photography" name="photography">
            <?php while ($row = $photographies->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_photo'] . ',' . $row['harga']; ?>"><?php echo htmlspecialchars($row['paket_photo']); ?></option>
            <?php } ?>
        </select><br>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
