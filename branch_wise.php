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
$date=$_POST["dateofattendance"];
$ex_date=explode("-",$date);
//$date="2019-12-19";
$branches = array( "CSE","ME","CE","IT","EEE","ECE","MINING"); //branches
// Create connection
$c=0;


// default value
$avg[0]=0; //cse
$avg[1]=0;	//me
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
$numerator=0;
$denomerator=0;
for($i=1;$i<=4;$i++)
{
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
}
if($denomerator==0){
	$average=0;
$avg[$c]=$average;
$c++;

}
else{
$average=($numerator/$denomerator)*100;
$avg[$c]=$average;
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
		text: "TOTAL BRANCHWISE ATTENDANCE on <?php echo $ex_date[2]."-".$ex_date[1]."-".$ex_date[0];  ?>"
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "ABSENTIES PERCENTAGE",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "PRESENTIES PERCENTAGE",
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
   

</body>

</html>
