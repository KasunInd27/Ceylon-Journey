<?php
include('db.php');

$category = $_GET['category'];

$sql = "SELECT * FROM destinations WHERE category='$category'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All <?php echo $category; ?> Destinations</title>
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
            padding-bottom: 100px;
        }

        

        /* Container */
        .container {
            margin: 100px 20px 20px;
            width: 100%;
            max-width: 100%;
            padding: 20px;
        }

        .destination-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .destination-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .destination-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .destination-card h3 {
            font-size: 1.2rem;
            margin: 10px;
        }

        .destination-card p {
            font-size: 0.9rem;
            margin: 10px;
            color: #666;
        }

        .read-more-link {
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

   
    <script>
        let menuBar = document.getElementById('menu-bar');
        let navbar = document.querySelector('.navbar');

        menuBar.onclick = () => {
            menuBar.classList.toggle('fa-times'); 
            navbar.classList.toggle('active'); 
        };
    </script>

<div class="container">
    <h1>All <?php echo $category; ?> Destinations</h1>
    <div class="destination-grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="destination-card">
                    <img src="uploads/' . $row['image'] . '" alt="' . $row['name'] . '">
                    <h3>' . $row['name'] . '</h3>
                    <p>' . substr($row['description'], 0, 80) . '... 
                    <a href="destination_details.php?id=' . $row['id'] . '" class="read-more-link">Read More</a></p>
                </div>';
            }
        }
        ?>
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
