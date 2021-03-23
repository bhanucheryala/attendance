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
<?php
if(!$_GET){
?>
<div class="container" id="stfinfo">
  <form method="GET" onsubmit="return validate()">
    <div class="form-group">
      <h5>Staff Info : </h5><br>
    <label for='year'>Select Year :</label>
    <select class="form-control" id='year' name='year'>
        <option selected disabled value='0' required>Select Year</option>
        <option value='1'>First Year</option>
        <option value='2'>Second Year</option>
        <option value='3'>Third Year</option>
        <option value='4'>Fourth Year</option>
    </select>
    </div>
    <button type="submit" class="btn btn-primary">Get Staff Data</button>
  </form>
</div>
</body>
<?php
} //if(!$_GET) ending
?>
<script>
function validate() {
    if(document.getElementById("year").value=='0'){
        alert("Please Select a Year.");
        return false;
    }
    return true;
}
</script>
<?php
if($_GET){
    $conn = new mysqli("localhost", "root", "", "authority");
    $year=$_GET["year"];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT `staff_id`,`staff_name`,`staff_year`,`staff_section`,`staff_subject` FROM `staff_subjects` where `staff_department`='".$_SESSION["hod_department"]."' and `staff_year`='$year' ORDER BY `staff_section` ASC";
    $result = $conn->query($sql);
?>
<body>
<div class="container" id="stfinfo2">
  <h5><strong>Year <?php echo $year?> Staff Info :</strong></h5>  
  <p >Search for Staff Name or Subject:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search.."> <br>  
  <form method="POST" action="DeleteStaff.php">      
<?php //To insert Staff data
    if ($result->num_rows > 0) {
?>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Staff Name</th>
      <th>Staff Year</th>
      <th>Staff Section</th>
      <th>Staff Subject</th>
    </tr>
  </thead>
  <tbody id="myTable">
<?php
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            $value=$row["staff_id"].",".$row["staff_year"].",".$row["staff_section"].",".$row["staff_subject"].",".$row["staff_name"];
            echo "<td><label>&nbsp;<input required type='radio' name='staff_id' value='$value'>".$row["staff_name"]."</label></td><td>".$row["staff_year"]."</td><td>".$row["staff_section"]."</td><td>".$row["staff_subject"]."</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<h4>No data Available</h4>";
        exit();
    }
?>
    </tbody>
  </table>
  </div>
  <button type="submit" name="submit1" class="btn btn-primary">Remove Subject</button>
  <button type="submit" name="submit2" class="btn btn-danger">Remove Staff</button><br>
  <a href="StaffInfo.php">Choose Another Year</a>
</div>

</div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->


    


</body>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php
}   //if($_GET) ending
?>