<?php
include("check_session.php");
include("Connection.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$ProgramID=$_GET['ProgramID'];
/*this is delet quer*/
mysqli_query($connection,"delete from Program where ProgramID='$ProgramID'")or die("query is incorrect...");

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
	
            <h1  style="color:white">Manage Program... </h1>
            
                </div><br>
    <div class='table-responsive'>  
            <div style="overflow-x:scroll;">
<table class="table table-striped " style="font-size:18px; margin-left:3px">
	       <tr class="info">
                  
                <th>Program ID</th>
			     <th>Program Name</th>
               <th>No Of Semester</th>
               
             
	<th>
        <a href='AddProgram.php' class="btn btn-primary" >
            Add New Program</a>
               </th>
            </tr>	
            
    <?php 
$result=mysqli_query($connection,"select ProgramID,ProgramName, Semesters from program")or die ("query 2 incorrect.......");

while(list($ProgramID,$ProgramName,$NoSemester)=mysqli_fetch_array($result))
{
echo "<tr><td style='color:red'>$ProgramID</td><td style='color:blue'>$ProgramName</td><td>$NoSemester</td>";

echo"<td>
<a href='EditProgram.php?ProgramID=$ProgramID' class='btn btn-warning'> Edit</a>
<a href='ManageProgram.php?ProgramID=$ProgramID&action=delete' class='btn btn-danger'>Delete</a>
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