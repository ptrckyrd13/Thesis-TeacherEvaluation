<?php
include("check_session.php");
include("connection.php");  
 $user_id=$_SESSION['user_id'];

$query=mysqli_query($connection,"select StudentName,RollNO,semester,DepartmentName from student inner join department on department.DepartmentID = student.DepartmentID inner join semester on semester.semester_id = student.SemesterID where StudentID = '$user_id'")or die ("query 1 incorrect.......");

list($StudentName,$RollNO,$SemesterName,$DepartmentName)=mysqli_fetch_array($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Student Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
  	<body> 
        
						<div class="row" >
  	    <?php include("include/header.php");?>
        <div class="container-fluid">        <!--heading panel-->
   		<?php include ("include/side_bar.php");?>
	
  			
  				
					
					<div class="col-sm-9" >
					 <div class="panel panel-primary" style="margin-left:20px">
						<div class="panel-heading" style="background-color:#660000">
						<h3 style="color:white">WELCOME:<?php echo $StudentName;?> </h3>
										</div>
					<div class="panel-body">
<!--This is from student panel -->
                        <h3>STUDENT No:<?php echo $RollNO;?> </h3>
					
					<h3>Semester:<?php echo $SemesterName;?> </h3>
					<h3>Department: <?php echo $DepartmentName;?> </h3>

			</div>
			</div>
                </div></div>	</div>  
        
  

        </div>
      </body>
<br><br><br><br><br><p></p>&nbsp;&nbsp;
     <?php include ("include/footer.php");?>
</html>