<?php
include("check_session.php");
include("Connection.php");  
$UserID=$_SESSION['UserID'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>
 
   	    <?php include("include/header.php");?>
   	        <div class="container-fluid">
	           <?php include("include/side_bar.php");?>
                    <div class="col-md-8 content">
  	         <div class="panel panel-default" style="margin-left:50px">
	           <div class="panel-heading" style="background-color:#668899" >
	           <h1 style="color:white">Welcome To Admin Panel</h1>
                    </div>
                    <br>
        <div class="panel-body">
     <?php 
        $qry=mysqli_query($connection,"select UserName,Password from users where UserID='$UserID'")or die ("query 1 incorrect.......");

list($UserName,$Password)=mysqli_fetch_array($qry)
    ?>
		<h3 style="color:red">User Name:<?php echo $UserName ?></h3>
		<h3 style="color:blue">Password:<?php echo $Password ?></h3>

                    </div>
                </div>
            </div>
        </div>
    <?php include("include/js.php"); ?>
        </body>
    </html>