<?php
include("check_session.php");
include("Connection.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$id=$_GET['id'];
/*this is delet quer*/
mysqli_query($connection,"delete from department where department_id='$id'")or die("query is incorrect...");

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

<form action="ShowAssesment.php" method="post">
<div class="col-md-9 content">
<div class="panel panel-default" style="margin-left:50px">
<div class="panel-heading" style="background-color:#668899">

<h1  style="color:white">Select Teacher For Assesment</h1>
</div>
<br>
<div class='table-responsive' style="margin-left:20px">  
<div style="overflow-x:scroll;">

<!-- Select department-->
<div class="row">           
<div class="form-group">
<div class="col-md-5">
<h5 >Select Department</h5>
<select class="form-control" name="department" onchange="select_program_ajax(this.value)" required>
<option class="form-control" value="">Select Department</option>
<?php 
$dept=mysqli_query($connection,"select * from department")or die ("query 2 incorrect.......");
    while($dept_name=mysqli_fetch_array($dept))
    {
?>
<option value="<?php echo $dept_name['DepartmentID'] ?>"><?php echo $dept_name['DepartmentName'] ?></option>
<?php } ?>
</select>
</div>
</div> 
</div>
<!-- Select program-->
<div class="row">
<div class="form-group">
<div class="col-md-5">
<h5>Select Program</h5>
<select class="form-control" id="Programid" name="program" onchange="select_sub_ajax(this.value)" required>

</select>
</div>

</div>
</div>

<!-- Select subject-->
<div class="row">
<div class="form-group">
<div class="col-md-5">
<h5 >Select Subject </h5>
<select class="form-control" id="subid" name="subject" onchange="select_tech_semester(this.value)" required>

</select>
</div>

</div>
</div>

<!-- Select teacher-->
<div class="row">
<div class="form-group">
<div class="col-md-5">
<h5 >Select Teacher </h5>
<select class="form-control" id="tech_id" name="teacher" required>

</select>
</div>

</div>
</div>
<!-- Select Semester
<div class="row">
<div class="form-group">
<div class="col-md-5">
<h5 >Select Semester</h5>
<select class="form-control" id="sem_id" name="semester">

</select>
</div>

</div>

</div>

-->


<p></p>
<p></p>

<button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>
</form>
</div>
</div>
</div>
</div>
</div>
<?php include("include/js.php");?>
</body>
</html>

<script type="text/javascript">
    
    function select_program_ajax(deptid){
        //alert(deptid);exit;
        $.ajax({

            url: 'ajax_select_program.php',
            data: 'deptid='+deptid,
            success:function(res){
                //alert(res);exit;
                $("#Programid").html(res);
            }
        });
    }
    function select_sub_ajax(Programid){


        $.ajax({

            url: 'ajax_select_subject.php',
            data: 'Programid='+Programid,
            success:function(res){
                //alert(res);exit;
                $("#subid").html(res);
            }

        });
    }

    function select_tech_semester(subjectid){

        $.ajax({

            url: 'ajax_select_teacher.php',
            data: 'subjectid='+subjectid,
            success:function(res){

                $("#tech_id").html(res);
            }
        });

        //$.ajax({

           // url: 'ajax_select_semester.php',
          //  data: 'subjectid='+subjectid,
          //  success:function(res){

              //  $("#sem_id").html(res);
         ///   }
       // });

    }


</script>