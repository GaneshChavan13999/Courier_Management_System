<?php
session_start();
// error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/header.css" rel="stylesheet"/>
    <link href="./css/table.css" rel="stylesheet">
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
  <caption> Summary</caption>
  <thead>
    <tr>
    <th scope="col">SR. NO.</th>
      <th scope="col">Tracking No</th>
      <th scope="col">Sender Name</th>
      <th scope="col">Receiver Name</th>
      <th scope="col">Courier Date</th>
      <th scope="col">Status Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody><?php
  $ret=mysqli_query($con,"SELECT * FROM tblcourier  where Status='".$_GET["status"]."'");
  $num=mysqli_num_rows($ret);
  if($num >0){
    $count=0;
  while ($row=mysqli_fetch_array($ret)) {
    $count++;
  ?>
    <tr>
      <td scope="row" data-label="SR. NO."><?php echo $count;?></td>
      <td data-label="Tracking No"><?php echo $row["RefNumber"];?></td>
      <td data-label="Sender Name"><?php echo $row["SenderName"];?></td>
      <td data-label="Receiver Name"><?php echo $row["RecipientName"];?></td>
      <td data-label="Courier Date"><?php echo $row["CourierDate"];?></td>
      <td data-label="Status Date"><?php echo $row["statusdate"];?></td>
      <td data-label="Action"> <?php echo '<a class="red" href="./view.php?track='.$row["RefNumber"].'">View Detail</a>';?></td>
    </tr>
    <?php
}}
?>
    
  </tbody>
</table>
    
<?php include_once('../includes/footer.php');?>
</body>
</html>
<?php } ?>