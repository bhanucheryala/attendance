<?php
session_start();
if( !isset($_SESSION["p_email"]) ){
  header("location:Principallogin.php");
  exit();
}
else{
    include "principalsidenav.php";
}

?>
<body onload='automaticDate()'>

<div class="container" id="weksect">
    <form action="branch_year_section_wise_weekly.php" method="post">
    <h5>Weekly Branch Year wise Data :</h5>

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
      <label for="from_date">Enter date(From):</label>
      <input type="date" id="from_date" name="fromdate" class="form-control" >
    </div>
    <div class="form-group">
      <label for="to_date">Enter date(To):</label>
      <input type="date" id="to_date" name="todate" class="form-control">
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
<script>
function automaticDate() {
  document.getElementById("from_date").value ="<?php echo date("Y-m");?>-01";
document.getElementById("to_date").value ="<?php echo date("Y-m-d");?>";
}
</script>

