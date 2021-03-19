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
    <title>Dashboard</title>
    <link href="./css/dash.css" rel="stylesheet"/>
    <link href="./css/header.css" rel="stylesheet"/>
    <!-- Footer css -->
    <link href="../css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script> -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="includes/jquery-1.7.1.min.js"></script>
</head>
<body>
<?php include_once('./include/header.php');?>
<div class="row1"><p>DashBoard</p></div>
<div class="row">
<?php
$rqtpick=0;
$outpick=0;
$picked=0;
$shipped=0;
$intransit=0;
$hub=0;
$outdel=0;
$delivered=0;
    $ret=mysqli_query($con,"SELECT COUNT(ID), status FROM tblcourier  GROUP BY Status");
    $num=mysqli_num_rows($ret);
    if($num >0){
    while ($row=mysqli_fetch_array($ret)) { 
        if($row["status"]=="rqtpickup"){
            $rqtpick=$row["COUNT(ID)"];
        }
        if($row["status"]=="outpick"){
            $outpick=$row["COUNT(ID)"];
        }
        if($row["status"]=="pickedup"){
            $picked=$row["COUNT(ID)"];
        }
        if($row["status"]=="shipped"){
            $shipped=$row["COUNT(ID)"];
        }
        if($row["status"]=="intransit"){
            $intransit=$row["COUNT(ID)"];
        }
        if($row["status"]=="athub"){
            $hub=$row["COUNT(ID)"];
        }
        if($row["status"]=="outdeli"){
            $outdel=$row["COUNT(ID)"];
        }
        if($row["status"]=="delivered"){
            $delivered=$row["COUNT(ID)"];
        }}}
        ?>
 
      <div class="box red">
        <div class="card-box">
        <a class="text-muted text-uppercase m-b-20" href="total-courier.php">Pick Up Requests</a>
        <h2 class="right" name="rqtpick" id="rqtpick"><?php  echo $rqtpick; ?></h2>                           
        </div>
        <div class="c"><a  href="./viewAll.php?status=rqtpickup">View All</a></div>    
    </div>
    <div class="box red">
        <div class="card-box">
        <a class="text-muted text-uppercase m-b-20" href="total-courier.php">Out for Pick Up</a>
        <h2 class="right" name="outpick" id="outpick"><?php echo $outpick; ?></h2>                           
        </div>
        <div class="c"><a  href="./viewAll.php?status=outpick">View All</a></div>    
    </div>
    <div class="box red">
        <div class="card-box">
        <a class="text-muted text-uppercase m-b-20" href="total-courier.php">Picked</a>
        <h2 class="right" name="picked" id="picked"><?php  echo $picked; ?></h2>                           
        </div>
        <div class="c"><a  href="./viewAll.php?status=pickedup">View All</a></div>    
    </div>
    <div class="box red">
        <div class="card-box">
        <a class="text-muted text-uppercase m-b-20" href="total-courier.php">Shipped</a>
        <h2 class="right" name="shipped" id="shipped"><?php echo $shipped; ?></h2>                           
        </div>
        <div class="c"><a  href="./viewAll.php?status=shipped">View All</a></div>    
    </div>
    <div class="box red">
        <div class="card-box">
        <a class="text-muted text-uppercase m-b-20" href="total-courier.php">Intransit</a>
        <h2 class="right" name="intransit" id="intransit"><?php echo $intransit; ?></h2>                           
        </div>
        <div class="c"><a  href="./viewAll.php?status=intransit">View All</a></div>    
    </div>
    <div class="box red">
        <div class="card-box">
        <a class="text-muted text-uppercase m-b-20" href="total-courier.php">At Hub</a>
        <h2 class="right" name="hub" id="hub"><?php echo $hub; ?></h2>                           
        </div>
        <div class="c"><a  href="./viewAll.php?status=athub">View All</a></div>    
    </div>
    <div class="box red">
        <div class="card-box">
        <a class="text-muted text-uppercase m-b-20" href="total-courier.php">Out for Delivery</a>
        <h2 class="right" name="outdel" id="outdel"><?php  echo $outdel; ?></h2>                           
        </div>
        <div class="c"><a  href="./viewAll.php?status=outdeli">View All</a></div>    
    </div>
    <div class="box red">
        <div class="card-box">
        <a class="text-muted text-uppercase m-b-20" href="total-courier.php">Delivered</a>
        <h2 class="right" name="delivered" id="delivered"><?php echo $delivered; ?></h2>                           
        </div>
        <div class="c"><a  href="./viewAll.php?status=delivered">View All</a></div>    
    </div>
    </div>
<div style="width: -webkit-fill-available;" >
<!-- pie chart canvas element -->

<script type="text/javascript">
// Load google charts
        var rqtpick= parseInt(document.getElementById("rqtpick").textContent);
        var outpick=parseInt(document.getElementById("outpick").textContent);
        var picked=parseInt(document.getElementById("picked").textContent);
        var shipped=parseInt(document.getElementById("shipped").textContent);
        var intransit=parseInt(document.getElementById("intransit").textContent);
        var hub=parseInt(document.getElementById("hub").textContent);
        var outdel=parseInt(document.getElementById("outdel").textContent);
        var delivered=parseInt(document.getElementById("delivered").textContent);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            if(rqtpick==0 && outpick ==0 && picked ==0 && shipped ==0 && intransit ==0 && hub ==0 && outdel ==0 && delivered ==0 ){
                var data = google.visualization.arrayToDataTable([
                    ['Status', 'Couriers'],
                    ['No Courier Placed', 1]
                    ]);
            }
            else{
        var data = google.visualization.arrayToDataTable([
        ['Status', 'Couriers'],
        ['rqtpick', rqtpick],
        ['outpick', outpick],
        ['picked', picked],
        ['shipped', shipped],
        ['intransit', intransit],
        ['hub', hub],
        ['outdel', outdel],
        ['delivered', delivered]
        ]);
            }

        // Optional; add a title and set the width and height of the chart
        var options = {'title': 'Total Couriers',
                        'position':'center' ,
                        // 'width':100%,
                        // 'height':100%,
                        'is3D':'True',
                        'backgroundColor':'transparent',
                        
                        'titleTextStyle':{ 
                                'color':'#17b2dc',
                                'fontSize': 25,
                                'bold': 'True',
                                'align':'center'
                                // 'italic': '<boolean>'
                                 }
            
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        }
</script>
<div id="piechart" class="center1"style="height:500;"></div>
<script>
    window.addEventListener("resize", drawChart);
</script>

</div>
<?php include_once('../includes/footer.php');?>
</body>
</html>
<?php } ?>