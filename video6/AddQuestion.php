<?php
//include("check_session.php"); 
include("Connection.php");

if(isset($_POST['submit']))
{
$QuestionText=$_POST['QuestionText'];
    

mysqli_query($connection,"insert into question(QuestionText) values('$QuestionText')") or die ("query 1 incorrect");

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
            <b>Add New Question</b>
               </h3>
		
        <div class="row">

<form action="AddQuestion.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
            <div class="form-group">
	  	        <div class="col-md-6">
<input type="text" class="form-control" id="QuestionText" name="QuestionText" placeholder="Add new Question" required />
            </div>
        </div>
        
    <input class="btn btn-info" type="submit" name="submit">
    <input type="reset" class="btn btn-danger" name="reset" value="Reset" id="reset">

                </form>
            </div>
        </div>
    </body>
</html>