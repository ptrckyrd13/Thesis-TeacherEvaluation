<?php
include("check_session.php"); 
include("Connection.php");

if(isset($_POST['submit']))
{
$DepartmentName=$_POST['DepartmentName'];

mysqli_query($connection,"insert into department (DepartmentName) values('$DepartmentName')") or die ("query 1 incorrect");

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
                <b>Add New Department</b>
               </h3>
<div class="row">
<form action="AddDepartment.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
 	 	<div class="form-group">
	  	    <div class="col-md-6">
                <input type="text" class="form-control" id="DepartmentName" name="DepartmentName" placeholder="Add new Department" required />
            </div>
        </div>
        
        <input class="btn btn-info" type="submit" name="submit">

                </form>
            </div>
        </div>
    </body>
</html>