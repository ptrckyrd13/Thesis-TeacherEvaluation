<?php
//include("check_session.php");
include("Connection.php");

if(isset($_POST['submit']))
{
 $StudentName=$_POST['StudentName'];
    $FatherName=$_POST['FatherName'];
    $Gender=$_POST['Gender'];
    $Session=$_POST['Session'];

    $DepartmentName=$_POST['DepartmentID'];
    $ProgramName=$_POST['ProgramID'];
    $SemesterID=$_POST['SemesterID'];
    $RollNO=$_POST['RollNO'];

    $Password=$_POST['Password'];
  $result = mysqli_query($connection,"insert into student(StudentName,FatherName,Gender,SessionID,DepartmentID,ProgramID,SemesterID,RollNO,Password) values('$StudentName','$FatherName','$Gender','$Session', '$DepartmentName','$ProgramName','$SemesterID','$RollNO','$Password')")
    or die (mysqli_error($connection));

   // echo $result; exit;

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
                <b>Add New Student</b></h3>


		 <!-- Student Registration -->
<div class="row">
    <form action="AddStudent.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">

 	 	<div class="form-group">
	  	    <div class="col-md-4">
 			 	<input type="text" class="form-control"  name="StudentName" placeholder="Enter First Name" required />

                </div>
		 	</div>
            <div class="form-group">
                <div class="col-md-4">
	               <input type="text" class="form-control"  name="FatherName" placeholder="Enter Last Name" required  />

                </div>
            </div>
         <div class="form-group">
	  			<div class="col-md-4">
                    <p>Gender</p>
            <select name="Gender" id="Gender" class="form-control" required>
                    <option value="male" id="male">Male</option>
                    <option value="female" id="female">Female</option>

                    </select>

             </div></div>



           <!-- Select sessionTable -->
         <div class="form-group">
	  			<div class="col-md-4">
            <p>Select Session</p>
            <select class="form-control" id="Session" name="Session" required>
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
    <!-- Select Department from Department Table -->
         <div class="form-group">
	  			<div class="col-md-4">
            <p>Select Department</p>
            <select class="form-control" id="DepartmentID" name="DepartmentID" required>
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
  <!-- Select Program from Program Table -->
            <div class="form-group">
                <div class="col-md-4">
                    <p>Select Program</p>
            <select class="form-control" id="ProgramID" name="ProgramID" required>
                <?php



                        $qry2=mysqli_query($connection,"select * from `program`");
                        while($row2=mysqli_fetch_array($qry2))
                        {
            ?>

	      <option value="<?php echo $row2['ProgramID'];?>"><?php echo $row2['ProgramName'];?></option>
	       <?php }?>
                </select>
                </div>
            </div>

  <!-- select semester from semester table -->
        <div class="form-group">
	  	    <div class="col-md-4">
                <p>Select Semester</p>
                    <select class="form-control" name="SemesterID" required>
                        <option id="1" value="1st">1st</option>
                         <option id="2" value="2nd">2nd</option>
                    </select>
                </div>
            </div>
  <!-- set Roll No as a user name  -->
            <div class="form-group">
	  	        <div class="col-md-4">
    <input type="text" class="form-control"  name="RollNO" placeholder="STUDENT NO" required>
		 	    </div>
        </div>
 <!-- Password for a student -->
    <div class="form-group">
	  	<div class="col-md-4">
        <input type="Password" class="form-control"  name="Password" placeholder="Password" required  />
        </div>
            </div>


        <input class="btn btn-info" type="submit" name="submit">
        <input type="reset" class="btn btn-danger" name="reset" value="Reset" id="reset">

                </form>
            </div>
        </div>
    </body>
</html>
