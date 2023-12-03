<!DOCTYPE html>
<html lang = "en"> 
<!-- Webpro Fall 2023 Da best -->
<!-- Author: Nadia Trigoso -->
<!-- Date: 11/10/2023 -->
<!-- Validated: OK 4 sure -->
<head>
	<title> nerdLuv:Submitted </title> 
	<link href="https://codd.cs.gsu.edu/~lhenry23/Web/HW/Asg03_2023/nerdieluv.css" rel="stylesheet">
</head>
	<body> 
	<!-- EXTRA FEATURES Included: 
	1. Robust page with form validation 
	2. LGBT Matches 
	-->
	<!-- Top of every page --> 
	<?php session_start(); /* Starts the session */
	include("common.php");
	top();
				//Puts information of new user account in variables 
				$name = $_POST["name"]; 
				$gender = $_POST["gender"]; 
				$age = $_POST["age"]; 
				$personality = $_POST["personality"]; 
				$favOS = $_POST["favOS"]; 
				$ageMin = $_POST["ageMin"]; 
				$ageMax = $_POST["ageMax"]; 
				$seek = ""; 
				foreach($_POST["seekgender"] as $value) {
					$seek .= $value . ""; 
				}
	?> 
	
		<div class = "maintextarea"> 
		<?php 
			//Checks to see if each input is answered 
			if(isset($_POST["name"]) && isset($_POST["gender"]) && isset($_POST["age"]) && isset($_POST["personality"]) &&
			isset($_POST["favOS"]) && isset($_POST["ageMin"]) && isset($_POST["ageMax"]) && isset($_POST["seekgender"])) {
				
				//Errors array created for any invalid information 
				$errors = array();
				//Check if form information is valid 
				$formValid = true; 
				//checks to make sure age and seeking ages are numeric values 
				if(!is_numeric($age) || !is_numeric($ageMin) || !is_numeric($ageMax)) {
					$formValid = false; 
					$errors[] = "Age and Seeking Age must be numbers."; 
					
				//checks to make sure that name is not numeric values 
				}
				if (preg_match("/[0-9]/", $_POST["name"]) === 1) {
                	$formValid = false; 
                	$errors[] = "Name cannot be digits.";
					
                }
				
				//checks to make sure none of the fields are left empty by the user 
				if(empty($name) || empty($gender) || empty($age) || empty($personality) || empty($favOS) || empty($ageMin) || empty($ageMax) || empty($seek)) {
					$formValid = false; 
					$errors[] = "All fields are required.";
				}
				//checks to make sure the name is not already in the system
				$s = file("singles2.txt"); 
				for($x = 0; $x < count($s); $x++) {
					$single = explode(",", $s[$x]);
					if($name == $single[0]) {
						$formValid = false; 
						$errors[] = "Name is already in system."; 
					}
				}
				//checks to make sure that personality trait written is valid 
				$pType = array("ESTJ", "ISTJ", "ENTJ", "INTJ", "ESTP", "ISTP", "ENTP", "INTP",
				"ESFJ", "ISFJ", "ENFJ", "INFJ",
				"ESFP", "ISFP", "ENFP", "INFP");
				if (!in_array($personality, $pType)) {
					$errors[] = "Invalid Personality type";
				}
				//if there were a lot of invalid information, program give user list of errors and ask to try again
				if(!empty($errors)){ ?>
					<h1>Error! Invalid Data.</h1>
					<p>We're sorry. You submitted invalid user information. Please go back and try again. </p>
					<p> Please fix the following errors: </p> 
					<?php foreach ($errors as $e) { ?> 
					<ol> 
						<li> <?= $e ?> </li> 
					</ol> 
				<?php }
					
				}
				
				//if all information is valid, stores new user's information in text file provided 
				else if($formValid) {
					//puts all of the information into a variable and separates each information by using commas 
					$data = $name . "," .$gender . "," . $age . "," . $personality . "," . $favOS . "," . $ageMin . "," . 
					$ageMax . "," . $seek . "\n"; 
					file_put_contents("singles2.txt", PHP_EOL.$data, FILE_APPEND);  
				?> 
				<!--Message that will be shown to user who successfully joined --> 
					<h1> Thank you!</h1>
					<p> Welcome to NerdLuv, <?= $name ?>! </p>
					<p> Now <a href= "matches.php"> log in to see your matches! </a></p>
					
				<?php 
				}
				
			}
			//Message displayed if any of the input fields are not answered
			else { ?>
				<p>Sorry, your profile was not added.</p>
				
				<p>Please go back and try again. </p>
			<?php }
		?> 
		</div>
		<!--Bottom of every page --> 
		<?php 
		bottom(); 
		?> 
	</body> 

</html> 