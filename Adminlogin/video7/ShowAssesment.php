<?php
//include("check_session.php"); 
include("Connection.php");
?>

<?php

$department_id = $_REQUEST['department'];
$program_id = $_REQUEST['program'];
$subject_id = $_REQUEST['subject'];
$teacher_id = $_REQUEST['teacher'];
//$semester_id = $_REQUEST['semester'];

$dept=mysqli_query($connection,"select * from department where DepartmentID = '".$department_id."' ")or die ("query 2 incorrect.......");
$dept_name=mysqli_fetch_array($dept);

$program=mysqli_query($connection,"select * from program where ProgramID = '".$program_id."' ")or die ("query 2 incorrect.......");
$program_name=mysqli_fetch_array($program);

$teacher=mysqli_query($connection,"select * from teacher where TeacherID = '".$teacher_id."' ")or die ("query 2 incorrect.......");
$teacher_name=mysqli_fetch_array($teacher);

$subject=mysqli_query($connection,"select * from subject where SubjectID = '".$subject_id."' ")or die ("query 2 incorrect.......");
$subject_name=mysqli_fetch_array($subject);

//$semester=mysqli_query($connection,"select * from semester where semester_id = '".$semester_id."' ")or die ("query 2 incorrect.......");
//$semester_name=mysqli_fetch_array($semester);





?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Show Assesment</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<style type="text/css">
${demo.css}
    
    #btn1{
        border-radius: 10px;
        background-color:antiquewhite;
    }
        </style>
</head>
<body>
    <div class="container-fluid">
        <?php include("include/header.php");?>
        <div class="col-md-4">
            <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-body">
                            <h4>DEPARTMENT NAME:<?php echo $dept_name['DepartmentName'] ?></h4>
                            <h4>PROGRAM NAME:<?php echo $program_name['ProgramName'] ?></h4>
                            <h4>SUBJECT NAME:<?php echo $subject_name['SubjectName'] ?></h4>
                            <h4>TEACHER NAME:<?php echo $teacher_name['TeacherName'] ?></h4>
                   
                    
                    
                    
                   
                           <!-- <h4>SEMESTER NAME:<?php //echo $semester_name['semester'] ?></h4>-->
                          <!--   <h4>POOR</h4>
                            <h4>GOOD</h4>
                            <h4>EXCELENT</h4>
                            <h4>NONE</h4> -->
                     
                    
                        </div>
                    </div>
               
                </div>
            </div>
        
     <div class="col-md-7">          
        <div class="panel panel-primary">
           <div class="panel-heading">Graph 
             <button id="btn1" title="print screen" alt="print screen" onclick="window.print();" target="_blank" style="cursor:pointer;margin-left:500px;color:red " >
                    <strong>PRINT RECORD</strong>
                        </button>
            </div>
            <div class="panel-body">
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<table id="datatable">
    <thead>
        <tr>
         
            <th>Questions</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
           <?php

    $question=mysqli_query($connection,"select eval_id,QuestionText,eval_ans,question from question inner join evaluation on evaluation.question = question.QuestionID where tech_id = '".$teacher_id."' AND sub_id ='".$_REQUEST['subject']."' ")or die (mysqli_error($connection));
while ( $row_question=mysqli_fetch_array($question)) {

    ?>

        <tr>
        
            <th><?php echo $row_question['QuestionText'] ?></th>
            <td><?php echo $row_question['eval_ans'] ?></td>
        </tr>
       
<?php } ?> 
      
        
    </tbody>
</table>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        data: {
            table: 'datatable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Teacher Evaluation'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
});
        </script>