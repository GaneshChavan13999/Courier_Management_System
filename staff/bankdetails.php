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
    $acnum=$_POST['acnum'];
    $ifsc=$_POST['ifsc'];
    $name=$_POST['hname'];
    $sql="INSERT INTO `staffbank`( `staffid`, `acname`, `acnum`, `ifsc`) VALUES  (
        ".(int)$_SESSION['cmsaid'].",
        '".$name."',
        '".$acnum."',
        '".$ifsc."')";
    $result=$con->query($sql);
    if($result){
        $sql1="UPDATE `tblstaff` SET `bankstatus`=1 WHERE `ID`=".(int)$_SESSION['cmsaid'];
        $result1=$con->query($sql1);
        if($result1){
        $msg2="DETAILS ADDED SUCCESSFULL.";    }else{
            $msg="Details is not added, Please Try again later.";
        }
    }
    else{
        $msg="Details is not added, Please Try again later.";
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
    <link href="./css/table.css" rel="stylesheet">
    <link href="./css/header.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../includes/jquery-1.7.1.min.js"></script>
    <!-- Footer css -->
    <link href="../css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> 
</head>
<body>
<?php include_once('./include/header.php');
if($bank == 0){
?>
<section>
    <div class="login-box">
    <h2>Add Admin</h2>
    <!-- <p style="font-size:16px; color:red" align="center"> error </p> -->
    <form name="addstaff" id="addstaff" method="post" >
        <div>
        <p style="font-size:16px; color:lightblue" id="e" align="center"> <?php if($msg2!=""){ echo $msg2; $msg2="";}?> </p>
        </div>
        <div class="user-box">
        <input type="text" name="acnum" id="acnum" required="">
        <label>Bank Account Number</label>
        </div>
        <div class="user-box">
        <input type="text"   name="ifsc" id="ifsc" required="">
        <label>IFSC code</label>
        </div>
        <div class="user-box">
        <input type="text"  name="hname"  id="hname"   required="">
        <label>Account Holder Name </label>
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
        Add Details
        <span></span>
        <span></span>
            </button>
       
    </form>
    
    <hr><br>
    <?php include_once('../includes/footer.php');?></div>
</section>
<?php }else { 
    $ret1=mysqli_query($con,"SELECT  * FROM  staffbank WHERE staffid=".(int)$_SESSION['cmsaid']);
    $row1=mysqli_fetch_array($ret1);

    ?>
    <table>
  <caption> Bank Details</caption>
  <thead>
    <tr>
    <th scope="col">Account Number</th>
    <th scope="col">Account Holder Name</th>
    <th scope="col">IFSC Code</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <td scope="row" data-label="Account Number"><?php echo $row1["acnum"];?></td>
      <td data-label="Account Holder Name"><?php echo $row1["acname"];?></td>
      <td data-label="IFSC Code"><?php echo $row1["ifsc"];?></td>
      </tr>
      </tbody>
      </table>
      <?php include_once('../includes/footer.php');?>
<?php } ?>
</body>
</html>
<?php } ?>