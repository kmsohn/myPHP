<?php
//connect to database
include "connectPDO3.php";
	
// create SELECT query
$sql = "SELECT event_id, event_name, event_description, event_presenter, event_day, event_time FROM wdv341_events";
//run SELECT query

//if the query runs successfully...
if($result) 
{
	//if there are more than zero results...
	if($result->rowCount() > 0)
	{
		//display the # of results
		$display = "<p>There are ". $result->rowCount() ." result(s)</p>"; 
	
		//start table for results with headers
		$display .= "<table class='tableFormat'>";
		$display .= "<tr><th>Event ID</th>";
		$display .= "<th>Event Name</th>";
		$display .= "<th>Event Description</th>";
		$display .= "<th>Event Presenter</th>";
		$display .= "<th>Event Day</th>";
		$display .= "<th>Event Time</th>";
	
	
		//for each row result...
		foreach ($result as $row) 
		{
			//create a table row in order of event_name, _desc, _presenter, _date, and _time
			//Delete and Update links added
			$display .= "<tr><td>";
			$display .= $row["event_id"];
			$display .= "</td>";
			$display .= "<td>";
			$display .= $row["event_name"];
			$display .= "</td>";
			$display .= "<td>";
			$display .= $row["event_description"];
			$display .= "</td>";
			$display .= "<td>";
			$display .= $row["event_presenter"];
			$display .= "</td>";
			$display .= "<td>";
			$display .= $row["event_day"];
			$display .= "</td>";
			$display .= "<td>";
			$display .= $row["event_time"];
			$display .= "</td>";
		
			
	}
	
	//close the table
	$display .="</table>"; 
	}
	
	//else, if there are zero results...
	else
	{
		//display "no results" message
		$display = "No results found.";
	}
	
}
//else, if the query does not run successfully...
else
{
	//display error message
	$display = "<h1>Try again, nothing found!</h1>";
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
	background-color: #FAF3F4;
}
#container {
	width: 75%;
	margin: 2% 10%;
	border: 2px solid #FAF3F4;
	text-align: center;
	background-color: #FAF3F4;
	padding: 25px;
}
.tableFormat {
	border: 1px solid black;
	margin: 0 auto;
	background-color: #FAF3F4;
	
}
th {
	border: 1px solid black;
	padding: 10px;
	background-color: #BBBAC1;
	
}
td {
	border: 1px solid black;
	padding: 10px;
	text-align: center;
	background-color: #FAEFEF;
	
}
h1 {
	text-align: center;
	text-decoration: underline;
}
p {
	text-align: center;
}
</style>
</head>
<body>
<div id="container">
<h1>Events</h1>
<p><?php echo$display?></p>

</div>
</body>
</html>