<?php
$database = "kmsohn_jessy";
$hostname = "localhost";
$username = "kmsohn_jessy";
$password = "jessy";
try {
	$conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
	
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>