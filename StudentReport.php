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

<!doctype html>

<?php
if(!$_POST){
  $conn = new mysqli('localhost','root','','authority');
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $department=$_SESSION["hod_department"];
  $sql = "SELECT year1,year2,year3,year4,number_of_hours_per_day from department_info where department_name='".$department."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $i=0;  
    $row = $result->fetch_assoc();
    $no_of_sections[$i++]= (int)$row["year1"];
    $no_of_sections[$i++]= (int)$row["year2"];
    $no_of_sections[$i++]= (int)$row["year3"];
    $no_of_sections[$i++]= (int)$row["year4"];
    $number_of_hours_per_day=(int)$row['number_of_hours_per_day'];
          
  } 
  else {
      echo "<div class='alert alert-danger' role='alert'>
        <h5>Department Info is missing.</h5>
    </div>";
      exit();
  }

  $conn = new mysqli('localhost','root','',$_SESSION["hod_department"]);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
?>


<div class='container' id="selele">
  
<form  method="POST" action="StudentAbsentList.php" onsubmit="return validate()">
  <h5><strong>Students Attendence Report:</strong></h5>
<div class="form-group">
    <label for='year'>Select Year :</label>
    <select class="form-control" id='year' name='year' onchange="changeDisplay()">
        <option selected disabled value='0' >Select Year</option>
        <option value='1'>First Year</option>
        <option value='2'>Second Year</option>
        <option value='3'>Third Year</option>
        <option value='4'>Fourth Year</option>
    </select>
 </div>
 <div class="form-group" id="year1" style="display:none">
  <label for="section1">Select Section:</label>
  <select class="form-control" id="section1" name="section1">
    <?php
      for($j=0;$j<$no_of_sections[0];$j++){ 
        $section=chr(65+$j);
        echo "<option value='$section'>$section</option>";
      }
    ?>
  </select>
</div> 
<div class="form-group" id="year2" style="display:none">
  <label for="section2">Select Section:</label>
  <select class="form-control" id="section2" name="section2">
    <?php
      for($j=0;$j<$no_of_sections[1];$j++){ 
        $section=chr(65+$j);
        echo "<option value='$section'>$section</option>";
      }
    ?>
  </select>
</div>
<div class="form-group" id="year3" style="display:none">
  <label for="section3">Select Section:</label>
  <select class="form-control" id="section3" name="section3">
    <?php
      for($j=0;$j<$no_of_sections[2];$j++){ 
        $section=chr(65+$j);
        echo "<option value='$section'>$section</option>";
      }
    ?>
  </select>
</div>
<div class="form-group" id="year4" style="display:none">
  <label for="section4">Select Section:</label>
  <select class="form-control" id="section4" name="section4">
    <?php
      for($j=0;$j<$no_of_sections[3];$j++){ 
        $section=chr(65+$j);
        echo "<option value='$section'>$section</option>";
      }
    ?>
  </select>
</div>
<div class="form-group">
      <label for="student_id">Enter Student ID:</label>
      <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Student Id">
    </div>
<button type="submit" name="submit" class="btn btn-primary">Get Student Data</button>
</form></div>


</div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->



</body>

</html>

<?php
}
?>
<script>
  function changeDisplay(){
    var year=document.getElementById("year").value;
    var div_id_to_be_shown="year"+year;
    var elective_id_to_be_shown="year"+year+"_elective";
    document.getElementById("year1").style.display="none";
    document.getElementById("year2").style.display="none";
    document.getElementById("year3").style.display="none";
    document.getElementById("year4").style.display="none";
    document.getElementById(div_id_to_be_shown).style.display="block";
    document.getElementById(elective_id_to_be_shown).style.display="block";
  }
  function validate(){
    var year=document.getElementById("year").value;
    if(year==0){
      window.alert("Please Select a Year");
      return  false;
    }
    return true;
  }
</script>