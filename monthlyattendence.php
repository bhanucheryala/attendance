<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
else
    include("HodHeader1.php");
?>


<body onload="changeDisplay()">
<div class='container' id='monatt'>
<?php
$content = '';
$content .= '
<div>
<img src="mrec.jpeg" alt="logo" height="110" width="750">
</div>
';
$present_date=$_POST["todate"];

$last_week_day =$_POST["fromdate"];
$batchno=$_POST["batch"];

$dbname = $_SESSION["hod_department"];
$select_year=$_POST['year'];
$select_section=$_POST['section'.$select_year];
// this is only to display
//$presen_month=date('F'); 
$from_date=explode("-",$last_week_day);
$to_date=explode("-",$present_date);
echo "<div >";
echo '<h5>FROM:<strong>'.$from_date[2]."-".$from_date[1]."-".$from_date[0].'</strong> TO <strong>'.$to_date[2]."-".$to_date[1]."-".$to_date[0].'</strong> ATTENDANCE</h5>';

$content .= '<h5>FROM:<strong>'.$from_date[2].'-'.$from_date[1].'-'.$from_date[0].'</strong> TO <strong>'.$to_date[2].'-'.$to_date[1].'-'.$to_date[0].'</strong> ATTENDANCE</h5>';

// Create connection
$conn = new mysqli("localhost","root","", $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$subject_sql = "SELECT subject_name,subject_type from year".$select_year."_subject_info";
$subject_result = $conn->query($subject_sql);
if($subject_result->num_rows <=0){
    echo "</br><h4>No data found for Batch: $batchno</h4>";
    echo "<script>document.getElementById('monthlyattendance').style.display='none';</script>";
    exit();
}
$no_of_sub=0;
echo "<div class='table-responsive'><table border=1 id='monthlyattendance' class='table table-bordered' >
        <thead>
             <tr>
                <th>student_id</th>
                <th>student_name</th>";
                $content .= '<table border="1"cellspacing="0" cellpadding="3">
                     <tr>
                     <th width="10%">student_id</th>
                        <th width="15%">student_name</th>';
            $wid=(65)/($subject_result->num_rows);
            //echo $wid; 
    while($subject_row = $subject_result->fetch_assoc()) {
        $subject[$no_of_sub]=$subject_row['subject_name'];
        $subject_type[$no_of_sub]=$subject_row['subject_type'];
       echo "<th>" .$subject_row['subject_name']."</th>";
       $content .= '<th width="'.$wid.'%">' .$subject_row["subject_name"].'</th>';
        $no_of_sub++;
    }
    echo "<th>Total</th><th>   %   </th></tr> </thead><thead><tr > ";
    echo"<th>no. of</th><th>hours</th>";
    $content .= '<th width="5%">Total</th><th width="5%">   %   </th></tr><tr ><th colspan="2">no. of hours</th>';
  
    $Pflag=0;
    $Oflag=0;
    $total_hours=0;
    for($j=0;$j<$no_of_sub;$j++){ 
        if($subject_type[$j]=="L")
        {
            $hours_sql = "SELECT count(hour_subject) from year".$select_year."_hourwise where hour_subject='".$subject[$j]."' and hour_section='".$select_section."'and 
            batch='$batchno' and date between '".$last_week_day."' and '".$present_date."'";
        
        }
        else{
        $hours_sql = "SELECT count(hour_subject) from year".$select_year."_hourwise where hour_subject='".$subject[$j]."' and hour_section='".$select_section."'and  date between '".$last_week_day."' and '".$present_date."'";
        
        }
        $hours_result = $conn->query($hours_sql);
        if($hours_result->num_rows <=0){
            echo "<h4>No data found for Batch: $batchno</h4>";
            echo "<script>document.getElementById('monthlyattendance').style.display='none';</script>";
            exit();
        }
        $hours_row = $hours_result->fetch_assoc();

        $each_hours=$hours_row['count(hour_subject)'];
        echo "<th>".$each_hours."</th>";
        $content .= '<th>'.$each_hours.'</th>';
        if($subject_type[$j]=="P" and $Pflag==0){
            $Pflag=1;
	$total_hours+=(int)$each_hours;
        }
        else if($subject_type[$j]=="O" and $Oflag==0){
            $Oflag=1;
	$total_hours+=(int)$each_hours;
        }
        else if($subject_type[$j]!="P" and $subject_type[$j]!="O"){
        $total_hours+=(int)$each_hours;
        }
    }
    
    
    echo "<th>".$total_hours."</th><th>100</th></tr></thead>";
    $content .= '<th>'.$total_hours.'</th><th>100</th></tr>';












$student_sql = "SELECT student_id,student_name,professional_elective,open_elective from year".$select_year."_student_info where student_section='".$select_section."' and Lab='$batchno'";
$student_result = $conn->query($student_sql);
    while($student_row = $student_result->fetch_assoc()) {
        echo "<tbody><tr>";
        $content .= '<tr>';
        $student_id=$student_row['student_id'];
       $student_name=$student_row['student_name'];
       $prof_ele=$student_row['professional_elective'];
       $open_ele=$student_row['open_elective'];
       echo "<td>".$student_id."</td>";
       echo "<td>".$student_name."</td>";
       $content .= '<td>'.$student_id.'</td><td>'.$student_name.'</td>';
      
       $each_person_hours=0;
       for($i=0;$i<$no_of_sub;$i++)//subject
        {
            $hour_sql = "SELECT date,hour from year".$select_year."_hourwise where hour_subject='".$subject[$i]."' and hour_section='".$select_section."'and  date between '".$last_week_day."' and '".$present_date."'";
            if($subject_type[$i]=='L')
            {
                $hour_sql = "SELECT date,hour from year".$select_year."_hourwise where hour_subject='".$subject[$i]."' and hour_section='".$select_section."' and batch='$batchno' and date between '".$last_week_day."' and '".$present_date."'";
                $hour_result = $conn->query($hour_sql);
                $count=0;
                while($hour_row = $hour_result->fetch_assoc()) 
                {
                    $hour=$hour_row['hour'];
                    $hour_date=$hour_row['date'];
                    $count_sql = "select hour".$hour." from year".$select_year."_daily_attendance where date='".$hour_date."' and student_id='".$student_id."'"; 
                    $count_result = $conn->query($count_sql);
                    $count_row = $count_result->fetch_assoc();
                    $count=$count+(int)$count_row["hour".$hour];
    
                 }
                
    
                 echo "<td>".$count."</td>";
                 $content .= '<td>'.$count.'</td>';
                 $each_person_hours+=$count;
            }
            
            
            else if($subject_type[$i]=='P')
            {
                $hour_result = $conn->query($hour_sql);
                if($prof_ele==$subject[$i])
                {
                    $count=0;
                    while($hour_row = $hour_result->fetch_assoc()) 
                    {
                        $hour=$hour_row['hour'];
                        $hour_date=$hour_row['date'];
                        $count_sql = "select hour".$hour." from year".$select_year."_daily_attendance where date='".$hour_date."' and student_id='".$student_id."'"; 
                        $count_result = $conn->query($count_sql);
                        $count_row = $count_result->fetch_assoc();
                        $count=$count+(int)$count_row["hour".$hour];
                    }
                    echo "<td>".$count."</td>";
                    $content .= '<td>'.$count.'</td>';
                    $each_person_hours+=$count;
                }
                else{
                    echo "<td>-</td>";
                    $content .= '<td>-</td>';
                }
            }
            else if($subject_type[$i]=='O')
            {
                $hour_result = $conn->query($hour_sql);
                if($open_ele==$subject[$i])
                {
                    $count=0;
                    while($hour_row = $hour_result->fetch_assoc()) 
                    {
                        $hour=$hour_row['hour'];
                        $hour_date=$hour_row['date'];
                        $count_sql = "select hour".$hour." from year".$select_year."_daily_attendance where date='".$hour_date."' and student_id='".$student_id."'"; 
                        $count_result = $conn->query($count_sql);
                        $count_row = $count_result->fetch_assoc();
                        $count=$count+(int)$count_row["hour".$hour];
                    }
                    echo "<td>".$count."</td>";
                    $content .= '<td>'.$count.'</td>';
                    $each_person_hours+=$count;
                }
                else{
                    echo "<td>-</td>";
                    $content .= '<td>-</td>';
                }
            }
            else
            {
                $hour_result = $conn->query($hour_sql);
            $count=0;
            while($hour_row = $hour_result->fetch_assoc()) {
                $hour=$hour_row['hour'];
                $hour_date=$hour_row['date'];
                $count_sql = "select hour".$hour." from year".$select_year."_daily_attendance where date='".$hour_date."' and student_id='".$student_id."'"; 
                $count_result = $conn->query($count_sql);
                $count_row = $count_result->fetch_assoc();
                $count=$count+(int)$count_row["hour".$hour];


        


                
             }
            

             echo "<td>".$count."</td>";
             $content .= '<td>'.$count.'</td>';
             $each_person_hours+=$count;
            }
        }
        echo "<td>".$each_person_hours."</td>";
        $content .= '<td>'.$each_person_hours.'</td>';
        $avg=($each_person_hours/$total_hours)*100;
        $avg = sprintf ("%.2f", $avg);
        echo "<td>".$avg."</td>";
        $content .= '<td>'.$avg.'</td></tr>';
        
        echo "</tr>";
        

    }//student
    echo "</tbody></table>";
    $content .= '</table></div>';
   echo "</div>"; 




$conn->close();


?>
<div class="col-md-12" align="right">
<form  action="ppdfgen.php" method="post" target="_blank"> 
<input type='hidden' value='<?php echo $content ?>' name='conte'/>

<input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
</form>  

</div>

</div>

	
               
</body>
</html>
