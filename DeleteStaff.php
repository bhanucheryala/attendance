<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
else
    include("HodHeader1.php");
$conn = new mysqli("localhost", "root", "", "authority");
$staff_info=explode(",",$_POST["staff_id"]);
$staff_id=$staff_info[0];
$staff_year=$staff_info[1];
$staff_section=$staff_info[2];
$staff_subject=$staff_info[3];
$staff_department=$_SESSION["hod_department"];
$staff_name=$staff_info[4];
if(isset($_POST["submit1"])){
    $tablename="staff_subjects";
    $sql="DELETE FROM `$tablename` WHERE `staff_year` = $staff_year AND `staff_section` = '$staff_section' AND `staff_subject` = '$staff_subject' AND `staff_department` = '$staff_department' AND `staff_id`=$staff_id;";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>";
        echo "<strong>$staff_name no longer teaches $staff_subject for $staff_year Year $staff_section Section.</strong> .";
        echo "</div>";
    } else {
        echo "Error deleting record: " . $conn->error;
        exit();
    }
}
else if(isset($_POST["submit2"])){
    $tablename="staff_subjects";
    $count=0;
    $sql="DELETE FROM `$tablename` WHERE `staff_id`=$staff_id;";
    echo $sql;
    if ($conn->query($sql) === TRUE) {$count++;} 
    else {
        echo "Error deleting record: " . $conn->error;
        exit();
    }
    $tablename="staff_login_info";
    $sql="DELETE FROM `$tablename` WHERE `staff_id`=$staff_id;";
    if ($conn->query($sql) === TRUE) {$count++;} 
    else {
        echo "Error deleting record: " . $conn->error;
        exit();
    }
    if($count==2){
        echo "<div class='alert alert-success'>";
        echo "<strong>$staff_name data is removed completely.We recommend you to cahnge key <a href='StaffKey.php'>here.</a></strong> .";
        echo "</div>";
    }
}
echo "<p>Click <a href='StaffInfo.php?year=$staff_year'>here</a> to go back.</p></div>";
$conn->close();
?>
 

