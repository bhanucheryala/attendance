<?php
session_start();
error_reporting(E_ERROR);
if(!$_SESSION["staff_id"]){
  echo "<script>window.alert('Please Login');</script>";
  header('Location: StaffLogin.php');
}

?>
<script src="js/newjs.js" type="text/javascript"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
    
<div class="container-fluid " id="jumbotroncon11">
             <div class="jumbotron container-fluid text-center" id="jum1">
                <div id="jumleft">
                    <img src="logo" alt="logo">
                </div>
                <div id="nba">
                    <img src="nba" alt="nba">
                </div>
                <div id="naac">
                    <img src="naac" alt="nba">
                </div>
                <div >
                    <h2 class="display"><strong>MALLAREDDY ENGINNERING COLLEGE (AUTONOMOUS)</strong></h2>
                  <h6>( An Autonomous institution approved by UGC and Affiliated to JNTUH Hyderabad,</h6>
                  <h6>        Accredited by NAAC with 'A' Grade,Accredited by NBA,    </h6>
                  <h6> Maisammaguda, dhulapally,(Post, via Kompally),Secunderabad-500100 Ph:040-64634234)</h6>
                </div>
                  
             </div>
        </div>

<?php
$option=$_POST["option"];
$batch=$_POST[$option."batch"];
$year=$_POST[$option."year"];
$section=$_POST[$option."section"];
$department=$_POST[$option."department"];
$subject_name=$_POST[$option."subject"];
$conn = new mysqli("localhost","root","", $department);

//number_of_hours_assigned and subject_type
$tablename="year".$year."_subject_info";
$sql="select number_of_hours_assigned,subject_type from $tablename where subject_name='$subject_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $number_of_hours_assigned=$row["number_of_hours_assigned"];
        $subject_type=$row["subject_type"];
    }
} else {
    echo "<h4>Subject Data Not Found.</h4>";
    exit();
}

$tablename="year".$year."_hourwise";
if($number_of_hours_assigned>1){
    if($subject_type=='L')
        $sql="select distinct(date),hour from $tablename where hour_section='$section' and hour_subject='$subject_name' and batch='$batch' GROUP BY(`date`)";
    if($subject_type=='N')
        $sql="select distinct(date),hour from $tablename where hour_section='$section' and hour_subject='$subject_name' GROUP BY(`date`)";
}   
else 
    $sql="select date,hour from $tablename where hour_section='$section' and hour_subject='$subject_name' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $i=0;
    echo "<div class='container table-responsive' id='stfrbk'>";
    echo "<button id='btnExportToCsv' type='button' class='button'>Export to CSV</button><br>";
    echo "<table border='1'border=1 id='dataTable' class='table table-bordered'>";     //Table Heading
    echo "<thead><tr><th>Student ID</th><th>Student Name</th>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "<th>".$row["date"]."</th>";
       $date_order[$i]=$row["date"];
       $date_hour[$i++]=$row["hour"];
    }
} else {
    echo "<h4>No classes are taken yet.</h4>";
    exit();
}
$number_of_records=$i;
echo "<th>Total</th></tr></thead><tbody>";//Heading ended
$tablename="year".$year."_daily_attendance";
$subquery_tablename="year".$year."_student_info";
$c=2;   //Column
$j=0;
for($i=0;$i<$number_of_records;$i++){
    $r=0;   //row
    $hour_column="hour".$date_hour[$i];
    if($subject_type=='P')
    $sql="select student_id,student_name,$hour_column from $tablename where date='$date_order[$i]' and student_id in (select student_id from $subquery_tablename where `professional_elective`='$subject_name' and student_section='$section') ORDER BY(student_id)";
    else if($subject_type=='O')
        $sql="select student_id,student_name,$hour_column from $tablename where date='$date_order[$i]' and student_id in (select student_id from $subquery_tablename where `open_elective`='$subject_name' and student_section='$section') ORDER BY(student_id)";
    else if($subject_type=='L') 
        $sql="select student_id,student_name,$hour_column from $tablename where date='$date_order[$i]' and student_id in (select student_id from $subquery_tablename where Lab='$batch' and student_section='$section') ORDER BY(student_id)";
    else
        $sql="select student_id,student_name,$hour_column from $tablename where date='$date_order[$i]' and student_id in (select student_id from $subquery_tablename where student_section='$section') ORDER BY(student_id)";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($i==0){
                $student_info[$j][0]=$row["student_id"];
                $student_info[$j][1]=$row["student_name"];
                $j++;
            }
            $student_info[$r++][$c]=$row[$hour_column];
        }
    } else {
        echo "0 results";   //later
        exit();
    }
    $c++;
}
for($i=0;$i<$r;$i++){
    $total=0;
    echo "<tr>";
    for($j=0;$j<$c;$j++){
        if($j>1){
            if((int)$student_info[$i][$j]==0){
                echo "<td  align='center' style='background-color: #fd5e53;'>0</td>";
            }
            else{
                echo "<td align='center' style='background-color:#21bf73;'>$number_of_hours_assigned</td>";
                $total+=$number_of_hours_assigned;
            }
        }
        else
            echo "<td>".$student_info[$i][$j]."</td>";
    }
    echo "<td>$total</td></tr>";
}
unset($student_info);
echo"<tbody></table></div>";
?>

<script>
        const dataTable = document.getElementById("dataTable");
        const btnExportToCsv = document.getElementById("btnExportToCsv");

        btnExportToCsv.addEventListener("click", () => {
            const exporter = new TableCSVExporter(dataTable);
            const csvOutput = exporter.convertToCSV();
            const csvBlob = new Blob([csvOutput], { type: "text/csv" });
            const blobUrl = URL.createObjectURL(csvBlob);
            const anchorElement = document.createElement("a");

            anchorElement.href = blobUrl;
            anchorElement.download = "register.csv";
            anchorElement.click();

            setTimeout(() => {
                URL.revokeObjectURL(blobUrl);
            }, 500);
        });
        
    </script>
    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>