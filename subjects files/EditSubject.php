<?php
include("check_session.php");
include("Connection.php");
$SubjectID=$_REQUEST['SubjectID'];


$result=mysqli_query($connection,"select DepartmentID,ProgramID,SemesterID,Subjectcode,SubjectName  from Subject where SubjectID='$SubjectID'")or die ("query 1 incorrect.......");

list($DepartmentID,$ProgramID,$SemesterID,$Subjectcode,$SubjectName)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
   $DepartmentName=$_POST['DepartmentID'];
    $ProgramName=$_POST['ProgramID'];
   $SemesterName=$_POST['SemesterID'];
   $SubjectName=$_POST['SubjectName'];
$Subjectcode=$_POST['Subjectcode'];



mysqli_query($connection,"update subject set DepartmentID='$DepartmentName', ProgramID='$ProgramName', SemesterID='$SemesterName',Subjectcode='$Subjectcode',SubjectName='$SubjectName' where SubjectID='$SubjectID'")or die  (mysqli_error($connection));

header("location: ManageSubject.php");
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
            <b>Edit Subject</b>
           </h3>
		
           <div class="row">
<!-- Add New Subject -->
 	<form action="EditSubject.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
 <input type="hidden"  name="SubjectID" id="SubjectID" value="<?php echo $SubjectID;?>" />
     <div class="form-group">
        <div class="col-md-6">
            <!-- Select Department from Department Table -->
            <p>Select Department</p>
            <select class="form-control" id="DepartmentID" name="DepartmentID">
                <?php 
                        $qry=mysqli_query($connection,"select * from `department`");
                        while($row=mysqli_fetch_array($qry))
                        {
            ?>
            
	      <option value="<?php echo $row['DepartmentID'];?>"><?php echo $row['DepartmentName'];?></option>
	       <?php }?>
                </select>
            </div>
        </div>
            <div class="form-group">
                <div class="col-md-6">
                <!-- Select Program from Program Table -->
                    <p>Select Program</p>
            <select class="form-control" id="ProgramID" name="ProgramID">
                <?php 
                        $qry2=mysqli_query($connection,"select * from `program`");
                        while($row2=mysqli_fetch_array($qry2))
                        {
            ?>
            
	      <option value="<?php echo $row2['ProgramID'];?>"><?php echo $row2['ProgramName'];?></option>
	       <?php }?>
                </select>
                </div> </div>
            <div class="form-group">
                <div class="col-md-6">
                    <!-- Select Semester Static-->
                        <p>Select Semester</p>
                            <select class="form-control" id="semesterID" name="SemesterID">
                                <option id="1">1st</option>
                                <option id="2">2nd</option>
                                <option id="3">3rd</option>
                                <option id="4">4th</option>
                                <option id="5">5th</option>
                                <option id="6">6th</option>
                                <option id="7">7th</option>
                                <option id="8">8th</option>
                            </select>
                        </div>
                    </div>
         <div class="form-group">
	  	    <div class="col-md-6">
 			 	<input type="text" class="form-control"  name="Subjectcode"  id="Subjectcode" value="<?php echo $Subjectcode ?>" />
            </div>
        </div>
        <div class="form-group">
	  	    <div class="col-md-6">
 			 	<input type="text" class="form-control"  name="SubjectName"  id="SubjectName" value="<?php echo $SubjectName ?>" />
            </div>
        </div>
                                
<button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px">Submit</button>


                </form>
            </div>
                </div>
           
        </body>
    </html>