<?php
include("check_session.php");
include("Connection.php");
$TeacherID=$_REQUEST['TeacherID'];

$teacher_info =mysqli_query($connection,"SELECT * 
FROM teachersubject
INNER JOIN subject ON subject.SubjectID = teachersubject.SubjectID
WHERE TeacherID ='".$TeacherID."'")or die ("query 1 incorrect.......");

$row_info = mysqli_fetch_array($teacher_info);

$teacher_name =mysqli_query($connection,"SELECT * 
FROM teacher WHERE TeacherID ='".$row_info['TeacherID']."'")or die ("query 2 incorrect.......");
$row_teacher = mysqli_fetch_array($teacher_name);

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
                        <div class="panel panel-default" style="margin-left:30px">
                        <div class="panel-heading" style="background-color:#668899">
	
                <h1  style="color:white">Teacher Info.. </h1>
                            </div><br>
                    <div class='table-responsive'>  
                        <div style="overflow-x:scroll;">
<table class="table table-bordered " style="font-size:18px; margin-left:30px">
	
    <tr>
         <th>Teacher ID</th>
        <th>Department Name</th>
        <!-- <th>Program Name</th>
        <th>Semester</th> -->
        <th>Subjects</th>
        <th></th>
	</tr>	

        <td><?php echo $row_info['TeacherID'] ?></td>
        <td><?php echo $row_teacher['TeacherName'] ?></td>
        <!-- <td>BCS</td>
        <td>BCS</td> -->
        <td><?php echo $row_info['SubjectName'] ?></td>
    
     
<td>
        <br>
    <a href='ManageTeacher.php' class='btn btn-warning'>
        Back</a>
        </td>
        </tr>
                            </table>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php include("include/js.php");?>
    </body>
</html>