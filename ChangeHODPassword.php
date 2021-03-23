<?php
session_start();
error_reporting(E_ERROR);
if(!$_SESSION["hod_email"]){
    echo "<script>window.alert('Please Login');</script>";
    header('Location: hodLogin.php');
}
else
    include("HodHeader1.php");
if(isset($_POST["submit"])){
    $conn = mysqli_connect("localhost", "root", "", "authority") or die("mysql_error()");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 
    $tablename="hod_login_info";
    $hod_id=$_SESSION["hod_id"];
    $old_password=md5($_POST["old_password"]);
    $new_password=md5($_POST["pwd1"]);
    $sql="select hod_password from $tablename where hod_id='$hod_id' limit 1";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $database_password=$row["hod_password"];
            break;
        }
    }
    if($old_password!=$database_password){
        echo "<script>window.alert('Invalid Password')</script>";
        header('Location: ChangehodPassword.php');
    }
    else{
        $sql="UPDATE $tablename set hod_password='$new_password' where hod_id='$hod_id'";
        if($conn->query($sql)){
            $flag=1;
        }
        else{
            echo $sql;
            echo "Error updating record: " . $conn->error;
            echo "<script>window.alert('Failed  Hello')</script>";
        }
    }
}
?>
<body>
<div class="container" id="chhodpwd">
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
  <h5>Change Password:</h5>
  <form onsubmit="return validate()" method="POST" name="f1">
    <div class="form-group">
      <label for="old_password">Enter your current Password:</label>
      <input type="password" required class="form-control" id="old_password" name="old_password" placeholder="Your Password" >
    </div>
    <div class="form-group">
      <label for="pwd1">Enter your new Password:</label>
      <input type="password" required class="form-control" id="pwd1" name="pwd1" placeholder="New Password">
    </div>
    <div class="form-group">
      <label for="pwd2">Confirm New password:</label>
      <input type="password" required class="form-control" id="pwd2" name="pwd2" placeholder="Confirm new Password" >
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
  </form>
</div>
</body>
<script>
function validate(){
    if(document.f1.pwd1.value.length<8){
        window.alert("Minimum password length is 8 characters.");
        return false;
    }
    if(document.f1.pwd1.value!=document.f1.pwd2.value){
        window.alert("Passwords did not match.");
        return false;
    }
    return true;
}
</script>