<?php
session_start();
error_reporting(E_ERROR);
if(!$_SESSION["staff_id"]){
  echo "<script>window.alert('Please Login');</script>";
  header('Location: StaffLogin.php');
}

?>
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
$select_year=$_POST[$option."year"];
$select_section=$_POST[$option."section"];
$select_department=$_POST[$option."department"];
$select_subject=$_POST[$option."subject"];
$conn = new mysqli("localhost","root","", $select_department);
$sub_type_sql="select subject_type,number_of_hours_assigned from year".$select_year."_subject_info where subject_name='".$select_subject."'";
$sub_type_result = $conn->query($sub_type_sql);
$sub_type_row = $sub_type_result->fetch_assoc();
$sub_type=$sub_type_row['subject_type'];
$number_of_hours_assigned=$sub_type_row['number_of_hours_assigned'];

$no_of_dates=0;




echo "<div class='container table-responsive' id='stfrbk'>";
echo "<table border=1 id='register' class='table table-bordered' ><thead>";
//select student


// date for head of table
echo "<tr><th>student_id</th><th>student_name</th>";
if($sub_type=='L' or $sub_type=='N')
{
$date_sql = "select distinct(DATE_FORMAT(date,'%d/%m/%Y')) as date from year".$select_year."_hourwise  where hour_section='".$select_section."' and hour_subject='".$select_subject."' ORDER BY date 
";
    $date_result = $conn->query($date_sql);
    while($date_row = $date_result->fetch_assoc()){
        
      echo "<th>".$date_row['date']."</th>";
      $dat[$no_of_dates]=$date_row['date'];
      $no_of_dates++;

    }
    echo "</tr></thead>";
}
else{
    $date_sql = "select DATE_FORMAT(date,'%d/%m/%Y') as date from year".$select_year."_hourwise  where hour_section='".$select_section."' and hour_subject='".$select_subject."' ORDER BY date ";
    $date_result = $conn->query($date_sql);
    while($date_row = $date_result->fetch_assoc()){
        
      echo "<th>".$date_row['date']."</th>";
      $dat[$no_of_dates]=$date_row['date'];
      $no_of_dates++;
    }
    echo "</tr></thead>";
}

if($sub_type=='L' or $sub_type=='N')
{
    
    $select_student_sql = "select student_id,student_name from year".$select_year."_student_info where student_section='".$select_section."'";
    $select_student_result = $conn->query($select_student_sql);
    while($select_student_row = $select_student_result->fetch_assoc())
    {
        echo "<tbody><tr>";
        $student_id=$select_student_row['student_id'];
        $student_name=$select_student_row['student_name'];
        echo "<td>".$student_id."</td>";
        echo "<td>".$student_name."</td>";
        
//select hour 
        for($i=0;$i<$no_of_dates;$i++)
        {
            $select_hour_sql = "select hour from year".$select_year."_hourwise  where hour_section='".$select_section."' and hour_subject='".$select_subject."' and date='".$dat[$i]."'";
            $select_hour_result = $conn->query($select_hour_sql);
            $select_hour_row = $select_hour_result->fetch_assoc();
            $select_hour=$select_hour_row['hour'];
    // check student present or absent 
            $check_sql = "select hour".$select_hour." from year".$select_year."_daily_attendance  where student_section='".$select_section."' and date='".$dat[$i]."' and student_id='".$student_id."'";

            $check_result = $conn->query($check_sql);
            $check_row = $check_result->fetch_assoc();
            echo "<td>".$check_row["hour".$select_hour]."</td>";
        
    

        }
    echo "</tr>";
    }
}


else
{
    $select_student_sql = "select student_id,student_name from year".$select_year."_student_info where student_section='".$select_section."'";
    $select_student_result = $conn->query($select_student_sql);
    while($select_student_row = $select_student_result->fetch_assoc())
    {
        echo "<tbody><tr>";
        $student_id=$select_student_row['student_id'];
        $student_name=$select_student_row['student_name'];
        echo "<td>".$student_id."</td>";
        echo "<td>".$student_name."</td>";
        $select_hour_sql = "select hour,date from year".$select_year."_hourwise  where hour_section='".$select_section."' and hour_subject='".$select_subject."'";
        $select_hour_result = $conn->query($select_hour_sql);

        while($select_hour_row = $select_hour_result->fetch_assoc())
        {
            $select_hour=$select_hour_row['hour'];
            $select_date=$select_hour_row['date'];
        // check student present or absent 
            $check_sql = "select hour".$select_hour." from year".$select_year."_daily_attendance  where student_section='".$select_section."' and date='".$select_date."' and student_id='".$student_id."'";
            $check_result = $conn->query($check_sql);
            $check_row = $check_result->fetch_assoc();
            echo "<td>".$check_row["hour".$select_hour]."</td>";
        }
        


    }
    echo "</tr>";


}
echo"<tbody></table></div>";




?>
<script src="js/bootstrap.min_1.js" type="text/javascript"></script>
<script src="js/FileSaver.min.js" type="text/javascript"></script>
<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/tableexport.min.js" type="text/javascript"></script>

    
               
<script type="text/javascript">
$('#register').tableExport();
</script>
                 </body>
</html>
