<?php
$admid=$_SESSION['cmsaid'];
$ret=mysqli_query($con,"select StaffName,bankstatus from tblstaff where ID='$admid'");
$row=mysqli_fetch_array($ret);
$fname=$row['StaffName'];
$bank=$row["bankstatus"];
?>
<nav class="menu" tabindex="0">
	<div class="smartphone-menu-trigger"></div>
  <header class="avatar">
		<img src="../includes/user.png " />
    <h2><?php echo $fname; ?></h2>
  </header>
	<ul>
  <li tabindex="0" class="icon-dashboard"><a href="dashboard.php"><span>Dashboard</span></a></li><!-- Courier page in between--> 
  <li tabindex="0" class="icon-shop"><a href="branch.php"><span>Branches</span></a></li>
  <li tabindex="0" class="icon-shop"><a href="bankdetails.php"><span>Bank Details</span></a></li>
    <li tabindex="0" class="icon-history"><a href="transactions.php"><span>Salary History</span></a></li>
    <li tabindex="0" class="icon-change"><a href="changepassword.php"><span>Change Password</span></a></li>
    <li tabindex="0" class="icon-logout"><a href="../includes/logout.php"><span>Logout</span></a></li>
  </ul>
</nav>

