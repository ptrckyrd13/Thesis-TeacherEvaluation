<?php
include("check_session.php");
include("Connection.php");
$StudentID = $_REQUEST['StudentID'];
//echo $StudentID;exit;

$result=mysqli_query($connection,"select * from student where StudentID='$StudentID'")or die ("query 1 incorrect.....");

list($StudentID,$StudentName,$FatherName,$Gender,$Session,$ProgramID,$DepartmentID,$SemesterID,$RollNO,$Password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
   $StudentName=$_POST['StudentName'];
    $FatherName=$_POST['FatherName'];
   $Gender=$_POST['Gender'];
  
    $Session=$_POST['SessionID'];
    $DepartmentName=$_POST['DepartmentID'];
    $ProgramName=$_POST['ProgramID'];
    $SemesterName=$_POST['SemesterID'];
    $RollNO=$_POST['RollNO'];
    $Password=$_POST['Password'];


mysqli_query($connection,"update student set StudentName='$StudentName',FatherName='$FatherName',Gender='$Gender',SessionID='$Session',DepartmentID='$DepartmentID',ProgramID='$ProgramID',SemesterID='$SemesterName',RollNO='$RollNO',Password='$Password' where StudentID='$StudentID'")or die  (mysqli_error($connection));

header("location: ManageStudent.php");
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
                <b>Edit Student</b>
            </h3>
		 <!-- Student Registration -->
    <div class="row">
    <form action="EditStudent.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
        <input type="hidden"  name="StudentID" id="StudentID" value="<?php echo $StudentID;?>" />
        <div class="form-group">
	  	    <div class="col-md-6">
 			<input type="text" class="form-control"  name="StudentName" value="<?php echo $StudentName; ?>" />
            </div>
		 	</div>
    <div class="form-group">
        <div class="col-md-6">
	       <input type="text" class="form-control"  name="FatherName" value="<?php echo $FatherName; ?>" />
           </div>
           </div>
         <div class="form-group">
	  			<div class="col-md-6">
                    <p>Gender</p>
                    <select id="Gender" name="Gender" class="form-control">
                    
                     <option id="male" name="male">male</option>
                        <option id="female" name="female">female</option>
                    
                    
                    
                    </select>
             </div></div>
        <!--session-->
     <div class="form-group">
	  			<div class="col-md-6">
            <p>Select Session</p>
            <select class="form-control" id="SessionID" name="SessionID">
                <?php 
                        $qry4=mysqli_query($connection,"select * from `session`");
                        while($row4=mysqli_fetch_array($qry4))
                        {
            ?>
            
	      <option value="<?php echo $row4['SessionID'];?>"><?php echo $row4['SessionName'];?></option>
	       <?php }?>
                </select>
                    </div>
                </div>



    <!-- select semester from semester table -->
            <div class="form-group">
	  	        <div class="col-md-6">
                    <p>Select Semester</p>
                        <select class="form-control" name="SemesterID">
                    
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
        <!-- set Roll No as a user name  -->
            <div class="form-group">
	  	        <div class="col-md-6">
    <input type="text" class="form-control" id="RollNO" name="RollNO" value="<?php echo $RollNO; ?>">
		 	    </div>
            </div>
     <!-- Password for a student -->
                <div class="form-group">
	  	            <div class="col-md-6">
                        <input type="text" class="form-control"  name="Password" value="<?php echo $Password; ?>" />
                        </div>
		 	        </div>    
       <button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px">Submit</button>

                </form>
                </div>
            </div>
            </body>
</html>