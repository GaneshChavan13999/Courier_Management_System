<?php
session_start();
error_reporting(0);
// include('..\includes\dbconnection.php');
include('../includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['uname'];
    $password=md5($_POST['pass']);
    $query=mysqli_query($con,"select ID, Email from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['cmsaid']=$ret['ID'];
      $_SESSION['email']=$ret['Email'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
<section>
    <div class="login-box">
    <h2>Login For Admin</h2>
    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
    <form name="login" method="post">
        <div class="user-box">
        <input type="text" name="uname" required="">
        <label>Username</label>
        </div>
        <div class="user-box">
        <input type="password" name="pass" required="">
        <label>Password</label>
        </div>
        <button name="login" class="btn">
        <span></span>
        <span></span>
        Submit
        <span></span>
        <span></span>
        </button>
        <a href="forget.php">Forget Password</a><br>
        <a href="../index.php">Home</a>
    </form>
    </div>
</section>
</body>
</html>