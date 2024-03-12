<?php

require_once 'signup/config.php';
require_once 'signup/loginview.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h3>Welcome <?php echo "You are logged in as ". $_SESSION["user_customername"];
  
  ?>! </h3>
    
  <p>Get the freshest cut at our barbershop. We offer a variety of services by our experienced barbers.</p>

<section id="services">
  <h2>Our Services</h2>
  <ul>
    <li>Haircut - Classic</li>
    <li>Haircut - Fade</li>
    <li>Beard Trim</li>
    <li>Haircut & Shave</li>
  </ul>
</section>

<section id="about-us">
  <h2>About Us</h2>
  <p>
    We are a team of passionate barbers dedicated to providing high-quality haircuts and a relaxing experience. 
    We use top-of-the-line products and stay up-to-date on the latest styles.
  </p>
</section>

<section id="contact">
  <h2>Contact Us</h2>
  <p>
    Phone: (555) 555-5555<br>
    Email: appointments@yourbarbershop.com<br>
    Address: 123 Main Street, Anytown, CA 12345
  </p>
</section>

<a href="projects/book.php">Book an Appointment Today!</a> 



<form action='signup/logout.s.php' method='post'>
  <button type='submit'>Logout</button>
</form>




</body>
</html>