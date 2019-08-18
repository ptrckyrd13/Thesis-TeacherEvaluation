<?php
include("check_session.php");
include("connection.php");
 
$user_id=$_SESSION['user_id'];
?>
<?php
$subject=mysqli_query($connection,"SELECT SubjectName, subject.SubjectID AS subID
FROM subject

INNER JOIN student ON student.ProgramID = subject.ProgramID
AND student.SemesterID=subject.SemesterID
WHERE StudentID ='$user_id' ");
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
        <div class="container-fluid">        <!--heading panel-->
   		<?php include ("include/side_bar.php");?>
	

<div class="col-md-8 cantant">
<div class="panel panel-primary" style="margin-left:20px">
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

//$teacher=mysqli_query($connection,"select * from `teachersubject` WHERE SubjectID = '".$row_subject['SubjectID']."' ");
//$row_teacher =  mysqli_fetch_array($teacher);

//echo $row_teacher['TeacherID'];exit;

$teacher_name = mysqli_query($connection,"SELECT TeacherName,teacher.TeacherID as techId,teachersubject.SubjectID as subId
FROM teacher
INNER JOIN teachersubject ON teachersubject.TeacherID = teacher.TeacherID
WHERE SubjectID = '$row_subject[subID]'");
$teacher_row_run = mysqli_fetch_array($teacher_name);

//$student = mysqli_query($connection, "select * from `studentsubject` where SubjectID = '".$row_subject['SubjectID']."' ");
//$row_student = mysqli_fetch_array($student);

?>
<tr>
  <?php
    $question=mysqli_query($connection,"select eval_id,QuestionText,eval_ans,question from question
    inner join evaluation on evaluation.question = question.QuestionID 
   
    
    where tech_id = '".$teacher_row_run['techId']."' AND sub_id ='".$teacher_row_run['subId']."' AND stu_id='$user_id'")or die (mysqli_error($connection));  
   $num_rows =  mysqli_num_rows($question);
    if($num_rows>0){
        ?>
    <td ><?php echo $teacher_row_run['TeacherName'];?> </td>
<td><img src="done.jpg" width="33" height="33" /></td>
    <?php
        
    }else{
    ?>
    
<td ><a href="question.php?stu_id=<?php echo $user_id; ?>&tech_id=<?php echo $teacher_row_run['techId'] ?>&sub_id=<?php echo $teacher_row_run['subId'] ?>"><?php echo $teacher_row_run['TeacherName'];?></a> <img src="new-gif-2.gif" height="30px" width="30px"></td>
<td><img src="0.jpg" width="33" height="33" /></td>
    <?php } ?>
    

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
