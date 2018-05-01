<?php
$serverName = "localhost";
$username = "root";
$password = "";
$database = "inclasstest";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    

 $stmt = $conn->prepare("INSERT INTO wdv341_events (event_name, event_day, event_time, event_description, event_presenter)
    VALUES (:eventname, :eventday, :eventtime, :eventdescription, :eventpresenter)"); //placeholders-connection points
	
	
    $stmt->bindParam(':eventname', $eventName);
	 $stmt->bindParam(':eventday', $eventDay);
	 $stmt->bindParam(':eventtime', $eventTime);
	$stmt->bindParam(':eventdescription', $eventdescription);
	$stmt->bindParam(':eventpresenter', $eventpresenter);
    
    // insert a row
	   $eventName = "Harlem Globtrotters";
	$eventDay = "2018-04-07";
	$eventTime = "12:00";
	$eventdescription = "The Harlem Globetrotters known for their one-of-a-kind family entertainment";
	$eventpresenter = "The Trotters";
	
	$eventName = "Jeff Durham";
	$eventDate = "2018-04-08";
	$eventTime = "14:00";
	$eventdescription = "Dunham, a Guinness World Record holder for “Most Tickets Sold for a Stand-up Comedy Tour";
	$eventpresenter = "Jeff Durnham";
	
  
    $stmt->execute();

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
	}

?>