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

<div class="slideshow-container">
  <div class="mySlides fade">
    <img src="includes/img/COURIER.jpeg" style="width:100%">
    <div class="text">Courier Management System</div>
  </div>
  <div class="mySlides fade">
    <img src="includes/img/COURIER1.jpg" style="width:100%">
    <div class="text">Courier Management System</div>
  </div>
  <div class="mySlides fade">
    <img src="includes/img/COURIER2.jpeg" style="width:100%">
    <div class="text">Courier Management System</div>
  </div>

  <div class="mySlides fade">
    <img src="includes/img/COURIER3.jpg" style="width:100%">
    <div class="text">Courier Management System</div>
  </div>
</div>



<div class="container">

  <!-- Jumbotron Header -->
  <header class="containerForm">
    <form name="search" method="post">
  <!-- Jumbotron Header -->
     <div class="card my-4">
        <h5 class="card-header">Tracking / Refrence Number</h5>
        <div class="card-body"></div>
        <div class="wrap">
          <div class="search">
             <input type="text" class="searchTerm form-control" placeholder="Search for..." required="true" name="searchdata"/>
             <button type="submit" class="searchButton" name="search">
               <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
        </div>
      </div>
    </form>
  </header>
</div>

<div class="row text-left">
<?php
if(isset($_POST['search'])){
  
    $searchdata=$_POST['searchdata'];
    $ret=mysqli_query($con,"SELECT * from  tblcourier where RefNumber='".$searchdata."'");
    $num=mysqli_num_rows($ret);
    
    if($num >0){
    while ($row=mysqli_fetch_array($ret)) {


        ?>
        <div class="col-lg-12">
        <h4 align="center" style="color:red">Tracking / Reference Id <?php echo $searchdata;?> Details</h4>
        <hr>
        </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title" align="center" style="color:blue">Sender</h4>
                    <hr />
        <table border="1" width="100%" style="text-align: center;">
        
        <tr>
        <th> Name</th>
        <td><?php  echo $row['SenderName'];?></td>
        </tr> 
        <tr>
        <th> City</th>
        <td><?php  echo $row['SenderCity'];?></td>
        </tr> 
        <tr>
        <th> State</th>
        <td><?php  echo $row['SenderState'];?></td>
        </tr> 
        <tr>
        <th>Pincode</th>
        <td><?php  echo $row['SenderPincode'];?></td>
        </tr> 
        <tr>
        <th>Country</th>
        <td><?php  echo $row['SenderCountry'];?></td>
        </tr> 
        </table>

                </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title" align="center" style="color:blue">Recipient</h4>
                    <hr />
        <table border="1" width="100%" style="text-align: center;">
        <tr>
        <th> Name</th>
        <td><?php  echo $row['RecipientName'];?></td>
        </tr> 
        <tr>
        <th> City</th>
        <td><?php  echo $row['RecipientCity'];?></td>
        </tr> 
        <tr>
        <th> State</th>
        <td><?php  echo $row['RecipientState'];?></td>
        </tr> 
        <tr>
        <th>Pincode</th>
        <td><?php  echo $row['RecipientPincode'];?></td>
        </tr> 
        <tr>
        <th>Country</th>
        <td><?php  echo $row['RecipientCountry'];?></td>
        </tr> 
        </table>
                </div>
                </div>
            </div>
            <?php

        $cid=$row['ID'];   
        // $ret=mysqli_query($con,"select remark,status,StatusDate from tblcouriertracking where  CourierId='$cid'");
        $ret=mysqli_query($con,"select * from couriertracking where  courierid=".$cid);
        $num=mysqli_num_rows($ret);
        if($num>0){
          $row=mysqli_fetch_array($ret);
            ?>
                <div class="col-lg-12 col-md-6 mb-4">
                    <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title" align="center" style="color:blue">Tracking History</h4>
                        <hr />
                        <?php //while ($row=mysqli_fetch_array($ret)) { ?>
                        <ul id="progress"style="margin-top: 10px;">
                            <?php if($row['rqtpickup']!=NULL){?>
                            <li><div class="node green"></div><p><strong>Pick Up Request</Strong> </p>
                            <p>Date:<?php  echo $row['rqtpickup'];?> </p>
                            <p> Your pick up request has been recieved</p>
                            </li><?php }?>
                            <?php if($row['outpick']!=NULL){?>
                                <li><div class="divider green"></div></li>
                                <li><div class="node green"></div><p><strong>Out for Pick Up</strong></p>
                                <p>Date:<?php  echo $row['outpick'];?> </p>
                                <p> Staff is out fo pick up courier.</p>
                            </li><?php }else{?>
                                <li><div class="divider grey"></div></li>
                                <li><div class="node grey"></div><p><strong>Out for Pick Up</strong></p>
              
                            </li><?php }?>
                            <?php if($row['pickedup']!=NULL){?>
                                <li><div class="divider green"></div></li>
                                <li><div class="node green"></div><p><strong>Picked Up</strong></p>
                                <p>Date:<?php  echo $row['pickedup'];?> </p>
                                <p> Your courier is picked up.</p>
                            </li><?php }else{?>
                                <li><div class="divider grey"></div></li>
                                <li><div class="node grey"></div><p><strong>Picked Up</strong></p>
              
                            </li><?php }?>
                            <?php if($row['shipped']!=NULL){?>
                                <li><div class="divider green"></div></li>
                                <li><div class="node green"></div><p><strong>Shipped</strong></p>
                                <p>Date:<?php  echo $row['shipped'];?> </p>
                                <p> Your courier is shipped.</p>
                            </li><?php }else{?>
                                <li><div class="divider grey"></div></li>
                                <li><div class="node grey"></div><p><strong>Shipped</strong></p>
              
                            </li><?php }?>
                            <?php if($row['intransit']!=NULL){?>
                                <li><div class="divider green"></div></li>
                                <li><div class="node green"></div><p><strong>Intransit</strong></p>
                                <p>Date:<?php  echo $row['intransit'];?> </p>
                                <p> Your courier is in intransit.</p>
                            </li><?php }else{?>
                                <li><div class="divider grey"></div></li>
                                <li><div class="node grey"></div><p><strong>Intransit</strong></p>
                            </li><?php }?>

                            <?php if($row['athub']!=NULL){?>
                                <li><div class="divider green"></div></li>
                                <li><div class="node green"></div><p><strong>Arrived at Your citi's hub</strong></p>
                                <p>Date:<?php  echo $row['athub'];?> </p>
                                <p> Your courier is at HUB.</p>
                            </li><?php }else{?>
                                <li><div class="divider grey"></div></li>
                                <li><div class="node grey"></div><p><strong>Arrived at Your citi's hub</strong></p>
              
                            </li><?php }?>

                            <?php if($row['outdeli']!=NULL){?>
                                <li><div class="divider green"></div></li>
                                <li><div class="node green"></div><p><strong>Out for Delivery</strong></p>
                                <p>Date:<?php  echo $row['outdeli'];?> </p>
                                <p> Staff is our for deliver you courier.</p>
                            </li><?php }else{?>
                                <li><div class="divider grey"></div></li>
                                <li><div class="node grey"></div><p><strong>Out for Delivery</strong></p>
              
                            </li><?php }?>

                            <?php if($row['delivered']!=NULL){?>
                                <li><div class="divider green"></div></li>
                                <li><div class="node green"></div><p><strong>Delivered</strong></p>
                                <p>Date:<?php  echo $row['delivered'];?> </p>
                                <p> Courier delivered at given address.</p>
                            </li><?php }else{?>
                                <li><div class="divider grey"></div></li>
                                <li><div class="node grey"></div><p><strong>Delivered</strong></p></li><?php }?>
                            </ul>
            <!-- <table border="1" width="100%" style="text-align: center;">
            <tr>
                <th>Date / Time</th>
                <th>Status </th>
                <th>remark</th>
            </tr> -->
            
            <!-- <tr>
            <td><?php  //echo $row['StatusDate'];?></td>
            <td><?php  //echo $row['status'];?></td>
            <td><?php  //echo $row['remark'];?></td>
            </tr>   -->
            <tr>
            <?php// }?>
            </table>

                    </div>
                    </div>
                </div>

            <?php
        // } 
        // else{ ?>
            <!-- <h4 style="color:red" align="center">Not Shipped yet </h4> -->
        <?php// } 
   // }
  
 ?>


<?php } else { ?>
  <h4 align="center" style="color:red">Invalid Tracking / Reference Number </h4><?php } } } } ?>
    <!-- /.row -->

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
