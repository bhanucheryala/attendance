<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_department"]) ){
    header("location:HODLogin.php");
    exit();
}
else
     
if(isset($_POST["submit"])){
  $conn = new mysqli("localhost", "root", "", $_SESSION["hod_department"]);
  $year=$_POST["year"];
  $department=$_SESSION["hod_department"];
  $section=$_POST["section".$year];
  $student_id=$_POST['student_id'];
  $tablename="year".$year."_daily_attendance";



      // finding no of sections
      $conn = new mysqli('localhost','root','','authority');
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      
    
      $sql = "SELECT year".$year.",number_of_hours_per_day from department_info where department_name='".$department."'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          
          $row = $result->fetch_assoc();
              $number_of_hours_per_day=(int)$row['number_of_hours_per_day'];
      } 
      else {
          echo "<h4>Department Info is missing.</h4>";
          exit();
      }
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
                  <h6>       Accredited by NAAC with 'A' Grade,Accredited by NBA,    </h6>
                  <h6> Maisammaguda, dhulapally,(Post, via Kompally),Secunderabad-500100 Ph:040-64634234)</h6>
                </div>
                  
             </div>
        </div>


<div class='container' id="comlist">
<h4><strong>STUDENT-ID: <?php echo $student_id;?> </strong></h4><br>
<h5><strong>Year: <?php echo $year;?> Section <?php echo $section;?></strong> </h5><br>

<div class="table-responsive">
<table class='table table-bordered'>
<thead class='thead-dark'>
<tr>
<?php
echo "<th>Date</th>";

for($i=1;$i<=$number_of_hours_per_day;$i++)
{
    echo "<th>Hour".$i."</th>";
    

}
?>
</tr>
</thead>
<tbody>
<?php
$chk_conn = new mysqli('localhost','root','',$_SESSION["hod_department"]);
// presenties and absentee list
if ($chk_conn->connect_error) {
    die("Connection failed: " . $chk_conn->connect_error);
}
    $sql="SELECT `date`,";
    for($i=1;$i<=$number_of_hours_per_day;$i++){        
        $hourname="hour".$i;
        if($i==($number_of_hours_per_day))
        {
             $sql.="$hourname ";
        }
        else{
            $sql.="$hourname, ";
        }
    }
    $sql.="from year".$year."_daily_attendance where `student_id`='$student_id' and student_section='$section' ORDER BY student_id ASC";
    $result = $chk_conn->query($sql);
    if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $date=$row['date'];
                $date_sam=explode("-",$row['date']);
                $dateformat=$date_sam[2]."/".$date_sam[1]."/".$date_sam[0];
      
                echo "<td>".$dateformat."</td>";
                for($i=1;$i<=$number_of_hours_per_day;$i++){        
                    
                    $display_sql = "SELECT hour_count from year".$year."_hourwise where date='".$date."'and hour=".$i." and hour_section='".$section."'";
                    $display_result = $chk_conn->query($display_sql);
                    if($display_result->num_rows>0)
                    {
                        $hourname="hour".$i;
                        if($row["$hourname"]=='1')
                        {
                            echo "<td align='center' style='background-color: #21bf73;' data-toggle='tooltip' title='$date' >P</td>";
                        }
                        else
                        {
                            echo "<td align='center' style='background-color: #fd5e53;' data-toggle='tooltip' title='$date'>A</td>"; 
                        }
                        
                    }
                    else
                    {
                            echo "<td align='center' style='background-color: #C39BD3;' data-toggle='tooltip' title='$date'>NA</td>";
                    }
                    
                }
                echo "</tr>";
        }
    }


    else {
            echo "<div class='alert alert-danger'>";
            echo "<strong>No Data Found in the Database...!</strong></div>";
            exit();
        }



$conn->close();

?>
</tbody>
</table>


</form>  

</div>

</div>
    
</div>

</div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->


</body>

</html>
