<!DOCTYPE html>
<html lang = "en"> 
<!-- Webpro Fall 2023 Da best -->
<!-- Author: Nadia Trigoso -->
<!-- Date: 11/10/2023 -->
<!-- Validated: OK 4 sure -->
<head>
	<title> nerdLuv Matches</title> 
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
?>
<!--Main content area --> 
<div class = "maintextarea"> 
<!--Form for user who has already signed up--> 
<!--Links to the matches-submit.php--> 
	<form action = "matches-submit.php" method = "get"> 
		<fieldset> 
		<!--Ask for name --> 
			<legend> Returning User: </legend> 
			<strong class = "column"> Name: </strong> 
			<input type = "text" name = "name" maxlength = "16"> 
			<!--Button for seeing matches --> 
			<input type = "submit" value = "View My Matches"> 
		</fieldset> 
		
	
	</form>
	
</div> 
<!--Bottom of every page --> 
<?php 
bottom(); 
?> 
</body>
</html>

