<?php
include("check_session.php");
include("Connection.php");
$ProgramID=$_REQUEST['ProgramID'];

$qty=mysqli_query($connection,"select ProgramID,ProgramName,Semesters from Program where ProgramID='$ProgramID'")  or die  (mysqli_error($connection));

list($ProgramID,$ProgramName,$Semesters)=mysqli_fetch_array($qty);

if(isset($_POST['btn_save'])) 
{


$DepartmentID=$_POST['dept'];
    $NoSemester=$_POST['Semester'];

mysqli_query($connection,"update program set  DepartmentID='$DepartmentID',Semesters='$Semesters'  where ProgramID='$ProgramID'")or die("Query 2 is inncorrect..........");

header("location: ManageProgram.php");
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
    <!-- Add New program(Degree Tittle IT, Management,Commerce etc) 
                         to program table -->
	   <div class="container-fluid">
           <br><br><br>
		<h3 class="text-info" style="padding-left:320px;">
                    <b>Edit Program</b>
           </h3>
		
<div class="row">
 	<form action="EditProgram.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
        <input type="hidden"  name="ProgramID" id="ProgramID" value="<?php echo $ProgramID;?>" />
        
        
        <div class="form-group">
	  	    <div class="col-md-4">
<input type="text" class="form-control" id="ProgramName" name="ProgramName" value="<?php echo $ProgramName; ?>" />              </div>
		 	</div>
        <div class="form-group">
        <div class="col-md-4">
    <input type="text" class="form-control" id="Semesters" name="Semesters" value="<?php echo $Semesters ?>">    
        </div>
    </div>
        <br>
            <button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px">Submit</button>

                </form>
            </div>
        </div>
    </body>
</html>