<?php
session_start();
// error_reporting(0);
include('includes/dbconnection.php');
$city="";

if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['assign']))
  {
    
    $cid=$_GET['track'];
    $staff=$_POST["staff"];
    //   $remark=$_POST['remark'];
    //   $status=$_POST['status'];
 
    
  // $query=mysqli_query($con,"insert into tblcouriertracking(CourierId,remark,status) value('$cid',' $remark','$status')");
   $query=mysqli_query($con, "update  tblcourier set staffName='$staff' where RefNumber='$cid'");
    if ($query) {
    $msg="Staff has been assigned.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
  

  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./admin/css/header.css" rel="stylesheet"/>
    <link href="./css/view.css" rel="stylesheet"/>
    <link href="./admin/css/table.css" rel="stylesheet">
</head>
<body class="fixed-left">
<?php include_once('./admin/include/header.php');?>
           <?php// include_once('includes/leftbar.php');?>
      <div id="wrapper">
        <!-- Begin page -->
        <table name="table1">
        <caption> <h4 >Courier View</h4></caption>
        <tbody>
<?php
$staffAssigned=" ";
$cid=$_GET['track'];
$ret=mysqli_query($con,"select * from tblcourier where RefNumber='$cid'");
$cnt=1;
$cid1=0;
while ($row=mysqli_fetch_array($ret)) {
    $cid1=$row["ID"];
    $staffAssigned=(is_null($row["staffName"])) ? " " : $row["staffName"];
?>
    
            <tr>
            <td scope="row" colspan=2><?php echo "<p><strong>Reference Number:</strong> ".$cid."</p>";?></td>
            </tr>
            <tr>
            <td scope="row" colspan=2><?php echo "<p><strong>Courier Date :</strong> ".$row['CourierDate']."</p>";?></td>
            </tr>
            <tr>
            <td scope="row" colspan=2></td>
            </tr>
            <tr>
            <td scope="row" >
                <table id="table2" >    
                <caption> <h5 >Sender's Information</h5></caption>

                    <tr>
                        <th scope="row">Sender Branch</th>
                        <td><?php $city= $row['SenderBranch']; echo $row['SenderBranch'];?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sender Name</th>
                        <td><?php  echo $row['SenderName'];?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sender Contact Number</th>
                        <td><?php  echo $row['SenderContactnumber'];?></td>
                    </tr>
                    <tr>
                        <th scope="row"> Sender Address</th>
                        <td><?php  echo $row['SenderAddress'];?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sender City</th>
                        <td><?php  echo $row['SenderCity'];?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sender State</th>
                        <td><?php  echo $row['SenderState'];?></td>
                    </tr>
                    <tr>
                        <th>Sender Pincode</th>
                        <td><?php  echo $row['SenderPincode'];?></td>
                    </tr>
                    <tr>
                        <th>Sender Country</th>
                        <td><?php  echo $row['SenderCountry'];?></td>
                    </tr>
                    </table>
             </td>
             <td scope="row" >
                <table id="table3" >    
                <caption> <h5 >Reciever's Information</h5></caption>
                    <tr>
                        <th scope="row">Reciever Name</th>
                        <td><?php  echo $row['RecipientName'];?></td>
                    </tr>
                    <tr>
                        <th scope="row">Reciever Contact Number</th>
                        <td><?php  echo $row['RecipientContactnumber'];?></td>
                    </tr>
                    <tr>
                        <th scope="row"> Reciever Address</th>
                        <td><?php  echo $row['RecipientAddress'];?></td>
                    </tr>
                    <tr>
                        <th scope="row">Reciever City</th>
                        <td><?php  echo $row['RecipientCity'];?></td>
                    </tr>
                    <tr>
                        <th scope="row">Reciever State</th>
                        <td><?php  echo $row['RecipientState'];?></td>
                    </tr>
                    <tr>
                        <th>Reciever Pincode</th>
                        <td><?php  echo $row['RecipientPincode'];?></td>
                    </tr>
                    <tr>
                        <th>Reciever Country</th>
                        <td><?php  echo $row['RecipientCountry'];?></td>
                    </tr>
                    </table>
             </td>
            </tr>
            <tr>
                <td scope="row" colspan="2">
                    <table id="table4" >    
                    <caption > <h5 >Courier Information</h5></caption>
                    <tr>
                        <th>Courier Description</th>
                        <td><?php  echo $row['CourierDes'];?></td>
                    </tr>
                    <tr>
                        <th>Parcel Weight</th>
                        <td><?php  echo $row['ParcelWeight'];?></td>
                    </tr>
                    <tr>
                        <th>Parcel Dimension Length</th>
                        <td><?php  echo $row['ParcelDimensionlen'];?></td>
                    </tr>
                    <tr>
                        <th>Parcel Dimension Width</th>
                        <td><?php  echo $row['ParcelDimensionwidth'];?></td>
                    </tr>
                    <tr>
                        <th>Parcel Dimension Height</th>
                        <td><?php  echo $row['ParcelDimensionheight'];?></td>
                    </tr>
                    <tr>
                        <th>Parcel Price</th>
                        <td><?php  echo $row['ParcelPrice'];?></td>
                    </tr>
                    </table>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td scope="row" colspan="2">
                    <table id="table5" >    
                    <caption > <h5 >Courier History</h5></caption>
                    <thead>
                        <tr>
                            <th scope="col">SR. NO.</th>
                            <th scope="col">Status</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ret1=mysqli_query($con1,"select * from couriertracking where courierid=".$cid1);
                    while ($row1=mysqli_fetch_array($ret1)) { ?>
                    <?php   if($row1["rqtpickup"]!=""){?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">1</td>
                            <td data-label="Status">Requested For Pick Up</td>
                            <td data-label="Time"> <?php echo $row1["rqtpickup"];?></td>
                        </tr>
                    <?php }?>   
                    <?php   if($row1["outpick"]!=""){?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">2</td>
                            <td data-label="Status">Out For Pick Up</td>
                            <td data-label="Time"> <?php echo $row1["outpick"];?></td>
                        </tr>
                    <?php }?>   
                    <?php   if($row1["pickedup"]!=""){?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">3</td>
                            <td data-label="Status">Picked Up</td>
                            <td data-label="Time"> <?php echo $row1["pickedup"];?></td>
                        </tr>
                    <?php } ?>   
                    <?php   if($row1["shipped"]!=""){?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">4</td>
                            <td data-label="Status">Shipped</td>
                            <td data-label="Time"> <?php echo $row1["shipped"];?></td>
                        </tr>
                    <?php } ?>   
                    <?php   if($row1["intransit"]!=""){?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">5</td>
                            <td data-label="Status">Intransit</td>
                            <td data-label="Time"> <?php echo $row1["intransit"];?></td>
                        </tr>
                    <?php } ?>   
                    <?php   if($row1["athub"]!=""){?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">6</td>
                            <td data-label="Status">At Hub</td>
                            <td data-label="Time"> <?php echo $row1["athub"];?></td>
                        </tr>
                    <?php } ?>   
                    <?php   if($row1["outdeli"]!=""){?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">7</td>
                            <td data-label="Status">Out for Delivery</td>
                            <td data-label="Time"> <?php echo $row1["outdeli"];?></td>
                        </tr>
                    <?php } ?>   
                    <?php   if($row1["delivered"]!=""){?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">8</td>
                            <td data-label="Status">Delivered</td>
                            <td data-label="Time"> <?php echo $row1["delivered"];?></td>
                        </tr>
                    <?php }?> 

                    </tbody>
                    </table>
                </td>
            </tr>
            <?php if($row1["outpick"] == NULL and $staffAssigned == " "){
            echo'<tr><td colspan="2">
                <form method="post" name="assign" id="assign">
                <table><tr>
                <th >Assign Staff:</th>
                <td>
                <select name="staff" id="staff">
                <option value=0 >Select</option >';
                     $ret2=mysqli_query($con2,"select StaffName from  tblstaff where BranchName='".$city."'");
                     while ($row2=mysqli_fetch_array($ret2)) {
                     echo '<option value="'.$row2["StaffName"].'">'.$row2["StaffName"].'</option>';
                     }
                     echo'
                     </select>
                </td>
                <td>
                    <Button type="Submit" name="assign" id="assign" >Asign</Button>
                </td>
                </tr></table>
                    </form>
                    </td></tr>';
             }
        }?>
        </tbody>
</table>

    </body>
</html>
<?php }  ?>