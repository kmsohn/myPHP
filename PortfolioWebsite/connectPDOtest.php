<?php
$serverName = "localhost";
$username = "kmsohn_wdv341";
$password = "wdv341";
$database = "kmsohn_wdv341";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    

 $stmt = $conn->prepare("INSERT INTO wdv341_events (stylist_name, client_name, appt_date, appt_time, additional_services)
    VALUES (:stylistname, :apptday, :eventtime, :eventdescription, :eventpresenter)"); //placeholders-connection points
	
	
    $stmt->bindParam(':stylistname', $stylistName);
	 $stmt->bindParam(':clientname', $clientName);
	 $stmt->bindParam(':apptday', $apptDay);
	 $stmt->bindParam(':appttime', $apptTime);
	$stmt->bindParam(':additionalservices', $additionalServices);
	
    // insert a row
	   
	
	
	$stylistName = "Jess";
	$clientName = "Suzy Q";
	$apptDay = "2018-04-21";
	$apptTime = "17:00";
	$additionalServices = "Hair Style";
	
	
  
    $stmt->execute();

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
	}

?>