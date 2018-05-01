<?php
	
	include 'connectPDO3.php';			//connects to the database


?>

<?php 
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
		echo "<td>" . $row['event_id'] . "</td>";
		echo "<td>" . $row['event_name'] . "</td>";	
		echo "<td>" . $row['event_description'] . "</td>";
		
		echo "<td>" . $row['event_presenter'] . "</td>";
		echo "<td>" . $row['event_day'] . "</td>";
		echo "<td>" . $row['event_time'] . "</td>";
		
				
		echo "</tr>";
		
	}


?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV341 Intro PHP  - Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;	
		}
		
		.displayEvent{
			text_align:left;
			font-size:18px;	
		}
		
		.displayDescription {
			margin-left:100px;
		}
	</style>
</head>

<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Example Code - Display Events as formatted output blocks</h2>   
    <h3> <?php echo $query->num_rows; ?> Events are available today.</h3>

<?php
	//Display each row as formatted output
	while( $query->fetch() )		
	//Turn each row of the result into an associative array 
  	{
		//For each row you have in the array create a block of formatted text
?>
	<p>
        <div class="eventBlock">	
            <div>
            	<span class="displayEvent">Event:</span>
            	<span class="displayDescription">Description:</span>
            </div>
            <div>
            	Presenter:
            </div>
            <div>
            	<span class="displayTime">Time:</span>
            </div>
            <div>
            	<span class="displayDate">Date:</span>
            </div>
        </div>
    </p>

<?php
  	}//close while loop
	$query->close();
	$connection->close();	//Close the database connection	
?>
</div>	
</body>
</html>