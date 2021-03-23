<?php
session_start();
error_reporting(E_ERROR);
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
  <form method="POST">       
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
                echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='-------' readonly></div></td>";
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
  <div class="form-group">
    <label for="hour">Hour:</label>
    <input type="number" class="form-control" id="hour" min='1' max='<?php echo $number_of_hours_per_day; ?>' name="hour" required placeholder="Period">
  </div>
  <div class="form-group" style="display:none"  > <!-- Div to display  style="display:none"  readonlyhours started-->
    <label for="date_of_attendance">Today's Attendance(mm/dd/yy): </label>
        <input type="date"  name="date_of_attendance" id="date_of_attendance" readonly >
  </div>
  <button type="submit" formaction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="btn btn-primary" name="submit1">Repeat Attendance</button>
  <button type="submit" formaction="Attendance.php" class="btn btn-primary" name="submit2">Get Student Data</button>
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
<?php
  if(isset($_POST["submit1"])){
    $option=$_POST["option"];
    $department=$_POST[$option."department"];
    $start_hour=(int)$_POST["hour"];
    $subject_name=$_POST[$option."subject"];
    $year=$_POST[$option."year"];
    $date_of_attendance=$_POST["date_of_attendance"];
    $section=$_POST[$option."section"];
    $number_of_hours_per_day=$_SESSION["number_of_hours_per_day"];
    
    //Check if hour>1 or not
    if($start_hour==1){
      echo "<script>window.alert('Please select an hour greater than 1.')</script>";
      exit();
    }
    $conn = new mysqli("localhost", "root", "", $department);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
    //Check whether the attendance for that hour is already taken or not
    $tablename = "year".$year."_hourwise";
    $sql="select `hour_subject` from $tablename where `hour_year`='$year' and `hour_section`='$section' and  `date`='$date_of_attendance' and `hour`='$start_hour' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<script>window.alert('Hour$start_hour attendance is already taken by ".$row["hour_subject"]." faculty')</script>";
      exit();
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
    if($number_of_hours_assigned>1){
      echo "<script>window.alert('Selected subject Attendance cannot be repeated.')</script>"; //later
      exit();
    }

    //Check whether we have attendance for previous hour or not
    $tablename="year".$year."_hourwise";
    $sql="select hour_count from $tablename where hour_year='$year' and hour_section='$section' and hour='".($start_hour-1)."' and hour_subject='$subject_name' and `date`='$date_of_attendance'";
    ;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $total_count = $row["hour_count"];
    }
    else {
      echo "<script>window.alert('No data found for Hour:$start_hour for the subject: $subject_name.')</script>"; 
      exit();
    }

    $count=0;
    //update subject_info
    $tablename="year".$year."_subject_info";
    $sql="UPDATE $tablename set `$section`=`$section`+1 where `subject_name`='$subject_name'";
    if ($conn->query($sql) === TRUE) {
      $count++;
    } else {
      echo "Error updating record: " . $conn->error;
      exit();
    }

    //update daily attendance
    $tablename="year".$year."_daily_attendance";
    $previous_hour="hour".($start_hour-1);
    $current_hour="hour".$start_hour;
    $sql="UPDATE $tablename set `$current_hour`=`$previous_hour` where `student_section`='$section'";
    if ($conn->query($sql) === TRUE) {
      $count++;
    } else {
      echo "Error updating record: " . $conn->error;
      exit();
    }

    //insert into hourwise
    $tablename="year".$year."_hourwise";
    $sql = "insert into $tablename(hour_year,hour_section,hour,hour_subject,`subject_type`,`date`,hour_count) values ('$year','$section','$start_hour','$subject_name','$subject_type','$date_of_attendance','$total_count')";
    if ($conn->query($sql) === TRUE) {
      $count++;
    } 
    else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //update total attendance
    $tablename="year".$year."_total_attendance";
    $subquery_tablename="year".$year."_daily_attendance";
    $sql="UPDATE $tablename set `$subject_name`=`$subject_name`+1 where student_id NOT IN (select student_id from $subquery_tablename where `date`='$date_of_attendance' and `$previous_hour`='0' and `student_section`='$section')";
    if ($conn->query($sql) === TRUE) {
      $count++;
    } else {
      echo "Error updating record: " . $conn->error;
      exit();
    }
    if($count==4){
      echo "<script>window.alert('Success')</script>";
    }
    $conn->close();
  }
?>