<?php
include("check_session.php");
include("Connection.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$UserID=$_GET['UserID'];
/*this is delet quer*/
mysqli_query($connection,"delete from users where UserID='$UserID'")or die("query is incorrect...");

}
 
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
            <div class="col-md-9 content">
            <div class="panel panel-default" style="margin-left:50px">
                <div class="panel-heading" style="background-color:#668899">
	   
        <h1  style="color:white">Manage Admin USer....</h1>
                </div>
                <br>
    <div class='table-responsive'>  
        <div style="overflow-x:scroll;">
<table class="table table-striped " style="font-size:18px; margin-left:3px">
	
        <tr class="info">
           
			    <th>User Name</th>
                <th>User Password</th>
             
	<th>
        <a href='AddUser.php' class="btn btn-primary" >
            Add New User</a>
            </th>
        </tr>	
        
   
 <?php 
$result=mysqli_query($connection,"select UserID,UserName,Password from users")or die ("query 2 incorrect.......");

while(list($UserID,$UserName,$Password)=mysqli_fetch_array($result))
{
echo "<tr><td style='color:red'>$UserName</td><td style='color:red'>$Password</td>";

echo"<td>
<a href='EditUser.php?UserID=$UserID' class='btn btn-warning'> Edit</a>
<a href='ManageUser.php?UserID=$UserID&action=delete' class='btn btn-danger'>Delete</a>
</td></tr>";
}
mysqli_close($connection);
?>


                </table>	
                </div>
                </div>
            </div>
        </div>
    </div>
 <?php include("include/js.php");?>
    </body>
</html>