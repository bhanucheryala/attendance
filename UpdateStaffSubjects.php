<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
else 
  include 'HodHeader1.php';
if (isset($_POST['submit'])){
    $flag=1;
?>
<head>
<title>Update Staff Subjects</title>
</head>
<div class="container" id="updstfsub">
<h5>Assigning subjects for Staff: <?php echo $_SESSION["staff_name"];?></h5>

<form method="POST" onsubmit="return validate()">
<?php
    $conn = new mysqli("localhost", "root", "", $_SESSION["hod_department"]);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    for($i=1;$i<=$_SESSION["number_of_subjects"];$i++){
        $name="subject".$i;
        $tablename="year".$_POST["subject".$i]."_subject_info";
        $_SESSION["assigned_year".$i]=$_POST["subject".$i];
        $_SESSION["section_for_subject".$i]=$_POST["section_for_subject".$i];
        $sql="select `subject_name` from $tablename ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<div class='form-group'>";
            echo "<label for='$name'>Select Subject for Year:".$_POST["subject".$i]."  Section:".$_POST["section_for_subject".$i]."</label>";
            echo "<select class='form-control' id='$name' name='$name'>";
            echo "<option selected value='0'>Select Subject</option>";
            while($row = $result->fetch_assoc()) {
                $subject_name=$row["subject_name"];
                echo "<option value='$subject_name'>$subject_name</option>";
            }
            echo "</select></div>";
        } else {
            $flag=0;
            echo "<div class='alert alert-danger'>";
            echo "No Subjects Available for the year ".$_POST["subject".$i]."<strong>Click here to Upload subjects here</strong>";
            echo "</div>";
       
        }
        
    }
    if($flag)
    echo "<button type='submit' name='submit1' class='btn btn-primary'>Assign Staff</button>";
}
?>
</form>

<script>
function validate() {
    var number_of_subjects='<?php echo $_SESSION["number_of_subjects"]; ?>';
    for(var i=1;i<=number_of_subjects;i++)
    if(document.getElementById("subject"+i).value=='0' || document.getElementById("section_for_subject"+i).value=='0'){
        alert("Subject"+i+" data is missing.");
        return false;
    }
    return true;
}
</script>
<?php
    if (isset($_POST['submit1'])){
        checkAvailability();
        $conn = new mysqli("localhost", "root", "","authority");
        $tablename="staff_subjects";
        for($i=1;$i<=$_SESSION["number_of_subjects"];$i++){
            $tablename="staff_subjects";
            $staff_id=$_SESSION["staff_id"];
            $staff_name=$_SESSION["staff_name"];
            $staff_year=$_SESSION["assigned_year".$i];
            $staff_section=$_SESSION["section_for_subject".$i];
            $staff_subject=$_POST["subject".$i];
            $staff_department=$_SESSION["hod_department"];
           
            $sql="insert into $tablename values('$staff_id','$staff_name','$staff_year','$staff_section','$staff_subject','$staff_department')";
            if ($conn->query($sql) === TRUE) {
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                exit();
            }
        }
        echo "<div class='alert alert-success'>";
        echo "<strong>Staff Subjects Recorded Successfully!</strong> Back To <a href='AssignStaff.php' class='alert-link'>Assign Page</a>.";
        echo "</div>";
        $conn->close();
    }
    function checkAvailability(){
        $conn = new mysqli("localhost", "root", "","authority");
        $tablename="staff_subjects";
        for($i=1;$i<=$_SESSION["number_of_subjects"];$i++){
            $staff_year=$_SESSION["assigned_year".$i];
            $staff_section=$_SESSION["section_for_subject".$i];
            $staff_subject=$_POST["subject".$i];
            $staff_department=$_SESSION["hod_department"];
            $sql="select * from $tablename where `staff_year`='$staff_year'  and `staff_section`='$staff_section' and `staff_subject`='$staff_subject' and `staff_department`='$staff_department'";
            $result=$conn->query($sql);
            if ($result->num_rows > 0){
                $row = $result->fetch_assoc();
                echo "<div class='alert alert-danger'>";
                echo "Subject: $staff_subject is already assigned for ".$row["staff_name"]."<strong> <p>Please Upload staff data <a href='AssignStaff.php'>here.</p></strong>";
                echo "</div>";
        
              exit();
            }
            else{
                return ;
            }
        }
    }
?>
</div>