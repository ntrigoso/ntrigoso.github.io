<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
	
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = $_POST["name"];
			$section = $_POST["section"];
			$creditcard = $_POST["creditcard"];
			$credit_type = $_POST["credit_type"];
			
			//EXERCISE 4 
			if (isset($_REQUEST["name"]) && isset($_REQUEST["section"]) && isset($_REQUEST["creditcard"]) && isset($_REQUEST["credit_type"]) && $_REQUEST["name"] != "" && $_REQUEST["section"] != "" && 
			$_REQUEST["creditcard"] != "" && $_REQUEST["credit_type"] != ""){
				
				$data = $name. ";" . $section. ";" . $creditcard. ";" . $credit_type. "\n";
				file_put_contents("suckers.html", $data, FILE_APPEND);
				
				// EXERCISE 2 
				echo "<h1>Thanks, sucker!</h1>";
				echo "<p>Your information has been recorded.</p>"; 
				echo "<dl>";
				echo "<dt>Name</dt>
				<dd>" . $name . "</dd>";
				echo "<dt>Section</dt>
				<dd>" . $section . "</dd>";
				echo "<dt>Credit Card</dt>
				<dd>" . $creditcard . " (" . $credit_type . ")</dd>";
				echo "</dl>";
				
				//EXERCISE 3
				echo "<p>Here are all the suckers who have submitted here:</p>";
				echo "<pre>" . file_get_contents("suckers.html") . "</pre>";
				
				
			} else {
				
				echo "<h1>Sorry</h1>";
				echo "<p>You didn't fill out the form completely. <a href='buyagrade.html'>Try again?</a></p>";
			
				}
			}
		?>

	</body>
</html> 