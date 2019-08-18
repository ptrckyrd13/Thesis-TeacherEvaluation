<?php 
include('Connection.php');
if($_REQUEST['DepartmentID']!=''){
	$sql_get_std ="SELECT * FROM `student` WHERE DepartmentID ='".$_REQUEST['DepartmentID']."' AND ProgramID='".$_REQUEST['Programid']."' AND SemesterID='".$_REQUEST['semeter_id']."' AND SessionID='".$_REQUEST['Session']."'";
		$sql_semester = mysqli_query($connection,$sql_get_std);

		//echo $sql_program;ex;
		//console.log($sql_program);exit;
				
		$total_num= mysqli_num_rows($sql_semester);

		if($total_num>0){ ?>
<a href="javascript:CheckAll('form_teach')" class="button_gray corners">Check All</a> <a href="javascript:unCheckAll('form_teach')" class="button_gray corners">Uncheck All</a><br><br>

		<?php while($row=mysqli_fetch_array($sql_semester)){ 
		?>
        <input type="checkbox" name="student[]" value="<?php echo $row['StudentID'];?>" />
    <?php echo $row['RollNO'];?>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php echo $row['StudentName'];?><br />
        <?php
		}
		}
		}

?>