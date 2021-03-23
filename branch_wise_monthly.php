<?php
session_start();
error_reporting(E_ERROR);

if( !isset($_SESSION["p_email"]) ){
  header("location:Principallogin.php");
  exit();
}
else{ 
    include 'principalsidenav.php';
}

?>
<?php
//current date 
$present_date=date("Y-m-d");
$present_month=date('Y-m');
$month_start=$present_month."-01";
$branches = array( "CSE","ME","CE","IT","EEE","ECE","MIN"); //branches
// Create connection
$c=0;
$select_hour=$_POST["hour"]; // principal selects

// default value
$avg[0]=0; //cse
$avg[1]=0;  //me
$avg[2]=0;  //ce
$avg[3]=0;  //it
$avg[4]=0;  //eee
$avg[5]=0;  //ece
$avg[6]=0;   //min

//foreach($branches as $branch)
//{
$total_presenties=0;
$total_count=0;
$conn = new mysqli("localhost","root","","CSE"); // cse connection $branch
// Check connection
 if ($conn->connect_error) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>No Data Found.</strong></div>";
    exit();
 }
for($i=2;$i<=3;$i++)
{
$presenties_sql = "SELECT count(hour".$select_hour.") FROM year".$i."_daily_attendance where hour".$select_hour."=1 and date BETWEEN '".$month_start."' AND '".$present_date."'";
$presenties_result = $conn->query($presenties_sql);
if ($presenties_result->num_rows < 0) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>No Data Found.</strong></div>";
    exit();


}
$presenties_row = $presenties_result->fetch_assoc();
$total_presenties+=(float)$presenties_row["count(hour".$select_hour.")"];
$count_sql = "SELECT count(hour".$select_hour.") FROM year".$i."_daily_attendance where  date BETWEEN '".$month_start."' AND '".$present_date."'";
$count_result = $conn->query($count_sql);
$count_row = $count_result->fetch_assoc();
$total_count+=(float)$count_row["count(hour".$select_hour.")"];
}
if($total_count == 0){
    $avg[$c]=0;
    $c++;

}
else{
$average=($total_presenties/($total_count))*100;
$avg[$c]=$average;
//echo $average."/";

$c++;
}


//}



$conn->close();
$dataPoints1= array( );
$dataPoints2= array( );  

for ($i=0; $i<sizeof($branches); $i++) {

    $dataPoints1[] = array(
        "label"=>$branches[$i],"y"=>(100-$avg[$i])
       );
 
    $dataPoints2[] = array(
     "label"=>$branches[$i],"y"=>$avg[$i]
    );
      }
 

    
?>


<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "TOTAL BRANCH WISE MONTHLY ATTENDANCE"    },
    legend:{
        cursor: "pointer",
        verticalAlign: "center",
        horizontalAlign: "right",
        itemclick: toggleDataSeries
    },
    data: [{
        type: "column",
        name: "ABSENTIES",
        indexLabel: "{y}",
        yValueFormatString: "#0.##",
        showInLegend: true,
        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
    },{
        type: "column",
        name: "PRESENTIES",
        indexLabel: "{y}",
        yValueFormatString: "#0.##",
        showInLegend: true,
        dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
function toggleDataSeries(e){
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    }
    else{
        e.dataSeries.visible = true;
    }
    chart.render();
}
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



</div>
</div><!-- .content -->
    </div><!-- /#right-panel -->
    </div>
    <!-- Left Panel -->
    <!-- Right Panel -->
</body>

</html>
