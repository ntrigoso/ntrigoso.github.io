<!DOCTYPE html>
<html lang="en">
<!-- Webpro Fall 2023 Da best -->
<!-- Author: Nadia Trigoso -->
<!-- Date: 10/23/2023 -->
<!-- Validated: OK 4 sure -->
    <head>
        <meta charset="utf-8">
        <title>CW04 Exercises</title>
    </head>
<body>

<?php
echo"<h1><center> CW04 </center></h1>"; 
echo "<h2>Exercise 1: Function </h2>"; 
function hello_world() {

echo "Hello World!"; 

}
echo "<i>Used function hello_world() to print statement: </i><br> <br>"; 
hello_world(); 


echo "<h2>Exercise 2: Loops </h2>"; 
echo "<i>Only used nested for-loops to create triangle below: </i><br><br>"; 

for ($i = 0; $i < 5; $i++){
	for($j = 0; $j <= $i; $j++){ 
    	echo "*"; 
    }
    echo "<br>"; 
}



echo "<h2>Exercise 3: Function</h2>"; 
function triangle($x) {
	for($i = 0; $i < $x; $i++){
    	for($j = 0; $j <= $i; $j++){
        	echo "*"; 
        }
        echo "<br>"; 
    }
}
echo "<i>Used function triangle() to create triangle below:</i><br><br>";
triangle(5);


echo "<h2>Exercise 4: Function</h2>"; 
function word_count($word){
	$count = 0;
    $yesWord = False; 
    for($i = 0; $i < strlen($word); $i++){
    	if($word[$i] == ' '){
        	if($yesWord){
            	$count++; 
            }
            
        }
        else{
            	$yesWord = True; 
            } 
    }
    if($yesWord == True){
        	$count++; 
    }
    return $count; 
	
}
echo "<i>Number of words when string = hello, how are you?:</i><br><br>";
echo word_count("hello, how are you?"); 



echo "<h2>Exercise 5: Function</h2>"; 
function countWords($str){
	$split = explode(" ", $str); 
    $wordCount = array(); 
    foreach($split as $word => $w_c){
    	if(array_key_exists($w_c, $wordCount)){
        	$wordCount[$w_c] += 1; 
        }
        else{
        	$wordCount[$w_c] = 1; 
        }
    }
    print_r($wordCount); 
}
$str = strtolower("Hi hi you Hi How are you today"); 
echo "<i>Number of times each word occurs when string = Hi hi you How are you today:</i><br><br>";
countWords($str);
 

echo "<h2>Exercise 6: Function</h2>"; 
function remove_all($str, $c) {
	$new = ""; 
    for($i = 0; $i < strlen($str); $i++){
    	if($str[$i] != $c[0]) {
        	$new .= $str[$i]; 
        }
    }
    return $new; 
} 
echo "<i>New string when the 'e' charcater is removed from string = Summer is here!:</i><br><br>";
echo remove_all("Summer is here!", 'e'); 


?> 
<h2> Link to the code for the exercises above: </h2> 
<a href = "CW04sourceCode.txt">CW04 Source Code</a>

</body>
</html>