<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
else
    include "HodHeader1.php"
?>

<div class="container" id="ablst">
    <?php
if($_GET){
    $content = '';
$content .= '<div>
<img src="mrec.jpeg" alt="logo" height="150" width="700">
</div>
';

    $conn = new mysqli('localhost','root','',$_SESSION["hod_department"]);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $date=$_SESSION["dateofabsentees"];
    $content.=''.$_SESSION["dateofabsentees"];
    $hour="hour".$_GET["hour"];
    $year=$_GET["year"];
    if(isset($_GET["section"])){
        $section=$_GET["section"];
        $sql="SELECT `student_id`,`student_name`,`student_phone` from `year".$year."_student_info` where student_id IN(select student_id from year".$year."_daily_attendance where `$hour`='0' and `date`='$date' and `student_section`='$section')";
        $result=$conn->query($sql);
        echo "<div class='container'><h4>Year: $year Section:$section No.of.Absentees: ".mysqli_num_rows ( $result )."</h4><br>";
        $content .= '<h4>Year:'. $year.' Section:'.$section.' No.of.Absentees: '.mysqli_num_rows ( $result ).'</h4>';

        echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Student ID</th><th>Student Name</th><th>Student Number</th></thead><tbody>";
        $content .= '<table border="1" cellspacing="0" cellpadding="3" ><tr><th>Student ID</th><th>Student Name</th><th>Student Number</th></tr>';
    }
    else{
        $sections=explode(",",$_GET["sections"]);
        $sub_sections="`student_section`='$sections[0]'";
        for($i=1;$i<count($sections)-1;$i++){
            $sub_sections.="or `student_section`='$sections[$i]'";
        }
            
        $sql="SELECT `student_id`,`student_name`,`student_section`,`student_phone` from `year".$year."_student_info` where student_id IN(select student_id from year".$year."_daily_attendance where `$hour`='0' and `date`='$date' and ($sub_sections)) ORDER BY `student_section`";
        $result=$conn->query($sql);
        echo "<div class='container' id='absl2'><h4>Year: $year No.of.Absentees: ".mysqli_num_rows ( $result )."</h4>";
        $content .= '<h4>Year:'. $year.' No.of.Absentees: '.mysqli_num_rows ( $result ).'</h4>';
        echo "<table class='table table-bordered'><thead class='thead-dark'><tr><th>Student ID</th><th>Student Name</th><th>Student Section</th><th>Student Number</th></thead><tbody>";
        $content .= '<table border="1" cellspacing="0" cellpadding="3" ><tr><th>Student ID</th><th>Student Name</th><th>Student Section</th><th>Student Number</th></tr>';
    }
    echo "<br><a href='HourInput.php' id='abclk'>Choose another Year</a><br>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            $content .= '<tr>';
            echo "<td>".$row["student_id"]."</td><td>".$row["student_name"]."</td>";
            $content .= '<td>'.$row["student_id"].'</td><td>'.$row["student_name"].'</td>';
            if(!isset($_GET["section"]))
            {
                echo "<td>".$row["student_section"]."</td>";
                $content .= '<td>'.$row["student_section"].'</td>';
            }
            echo "<td>".$row["student_phone"]."</td>";
            echo "<tr>";
            $content .= '<td>'.$row["student_phone"].'</td></tr>';
        }
        $content .= '</table>';
    } else {
        echo "<h4>O Absentees</h4>";
        $content .= '<h4>O Absentees</h4>';
    }
    echo "</tbody><table>";
    $conn->close();
    ?>
<div class="col-md-12" align="right" id="abt1">
<form  action="pdfgen.php" method="post"> 
<input type='hidden' value='<?php echo $content ?>' name='conte'/>

<input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
</form>  

</div>
<?php
}

?>

</div>  


     </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->


  
</body>