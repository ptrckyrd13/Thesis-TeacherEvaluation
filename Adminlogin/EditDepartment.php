<?php
include("check_session.php");
include("Connection.php");
$DepartmentID=$_REQUEST['DepartmentID'];

$qty=mysqli_query($connection,"select DepartmentID,DepartmentName  from department where DepartmentID='$DepartmentID'")or die ("query 1 incorrect.......");

list($DepartmentID,$DepartmentName)=mysqli_fetch_array($qty);

if(isset($_POST['btn_save'])) 
{


$DepartmentName=$_POST['DepartmentName'];

mysqli_query($connection,"update department set DepartmentName='$DepartmentName' where DepartmentID='$DepartmentID'")or die("Query 2 is inncorrect..........");

header("location: ManageDepartment.php");
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
	   <div class="container-fluid">
<h3 class="text-info" style="padding-left:320px;">  
        <b>Edit Department</b></h3>
    <div class="row">
<form action="EditDepartment.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
    <input type="hidden"  name="DepartmentID" id="DepartmentID" value="<?php echo $DepartmentID;?>" />
    <div class="form-group">
	  	<div class="col-md-6">
            <input type="text" class="form-control" name="DepartmentName" id="DepartmentName" value="<?php echo $DepartmentName; ?>"/>
            </div>
        </div>
   <button type="submit" class="btn btn-info" name="btn_save" id="btn_save">Submit</button>

                </form>
            </div>
        </div>
    </body>
</html>