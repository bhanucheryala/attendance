<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();

}
else{
  include "HodHeader1.php";
}
?>
<body onload="changeDisplay()">
        <!-- Header-->
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

<div class='container' id="totad">
    <h5><strong>Department: <?php echo $_SESSION["hod_department"];?></strong></h5><br>
<form  method="POST" onsubmit="return validate()">
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
<div class="form-group"  >
  <label for="batch">Select Batch:</label>
  <select class="form-control" id="batch" name="batch">
    <option value='0'>Select Batch</option>
    <option value='Batch1'>Batch1</option>
    <option value='Batch2'>Batch2</option>
  </select>
</div>
<button type="submit" class="btn btn-primary">Get Report</button>
</form></div>

</div>
</div><!-- .content -->
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
      window.alert("Please Select a Year.");
      return  false;
    }
    if(document.getElementById("batch").value==0){
      window.alert("Please Select a Batch.");
      return  false;
    }
    return true;
  }
</script>
<?php
}
?>
<?php

if($_POST){
  static $content = '';
$content .= '
<div>
<img src="mrec.jpeg" alt="logo" height="110" width="750">
</div>
';

  $year=$_POST["year"];
  $section=$_POST["section".$year];
  $batch=$_POST["batch"];
  $conn = new mysqli("localhost", "root", "", $_SESSION["hod_department"]);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  ?>
  
  <?php
  $tablename="year".$year."_subject_info";
  $sql = "SELECT subject_name,subject_type,$section FROM $tablename ORDER BY subject_type";
  $result = $conn->query($sql);
  $tablename="year".$year."_total_attendance";
  $sql="select student_id,student_name";
  if ($result->num_rows > 0) {
    echo "<div class='container' id='totp2'><h5><strong> Date:".date("d-m-Y")."</strong></h5>";
    $content .= '<h4>Department: '.$_SESSION["hod_department"].' Date:'.date("d-m-Y").'</h4>';
    echo "<br><h5><strong>Year: $year Section:$section</strong></h5>";
    $content .= '<h4>Year:'.$year.' Section:'.$section.'</h4>';
    echo "<div class='table-responsive'><table class='table table-bordered table-hover'><thead><tr><th>S.NO</th><th>HT.NO</th><th>Student Name</th>";
    $content .= '<table border="1" cellspacing="0" cellpadding="3" ><tr><th width="4%">S.NO</th><th width="10%">HT.NO</th><th width="15%" >Student Name</th>';
    $i=0;
    $total=0;
    $flag1=0; //PE
    $flag2=0; //OE
    $flag3=0; //Lab
    while($row = $result->fetch_assoc()) {
        echo "<th>".$row["subject_name"]."</th>";
        $content .= '<th width="5%">'.$row["subject_name"].'</th>';
        $subject_name[$i]=$row["subject_name"];
        if($row["subject_type"]=='L'){
          $flag3=1;
          if($batch=="Batch1")
            $number_of_classes_held[$i++]=(int)$row[$section];
          else{
            $temp=explode(",",$row[$section]);
            $number_of_classes_held[$i++]=(int)$temp[1];
          }
        }
        else
          $number_of_classes_held[$i++]=(int)$row[$section];
        $total+=(int)$row[$section];
        if($flag1==1 && $row["subject_type"]=='P')
          $total-=(int)$row[$section];
        if($flag2==1 && $row["subject_type"]=='O')
          $total-=(int)$row[$section];
        if($row["subject_type"]=='P'){
          $flag1=1;
        }
        if($row["subject_type"]=='O'){
          $flag2=1;
        }
        $sql.=",`".$row["subject_name"]."`";
    }
  } else {
    echo "<div class='alert alert-danger' >";
    echo "<strong>Year:$year data not found.</strong>Please Select Another year <a id='tortnodat' class='alert-link' href='TotalAttendance.php'>Here.</a></div>";
      exit();
  }
  echo "<th>Total</th><th rowspan='2'>%</th></tr><tr><th colspan='3'>Number of Classes Held</th>";
  $content .= '<th>Total</th><th rowspan="2">%</th></tr><tr><th colspan="3">Number of Classes Held</th>';
  for($i=0;$i<count($number_of_classes_held);$i++)
  {
    echo "<th>".$number_of_classes_held[$i]."</th>";
    $content .= '<th>'.$number_of_classes_held[$i].'</th>';
  }
  echo "<th>$total</th></tr></thead>";
  $content .= '<th>'.$total.'</th></tr>';
  if($flag3){
    $subquery_tablename="year".$year."_student_info";
    $sql.=" from $tablename where student_section='$section' and student_id IN (select student_id from $subquery_tablename where student_section='$section' and `Lab`='$batch')";
  }
  else
    $sql.=" from $tablename where student_section='$section'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $serial_number=1;
    while($row = $result->fetch_assoc()) {
      $temp1=0; //to store the total hours of students;
      $j=0;
      $content .= '<tr><td>'.$serial_number.'</td><td>'.$row["student_id"].'</td><td>'.$row["student_name"].'</td>';
      echo "<tr><td>".($serial_number++)."</td><td>".$row["student_id"]."</td><td>".$row["student_name"]."</td>";
      
      for($i=0;$i<count($subject_name);$i++){
        if($row[$subject_name[$i]]==-1){
          echo "<td>-</td>";
          $content .= '<td>-</td>';
        }
        else{
          echo "<td>".$row[$subject_name[$i]]."</td>";
          $content .= '<td>'.$row[$subject_name[$i]].'</td>';
          $temp1+=(int)$row[$subject_name[$i]];
        }
        $j++;
      }
      if($total==0)
      {
        echo "<td>$temp1</td><td>0.00</td></tr>";
        $content .= '<td>'.$temp1.'</td><td>0.00</td></tr>';
      }
      else
      {
        echo "<td>$temp1</td><td>".sprintf('%0.2f', ($temp1/$total)*100)."</td></tr>"; 
        $content .= '<td>'.$temp1.'</td><td>'.sprintf("%0.2f", ($temp1/$total)*100).'</td></tr>';
      }
    }
  } else {
    echo "<h4>Year:$year data not found.</h4>";
    exit();
  }
  echo "<tbody></table></div>";
  $content .= '</table>';
  ?>
  <div class="col-md-12" align="right">
<form  action="ppdfgen.php" method="post" target="_blank"> 
<input type='hidden' value='<?php echo $content ?>' name='conte'/>

<input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
</form>  

</div>
  <?php
  function pdf(){
    return $content;
  }

}
?>

</html>