<?php
include("check_session.php");
include("Connection.php");
$TeacherID=$_REQUEST['TeacherID'];

$qty=mysqli_query($connection,"select TeacherName,FatherName,CNIC  from teacher where TeacherID='$TeacherID'")or die ("query 1 incorrect.......");

list($TeacherName,$FatherName,$CNIC)=mysqli_fetch_array($qty);

if(isset($_POST['btn_save'])) 
{

$TeacherName=$_POST['TeacherName'];
$FatherName=$_POST['FatherName'];
$CNIC=$_POST['CNIC'];

mysqli_query($connection,"update teacher set TeacherName='$TeacherName', FatherName='$FatherName',CNIC='$CNIC' where TeacherID='$TeacherID'")or die("Query 2 is inncorrect..........");

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
                    
		  <h3 class="text-info" style="padding-left:320px;"> 
            <b>Edit Teacher</b>
            </h3>
<!-- Teacher Registration form -->
    <div class="row">
 	<form action="EditTeacher.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
         <input type="hidden"  name="TeacherID" id="TeacherID" value="<?php echo $TeacherID;?>" />
    
    <!-- Tacher Name -->
 	 	<div class="form-group">
	  	    <div class="col-md-6">
<input type="text" class="form-control"  name="TeacherName"  value="<?php echo $TeacherName ?>" />
            </div>
		 	</div>
        

      
        <div class="form-group">
	  	      <div class="col-md-6">
<input type="text" class="form-control"  name="FatherName"  value="<?php echo $FatherName ?>" />
                </div>
		 	</div>  


                    
  
                    
    <!--Enter CNIC must be unique -->
         <div class="form-group">
            <div class="col-md-6">
             
<input type="text" name="CNIC" class="form-control" value="<?php echo $CNIC ?>"> 
             
           <br>
     <button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px">Submit</button>
  
             
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>