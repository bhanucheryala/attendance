<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_department"]) ){
    header("location:HODLogin.php");
    exit();
}
else
    include("HodHeader1.php"); 
if(isset($_POST["submit"])){
  $conn = new mysqli("localhost", "root", "", $_SESSION["hod_department"]);
  $year=$_POST["year"];
  $tablename="year".$year."_subject_info";
  $sql = "SELECT `subject_name`,`subject_type` FROM $tablename where `subject_type`='P' or `subject_type`='O'";
  $result=$conn->query($sql);
  if ($result->num_rows > 0) {
  }
  else {
    echo "<div class='alert alert-danger' role='alert'>
  <h5>No Electives found...! </h5><strong><a href='SelectElective.php'> &nbsp Back To Assign Page</a></strong>
  </div>";
    exit();
  }
  $section=$_POST["section".$year];
  $_SESSION["year"]=$year;
  $_SESSION["section"]=$section;  
  $electiveinfo=explode(",",$_POST["year".$year."_elective_info"]);
  $elective_name=$electiveinfo[0];
  $elective_type=$electiveinfo[1];
  $_SESSION["elective_name"]=$elective_name;
  $_SESSION["elective_type"]=$elective_type;
  unset($electiveinfo);
?>

  
<div class="container" id="assele">
    
  <form onsubmit="return validate()" method="POST">
  <h5><strong>Elective:&nbsp;<?php echo strtoupper($elective_name);?></strong></h5>
    <p>Year:&nbsp;<?php echo $year;?>&nbsp;&nbsp;Section:&nbsp;<?php echo $section;?></p>
  <form onsubmit="return validate()" method="POST">
<?php
  $tablename="year".$year."_student_info";
  if($elective_type=='O')
    $sql="select `student_id`,`student_name` from $tablename where open_elective='0' and `student_section`='$section'";
  if($elective_type=='P')
    $sql="select `student_id`,`student_name` from $tablename where professional_elective='0' and `student_section`='$section'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
?>
<label for="myInput">Search for Student ID or Student Name: </label>  <!--Create Table if there are studnets available-->
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<table class='table table-borderless'>
<tbody><tr>
<td><button type='button' class='btn btn-primary' onclick='selectAll()'>Select All</button></td>
<td><button type='button' class='btn btn-danger' onclick='removeAll()'>Remove All</button></td>
<td><button type='submit' class='btn btn-success' name='submit1'>Submit</button></td>
</tr></tbody></table>
<table class="table table-bordered table-hover">
  <thead><tr>
    <th>Hall Ticket Number</th><th>Student Name</th></tr></thead><tbody id="myTable">
<?php
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td><div class='form-check'><label>";
      echo "<input type='checkbox' class='form-check-input' value='".$row["student_id"]."' name='student[]'>".$row["student_id"];
      echo "</label></div></td>";
      echo "<td>".$row["student_name"]."</td></tr>";    
    }
    echo "</tbody></table>";
    echo "<table class='table table-borderless'>";
    echo "<tbody><tr>";
    echo "<td><button type='button' class='btn btn-primary' onclick='selectAll()'>Select All</button></td>";
    echo "<td><button type='button' class='btn btn-danger' onclick='removeAll()'>Remove All</button></td>";
    echo "<td><button type='submit' class='btn btn-success' name='submit1'>Submit</button></td>";
    echo "</tr></tbody>";
  } else {
      if($elective_type=='O')
       echo "<div class='alert alert-danger' role='alert'>
      <h6><strong>Every Student of Year: $year Section: $section has been assigned an Open Elective</strong>.</h6>
      </div>";

      if($elective_type=='P')
        echo "<div class='alert alert-danger' role='alert'>
      <h6><strong>Every Student of Year: $year Section: $section has been assigned an Professional Elective</strong>.</h6>
      </div>";

      echo "<p>Choose another Year/Section <a href='SelectElective.php'>Here.</a></p>";
      exit();
    }
}
?>
</tbody>
</table>
</form>

</form>

<?php
if(isset($_POST["submit1"])){
  $count=0;
  $year=$_SESSION["year"];
  if($_SESSION["elective_type"]=='P')
    $elective_type="professional_elective";
  else if($_SESSION["elective_type"]=='O')
    $elective_type="open_elective";
  $subject_name=$_SESSION["elective_name"];
  $conn = new mysqli("localhost", "root", "", $_SESSION["hod_department"]);
  $tablename="year".$year."_student_info";
  $daily_attendance_table_name="year".$year."_total_attendance";
  $daily_sql="";
  foreach($_POST['student'] as $student_id){
    $sql="Update $tablename set `$elective_type`='$subject_name' where `student_id`='$student_id'";
    $daily_sql.="UPDATE $daily_attendance_table_name set `$subject_name`='0' where `student_id`='$student_id';";
    if ($conn->query($sql) === TRUE) {
      $count++;
    } 
    else {
      echo "Error updating record: " . $conn->error;
      exit();
    }
  }
  if ($conn->multi_query($daily_sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}
  if($count>0){
    echo "<div class='Container'>";
    echo "<div class='alert alert-success'>";
    echo "<strong>$count Students Data Recorded!</strong> Back to  <a href='SelectElective.php' class='alert-link'>Assign Page</a>.";
    echo "</div>";
  }
  $conn->close();
}
?>
</div>
   

    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    

</body>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
var student = document.getElementsByName("student[]");
var i;
function selectAll(){
    for (i = 0; i < student.length; i++) {
        if (!student[i].checked) {
            student[i].checked=true;
        }
    }
}
function removeAll(){
    for (i = 0; i < student.length; i++) {
        if (student[i].checked) {
            student[i].checked=false;
        }
    }
}
function validate(){
  var p=0,total=0;
  var result="";
  for (i = 0; i < student.length; i++) {
    if (student[i].checked) {
      p++;
    }
    total++;
  }
  if(p==0){
    window.alert("Please Select Atleast One Student.");
    return false;
  }
  var message="Total "+p+"/"+total+" students are selected for the elective."; 
  return confirm(message);
}
</script>
