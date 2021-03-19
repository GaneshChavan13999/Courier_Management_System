<?php
session_start();
// error_reporting(0);
include('../includes/dbconnection.php');
$city="";

if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['assign']))
  {
    
    $cid=$_GET['track'];
    $ustatus=$_POST["ustatus"];
    $date=date("Y-m-d H:i:s");
    $courierid=(int)$_POST['courierid'];
    $cusid=(int)$_POST["customid"];
    //   $status=$_POST['status'];
    $query2=mysqli_query($con, "SELECT email from tblcustomer WHERE id=".$cusid);
    $row3=mysqli_fetch_array($query2);

  // $query=mysqli_query($con,"insert into tblcouriertracking(CourierId,remark,status) value('$cid',' $remark','$status')");
   $query=mysqli_query($con, "UPDATE  `tblcourier` SET `Status`='".$ustatus."', `statusdate`= '".$date."' where `RefNumber`='".$cid."'");
    if ($query) {
        $query1 =mysqli_query($con, "UPDATE  `couriertracking` SET `".$ustatus."`='".$date."' where courierid =".$courierid);
        if($query1){
    $msg="Status has been updated.";
    include "../includes/mail.php";
    $m="Hello <br> Your Courier status is updated.<br> For more information visit website.<br> Courier tracking number= ".$cid." <br> Current Status: ".$ustatus."<br> Thank you.";
    $s=mailto($row3["email"],"Status Updated",$m);

}
    else
    {
      $msg="Something Went Wrong. Please try again";
    }
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
    <title>View</title>
    <link href="./css/header.css" rel="stylesheet"/>
    <link href="./view.css" rel="stylesheet"/>
    <link href="./css/table.css" rel="stylesheet">
</head>
<body class="fixed-left">
<?php include_once('./include/header.php');?>
           <?php// include_once('includes/leftbar.php');?>
      <div id="wrapper">
        <!-- Begin page -->
        <table name="table1">
        <caption> <h4 >Courier View</h4></caption>
        <tbody>
<?php
$staffAssigned=" ";
$cid=$_GET['track'];
$customid="";
$ret=mysqli_query($con,"select * from tblcourier where RefNumber='$cid'");
$cnt=1;
$cid1=0;
while ($row=mysqli_fetch_array($ret)) {
    $cid1=$row["ID"];
    $staffAssigned=(is_null($row["staffName"])) ? " " : $row["staffName"];
    $customid=$row["cid"];
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
                        <td><?php  echo $row['ParcelWeight']." KG";?></td>
                    </tr>
                    <tr>
                        <th>Parcel Dimension Length</th>
                        <td><?php  echo $row['ParcelDimensionlen']." cm";?></td>
                    </tr>
                    <tr>
                        <th>Parcel Dimension Width</th>
                        <td><?php  echo $row['ParcelDimensionwidth']." cm";?></td>
                    </tr>
                    <tr>
                        <th>Parcel Dimension Height</th>
                        <td><?php  echo $row['ParcelDimensionheight']." cm";?></td>
                    </tr>
                    <tr>
                        <th>Parcel Price</th>
                        <td><?php  echo "₹ ".$row['ParcelPrice'];?></td>
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
                    $index=0;
                    $up_status = array("rqtpickup", "outpick", "pickedup", "shipped", "intransit","athub","outdeli","delivered"); 
                    $ret1=mysqli_query($con1,"select * from couriertracking where courierid=".$cid1);
                    while ($row1=mysqli_fetch_array($ret1)) { ?>
                    <?php   if($row1["rqtpickup"]!=""){ $index++;?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">1</td>
                            <td data-label="Status">Requested For Pick Up</td>
                            <td data-label="Time"> <?php echo $row1["rqtpickup"];?></td>
                        </tr>
                    <?php }?>   
                    <?php   if($row1["outpick"]!=""){ $index++;?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">2</td>
                            <td data-label="Status">Out For Pick Up</td>
                            <td data-label="Time"> <?php echo $row1["outpick"];?></td>
                        </tr>
                    <?php }?>   
                    <?php   if($row1["pickedup"]!=""){ $index++;?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">3</td>
                            <td data-label="Status">Picked Up</td>
                            <td data-label="Time"> <?php echo $row1["pickedup"];?></td>
                        </tr>
                    <?php } ?>   
                    <?php   if($row1["shipped"]!=""){ $index++;?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">4</td>
                            <td data-label="Status">Shipped</td>
                            <td data-label="Time"> <?php echo $row1["shipped"];?></td>
                        </tr>
                    <?php } ?>   
                    <?php   if($row1["intransit"]!=""){ $index++;?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">5</td>
                            <td data-label="Status">Intransit</td>
                            <td data-label="Time"> <?php echo $row1["intransit"];?></td>
                        </tr>
                    <?php } ?>   
                    <?php   if($row1["athub"]!=""){ $index++;?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">6</td>
                            <td data-label="Status">At Hub</td>
                            <td data-label="Time"> <?php echo $row1["athub"];?></td>
                        </tr>
                    <?php } ?>   
                    <?php   if($row1["outdeli"]!=""){ $index++;?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">7</td>
                            <td data-label="Status">Out for Delivery</td>
                            <td data-label="Time"> <?php echo $row1["outdeli"];?></td>
                        </tr>
                    <?php } ?>   
                    <?php   if($row1["delivered"]!=""){ $index++;?>
                        <tr>
                            <td scope="row" data-label="SR. NO.">8</td>
                            <td data-label="Status">Delivered</td>
                            <td data-label="Time"> <?php echo $row1["delivered"];?></td>
                        </tr>
                    <?php } }?> 

                    </tbody>
                    </table>
                </td>
            </tr>
            <?php if($index<8){
            echo'<tr><td colspan="2">
                <form method="post" name="assign" id="assign">
                <table><tr>
                <th >Update Status:</th>
                <td>
                <input type="number" name="courierid" id="courierid" value="'.$cid1.'" hidden/>
                <input type="number" name="customid" id="customid" value="'.$customid.'" hidden/>
                <select name="ustatus" id="ustatus">
                <option value=0 >Select</option >';
                for ($x = $index; $x <8; $x++) {
                     echo '<option value="'.$up_status[$x].'">'.$up_status[$x].'</option>';
                     }
                     echo'
                     </select>
                </td>
                <td>
                    <Button type="Submit" name="assign" id="assign" >Update</Button>
                </td>
                </tr></table>
                    </form>
                    </td></tr>';
             }
        ?>
        </tbody>
</table>

    </body>
</html>
<?php }  ?>