<?php
include('db.php');

// get 2 random destinations cat wise
function fetchRandomDestinations($conn, $category) {
    $sql = "SELECT * FROM destinations WHERE category='$category' ORDER BY RAND() LIMIT 2";
    return $conn->query($sql);
}

// cat des
$categoryDescriptions = [
    "Beach Side" => "Enjoy the serene beaches of Sri Lanka with golden sands and azure waters. Perfect for a relaxing vacation.",
    "Mountain" => "Explore the breathtaking mountains and hills of Sri Lanka, offering scenic views and hiking trails.",
    "Jungle" => "Delve into the lush jungles of Sri Lanka and experience the island’s rich biodiversity and wildlife."
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- CSS -->
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
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
            font-size: 18px; /* Increased font size */
            line-height: 1.6; /* Improves readability by increasing the line height */
            color: #333;
        }

        

        .container {
            margin: 100px 20px 20px;
            width: 100%;
            max-width: 100%;
            padding: 20px;
        }

        .category-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        .left-column {
            flex: 0 0 25%;
            padding-right: 20px;
            background-color: #f7f7f7;
            border-right: 1px solid #ddd;
        }

        .left-column h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .category-description {
            margin-bottom: 40px;
            color: #666;
        }

        .right-column {
            flex: 0 0 73%;
            padding-left: 20px;
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
            font-size: 20px;
            margin: 10px;
        }

        .destination-card p {
            font-size: 15px;
            margin: 10px;
            color: #666;
            max-height: 80px;
            overflow: hidden;
            position: relative;
        }

        .read-more-link, .more-button {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .more-button {
            margin-top: 20px;
            display: block;
            text-align: center;
            text-decoration: none;
            color:#ffa500;
        }

        footer {
        background-color: black;
        padding: 40px;
        text-align: center;
        color: white;
        font-size: 2rem;
        bottom: 0;
        width: 100%; /* Makes the footer span the entire width of the page */
        z-index: 1000; /* Ensures the footer is above other content */
    }

    .footer-content {
        margin-bottom: 20px;
    }

    .footer-content a {
        color: white;
        text-decoration: none;
        margin: 0 25px;
        font-size: 2rem;
    }

    .footer-content a:hover {
        text-decoration: underline;
    }

    footer p {
        margin: 0;
        font-size: 2rem;
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

    <!-- row beach side -->
    <div class="category-row">
        <div class="left-column">
            <h2>Beach Side</h2>
            <p class="category-description"><?php echo $categoryDescriptions['Beach Side']; ?></p>
        </div>
        <div class="right-column">
            <div class="destination-grid">
                <?php
                $beachDestinations = fetchRandomDestinations($conn, 'Beach Side');
                while ($row = $beachDestinations->fetch_assoc()) {
                    echo '
                    <div class="destination-card">
                        <img src="../destinations/uploads/' . $row['image'] . '" alt="' . $row['name'] . '">
                        <h3>' . $row['name'] . '</h3>
                        <p class="description">' . substr($row['description'], 0, 80) . '... 
                        <a href="destination_details.php?id=' . $row['id'] . '" class="read-more-link">Read More</a></p>
                    </div>';
                }
                ?>
            </div>
            <a href="all_destinations.php?category=Beach Side" class="more-button">More Destinations</a>
        </div>
    </div>

    <!-- other cats -->
    <div class="category-row">
        <div class="left-column">
            <h2>Mountain</h2>
            <p class="category-description"><?php echo $categoryDescriptions['Mountain']; ?></p>
        </div>
        <div class="right-column">
            <div class="destination-grid">
                <?php
                $mountainDestinations = fetchRandomDestinations($conn, 'Mountain');
                while ($row = $mountainDestinations->fetch_assoc()) {
                    echo '
                    <div class="destination-card">
                        <img src="../destinations/uploads/' . $row['image'] . '" alt="' . $row['name'] . '">
                        <h3>' . $row['name'] . '</h3>
                        <p class="description">' . substr($row['description'], 0, 80) . '... 
                        <a href="destination_details.php?id=' . $row['id'] . '" class="read-more-link">Read More</a></p>
                    </div>';
                }
                ?>
            </div>
            <a href="all_destinations.php?category=Mountain" class="more-button">More Destinations</a>
        </div>
    </div>

    <div class="category-row">
        <div class="left-column">
            <h2>Jungle</h2>
            <p class="category-description"><?php echo $categoryDescriptions['Jungle']; ?></p>
        </div>
        <div class="right-column">
            <div class="destination-grid">
                <?php
                $jungleDestinations = fetchRandomDestinations($conn, 'Jungle');
                while ($row = $jungleDestinations->fetch_assoc()) {
                    echo '
                    <div class="destination-card">
                        <img src="../destinations/uploads/' . $row['image'] . '" alt="' . $row['name'] . '">
                        <h3>' . $row['name'] . '</h3>
                        <p class="description">' . substr($row['description'], 0, 80) . '... 
                        <a href="destination_details.php?id=' . $row['id'] . '" class="read-more-link">Read More</a></p>
                    </div>';
                }
                ?>
            </div>
            <!--<a href="all_destinations.php?category=Jungle" class="more-button">More Destinations</a>-->
        </div>
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
