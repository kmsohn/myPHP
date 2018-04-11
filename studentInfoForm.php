<!DOCTYPE html>
<html>
 <?php //testing  print_r($_POST)  ?>
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
	$LinkedIn= "";
	$DescribeYou= "";
	$FirstDropDown = "";
	$SecondDropDown = "";
	$LoginEmail= "";
	$PersonalEmail= "";
	$website = "";
	$hometown = "";
	$CareerGoal = "";



	//error mesgs
	$FirstNameErrMsg="";
	$LastNameErrMsg="";
	$LinkedInErrMsg="";
	$DescribeYouErrMsg="";
	$FirstDropDownErrMsg="";
	$SecondDropDownErrMsg = "";
	$LoginEmailErrMsg= "";
	$PersonalEmailErrMsg ="";
	$websiteErrMsg = "";
	$hometownErrMsg = "";
	$CareerGoalErrMsg= "";



	 $validForm = false;

if(isset($_POST["submit"]))
	{


		$FirstName = $_POST['firstName'];
		$LastName = $_POST['lastName'];
		$LinkedIn = $_POST['linkedIn'];
		$DescribeYou= $_POST['threeWords'];
		$FirstDropDown = ($_POST['program']);
		$SecondDropDown = ($_POST['program2']);
    	$LoginEmail = $_POST['emailToLogin'];
		$PersonalEmail = $_POST['email'];
		$website = $_POST['websiteAddress'];
		$hometown = $_POST['hometown'];
		$CareerGoal = $_POST['careerGoals'];
		
		
		
	
		
		

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

					 if(!preg_match('/^[a-zA-Z0-9\s.]*$/', $inName))   //to change
					 {
						$validForm = false;
						$LastNameErrMsg = "Invalid last  Name ";
					 }
				}
			}//end validateLastName()

	function validateWebsite($inWebsite)
  {
    global $validForm, $websiteErrMsg;		
    $websiteErrMsg = "";
	  
	  
	  if($inWebsite == "")
				{
					$validForm = false;
					$websiteErrMsg = "Web Site Can Not Be Empty";   
				}
	  
	  else
				{

					 if(!preg_match('/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/', $inWebsite))
					 			{
      							$validForm = false;
								$websiteErrMsg = "Web Address is invalid";
								}
				}
	  
  }//end validateWebsite()

		function validateHometown($inHometown)
  {
    global $validForm, $hometownErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
    $hometownErrMsg = "";
	  
      if($inHometown=="")
    {
      $validForm = false;
      $hometownErrMsg = "Enter your Hometown.";
    }
	  
	  else
				{

					 if(!preg_match('/^[a-zA-Z0-9\s.]*$/', $inHometown))   //to change
					 {
						$validForm = false;
						$hometownErrMsg = "Invalid data ";
					 }
				}
	  
	  
  }//end validateHometown()
		
		
			
		

		function validateLinkedIn($inName)
			{
				global $validForm, $LinkedInErrMsg;
				$LinkedInErrMsg = "";

				if($inName == "")
				{
					$validForm = false;
					$LinkedInErrMsg = "LinkedIn URL cannot be spaces";   //to change
				}

				else
				{

					  if(!preg_match('/(https?)?:?(\/\/)?(([w]{3}||\w\w)\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/', $inName))   //to change
					 {
						$validForm = false;
						$LinkedInErrMsg = "Invalid LinkedIn URL ";
					 }
				}
			}//end validateLinkedIn()



		function validateDescribeYou($inName)
			{
				global $validForm, $DescribeYouErrMsg;
				$DescribeYouErrMsg = "";

				if($inName == "")
				{
					$validForm = false;
					$DescribeYouErrMsg = "Please Describe your self";   //to change
				}

				else
				{     //\s*(\S+\s+){1,3}\S*$   str_word_count

					 if(!preg_match('/^[a-zA-Z0-9\s.]*$/', $inName))   //to change
					 {
						$validForm = false;
						$DescribeYouErrMsg = "3 words max ";
					 }
				}
			}//end validateDescribeYou()



		function validateFirstDropDown($inName)
			{
				global $validForm, $FirstDropDownErrMsg;
				$FirstDropDownErrMsg = "";


				if(isset($inName) && $inName === "default") {

               $validForm = false;
					$FirstDropDownErrMsg = "Please Select a Program";   //to change

					}


			}//end validateFirstDropDown()

		function validateSecondDropDown($inName)
			{
				global $validForm, $SecondDropDownErrMsg;
				$SecondDropDownErrMsg = "";


				if(isset($inName) && $inName === "none") {

               $validForm = false;
					$SecondDropDownErrMsg = "Please Select a Secondary Program";   //to change

					}


			}//end validateFirstDropDown()

      function validateLoginEmail($inLoginEmail)
    			{
    				global $validForm, $LoginEmailErrMsg;
    				$LoginEmailErrMsg = "";

    				if( $inLoginEmail == "")
    				{
    					$validForm = false;
    					$LoginEmailErrMsg = "Please enter a valid email";   //to change
    				}

    				else
    				{   
    					 if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'
, $inLoginEmail) )  //to change
    					 {
    						$validForm = false;
    						$LoginEmailErrMsg = "Invalid Email";
    					 }
    				}
    			}//end validateLoginEmail()


          function validatePersonalEmail($inPersonalEmail)
        			{
        				global $validForm, $PersonalEmailErrMsg;
        				$PersonalEmailErrMsg = "";

        				if( $inPersonalEmail == "")
        				{
        					$validForm = false;
        					$PersonalEmailErrMsg = "Please enter a valid email";   //to change
        				}

        				else
        				{
        					//Matches 111-22-3333
        					 if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'
, $inPersonalEmail))   //to change
        					 {
        						$validForm = false;
        						$PersonalEmailErrMsg = "Invalid Email";
        					 }
        				}
        			}//end validatePersonalEmail()
		
		
		
		
		function validateCareerGoals($inVal){
			
			global $validForm, $CareerGoalErrMsg;
			$CareerGoalErrMsg = "";
			
			
			if(strlen($inVal) == 0 )
        	{
        		$validForm = false;
        		$CareerGoalErrMsg = "Career Goal cant be empty";   //to change
        	}

			else
				{
					//Matches 111-22-3333
					 if(!preg_match('/^[a-zA-Z0-9\s.]*$/', $inVal))
					 {
						$validForm = false;
						$CareerGoalErrMsg = "Invalid  goal ";
					 }
			  }
			
		}//end validateCareerGoals()
		
		
		

              

			$validForm = true;

		validateFirstName($FirstName);
		validateLastName($LastName);
		validateLinkedIn($LinkedIn);
		validateDescribeYou($DescribeYou);
		validateFirstDropDown($FirstDropDown);
		validateSecondDropDown($SecondDropDown);
        validateLoginEmail($LoginEmail);
    	validatePersonalEmail($PersonalEmail);
		validateWebsite($website);
		validateHometown($hometown);
       validateCareerGoals($CareerGoal);

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
    <td>Login Email:<br> <input type="text" id="emailToLogin" name="emailToLogin" value="<?php echo $LoginEmail; ?>"/>
    <br/>
    <span class= "error"><?php echo $LoginEmailErrMsg; ?> </span> </td>
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

				<option value="animation" <?php if(isset($FirstDropDown) && $FirstDropDown=='animation') { echo ' selected="selected"'; } ?> >Animation</option>

				<option value="graphicDesign" <?php if(isset($FirstDropDown) && $FirstDropDown=='graphicDesign') { echo ' selected="selected"'; } ?>>Graphic Design</option>

				<option value="photography"  <?php if(isset($FirstDropDown) && $FirstDropDown=='photography') { echo ' selected="selected"'; } ?>>Photography</option>

				<option value="videoProduction" <?php if(isset($FirstDropDown) && $FirstDropDown=='videoProduction') { echo ' selected="selected"'; } ?> >Video Production</option>

				<option value="webDevelopment" <?php if(isset($FirstDropDown) && $FirstDropDown=='webDevelopment') { echo ' selected="selected"'; } ?> >Web Development</option>

			</select><br><span class="error" > <?php echo $FirstDropDownErrMsg; ?> </span><td>
		</tr>
		<tr>
		<td >Secondary Program:<br> <select id="program2" name="program2">
				<option value="none" >---No Secondary Program---</option>

               <option value="animation"<?php if(isset($SecondDropDown) && $SecondDropDown=='animation') { echo ' selected="selected"'; } ?>>Animation</option>

				<option value="graphicDesign" <?php if(isset($SecondDropDown) && $SecondDropDown=='graphicDesign') { echo ' selected="selected"'; } ?>>Graphic Design</option>

				<option value="photography" <?php if(isset($SecondDropDown) && $SecondDropDown=='photography') { echo ' selected="selected"'; } ?> >Photography</option>

				<option value="videoProduction" <?php if(isset($SecondDropDown) && $SecondDropDown=='videoProduction') { echo ' selected="selected"'; } ?> >Video Production</option>

				<option value="webDevelopment" <?php if(isset($SecondDropDown) && $SecondDropDown=='webDevelopment') { echo ' selected="selected"'; } ?> >Web Development</option>

			</select><br><span class="error" >  <?php echo $SecondDropDownErrMsg; ?> </span><td>
		</tr>
		<tr>
		<td>Website Address:<br> <input type="text" id="websiteAddress" name="websiteAddress" value="<?php echo $website; ?>"/><br><span class="error" > <?php echo $websiteErrMsg; ?> </span></td>
		</tr>
		<tr>
    <td>Personal Email:<br><input type="text" id="email" name="email" value="<?php echo $LoginEmail; ?>" /><br><span class="error" id="emailError"><?php echo $LoginEmailErrMsg; ?> </span></td>
		</tr>
		<tr>
		<td>LinkedIn Profile:<br><input type="text" id="linkedIn" name="linkedIn" value="<?php echo $LinkedIn; ?>" /><br><span class="error"><?php echo $LinkedInErrMsg; ?></span></td>
		<tr>
		<td><span class="secondWeb">Secondary Website Address (git repository, etc.):<br> <input type="text" id="websiteAddress2" name="websiteAddress2" value=""/><br><span class="error" id="websiteAddress2Error"></span></span></td>
		</tr>
		<tr>
		<td>Hometown:<br> <input type="text" id="hometown" name="hometown" value="<?php echo $hometown; ?>"/><br><span class="error"><?php echo $hometownErrMsg;?></span></td>
		</tr>
		
   	    <tr>
		<td>Career Goals:<br><textarea id="careerGoals" name="careerGoals" value ="<?php echo $CareerGoal; ?>"><?php echo  htmlspecialchars($CareerGoal); ?> 
		 </textarea><br><span class="error" ><?php echo htmlspecialchars($CareerGoalErrMsg);?></span></td>
		</tr>
    
    <tr>
		<td>3 Words that Describe You:<br> <input type="text" id="threeWords" name="threeWords" value="<?php echo $DescribeYou; ?>"/><br><span class="error" ><?php echo $DescribeYouErrMsg; ?> </span></td>
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