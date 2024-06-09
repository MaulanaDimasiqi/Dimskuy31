<?php
$conn = new mysqli('localhost', 'root', '', 'web');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $id_booking = $_POST['id_booking'];
    $delete_sql = "DELETE FROM booking WHERE id_booking = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param('i', $id_booking);
    $stmt->execute();
    $stmt->close();
    header("Location: ".$_SERVER['PHP_SELF']); // Redirect to the same page to see the changes
    exit();
}

$sql = "
SELECT 
    b.id_booking, b.nama, v.nama_venue, c.paket_catering, d.nama_dress, m.paket_mua, p.paket_photo, b.harga 
FROM 
    booking b
JOIN 
    venue v ON b.venue = v.id_venue
JOIN 
    catering c ON b.catering = c.id_catering
JOIN 
    dress d ON b.dress = d.id_dress
JOIN 
    mua m ON b.mua = m.id_mua
JOIN 
    photography p ON b.photography = p.id_photo";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking List</title>
    <style>
         @import url(https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap);
    
          
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

      main
      {
        font-family: font;
      
      }

      section{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        margin-top: 50px;
        margin-bottom: 100px;
        gap: 10px;
      }
      .banner 
      {
       margin-top: 8px;
       width: 1500px;
       height: auto;
      }
      
      .image-title-container 
      {
      margin-top: 100px;
      margin-left: 300px;
      display: flex;
      align-items: left;
      }

      .image-title-container img 
      {
      display: flex;
      margin-right: 15px;
      width: 300px;
      height: auto;
      }

      .title 
      {
      display: block;
      margin-left: 20px;
      margin-right: 300px;
      }

      .text-container 
      {
      display: block;
      margin-left: 300px;
      margin-right: 300px;
      }

      .image-button 
      {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        text-decoration: none;
        opacity: 85%;
      }

      .image-button img 
      {
        vertical-align: middle;
        width: 300px;
        transition: 0.3s;
        height: flex;
      }
      
      .image-button img:hover 
      {
        transform: scale(1.1);
      }

      .user-pic
      {
        width: 40px;
        border-radius: 50%;
        cursor: pointer;
        margin-left: 30px;
      }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .list {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
        .list-item {
            background-color: #fff;
            margin-bottom: 10px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .delete-form {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .delete-button {
            background-color: #ff4c4c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-button:hover {
            background-color: #ff0000;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
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
    <h2>Booking List</h2>
    <ul class="list">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <li class="list-item">
                <h3>ID Booking: <?php echo $row['id_booking']; ?></h3>
                <p><strong>Nama:</strong> <?php echo $row['nama']; ?></p>
                <p><strong>Venue:</strong> <?php echo $row['nama_venue']; ?></p>
                <p><strong>Catering:</strong> <?php echo $row['paket_catering']; ?></p>
                <p><strong>Dress:</strong> <?php echo $row['nama_dress']; ?></p>
                <p><strong>MUA:</strong> <?php echo $row['paket_mua']; ?></p>
                <p><strong>Photography:</strong> <?php echo $row['paket_photo']; ?></p>
                <p><strong>Total Harga:</strong> <?php echo $row['harga']; ?></p>
                <form class="delete-form" method="post" action="">
                    <input type="hidden" name="id_booking" value="<?php echo $row['id_booking']; ?>">
                    <button type="submit" name="delete" class="delete-button">Cancel Booking</button>
                </form>
            </li>
        <?php } ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
