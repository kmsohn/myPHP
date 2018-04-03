<?php
$serverName = "localhost";
$username = "root";
$password = "";
$database = "php_class";

try {
	
    $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Connected successfully"; 

 $stmt = $conn->prepare("SELECT event_id, event_name, event_description, event_presenter, event_date, event_time FROM selectevent");
    $stmt->execute();
	
?>

	
	<?php
	echo "<table border = 2>";
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	echo "<tr>";
			echo "<td>" . $row['event_id'] . "</td>";
			echo "<td>" . $row['event_name'] . "</td>";	
			echo "<td>" . $row['event_description'] . "</td>";
			echo "<td>" . $row['event_presenter'] . "</td>";
			echo "<td>" . $row['event_date'] . "</td>";
		echo "<td>" . $row['event_time'] . "</td>";
		
			echo "<td><a href='updateEvent.php?eventID=" . $row['event_id'] . "'>Update</a></td>"; 
			echo "<td><a href='deleteEvent.php?eventID=" . $row['event_id'] . "'>Delete</a></td>"; 		
		echo "</tr>";
	}
	
	
    

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
	}

?>