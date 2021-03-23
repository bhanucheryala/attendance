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


<div class="container" id="monbrn">
    <form action="branch_wise_monthly.php" method="post">
           <h5>Monthly Branch wise Data :</h5>

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

