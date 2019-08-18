<?php
session_start();
if(isset($_SESSION['UserID'])&& $_SESSION['UserID']!="")
{
  $_SESSION['UserID']="";
  unset($_SESSION['UserID']);
  session_destroy();
  header("location: login.php");

}
else
{
   header("location: login.php");
}
?>
