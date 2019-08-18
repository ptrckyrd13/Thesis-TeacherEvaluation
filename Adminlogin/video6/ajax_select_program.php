<?php 
include('Connection.php');
if($_REQUEST['deptid']!=''){
	//echo $_REQUEST['center_id'];exit;
		$sql_semester = mysqli_query($connection,"SELECT * FROM `program` WHERE DepartmentID ='".$_REQUEST['deptid']."'");

		//echo $sql_program;exit;
		//console.log($sql_program);exit;
				
		$total_num= mysqli_num_rows($sql_semester);

		if($total_num>0){ ?>

		<option>--Select Program--</option>
		<?php while($row=mysqli_fetch_array($sql_semester)){ ?>
		<option value="<?php echo $row['ProgramID'];  ?>"><?php echo $row['ProgramName'];  ?></option>	
		<?php
		}
		}
		}

?>