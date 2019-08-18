<div class="container-fluid">
<nav class="navbar navbar-default navbar-static-top">
    
	<div class="navbar-header" style="background-color:#660000">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
        
			<a class="navbar-brand" href="#" style="font-size:24px; margin-top:10px">
                
                <b style="color:white">Student Login Panel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Online Teacher Evaluation system </b>		</a>	</div>

<div class="collapse navbar-collapse" style="background-color:#660000">

    
         <?php 
    
    $query=mysqli_query($connection,"select StudentName,RollNO,ProgramName from student
    inner join program on student.ProgramID = program.ProgramID
    where StudentID='$user_id'")or die ("query 1 incorrect.......");

list($StudentName,$RollNO,$ProgramName)=mysqli_fetch_array($query);

?>
        
 
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
    
    <li style="margin-right:100px;margin-top:15px;color:#dff0d8" ><label>NAME:</label><strong><?php echo $StudentName; ?></strong> <br><label></label><label></label>
        
        <label>ROLL NO:</label><strong><?php echo $RollNO; ?></strong>
          <label>Program:</label><strong><?php echo $ProgramName; ?></strong>
    </li>
    
        <li style="margin-right:30px"><a href="logout.php" style="color:white">Logout</a></li>
	</ul>
	  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>