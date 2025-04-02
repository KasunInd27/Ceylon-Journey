<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css"> 
    <script src="password.js" defer></script>
    <script src="script.js" defer></script>

    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php 
            include("php/config.php");
            if(isset($_POST['submit'])){
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $country = $_POST['country'];
                $contactnumber = $_POST['contactnumber'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                
                $verify_query = mysqli_query($con,"SELECT Username FROM users WHERE Username='$username'");

                if(mysqli_num_rows($verify_query) !=0){
                    echo "<div class='message'>
                            <p>This username is used, Try another one please!</p>
                          </div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";      
                }
                else{
                    mysqli_query($con, "INSERT INTO users(Full_Name,Username,Country,Contact_Number,Email,Password) VALUES('$fullname','$username','$country','$contactnumber','$email','$password')") or die("Error Occured");
                    echo "<div class='message'>
                            <p>Registration Successfully!</p>
                          </div><br>";
                    echo "<a href='login.php'><button class='btn'>Login Now</button>";      
                
                }
            }
            else{
        
        ?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname" autocapitalize="off" >
                </div>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocapitalize="off" >
                </div>
                <div class="field input">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" autocapitalize="off" >
                </div>
                <div class="field input">
                    <label for="contactnumber">Contact Number</label>
                    <input type="text" name="contactnumber" id="contactnumber" autocapitalize="off" >
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocapitalize="off" >
                </div>
                <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocapitalize="off" >
                </div>

                <input type="checkbox" id="showPW" onclick="togglePw()">Show Password


                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="link">
                    Already have an account? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

</body>
</html>