<!-- <?php
// session_start();
// error_reporting(0);
// // include('..\includes\dbconnection.php');
// include('includes/dbconnection.php');

// if(isset($_POST['login']))
//   {
//     $adminuser=$_POST['uname'];
//     $password=md5($_POST['pass']);
//     $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
//     $ret=mysqli_fetch_array($query);
//     if($ret>0){
//       $_SESSION['cmsaid']=$ret['ID'];
//      header('location:dashboard.php');
//     }
//     else{
//     $msg="Invalid Details.";
//     }
//   }
  ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/register.css" rel="stylesheet">
</head>
<body>
<section>
    <div class="login-box">
    <h2>Register As Customer</h2>
    <!-- <p style="font-size:16px; color:red" align="center"> error </p> -->
    <form name="register" method="post">
        <div class="user-box">
        <input type="text" name="fname" required="">
        <label>First Name</label>
        </div>
        <div class="user-box">
        <input type="text" name="lname" required="">
        <label>Last name</label>
        </div>
        <div class="user-box">
        <input type="text"  maxlength="10" name="phone" required="">
        <label>Phone number</label>
        </div>
        <div class="user-box">
        <input type="text" name="addr" required="">
        <label>Address</label>
        </div>
        <div class="user-box">
        <input type="text" name="city" required="">
        <label>City</label>
        </div>
        <div class="user-box">
        <input type="text" name="state" required="">
        <label>State</label>
        </div>
        <div class="user-box">
        <input type="text" name="country" required="">
        <label>Country</label>
        </div>
        <div class="user-box">
        <input type="text" name="pin" maxlength="6"  required="">
        <label>Pin code</label>
        </div>
        
        <div class="user-box">
        <input type="text" name="email" required="">
        <label>Email id</label>
        </div>
        <div class="user-box">
        <input type="password" name="pass" required="">
        <label>Password</label>
        </div>
        <div class="user-box">
        <input type="text" name="cpass" required="">
        <label>Confirm Password</label>
        </div>
        <button name="register" class="btn">
        <span></span>
        <span></span>
        Submit
        <span></span>
        <span></span>
        </button><br>
        <a>Forget Password</a><br>
        <a>new User?</a>
    </form>
    </div>
</section>
</body>
</html>