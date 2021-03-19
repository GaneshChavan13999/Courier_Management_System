<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:logout.php');
    } else{
            if(isset($_POST['Change']))
            {
                $user=$_SESSION['cmsaid'];
                $password=md5($_POST['pass']);
                $cpassword=md5($_POST['cpass']);
                $opassword=md5($_POST['opass']);
                $pass="";
                if($password==$cpassword){
                    $ret=mysqli_query($con,"SELECT Password FROM tbladmin  WHERE ID=".$user);
                    $num=mysqli_num_rows($ret);
                    if($num >0){
                    while ($row=mysqli_fetch_array($ret)) {
                        $pass=$row["Password"];
                    }}
                    if($pass==$opassword){
                        $query=mysqli_query($con,"UPDATE tbladmin SET Password='".$password."' WHERE ID=".$user);
                        if($query){
                            include "../includes/mail.php";
                            $m="Hello <br> Your Password Has been Changed. If its not you please contact admin and change your password.";
                            $s=mailto($_SESSION["email"],"Password Changed",$m);
                        header('location: login.php');
                        }
                        else{
                        $msg="Something went Wrong.";
                        }
                    }
                    else{
                        $msg="Please enter coreect old password.";
                    }
                }
                else {
                    $msg="Password and Confirm password not matched.";
                    }
            }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="./css/form.css" rel="stylesheet">
    <link href="./css/header.css" rel="stylesheet"/>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../includes/jquery-1.7.1.min.js"></script>
    <!-- Footer css -->
    <link href="../css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script>
        function validateForm() {
            document.getElementById('e').style.display = "none";
            document.getElementById("error").innerHTML="";
            document.getElementById("error").style.display = "none";
        var cpass = document.forms["Change"]["cpass"].value;
        var pass = document.forms["Change"]["pass"].value;
        if(cpass==pass ){
            return true;
        }
        else{
            if(cpass!=pass)){
                document.getElementById("error").textContent += "Password and Confirm password don't match.";
                document.getElementById("error").style.display = "block";
                }
        }
         
        return false;     
        }
    </script>  
</head>
<body>
<?php include_once('./include/header.php');?>
<section>
    <div class="login-box">
    <h2>Change Password</h2>
    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
    <form name="Change" id="Change" method="post" onsubmit="return validateForm()">
    <div class="user-box">
        <input type="password" name="opass" required="">
        <label> Old  Password</label>
        </div>
        <div class="user-box">
        <input type="password" name="pass" required="">
        <label> New Password</label>
        </div>
        <div class="user-box">
        <input type="password" name="cpass" required="">
        <label> Confirm New Password</label>
        </div>
        <button name="Change" class="btn">
        <span></span>
        <span></span>
        Change
        <span></span>
        <span></span>
        </button><br>
        
    </form>
    
    <hr><br>
    <?php include_once('../includes/footer.php');?></div>
</section>

</body>
</html>
<?php } ?>