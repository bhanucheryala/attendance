<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
else 
  include 'HodHeader1.php';
?>
<head>
<title>Assign Staff</title>
</head>
<?php
if(!$_POST)
{
    $conn = new mysqli("localhost", "root", "", "authority");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT `staff_id`,`staff_name`,`staff_phone` FROM staff_login_info";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
?>

<div class="container" id="asnstf">
<div class="alert alert-primary">
  <strong>Assign classes in next page.</strong> 
</div>
   
    <p>Search for Staff Name or Staff Number:</p>  
    <input class="form-control" id="myInput" type="text" placeholder="Search.."><br>

            <form method="POST">
            <table class="table table-bordered">
            <thead>
            <th>Staff Name</th>
            <th>Staff Mobile</th>
            </thead>
            <tbody id="myTable">
            <?php    
            while($row = $result->fetch_assoc()) {
                    echo "<tr><td>";
                    echo "<div class='form-check'>";
                    echo "<label class='form-check-label' for='".$row["staff_id"]."'>";
                    echo "<input type='radio' class='form-check-input' id='".$row["staff_id"]."' name='staff_id' value='".$row["staff_id"]."' required>".$row['staff_name'];
                    echo "</label>";
                    echo "</div></td>";
                    echo "<td>".$row["staff_phone"]."</td></tr>";
                }
            echo "</tbody></table>";
            echo "<div class='form-group'>";
            echo "<label for='number_of_subjects'>No.of Classes:</label>";
            echo "<input type='number' class='form-control' id='number_of_subjects' name='number_of_subjects' min='1' required placeholder='Ex: If staff goes for Third year A section and Third year B section input is 2'>";
            echo "</div>";
            echo "<div class='container'>";
            echo "<button type='submit' class='btn btn-primary'>Select Classes</button>";
            echo "</div>";
            } else {
                echo "<h4>No Staff Data Available</h4>";
            }
            }
            ?>
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
if($_POST){
    $conn = new mysqli("localhost", "root", "", "authority");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT `staff_id`,`staff_name`,`staff_phone` FROM staff_login_info where `staff_id`='".$_POST["staff_id"]."' limit 1;";
    $result = $conn->query($sql);
    $staff_name="";
    if ($result->num_rows > 0) 
        while($row = $result->fetch_assoc())
            $staff_name=$row["staff_name"];
    $_SESSION["staff_id"]=$_POST["staff_id"];
    $_SESSION["staff_name"]=$staff_name;
    $_SESSION["number_of_subjects"]=$_POST["number_of_subjects"];
?>
<div class='container' id="asnstf2">
<div class="alert alert-primary">
    <strong>Note:</strong> Subject1 and Subject2 might be same but for different classes
</div>
<br>
<form action="UpdateStaffSubjects.php" method="POST" onsubmit="return validate()">
<?php
    for($i=1;$i<=$_POST["number_of_subjects"];$i++){
        $subject_id="subject".$i;
        echo "<h5><strong>Subject$i:</strong></h5>";
?>
<div class="form-group">
    <label for='<?php echo $subject_id;?>'>Select Year :</label>    
    <select class="form-control" id='<?php echo $subject_id;?>' name='<?php echo $subject_id;?>'>
        <option selected value='0'>Select Year</option>
        <option value='1'>First Year</option>
        <option value='2'>Second Year</option>
        <option value='3'>Third Year</option>
        <option value='4'>Fourth Year</option>
    </select>
</div> 
<div class="form-group">
    <label for='<?php echo "section_for_".$subject_id;?>'>Select Section :</label>
    <select class="form-control" id='<?php echo "section_for_".$subject_id;?>' name='<?php echo "section_for_".$subject_id;?>'>
        <option selected disabled value='0' required>Select Section</option>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
    </select><br>
</div>
<?php
    }
    echo "<button type='submit' name='submit' class='btn btn-primary'>Get Subject Data</button><form></div>";

}
?>
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
</div>