<?php
include("check_session.php");
include("Connection.php");
$QuestionID=$_REQUEST['QuestionID'];

$result=mysqli_query($connection,"select QuestionID,QuestionText  from question where QuestionID='$QuestionID'")or die ("query 1 incorrect.......");

list($QuestionID,$QuestionText)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$QuestionText=$_POST['QuestionText'];


mysqli_query($connection,"update question set QuestionText='$QuestionText' where QuestionID='$QuestionID'")or die("Query 2 is inncorrect..........");

header("location: ManageQuestion.php");
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
    <!-- Add New Question for Evaluation -->
	       <div class="container-fluid">
		<h3 class="text-info" style="padding-left:320px;">
             <b>Edit Question</b>
               </h3>
		
<div class="row">
 	<form action="EditQuestion.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
        <input type="hidden"  name="QuestionID" id="QuestionID" value="<?php echo $QuestionID;?>" />
 	 	<div class="form-group">
	  	     <div class="col-md-6">
<input type="text" class="form-control" id="QuestionText"  name="QuestionText" value="<?php echo $QuestionText; ?>" />             </div>
        </div>
        
        <button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px">Submit</button>

                </form>
            </div>
        </div>
    </body>
</html>