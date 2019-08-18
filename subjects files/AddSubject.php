<?php
//include("check_session.php"); 
include("Connection.php");

if(isset($_POST['submit']))
{
 $ProgramName=$_POST['ProgramID'];
    $DepartmentName=$_POST['DepartmentID'];
    $SemesterID=$_POST['SemesterID'];
    $SubjectName=$_POST['SubjectName'];
    $Subjectcode=$_POST['Subjectcode'];
mysqli_query($connection,"insert into subject(ProgramID,DepartmentID,SemesterID,Subjectcode,SubjectName) values('$ProgramName','$DepartmentName','$SemesterID','$Subjectcode','$SubjectName')") 
    or die (mysqli_error($connection));

 header("location: ManageSubject.php");
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
    
	<div class="container-fluid">
		
		<h3 class="text-info" style="padding-left:320px;">
            <b>Add New Subject</b></h3>
		
<div class="row">
                     
    <!-- Add New Subject -->
 	<form action="AddSubject.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">

     <div class="form-group">
        <div class="col-md-6">
            <!-- Select Department from Department Table -->
            <select class="form-control" id="DepartmentID" name="DepartmentID" onchange="select_program(this.value)" required>
            <option value="">Select Department</option>
                <?php 
                        $qry=mysqli_query($connection,"select * from `department`");
                        while($row=mysqli_fetch_array($qry))
                        {
            ?>
            
	      <option value="<?php echo $row['DepartmentID'];?>"><?php echo $row['DepartmentName'];?></option>
	       <?php }?>
                </select>
            </div>
        </div>
            <div class="form-group">
                <div class="col-md-6">
                <!-- Select Program from Program Table -->
                    <p>Select Program</p>
            <select class="form-control" id="Programid" name="ProgramID" required>
               <!--  <?php 
                        $qry2=mysqli_query($connection,"select * from `program`");
                        while($row2=mysqli_fetch_array($qry2))
                        {
            ?>
            
	      <option value="<?php echo $row2['ProgramID'];?>"><?php echo $row2['ProgramName'];?></option>
	       <?php }?> -->
                </select>
                </div> </div>
            <div class="form-group">
                <div class="col-md-6">
                    <!-- Select Semester Static-->
                        <p>Select Semester</p>
                            <select class="form-control" id="semesterID" name="SemesterID" required>
                                <option id="1" value="1st">1st</option>
                                <option id="2" value="2nd">2nd</option>
                                <option id="3"value="3rd">3rd</option>
                                <option id="4"value="4th">4th</option>
                                <option id="5" value="5th">5th</option>
                                <option id="6"value="6th">6th</option>
                                <option id="7" value="7th">7th</option>
                                <option id="8" value="8th">8th</option>
                            </select>
                        </div>
                    </div>
         <div class="form-group">
	  	    <div class="col-md-6">
                
 			 	<input type="text" class="form-control"  name="Subjectcode" placeholder="Subject Code" id="Subjectcode" required/>
            </div>
        </div>
          <div class="form-group">
	  	    <div class="col-md-6">
                
 			 	<input type="text" class="form-control"  name="SubjectName" placeholder="Subject Name"  id="SubjectName" required />
            </div>
        </div>
       
                <input class="btn btn-info" type="submit" name="submit">
<input type="reset" class="btn btn-danger" name="reset" value="Reset" id="reset">
                </form>
            </div>
        </div>
    </body>
</html>


<script type="text/javascript">
 
    function select_program(deptid){
        //alert(deptid);exit;
        $.ajax({

            url: 'select_program_ajax.php',
            data: "deptid="+deptid,
            success:function(msg){

                //alert(msg);exit;
                $("#Programid").html(msg);

            }
        });
    }

    function select_subject(subjectid){

        //alert(subjectid);exit;
        $.ajax({

            url: 'select_subject_ajax.php',
            data: "subjectid="+subjectid,
            success:function(res){
                
                
                $("#subject_id").html(res);
            }

        });


    }


    function select_semester(subjid){
       // alert(subjid);exit;

        $.ajax({

            url: 'semester_ajax.php',
            data: "subjid="+subjid,
            success:function(res){
               // alert(res);exit;

                $("#semester_id").html(res);
            }
        });

    }

</script>