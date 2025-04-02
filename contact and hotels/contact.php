<?php include '../HF/cheader.php';?>

<head>

   <link rel="stylesheet" href="contact.css">
   <title>Contact</title>

</head>
  
    <section class="contact" id="contact">
        
        <h1 class="heading">
            <span>C</span>
            <span>o</span>
            <span>n</span>
            <span>t</span>
            <span>a</span>
            <span>c</span>
            <span>t</span>
        </h1>

        
        <div class="row">
            <div class="image">
                <img src="../images/contact-img.jpg" alt="Contact Image">
            </div>

           
            <form action="insertcon.php" method="POST">
                <div class="inputBox">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="inputBox">
                    <input type="text" name="number" placeholder="Phone Number" required>
                    <input type="text" name="subject" placeholder="Subject" required>
                </div>
                <textarea name="message" placeholder="Your Message" cols="30" rows="10" required></textarea>
                <input type="submit" class="btn" value="Send Message">
            </form>
        </div>
    </section>
    
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

