<?php
$serverName = "localhost";
$username = "root";
$password = "";
$database = "php_class";

try {
	 $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    } 
	
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
	
