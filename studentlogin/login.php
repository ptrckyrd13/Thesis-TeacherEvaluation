<?php

session_start();
include("connection.php");
$check=0;
if(isset($_POST['submit']))
{
$username = $_POST['tbx_username'];
$userpassword = $_POST['tbx_password']; 
$query=mysqli_query($connection,"select StudentID from student where RollNO='$username' and Password='$userpassword'")or die ("query 1 incorrect.......");

list($user_id)=mysqli_fetch_array($query);
 
$_SESSION['user_id']=$user_id;
header("location: index.php");

$check=1;

if($check==0)
{
$check=2;
}

mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
      <link href="style/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
      <div class="container-fluid" align = "center">
    
          
          <div class="row">
              <div class="col-md-6" style="margin-left:180px; margin-top:20px">
        	<form class="form-signin" action="login.php" method="post" name="login">
           <img src="logo.png" width="130px" height="130px" style="margin-left:350px"><br>
                
              <h4 style="font-weight:bolder; font-size:20px; margin-left:270px"><b>Christ the King Science and Technology</b></h4>
             <div class="clearfix"></div>
	          <h4 class="text-success" style="font-weight:bolder; font-size:20px; margin-left:330px">Student Login</h4>
	      <div class="clearfix"></div><br>
        <div class="clearfix"></div>
                
        <div class="form-group" style="width:250px; margin-left:300px">
 <input type="text" class="form-control" placeholder="Email address" name="tbx_username" id="tbx_username"  style="padding:20px" required>
  <div class="clearfix"></div>  <div class="clearfix"></div>
            
<input type="password" class="form-control" placeholder="Password" name="tbx_password" id="tbx_password"  style="padding:20px; margin-top:15px" required>
        
        </div>
        <div class="form-group">
            
    <!--<input type="checkbox" value="showpassword" style=" margin-left:300px; size:30px" />
            <label class="text-muted" style="padding-left:20px" > Show password </label></div>-->
        <div class="clearfix"></div>
          <div style="margin-left:300px">
          <div class="clearfix"></div>  <div class="clearfix"></div>
          <button class="btn btn-success" type="submit" name="submit" id="submit" style="width:250px">Log in</button>
          <div class="clearfix"></div><br>  <div class="clearfix"></div>
        
          </div>


             </form>
              </div>
          </div>
           </div>
      </body>
 </html>
