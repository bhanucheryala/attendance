<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
else 
include('HODHeader1.php');
if(isset($_POST["submit1"])){
    $department=$_SESSION["hod_department"];
    $conn = new mysqli("localhost", "root", "", "authority");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $key="";
    for($i=1;$i<=8;$i++)
        $key.=rand(0,9);
    $sql = "UPDATE hod_login_info SET `staff_key`='$key' WHERE `hod_department`='$department'";
    if ($conn->query($sql) === TRUE){
        header('Location: StaffKey.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}
$conn = new mysqli("localhost", "root", "", "authority");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT staff_key FROM hod_login_info where hod_department='".$_SESSION["hod_department"]."' limit 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $staff_key=$row["staff_key"];
    }
} else {
    echo "<h4>No Data Found</h4>";
    exit();
}
$conn->close();
?>
<head>
<title>Staff Key</title>
</head>
<body>
<div class="container" id="stfky">
  <form method="POST">
  <div class="form-group">
    <label for="usr"><h6><strong>Staff Key:</strong></h6></label>
    <input type="text" class="form-control" id="key" value='<?php echo $staff_key;?>' readonly>
  </div>
  <input type="submit" class="btn btn-primary" name="submit1" value="Regenerate Key">
  </form>
</div>
</body>
<?php

?>