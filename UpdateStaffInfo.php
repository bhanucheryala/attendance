<?php
session_start();
error_reporting(E_ERROR);
if(!$_SESSION["staff_id"]){
    echo "<script>window.alert('Please Login');</script>";
    header('Location: StaffLogin.php');
}
else
    include("StaffHeader.php");
if(isset($_POST["submit"])){
    $conn = mysqli_connect("localhost", "root", "", "authority") or die("mysql_error()");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 
    $tablename="staff_login_info";
    $staff_name=$_POST["staff_name"];
    $staff_email=$_POST["staff_email"];
    $staff_phone=$_POST["staff_phone"];
    $sql="UPDATE $tablename set staff_name='$staff_name',staff_email='$staff_email' ,staff_phone='$staff_phone' where staff_id='".$_SESSION["staff_id"]."' ";
    if ($conn->query($sql)) {
        $flag=1;
        $_SESSION["staff_name"]=$staff_name;
        header("Location: UpdateStaffInfo.php");
    }
    else {
        echo "<script>window.alert('A Staff with the mail id:$staff_email already exists.')</script>";
    }
}
$conn = mysqli_connect("localhost", "root", "", "authority") or die("mysql_error()");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$sql="select staff_name,staff_email,staff_phone from staff_login_info where staff_id='".$_SESSION["staff_id"]."' limit 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){
    $staff_name=$row["staff_name"];
    $staff_email=$row["staff_email"];
    $staff_phone=$row["staff_phone"];
  }
}
?>
<body>
<div class="container" id="upstfinf">
  <?php
    if(isset($flag)){
        ?>
        <div class="alert alert-success">   <!--Bhanu Dont modify this-->
            <strong>Data Updated Successfully!</strong> 
        </div>
    <?php
        unset($flag);
    }
  ?>
  <h5>Your Info:</h5>
  <div class="alert alert-primary" role="alert">
      You can Edit Your Information in the Fields..
  </div>
  <form onsubmit="return validate()" method="POST">
    <div class="form-group">
      <label for="staff_name">Name:</label>
      <input type="text" class="form-control" id="staff_name" name="staff_name" value='<?php echo $staff_name?>'>
    </div>
    <div class="form-group">
      <label for="staff_email">Email:</label>
      <input type="email" class="form-control" id="staff_email" name="staff_email" value='<?php echo $staff_email?>'>
    </div>
    <div class="form-group">
      <label for="staff_phone">Contact Info:</label>
      <input type="number" class="form-control" id="staff_phone" name="staff_phone" value='<?php echo $staff_phone?>'>
    </div>
    <div class="form-group">
      <strong><a href='ChangeStaffPassword.php'>Change Password</a></strong>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Update Info</button>
  </form>
</div>
</body>
<script>
function validate(){
    if(document.getElementById("staff_phone").value.length!=10){
        window.alert("Number should be exactly 10 digits.");
        return false;
    }
    var staffname=document.getElementById("staff_name").value;
    var pattern = '/[a-zA-Z]/g';
    var result = staffname.match(pattern);
    if(result=="null"){
        window.alert("Name can\'t be Empty");
        return false;
    }
    return true;
}
</script>
<?php

?>