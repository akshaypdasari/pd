<?php
include("dbinfo.php");
session_start();
error_reporting(0);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=mysql_real_escape_string($_POST['username']); 
$mypassword=mysql_real_escape_string($_POST['password']);
$password=md5($mypassword); // Encrypted Password
$type=$_POST['type']; 
if($type==1)
{
	$sql="SELECT * FROM user WHERE u_email='$myusername' and u_pass='$password'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$id=$row['u_id'];
$status=$row['u_flag'];
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1 && $status==0)
{
//session_register("myusername");
$_SESSION['login_user']=$myusername;
//$_SESSION['ruserid']=$id;
header("location:index.php");
}
else 
  {
$error="Your Login Name or Password is invalid";
  }
}
elseif($type==2)
{
	$sql="SELECT * FROM staffexcel WHERE s_email='$myusername' and s_pass='$password'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$id=$row['s_id'];
$status=$row['s_flag'];
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1 && $status==0)
{
//session_register("myusername");
//$_SESSION['login_staff']=$myusername;
$_SESSION['login_staff']=$id;
header("location:staff/index.php");
}
else 
  {
$error="Your Login Name or Password is invalid";
  }
}
elseif($type==3)
{
	$sql="SELECT * FROM studentexcel WHERE st_email='$myusername' and st_pass='$password'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$id=$row['st_id'];
$status=$row['st_flag'];
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1 && $status==0)
{
//session_register("myusername");
//$_SESSION['login_student']=$myusername;
$_SESSION['login_student']=$id;
header("location:student/index.php");
}
else 
  {
$error="Your Login Name Or Password is Invalid";
  }
}
else{
$error="Sorry, Please Fill All Information ";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Katare">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>ORCHID, Solapur</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container" style="margin-top: 100px;">
	 <form class="form-signin" action="" method= "POST">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" id="username" name="username" value="" placeholder="Username" />
            <input type="password" class="form-control"id="password" name="password" value="" placeholder="Password" >
			
            <select style= "margin-bottom: 10px;" id="type" name="type" class="form-control">		
				<option value="">Please Select </option>
				<option value="1">Admin</option>
				<option value="2">Staff</option>
				<option value="3">Student</option>
		    </select>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
          
            <div class="login-social-link">
                <a href="index-2.html" class="facebook">
                    <i class="fa fa-facebook"></i>
                    Facebook
                </a>
                <a href="index-2.html" class="twitter">
                    <i class="fa fa-twitter"></i>
                    Twitter
                </a>
            </div>
            

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>
 </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>

<!-- Mirrored from thevectorlab.net/flatlab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Feb 2015 10:31:59 GMT -->
</html>
