<?php
$serverName = "localhost";
$username = "root";
$password = "";
$database = "wdv341_event";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    

 $stmt = $conn->prepare("INSERT INTO wdv341_event (event_name, event_date, event_time)
    VALUES (:eventname, :eventday, :eventtime)"); //placeholders-connection points
    $stmt->bindParam(':eventname', $eventName);
	 //$stmt->bindParam(':eventday', $eventDay);
	 //$stmt->bindParam(':eventtime', $eventTime);
	
    
    // insert a row
    $eventName = "Girls Basketball";
	$eventDate = "2018-03-05";
	$eventTime = "18:00";
  
    $stmt->execute();

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
	}

?>