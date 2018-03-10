
<html>

<head>


	<?php
	
		$language = array("PHP","HTML","Javascript");
	
		$assignment = "PHP Basic";
	
		$yourName = "Kathy";
		
		$number1 = 1;
		$number2 = 2;
		$total = $number1 + $number2;
	?>
		<h1 style = "text-align: center;">This is the <?php echo $assignment;?> assignment.</h1>
		
		<p style = "text-align: center;">displayed by the variable $number1, which is the number 1.<br><em><strong><?php echo $number1;?></p></em></strong>
	<br>
		<p style = "text-align: center;">displayed by the variable $number2, which is the number 2.<br><em><strong><?php echo $number2;?></p></em></strong>
	<br>
		<p style = "text-align: center;">displayed by the variable $total, which adds the $number1 and $number2 variable's values. In this case, $total adds 1 + 2 to equal 3. <br><em><?php echo $total;?></p></em></strong>
	<br>
		
		<h2 style = "text-align: center">My name is: <?php echo $yourName;?></h2>
	<br>
		<li style = "text-align: center;"><?php echo $language[0];?></li>
		<li style = "text-align: center;"><?php echo $language[1];?></li>
		<li style = "text-align: center;"><?php echo $language[2];?></li>
	
</head>

<body>


</html>
=======
<html>

<head>


	<?php
	
		$language = array("PHP","HTML","Javascript");
	
		$assignment = "PHP";
	
		$yourName = "Kathy";
		
		$number1 = 1;
		$number2 = 2;
		$total = $number1 + $number2;
	?>
		<h1 style = "text-align: center;">This is the <?php echo $assignment;?> assignment.</h1>
		
		<p style = "text-align: center;">displayed by the variable $number1, which is the number 1.<br><?php echo $number1;?></p>
	<br>
		<p style = "text-align: center;">displayed by the variable $number2, which is the number 2.<br><?php echo $number2;?></p>
	<br>
		<p style = "text-align: center;">displayed by the variable $total, which adds the $number1 and $number2 variable's values. In this case, $total adds 1 + 2 to equal 3. <br><?php echo $total;?></p>
	<br>
		
		<h2 style = "text-align: center">My name is: <?php echo $yourName;?></h2>
	<br>
		<li style = "text-align: center;"><?php echo $language[0];?></li>
		<li style = "text-align: center;"><?php echo $language[1];?></li>
		<li style = "text-align: center;"><?php echo $language[2];?></li>
	
</head>



</body>

</html>
