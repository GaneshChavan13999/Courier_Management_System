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
    <title>Salary History</title>
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
    <th scope="col">Transaction ID</th>
    <th scope="col">Amount in ₹</th>
    <th scope="col">Date of Transaction</th>
    </tr>
  </thead>
  <tbody>
      <?php if($msg){ ?>
    <tr>
        <td colspan="10" style="color:red;"><Strong><?php echo $msg; ?></Strong></td>
    </tr>      
    <?php } ?>
<?php if($bank==1){
  $ret=mysqli_query($con,"SELECT  * FROM  staffsalary WHERE staff=".(int)$_SESSION['cmsaid']."  ORDER BY dot DESC;");
  $num=mysqli_num_rows($ret);
  if($num >0){
    $count=0;
  while ($row=mysqli_fetch_array($ret)) {
    $count++;
  ?>
    <tr>
      <td scope="row" data-label="SR. NO."><?php echo $count;?></td>
      <td data-label="Transaction ID"><?php echo $row["id"];?></td>
      <td data-label="Amount in ₹"><?php echo $row["amount"];?></td>
      <td data-label="Date of Transaction"><?php echo $row["dot"];?></td>
      </tr>
<?php } }
else{?>
    <tr>
    <td colspan=4> <H1>You Will receive your salary soon.</H1></td>
    </tr>
<?php }}
else{
    echo'<tr>
    <td colspan=4> <H1>You have not submitted bank details. Please submit them to get Salary in Bank account. </H1></td>
    </tr>';
}
?>
    
  </tbody>
</table>
    
<?php include_once('../includes/footer.php');?>
</body>
</html>
<?php   }?>