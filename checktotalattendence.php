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
<body onload="changeDisplay()">
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
      echo "<h4>Department Info is missing.</h4>";
      exit();
  }
?>

<div class="container" id="chktotatd">
<div class="alert alert-success" role="alert">
  <p>Check Total Attendance <strong><a href='TotalAttendance.php'>here</a></strong>.</p>
</div>
  
  <h5><strong>Check Attendance :</strong></h5><br>
  <form action="monthlyattendence.php" method="POST">
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
 <div class="form-group" id="year1" name="ysection" style="display:none">
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
<div class="form-group" id="year2" name="ysection" style="display:none">
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
<div class="form-group" id="year4"  name ="ysection" style="display:none">
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
      <label for="from_date">Enter date(From):</label>
      <input type="date" id="from_date" name="fromdate" class="form-control" >
    </div>
    <div class="form-group">
      <label for="to_date">Enter date(To):</label>
      <input type="date" id="to_date" name="todate" class="form-control">
    </div>
    <div class="form-group"  >
  <label for="batch">Select Batch:</label>
  <select class="form-control" id="batch" name="batch">
    <option value='0'>Select Batch</option>
    <option value='Batch1'>Batch1</option>
    <option value='Batch2'>Batch2</option>
  </select>
</div>
    <button type="submit" class="btn btn-primary">Get Attendance</button>
  </form>
</div>

<!--content-->



    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->

</body>
<script>
  function changeDisplay(){
    var year=document.getElementById("year").value;
    var div_id_to_be_shown="year"+year;
    document.getElementById("year1").style.display="none";
    document.getElementById("year2").style.display="none";
    document.getElementById("year3").style.display="none";
    document.getElementById("year4").style.display="none";
    document.getElementById(div_id_to_be_shown).style.display="block";
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
<?php
}
?>


</html>

