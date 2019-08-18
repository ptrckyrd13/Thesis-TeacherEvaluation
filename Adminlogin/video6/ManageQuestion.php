<?php
include("check_session.php");
include("Connection.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$QuestionID=$_GET['QuestionID'];
/*this is delet quer*/
mysqli_query($connection,"delete from question where QuestionID='$QuestionID'")or die("query is incorrect...");

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
	<h1  style="color:white">Manage Question ... </h1>
    </div><br>
<div class='table-responsive'>  
<div style="overflow-x:scroll;">

    <table class="table table-striped " style="font-size:18px; margin-left:3px">
	   <tr class="info">
			    
                <th>Question Name </th>
             
	   <th>
        <a href='AddQuestion.php' class="btn btn-primary">Add New Question</a>
           </th>
        </tr>	
<?php 
$result=mysqli_query($connection,"select QuestionID,QuestionText from question")or die ("query 2 incorrect.......");

while(list($QuestionID,$QuestionText)=mysqli_fetch_array($result))
{
echo "<tr><td style='color:#4B0922'>$QuestionText</td>";

echo"<td>
<a href='EditQuestion.php?QuestionID=$QuestionID' class='btn btn-warning'>Edit</a>
<a href='ManageQuestion.php?QuestionID=$QuestionID&action=delete' class='btn btn-danger'>Delete</a>
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