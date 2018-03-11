// JavaScript Document
<?php
	$contactName = $_POST("contactName");
	$contactEmail = $_POST("contactEmail");
	$contactReason = $_POST("contactReason");
	$contactComments = $_POST("contactComments");
	$mailingList = $_POST("mailingList");
	$moreInformation = $_POST("moreInformation");
	
	$to = "kathleensohn@hotmail.com";
	$subject = "Contact Form Assignment";
	$body = "This is an automated message. Please don't reply to this email. \n\n $request";
	mail ($to, $subject, $body);
	
	echo "Your Message was received, we will respond within 24 hours. "
?>



<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>WDV341 Intro PHP</title>
</head>

<body>
	<h1>WDV341 Intro PHP</h1>
	<h2>PHP</h2>
	
	<p>Recipient Email Address: <?php echo $contactEmail->getRecipient(); ?></p>
	<p>Sender Email Address: <?php echo $contactEmail->getSender(); ?></p>
	<p>Subject: <?php echo $contactEmail->getSubject(); ?></p>
	<p>Message: <?php echo $contactEmail->getMessage(); ?></p>
	
	
	<?php
	if ($emailStatus) {
		?>
				<h3><?php echo $contactEmail->getMessage(); ?></h3>
	<?php			
			}else{
	?>			
				<h3>There was an error sending your email!</h3>
	<?php			
			}
	?>
	</h3>	
	
</body>
</html>