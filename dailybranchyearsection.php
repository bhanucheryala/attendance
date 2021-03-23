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

<div class="container" id="prisel">
    <form action="branch_year_section_wise.php" method="post">
        <h5>Daily Branch Section wise Data :</h5>
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
    
    <div class="form-group"> <!-- Div to display hours started-->
      <label for="dateofattendance">Date (month/date/year):  </label>
      <input type="date" name="dateofattendance" id="dateofattendance" required >
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
  document.getElementById("dateofattendance").value = date;
}
function validate(){
    if(document.getElementById("year").value=="0"){
        window.alert("Please Select a year.");
        return false;
    }
    return true; 
}
</script>
