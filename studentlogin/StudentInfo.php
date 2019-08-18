<?php
include("check_session.php");
include("connection.php");
$user_id=$_SESSION['user_id'];
 
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
        <div class="container-fluid">        <!--heading panel-->
   		<?php include ("include/side_bar.php");?>
	
                <div class="col-md-9 content">
                    <div class="panel panel-default" style="margin-left:20px">
                <div class="panel-heading" style="background-color:#660000">
	
                <h3 style="color:white">Student info</h3>
                        </div>
                       
    <div class='table-responsive'>  
            <div style="overflow-x:scroll;">
    <table class="table table-striped " style="font-size:18px;margin-left:px">
	   
       
            <tr class="info">
                
			    
                <th>Student Name</th>
                <th>Father Name</th>
                <th>Gender</th>
                <th>Session </th>
                <th>Department </th>
                <th>Program</th>
                <th>Semester</th>
                <th>Roll NO</th>
                <th>Password</th>
                </tr>	
    
     <?php 
$result=mysqli_query($connection,"select StudentID,StudentName,FatherName,Gender,SessionName,DepartmentName,ProgramName,semester,RollNO,Password from student
inner join session on session.SessionID = student.SessionID
inner join department on student.DepartmentID = department.DepartmentID
inner join program on student.ProgramID = program.ProgramID
inner join semester on student.SemesterID = semester.semester_id where StudentID='$user_id'")or die ("query 2 incorrect.......");

while(list($StudentID,$StudentName,$FatherName,$Gender,$SessionName,$DepartmentName,$ProgramName,$SemesterName,$RollNO,$Password)=mysqli_fetch_array($result))
{
    
echo "<tr><td>$StudentName</td><td>$FatherName</td><td>$Gender</td><td>$SessionName</td><td>$DepartmentName</td><td>$ProgramName</td><td>$SemesterName</td><td>$RollNO</td><td>$Password</td>";
}
mysqli_close($connection);
?>


                    </table>	
                </div>
            </div>
            </div>
            </div>
        </div>
 
    </body>
</html>