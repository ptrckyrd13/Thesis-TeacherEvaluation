`<?php
//include("check_session.php"); 
include("Connection.php");

if(isset($_POST['submit']))
{

    $Session=$_POST['Session'];
    
    $DepartmentID=$_POST['DepartmentID'];
    $ProgramID=$_POST['ProgramID'];
    $FromSemesterID=$_POST['FromSemesterID'];
	 $ToSemesterID=$_POST['ToSemesterID'];
 foreach($_POST["student"] as $resv)
    {
$sql_promote_std = "update student SET SemesterID='".$ToSemesterID."' where 
DepartmentID='".$DepartmentID."' AND ProgramID='".$ProgramID."' AND SemesterID='".$FromSemesterID."' AND StudentID = '".$resv."'";

mysqli_query($connection,$sql_promote_std) or die (mysqli_error($connection));
}
    


   // echo $result; exit;

 header("location: ManageStudent.php");
mysqli_close($connection);
  
}
?>
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
<script>
function get_semester_std(semeter_id){
	
	var DepartmentID = document.getElementById('DepartmentID').value;

	var Programid = document.getElementById('Programid').value;
	
	var Session = document.getElementById('Session').value;
	
	  $.ajax({

            url: 'ajax_select_promote.php',
            data:  {DepartmentID:DepartmentID, Programid:Programid, semeter_id:semeter_id, Session:Session},
            success:function(res){

                $("#show_relevent_student").html(res);
            }
        });
	
	
}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Promote Students</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="js/my_js.js" type="text/javascript"></script>
</head>


<body>
    
    	 <?php include("include/header.php");?>
        <div class="container-fluid">
        <h3 class="text-info" style="padding-left:320px;">
                <b>Promote Student to Next Semester</b></h3>
           
            
		 <!-- Student Registration -->
<div class="row">
    <form action="" name="form" method="post" class="form-horizontal" style="margin-left:350px" id="form_teach">
<!-- Select department-->
          <div class="form-group">
	  			<div class="col-md-4">
            <p>Select Session</p>
            <select class="form-control" id="Session" name="Session" required>
                <?php 
                        $qry4=mysqli_query($connection,"select * from `session`");
                        while($row4=mysqli_fetch_array($qry4))
                        {
            ?>
            
	      <option value="<?php echo $row4['SessionID'];?>"><?php echo $row4['SessionName'];?></option>
	       <?php }?>
                </select>
                    </div>
                </div>
<div class="form-group">

<div class="col-md-5">
<h5 >Select Department</h5>
<select class="form-control" name="DepartmentID" id="DepartmentID" onchange="select_program_ajax(this.value)" required>
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

<!-- Select program-->

<div class="form-group">
<div class="col-md-5">
<h5>Select Program</h5>
<select class="form-control" id="Programid" name="ProgramID" onchange="select_sub_ajax(this.value)" required>

</select>
</div>

</div>
            
    
  <!-- select semester from semester table -->
        <div class="form-group">
	  	    <div class="col-md-4">
                <p>Select From Semester</p>
                    <select class="form-control" name="FromSemesterID" required onChange="get_semester_std(this.value)">
                    <option value="">Select From Semester</option>
                        <option id="1" value="1">1st</option>
                         <option id="2" value="2">2nd</option> 
                         <option id="3" value="3">3rd</option> 
                         <option id="4" value="4">4th</option> 
                         <option id="5" value="5">5th</option> 
                         <option id="6" value="6">6th</option> 
                         <option id="7" value="7">7th</option> 
                         <option id="8" value="8">8th</option> 
                    </select>   
                </div>
            </div>
            <div class="form-group">
            <div class="col-lg-12">
            <p>Select Student to Promote</p>
            <div id="show_relevent_student"></div>
            </div>
            </div>
            <div class="form-group">
	  	    <div class="col-md-4">
                <p>Select From Semester</p>
                    <select class="form-control" name="ToSemesterID" required>
                      <option value="">Select To Semester</option>
                        <option id="1" value="1">1st</option>
                         <option id="2" value="2">2nd</option> 
                         <option id="3" value="3">3rd</option> 
                         <option id="4" value="4">4th</option> 
                         <option id="5" value="5">5th</option> 
                         <option id="6" value="6">6th</option> 
                         <option id="7" value="7">7th</option> 
                         <option id="8" value="8">8th</option> 
                    </select>   
                </div>
            </div>
        
       
                    
        <input class="btn btn-info" type="submit" name="submit">
        <input type="reset" class="btn btn-danger" name="reset" value="Reset" id="reset">

                </form>
            </div>
        </div>
    </body>
</html>