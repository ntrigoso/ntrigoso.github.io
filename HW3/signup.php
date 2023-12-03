<!DOCTYPE html>
<html lang = "en"> 
<!-- Webpro Fall 2023 Da best -->
<!-- Author: Nadia Trigoso -->
<!-- Date: 11/10/2023 -->
<!-- Validated: OK 4 sure -->
<head>
	<title> nerdLuv:Sign Up </title> 
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
	<!--Main text --> 
		<div class = "maintextarea"> 
		<!-- Form created --> 
			<form action = "signup-submit.php" method = "post"> 
				<fieldset> 
					<legend> New User Signup: </legend> 
					
					<!--Ask for user's name, input is text--> 
					<strong class = "column"> Name: </strong> 
					<input type = "text" name = "name" size = "16" > <br> 
					
					<!--Ask for user's gender, input is radio buttons--> 
					<strong class = "column"> Gender: </strong> 
					<input type="radio" name = "gender" value = "M" > Male
					<input type = "radio" name = "gender" value = "F"> Female
					
					<br> 
					<!--Ask for user's age, input is text--> 
					<strong class = "column"> Age: </strong> 
					<input type = "text" name = "age" size = "6" maxlength = "2" > <br >
					
					<!--Ask for user's personality type, input is text--> 
					<strong class = "column"> Personality type: </strong> 
					<input type = "text" name = "personality" size = "6" maxlength = "4" > 
					(<a href = "http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type? </a>)
					<br > 
					
					<!--Ask for user's favorite OS, input is a select menu--> 
					<strong class = "column"> Favorite OS: </strong> 
					<select name = "favOS" > 
						<option selected = "selected"> Windows </option> 
						<option> Mac OS X </option> 
						<option> Linux </option> 
					</select>
					<br > 
					
					<!--Ask for user's seeking age, input is text--> 
					<strong class = "column"> Seeking age: </strong> 
					<input type = "text" name = "ageMin" size = "6" maxlength = "2" placeholder = "min" >to 
					<input type = "text" name = "ageMax" size = "6" maxlength = "2" placeholder = "max" > 
					<br> 
					
					<!--Ask for user's seeking genders, input is checkboxes --> 
					<strong class = "column"> Seek Gender(s): </strong> 
					<input type = "checkbox" name = "seekgender[]" value = "M"> Male 
					<input type = "checkbox" name = "seekgender[]" value = "F"> Female
					<br>
					
					<!--Submit information button --> 
					<input type = "submit" value = "Sign Up" > 
					
					
					
				</fieldset> 
			</form>
		 </div> 
		 <!--Bottom of every page --> 
		 <?php 
		 bottom(); 
		 ?> 
	</body>

</html> 

