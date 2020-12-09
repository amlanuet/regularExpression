<?php
$servername = "localhost";
$username = "user_1";
$password = "toor";
$dbname = "regulairEx";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT date, status_code, ip FROM logs";
$result = $conn->query($sql);

if ($result->num_rows < 1) {
	while($row = $result->fetch_assoc()) {
                echo "ip:" . $row["ip"]. "<br>";
	};
} else {
        echo "more than 1 result";
}
# $conn->close();
?>

<DOCTYPE html>
<html>
        <header>
        <script src="https://www.gstatic.com/charts/loader.js"></script>
          <script>
            google.charts.load('current', {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawVisualization);

	    function drawVisualization() {
		    var data = google.visualization.arrayToDataTable([
			      ['date', 'status_code'],
<?php
while($row = $result->fetch_assoc())
{
	echo "[".$row["status_code"].", ".$row["date"]."],";
}
echo "[0, 0]"
?>

]);
                var options = {
                  title : 'test',
                  vAxis: {title: 'date'},
                  hAxis: {title: 'status_code'},
		  seriesType: 'bars',
		  series: {5: {type: 'line'}}
                };

	        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
	        chart.draw(data, options);
	      } 
	   </script>

        </header>
        <body>
        <div id="dashboard_div">
                <div id="myPieChart"></div>
                <div id="chart_div" style="width: 900px; height:500px;"></div>
        </div>
        </body>
</html>
