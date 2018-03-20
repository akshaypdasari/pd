<!--to turn off the login session  logout.php -->
<?php
error_reporting(0);
session_start();

if(isset($_SESSION['login_admin']))
{
    unset($_SESSION['login_admin']);
	//session_destroy();
	if(!isset($_SESSION['login_admin']))
	{
	  header("Location: login.php");
    }
}
?>