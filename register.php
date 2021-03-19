<?php
session_start();
// error_reporting(0);
// include('..\includes\dbconnection.php');
include('includes/dbconnection.php');
$msg="";
try{
if(isset($_POST['register']))
  {
    $user=$_POST['email'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phn=(int)$_POST['phone'];
    $addr=$_POST['addr'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $pin=$_POST['pin'];
    $password=md5($_POST['pass']);
    $sql="INSERT INTO `tblcustomer`( `fname`, `lname`, `phone`, `email`, `password`, `address`, `city`, `state`, `country`, `pincode`) VALUES (
        '".$fname."',
        '".$lname."',
        ".$phn.",
        '".$user."',
        '".$password."',
        '".$addr."',
        '".$city."',
        '".$state."',
        '".$country."',
        '".$pin."')";
        // $result = mssql_query($con,$sql);
    $result=$con->query($sql);
    if($result){
                    include "includes/mail.php";
                    $m="Hello <br> You Have been Registered Successfully. Login Credentials Are:<br> Username: ".$user." <br>Password: ".$_POST['pass']." <br> Thank you. ";
                    $s=mailto($user,"Registered Successfully",$m);
                    if($s){
                        $msg2="Registered IS SUCCESSFUL.";
                    }  
        header('location: customer/login.php');
       }
       else{
       $msg="Email id already exists";
       echo "
    <script type=\"text/javascript\">
     document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('e').style.display = 'block';
     });
    </script>";
       }
  }}
  catch(Exception $e) {
	$msg= 'Message: ' .$e->getMessage();
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/register.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="includes/jquery-1.7.1.min.js"></script>
	 <script>
        function validateForm() {
            document.getElementsById('e').style.display = "none";
            document.getElementById("error").innerHTML="";
            document.getElementById("error").style.display = "none";
        var phone = document.forms["register"]["phone"].value;
        var pin = document.forms["register"]["pin"].value;
        var pass = document.forms["register"]["pass"].value;
        var cpass = document.forms["register"]["cpass"].value;
        if(phone.match('[0-9]{10}') && pin.match('[0-9]{6}') && pass==cpass ){
            return true;
        }
        else{
            if(!phone.match('[0-9]{10}')){
                document.getElementById("error").textContent += "Please Enter Correct Phone number.";
                document.getElementById("error").style.display = "block";
                }
            if(!pin.match('[0-9]{6}')){
                document.getElementById("error").textContent += "\nPlease Enter Correct Pincode.";
                document.getElementById("error").style.display = "block";
            }
            if(pass!=cpass){
                document.getElementById("error").textContent += "\nPassword and Confirm Password not matched.";
                document.getElementById("error").style.display = "block";
            }
        }
         
        return false;     
        }
    </script>  
</head>
<body>
<section>
    <div class="login-box">
    <h2>Register As Customer</h2>
    <!-- <p style="font-size:16px; color:red" align="center"> error </p> -->
    <form name="register" method="post" onsubmit="return validateForm()">
        <div class="user-box">
        <input type="text" name="fname" required="">
        <label>First Name</label>
        </div>
        <div class="user-box">
        <input type="text" name="lname" required="">
        <label>Last name</label>
        </div>
        <div class="user-box">
        <input type="text"  maxlength="10" name="phone" required="">
        <label>Phone number</label>
        </div>
        <div class="user-box">
        <input type="text" name="addr" required="">
        <label>Address</label>
        </div>
        <div class="user-box">
        <input type="text" name="city" required="">
        <label>City</label>
        </div>
        <div class="user-box">
        <input type="text" name="state" required="">
        <label>State</label>
        </div>
        <div class="user-box">
        <input type="text" name="country" required="">
        <label>Country</label>
        </div>
        <div class="user-box">
        <input type="text" name="pin" maxlength="6"  required="">
        <label>Pin code</label>
        </div>
        
        <div class="user-box">
        <input type="email" name="email" required="">
        <label>Email id</label>
        </div>
        <div class="user-box">
        <input type="password" name="pass" required="">
        <label>Password</label>
        </div>
        <div class="user-box">
        <input type="text" name="cpass" required="">
        <label>Confirm Password</label>
        </div>
        <div>
        <pre style="font-size:16px; color:red" align="center" id="error"name="error"></pre>
        </div>
        <div>
        <p style="font-size:16px; color:red" id="e" align="center"> <?php if($msg!=""){ echo $msg; $msg="";}?> </p>
        </div>
        <div style=" text-align: center;"><button name="register" type="submit" class="btn">
        <span></span>
        <span></span>
        Register
        <span></span>
        <span></span>
        </button><br>
        <div style="color: white;"><p style="font-size: 16px; text-transform: uppercase;">Having account, please 
        <a href="./customer/login.php" >Log In</a></p></div><br>
        <div style="color: white;"><p style="font-size: 16px; text-transform: uppercase;">return to  
        <a href="./index.php">Home</a></p></div></div>
        
    </form>
    </div>
</section>
</body>
</html>