<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>External Email File</title>
</head>

<body>

<?php
	
	include 'Emailer.php';
	
	$newEmail = new Emailer(); //instantiate a new object/variable
	
	
	
	$newEmail->setSendTo("kathleensohn@hotmail.com");
	
	echo $newEmail->getSendTo();
	
	
	
	$newEmail->setSentFrom("kathleensohn@hotmail.com");
	
	echo $newEmail->getSentFrom();
	
	
	
	$newEmail->sendEmail(); 
	
	echo $newEmail->sendEmail();
		
	
	?>
	
	
</body>
</html>
