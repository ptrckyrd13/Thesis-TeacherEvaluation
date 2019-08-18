<?php 
include('Connection.php');
if($_REQUEST['Programid']!=''){
	//echo $_REQUEST['center_id'];exit;
		$sql_subject = mysqli_query($connection,"SELECT * FROM `subject` WHERE ProgramID ='".$_REQUEST['Programid']."'");

		//echo $sql_program;exit;
		//console.log($sql_program);exit;
				
		$total_num= mysqli_num_rows($sql_subject);

		if($total_num>0){ ?>

		<option>--Select Program--</option>
		<?php while($row=mysqli_fetch_array($sql_subject)){ ?>
		<option value="<?php echo $row['SubjectID'];  ?>"><?php echo $row['SubjectName'];  ?></option>	
		<?php
		}
		}
		}

?>