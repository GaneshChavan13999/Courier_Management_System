<?php
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="css/in.css">
<link rel="stylesheet" href="css/icons.css">
<link href="css/index.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src = "js/slider.js" type = "text/javascript"></script>
</head>
<body>
<!-- Navebar  -->
  <nav>
    <ul class="menu">
      <li class="logo"><a href="index.php">Courier Service</a></li>
      <li class="item"><a href="index.php">Home</a></li>
      <li class="item"><a href="aboutus.php">About</a></li>
      <li class="item"><a href="contactus.php">Contact</a>
      </li>
      <li class="item has-submenu ">
        <a tabindex="0">Log In</a>
        <ul class="submenu">
          <li class="subitem"><a href="admin/login.php">Admin</a></li>
          <li class="subitem"><a href="staff/login.php">Staff</a></li>
          <li class="subitem"><a href="customer/login.php">Customer</a></li>
        </ul>
      </li>
      <li class="item has-submenu ">
        <a tabindex="0">Sign Up</a>
        <ul class="submenu">
          <li class="subitem"><a href="register.php">Customer</a></li>
        </ul>
      </li>
      <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
    </ul>
  </nav>
  <!-- script for navbar  -->
  <script>
            const toggle = document.querySelector(".toggle");
            const menu = document.querySelector(".menu");
            const items = document.querySelectorAll(".item");
            
            /* Toggle mobile menu */
            function toggleMenu() {
              if (menu.classList.contains("active")) {
                menu.classList.remove("active");
                toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>";
              } else {
                menu.classList.add("active");
                toggle.querySelector("a").innerHTML = "<i class='fas fa-times'></i>";
              }
            }
            
            /* Activate Submenu */
            function toggleItem() {
              if (this.classList.contains("submenu-active")) {
                this.classList.remove("submenu-active");
              } else if (menu.querySelector(".submenu-active")) {
                menu.querySelector(".submenu-active").classList.remove("submenu-active");
                this.classList.add("submenu-active");
              } else {
                this.classList.add("submenu-active");
              }
            }
            
            /* Close Submenu From Anywhere */
            function closeSubmenu(e) {
              let isClickInside = menu.contains(e.target);
            
              if (!isClickInside && menu.querySelector(".submenu-active")) {
                menu.querySelector(".submenu-active").classList.remove("submenu-active");
              }
            }
            /* Event Listeners */
            toggle.addEventListener("click", toggleMenu, false);
            for (let item of items) {
              if (item.querySelector(".submenu")) {
                item.addEventListener("click", toggleItem, false);
              }
              item.addEventListener("keypress", toggleItem, false);
            }
            document.addEventListener("click", closeSubmenu, false);
  </script>

<div class="container">

  <!-- Jumbotron Header -->
  <header class="containerForm">
  <!-- Jumbotron Header -->
     <div class="card my-4" Style="text-align:center;">
        <h2 class="card-header">Contact Us</h2>
        <div class="card-body">
        <h5>
        Your Fastest and trusted delivery and logistics service provider.<br><br>
        <strong> HEAD OFFICE: </strong><br>
        Courier Management Service, <br> Mumbai, Maharashtra,<br> India.<br><br>
        <strong> Email ID: </strong><br>
        ecourierservices@gmail.com
        </h5>
        </div>
        <div class="wrap">
          
        </div>
        </div>
      </div>
  </header>
</div>
 <!-- Footer -->

<footer>
  <section class="footer-social-section flex-rw">
    <span class="footer-social-overlap footer-social-connect">
    CONNECT <span class="footer-social-small">with</span> US
    </span>
    <span class="footer-social-overlap footer-social-icons-wrapper">
    <div class="wrapper-icons">
        <div class="icon facebook">
          <div class="tooltip">Facebook</div>
            <span><a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></span>
        </div>
        <div class="icon twitter">
          <div class="tooltip">Twitter</div>
            <span><a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a></span>
        </div>
        <div class="icon instagram">
          <div class="tooltip">Instagram</div>
            <span><a href="http://www.instagram.com"><i class="fab fa-instagram"></i></a></span>
        </div>
        <div class="icon github">
          <div class="tooltip">Github</div>
            <span><a href="http://www.github.com"><i class="fab fa-github"></i></a></span>
        </div>
        <div class="icon youtube">
          <div class="tooltip">YouTube</div>
          <span><a href="https://www.youtube.com/"><i class="fab fa-youtube"></a></i></span>
        </div>
    </div>
    </span>
</section>
<section class="footer-bottom-section flex-rw">
<div class="footer-bottom-wrapper">   
<i class="fa fa-copyright" role="copyright">

</i> 2021 Pavilion in <address class="footer-address" role="company address">MUMBAI, INDIA</address><span class="footer-bottom-rights"> - All Rights Reserved - </span>
  </div>
  <div class="footer-bottom-wrapper">
  <a href="/terms-of-use.html" class="generic-anchor blue1" rel="nofollow">Terms</a> | <a href="/privacy-policy.html" class="generic-anchor blue1" rel="nofollow">Privacy</a>
    </div>
</section>
</footer>
<script>
  var slideIndex = 0;
  showSlides();
</script>


</body>
</html>
