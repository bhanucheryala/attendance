<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["number_of_rows"]) ){
  header("location:HODLogin.php");
  exit();
}
else 
include 'HodHeader1.php';
?>

<body onload="automaticDate()">

<!--content-->

<?php
if($_POST){
    $conn = new mysqli('localhost','root','',$_SESSION["hod_department"]);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $number_of_rows=(int)$_SESSION["number_of_rows"];
    $year=$_SESSION["year"];
    $tablename="year".$year."_student_info";
    $total_attendance_tablename="year".$year."_total_attendance";
    $daily_tablename="year".$year."_daily_attendance";
    for($i=1;$i<=$number_of_rows;$i++){
        $student_name=$_POST["student_name".$i];
        $student_phone=$_POST["student_phone".$i];
        $student_id=$_POST["student_id".$i];
        $student_sql="update $tablename set `student_name`='$student_name',`student_phone`='$student_phone' where `student_id`='$student_id'";
        $total_sql="update $total_attendance_tablename set `student_name`='$student_name' where `student_id`='$student_id'";
        $daily_sql="update $daily_tablename set `student_name`='$student_name' where `student_id`='$student_id'";
        if ($conn->query($student_sql) === TRUE) {
        } else {
            echo "Error updating record: " . $conn->error;
            exit();
        }
        if ($conn->query($total_sql) === TRUE) {
        } else {
            echo "Error updating record: " . $conn->error;
            exit();
        }
    }
}
?>
<div class="alert alert-success">
  <strong>Student Data Updated!</strong> Select Another student<a href="ChangeStudentData.php" class="alert-link"> here</a>.
</div>
<!-- content-->



</div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->


</body>

</html>

