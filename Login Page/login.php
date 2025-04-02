<?php
    session_start();
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css"> 
    <script src="password.js" defer></script>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php

                include("php/config.php");
                
                if(isset($_POST['submit'])){
                    $username = mysqli_real_escape_string($con, $_POST['username']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);

                    $result = mysqli_query($con,"SELECT * FROM users WHERE Username='$username' AND Password='$password'") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['Username'];
                        $_SESSION['fullname'] = $row['Full_Name'];
                        $_SESSION['email'] = $row['Email'];
                        $_SESSION['country'] = $row['Country'];
                        $_SESSION['contactnumber'] = $row['Contact_Number'];
                        $_SESSION['password'] = $row['Password'];
                        $_SESSION['userid'] = $row['User_Id'];
                        $_SESSION['role'] = $row['role'];
                    }
                    else{
                        echo "<div class='message'>
                              <p>Wrong Username or Password</p>
                              </div><br>";
                        echo "<a href='login.php'><button class='btn'>Go Back</button>";      
                
                    }
                    if(isset($_SESSION['valid'])){
                        
                        if($_SESSION['valid'] === 'Admin1'){
                            header("Location: ../admin dashboard/admin.php"); 
                        } else {
                            header("Location: profile.php"); 
                        }
                        exit(); 
                    }
                }else{

            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                </div>
                
                <input type="checkbox" id="showPW" onclick="togglePw()">Show Password

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="link">
                    Don't have an account? <a href="register.php">Sign Up</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

</body>
</html>