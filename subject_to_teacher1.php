<?php
//include("check_session.php"); 
include("Connection.php");

$teacher=mysqli_query($connection,"select * from `teacher` where TeacherID = '".$_REQUEST['TeacherID']."' ");
$row_teacher=mysqli_fetch_array($teacher);


if(isset($_POST['submit']))
{
//$subject=$_POST['subject'];
$teacher_id = $_POST['teacher_id'];
foreach($_POST["subject"] as $resv)
    {

mysqli_query($connection,"insert into teachersubject(TeacherID,SubjectID) values('".$teacher_id."','".$resv."')") or die (mysqli_error($connection));
}

header("location: ManageTeacher.php");
mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/my_js.js" type="text/javascript"></script>

<script language="javascript">

function CheckAll(form)

{

form= document.getElementById(form);

    for (var i = 0; i < form.elements.length; i++)

    {    

        eval("form.elements[" + i + "].checked = true ");  

    } 


}  

function unCheckAll(form)

{

    form= document.getElementById(form);

    for (var i = 0; i < form.elements.length; i++)

    {    

        eval("form.elements[" + i + "].checked = false ");  

    } 

}

</script>


</head>


<body>
<?php include("include/header.php");?>
<div class="container">
<!-- Add New program(Degree Tittle IT, Management,Commerce etc) 
to program table -->
<div class="row">  
    
<h3 class="text-info" style="padding-left:200px;">
<b>Asgin Subject To <?php echo $row_teacher['TeacherName']; ?></b>
</h3>

<form action="subject_to_teacher.php" name="form" id="form_teach" method="post" class="form-horizontal" style="margin-left:250px">

   
<!-- select Department from department table -->
<div class="form-group">
<div class="col-md-4">

<a href="javascript:CheckAll('form_teach')" class="button_gray corners">Check All</a> <a href="javascript:unCheckAll('form_teach')" class="button_gray corners">Uncheck All</a><br><br>

<?php                  
$qry=mysqli_query($connection,"select * from `subject`");
while($row=mysqli_fetch_array($qry))
{
    $qry_checking=mysqli_query($connection,"select * from `teachersubject` where TeacherID='".$_REQUEST['TeacherID']."' AND SubjectID='".$row['SubjectID']."'");
$num_checking = mysqli_num_rows($qry_checking);
    if($num_checking == 0){
?>

<input type="checkbox" name="subject[]" value="<?php echo $row['SubjectID'];?>" />
    <?php echo $row['Subjectcode'];?>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php echo $row['SubjectName'];?><br />

<?php } }?>

</div>
<input type="hidden" name="teacher_id" value="<?php echo $_REQUEST['TeacherID']; ?>">


</div>

<div class="form-group">

<div class="col-md-5">

<input type="submit" class="btn btn-info" name="submit" value="Submit" id="submit">
<input type="reset" class="btn btn-danger" name="reset" value="reset" id="reset">
    </div></div>

   <div class="form-group">

<div class="col-md-5">
  
    <hr>
    <b>Subject Assign To <?php echo $row_teacher['TeacherName']; ?></b>
    <hr>
    
    <?php 
    $TeacherID=$_REQUEST['TeacherID'];
$qry2=mysqli_query($connection,"select * from teachersubject
INNER JOIN subject ON subject.SubjectID = teachersubject.SubjectID
where TeacherID='$TeacherID'");
while($row2=mysqli_fetch_array($qry2))
{
    
    
?>
<?php echo $row2['Subjectcode'];?> &nbsp;&nbsp;&nbsp;&nbsp;
 <?php echo $row2['SubjectName'];?> <br />

<?php }?>


       </div>       </div></div>

</form>
</div>
</body>
</html>

