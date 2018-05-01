<?php
$serverName = "localhost";
$username = "kmsohn_wdv341";
$password = "wdv341";
$database = "kmsohn_wdv341";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    

 $stmt = $conn->prepare("INSERT INTO wdv341_events (event_name, event_day, event_time, event_description, event_presenter)
    VALUES (:eventname, :eventday, :eventtime, :eventdescription, :eventpresenter)"); //placeholders-connection points
	
	
    $stmt->bindParam(':eventname', $eventName);
	 $stmt->bindParam(':eventday', $eventDay);
	 $stmt->bindParam(':eventtime', $eventTime);
	$stmt->bindParam(':eventdescription', $eventdescription);
	$stmt->bindParam(':eventpresenter', $eventpresenter);
    
    // insert a row
	   
	
	
		$eventName = "HTML";
	$eventDay = "2018-04-21";
	$eventTime = "17:00";
	$eventdescription = "HTML";
	$eventpresenter = "";
	
  
    $stmt->execute();

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
	}

?>