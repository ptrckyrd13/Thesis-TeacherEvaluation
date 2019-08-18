<?php
include("check_session.php");
include("connection.php");
$user_id=$_SESSION['user_id'];

$result=mysqli_query($connection,"select StudentID, Password from student where StudentID='$user_id'")or die ("query 1 incorrect.......");

list($StudentID,$Password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
$Password=$_POST['Password'];

mysqli_query($connection,"update student set Password='$Password' where StudentID='$user_id'")or die("Query 2 is inncorrect..........");

header("location: login.php");
mysqli_close($connection);
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
    <div class="row">
    
       	 <?php include("include/header.php");?>
    	<div class="container-fluid">
    <?php include("include/side_bar.php");?>
       
     <div class="col-md-9 content">
    <div class="panel panel-default" style="margin-left:20px">
    <div class="panel-heading" style="background-color:#660000">
	<h3 style="color:white">Manage Login  </h3>
    </div><br>
<form action="user_login_edit_form.php" name="form" method="post" enctype="multipart/form-data">
<input type="hidden"  name="StudentID" id="StudentID" value="<?php echo $StudentID;?>" />
<label style="font-size:18px; margin-left:20px">Password</label>
<input class="input-lg" style="width:200px" name="Password" type="text" class="form-control" id="Password" value="<?php echo $Password; ?>">
<br><br>
 <button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px; margin-left:30px">Submit</button>
</form>
</main>
</div>
        </div></div>
</div>
<?php include("include/js.php");?>
</body>
</html>