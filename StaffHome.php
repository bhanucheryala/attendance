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
?>


     <?php
        if ($result->num_rows > 0) {
        ?>
        <div class="container" id="ssub">
  <h4>Your Subjects:</h4>    
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Subject</th>
        <th>Year</th>
        <th>Section</th>
        <th>Department</th>
      </tr>
    </thead>
    <tbody>
<?php
          $i=1;
          while($row = $result->fetch_assoc()) {
              $option="option".$i++;
              $subject=$option."subject";
              $year=$option."year";
              $section=$option."section";
              $department=$option."department";
              echo "<tr>";
              echo "<td><div class='form-group'>";
              echo "<input type='text' class='form-control-plaintext' value='".$row["staff_subject"]."' name='$subject' readonly>";
              echo "</div></td>";
              echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='".$row["staff_year"]."' name='$year' readonly></div></td>";
              echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='".strtoupper($row["staff_section"])."' name='$section' readonly></div></td>";
              echo "<td><div class='form-group'><input type='text' class='form-control-plaintext' value='".strtoupper($row["staff_department"])."' name='$department' readonly></div></td>";
              echo "</tr>";
          }
        } 
        else {
          echo "<div class='alert alert-danger'>";
          echo "<strong>No Subjects Found.</strong> Please contact your HOD to update your Subjects.</div>";
          exit();
        }
      ?>
    </tbody>
  </table>
  
</div>  

    </div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->


    

   </body>

</html>