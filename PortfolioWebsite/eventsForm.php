<?php
session_start();
if($_SESSION['validUser'] =="yes") {
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
    $validForm = false;
    $message = "";
    function validateStylistName($stylist_name) {
        global $validForm, $stylist_name_error;        //Use the GLOBAL Version of these variables instead of making them local
     
        if($stylist_name == "") {
            $validForm = false;
            $stylist_name_error = "Name is required";
        }
    }//end validateName()
    
	
	  function validateAdditionalServices($additional_services) {
        global $validForm, $additional_services_error;
        if ($additional_services == "") {
            $validForm = false;
            $additional_services_error = "If Additional Services are not required, please mark 'NA'";
        } 
    } //end validateDescription()
	
    function validateClientName($client_name) {
        global $validForm, $client_name_error;
        if ($client_name == "") {
            $validForm = false;
            $client_name_error = "Description is required";
        } 
    } //end validateDescription()
   
    function validateDate($appt_date) {
        global $validForm, $appt_date_error;
        $appt_date_error = "";
        if ($appt_date == "") {
             $validForm = false;
             $appt_date_error = "Date is required";
         } 
    } //end validateDate()
    function validateTime($appt_time) {
        global $validForm, $appt_time_error;
       
        if ($appt_time == "") {
            $validForm = false;
            $appt_time_error = "Time is required.";
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
                        
                        require 'connectTest.php';  //CONNECT to the database
                        
                        //begin the transaction
                        $conn->beginTransaction();
                        //SQL statements
                        $conn->exec("INSERT INTO appointment (stylist_name, client_name, appt_date, appt_time, additional_services) VALUES ('$stylist_name','$client_name','$appt_date','$appt_time','$additional_services')");
                        //commit the transaction
                        $conn->commit();
                        $message = "New records created successfully";
                        
                      
                    }
                    
                    catch(PDOException $e)
                    {
                        $conn->rollback();
                        $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
            
                        error_log($e->getMessage());            //Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
                        error_log(var_dump(debug_backtrace()));
                    
                        //Clean up any variables or connections that have been left hanging by this error.      
                    
                    }
                    $conn = null;
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
	<title>Event Form Add Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    




   <style>
   body {
       background-color: black;
       color:white;
   }
   .addEvent {
       margin-top: 10%;
text-align: center;
border: 2px solid white;
   }
   </style>

   
</head>
<body>
<div class="container">

<section class="addEvent">
<div class="row">
<div class="col-sm-12">
<?php echo $message ?>
	<?php  echo "<a href=login.php> RETURN TO LOGIN PAGE</a>"; ?><br/>
	<?php  echo "<a href=test.php>View Appointments</a>"; ?>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
  
       <legend>Add an appointment</legend>
        <label>Stylist Name:</label> <br>
        <input type="text" name="stylist_name" maxlength="25"><span class="error" name="stylist_name_error"><?php echo $stylist_name_error; ?> </span><br>
        
        <label>Client Name:</label><br>
        <input type="text" name="client_name" maxlength="25"><span class="error" name="client_name_error"><?php echo $client_name_error; ?></span><br>
        
        <label>Appointment Date:</label> <br>
        <input type="date" name="appt_date" id="datepicker"><span class="error" name="appt_date_error"><?php echo $appt_date_error; ?></span><br>
        
        <label>Appointment Time:</label> <br>
        <input type="time" name="appt_time"><client_namespan class="error" name="appt_time_error"><?php echo $appt_time_error; ?></span><br>
        
      <label>Salon Services Requested</label><br>
          <textarea cols="50" rows="4" name="additional_services" maxlength="500"></textarea><span class="error" name="additional_services_error"><?php echo $event_description_error; ?></span><br>
			

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </fieldset>
       
	</form>

</div>

</div>


    </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>