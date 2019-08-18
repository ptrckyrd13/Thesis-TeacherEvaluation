<?php 
include('Connection.php');
if($_REQUEST['subjectid']!=''){
	//echo $_REQUEST['center_id'];exit;
		$sql_teach = mysqli_query($connection,"SELECT * FROM `teachersubject` WHERE SubjectID ='".$_REQUEST['subjectid']."'");
		$row=mysqli_fetch_array($sql_teach);

		$techerid = $row['TeacherID'];

		$sql_teacher = mysqli_query($connection,"SELECT * FROM `teacher` WHERE TeacherID ='".$techerid."'");
		//echo $sql_program;exit;
		//console.log($sql_program);exit;
				
		$total_num= mysqli_num_rows($sql_teacher);

		if($total_num>0){ ?>

		<option>--Select Teacher--</option>
		<?php while($row_teacher=mysqli_fetch_array($sql_teacher)){ ?>
		<option value="<?php echo $row_teacher['TeacherID'];  ?>"><?php echo $row_teacher['TeacherName'];  ?></option>	
		<?php
		}
		}
		}

?>