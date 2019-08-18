<?php 
session_start();
if(isset($_SESSION['UserID'])&& $_SESSION['UserID']!="")
{
	
}
else
{

    header("location: login.php");
}

$inactive=10000000000;
if(isset($_SESSION['timeout']))
{
	$sessionttl=time()- $_SESSION['timeout'];
	if($sessionttl > $inactive)
	{
	session_destroy();
	header("location:logout.php");	
	}	
}
$_SESSION['timeout']=time();
?>