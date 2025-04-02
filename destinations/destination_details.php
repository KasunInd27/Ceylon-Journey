<?php
include('db.php');

// Gget id from url
$id = $_GET['id'];

$sql = "SELECT * FROM destinations WHERE id=$id";
$result = $conn->query($sql);

// check if exists
if ($result->num_rows > 0) {
    $destination = $result->fetch_assoc();
} else {
    echo "Destination not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $destination['name']; ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="../HF/hstyles.css">
    <link rel="stylesheet" href="../HF/fstyles.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            
        }

        /* Main content container */
        .container {
            margin: 100px 20px 20px;
            width: 50%;
            max-width: 50%;
            padding: 20px;
            margin-bottom: 130px;
        }

        .destination-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #f9f9f9;
        }

        .destination-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .destination-card h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .destination-card p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            color: #666;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        footer {
            background-color: black;
            padding: 40px;
            text-align: center;
            color: white;
            font-size: 1.5rem; /* Adjust as needed */
            position: fixed;
            bottom: 0;
            width: 100%;
            left: 0;
            margin: 0;
            z-index: 100; /* Ensures footer stays above other content */
        }

        .footer-content {
            margin-bottom: 10px;
        }

        .footer-content a {
            color: white;
            text-decoration: none;
            margin: 0 15px; /* Adjust space between links */
            font-size: 1.2rem; /* Adjust font size */
        }

        .footer-content a:hover {
            text-decoration: underline;
        }

        footer p {
            margin: 0;
            font-size: 1.2rem; /* Adjust font size */
        }

    </style>
</head>
<body>

<!-- Header Section -->
    <header>
        <!-- Menu icon for mobile view -->
        <div id="menu-bar" class="fas fa-bars"></div>

        <!-- Website logo -->
        <a href="#" class="logo"><span>C</span>eylon Journey</a>

        <!-- Navigation menu with links to different sections of the website -->
        <nav class="navbar">
            <a href="../Home/home.php">Home</a>
            <a href="../contact and hotels/hotels.php">Hotels</a>
            <a href="../Rides/ride.php">Rides</a>
            <a href="../destinations/destinations.php">Destination</a>
            <a href="../review/service.php">Services</a>
            <a href="../review/review1.php">Review</a>
            <a href="../contact and hotels/contact.php">Contact</a>
        </nav>

        <!-- Login button -->
        <div class="login-btn-container">
            <a href="../Login Page/login.php" class="btn login-btn">Login</a>
        </div>
    </header>

    <!-- JavaScript for toggling the mobile menu -->
    <script>
        let menuBar = document.getElementById('menu-bar');
        let navbar = document.querySelector('.navbar');

        menuBar.onclick = () => {
            menuBar.classList.toggle('fa-times'); // Toggle icon between bars and times (for close)
            navbar.classList.toggle('active'); // Toggle active class on the navbar
        };
    </script>

<div class="container">
    <div class="destination-card">
        <img src="../destinations/uploads/<?php echo $destination['image']; ?>" alt="<?php echo $destination['name']; ?>">
        <h1><?php echo $destination['name']; ?></h1>
        <p><?php echo $destination['description']; ?></p>
        <a class="back-link" href="../destinations/destinations.php">Back to Destinations</a>
    </div>
</div>

<footer>
        <div class="footer-content">
            <a href="#">About Us</a>
            <a href="#">FAQs</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy & Cookies Policy</a>
        </div>
        <div class="footer-copyright">
            <p>© 2024, Ceylon Journey, All rights reserved</p>
        </div>
</footer>

</body>
</html>
