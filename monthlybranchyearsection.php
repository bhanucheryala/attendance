<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["p_email"]) ){
  header("location:Principallogin.php");
  exit();
}
else{
    include "principalsidenav.php";
}

?>


<div class="container" id="monsec">
    <form action="branch_year_section_wise_monthly.php" method="post">
            <h5>Monthly Branch  Section wise Data :</h5>

     <div class="form-group">
      <label for="department">Select Department: </label>
      <select class="form-control" id="department" name="department">
      <option value='sd' selected>Select Department</option>
        <option value='CSE'>CSE</option>
        <option value="ECE">ECE</option>
        <option value='EEE'>EEE</option>
        <option value='IT'>IT</option>
        <option value='MECH'>MECH</option>
        <option value='CIVIL'>CIVIL</option>
        <option value='MBA'>MBA</option>
      </select> 
    </div>
       
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
      <label for="number_of_hours">Select Hour:</label>
      <input type="number" class="form-control" name="hour" min='1' required placeholder="Select Hour">
    </div>
    
          <input type="submit" value="GET DATA">
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

