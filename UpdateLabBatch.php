<?php
    session_start();
    error_reporting(E_ERROR);
    $department=$_SESSION["hod_department"];
    if( !isset($_SESSION["hod_email"]) ){
        header("location:HODLogin.php");
        exit();
    }
    else
      include("HodHeader1.php");
    if(isset($_POST['student_batch'])){
        $flag=0;
        $count=0;
        $conn = new mysqli("localhost", "root", "", $_SESSION["hod_department"]);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql_or="";
        $year=$_SESSION["year"];
        $section=$_SESSION["section"];
        $tablename="year".$year."_student_info";
        if(isset($_POST["student"])){
            $flag=1;
            foreach($_POST['student'] as $selected){
                $sql_or.="`student_id`='$selected' or ";
            }
            $sql_or.="`student_id`='$selected'";
            $sql="UPDATE $tablename set `Lab`='Batch1' where $sql_or";
            if ($conn->query($sql) === TRUE) {
                $count++;
            } else {
                echo "Error updating record: " . $conn->error;
                exit();
            }
            $sql_or = str_replace("`student_id`=","",$sql_or);
            $sql_or = str_replace("or",",",$sql_or);
            $sql="UPDATE $tablename set `Lab`='Batch2' where student_section='$section' and student_id NOT IN($sql_or)";
            if ($conn->query($sql) === TRUE) {
                $count++;
            } else {
                echo "Error updating record: " . $conn->error;
                exit();
            }
        }
        else{
            $sql="UPDATE $tablename set `Lab`='Batch2' where student_section='$section'";

            if ($conn->query($sql) === TRUE) {
            $count++;
            } else {
            echo "Error updating record: " . $conn->error;
            exit();
            }
        }
            
        if($count==2 || ($flag==0 && $count=1)){
            echo "<div class='alert alert-success'>";
            echo "<strong>Batch info Recorded Successfully!</strong>   Select Another Year/Section <a href='SelectLab.php' class='alert-link'>here.</a>";
            echo "</div>";
        }
        $conn->close();
    }
?>