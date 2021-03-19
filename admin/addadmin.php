<?php
session_start();
// error_reporting(0);
$msg="";
$msg2="";
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:logout.php');
    } else{
        if(isset($_POST['addstaff']))
  {
    $user=$_POST['user'];
    $email=$_POST['email'];
    $name=$_POST['fname'];
    $phn=(int)$_POST['phone'];
    $password=md5($_POST['pass']);
    $sql="INSERT INTO `tbladmin`(`AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`) VALUES  (
        '".$name."',
        '".$user."',
        ".$phn.",
        '".$email."',
        '".$password."')";
    $result=$con->query($sql);
    if($result){
        $msg2="ADMIN ADDED SUCCESSFULL.";
        include "../includes/mail.php";
        $m="Hello <br> Welcome to our family here is your login credentials <br> Username: ".$email."<br> Password: ".$_POST['pass']." <br> Please Change Password After first login.";
        $s=mailto($email,"Welcome To Courier Management Family",$m);
        if($s){
            $msg2="STAFF ADDED SUCCESSFULLY. Mail sent.";
        }    
    }
    else{
        $msg="Admin is not added, Please Try again later.";
    }
    
    
    }
?>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Add Admin</title>
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
        var phone = document.forms["addstaff"]["phone"].value;
        if(phone.match('[0-9]{10}') ){
            return true;
        }
        else{
            if(!phone.match('[0-9]{10}')){
                document.getElementById("error").textContent += "Please Enter Correct Phone number.";
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
    <h2>Add Admin</h2>
    <!-- <p style="font-size:16px; color:red" align="center"> error </p> -->
    <form name="addstaff" id="addstaff" method="post" onsubmit="return validateForm()">
        <div>
        <p style="font-size:16px; color:lightblue" id="e" align="center"> <?php if($msg2!=""){ echo $msg2; $msg2="";}?> </p>
        </div>
        <div class="user-box">
        <input type="text" name="fname" id="fname" required="">
        <label>Name</label>
        </div>
        <div class="user-box">
        <input type="text"  maxlength="10" name="phone" id="phone" required="">
        <label>Phone number</label>
        </div>
        <div class="user-box">
        <input type="text"  name="user"  id="user"   required="">
        <label>username </label>
        </div>
        <div class="user-box">
        <input type="email" name="email" required="">
        <label>Email id</label>
        </div>
        <div class="user-box">
        <input type="password" name="pass" required="">
        <label>Password</label>
        </div>
        <div>
        <pre style="font-size:16px; color:red" align="center" id="error" name="error"></pre>
        </div>
        <div>
        <p style="font-size:16px; color:red" id="e" align="center"> <?php if($msg!=""){ echo $msg; $msg="";}?> </p>
        </div>
        <div style=" text-align: center;"><button name="addstaff" type="submit" class="btn">
        <span></span>
        <span></span>
        Add Admin
        <span></span>
        <span></span>
            </button>
       
    </form>
    
    <hr><br>
    <?php include_once('../includes/footer.php');?></div>
</section>

</body>
</html>
<?php } ?>