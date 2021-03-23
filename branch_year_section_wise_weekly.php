<?php
session_start();
error_reporting(E_ERROR);

if( !isset($_SESSION["p_email"]) ){
  header("location:Principallogin.php");
  exit();
}
else
    include 'principalsidenav.php';
?>
<?php
$present_date=$_POST["todate"];

$last_week_day =$_POST["fromdate"];
$year_select=$_POST['year']; // select from principal 

$dbname=$_POST['department']; // select from principal
$conn = new mysqli("localhost","root","",$dbname);
//if connection fails
if ($conn->connect_error) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>No Data Found.</strong></div>";
    exit();
}

// select from principal 

// selecting distict section in an year
$sql = "SELECT DISTINCT student_section FROM year".$year_select."_student_info order by student_section";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $c=0;
    while($row = $result->fetch_assoc()) {
        $section[$c]=$row["student_section"]; // A B C D
        $c++;
    }
} else {
    echo "<div class='alert alert-danger'>";
    echo "<strong>No Data Found.</strong></div>";
    exit();
}


for($i=0;$i<$c;$i++)
{
    $numerator=0;
    $denomerator=0;
	$sql = "SELECT hour_count from year".$year_select."_hourwise where date BETWEEN '".$last_week_day."' AND '".$present_date."' and hour_section='".$section[$i]."'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()) 
		{
			$hour_count=$row["hour_count"];
			$ratio=explode("/",$hour_count);
			$numerator+=(int)$ratio[0];
			$denomerator+=(int)$ratio[1];

        }
       
    }
    
	else
	{
		//later
    }
    if($denomerator==0)
    {
        $average=0;
        $avg[$i]=$average;
        
    }
    else
    {
    $average=($numerator/$denomerator)*100;
    $avg[$i]=$average;

    }
}
$dataPoints1= array( );
$dataPoints2= array( );

for ($i=0; $i <$c; $i++) {

    $dataPoints1[] = array(
        "label"=>$section[$i]." SECTION","y"=>(100-$avg[$i])
       );
 
    $dataPoints2[] = array(
     "label"=>$section[$i]." SECTION","y"=>$avg[$i]
    );
      }
    
?>


<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "<?php echo strtoupper($dbname)?> YEAR<?php echo $year_select?> WEEKLY SECTION WISE ATTENDANCE"
    },
    legend:{
        cursor: "pointer",
        verticalAlign: "center",
        horizontalAlign: "right",
        itemclick: toggleDataSeries
    },
    data: [{
        type: "column",
        name: "Absenties Percentage",
        indexLabel: "{y}",
        yValueFormatString: "#0.##",
        showInLegend: true,
        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
    },{
        type: "column",
        name: "Presenties Percentage",
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
