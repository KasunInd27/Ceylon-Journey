<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour and Travel</title>
    <link rel = "stylesheet" href ="../HF/hstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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



<?php
    session_start();
    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <script src="script.js" defer></script>
    <title>Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="profile.php">Ceylon Jorney</a></p>
        </div>
        <div class="right-links">

            <?php
                $userid = $_SESSION['userid'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE User_Id='$userid'");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Userid = $result['User_Id'];
                    $res_Uname = $result['Username'];
                    $res_Fname = $result['Full_Name'];
                    $res_Email = $result['Email'];
                    $res_Country = $result['Country'];
                    $res_Cnumber = $result['Contact_Number'];
                    
                }

                
            ?>

        </div>
    </div>
    <main>
    <div class="main-box">
            <h2>Your Profile Details</h2><br>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th style="font-size: 20px;">Full Name</th>
                    <td style="font-size: 20px;"><?php echo $res_Fname ?></td>
                </tr>
                <tr>
                    <th style="font-size: 20px;">Username</th>
                    <td style="font-size: 20px;"><?php echo $res_Uname ?></td>
                </tr>
                <tr>
                    <th style="font-size: 20px;">Email</th>
                    <td style="font-size: 20px;"><?php echo $res_Email ?></td>
                </tr>
                <tr>
                    <th style="font-size: 20px;">Phone Number</th>
                    <td style="font-size: 20px;"><?php echo $res_Cnumber ?></td>
                </tr>
                <tr>
                    <th style="font-size: 20px;">Country</th>
                    <td style="font-size: 20px;"><?php echo $res_Country ?></td>
                </tr>
            </table>
            
            <a href="../reservation/view_reservations.php" User_Id="<?php echo $res_Userid; ?>" class="btn"><center>Manage Reservation</center></a>
            <a href="../contact and hotels/readcontact.php" User_Id="<?php echo $res_Userid; ?>" class="btn"><center>Manage Contact Details</center></a>
            
            <a href="edit.php" User_Id="<?php echo $res_Userid; ?>" class="btn"><center>Change Profile</center></a>

           <?php 
           echo '<a href="delete.php?deleteid='.$res_Userid.'" class="res_Userid" onclick="displayDelete()">Delete Profile</a>'     
           ?>       
    
        </div>
    </main>
</body>
</html>