<?php
include("check_session.php");
include("connection.php");  
$user_id=$_SESSION['user_id'];
?>
<?php
$subject=mysqli_query($connection,"select * from `subject` ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Student panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body> 
<div class="row">
<?php include("include/header.php");?>
<div class="container-fluid">
<?php include("include/side_bar.php");?>
<div class="col-md-8 cantant">
<div class="panel panel-primary">
<div class="panel-heading" style="background-color:#660000">
<h3><strong style="color:white">Time Table</strong></h3>
</div>
<div class="panel-body">
<div id="table-responsive">
<table border="0" class="table">
<tr class="info">
<td><strong>EMPLOYEE </strong></td>
<td><strong>ASSESSMENT STATUS </strong></td>
<td><strong>Subject</strong></td>
</tr>
<?php while ($row_subject=mysqli_fetch_array($subject)) {
# code...
?>

<?php 

$teacher=mysqli_query($connection,"select * from `teachersubject` WHERE SubjectID = '".$row_subject['SubjectID']."' ");
$row_teacher =  mysqli_fetch_array($teacher);

//echo $row_teacher['TeacherID'];exit;

$teacher_name = mysqli_query($connection,"select * from `teacher` WHERE TeacherID = '".$row_teacher['TeacherID']."' ");
$teacher_row_run = mysqli_fetch_array($teacher_name);

$student = mysqli_query($connection, "select * from `studentsubject` where SubjectID = '".$row_subject['SubjectID']."' ");
$row_student = mysqli_fetch_array($student);

?>
<tr>
<td><a href="question.php?stu_id=<?php echo $row_student['StudentID'] ?>&tech_id=<?php echo $row_teacher['TeacherID'] ?>&sub_id=<?php echo $row_subject['SubjectID'] ?>"><?php echo $teacher_row_run['TeacherName']; ?></a></td>
<td><img src="0.jpg" width="33" height="33" /></td>

<td><?php echo $row_subject['SubjectName'] ?></td>
</tr> 

<?php } ?>
<input  type="hidden" name="teacher"  value="student">
</div>
</div>
</div>
</div>
</table>
</div>
</div>	
</body>
</html> 
