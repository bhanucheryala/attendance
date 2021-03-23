<?php
session_start();
if(!$_SESSION["staff_id"]){
  echo "<script>window.alert('Please Login');</script>";
  header('Location: StaffLogin.php');
}
else
include("StaffHeader.php");

$conn = mysqli_connect("localhost", "root", "", "authority") or die("mysql_error()");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$sql="select number_of_hours_per_day from department_info where `department_name`='CSE'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc())
    $number_of_hours_per_day=$row["number_of_hours_per_day"];
    $_SESSION["number_of_hours_per_day"]=$number_of_hours_per_day;
}
$sql="SELECT * from staff_subjects where `staff_id`='".$_SESSION["staff_id"]."'";
$result = $conn->query($sql);
//"automaticDate()"
?>


     <?php
        if ($result->num_rows > 0) {
          
        ?>
        <body onload="automaticDate()">
        <div class="container" id="ssub">
  <h4>Your Subjects:</h4>
  <?php 
    echo "<br><br><Strong>DATE: </strong>";
    echo date("d/m/Y");
  ?>
  <p>Select an option to give attendance to that respective class.</p>     
  <form method="POST" action="StaffRegister.php" target=_BLANK>       
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Select One</th>
        <th>Subject</th>
        <th>Batch</th>
        <th>Year</th>
        <th>Section</th>
        <th>Department</th>
      </tr>
    </thead>
    <tbody>
<?php
          $i=1;
          while($row = $result->fetch_assoc()) {
            $staff_subject_connection = new mysqli("localhost", "root", "", $row["staff_department"]);
            if ($conn->connect_error) {
              //die("Connection failed: " . $conn->connect_error);
            }
            $tablename="year".$row["staff_year"]."_subject_info";
            $staff_subject_type_sql="select subject_type from $tablename where subject_name='".$row["staff_subject"]."' limit 1";
            $result1 = $staff_subject_connection->query($staff_subject_type_sql);
            if ($result1->num_rows > 0) {
              $row1 = $result1->fetch_assoc();
              if($row1["subject_type"]=='L'){
                for($j=1;$j<=2;$j++){
                  $option="option".$i++;
                  $subject=$option."subject";
                  $year=$option."year";
                  $section=$option."section";
                  $department=$option."department";
                  $batch=$option."batch";
                  echo "<tr><td><div class='form-check'>";
                  echo "<input type='radio' name='option' value='$option' class='form-check-input' required>";
                  echo "</div></td>";
                  echo "<td><div class='form-group'>";
                  echo "<input type='text' class='form-control-plaintext' value='".$row["staff_subject"]."' name='$subject' readonly>";
                  echo "</div></td>";
                  echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='Batch$j' name='$batch' readonly></div></td>";
                  echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='".$row["staff_year"]."' name='$year' readonly></div></td>";
                  echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='".strtoupper($row["staff_section"])."' name='$section' readonly></div></td>";
                  echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='".strtoupper($row["staff_department"])."' name='$department' readonly></div></td>";
                  echo "</tr>";
                }
              }
              else{
                $option="option".$i++;
                $batch=$option."batch";
                $subject=$option."subject";
                $year=$option."year";
                $section=$option."section";
                $department=$option."department";
                echo "<tr><td><div class='form-check'>";
                echo "<input type='radio' name='option' value='$option' class='form-check-input' required>";
                echo "</div></td>";
                echo "<td><div class='form-group'>";
                echo "<input type='text' class='form-control-plaintext' value='".$row["staff_subject"]."' name='$subject' readonly>";
                echo "</div></td>";
                echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='-' name='$batch' readonly></div></td>";
                echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='".$row["staff_year"]."' name='$year' readonly></div></td>";
                echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='".strtoupper($row["staff_section"])."' name='$section' readonly></div></td>";
                echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='".strtoupper($row["staff_department"])."' name='$department' readonly></div></td>";
                echo "</tr>";
              }  
            }
          }
          $staff_subject_connection->close();
        } 
        else {
          echo "<div class='alert alert-danger'>";
          echo "<strong>No Subjects Found.</strong> Please contact your HOD to update your Subjects.</div>";
          exit();
        }
      ?>
    </tbody>
  </table>

  <button type="submit" class="btn btn-primary" name="submit2">Get Register</button>
  </form>
</div>  

    </div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->


    

   </body>
<script>
function automaticDate() {
  var today = new Date();
  var date = today.getFullYear();
  if((today.getMonth()+1)<10)
    date=date+"-0"+(today.getMonth()+1);
  else
    date=date+"-"+(today.getMonth()+1);
  if((today.getDate())<10)
    date=date+"-0"+today.getDate();
  else
    date=date+"-"+today.getDate();
  document.getElementById("date_of_attendance").value = date;
}
</script>
</html>