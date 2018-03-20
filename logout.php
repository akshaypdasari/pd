<!--to turn off the login session  logout.php -->
<?php
error_reporting(0);
session_start();

if(isset($_SESSION['login_user']))
{
    unset($_SESSION['login_user']);
	//session_destroy();
	if(!isset($_SESSION['login_user']))
	{
	  header("Location: login.php");
    }
}
?>