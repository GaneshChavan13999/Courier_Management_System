<?php
session_start();
// error_reporting(0);
$msg="";
$msg2="";
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:../logout.php');
    } else{
        if(isset($_POST['card_num']))
        {   $msg2="Hello";
            $name = $_POST['fname'];
            $courierid = $_POST['track'];
            $customID=(int)$_SESSION['cmsaid'];
            $card_num = $_POST['card_num'];
            $card_cvc = $_POST['cvc'];
            $card_exp_month = $_POST['exp_month'];
            $card_exp_year = $_POST['exp_year'];  
            $status="succeeded";	
            
            
            //item information
           
            $itemPrice =(int)$_POST["fare"];
            $txnID = date("YmdHis");
    
    
            $sql="INSERT INTO `orders`(`txnID`, `custid`, `courierid`, `card_name`, `card_num`, `card_cvc`, `card_exp_month`, `card_exp_year`, `status`, `amount`) VALUES (
                ".$txnID.",
                ".$customID.",
                ".$courierid.",
                '".$name."',
                ".$card_num.",
                ".$card_cvc.",
                '".$card_exp_month."',
                '".$card_exp_year."',
                '".$status."',
                ".$itemPrice.")";
            $result=$con->query($sql);
            if($result){
               
                $sql1="UPDATE `tblcourier` SET `payment`= 1 WHERE `ID`=".(int)$courierid; 
                $result1=$con->query($sql1);
                if($result1){
                    $msg2="PAYMENT IS SUCCESSFULL.";
                    include "../includes/mail.php";
                    $m="Hello <br> Your payment is successfull.<br> Transaction ID : ".$txnID."<br> Now Courier will be visible to staff. And We hope that courier will be picked and delivered quickly.<br> Thank you. ";
                    $s=mailto($_SESSION["email"],"Successfull payment",$m);
                    if($s){
                        $msg2="PAYMENT IS SUCCESSFUL.";
                    }  
                    header('location: dashboard.php');
                }
            }
            else{
                $msg="Payment is not added, Please Try again later.";
            }
            
            
            }
?>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Payment</title>
    <link href="./css/form.css" rel="stylesheet">
   <link href="./css/header.css" rel="stylesheet"/>
   <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../includes/jquery-1.7.1.min.js"></script>
    <!-- Footer css -->
    <link href="../css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> 
    <style>
    #fare1{
        top: -20px;
        left: 0; 
        color: #03e9f4;
        font-size: 12px;
    }
    </style>
</head>
<body>
<?php include_once('./include/header.php');?>
<section>
    <div class="login-box">
    <h2>Payment</h2>
    <!-- <p style="font-size:16px; color:red" align="center"> error </p> -->
    <form name="paymentFrm" id="paymentFrm" method="post"  >
        <div>
        <span class="payment-errors" style="font-size:16px; color:red"></span>
        <p style="font-size:16px; color:lightblue" id="e" align="center"> <?php if($msg2!=""){ echo $msg2; $msg2="";}?> </p>
        </div>
        <div class="user-box">
        <input type="text" name="fname" id="fname" required="">
        <label>CardHolder Name</label>
        </div>
        <div class="user-box">
        <input type="text" name="track" id="track" value="<?php echo $_GET["track"] ?>" hidden readonly>
        </div>
        <div class="user-box">
        <input type="text"   name="card_num" id="card_num" class="card-number" size="20" autocomplete="off" required="">
        <label>Card Number</label>
        </div>
        <div class="user-box">
        <input type="text" name="cvc" size="4" autocomplete="off" class="card-cvc" required>
        <label>CVC</label>
        </div>
        <div class="user-box">
        <input type="text" name="exp_month" size="2" class="card-expiry-month" required>
        <label>Expiration Month (MM)</label>
        </div>
        <div class="user-box">
        <input type="text" name="exp_year" size="4" class="card-expiry-year" required>
        <label>Expiration Year (YYYY)</label>
        </div>
        <div class="user-box">
        <input type="number" name="fare"  id="fare" value="<?php echo $_GET["amt"] ?>"  readonly>
        <label id="fare1">Amount in <Strong>₹</Strong></label>
        </div>
        <div>
        <pre style="font-size:16px; color:red" align="center" id="error" name="error"></pre>
        </div>
        <div>
        <p style="font-size:16px; color:red" id="e" align="center"> <?php if($msg!=""){ echo $msg; $msg="";}?> </p>
        </div>
        <div style=" text-align: center;"><button name="payBtn" type="submit" id="payBtn">
        <span></span>
        <span></span>
        PAY
        <span></span>
        <span></span>
            </button>
            <script type="text/javascript">
            //set your publishable key
            Stripe.setPublishableKey('pk_test_vAXewLVJ2TvJ0NI8cWjuRvFL00LYh13dqX');
            
            //callback to handle the response from stripe
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    //enable the submit button
                    $('#payBtn').removeAttr("disabled");
                    //display the errors on the form
                    $(".payment-errors").html(response.error.message);
                } else {
                    var form$ = $("#paymentFrm");
                    //get token id
                    var token = response['id'];
                    //insert the token into the form
            //         form$.append("<input type='hidden' name='stripeToken' value='" 
            // + token + "' />");
                    //submit form to the server
                    form$.get(0).submit();
                    // $('form').submit();
                    // $('#paymentFrm').submit();
                }
            }
            $(document).ready(function() {
                //on form submit
                
                $("#paymentFrm").submit(function(event) { 
                    
                                    //disable the submit button to prevent repeated clicks
                    $('#payBtn').attr("disabled", "disabled");
                    
                    //create single-use token to charge the user
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                    
                    //submit from callback
                    return false;
                    }    );
            
                    });
            </script>
       
    </form>
    <hr><br>
    <?php include_once('../includes/footer.php');?>
    </div>
</section>
</body>
</html>
<?php } ?>