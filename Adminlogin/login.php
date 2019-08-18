<?php

session_start();
include("Connection.php");
$check=0;
if(isset($_POST['submit']))
{
 $username = $_POST['tbx_username'];
 $userpassword = $_POST['tbx_password'];
 $query=mysqli_query($connection,"select UserID from users where UserName='$username' and Password='$userpassword'")or die ("query 1 incorrect.......");

list($UserID)=mysqli_fetch_array($query);

$_SESSION['UserID']=$UserID;
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
                <div class="col-md-8">
	           <h1 style="margin-left:500px">

            <img src="images/logo.png" width="130px" height="130px"></h1>

    <h1 class="text-bold text-primary" style="margin-left:460px">
        <b><strong>Admin Log in</strong>
        </b>
        </h1><br>


<form class="form-signin" action="login.php" method="post" name="login">

    <div class="form-group" style="width:300px; margin-left:430px">

        <input type="text" class="form-control" placeholder="Email address" name="tbx_username" id="tbx_username"  style="padding:20px" required>

<input type="password" class="form-control" placeholder="Password" name="tbx_password" id="tbx_password"  style="padding:20px; margin-top:15px" required>

    </div>

    <button class="btn btn-large  btn-success" type="submit" name="submit" id="submit"  style="margin-left:460px">Log in</button>


                                </form>
                            </div>
                        </div>
                    </div>
            </body>
        </html>
