<?php
 include "connection.php";

$dataPoints = array( 
	array("y" => 3373.64, "label" => "ICPC" ),
	array("y" => 2435.94, "label" => "Exam Committee" ),
	array("y" => 612.453, "label" => "Others" )
);

$test=array();
$count=0;
$res=mysqli_query($db,"SELECT * FROM type");
while($row=mysqli_fetch_array($res))
{
    $test[$count]["label"]=$row["type_name"];
    $test[$count]["y"]=$row["amount"];
    $count=$count+1;
}
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Meetings"
	},
	axisY: {
		title: "Meetings (in Years)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## ",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>            