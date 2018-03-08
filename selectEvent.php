<?php
	//Get the Event data from the server.
try {
	//connect to database
	require 'connectPDO3.php';
	
	$event_id="";
	$event_name="";
	$event_description="";
	$event_presenter="";	
	$event_date="";
	$event_time="";	
	
	//create query
	//$stmt = $conn->prepare("SELECT event_id, event_name, event_description, event_presenter, DATE_FORMAT(event_date, '%m-%d-%Y') AS event_date, TIME_FORMAT( event_time,'%l:%i %p' )AS event_time FROM wdv341_events");
	
	$stmt->execute();
	
	} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}		
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#E5C8EE;
			padding:10px;
			border-radius: 25px;	
			border-style: solid;			
		}
		
		.titleBlock{
			width:700px;
			margin-left:auto;
			margin-right:auto;
			background-color:#E5C8EE;
			padding:10px;
			border-radius: 25px;	
			border-style: solid;			
		}		
		
		body{
			background-color:#ACC8E1;
		}
		
		.displayEvent{
			text_align:left;
			font-size:18px;	
		}
		
		.displayDescription {
			margin-left:100px;
		}
		
		.style {
			text-align: center;
		}
		
		button {
			padding: 15px 30px;
			display:block;			
			margin:0 auto;
			background-color: #F3D6E4;
			border: solid;
			border-radius: 25px;			
		}
	</style>
</head>

<body>
	<div class="titleBlock">
    <h1 class="style">Intro PHP</h1>
    <h2 class="style">Events formatted in blocks</h2>   
    <h3 class="style">There are <?php echo $stmt->rowCount(); ?> events available today.</h3>
	</div>
<br>
	<a href=""><button>View PHP</button></a>	
	
<?php
	//each row as formatted output
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	//Turn each row of the result into an associative array 
  	{
		//creates a block of formatted text
?>	

	<p>
        <div class="eventBlock">	
            <div>
            	<span class="displayEvent">Event: <?php echo $row["event_name"]; ?></span>
            	<span class="displayDescription">Description: <?php echo $row["event_description"]; ?></span>
            </div>
            <div>
            	Presenter: <?php echo $row["event_presenter"]; ?>
            </div>
            <div>
            	<span class="displayTime">Time: <?php echo $row["event_time"]; ?></span>
            </div>
            <div>
            	<span class="displayDate">Date: <?php echo $row["event_date"]; ?></span>
            </div>
        </div>
    </p>
<?php	
  	}
$statement = null;
$conn = null;	//Close database connection	
?>
</div>	
</body>
</html>