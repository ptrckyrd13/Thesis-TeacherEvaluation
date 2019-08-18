<?php
//include("check_session.php"); 
include("Connection.php");

if(isset($_POST['submit']))
{
 $TeacherName=$_POST['TeacherName'];
 $FatherName=$_POST['FatherName'];
$CNIC=$_POST['CNIC'];
mysqli_query($connection,"insert into teacher(TeacherName,FatherName,CNIC) values('$TeacherName','$FatherName','$CNIC')") or die (mysqli_error($connection));
    

 header("location: ManageTeacher.php");
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
               <br><br>
               <h3 class="text-info" style="padding-left:320px;">
                <b>Add Teacher</b>
               </h3>
		<!-- Teacher Registration form -->
    <div class="row">
 	<form action="AddTeacher.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
        <!-- Tacher Name -->
        <div class="form-group">
	  	    <div class="col-md-6">
<input type="text" class="form-control"  name="TeacherName" placeholder="First Name " required />
            </div>
        </div>
 	 	<div class="form-group">
	  	    <div class="col-md-6">
<input type="text" class="form-control"  name="FatherName" placeholder=" Last Name " required />
            </div>
        </div>  
        
    <div class="form-group">
        <div class="col-md-6">
    <input type="text" name="CNIC" class="form-control" placeholder="Enter Your Teacher ID" required> 
        </div>
    </div>
        <input class="btn btn-info" type="submit" name="submit">
        <input type="reset" class="btn btn-danger" name="reset" value="Reset" id="reset">
      

                    </form>
                 </div>
              </div>
           </body>
       </html>