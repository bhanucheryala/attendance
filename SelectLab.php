<?php
  session_start();
  error_reporting(E_ERROR);
  $department=$_SESSION["hod_department"];
  if( !isset($_SESSION["hod_email"]) ){
    header("location:HODLogin.php");
    exit();
  }
  else
      include("HodHeader1.php");
?>
  <body>
  <div class="container" id="prisel" >
    <h4>Assign Batches for Labs:</h4>   
    <form method="POST" onsubmit="return validate()">
    <div class="form-group">
      <label for="year">Select Year: </label>
      <select class="form-control" id="year" name="year">
      <option value='0' selected>Select Year</option>
        <option value='1'>First Year</option>
        <option value='2'>Second Year</option>
        <option value='3'>Third Year</option>
        <option value='4'>Fourth Year</option>
      </select> 
    </div>
    <div class="form-group">
      <label for="section">Select Section: </label>
      <select class="form-control" id="section" name="section">
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
      </select> 
    </div>
    <button type="submit" name="class_info_input" class="btn btn-primary">Get Student Data</button>
    </form>
  </div>
</body>
<script>
function validate(){
    var year=document.getElementById("year").value;
    var section=document.getElementById("section").value;
    if(year=="0"){
        window.alert("Please select a Year.");
        return false;
    }
    return true;
}
</script>
<?php
  if(isset($_POST["class_info_input"])){
    $conn = new mysqli("localhost", "root", "", "authority");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $tablename="department_info";
    $year=$_POST["year"];
    $section=$_POST["section"];
    $department=$_SESSION["hod_department"];
    
    //To check whether the section exists or not
    $sql = "SELECT `year".$year."`,number_of_hours_per_day from $tablename where `department_name`='$department'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           $section_limit=(int)$row["year".$year];
           $number_of_hours_per_day=(int)$row["number_of_hours_per_day"];
        }
    } else {
        echo "<h4>Department Info not found.</h4>";
        exit();
    }
    if((ord($section))>(64+$section_limit)){
        if($section_limit==1)
            echo "<script type='text/javascript'>window.alert('$department has only $section_limit section.')</script>";
        else
            echo "<script type='text/javascript'>window.alert('$department has only $section_limit sections.')</script>";
        exit();
    }
    //echo "<script></script>";
    $_SESSION["year"]=$year;
    $_SESSION["section"]=$section;
    echo "<script>document.getElementById('prisel').style.display='none';</script>";
    $conn = new mysqli("localhost", "root", "", $department);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $tablename="year".$year."_student_info";
    $sql = "SELECT * FROM `$tablename` WHERE `student_section`='$section'";
  ?>
  <div class="container" id="attp">
  <p><strong>Students who are selected will be assigned to Batch:1</strong></p> 
  <p><strong>Students who are not selected will be assigned to Batch:2</strong></p> 
  <p >Search for Student ID or  Student name:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">       
  <form onsubmit="return getConfirmation()" method="POST" action="UpdateLabBatch.php">
  <input type="text" name="total_count" style="display:none;" id="total_count" value="">
  <table class='table table-borderless'>
  <tbody><tr>
  <td><button type='button' class='btn btn-primary' onclick='selectAll()'>Select All</button></td>
  <td><button type='button' class='btn btn-danger' onclick='removeAll()'>Remove All</button></td>
  <td><button type='submit' class='btn btn-success' name='student_batch'>Submit</button></td>
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
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr><td><div class='form-check'>";
      echo "<label class='form-check-label' for='".$row["student_id"]."'>";
      echo "<input type='checkbox' class='form-check-input' id='".$row["student_id"]."' name='student[]' value='".$row["student_id"]."'>".$row["student_id"]."</label></td>";
      echo "<td>".$row["student_name"]."</td>";
      echo "</div>";
      echo "<tr>";    
    }
    echo "</tbody></table>";
    echo "<table class='table table-borderless'>";
    echo "<tbody><tr>";
    echo "<td><button type='button' class='btn btn-primary' onclick='selectAll()'>Select All</button></td>";
    echo "<td><button type='button' class='btn btn-danger' onclick='removeAll()'>Remove All</button></td>";
    echo "<td><button type='submit' class='btn btn-success' name='student_batch'>Submit</button></td>";
    echo "</tr></tbody>";
  } 
  else {
    echo "<p>No Data found.Please Select Year once again <a href='SelectLab.php'>here.</a>";
    exit();
  }
?>
</tbody></table></div></form>
<?php
  }
?>
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
  return confirm(p+" students are selected for Batch1.\n"+(total-p)+" students are slected for Batch:2\nAre you sure you want to Submit?");
}
</script>