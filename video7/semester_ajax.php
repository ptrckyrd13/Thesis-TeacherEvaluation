<?php 
include('Connection.php');
if($_REQUEST['subjid']!=''){
	//echo $_REQUEST['center_id'];exit;
		$sql_sub = mysqli_query($connection,"SELECT * FROM `semester` WHERE subject_code ='".$_REQUEST['subjid']."'");

		//echo $sql_program;exit;
		//console.log($sql_program);exit;
				
		$total_num= mysqli_num_rows($sql_sub);

		if($total_num>0){ ?>

		<option>--Select Semester--</option>
		<?php while($row=mysqli_fetch_array($sql_sub)){ ?>
		<option value="<?php echo $row['semester_id'];  ?>"><?php echo $row['semester'];  ?></option>	
		<?php
		}
		}
		}

?>