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
<body onload='automaticDate()'>
<div class='container' id="hdl">
<form action="HourReport.php" method="POST" onsubmit="return validate()">
  <h5><strong>Daily Wise Report :</strong></h5>
<div class="form-group">
    <label for='year'>Select Year :</label>
    <select class="form-control" id='year' name='year'>
        <option selected disabled value='0' >Select Year</option>
        <option value='1'>First Year</option>
        <option value='2'>Second Year</option>
        <option value='3'>Third Year</option>
        <option value='4'>Fourth Year</option>
    </select>
 </div>
 <div class="form-group"> <!-- Div to display hours started-->
<label for="dateofattendance">Today's Attendance(month/date/year):  </label>
    <input type="date" name="dateofattendance" id="dateofattendance" required >
</div>
<button type="submit" class="btn btn-primary">Get Report</button>
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