<?php
//connect to database
include "connectTest.php";
$eventId= $_GET["id"];
//variables to filled from form
$inStylistName = "";
$inClientName = "";
$inApptDate = "";
$inApptTime = "";
$inAdditionalServices = "";
$inCustomer = "";

//variables to hold error messages
$stylistNameError = "";
$clientNameError = "";
$apptDateError = "";
$apptTimeError = "";
$AdditionalServicesError = "";
$CustomerError = "";
//variable to determine if form is valid( initially set to "false" to return an invalid (initally blank) form)
$validForm = false;
//form validation functions

function validateName() //Event Name must be included
{
	global $inStylistName, $stylistNameError, $validForm;
	
	if($inStylistName == "")
	{
		$validForm = false;
		$stylistNameError = "Please enter the Stylists Name.<br>";
	}
}
function validateDescription() //Event Description must be included
{
	global $inAdditionalServices, $AdditionalServicesError, $validForm;
	
	if($inAdditionalServices == "")
	{
		$validform = false;
		$AdditionalServicesError = "Please enter the description of your event.<br>";
	}
}
function validateClient() //Event Presenter must be included
{
	global $inClientName, $clientNameError, $validForm;
	
	if($inClientName =="")
	{
			$validForm = false;
			$clientNameError = "Please enter the name of the Client.<br>";
	}
}

	  
function validateDate() //Event Date must be in mm/dd/yyyy format
{
	global $inApptDate, $apptDateError, $validForm;
	
	$date_regex = '/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/'; //mm/dd/yyyy
	
	if (!preg_match($date_regex, $inApptDate))
	{
		$validForm = false;
		$apptDateError = "Please enter your event date in the mm/dd/yyy format <br>";
	}		

}
function validateTime() //Event Start Time must be in hh:mm am/pm format
{
	global $inApptTime, $apptTimeError, $validForm;
	
	$time_regex = '((1[0-2]|0?[1-9]):([0-5][0-9]) ([AaPp][Mm]))'; //hh:mm am/pm
	
	if(!preg_match($time_regex, $inApptTime))
	{
		$validForm = false;
		$apptTimeError = "Please enter your event time - hh:mm format.<br>";
	}
}

function validateCustomer() //Event Name must be included
{
	global $inCustomer, $customerError, $validForm;
	
	if($inCustmerName == "")
	{
		$validForm = false;
		$stylistNameError = "Please enter the cusotmer Name.<br>";
	}
}
//function to determine if the "submit" button has been pressed (a form has been submitted)
if(isset($_POST["submit"]))
{
	//fill variables from form
	$inStylistName = $_POST["stylistName"];
	$inClientName = $_POST["clientName"];
	$inAdditionalServices  = $_POST["additionalServices"];
	$inApptDate = $_POST["apptDate"];
	$inApptTime = $_POST["apptTime"];
	$inCustomer = $_POST["customer"];
	
	//assume the form is valid before validating
	$validForm = true;
	
	//validate form
	validateName();
	validateDescription();
	validateClient();
	validateDate();
	validateTime();
	validateCustomer();
	//if the form has been submitted and is valid...
	if($validForm)
	{
			$sql= "UPDATE appointment SET stylist_name= '$inStylistName', client_name= '$inClientName', appt_date= '$inApptDate', appt_time= '$inApptTime' additional_services= '$inAdditionalServices’ customer= '$inCustomer’ WHERE event_id= $eventId";
		
		$result= $conn->query($sql);
	
		if($result)
		{
?>
<!DOCTYPE html>
<html>
<head>
<style>
.error {
	color: red;
	font-style: italic;
	line-height: 0;
}
body {
	background-color: #FAEFEF;
}
#container {
	width: 75%;
	margin: 2% 10%;
	border: 2px solid black;
	text-align: center;
	background-color: #FAEFEF;
}
input[type=text] {
	background-color: #FAEFEF;
}	
textarea {
	background-color: #FAEFEF;
}
.projectTitle {
	text-decoration: underline;
}
</style>
</head>
<body>

<div id="container">
<h1>Record # <?php echo $eventId ?> has been updated!</h1>
<p><a href="test.php">Return to Events</p>
</div>
</body>
</html>

<?php
		}
	}
	//else, if the form has been submitted and is invalid...(see below)
	else
	{
?>
<!DOCTYPE html>
<html>
<head>
<style>
.error {
	color: red;
	font-style: italic;
}
body {
	background-color: #FAEFEF;
}
#container {
	width: 75%;
	margin: 2% 10%;
	border: 2px solid black;
	text-align: center;
	background-color: #FAEFEF;
}
input[type=text] {
	background-color: #FAEFEF;
}
textarea {
	background-color: #FAEFEF;
}
.projectTitle {
	text-decoration: underline;
}
</style>
</head>
<body>

<div id="container">
<h1>Please correct the fields below and try again!</h1>

<form name="form1" method="post" action="updateEventForm.php?id=<?php echo$eventId?>">
<p>Stylist Name:<br> <span class="error"><?php echo$stylistNameError?></span><input type="text" name="stylistName" id="stylistName" value="<?php echo$inStylistName?>"></p>

<p> Services:<br><span class="error"><?php echo$AdditionalServicesError?></span><textarea name="additionalServices" id="additionalServices" rows="8" cols="50"><?php echo$inAdditionalServices?></textarea></p>

<p</form>Client Name:<br><span class="error"><?php echo$clientNameError?></span><input type="text" name="clientName" id="clientName" value="<?php echo$inClientName?>"></p>

<p>Appointment Date (mm/dd/yyyy):<br><span class="error"><?php echo$apptDateError?></span><input type="text" name="apptDate" id="apptDate" value="<?php echo$inApptDate?>"></p>

<p>Appointment Time (HH:MM):<br><span class="error"><?php echo$apptTimeError?></span><input type="text" name="apptTime" id="apptTime"value="<?php echo$inApptTime?>"></p>

	
	<p>Notes:<br><span class="error"><?php echo$customerError?></span><textarea name="customer" id="customer" rows="8" cols="50"><?php echo$inCustomer?></textarea></p>

	
<p><input type="submit" name="submit" value="Submit Information">
	<input type="reset" name="reset" value="Reset Information"></p>

</form>

<p><a href="test.php">Return to Events</p>

</div>
</body>
</html>

<?php
	}
}
//else, if the form has not been submitted (first time viewing
else
{
	$sql= "SELECT event_id, stylist_name, client_name, additional_services, appt_date, appt_time, customer FROM appointment WHERE event_id = $eventId";
	
	$result= $conn->query($sql);
	
	if ($result)
	{
		foreach($result as $row);
	}
?>

<!DOCTYPE html>
<html>
<head>
<style>
.error {
	color: red;
	font-style: italic;
	line-height: 0;
}
body {
	background-color: #FAEFEF;
}
#container {
	width: 75%;
	margin: 2% 10%;
	border: 2px solid black;
	text-align: center;
	background-color: #FAEFEF;
}
input[type=text] {
	background-color: #FAEFEF;
}
textarea {
	background-color: #FAEFEF;
}
.projectTitle {
	text-decoration: underline;
}
</style>
</head>
<body>

<div id="container">

<h1>Appointments<?php echo $eventId ?></h1>

<form name="form1" method="post" action="updateEventForm.php?id=<?php echo$eventId?>">
<p>Stylist Name:<br> <span class="error"><?php echo$stylistNameError?></span><input type="text" name="stylistName" id="stytlistName" value="<?php echo$row["stylist_name"]?>"></p>

<p>Services:<br><span class="error"><?php echo$AdditionalServicesError?></span><textarea name="additionalServices" id="additionalServices" rows="8" cols="50"><?php echo$row["additional_services"]?></textarea></p>


<p>Client Name:<br><span class="error"><?php echo$clientNameError?></span><input type="text" name="clientName" id="clientName" value="<?php echo$row["client_name"]?>"></p>

<p>Appointment Date (dd/mm/yyyy):<br><span class="error"><?php echo$apptDateError?></span><input type="text" name="apptDate" id="apptDate" value="<?php echo$row["appt_date"]?>"></p>

<p>Appointment Time (HH:MM):<br><span class="error"><?php echo$apptTimeError?></span><input type="text" name="apptTime" id="apptTime" value="<?php echo$row["appt_time"]?>"></p>

	<p>Notes:<br><span class="error"><?php echo$customerError?></span><textarea name="customer" id="customer" rows="8" cols="50"><?php echo$row["customer"]?></textarea></p>
	
<p><input type="submit" name="submit" value="Submit Information">
	<input type="reset" name="reset" value="Reset Information"></p>
	
</form>

<p><a href="test.php">View All Events</a></p>


</div>
</body>
</html>
<?php
}
?>