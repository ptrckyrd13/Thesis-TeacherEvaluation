<?php
include("check_session.php");
include("Connection.php");

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$StudentID=$_GET['StudentID'];
/*this is delet quer*/
mysqli_query($connection,"delete from student where StudentID='$StudentID'")or die("query is incorrect...");

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
 
   	 <?php include("include/header.php");?>
   	    <div class="container-fluid">
	       <?php include("include/side_bar.php");?>
                <div class="col-md-9 content">
                    <div class="panel panel-default" style="margin-left:50px">
                <div class="panel-heading" style="background-color:#668899">
	
            <h1  style="color:white">Manage Student ...
                    </h1>
          
                        </div>
                        <br>
    <div class='table-responsive'>  
            <div style="overflow-x:scroll;">
    <table class="table table-striped " style="font-size:18px;margin-left:3px">
	   
       
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
                
        
	<th>
        <a href='AddStudent.php' class="btn btn-primary"  >Add New Student</a>
                    </th>
                </tr>	
    
     <?php 
$result=mysqli_query($connection,"select StudentID,StudentName,FatherName,Gender,SessionName,DepartmentName,ProgramName,semester,RollNO,Password from student
inner join session on session.SessionID = student.SessionID
inner join department on student.DepartmentID = department.DepartmentID
inner join program on student.ProgramID = program.ProgramID
inner join semester on student.SemesterID = semester.semester_id")or die ("query 2 incorrect.......");

while(list($StudentID,$StudentName,$FatherName,$Gender,$SessionID,$DepartmentName,$ProgramName,$SemesterName,$RollNO,$Password)=mysqli_fetch_array($result))
{
    
//    $dept=mysqli_query($connection,"select * from department
// where DepartmentID = '$DepartmentName' ")or die ("query 2 incorrect.......");
//     $dept_name = mysqli_fetch_array($dept);
//     $dep_name = $dept_name['DepartmentName'];
echo "<tr><td style='color:blue'>$StudentName</td><td>$FatherName</td><td>$Gender</td><td>$SessionID</td><td>$DepartmentName</td><td>$ProgramName</td><td>$SemesterName</td><td style='color:red'>$RollNO</td><td style='color:red'>$Password</td>";

echo"<td>
<a href='EditStudent.php?StudentID=$StudentID' class='btn btn-warning'> Edit</a>
<a href='ManageStudent.php?StudentID=$StudentID&action=delete' class='btn btn-danger'>Delete</a>
</td></tr>";
}
mysqli_close($connection);
?>


                    </table>	
                </div>
            </div>
            </div>
            </div>
        </div>
 <?php include("include/js.php");?>
    </body>
</html>