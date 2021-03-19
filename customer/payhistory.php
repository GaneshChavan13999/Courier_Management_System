<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:logout.php');
    } else{
        
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History</title>
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
  <caption> PAYMENTS</caption>
  <thead>
    <tr>
    <th scope="col">SR. NO.</th>
      <th scope="col">Transaction ID</th>
      <th scope="col">Tracking Number</th>
      <th scope="col">Card Name</th>
      <th scope="col">Card Number</th>
      <th scope="col">Card Expiry Month</th>
      <th scope="col">Card Expiry Year </th>
      <th scope="col">Status</th>
      <th scope="col">Amount </th>
      <th scope="col">Transaction Date  </th>
    </tr>
  </thead>
  <tbody>
      <?php if($msg){ ?>
    <tr>
        <td colspan="10" style="color:red;"><Strong><?php echo $msg; ?></Strong></td>
    </tr>      
    <?php } ?>
<?php
  $ret=mysqli_query($con,"SELECT * FROM orders WHERE custid =".(int)$_SESSION["cmsaid"]." ORDER BY txndate DESC");
  $num=mysqli_num_rows($ret);
  if($num >0){
    $count=0;
  while ($row=mysqli_fetch_array($ret)) {
    $ret1=mysqli_query($con,"select RefNumber from tblcourier where ID=".$row["courierid"]);
    $row1=mysqli_fetch_array($ret1);
    $count++;

  ?>
    <tr>
      <td scope="row" data-label="SR. NO."><?php echo $count;?></td>
      <td data-label="Transaction ID"><?php echo $row["txnID"];?></td>
      <td data-label="Tracking Number"><?php echo $row1["RefNumber"];?></td>
      <td data-label="Card Name"><?php echo $row["card_name"];?></td>
      <td data-label="Card Number"><?php echo $row["card_num"];?></td>
      <td data-label="Card Expiry Month"><?php echo $row["card_exp_month"];?></td>
      <td data-label="Card Expiry Year"><?php echo $row["card_exp_year"];?></td>
      <td data-label="Status"><?php echo $row["status"];?></td>
      <td data-label="Amount "><?php echo $row["amount"];?></td>
      <td data-label="Transaction Date "><?php echo $row["txndate"];?></td>
      </tr>
<?php } }
?>
    
  </tbody>
</table>
<?php include_once('../includes/footer.php');?>
</body>
</html>
<?php   }?>