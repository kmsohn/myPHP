<?php
session_start();
//if ($_SESSION['validUser'] == "yes") 

{
//field data
	$name = "";
	$socSec = "";
	$response = "";

	//error msgs
	$nameErrMsg = "";
	$socSecErrMsg = "";
	$responseErrMsg = "";

	$validForm = false;

	if (isset($_POST["submit"]))
	{
		//form submitted and needs to be processed
		//validate here....
		//get 'name value pair from POST variable' into PHP variables
		//this PHp variable uses the same name attrib as the HTML form
		
		$name = $_POST['inName'];
		$socSec = $_POST['inSocSec'];
		$response = $_POST['inResponse'];
		//validation function-functions use the code for the fieldvalidations.
		
		
		function validateName($name)
                {
					global $validForm, $nameErrMsg;    //Use the GLOBAL Version of these variables instead of making them local
           		$nameErrMsg = "";
             	$name = trim($name); // remove any leading space
                                                                
     		if($name == "") // not blank and no leading space
                                                                {
          	$validForm = false;
          	$nameErrMsg = "First name cannot contain spaces";
                                                                }
																
			}// end validateName()
			
			function validateSocSec($socSec){
				global $validForm, $socSecErrMsg; //using GLOBAL 
				$socSecErrMsg = "";
				if(!preg_match("/^[1-9][0-9]*$/", $socSec))//numeric only, nine digits
				$validForm = false;
				$socSecErrMsg = "SS# needs to be nine digits. ";
				
			}//end validateSocSec
			
			Function validateResponse($response) {
				global $validForm, $responseErrMsg;
				if ($response == "") {
					$validForm = false;
					$responseErrMsg = "You must choose a response."; 
				}
			}
					$validForm = true; //keeping track of any form validation errors
		              validateName($name);
                      validateSocSec($socSec);
                      validateResponse($response);  
                }
                else
                {
                                //Form has not been seen by the user display the form
                }

?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Form Validation Example</title>
<style>

#orderArea	{
	width:600px;
	background-color:#CF9;
}

.error	{
	color:red;
	font-style:italic;	
}
</style>
</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Form Validation Assignment


</h2>
<div id="orderArea">
  <form id="form1" name="form1" method="post" action="formValidationAssignment.php">
  <h3>Customer Registration Form</h3>
  <table width="587" border="0">
    <tr>
      <td width="117">Name:</td>
      <td width="246"><input type="text" name="inName" id="inName" size="40" value=""/></td>
      <td width="210" class="error"></td>
    </tr>
    <tr>
      <td>Social Security</td>
      <td><input type="text" name="inEmail" id="inEmail" size="40" value="" /></td>
      <td class="error"></td>
    </tr>
    <tr>
      <td>Choose a Response</td>
      <td><p>
        <label>
          <input type="radio" name="RadioGroup1" id="RadioGroup1_0">
          Phone</label>
        <br>
        <label>
          <input type="radio" name="RadioGroup1" id="RadioGroup1_1">
          Email</label>
        <br>
        <label>
          <input type="radio" name="RadioGroup1" id="RadioGroup1_2">
          US Mail</label>
        <br>
      </p></td>
      <td class="error"></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="submit" id="button" value="Register" />
    <input type="reset" name="button2" id="button2" value="Clear Form" />
  </p>
</form>
</div>

</body>
</html>