<?php
	//Get the Event data from the server.
		include 'connectPDO.php';
	
	//get all events
	$queryAllEvents = 'SELECT *,DATE_FORMAT(appt_date,"%m-%d-%Y") AS formattedDate, Time_format(appt_time, "%h:%i %p") AS appt_time FROM appointment';
	$stmt = $conn->prepare($queryAllEvents);
	$stmt->execute();
	$events = $stmt->fetchAll();
	$stmt->closeCursor();
	$message = "<h1>The following has been found: " .$stmt->RowCount() . " " . "events are available</h1>";
	
	
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Jessy James Hair Salon</title>
    <style>
		.header {
			text-align:center;
		}
		.eventBlock{
			width:90%;
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
<div class="header">
<h1>Welcome to Our Salon</h1>
    <h2>Below is a list scheduled appointments</h2>   
    <h3> <?php echo $message; ?></h3>
</div>
    

<?php
	//Display each row as formatted output
	foreach ($events as $events)	
	//Turn each row of the result into an associative array 
  	{		
		//For each row you have in the array create a block of formatted text
?>
	<p>
        <div class="eventBlock">	
            <div>
            	<span class="displayStylists">Stylists Name:</span>
				<?php echo $events['stylist_name']; ?>

            	<span class="displayClient">Client Name:</span>
				<?php echo $events['client_name']; ?> 
            </div>
            <div>
            	Presenter: <?php echo $events['event_presenter']; ?>
            </div>
            <div>
            	<span class="displayTime">Time:</span>
				<?php echo $events['appt_time']; ?>
            </div>
            <div>
            	<span class="displayDate">Date:</span>
				<?php echo $events['formattedDate']; ?>
            </div>
        </div>
    </p>

<?php
  	}//close foreach
?>
</div>
</body>
</html>