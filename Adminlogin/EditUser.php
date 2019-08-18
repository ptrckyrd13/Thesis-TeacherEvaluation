<?php
include("check_session.php");
include("Connection.php");
$UserID=$_REQUEST['UserID'];

$result=mysqli_query($connection,"select UserName,Password  from users where UserID='$UserID'")or die ("query 1 incorrect.......");

list($UserName,$Password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$UserName=$_POST['uname'];
$Password=$_POST['Password'];

mysqli_query($connection,"update users set UserName='$UserName',Password='$Password' where UserID='$UserID'")or die("Query 2 is inncorrect..........");

header("location: ManageUser.php");
mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="js/my_js.js" type="text/javascript"></script>
</head>
<body>
    	 <?php include("include/header.php");?>
    
    <!-- Add New Question for Evaluation -->
	   <div class="container-fluid">
		      <br><br><br>
		<h3 class="text-info" style="padding-left:320px;">
            <b>Edit User(ADMIN)</b>
            </h3>
<div class="row">

<form action="EditUser.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
     <input type="hidden"  name="UserID" id="UserID" value="<?php echo $UserID;?>" />
    <div class="form-group">
	  	<div class="col-md-6">
            <br>
<input type="text" class="form-control"  name="uname"  value="<?php echo $UserName ?>" />
		 		<p></p>
                <p></p>
                <br>
<input type="text" class="form-control"  name="Password"  value="<?php echo $Password ?>" />
        </div>
        </div>
          <button type="submit" class="btn btn-info" name="btn_save" id="btn_save">Submit</button>
    
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </body>
    </html>