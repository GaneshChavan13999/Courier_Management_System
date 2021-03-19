<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:logout.php');
    } else{
        $msg="";
        if(isset($_GET['id']))
        {
          $query= mysqli_query($con,"DELETE FROM tblbranch WHERE ID=".$_GET["id"]);
          if(!$query){
              $msg=" Branch is not removed. Please try again later.";
          }
            
        }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches</title>
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
      <th scope="col">Branch Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email ID</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State </th>
      <th scope="col">Country</th>
      <th scope="col">Pin Code </th>
      <th scope="col">Action </th>
    </tr>
  </thead>
  <tbody>
      <?php if($msg){ ?>
    <tr>
        <td colspan="10" style="color:red;"><Strong><?php echo $msg; ?></Strong></td>
    </tr>      
    <?php } ?>
<?php
  $ret=mysqli_query($con,"SELECT * FROM tblbranch");
  $num=mysqli_num_rows($ret);
  if($num >0){
    $count=0;
  while ($row=mysqli_fetch_array($ret)) {
    $count++;
  ?>
    <tr>
      <td scope="row" data-label="SR. NO."><?php echo $count;?></td>
      <td data-label="Branch Name"><?php echo $row["BranchName"];?></td>
      <td data-label="Phone Number"><?php echo $row["BranchContactnumber"];?></td>
      <td data-label="Email ID"><?php echo $row["BranchEmail"];?></td>
      <td data-label="Address"><?php echo $row["BranchAddress"];?></td>
      <td data-label="City"><?php echo $row["BranchCity"];?></td>
      <td data-label="State"><?php echo $row["BranchState"];?></td>
      <td data-label="Country"><?php echo $row["BranchCountry"];?></td>
      <td data-label="Pin Code"><?php echo $row["BranchPincode"];?></td>
      <td data-label="Action"><?php echo '<a class="red" href="./branch.php?id='.$row["ID"].'">Delete</a>';?></td>
      </tr>
<?php } }
?>
    
  </tbody>
</table>
<?php include_once('../includes/footer.php');?>
</body>
</html>
<?php   }?>