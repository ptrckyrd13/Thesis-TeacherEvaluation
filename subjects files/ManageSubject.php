<?php
include("check_session.php");
include("Connection.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$SubjectID=$_GET['SubjectID'];
/*this is delet quer*/
mysqli_query($connection,"delete from `subject` where SubjectID='$SubjectID'")or die("query is incorrect...");

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
	
        <h1  style="color:white">Manage Subject... </h1>
                </div>
                <br>
    <div class='table-responsive'>  
            <div style="overflow-x:scroll;">

            <table class="table table-striped " style="font-size:18px; margin-left:3px">
	   <tr class="info">
                <!--<th>Subject ID </th>-->
           <th>Subject Code</th>
			    <th>Subject Name</th>
          
             
	<th>
        <a href='AddSubject.php' class="btn btn-primary" >
            Add New Subject </a>
           </th>
                </tr>	
       
    
         
    <?php 
$result=mysqli_query($connection,"select SubjectID,Subjectcode,SubjectName from subject")or die ("query 2 incorrect.......");

while(list($SubjectID,$Subjectcode,$SubjectName)=mysqli_fetch_array($result))
{
echo "<tr>
<td>$Subjectcode</td><td style='color:blue'>$SubjectName</td>";

echo"<td>
<a href='EditSubject.php?SubjectID=$SubjectID' class='btn btn-warning'> Edit</a>
<a href='ManageSubject.php?SubjectID=$SubjectID&action=delete' class='btn btn-danger'>Delete</a>
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