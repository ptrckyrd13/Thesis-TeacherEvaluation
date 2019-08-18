<?php
include("check_session.php"); 
include("connection.php");
$user_id=$_SESSION['user_id'];

if(isset($_POST['submit']))
{
    
    header("location: Select_teacher.php");
  	$stu_id = $_REQUEST['stu_id'];
	$tech_id = $_REQUEST['tech_id'];
	$sub_id = $_REQUEST['sub_id'];

	$abc1=mysqli_query($connection,"select * from question")or die ("query 2 incorrect.......");
	while(list($question_id,$qname)=mysqli_fetch_array($abc1))
	{
		$evl_val=$_POST['radio'.$question_id];
		mysqli_query($connection,"INSERT INTO `evaluation`(`stu_id`,`tech_id`,`sub_id`, `question`, `eval_ans`) VALUES ('$stu_id','$tech_id','$sub_id','$question_id','$evl_val')") or die (mysqli_error($connection));

	}

// mysqli_query($connection,"INSERT INTO `evaluation`(`stu_id`, `tech_id`, `sub_id`, `question`, `eval_ans`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])") or die (mysqli_error($connection));

// header("location:select_teacher.php");
// mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Questions</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 
</head>
<body>
<?php include("include/header.php");?>
<form action="question.php" name="form" method="post" class="form-horizontal">
<div class="container-fluid">
<div class="row">


<!-- Menu -->
<div class="clearfix"></div>

<p style="font-size:26px; font-family:'Times New Roman', Times, serif ; margin-left:150px" class="text-danger">Please read at carefully and make the dessicion  (***to be filled by the students only***)</p>
    <hr>
<p style="font-size:20px; font-family:'Times New Roman', Times, serif ; margin-left:280px" class="text-info">Use the scale to answer the following questions below and make comments</p><hr>



<div class="row">
<div class="col-sm-12">
<table class="table table-hover table-border" style="width:900px; margin:0 auto" >
<tr bgcolor="#CCCCCC">


<th>S No</th>
<th>Question</th>
<th>Poor</th>
<th>Good</th>
<th>Exellent</th>
<th>None</th>
</tr>
<!-- FOR QUESTIONS -->
<?php 
$abc1=mysqli_query($connection,"select * from question")or die ("query 2 incorrect.......");
while(list($question_id,$qname)=mysqli_fetch_array($abc1))
{ ?>
<tr>
<td><?php echo $question_id; ?></td>
<td><?php echo $qname; ?> </td>

<td><input type="radio" name="radio<?php echo $question_id;?>" value="1" required></td>
<td><input type="radio" name="radio<?php echo $question_id;?>" value="2" required></td>
<td><input type="radio" name="radio<?php echo $question_id;?>" value="3" required></td>
<td><input type="radio" name="radio<?php echo $question_id;?>" value="4" required></td>
</tr>



<?php } ?>
<input type="hidden" name="stu_id" value="<?php echo $_REQUEST['stu_id']?>">
<input type="hidden" name="tech_id" value="<?php echo $_REQUEST['tech_id']?>">
<input type="hidden" name="sub_id" value="<?php echo $_REQUEST['sub_id']?>">


<th  style="background-image:url(img/formbg2.png)"> </th>
<th style="padding-top:20px">
<b style="color:blue"> Do you fell need for private tuitions of the subjucts over and above the normal teachning hours ..</b>
</th>
<td><b>YES</b></td>	  
<th style="padding-top:28px">
<input name="question13 " value="1" type="radio" required></th>


<td><b>NO</b></td>	
<!-- QUSETIONS COMPLETED-->
<th style="padding-top:28px">
<input name="question13 " value="2" type="radio"></th>
   

</table>
<hr>
<div class="clearfix"></div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="container">
<div class="form-group">
<textarea class="form-control" name ="comment" style="width:500px ; height:100px ; margin-left:350px;" placeholder="NEED YOUR COMMENT"></textarea>
 <hr>
    <label style="color:red;margin-left:400px" >****READ AT CAREFULLY****</label>
    <p style="color:red;margin-left:200px" >I Read The above Questions and i answered them with the honisty,justice and without any favor<br> and self disliking and i will be the responsible to answer the above Evaluation about the teacher to every one ......</p>
    <p class="text text-success" style="margin-left:200px">I Read At carefully and wants to evaluates <input  value="OK" type="checkbox" required>
    </p>
      
<hr> 
    </div>
</div>	
</div>
</div>



<button class="btn btn-large  btn-primary" type="submit" name="submit" id="submit"  style="margin-left:500px">Submit
</button>
    
<button class="btn btn-large  btn-danger" type="reset" name="reset" id="reset"  style="margin-left:50px">Reset
</button>
<hr><hr>



</div>
</div>
</div>	
</div>
</div>		</div>
</div>
</form>
</body>
</html>