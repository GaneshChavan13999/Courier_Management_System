<?php
session_start();
// error_reporting(0);
$msg="";
$msg2="";
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:logout.php');
    } else{
        if(isset($_POST['addbranch']))
  {
    $user=$_POST['email'];
    $name=$_POST['bname'];
    $phn=(int)$_POST['phone'];
    $addr=$_POST['addr'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $pin=$_POST['pin'];
    
    $sql="INSERT INTO `tblbranch`( `BranchName`, `BranchContactnumber`, `BranchEmail`, `BranchAddress`, `BranchCity`, `BranchState`, `BranchPincode`, `BranchCountry`) VALUES (
        '".$name."',
        ".$phn.",
        '".$user."',
        '".$addr."',
        '".$city."',
        '".$state."',
        '".$pin."',
        '".$country."')";
    $result=$con->query($sql);
    if($result){
        $msg2="BRANCH ADDED SUCCESSFULL.";    
    }
    else{
        $msg="Branch is not added, Please Try again later.";
    }
    
    }
?>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Add Branch</title>
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
        var phone = document.forms["addbranch"]["phone"].value;
        var pin = document.forms["addbranch"]["pin"].value;
        if(phone.match('[0-9]{10}') && pin.match('[0-9]{6}') ){
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
        }
         
        return false;     
        }
    </script>  
</head>
<body>
<?php include_once('./include/header.php');?>
<section>
    <div class="login-box">
    <h2>Add Branch</h2>
    <!-- <p style="font-size:16px; color:red" align="center"> error </p> -->
    <form name="addbranch" id="addbranch" method="post" onsubmit="return validateForm()">
        <div>
        <p style="font-size:16px; color:lightblue" id="e" align="center"> <?php if($msg2!=""){ echo $msg2; $msg2="";}?> </p>
        </div>
        <div class="user-box">
        <input type="text" name="bname" id="bname" required="">
        <label>Branch Name</label>
        </div>
        <div class="user-box">
        <input type="text"  maxlength="10" name="phone" id="phone" required="">
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
        <div>
        <pre style="font-size:16px; color:red" align="center" id="error" name="error"></pre>
        </div>
        <div>
        <p style="font-size:16px; color:red" id="e" align="center"> <?php if($msg!=""){ echo $msg; $msg="";}?> </p>
        </div>
        <div style=" text-align: center;"><button name="addbranch" type="submit" class="btn">
        <span></span>
        <span></span>
        Add Branch
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