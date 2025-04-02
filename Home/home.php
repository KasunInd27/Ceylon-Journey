<!DOCTYPE html>
<html lang="en">
<head>
    
  
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="../HF/hstyles.css">

    <script src="JS/home.js"></script>
    <style>
        .mySlides {display:none;}
    </style>
    <title>Home Page</title>
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


    <section class="home" id="home">
        <div class="content">
            <h3>adventure is worthwhile</h3>
            <p>Discover new places with us</p>
        </div>
        
        <div class="slide">
            <img class="homeSlides" src="../Home/image/train.jpg" style="width:100%">
            <img class="homeSlides" src="../Home/image/boat.jpg" style="width:100%">
            <img class="homeSlides" src="../Home/image/fish.jpg" style="width:100%">
        </div> 
    </section>

    <section class="welcome">
        <h2>Welcome to Ceylon Journey!</h2>
        <p>Your gateway to exploring the wonders of Sri Lanka!</p>
        <p>Whether you're seeking the perfect hotel, booking a scenic ride, or planning a guided tour, we've got you covered.</p>
        <p>Start your journey with us and experience the beauty and adventure of the island, all in one place.</p>
    </section>
    <br><br><br>

    <div class="details">
        <div class="detailsInner">
            <h2>300 + hotel</h2>
            <a href="#"><img src="../Home/image/hotel-home.jpg"></a>
            <a href="#"><p>For affordable prices</p></a>
        </div>

        <div class="detailsInner">
            <h2>Discover beauty of Sri Lanka</h2>
            <a href="#"><img src="../Home/image/place-home.jpg"></a>
            <a href="#"><p>Most trending destinations</p></a>
        </div>

        <div class="detailsInner">
            <h2>Fascinating Discount</h2>
            <a href="#"><img src="../Home/image/discount-home.jpg"></a>
            <a href="#"><p>Enjoy discount for your stay</p></a>
        </div>
    </div>

<script>
        var myIndex = 0;
        carousel();
        
        function carousel() {
          var i;
          var x = document.getElementsByClassName("homeSlides");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
          setTimeout(carousel, 4000); 
        }
        </script>

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


