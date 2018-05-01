<?php
session_start();
if($_SESSION['validUser'] =="yes") {
	
	
	include 'connectPDO.php';		//connects to the database
	$stylist_name = "";
    $client_name = "";
    $appt_date = "";
    $appt_time = "";
	$additional_services = "";
	
  	$stylist_name_error = "";
    $client_name_error = "";
    $appt_date_error = "";
    $appt_time_error = "";
   	$additional_services_error = "";
	$message = "";
	$validForm = false;
	//get event ID
	$event_id = filter_input(INPUT_POST, 'event_id',FILTER_VALIDATE_INT);
	
	//get the event that matches the event ID
			$queryEvent = 'SELECT * FROM appointment WHERE event_id = :event_id';
			$stmt1 = $conn->prepare($queryEvent);
			$stmt1->bindValue(':event_id', $event_id);
			$stmt1->execute();
			$event = $stmt1->fetch();
			$event_name = $event['stylist_name'];
			$stmt1->closeCursor();
			
	function validateStylistName($stylist_name) {
        global $validForm, $event_name_error;        //Use the GLOBAL Version of these variables instead of making them local
     
        if (empty($_POST["stylist_name"])) {
			$event_name_error = "Stylist name is required";
			$validForm=false;
	  } else {
			$stylist_name_error = "";
			//check if name only contains letters and whitespace
		  if (!preg_match("/^[a-zA-Z0-9. ]*$/", $stylist_name)) {
			  $event_name_error = "Only letter allowed";
			  $validForm = false;
			  // cannot be all spaces
		  } elseif (!preg_match("/^[^-\s][a-zA-Z0-9. \s-]*$/", $stylist_name)) {
			  $stylist_name_error = "Cannot be all spaces";
			  $validForm = false;
		  }
	  }
    }//end validateName()
    
    function validateAdditionalServices($additional_services) {
        global $validForm, $additional_services_error;
        if (empty($_POST["additional_services"])) {
			$additional_services_error = "Description is required";
			$validForm=false;
	  } else {
			$additional_services_error = "";
			//check if name only contains letters and whitespace
		  if (!preg_match("/^[a-zA-Z0-9. ]*$/", $additional_services)) {
			  $additional_services_error = "Only letters and white space allowed";
			  $validForm = false;
			  // cannot be all spaces
		  } elseif (!preg_match("/^[^-\s][a-zA-Z0-9. \s-]*$/", $additional_services)) {
			  $additional_services_error = "Cannot be all spaces, please specify your styling needs";
			  $validForm = false;
		  }
	  }
    } //end validateDescription()
    function validateClientName($client_name) {
        global $validForm, $client_name_error;
        if (empty($_POST["client_name"])) {
			$client_name_error = "event presenter is required";
			$validForm=false;
	  } else {
			$client_name_error = "";
			//check if name only contains letters and whitespace
		  if (!preg_match("/^[a-zA-Z0-9. ]*$/", $client_name)) {
			  $client_name_error = "Only letters and white space allowed";
			  $validForm = false;
			  // cannot be all spaces
		  } elseif (!preg_match("/^[^-\s][a-zA-Z0-9. \s-]*$/", $client_name)) {
			  $client_name_error = "Cannot be all spaces";
			  $validForm = false;
		  }
	  }
    } //end validatePresenter()
    function validateDate($event_date) {
        global $validForm, $event_date_error;
        if (empty($_POST["event_date"])) {
			$event_date_error = "appointment date is required";
			$validForm=false;
	  } else {
			$event_date_error = "";
			
	  }
    } //end validateDate()
    function validateTime($event_time) {
        global $validForm, $event_time_error;
       
		if (empty($_POST["event_time"])) {
			$event_time_error = "appointment time is required";
			$validForm=false;
	  } else {
			$event_time_error = "";
			//check if name only contains letters and whitespace
	  }
    }//end validateTime()
	if (isset($_POST["submit"])) {
        $stylist_name = $_POST["stylist_name"];
        $client_name = $_POST["client_name"];
       $additional_services = $_POST["additional_services"];
        $appt_date = $_POST["appt_date"];
        $appt_time = $_POST["appt_time"];
            $validForm = true;      //switch for keeping track of any form validation errors
            validateStylistName($stylist_name);
            validateClientName($client_name);
            validateDate($appt_date);
            validateTime($appt_time);
			validateAdditionalServices($additional_services);
	}
if($validForm) {
	try {
				
			$updateEvent = "UPDATE appointment SET stylist_name ='$stylist_name', additional_services='$additional_services', client_name='$client_name', event_date='$event_date', event_time='$event_time' WHERE event_id='$event_id'";
		
		
				$stmt = $conn->prepare($updateEvent);
				$stmt->execute();
				
						if ( $stmt->execute() )
						{
							$message = "<h1>Your record has been successfully UPDATED to the database.</h1>";
							$message .= "<p>Please <a href='selectAppt.php'>view</a> your records.</p>";
						}
						else
						{
							$message = "<h1>You have encountered a problem.</h1>";
							$message .= "<h2 style='color:red'>" . mysqli_error($link) . "</h2>";
						}
	}
	catch(PDOException $e) {
		$conn->rollback();
		$message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	}
} 
} //end valid user check
else {
		//Invalid User attempting to access this page. Send person to Login Page
		header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Event</title>
<style>
.errormsg {
		color:red;
	}
</style>
	

</head>

<body>

<?php
//If the user submitted the form the changes have been made
if($validForm)
{
	echo $message;	//contains a Success or Failure output content
	
}//end if submitted
else
{	//The page needs to display the form and associated data to the user for changes
	echo '<h3><a href="selectAppt.php">Return to previous Page</a></h3>';
?>
<form id="event_Form" name="event_Form" method="post" action="updateAppt.php">
  <p>Update the following event Information.  Place the new information in the appropriate field(s)</p>
	
  <p>Stylist Name: 
	   <input type="text" name="stylist_name" id="stylist_name" 
    	value="<?php echo $event['stylist_name']; ?>" />
		<span class="errormsg"><?php echo $stylist_name_error; ?></span>
		
  </p>
	  
	  
  </p>
  <p>Services:  
    <input type="text" name="additional_services" id="additional_services" 
    	value="<?php echo $event['additional_services']; ?>" />
		<span class="errormsg"><?php echo $additional_services_error; ?></span>
		
  </p>
  <p>Client Name:  
    <input type="text" name="client_name" id="client_name" 
       	value="<?php echo $event['client_name']; ?>" />
		   <span class="errormsg"><?php echo $client_name_error; ?></span>
  </p>
  <p>Appointment Date: 
    <input type="date" name="appt_date" id="appt_date" 
        value="<?php echo $event['appt_date']; ?>" />
		<span class="errormsg"><?php echo $appt_date_error; ?></span>
  </p>
  <p>Appointment Time: 
    <input type="time" name="appt_time" id="appt_time" 
    	value="<?php echo $event['appt_time']; ?>" />
		<span class="errormsg"><?php echo $appt_time_error; ?></span>
  </p>
  
  	<!--The hidden form contains the record if for this record. 
    	You can use this hidden field to pass the value of record id 
        to the update page.  It will go as one of the name value
        pairs from the form.
    -->
  	<input type="hidden" name="event_id" id="event_id"
    	value="<?php echo $event_id ?>" />
  
  <p>
    <input type="submit" name="submit" id="submit" value="Update" />
    <input type="reset" name="button2" id="button2" value="Clear Form" />
  </p>
</form>

<?php
}//end else submitted
?>

</body>
</html>