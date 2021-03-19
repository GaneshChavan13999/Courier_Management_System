<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:logout.php');
    } else{
        $msg="";
        if(isset($_GET['id']) and isset($_GET['amt'])and isset($_GET['mail']))
        {
            $query= mysqli_query($con,"INSERT INTO `staffsalary`(`staff`, `amount`) VALUES (".$_GET['id'].",".$_GET['amt'].")");
            if($query){
              $query1= mysqli_query($con1,"UPDATE `tblstaff` SET `paidsalary`=`paidsalary`+ ".$_GET['amt']." WHERE `ID`=".$_GET['id']);
              include "../includes/mail.php";
              $m="Hello <br> Your Salary is added to your bacnk Account <br> Please Check You Account statement.";
              $s=mailto($_GET['mail'],"Salary Alert",$m);
              if($s){
                  $msg2="STAFF ADDED SUCCESSFULLY. Mail sent.";
              }
            }
            else{
              $msg="Transaction is not Successfull.  Please try again later.";
            }
        }
        elseif(isset($_GET['id']))
        {
          $query= mysqli_query($con,"DELETE FROM tblstaff WHERE ID=".$_GET["id"]);
          if(!$query){
              $msg=" Staff is not deleted. Please try again later.";
          }
            
        }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
    <link href="./css/table.css" rel="stylesheet">
    <link href="./css/header.css" rel="stylesheet"/>
    <!-- Footer css -->
    <link href="../css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    
    <style>
      .red, .red:visited{
        color:red;
      }
    </style>

</head>
<body>
<?php include_once('./include/header.php');?>
<table>
  <caption> Staff</caption>
  <thead>
    <tr>
    <th scope="col">SR. NO.</th>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email ID</th>
      <th scope="col">Branch</th>
      <th scope="col">Registered Date</th>
      <th scope="col">rate per Courier in <strong>₹</strong></th>
      <th scope="col">Paid Amount in <strong>₹</strong></th>
      <th scope="col">Unpaid amount in <strong>₹</strong></th>
      <th scope="col">Pay Salary</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php if($msg){ ?>
    <tr>
        <td colspan="10" style="color:red;"><Strong><?php echo $msg; ?></Strong></td>
    </tr>      
    <?php } ?>
<?php
$bank=0;
  $ret=mysqli_query($con,"SELECT * FROM tblstaff");
  $num=mysqli_num_rows($ret);
  if($num >0){
    $count=0;
  while ($row=mysqli_fetch_array($ret)) {
    $bank=$row["bankstatus"];
    $count++;
  ?>
    <tr>
      <td scope="row" data-label="SR. NO."><?php echo $count;?></td>
      <td data-label="Name"><?php echo $row["StaffName"];?></td>
      <td data-label="Phone Number"><?php echo $row["StaffMobilenumber"];?></td>
      <td data-label="Email ID"><?php echo $row["StaffEmail"];?></td>
      <td data-label="Branch"><?php echo $row["BranchName"];?></td>
      <td data-label="Registered Date"><?php echo $row["StaffRegdate"];?></td>
      <td data-label="rate per Courier in ₹"><?php echo $row["rate"];?></td>
      <td data-label="Paid Amount"><?php echo $row["paidsalary"];?></td>
      <?php 
        $ret1=mysqli_query($con1,"SELECT COUNT(ID)  FROM tblcourier where staffName='".$row["StaffName"]."' GROUP BY staffName");
        $num1=mysqli_num_rows($ret1);
        if($num1 >0){
        while ($row1=mysqli_fetch_array($ret1)) {
          $total=$row1["COUNT(ID)"]* $row['rate'];
          $unpaid=$total-$row["paidsalary"];
      ?>
      <td data-label="Unpaid amount in ₹"><?php echo $unpaid;?></td>
      <?php if($unpaid>0 && $bank==1){?>
      <td data-label="Pay Salary in ₹"> <?php echo '<a class="red" href="./staff.php?id='.$row["ID"].'&amt='.$unpaid.'&mail='.$row["StaffEmail"].'">Pay</a>';?></td>
      <td data-label="Delete"><?php echo '<a class="red" href="./staff.php?id='.$row["ID"].'">Delete</a>'?> </td>
      <?php } else{ ?>
        <td data-label="Pay Salary in ₹"> -</td>
        <td data-label="Delete"><?php echo '<a class="red" href="./staff.php?id='.$row["ID"].'">Delete</a>'?> </td>
        <?php } ?>
    </tr>
    <?php
} }else{ ?>
      <td data-label="Unpaid amount in ₹">0</td>
      <td data-label="Pay Salary in ₹"> -</td>
      <td data-label="Delete"><?php echo '<a class="red" href="./staff.php?id='.$row["ID"].'">Delete</a>'?> </td>
<?php } } }
?>
    
  </tbody>
</table>
    
<?php include_once('../includes/footer.php');?>
</body>
</html>
<?php   }?>