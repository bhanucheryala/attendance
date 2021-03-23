<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
else
    include("HodHeader1.php");
?>

<?php
if(!$_POST){
?>

<div class='container' id="chstdt1">
    <h5><strong>Change Student Info :</strong></h5>
<form  method="POST" onsubmit="return validate()" target="_blank">
<div class="form-group">
    <br>
    <label for='year'>Select Year :</label>
    <select class="form-control" id='year' name='year' >
        <option selected disabled value='0' >Select Year</option>
        <option value='1'>First Year</option>
        <option value='2'>Second Year</option>
        <option value='3'>Third Year</option>
        <option value='4'>Fourth Year</option>
    </select>
</div>
<p><strong>Search for Student ID or Student Name</strong></p>
<div class="form-group">
      <label for="student_id">Enter Student ID:</label>
      <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Student Id">
    </div>
    <div class="form-group">
      <label for="student_name">Enter Student Name:</label>
      <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Student Full Name">
    </div>
<button type="submit" class="btn btn-primary">Get Student Data</button>
</form></div>




</div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->


   

</body>

<script>
  function validate(){
    var year=document.getElementById("year").value;
    if(year==0){
      window.alert("Please Select a Year");
      return  false;
    }
    if(document.getElementById("student_name").value=="" && document.getElementById("student_id").value==""){
        window.alert("Please enter Student ID or Student Name");
        return false;
    }
    if(document.getElementById("student_id").value!="")
        if(document.getElementById("student_id").value.length!=10){
            window.alert("Student ID must have 10 alphanumeric values");
            return false;
        }
    return true;
  }
</script>
<?php
}
?>
<div class="chstd">
<?php
if($_POST){
    $year=$_POST["year"];
    $_SESSION["year"]=$year;
    $student_id=$_POST["student_id"];
    $student_name=$_POST["student_name"];
    $tablename="year".$year."_student_info";
    $sql="select student_id,student_name,student_section,student_phone from $tablename where ";    
    $sql.="student_id='$student_id' OR student_name='$student_name'";
    $conn = new mysqli("localhost", "root", "", $_SESSION["hod_department"]);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $i=1;
        $_SESSION["number_of_rows"]=mysqli_num_rows ( $result );
        echo "<div class='container' id='chstdp2'><h5>No.of Students Found:".mysqli_num_rows ( $result )."</h5><p>Student ID and Student Section are not Editable.</p>";
        echo "<form method='POST' action='UpdateStudentInfo.php'  onsubmit='return validateFields()' >";
        echo "<table class='table table-bordered'><thead>";
        echo "<th>Student ID</th><th>Student Name</th><th>Student Section</th><th>Contact Info</th></tr></thead>";
        echo "<tbody><tr>";
        while($row = $result->fetch_assoc()) {
            $student_name="student_name".$i;
            $student_number="student_phone".$i;
            $student_id="student_id".$i;
            echo "<div class='form-group'><td><input type='text'  name='$student_id' readonly style='text-transform: uppercase'class='form-control-plaintext' value='".$row["student_id"]."' name='$year'></td></div>";
            echo "<div class='form-group'><td><input type='text' id='$student_name' name='$student_name' style='text-transform: uppercase'class='form-control' value='".$row["student_name"]."' name='$year'></td></div>";
            echo "<div class='form-group'><td><input type='text' style='text-transform: uppercase' class='form-control-plaintext' value='".$row["student_section"]."'  readonly></td></div>";
            echo "<div class='form-group'><td><input type='number' id='$student_number' name='$student_number' class='form-control' value='".$row["student_phone"]."' name='$year'></td></div>";
            $i++;
        }
        echo "</tr></tbody></table>";
        echo "<button type='submit' class='btn btn-primary' name='submit1'>Update Student Data</button>";
        echo "</form></div>";
    }
    else{
        if($student_name=="")
            echo "<h4>No data Found matching Student ID:$student_id</h4>";
        else if($student_id=="")
            echo "<h4>No data Found matching Student Name:$student_name</h4>";
        else    
            echo "<h4>No data Found matching Student ID:$student_id or Student Name:$student_name</h4>";
        echo "<p>Please contact Admin or Select another student <a href='ChangeStudentData.php'>here</a>.</p>";
        exit();
    }
}
?>
</div>
<script>
function validateFields(){
    var number_of_rows=parseInt('<?php echo $_SESSION["number_of_rows"];?>');
    for(var i=1;i<=number_of_rows;i++){
        var student_name=document.getElementById("student_name"+i).value;
        var student_phone=document.getElementById("student_phone"+i).value;
        if(student_name==""){
            window.alert("Student name can\'t be Null");
            return false;
        }
        if(student_phone==""){
            window.alert("Student phone can\'t be Null");
            return false;
        }
        if(student_phone.length!=10){
            window.alert("Student phone number must conatin 10 digits");
            return false;
        }
    }
}    
</script>

</html>

