<?php
session_start();
error_reporting(E_ERROR);
if(!$_SESSION["staff_id"]){
  echo "<script>window.alert('Please Login');</script>";
  header('Location: StaffLogin.php');
}
else{
  include("StaffHeader.php");
}
?>
<?php
if(isset($_POST["submit2"])){
  $option=$_POST["option"];
  $department=$_POST[$option."department"];
  $start_hour=$_POST["hour"];
  $subject_name=$_POST[$option."subject"];
  $year=$_POST[$option."year"];
  $date_of_attendance=date('Y-m-d');
  $section=$_POST[$option."section"];
  $batch=$_POST[$option."batch"];
  $number_of_hours_per_day=$_SESSION["number_of_hours_per_day"];
  $conn = new mysqli("localhost", "root", "", $department);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //Number of hours associated to that subject
  $tablename = "year".$year."_subject_info";
  $sql="select `number_of_hours_assigned`,`subject_type` from $tablename where `subject_name`='$subject_name'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $number_of_hours_assigned = (int)$row["number_of_hours_assigned"];
    $subject_type=$row["subject_type"];
  }
  else {
    echo "<h4>$tablename data is missing</h4>"; 
    echo "<p>Please Select Hour once again <a href='SelectSubject.php'>here.</a>";
    exit();
  }

  //Check Whether it exceeds the daily limit or not
  if(($start_hour+$number_of_hours_assigned-1)>$number_of_hours_per_day){
    echo "<div class='container'><h4>The attendance for the Hour:".($start_hour+$number_of_hours_assigned-1)." exceeds the daily Hour Limit:$number_of_hours_per_day</h4>";
    echo "<p>Please Select Hour once again <a href='SelectSubject.php'>here.</a>";
    exit();
  }

  //Check whether the attendance for that hour is already taken or not
  $tablename = "year".$year."_hourwise";
  $sql="select `hour_subject`,`hour`,`subject_type`,`batch` from $tablename where `hour_year`='$year' and `hour_section`='$section' and  `date`='$date_of_attendance' and ( `hour`='$start_hour' ";
  for($i=$start_hour+1;$i<($start_hour+$number_of_hours_assigned);$i++)
    $sql.=" OR `hour`='$i'";
  $sql.=")";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if(($subject_type=='L' && $batch==$row["batch"]) || $subject_name==$row["hour_subject"]){
      echo "<div class='container' id='atlnk'>";
      echo "<h4>$batch attendance is already taken.Here are the details:";
      echo "<div class='alert alert-danger'>";
      echo "<p>Hour: ".$row["hour"]." is taken by <strong>".$row["hour_subject"]." faculty </strong></p>";
      echo "</div>";
      echo "<p>Please Select Hour once again <a href='SelectSubject.php'>here.</a>";
      exit();
    }
    if($subject_type!='L')
    if(($subject_type!='P' && $subject_type !='O' ) || $row["subject_type"]!=$subject_type || $row["hour_subject"]==$subject_name ){
      echo "<div class='container' id='atlnk'>";
      echo "<h4>Attendance is already taken.Here are the details:";
      echo "<div class='alert alert-danger'>";
      echo "<p>Hour: ".$row["hour"]." is taken by <strong>".$row["hour_subject"]." faculty </strong></p>";
      echo "</div>";
      while($row=$result->fetch_assoc()){
        echo "<div class='alert alert-danger'>";
        echo "Hour: ".$row["hour"]." is taken by <strong> ".$row["hour_subject"]." faculty</strong>";
        echo "</div>";
      }
        
      echo "<p>Please Select Hour once again <a href='SelectSubject.php'>here.</a>";
      exit();
    }
  }
  
  //After successfull validation we create sessions
  $_SESSION["subject_department"]=$department;
  $_SESSION["section"]=$section;
  $_SESSION["year"]=$year;
  $_SESSION["subject_type"]=$subject_type;
  $_SESSION["number_of_hours_assigned"]=$number_of_hours_assigned;
  $_SESSION["subject_name"]=$subject_name;
  $_SESSION["date_of_attendance"]=$date_of_attendance;
  $_SESSION["hour"]=$start_hour;
  $_SESSION["batch"]=$batch;
?>


  
<div class="container" id="attp">
  <p><strong>Selected Student Will Get Attendance</strong></p> 
  <p >Search for Student ID or  Student name:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">       
  <form onsubmit="return getConfirmation()" method="POST" action="UpdateAttendance.php">
  <input type="text" name="total_count" style="display:none;" id="total_count" value="">
  <table class='table table-borderless'>
  <tbody><tr>
  <td><button type='button' class='btn btn-primary' onclick='selectAll()'>Select All</button></td>
  <td><button type='button' class='btn btn-danger' onclick='removeAll()'>Remove All</button></td>
  <td><button type='submit' class='btn btn-success' name='submit'>Submit</button></td>
  </tr></tbody>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Hall Ticket Number</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody id="myTable">
<?php
  //Extract Student Data
  $tablename="year".$year."_student_info";
  if($subject_type=='P'){
    $sql = "SELECT student_id,student_name FROM $tablename where `student_section`='$section' and `professional_elective`='$subject_name';";
  }
  else if ($subject_type=='O'){
    $sql = "SELECT student_id,student_name FROM $tablename where `student_section`='$section' and `open_elective`='$subject_name';";
  }
  else if($subject_type=='L'){
    $sql = "SELECT student_id,student_name FROM $tablename where `student_section`='$section' and `Lab`='$batch';";
  }
  else{
    $sql = "SELECT student_id,student_name FROM $tablename where `student_section`='$section';";
  }
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr><td><div class='form-check'>";
      echo "<label class='form-check-label' for='".$row["student_id"]."'>";
      echo "<input type='checkbox' class='form-check-input' id='".$row["student_id"]."' name='student[]' value='".$row["student_id"].",".$row["student_name"]."' >".$row["student_id"]."</label></td>";
      echo "<td>".$row["student_name"]."</td>";
      echo "</div>";
      echo "<tr>";    
    }
    echo "</tbody></table>";
    echo "<table class='table table-borderless'>";
    echo "<tbody><tr>";
    echo "<td><button type='button' class='btn btn-primary' onclick='selectAll()'>Select All</button></td>";
    echo "<td><button type='button' class='btn btn-danger' onclick='removeAll()'>Remove All</button></td>";
    echo "<td><button type='submit' class='btn btn-success' name='submit'>Submit</button></td>";
    echo "</tr></tbody>";
  } 
  else {
    if($batch=="Batch1" || $batch=="Batch2"){
      echo "<h4>Year $year student data is not available or the lab batch: $batch is not assigned.</h4>";
    }
    else
      echo "<h4>Year $year student data is not available or the electives are not yet assigned.</h4>";
    echo "<p>Please Select Year once again <a href='SelectSubject.php'>here.</a>";
  }
?>
</tbody></table></div></form>
<?php 
  $conn->close();
}
?>
    </div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->


    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 


</body>
<script type='text/javascript'>
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
var i=0;
function selectAll(){
  var student = document.getElementsByName("student[]");
  for (i = 0; i < student.length; i++) {
    if (!student[i].checked) {
      student[i].checked=true;
    }
  }
}
function removeAll(){
  var student = document.getElementsByName("student[]");
  for (i = 0; i < student.length; i++) {
    if (student[i].checked) {
        student[i].checked=false;
    }
  }
}
function getConfirmation(){
  var student = document.getElementsByName("student[]");
  var p=0,total=0; 
  for (i = 0; i < student.length; i=i+1){
    if(student[i].checked)
      p++;
    total++;
  }
  document.getElementById("total_count").value=p+"/"+total;
  return confirm("No.of students present: "+p+"/"+total+"\nNo.of studnets Absent:"+(total-p)+"\nAre you sure you want to Submit?");
}
</script>
