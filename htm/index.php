<?php
$servername = "localhost";
$username = "user_1";
$password = "toor";
$dbname = "regulairEx";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ip FROM logs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                echo "ip:" . $row["ip"]. "<br>";
        }
} else {
        echo "0 results";
}
$conn->close();
?>

<DOCTYPE html>
<html>
        <header>
	<script src="https://www.gstatic.com/charts/loader.js"></script>
	  <script>
	    google.charts.load('current', {packages: ['corechart']});
	    google.charts.setOnLoadCallback(drawVisualization);

	    
	      function drawVisualization() {
	        // Some raw data (not necessarily accurate)
	        var data = google.visualization.arrayToDataTable();

	        var options = {
	          title : 'Monthly Coffee Production by Country',
	          vAxis: {title: 'Cups'},
	          hAxis: {title: 'Month'},
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
                <div id="chart_div"></div>
        </div>
        </body>
</html>
