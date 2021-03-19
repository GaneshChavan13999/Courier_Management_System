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
    $user=$_POST['email'];
    $name=$_POST['fname'];
    $phn=(int)$_POST['phone'];
    $rate=(int)$_POST['rate']; 
    $branch=$_POST['branch'];
    $password=md5($_POST['pass']);
    $sql="INSERT INTO `tblstaff`(`BranchName`, `StaffName`, `StaffMobilenumber`, `StaffEmail`, `StaffPassword`, `bankstatus`, `rate`) VALUES (
        '".$branch."',
        '".$name."',
        ".$phn.",
        '".$user."',
        '".$password."',
        0 ,
        ".$rate.")";
    $result=$con->query($sql);
    if($result){
        $msg2="STAFF ADDED SUCCESSFULL."; 
        include "../includes/mail.php";
        $m="Hello <br> Welcome to our family here is your login credentials <br> Username: ".$user."<br> Password: ".$_POST['pass']." <br> Please Change Password After first login.";
        $s=mailto($user,"Welcome To Courier Management Family",$m);
        if($s){
            $msg2="STAFF ADDED SUCCESSFULLY. Mail sent.";
        }
    }
    else{
        $msg="Staff is not added, Please Try again later.";
    }
    
    
    }
?>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Add Staff</title>
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
        var pass = document.forms["addstaff"]["pass"].value;
        var branch = document.forms["addstaff"]["branch"].value;
        if(phone.match('[0-9]{10}') && branch != "0" ){
            return true;
        }
        else{
            if(!phone.match('[0-9]{10}')){
                document.getElementById("error").textContent += "Please Enter Correct Phone number.";
                document.getElementById("error").style.display = "block";
                }
            if(branch=="0"){
                document.getElementById("error").textContent += "\nPlease select Branch of staff.";
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
    <h2>Add Staff</h2>
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
        <input type="number"  maxlength="10" name="rate"  id="rate"   required="">
        <label>Rate per Courier in <strong>₹</strong></label>
        </div>
        <div class="user-box">
        <select name="branch" id="branch">
            <option value="0">Select Branch</option>
            <?php 
                $ret2=mysqli_query($con2,"select BranchName from tblbranch");
                while ($row2=mysqli_fetch_array($ret2)) {
                echo '<option value="'.$row2["BranchName"].'">'.$row2["BranchName"].'</option>';
                }
            ?>
        </select>
        <!-- <label>Branch</label> -->
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
        Add Staff
        <span></span>
        <span></span>
            </button>
       
    </form>
    <hr><br>
    <?php include_once('../includes/footer.php');?>
    </div>
</section>
</body>
</html>
<?php } ?>