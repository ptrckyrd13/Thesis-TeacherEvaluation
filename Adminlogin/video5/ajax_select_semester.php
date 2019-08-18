<?php 
include('Connection.php');
if($_REQUEST['subjectid']!=''){
	//echo $_REQUEST['center_id'];exit;
		$sql_semester = mysqli_query($connection,"SELECT * FROM `semester` WHERE subject_code ='".$_REQUEST['subjectid']."'");

		//echo $sql_program;exit;
		//console.log($sql_program);exit;
				
		$total_num= mysqli_num_rows($sql_semester);

		if($total_num>0){ ?>

		<option>--Select semester--</option>
		<?php while($row=mysqli_fetch_array($sql_semester)){ ?>
		<option value="<?php echo $row['semester_id'];  ?>"><?php echo $row['semester'];  ?></option>	
		<?php
		}
		}
		}

?>