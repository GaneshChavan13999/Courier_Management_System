<?php
session_start();
// error_reporting(0);
$msg="";
$msg2="";
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:logout.php');
    } else{
        if(isset($_POST['addcourier']))
  {
    $track = date('YmdHis');
    $sdate=date("Y-m-d H:i:s");
    $status="rqtpickup";
    $cid=(int)$_SESSION['cmsaid'];
    $fname=$_POST['fname'];
    $rname=$_POST['rname'];
    $phn=(int)$_POST['phone'];
    $rphn=(int)$_POST['rphone']; 
    $branch=$_POST['branch'];
    $addr=$_POST['addr'];
    $raddr=$_POST['raddr'];
    $city=$_POST['city'];
    $rcity=$_POST['rcity'];
    $state=$_POST['state'];
    $rstate=$_POST['rstate'];
    $country=$_POST['country'];
    $rcountry=$_POST['rcountry'];
    $pin=$_POST['pin'];
    $rpin=$_POST['rpin'];
    $weight=$_POST['weight'];
    $len=$_POST['len'];
    $wid=$_POST['wid'];
    $high=$_POST['high'];
    $fare=$_POST['fare'];
    $desc=$_POST['desc'];
    $branch=$_POST['branch'];

    $sql="INSERT INTO `tblcourier`( `RefNumber`, `cid`, `SenderBranch`, `SenderName`, `SenderContactnumber`, `SenderAddress`, `SenderCity`,
                `SenderState`, `SenderPincode`, `SenderCountry`, `RecipientName`, `RecipientContactnumber`, `RecipientAddress`, `RecipientCity`,
                `RecipientState`, `RecipientPincode`, `RecipientCountry`, `CourierDes`, `ParcelWeight`, `ParcelDimensionlen`, `ParcelDimensionwidth`,
                       `ParcelDimensionheight`, `ParcelPrice`, `Status`, `statusdate`) VALUES (
        '".$track."',
        ".$cid.",
        '".$branch."',
        '".$fname."',
        ".$phn.",
        '".$addr."',
        '".$city."',
        '".$state."',
        '".$pin."',
        '".$country."',
        '".$rname."',
        ".$rphn.",
        '".$raddr."',
        '".$rcity."',
        '".$rstate."',
        '".$rpin."',
        '".$rcountry."',
        '".$desc."',
        '".$weight."',
        '".$len."',
        '".$wid."',
        '".$high."',
        '".$fare."',
        '".$status."',
        '".$sdate."')";
    $result=$con->query($sql);
    if($result){
        $ret=mysqli_query($con,"SELECT `ID` from `tblcourier` WHERE `RefNumber`='".$track."'");
        $row=mysqli_fetch_array($ret);
        $sql2="INSERT INTO `couriertracking`( `courierid`) VALUES (".$row["ID"].")";
        $result2=$con->query($sql2);
        if($result2){
        $msg2="COURIER ADDED SUCCESSFULL.";
        header('location:pay.php?amt='.$fare.'&track='.$row["ID"]);
    }
    }
    else{
        $msg="Courier is not added, Please Try again later.";
    }
    
    
    }
?>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Add Courier</title>
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
        var phone = document.forms["addcourier"]["phone"].value;
        var rphone = document.forms["addcourier"]["rphone"].value;
        var branch = document.forms["addcourier"]["branch"].value;
        var pin = document.forms["addcourier"]["pin"].value;
        var rpin = document.forms["addcourier"]["rpin"].value;
        if(phone.match('[0-9]{10}') && rphone.match('[0-9]{10}') && pin.match('[0-9]{6}') && pin.match('[0-9]{6}') &&  branch != "0" ){
            return true;
        }
        else{
            if(!phone.match('[0-9]{10}')){
                document.getElementById("error").textContent += "Please Enter Correct sender Phone number.";
                document.getElementById("error").style.display = "block";
                }
            if(!rphone.match('[0-9]{10}')){
                document.getElementById("error").textContent += "\n Please Enter Correct recepient Phone number.";
                document.getElementById("error").style.display = "block";
                }
            if(!rpin.match('[0-9]{6}')){
                document.getElementById("error").textContent += "\nPlease Enter Correct recepient pincode.";
                document.getElementById("error").style.display = "block";
                }
            if(!pin.match('[0-9]{6}')){
                document.getElementById("error").textContent += "\nPlease Enter Correct sender pincode.";
                document.getElementById("error").style.display = "block";
                }
            if(branch=="0"){
                document.getElementById("error").textContent += "\nPlease select nearest Branch.";
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
    <h2>Add Courier</h2>
    <!-- <p style="font-size:16px; color:red" align="center"> error </p> -->
    <form name="addcourier" id="addcourier" method="post" onsubmit="return validateForm()">
        <div>
        <p style="font-size:16px; color:lightblue" id="e" align="center"> <?php if($msg2!=""){ echo $msg2; $msg2="";}?> </p>
        </div>
        <div class="user-box">
        <input type="text" name="fname" id="fname"  value="<?php echo $fname." ".$lname;?>" required="">
        <label>Sender Name</label>
        </div>
        <div class="user-box">
        <input type="text"  maxlength="10" name="phone" value="<?php echo $phn;?>" id="phone" required="">
        <label>Sender Phone number</label>
        </div>
        <div class="user-box">
        <select name="branch" id="branch">
            <option value="0">Select your Nearest Branch</option>
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
        <input type="text" name="addr" value="<?php echo $addr;?>" required="">
        <label>Sender Address</label>
        </div>
        <div class="user-box">
        <input type="text" name="city" value="<?php echo $city;?>" required="">
        <label>Sender City</label>
        </div>
        <div class="user-box">
        <input type="text" name="state" value="<?php echo $state;?>" required="">
        <label>Sender State</label>
        </div>
        <div class="user-box">
        <input type="number" name="pin" value="<?php echo $pin;?>" required="">
        <label>Sender Pincode</label>
        </div>
        <div class="user-box">
        <input type="text" name="country" value="<?php echo $country;?>" required="">
        <label>Sender Country</label>
        </div>
        <div class="user-box">
        <input type="text" name="rname" id="rname"   required="">
        <label>Recipient Name</label>
        </div>
        <div class="user-box">
        <input type="number"  maxlength="10" name="rphone"  id="rphone" required="">
        <label>Recipient Phone number</label>
        </div>
        <div class="user-box">
        <input type="text" name="raddr"  required="">
        <label>Recipient Address</label>
        </div>
        <div class="user-box">
        <input type="text" name="rcity"  required="">
        <label>Recipient City</label>
        </div>
        <div class="user-box">
        <input type="text" name="rstate"  required="">
        <label>Recipient State</label>
        </div>
        <div class="user-box">
        <input type="number" name="rpin"  required="">
        <label>Recipient Pincode</label>
        </div>
        <div class="user-box">
        <input type="text" name="rcountry"  required="">
        <label>Recipient Country</label>
        </div>
        <div class="user-box">
        <input type="text" name="desc"  required="">
        <label>Courier Desciption</label>
        </div>
        <div class="user-box">
        <input type="number" name="weight" id="weight" class="r" required="">
        <label>Courier Weight</label>
        </div>
        <div class="user-box">
        <input type="number" name="len" id="len" class="r"  required="">
        <label>Courier Length</label>
        </div>
        <div class="user-box">
        <input type="number" name="wid" id="wid" class="r"  required="">
        <label>Courier Width</label>
        </div>
        <div class="user-box">
        <input type="number" name="high" id="high" class="r" required="">
        <label>Courier Height</label>
        </div>
        <script src="./js/fare.js"></script>
        <script>
            $(document).ready(function(){
                $(".r").change(function(){   // 1st
                    console.log("Hii");
                    var weight=parseFloat($('#weight').val());
                    var fare;
                    if(weight < 15){
                        fare=weight*90;
                    }
                    else{
                        fare= weight*150;
                    }
                    $("#fare1").attr({
                            "style" : "top: -20px; left: 0; color: #03e9f4;font-size: 12px;"
                        });
                    $('#fare').val(fare);
                });
            });
        </script>
        <div class="user-box">
        <input type="text" name="fare" id="fare"  required="" readonly>
        <label id="fare1">Courier fare in ₹</label>
        </div>
        <div>
        <pre style="font-size:16px; color:red" align="center" id="error" name="error"></pre>
        </div>
        <div>
        <p style="font-size:16px; color:red" id="e" align="center"> <?php if($msg!=""){ echo $msg; $msg="";}?> </p>
        </div>
        <div style=" text-align: center;"><button name="addcourier" type="submit" class="btn">
        <span></span>
        <span></span>
        Add Courier
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