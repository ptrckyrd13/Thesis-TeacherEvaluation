<?php
include("check_session.php"); 
include("Connection.php");

if(isset($_POST['submit']))
{
 $program=$_POST['program'];
 $DepartmentName=$_POST['dept'];
 $num_semester=$_POST['semesters'];

mysqli_query($connection,"insert into program(DepartmentID,ProgramName,Semesters) values('$DepartmentName','$program','$num_semester')") or die (mysqli_error($connection));
    

 header("location: ManageProgram.php");
mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/my_js.js" type="text/javascript"></script>

</head>


<body>
       	 <?php include("include/header.php");?>
            <div class="container">
    <!-- Add New program(Degree Tittle IT, Management,Commerce etc) 
                     to program table -->
	
    <h3 class="text-info" style="padding-left:320px;">
                <b>Add New Program</b>
            </h3>
    
<form action="AddProgram.php" name="form" method="post" class="form-horizontal" style="margin-left:350px">
        
    <div class="row">     
              <!-- select Department from department table -->
        <div class="form-group">
	  	    <div class="col-md-4">
                    <select class="form-control" name="dept" onchange="select_program(this.value)" required>
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
              <div class="col-md-4">   
                <input type="text" name="program" class="form-control" placeholder="Enter Program Name" required>
                 </div>
             </div>
    <div class="form-group">
        <div class="col-md-4">
            <p>Select number of Semester</p>
     <select id="semesters" name="semesters" class="form-control"  required>
            <option id="4">4</option>
            <option id="8">8</option>
            </select>
        </div>
    </div>


    <!-- <div class="form-group">
        <div class="col-md-4">
    <select name="semester_id" id="semester_id" class="form-control"></select>
        </div>
    </div> -->
<br>
    <input type="submit" class="btn btn-info" name="submit" value="Submit" id="submit">
       <input type="reset" class="btn btn-danger" name="reset" value="Reset" id="reset">       
                    </div>
                </form>
            </div>
        </body>
    </html>

<script type="text/javascript">
 
    function select_program(deptid){
       // alert(deptid);exit;
        $.ajax({

            url: 'select_program_ajax.php',
            data: "deptid="+deptid,
            success:function(msg){

                //alert(msg);exit;
                $("#program_id").html(msg);

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