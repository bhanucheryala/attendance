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

<div class="container" id="hsub">
  <h5>Update Subjects:</h5>
  <div class="alert alert-info">
    <strong>Note:</strong> Updating subject data will delete the previous subject data of that year
  </div>
  <form action="InputSubjects.php" onsubmit='return validate()' method="POST" >
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
      <label for="number_of_hours">No.of hours per day:</label>
      <input type="number" class="form-control" id="number_of_hours" name="number_of_hours" min='1' required placeholder="No.of hours per day">
    </div>
    <div class="form-group">
      <label for="number_of_core_subjects">No.of Core Subjects:</label>
      <input type="number" class="form-control" id="number_of_core_subjects" name="number_of_core_subjects" min='1' required placeholder="No.of Core Subjects">
    </div>
    <div class="form-group">
      <label for="number_of_labs">No.of Labs </label>
      <input type="number" class="form-control" id="number_of_labs" name="number_of_labs" min='0' value='0' required placeholder="No.of Labs">
    </div>
    <div class="form-group">
      <label for="number_of_professional_electives">No.of Professional Electives:</label>
      <input type="number" class="form-control" id="number_of_professional_electives" name="number_of_professional_electives" min='0' value='0' placeholder="No.of Professional Electives">
    </div>
    <div class="form-group">
      <label for="number_of_open_electives">No.of Open Electives:</label>
      <input type="number" class="form-control" id="number_of_open_electives"  name="number_of_open_electives" min='0' placeholder="No.of Open Electives" value='0'>
    </div> 
    <div class="form-group">
      <label for="number_of_other_subjects">Others(Dashboard,Soft Skills,Technical Seminars,etc):</label>
      <input type="number" class="form-control" id="number_of_other_subjects" name="number_of_other_subjects" min='0' value='0'>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


    </div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->


</body>

</html>
<script>
function validate(){
  if(document.getElementById("year").value==0){
      window.alert("Please select a year.");
      return false;
  }
  return true;
}  
</script>