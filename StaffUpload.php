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



<div class="loader" id='load' style='display: none'>Loading...!</div>
<div class="container" id="hstup">
  <h5><strong>Upload Student Data :</strong></h5><br>
  <div class="alert alert-info">
    <strong>NOTE: </strong> Please update Subject Info before uploading Student Info.Update Subjects Info <a href="Subjects.php" class="alert-link">here.</a>.
  </div><br>

  <p class="text-center"><strong>Please Follow This Format in the CSV file.Example:</strong></p>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Student Hallticket</th><th>Student Name</th>
        <th>Student Year</th><th>Student Section</th>
        <th>Parent Number</th>
      </tr>
    </thead>
    <tbody>
      <td>17J41A0XXX</td><td>John</td><td>3</td><td>A</td><td>9090989765</td>
    </tbody>
  </table><br>
  <form method="POST" onsubmit="return validate()" enctype="multipart/form-data">
    <div class="form-group">
      <label for="year">Select Year: </label>
      <select class="form-control" id="year" name="year">
      <option value='0' selected>Select Year</option>
        <option value='1'>First Year</option>
        <option value='2'>Second year</option>
        <option value='3'>Third Year</option>
        <option value='4'>Fourth Year</option>
      </select>
    </div>
    <div class="form-group">
      <label>Select CSV File:</label>
      <input type="file" name="file" />
    </div>
    <input type="submit" name="submit" id="ubtn" value="Import" class="btn btn-success" />
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

<?php  
$conn = mysqli_connect("localhost", "root", "", "authority");
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
      $i=0;
    $handle = fopen($_FILES['file']['tmp_name'], "r");
    $tablename="staff_login_info";
    while($data = fgetcsv($handle))
    {
       
       $item1 = mysqli_real_escape_string($conn, $data[0]);  
       $item2 = mysqli_real_escape_string($conn, $data[1]);
       $item3 = mysqli_real_escape_string($conn, $data[2]);  
       $item4 = mysqli_real_escape_string($conn, $data[3]);
       $query = "INSERT into $tablename(staff_name,staff_email,staff_password,staff_phone) values('$item1','$item2','$item3','$item4')";
       echo "<script>window.alert('$query')</script>" ;
       mysqli_query($conn, $query);
       $i++;
    }
    fclose($handle);
    echo "<script>alert('$i students data uploaded successfully.');</script>";
  }
  else {
    echo "Error creating table: " . $conn->error;
  }
}
  else{
    echo "<script>alert('Upload CSV files only');</script>";
  } 
}

?>  
<script>
function validate(){
  if(document.getElementById("year").value=='0'){
    alert("Please Select a Year");
    return false;
  }
  return true;
}
</script>