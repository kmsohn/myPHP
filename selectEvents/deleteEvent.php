<?php
//connect to database
include "connectPDO2.php";
//retrieve record id (event_Id) from $_GET;
$event_Id = $_GET["id"];
//create SQL DELETE query with record id
$sql = "DELETE FROM selectevent WHERE event_id = $event_Id";
//run DELETE query
$result = $conn->query($sql);
//if the query runs successfully print  message - message deleted!
if($result)
{
	$msg = "<h3>Event ID # ".$event_Id." was successfully deleted.</h3>";
}
else
{
	$msg = "<h3>There was not an event associated with Event number ".$event_Id." Please try again.</h3>";
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
	background-color: #FAEFEF;
}
#container {
	width: 75%;
	margin: 2% 10%;
	border: 2px solid black;
	text-align: center;
	background-color: #FAEFEF;
	padding: 25px;
}
.tableFormat {
	border: 1px solid black;
	margin: 0 auto;
	background-color: #FAEFEF;
	
}
th {
	border: 1px solid black;
	padding: 10px;
	background-color: #FAEFEF;
	
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
<h1>Event DELETE Page</h1>
<?php echo $msg; ?>
<p><a href="selectEvents.php">Click here to return to the events list.</a></p>
</div>

</body>
</html>