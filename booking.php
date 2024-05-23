<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css" />
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

        .container {
            font-family: 'Times New Roman', Times, serif;
            max-width: 800px;
            margin: 10vh auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            display: grid;
            grid-gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="time"],
        textarea {
            font-family: 'Times New Roman', Times, serif;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
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
                <li><a href="Vendor.html">Vendor</a></li>
                <li><a href="WO PHOTOGRAFER.html">Photography</a></li>
                <li><a href="#booth-layout">Booth Layout</a></li>
                <li><a href="WO - TENTANG KAMI.html">About Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1 class="text-center">Booking</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Pernikahan:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>

            <div class="mb-3">
                <label for="jam" class="form-label">Jam:</label>
                <input type="time" class="form-control" id="jam" name="jam" required>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi Pernikahan:</label>
                <select class="form-control" id="lokasi" name="lokasi" required>
                    <option value="">Pilih Lokasi</option>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "webdatabase";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    $sql = "SELECT id_venue, nama, kota, harga FROM venue";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_venue'] . "'>" . $row['nama'] . " - " . $row['kota'] . " - Rp" . $row['harga'] . "</option>";
                        }
                    }

                    $conn->close();
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="service" class="form-label">Paket Service:</label>
                <select class="form-control" id="service" name="service" required>
                    <option value="">Pilih Service</option>
                    <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    $sql = "SELECT id_service, paket_servis FROM servis";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_service'] . "'>" . $row['paket_servis'] . "</option>";
                        }
                    }

                    $conn->close();
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan Tambahan:</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Fetch Venue Data
        fetch('submit.php?action=fetch_venue')
            .then(response => response.json())
            .then(data => {
                let lokasiSelect = document.getElementById('lokasi');
                data.forEach(venue => {
                    let option = document.createElement('option');
                    option.value = venue.id_venue;
                    option.text = `${venue.nama} - ${venue.kota} - Rp${venue.harga}`;
                    lokasiSelect.add(option);
                });
            })
            .catch(error => console.error('Error fetching venue data:', error));

        // Fetch Service Data
        fetch('submit.php?action=fetch_service')
            .then(response => response.json())
            .then(data => {
                let serviceSelect = document.getElementById('service');
                data.forEach(service => {
                    let option = document.createElement('option');
                    option.value = service.id_service;
                    option.text = service.paket_servis;
                    serviceSelect.add(option);
                });
            })
            .catch(error => console.error('Error fetching service data:', error));
    });
</script>
</body>
</html>
<?php
$servername = "localhost"; // atau nama server database Anda
$username = "root"; // username database Anda
$password = ""; // password database Anda
$dbname = "webdatabase"; // nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menyimpan data ke tabel booking
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $nama_venue = $_POST['lokasi'];
    $paket_service = $_POST['service'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO booking (nama, email, tanggal, jam, nama_venue, paket_service, pesan)
            VALUES ('$nama', '$email', '$tanggal', '$jam', '$nama_venue', '$paket_service', '$pesan')";
+
if ($conn->query($sql) === TRUE) {
        echo "Booking berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
