<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
    <header>
<div id="menu-bar" class="fas fa-bars"></div>

<a href="#" class="logo"><span>C</span>eylon Journey</a>

<nav class="navbar">
    <a href="../Home/home.php">Home</a>
    <a href="../contact and hotels/hotels.php">Hotels</a>
    <a href="../Rides/ride.php">Rides</a>
    <a href="../destinations/destinations.php">Destination</a>
    <a href="../review/service.php">Services</a>
    <a href="../review/review1.php">Review</a>
    <a href="../contact and hotels/contact.php">Contact</a>
</nav>

    <div class="login-btn-container">
        <a href="../Home/home.php"><button class="btn" style="color: white;background-color: red;">Log Out</button></a>
    </div>
</header>
    
</body>
</html>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceylon Journey Admin Dashboard</title>

    <link rel="stylesheet" href="styler.css">
    <link rel="stylesheet" href="../HF/hstyles.css">
    <link rel="stylesheet" href="../review/read.css">

    
</head>

<body>
    <br><br><br><br><br><br>

    <div class="sidebar">
        <br><br><br><br><br><br>
        <a href="../review/read.php">Manage Reviews</a>
        <a href="../Destination crud/index.php">Manage Destinations</a>
        
    </div>

    <!--<div class="top-bar">
    <span style="font-size: 18px; font-family: 'Helvetica Neue', sans-serif; color: white; font-weight: bold;">
        Welcome, Admin |
    <a href="../Home/home.php" style="color: #e74c3c; text-decoration: none; font-weight: bold; padding: 5px 10px; background-color: #2c3e50; border-radius: 5px;">
        Logout
    </a>
    </span>


    </div>-->

    <div class="main-content">
        <h1>Admin Dashboard - Ceylon Journey</h1>

       
        <h2>Manage Reviews</h2>
        <?php include '../review/read.php';?>

    </div>

</body>

</html>