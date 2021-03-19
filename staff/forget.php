<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['uname'];
    $password=md5($_POST['pass']);
    $cpassword=md5($_POST['cpass']);
    if($password==$cpassword){
    $query=mysqli_query($con,"UPDATE tblstaff SET StaffPassword='$password' where  StaffEmail='$adminuser' ");
    if($query){
     header('location: login.php');
    }
    else{
    $msg="Invalid Details.";
    }
    }
    else{
        $msg="Password and Confirm password not matched.";
        }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
<section>
    <div class="login-box">
    <h2>Forgot Password</h2>
    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
    <form name="login" method="post">
        <div class="user-box">
        <input type="text" name="uname" required="">
        <label>Email ID</label>
        </div>
        <div class="user-box">
        <input type="password" name="pass" required="">
        <label> New Password</label>
        </div>
        <div class="user-box">
        <input type="password" name="cpass" required="">
        <label> Confirm New Password</label>
        </div>
        <button name="login" class="btn">
        <span></span>
        <span></span>
        Submit
        <span></span>
        <span></span>
        </button><br>
        <a href="./login.php">Log IN</a><br>
        <a href="../register.php">new User?</a>
    </form>
    </div>
</section>
</body>
</html>