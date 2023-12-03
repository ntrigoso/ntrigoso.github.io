<!DOCTYPE html>
<html lang = "en"> 
<!-- Webpro Fall 2023 Da best -->
<!-- Author: Nadia Trigoso -->
<!-- Date: 11/10/2023 -->
<!-- Validated: OK 4 sure -->
<head>
	<title> nerdLuv </title> 
	<link href="https://codd.cs.gsu.edu/~lhenry23/Web/HW/Asg03_2023/nerdieluv.css" rel="stylesheet">
</head>
<body> 
<!-- EXTRA FEATURES Included: 
1. Robust page with form validation 
2. LGBT Matches 
-->

<!-- Top of every page --> 
<?php session_start(); /* Starts the session */

	if(!isset($_SESSION['UserData']['Username'])){
		header("location:login.php");
		exit;
	}
	include("common.php"); 
	top(); 
?>
<!-- Main content for index.php --> 
<div class = "maintextarea"> 
	<h1> Welcome!</h1> 
	<!--Ask the user if they want to create a new account or search matches --> 
	<ul> 
		<li> <a href = "signup.php"> 
			<img src = "./images/signup.gif" alt = "SignUp"> 
			Sign up for a new account </a> </li> 
		<li><a href = "matches.php"> 
			<img src = "./images/bigheart.gif" alt = "Matches"> 
			Check your matches </a> </li> 
	</ul>
	
</div> 
<!--Ask user if they would like to log out --> 
	<p> Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.</p> 
<!--Bottom of every page --> 
	<?php 
	bottom(); 
	?> 


</body>
</html>