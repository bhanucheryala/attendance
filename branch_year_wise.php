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
//current date 
$c=1;
$date=$_POST["dateofattendance"];
$select_branch =$_POST['department']; //principal selects

// default values
$avg[1]=0; //1
$avg[2]=0;  //2
$avg[3]=0;  //3
$avg[4]=0;  //4


$conn = new mysqli("localhost","root","",$select_branch); // cse connection $select_branches
// Check connection
if ($conn->connect_error) {
    echo "<div class='alert alert-danger'>";
    echo "<strong>No Data Found.</strong></div>";
	exit();
}

for($i=1;$i<=4;$i++)
{
    $numerator=0;
    $denomerator=0;
	$sql = "SELECT hour_count from year".$i."_hourwise where date='".$date."'";
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
        $avg[$c]=$average;
        $c++;
    
    }
    else
    {
    $average=($numerator/$denomerator)*100;
    $avg[$c]=$average;
    $c++;
    }
    



}




 
$dataPoints2 = array(
    array("label"=> "FIRST_YEAR", "y"=> $avg[1]),
    array("label"=> "SECOND_YEAR", "y"=> $avg[2]),
    array("label"=> "THIRD_YEAR", "y"=> $avg[3]),
    array("label"=> "FOURTH_YEAR", "y"=> $avg[4])
);
$dataPoints1 = array(
    array("label"=> "FIRST_YEAR", "y"=> (100-$avg[1])),
    array("label"=> "SECOND_YEAR", "y"=> (100-$avg[2])),
    array("label"=> "THIRD_YEAR", "y"=> (100-$avg[3])),
    array("label"=> "FOURTH_YEAR", "y"=> (100-$avg[4]))
);
    
?>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "<?php echo strtoupper($select_branch) ?> YEAR WISE ATTENDANCE"
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
