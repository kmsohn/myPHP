<!DOCTYPE html>
<html>
   <?php   print_r($_POST)  ?>
<head>
  <meta charset="utf-8">
  <title>DMACC Portfolio Day Bio Form</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <!-- css3-mediaqueries.js for IE less than 9 -->

<script src="css3-mediaqueries.js"></script>
<script src="jquery-3.2.1.js"></script>
<script>

	$(document).ready(function(){
		if( $("select[name=program]	option:selected").val() == "webDevelopment")
		{
			$(".secondWeb").css("display", "inline");
		}
		else
		{
			$(".secondWeb").css("display", "none");
		}
		
		$("select#program").change(function(){
			if( $("select#program option:checked").val() == "webDevelopment")
			{
				$(".secondWeb").css("display", "inline");
			}
			else
			{
				$(".secondWeb").css("display", "none");
			}
		});
		
		function resetForm(){
			$("#firstName").val("");
			$("#lastName").val("");
			$("#program").val("default");
			$("#websiteAddress").val("");
			$("#websiteAddress2").val("");
			$("#email").val("");
			$("#hometown").val("");
			$("#careerGoals").val("");
			$("#threeWords").val("");
		}
	});
	
	
	</script>
  
  <style>
	img{
		display: block;
		margin: 0 auto;
	}
	.frame{
		background-image: url("orange popsicle.jpg");
		padding: 1em;	
	}
	.frame2{
		background-image: url("citrus.jpg");
		padding: 1.3em;	
	}	
	body{
		background-image: url("bodacious.png");
		margin: 1.5em;
	}
	
	.main {
		padding: 1em;
		background-color: white;
	}
	form{
		text-align: center;
	}
	h2 {
		text-align: center;
	}
	.robotic{
		display: none;
	}

	.form {
		background-color:white;
		padding-left: 5em;
	}
	p {
		align:left;
	}	
	.citrus{
		margin: auto;
		background-image: url("raspberry.jpg");
		padding: 1.3em;	
		width: 70%;
	}
	.bamboo{
		background-image: url("bamboo.jpg");
		padding: 1em;	
	}	
	.violet{
		background-image: url("ultra violet.png");
		padding: .5em;	
	}	
	.secondWeb{
		display: none;
	}
	table{
		margin: auto;
	}
	table td{
		padding-bottom: .75em;
	}
	.error{
		font-style: italic;
		color: #d42a58;
		font-weight: bold;
	}

@media only screen and (max-width:620px) {
  /* For mobile phones: */
  img {
    width:100%;
  }
  .form {
	width:100%; 
	padding-left: .1em;
	padding-top: .1em;
  }
  .citrus {
	background-image:none;  
  }
  .bamboo {
	background-image:none;  
  } 
  .violet {
	background-image:none;  
  }  
  .secondWeb{
		display: none;
	}  
  table{
		margin: auto;
	}
  table td{
		padding-bottom: .5em;
	}
}
	
  </style>
  <?php
	
	//Input Field validations. 

//validateFirstName
	// valid first name should only include letters, numbers, and spaces
	
	
	//variables
	$FirstName ="";
	 $LastName ="";
	
	
	
	//error mesgs
	$FirstNameErrMsg="";
	$LastNameErrMsg="";
	
	
	 $validForm = false;

if(isset($_POST["submit"]))
	{	
	
		
		$FirstName = $_POST['firstName'];
		$LastName = $_POST['lastName'];
		
		
		
		function validateFirstName($inName)
			{
				global $validForm, $FirstNameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$FirstNameErrMsg = "";
				
				if($inName == "")
				{
					$validForm = false;
					$FirstNameErrMsg = "First Name cannot be spaces";
				}
				
				else
				{
					//Matches 111-22-3333 
					 if(!preg_match('/^[a-zA-Z0-9\s.]*$/', $inName)) 
					 {
						$validForm = false;
						$FirstNameErrMsg = "Invalid First Name "; 
					 }
				}
			}//end validateFirstName()
		
		
		
		function validateLastName($inName)
			{
				global $validForm, $LastNameErrMsg;		
				$LastNameErrMsg = "";
				
				if($inName == "")
				{
					$validForm = false;
					$LastNameErrMsg = "Last Name cannot be spaces";   //to change
				}
				
				else
				{
					//Matches 111-22-3333 
					 if(!preg_match('/^[a-zA-Z0-9\s.]*$/', $inName))   //to change
					 {
						$validForm = false;
						$LastNameErrMsg = "Invalid last  Name "; 
					 }
				}
			}//end validateLastName()
		
	  function validateEmail($inEmail)
  {
    global $validForm, $emailErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
    $emailErrMsg = "";
    if($inEmail=="")
  	{
  		$validForm = false;
  		$emailErrMsg = "E-mail is required";
  	}
  elseif(!preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', $inEmail))
    {
      $validForm = false;
      $emailErrMsg = "Email is invalid";
    }
  }//end validateEmail()	
		
		function validateWebsite($inWebsite)
  {
    global $validForm, $websiteErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
    $websiteErrMsg = "";
    if(!preg_match('/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/', $inWebsite))
    {
      $validForm = false;
      $websiteErrMsg = "Web Address is invalid";
    }
  }//end validateWebsite()
		
			$validForm = true;	
		
		validateFirstName($FirstName);
		validateLastName($LastName);
		validateEmail($inEmail);
		validateWebsite($inWebsite);
		
		
		if($validForm)
		{
			$message = "All good";	
		}
		else
		{
			$message = "Something went wrong";
		}

		
		
		
		
		
	}// ends if submit 

	
	?>
 


<!--
validateProgram
	//valid program must not be default options

validateWebsiteAddress
	//valid URL format

validateWebsiteAddress2
	//valid URL format	

validateLinkedIn
	//valid URL to linkedin.com

validateEmail
	//valid email should be in a proper format  
	//Matches: bob@aol.com | bob@wrox.co.uk | bob@domain.info |123@123.123
	//Non-Matches: a@b | notanemail | bob@@.

validateHometown
	// valid name should only include letters, numbers, spaces, and commas
	// ... must be present

validateCareerGoals
	//valid career goals should include only numbers, letters, spaces, and basic punctuation

validateThreeWords
	//valid three-words should include only numbers, letters, spaces, and basic punctuation

-->
  
</head>

<section class="orange">
<body>

<?php
			if($validForm)
			{
        ?>
            <h1><?php echo $message ?></h1>
        
        <?php
			}
			else	//display form
			{
        ?>


<div class="frame2">
<div class="frame">

  <div class="main">
  <div><img src="madonna.gif" alt="Mix gif" ></div>
  <br>

<!--<a href = 'dmaccPortfolioDayLogout.php'>Log Out</a>-->

<section class="citrus">
<section class="bamboo">
<section class="violet">

	<div class="main form">
	
	<h2></h2>
	</table>
	<form id="portfolioBioForm" method="post" action="studentInfoForm.php">
		
		<table>
		<tr>
		<td>Login Email:<br> <input type="text" id="emailToLogin" name="emailToLogin" value=""/></td>
		</tr>
		<tr>
		<td>First Name:<br> <input type="text" id="firstName" name="firstName" placeholder="..." value="<?php echo $FirstName; ?>"/>
		<br>
		<span class="error" ><?php echo $FirstNameErrMsg; ?> </span></td>
		</tr>
		<tr>
		<td>Last Name:<br> <input type="text" id="lastName" name="lastName" placeholder="..." value="<?php echo $LastName; ?>" />
		<br>
		<span class="error" > <?php echo $LastNameErrMsg; ?></span></td>
		</tr>
		<tr>
		<td >Program:<br> <select id="program" name="program">
				<option value="default">---Select Your Program---</option>
				<option value="animation" >Animation</option>
				<option value="graphicDesign" >Graphic Design</option>
				<option value="photography" >Photography</option>
				<option value="videoProduction" >Video Production</option>
				<option value="webDevelopment" >Web Development</option>
			</select><br><span class="error" id="programError"></span><td>
		</tr>
		<tr>
		<td >Secondary Program:<br> <select id="program2" name="program2">
				<option value="none" >---No Secondary Program---</option>
				<option value="animation" >Animation</option>
				<option value="graphicDesign" >Graphic Design</option>
				<option value="photography" >Photography</option>
				<option value="videoProduction" >Video Production</option>
				<option value="webDevelopment" >Web Development</option>
			</select><br><span class="error" id="program2Error"></span><td>
		</tr>
		<tr>
		<td>Website Address:<br> <input type="text" id="websiteAddress" name="websiteAddress" value=""/><br><span class="error" id="websiteAddressError"></span></td>
		</tr>
		<tr>
		<td>Personal Email:<br><input type="text" id="email" name="email" value="" /><br><span class="error" id="emailError"></span></td>
		</tr>
		<tr>
		<td>LinkedIn Profile:<br><input type="text" id="linkedIn" name="linkedIn" value="" /><br><span class="error" id="linkedInError"></span></td>
		<tr>
		<td><span class="secondWeb">Secondary Website Address (git repository, etc.):<br> <input type="text" id="websiteAddress2" name="websiteAddress2" value=""/><br><span class="error" id="websiteAddress2Error"></span></span></td>
		</tr>
		<tr>
		<td>Hometown:<br> <input type="text" id="hometown" name="hometown" value=""/><br><span class="error" id="hometownError"></span></td>
		</tr>
		<tr>
		<td>Career Goals:<br> <textarea id="careerGoals" name="careerGoals"> </textarea><br><span class="error" id="careerGoalsError"></span></td>
		</tr>
		<tr>
		<td>3 Words that Describe You:<br> <input type="text" id="threeWords" name="threeWords" value=""/><br><span class="error" id="threeWordsError"></span></td>
		<p class="robotic" id="pot">
			<label>Leave Blank</label>
			<input type="hidden" name="inRobotest" id="inRobotest" class="inRobotest" />
		</p>
		<input type="hidden" id="submitConfirm" name="submitConfirm" value="submitConfirm"/>
		</tr>
		<tr>
		<td><input type="submit" id="submit" name="submit" value="Submit Bio" /></td>
		</tr>
		<tr>
		<td><input type="reset" id="resetBio" name="resetBio" value="Reset Bio"/></td>
		</tr>
		</table>
	</form>

	</div>
	

</section>	
</section>
</section>
  
</div>
<?php
			
			}//end else
        ?>   
</body>
</section>

</html>
