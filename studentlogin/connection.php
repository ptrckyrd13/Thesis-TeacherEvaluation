<?php
$connection=mysqli_connect("localhost","root","","qurtuba_teacher_eval");
/*check connection*/
if(mysqli_connect_errno())
{
echo "Connection Faiil..." . mysqli_connect_error();
}
?>
