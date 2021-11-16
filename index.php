<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Ecommerce</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Modal Background -->
<div class="modal_background"></div>

<!-- Modal Box-->
<div class="modal_box">

      <h1>Maverick Meals</h1>
      <p>
          Maverick Grills is a vision created to aid and solve one of the basic human needs
          which is food. We have created Tasty and delicious menus yet affordable to fit everyone
          eith a desire for good meal.
      </p>
      <p>
          With our presence in communities, we have established a system where everyone irrespective
          of class, education, background, religion or social status can easily have a great meal.
          Order now by registering with us or you can place your order by contacting us through our 
          whatsapp 08064544333.
      </p>

      <div class="text_align">
          <button type="button" class="button button--close js-close">Close</button>
      </div>

</div>

<nav class="navbar navbar-expand-lg navbar-light nav_ok">
  <a class="navbar-brand" href="#" id="a_col"><h2>Maverick Meal</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#" id="a_col">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php" id="a_col">Place Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php" target="_blank" id="a_col">Contact</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
          <span id="a_col">Register</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item js-open" href="#">About Us</a>
          <a class="dropdown-item" href="login.php" target="_blank">Sign In</a>
          <a class="dropdown-item" href="register.php" target="_blank">Register</a>
        </div>
      </li>
    </ul>
  </div>
</nav>


<marquee>
  <h2 class="text_move">Welcome to Maverick Meal. We are now taking your daily orders. 
    Order Online or via our Whatsapp 08064544333. 
    Island Deliveries is also available from Mondays to Saturdays.</h2>
</marquee>

<!-- two card container -->

<?php

require "displayProduct.php";

?>


<div class="mav_image">

<img src="images/mevrickpage.jpeg" alt="maverick" id="image">

</div>


  
<div class="page-footer bg_color">
  <div class="footer-copyright text-center py-3">&copy 2021 Copyright:
    <a href="index.php" id="text_dec">Maverick Meal</a>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>