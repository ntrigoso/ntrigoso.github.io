<!DOCTYPE html>
<html lang ="en">
<!-- Webpro Fall 2023 Da best -->
<!-- Author: Nadia Trigoso -->
<!-- Date: 11/10/2023 -->
<!-- Validated: OK 4 sure -->
<head>
<title> nerdLuv:Matches </title> 
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

/*Gets the file with all of the singles and their information */
$s = file("singles2.txt");

/*Gets the information of specific user who is looking for their matches*/
$infoS = '';
for ($x = 0; $x < count($s); $x++) {
    $infoS = strstr($s[$x], $_GET["name"]);
    if ($infoS !== FALSE) {
        break;
    }
}
//puts user's information into an array by using a comma to separate each element
$sInfo = explode(",", $infoS);
//stores each elements into its own separate variable
$sGender = $sInfo[1];
$sAge = (int)$sInfo[2];
$sPersonality = $sInfo[3];
$sOS = $sInfo[4];
$sMin = (int)$sInfo[5];
$sMax = (int)$sInfo[6];
$selectedGender = $sInfo[7]; 

//since the seekgender is the last element, it needs to get rid of the newline character 
$selected = rtrim($selectedGender, "\n"); 

/* gets seeking genders of the user */
$mGender = '';
$mGender2 = '';
//if the user only has 1 seeking gender  
if (strcmp($selected, 'M') === 0 || strcmp($selected, 'F') === 0) {
    $mGender = $selected;
} else {
	//if the user has 2 seeking genders 
    $mGender = 'M';
	$mGender2 = 'F'; 
}

/*Array for any matches */ 
$m = array();
 
?>
<div>
<?php
$f = true;
for ($x = 0; $x < count($s); $x++) {
	/* Gets information of possible matches */
	
	//Puts information of possible matches into an array
	$matches = explode(",", $s[$x]);
	
	//puts each element of the array into its own variable 
	$genderMatch = $matches[1];
	$ageMatch = (int)$matches[2];
	$personalityMatch = $matches[3];
	$osMatch = $matches[4];
	$minMatch = (int)$matches[5];
	$maxMatch = (int)$matches[6];
	$selectedMatch = $matches[7]; 
	$selectedM = rtrim($selectedMatch, "\n"); 

	//Checks to see if the gender is what the user is seeking 
	if (strcmp($mGender, $genderMatch) === 0 || strcmp($mGender2, $genderMatch) === 0) {
		//checks to see if the gender of user is what match is seeking 
		$other = ''; 
		$other2 = ''; 
		if(strcmp($selectedM, 'M') === 0 || strcmp($selectedM, 'F') === 0) {
			$other = $selectedM; 
		} else {
			$other = 'M'; 
			$other2 = 'F'; 
		}
		if(strcmp($other, $sGender) === 0 || strcmp($other2, $sGender) === 0) {
			//checks to make sure the user does not get themself as a match
			if($sInfo[0]!= $matches[0]) {
			

				//Variables used for determining if they match
				$matchesOther = NULL;
				$matchesSingle = NULL;
		
				//Checks the age compatability 
				if ($minMatch <= $sAge && $sAge <= $maxMatch && $sMin <= $ageMatch && $ageMatch <= $sMax) {
					$matchesOther = TRUE;
					$matchesSingle = TRUE;
				}

				if($matchesOther && $matchesSingle){
					//Checks if they have the same favorite OS 
					if (strcmp($sOS, $osMatch) === 0) {

						//Checks if they have at least one personality type in common
						$p = "/[".$sPersonality."]/";
						if (preg_match($p, $personalityMatch) === 1) {
						//if they share one personality type, they are put into the matches array 
							$m[] = $s[$x];

							if ($f) {
?>
				<strong>Matches for <?= $_GET["name"] ?></strong><br>
<?php
								$f = false;
							}
?>
		<!--Prints out information for each match --> 
		<div class="match">
			<img src="./images/user.jpg" alt="photo">
			<div>
				<ul class = "column">
					<li><p><?= $matches[0] ?></p></li>
					<li><strong>gender:</strong> <?= $genderMatch ?></li>
					<li><strong> age:</strong> <?= $ageMatch ?> </li>
					<li><strong> type:</strong> <?= $personalityMatch ?> </li>
					<li><strong> OS:</strong> <?= $osMatch ?></li>
				</ul>
			</div>
		</div>
<?php
						}
					}
				}
			}
		}
	}
}
?>
</div>

<?php
//Message that will appear if matches array is empty 
if (count($m) === 0) {
?>
<div> No match is found. </div>
<!--Bottom of every page --> 
<?php

	}
	bottom(); 
	?> 
</body>
</html>

	
