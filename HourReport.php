<?php
session_start();
error_reporting(E_ERROR);
if( !isset($_SESSION["hod_email"]) ){
  header("location:HODLogin.php");
  exit();
}
 else{
    include 'HodHeader1.php';
 } 
?>
<?php
if($_POST){
    $select_year=$_POST["year"];
    $department=$_SESSION["hod_department"];
    $select_date=$_POST["dateofattendance"];
    $_SESSION["dateofabsentees"]=$select_date;
    $conn = new mysqli('localhost','root','','authority');
    // Check connection
    $s_date;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT year".$select_year.",number_of_hours_per_day from department_info where department_name='".$department."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
            $no_of_sections= (int)$row["year".$select_year];
            $number_of_hours_per_day=(int)$row['number_of_hours_per_day'];
    } 
    else {
        echo "<h4>Department Info is missing.</h4>";
        exit();
    }
?>

        <!-- Header-->
<div class='container' id="hrp">
<h5>Year: <?php echo $select_year;?>  Hourwise Data</h5><br>
<?php
$s_date=explode("-",$select_date);
echo '<h6>Date :<strong>'.$s_date[2]."-".$s_date[1]."-".$s_date[0].'</strong></h6>';
?>
<?php
$content = '';
$content .= '<div>
<img src="mrec.jpeg" alt="logo" height="150" width="700">
</div>
';
$content .= '<h4>Date:'.$select_date.'</h4>';
$content .= '<h4>Department:'.$department.'</h4>
<h5>Year:'.$select_year.' Hourwise Data</h5>';

?>
<div class="table-responsive">
<table class='table table-bordered'>
<thead class='thead-dark'>
<tr>
<th>Sections</th>
<?php
$content.='<table border="1" cellspacing="0" cellpadding="3" ><tr><th>Sections</th>';
for($i=1;$i<=$number_of_hours_per_day;$i++)
{
    echo "<th>Hour".$i."</th>";
    $content.='<th>Hour'.$i.'</th>';

}
$content.= '</tr>';
?>
<th>comparison</th>
</tr>
</thead>
<tbody>
<?php
$display_conn = new mysqli('localhost','root','',$_SESSION["hod_department"]);
// Check connection
if ($display_conn->connect_error) {
    die("Connection failed: " . $display_conn->connect_error);
}

for($j=0;$j<$no_of_sections;$j++){ 
    $sec=chr(65+$j);
    echo "<tr>";
    $content.= '<tr>';
    echo "<td>".$sec."</td>";
    $content.= '<td>'.$sec.'</td>';

    for($i=1;$i<=$number_of_hours_per_day;$i++){
        $display_sql = "SELECT hour_count from year".$select_year."_hourwise where date='".$select_date."'and hour=".$i." and hour_section='".$sec."'";
        $display_result = $display_conn->query($display_sql);
        if($display_result->num_rows>0){
            $total="";
            $p=0;   //presentees
            $a=0;   //absentees
            while($display_row = $display_result->fetch_assoc()){
                $temporary=explode("/",$display_row["hour_count"]);
                $p+=(int)$temporary[0];
                $a+=(int)$temporary[1];
            }
            echo "<td><a target='_blank' href='AbsenteesList.php?section=$sec&hour=$i&year=$select_year'>".$p."/".$a."</a></td>";
            $content.= '<td>'.$p.'/'.$a.'</td>';
            $presentees[$j][$i-1]=(int)$p;
            $absentees[$j][$i-1]=(int)$a;
        }
        else{
            echo "<td>NA</td>";
            $content.= '<td>NA</td>';
            $presentees[$j][$i-1]="NA";
            $absentees[$j][$i-1]="NA";
        }
    }
    echo "<td><a target='_blank' href='comparelist.php?section=$sec&date=$select_date&year=$select_year'><button type='button' class='btn btn-info'>Show List</button></a></td>";
    echo "</tr>";
    $content.= '</tr>';
}
echo "<tr><th>Total</th>";
$content.= '<tr><th>Total</th>';
for($j=0;$j<$number_of_hours_per_day;$j++){
    $sections="";
    $count=0;
    $temp1=0;   //to store presentees;
    $temp2=0;   //to store Absentees;
    for($i=0;$i<$no_of_sections;$i++){
        if($presentees[$i][$j]=="NA")
            $count++;
        else{
            $temp1+=$presentees[$i][$j];
            $temp2+=$absentees[$i][$j];
            $sections.=chr($i+65).",";
        }
    }
    $temp=$j+1;
    if($count==$no_of_sections)
    {
        echo "<td>NA</td>";

        $content.= '<td>NA</td>';
    }
    else
    {
        echo "<td><a target='_blank' href='AbsenteesList.php?hour=$temp&year=$select_year&sections=$sections'>".$temp1."/".$temp2."</a></td>";
        $content.= '<td>'.$temp1.'/'.$temp2.'</td>';

    }
    
}
echo "</tr>";
 $content.= '</tr>';
echo "<tr><th>Percentage</th>";
$content.= '<tr><th>Percentage</th>';
for($j=0;$j<$number_of_hours_per_day;$j++){
    $sections="";
    $count=0;
    $temp1=0;   //to store presentees;
    $temp2=0;   //to store Absentees;
    for($i=0;$i<$no_of_sections;$i++){
        if($presentees[$i][$j]=="NA"){
            $count++;
        }
        else{
            $temp1+=$presentees[$i][$j];
            $temp2+=$absentees[$i][$j];
            $sections.=chr($i+65).",";
        }
    }
    $temp=$j+1;
    if($count==$no_of_sections)
    {
        echo "<td>NA</td>";
        $content.= '<td>NA</td>';
    }
    else{
        echo "<td>".sprintf("%0.2f",(($temp1/$temp2)*100))."%</td>";
        $content.= '<td>'.sprintf("%0.2f",(($temp1/$temp2)*100)).'%</td>';
    }
}
echo "</tr>";

$content.= '</tr></table>';
$conn->close();
}
?>
</tbody>
</table>
 <div class="col-md-12" align="right">
<form  action="pdfgen.php" method="post" target="_blank"> 
<input type='hidden' value='<?php echo $content ?>' name='conte'/>
<br><a href="HourInput.php">Back to Select Year Page</a>
<input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
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
