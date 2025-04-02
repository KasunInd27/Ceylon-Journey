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
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="profile.php">Ceylon Jurney</a></p>
        </div>
        <div class="right-links">
            
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php
                if(isset($_POST['submit'])){
                  $fullname = $_POST['fullname'];
                  $username = $_POST['username'];
                  $country = $_POST['country'];
                  $contactnumber = $_POST['contactnumber'];
                  $email = $_POST['email'];

                  $userid = $_SESSION['userid'];

                  $edit_query = mysqli_query($con, "UPDATE users SET Full_name='$fullname', Username='$username', Country='$country', Contact_Number='$contactnumber', Email='$email' WHERE User_Id=$userid ") or die("Error occurres");

                  if($edit_query){
                    echo "<div class='message'>
                            <p>Profile Updated!</p>
                          </div><br>";
                    echo "<a href='profile.php'><button class='btn'>Go Profile</button>";      
                
                  }
                }else{

                    $userid = $_SESSION['userid'];
                    $query = mysqli_query($con, "SELECT * FROM users WHERE User_Id=$userid ");

                    while($result = mysqli_fetch_assoc($query)){
                        $res_Uname = $result['Username'];
                        $res_Fname = $result['Full_Name'];
                        $res_Email = $result['Email'];
                        $res_Country = $result['Country'];
                        $res_Cnumber = $result['Contact_Number'];
                    }

            ?>

            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname" value="<?php echo $res_Fname; ?>" autocapitalize="off" required>
                </div>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocapitalize="off" required>
                </div>
                <div class="field input">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" value="<?php echo $res_Country; ?>" autocapitalize="off" required>
                </div>
                <div class="field input">
                    <label for="contactnumber">Contact Number</label>
                    <input type="text" name="contactnumber" id="contactnumber" value="<?php echo $res_Cnumber; ?>" autocapitalize="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocapitalize="off" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
            </form>
        </div>
        <?php } ?>
    </div> 
</body>
</html>