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
$conn = mysqli_connect("localhost", "root", "", $_SESSION["hod_department"]);
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $flag1=0; //Flag1 is for professional elective
   $flag2=0; //Flag2 is for open elective
   $flag3=0; //Flag3 is for Labs :/
   deleteTable("year".$_POST["year"]."_student_info",$conn);
   $tablename="year".$_POST["year"]."_subject_info";
   $sql="SELECT DISTINCT subject_type FROM $tablename where subject_type='O' or subject_type='P' or subject_type='L'";
   $result=$conn->query($sql);
   if ($result->num_rows >0){
     while($row=$result->fetch_assoc()){
       if($row["subject_type"]=='O')
         $flag2=1;
       if($row["subject_type"]=='P')
         $flag1=1;
       if($row["subject_type"]=='L')
          $flag3=1;
     }
   }
   else{
    echo "Error: " . $conn->error;
   }
     
    $tablename="year".$_POST["year"]."_student_info";
    $sql="create table $tablename (student_id varchar(50) PRIMARY KEY,student_name varchar(320),student_year int,student_section varchar(10),student_phone varchar(50)";
     if($flag1)
      $sql.=",professional_elective varchar(320) default 0";
    if($flag2)
      $sql.=",open_elective varchar(320) default 0";
    if($flag3)
     $sql.=",Lab varchar(30) DEFAULT 'Batch1'";
    $sql.=")";
    $daily_attendance_table_name="year".$_POST["year"]."_total_attendance";
    if ($conn->query($sql) === TRUE) {
    $handle = fopen($_FILES['file']['tmp_name'], "r");
    $i=0;
    
    while($data = fgetcsv($handle))
    {
        $item1 = mysqli_real_escape_string($conn, $data[0]);  
        $item2 = mysqli_real_escape_string($conn, $data[1]);
        $item3 = mysqli_real_escape_string($conn, $data[2]);  
        $item4 = mysqli_real_escape_string($conn, $data[3]);
        $item5 = mysqli_real_escape_string($conn, $data[4]);
        $query = "INSERT into $tablename(student_id,student_name,student_year,student_section,student_phone) values('$item1','$item2',$item3,'$item4','$item5')";
        mysqli_query($conn, $query);
        $i++;
    }
    $table1_name="year".$_POST["year"]."_total_attendance";
    $clear_table1_sql="DELETE FROM $table1_name";
    if ($conn->query($clear_table1_sql) === TRUE) {
    } else {
      echo $sql;
      echo "Error deleting record: " . $conn->error;
      exit();
    }
    $table2_name="year".$_POST["year"]."_student_info";
    $sql="INSERT INTO $table1_name(`student_id`,`student_name`,`student_section`) SELECT `student_id`,`student_name`,`student_section` from $table2_name";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
      //later
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      exit();
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
}
function deleteTable($tablename,$conn)
{
  $sql = "DROP TABLE IF EXISTS $tablename;";  //This is useful as we need to update for every semester
  if ($conn->query($sql) === TRUE);
  else 
  {
      echo "Error: " . $sql . "<br>" . $conn->error;
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
