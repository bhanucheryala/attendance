<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
else
    include("HodHeader1.php");
$_SESSION["year"]=$_POST["year"];
$_SESSION["number_of_hours"]=$_POST["number_of_hours"];
$_SESSION["number_of_core_subjects"]=$_POST["number_of_core_subjects"];
$_SESSION["number_of_labs"]=$_POST["number_of_labs"];
$_SESSION["number_of_professional_electives"]=$_POST["number_of_professional_electives"];
$_SESSION["number_of_open_electives"]=$_POST["number_of_open_electives"];
$_SESSION["number_of_other_subjects"]=$_POST["number_of_other_subjects"];
?>


 <div class="alert alert-primary">
      <strong>Note: Two Subjects can't have Same Name</strong> 
 </div>
<body>
<div class="container" id="hins">
 
  <form action="UpdateSubjects.php" method="POST">
    <?php
      createTextFields("Core Subject",$_POST["number_of_core_subjects"]);

      if($_POST["number_of_labs"]>0)
      createTextFields("Lab",$_POST["number_of_labs"]);

      if($_POST["number_of_professional_electives"]>0){
        createTextFields("Professional Elective",$_POST["number_of_professional_electives"]);
        echo "<div class='form-group'>";
        echo "<label for='number_of_hours_for_professional_elective'>Number of hours for Professional Elective in a Day :</label>";
        echo "<input type='number' min='1' class='form-control' name='number_of_hours_for_professional_elective' placeholder='Number of hours for Professional Elective in a Day' min='1' id='number_of_hours_for_professional_elective' required>";
        echo "</div>";
      }
      echo "<br>";
      if($_POST["number_of_open_electives"]>0){
        createTextFields("Open Elective",$_POST["number_of_open_electives"]);
        echo "<div class='form-group'>";
        echo "<label for='number_of_hours_for_professional_elective'><strong>Number of hours for Open Elective in a Day :</strong></label>";
        echo "<input type='number' min='1' class='form-control' name='number_of_hours_for_open_elective' placeholder='Number of hours for Open Elective in a Day' min='1' id='number_of_hours_for_open_elective' required>";
        echo "<div><br>";
      }
      
      if($_POST["number_of_other_subjects"]>0)
      createTextFields("Other Subject",$_POST["number_of_other_subjects"]);
    ?>
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
<?php
function createTextFields($base_name,$no_of_fields){
  if($base_name=="Other Subject")
    echo "<br><h5><strong>$base_name(SoftSkills,Technical Seminars,Dashboards,etc....):</strong></h5>";
  else
    echo "<br><h5><strong>$base_name :</strong></h5>";
  
  for($i=1;$i<=$no_of_fields;$i++){
    $fieldname=$base_name.$i;
    $name=str_replace(" ","_",$fieldname);
    if($base_name!="Other Subject"){
      echo "<div class='form-group'>";
      echo "<label for='$fieldname'><strong>$fieldname:</strong></label>";
      echo "<input type='text' class='form-control' id='$fieldname' name='$name' placeholder='$fieldname Name' required>";
      echo "</div>";
    }
    if($base_name=="Other Subject"){
      echo "<div class='input-group mb-3'>";
      echo "<div class='input-group-prepend'>";
      echo "<span class='input-group-text'>$fieldname</span>";
      echo "</div>";
      echo "<input type='text' class='form-control' id='$fieldname' name='$name' placeholder='$fieldname Name' required>";
      echo "<input type='number' min='1' class='form-control' id='number_of_hours_for_$name' name='number_of_hours_for_$name' placeholder='Number of hours for $fieldname' required>";
      echo "</div>";
    }
  }
}
?>