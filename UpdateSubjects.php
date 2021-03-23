<?php
session_start();
error_reporting(E_ERROR);
$count=0;
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
else
    include("HodHeader1.php");
if($_POST){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $number_of_sections=0;
  $dbname = $_SESSION["hod_department"];
  //To get data of no.of sections
  $conn = new mysqli($servername, $username, $password, "authority");
  $sql="select year".$_SESSION["year"]." from department_info where department_name='".$_SESSION["hod_department"]."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $number_of_sections=$row["year".$_SESSION["year"]];
    }
  }
  //To update no.of hours per day in authority database
  $sql="UPDATE `department_info` SET `number_of_hours_per_day` = '".$_SESSION["number_of_hours"]."' WHERE `department_info`.`department_name` = '".$_SESSION["hod_department"]."'; ";
  if ($conn->query($sql) === TRUE) {
   //later
  } 
  else {
    echo "Error updating record: " . $conn->error;
  }
  //updation of no.of hours per day in authority database ended
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  //create table year?_daily_attendance
  $tablename="year".$_SESSION["year"]."_daily_attendance";
  deleteTable($tablename,$conn);
  $sql="create table $tablename(`student_id` varchar(30),`student_name` varchar(320),`student_section` varchar(20),`date` date";
  for($i=1;$i<=$_SESSION["number_of_hours"];$i++){
    $columnname="hour".$i;
    $sql=$sql.",`$columnname` int DEFAULT 0";
  }
  $sql=$sql.",UNIQUE (student_id,date));";
  if ($conn->query($sql) === TRUE) {
      //later
  } 
  else {
      echo "Error creating table: " . $conn->error;
  }
  //creating table year?_hourwise ended

  //create table year?_hourwise
  $tablename="year".$_SESSION["year"]."_hourwise";
  deleteTable($tablename,$conn);
  $sql="create table $tablename (`hour_year` int,`hour_section` varchar(20),`hour` int,`hour_subject` varchar(320),`subject_type` varchar(10),`batch` varchar(40) default '-',`date` date,`hour_count` varchar(40),PRIMARY KEY(`hour_year`,`hour_section`,`hour`,`date`,`hour_subject`,`batch`))";
  if ($conn->query($sql) === TRUE) {
      //later
  } 
  else {
      echo "Error creating table: " . $conn->error;
  }
  //creating table year?_hourwise ended
  //create table year?_subject_info
  $tablename="year".$_SESSION["year"]."_subject_info";
  deleteTable($tablename,$conn);
  $sql="create table $tablename (`subject_id` int AUTO_INCREMENT,`subject_name` varchar(320),`subject_type` varchar(20),`number_of_hours_assigned` int";
  for($i=65;$i<(65+$number_of_sections);$i++)
  $sql.=",`".chr($i)."` varchar(40) DEFAULT '0'";
  $sql.=",PRIMARY KEY(subject_id),UNIQUE(subject_name))";
  
  if ($conn->query($sql) === TRUE) {
      //later
  } 
  else {
      echo "Error creating table: " . $conn->error;
  }
   //creating table year?_subject_info ended
   //creating table year?_total_attendance 
  $tablename="year".$_SESSION["year"]."_total_attendance";
  deleteTable($tablename,$conn);
  $sql="create table $tablename (`student_id` varchar(50) PRIMARY KEY,`student_name` varchar(320),`student_section` varchar(10)";
  for($i=1;$i<=$_SESSION["number_of_core_subjects"];$i++)//To insert Core subjects data
    $sql.=",`".$_POST["Core_Subject".$i]."` int default 0";

  if($_SESSION["number_of_labs"]>0)//To insert Labs data
  for($i=1;$i<=$_SESSION["number_of_labs"];$i++)
    $sql.=",`".$_POST["Lab".$i]."` int default 0";

  if($_SESSION["number_of_other_subjects"]>0)//To insert other subjects data
    for($i=1;$i<=$_SESSION["number_of_other_subjects"];$i++)
      $sql.=",`".$_POST["Other_Subject".$i]."` int default 0";

  if($_SESSION["number_of_professional_electives"]>0)
    for($i=1;$i<=$_SESSION["number_of_professional_electives"];$i++)
      $sql.=",`".$_POST["Professional_Elective".$i]."` int default -1";
    
  if($_SESSION["number_of_open_electives"]>0)
    for($i=1;$i<=$_SESSION["number_of_open_electives"];$i++)
      $sql.=",`".$_POST["Open_Elective".$i]."` int default -1";
  
  $sql.=");";
  if ($conn->query($sql) === TRUE) {
    //later
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  //Insert into year?_subject_info
  $tablename="year".$_SESSION["year"]."_subject_info";
  $sql="";
  for($i=1;$i<=$_SESSION["number_of_core_subjects"];$i++)//To insert Core subjects data
    $sql.="insert into $tablename(`subject_name`,`subject_type`,`number_of_hours_assigned`) values('".$_POST["Core_Subject".$i]."','C','1');";

  if($_SESSION["number_of_labs"]>0)//To insert Labs data
  for($i=1;$i<=$_SESSION["number_of_labs"];$i++){
    $sql.="insert into $tablename(`subject_name`,`subject_type`,`number_of_hours_assigned`";
    for($j=65;$j<(65+$number_of_sections);$j++)
      $sql.=",`".chr($j)."`";
    $sql.=") values('".$_POST["Lab".$i]."','L','3'";
    for($j=65;$j<(65+$number_of_sections);$j++)
      $sql.=",'0,0'";
    $sql.=");";
  }

  if($_SESSION["number_of_professional_electives"]>0)//To insert Pofessional Electives data
    for($i=1;$i<=$_SESSION["number_of_professional_electives"];$i++)
      $sql.="insert into $tablename(`subject_name`,`subject_type`,`number_of_hours_assigned`) values('".$_POST["Professional_Elective".$i]."','P','".$_POST["number_of_hours_for_professional_elective"]."');";
  
  if($_SESSION["number_of_open_electives"]>0)//To insert Open electives data
    for($i=1;$i<=$_SESSION["number_of_open_electives"];$i++)
      $sql.="insert into $tablename(`subject_name`,`subject_type`,`number_of_hours_assigned`) values('".$_POST["Open_Elective".$i]."','O','".$_POST["number_of_hours_for_open_elective"]."');";

  if($_SESSION["number_of_other_subjects"]>0)//To insert other subjects data
    for($i=1;$i<=$_SESSION["number_of_other_subjects"];$i++)
      $sql.="insert into $tablename(`subject_name`,`subject_type`,`number_of_hours_assigned`) values('".$_POST["Other_Subject".$i]."','N','".$_POST["number_of_hours_for_Other_Subject".$i]."');";
  if ($conn->multi_query($sql) === TRUE) {
    //later
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  //Insert into year?_subject_info ended..

  
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

<div class="container">
  <div class="alert alert-success">
    <strong>Subjects Data Recorded.</strong>If you dont see all the subjects here try updating <a href="Subjects.php" class="alert-link">here</a>.
  </div>
<?php
  $conn = new mysqli("localhost", "root", "", $_SESSION["hod_department"]);
  $tablename="year".$_SESSION["year"]."_subject_info";
  $sql="select `subject_name`,`number_of_hours_assigned` from $tablename";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $i=1;
    echo "<div class='container'><table class='table table-bordered'><thead><tr><th>S.No</th><th>Subject Name</th><th>No.of Hours</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".($i++)."</td>";
        echo "<td>".$row["subject_name"]."</td>";
        echo "<td>".$row["number_of_hours_assigned"]."</td>";
        echo "</tr>";
    }
    echo "<tbody></tr></table>";
  } else {
    echo "0 results";
  }
  $conn->close();
?>
</div>  



</div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->


  
</body>

</html>

