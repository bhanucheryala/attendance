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
<body onload='automaticDate()'>
<div class="container" id="wekbrn">
    <form action="branch_wise_weekly.php" method="post">
       <h5>Weekly Branch wise Data :</h5>
       <div class="form-group">
      <label for="from_date">Enter date(From):</label>
      <input type="date" id="from_date" name="fromdate"  class="form-control" >
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

