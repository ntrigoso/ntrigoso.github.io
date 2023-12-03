/* 
	Webpro Fall 2023 Da best
	Author: Nadia Trigoso
	Date: 11/21/2023
	Validated: OK 4 sure 
	
*/ 
	
//initiates an array for the indexes of the pictures that will be used 
var values = [];
function check(){
	//for when user chooses 8 pictures 
    if(document.getElementById("8").checked){
        values = ['1','1','2','2','3','3','4','4','5','5','6','6','7','7','8','8'];
		
	//for when user chooses 10 pictures 
	}else if(document.getElementById("10").checked) {
        values = ['1','1','2','2','3','3','4','4','5','5','6','6','7','7','8','8','9','9','10','10'];
	
	//for when user chooses 12 pictures 
	}else if(document.getElementById("12").checked) {
        values = ['1','1','2','2','3','3','4','4','5','5','6','6','7','7','8','8','9','9','10','10','11','11','12','12'];
	}
}

//function for shuffling the array with the pictures' indexes 
Array.prototype.shuffle= function() {

    var r, temp;
    for(let i = this.length-1; i > 0; i--){
        r = Math.floor(Math.random() * (i+1));
        temp = this[r]; 
        this[r] = this[i];
        this[i] = temp; 
    }
}

//variable for showing the display of the table 
var display = '';

//variable for the timer
var timeInterval; 

//function that starts the game 
function start(){
	
	//variable for level of difficulty 
	var level = 0; 
	
	//determines value of level based on user's response to the question asked in the form 
	if(document.getElementById("easy").checked) {
		level = 8000; 
	} else if(document.getElementById("medium").checked) {
		level = 5000; 
	} else if(document.getElementById("hard").checked) {
		level = 3000; 
	}
	
	//shuffles the array with the pcitures' indexes 
    values.shuffle();

	//for inserting the images in the display of the game
    for(var i = 0; i < values.length; i++){
        display += '<div id="card'+i+'"><img src=images/image'+values[i]+'.jpg></div>';
    }
	//inserts the display of the game in the gmeboard 
    document.getElementById('gameboard').innerHTML = display;
	
	//resets the display of the game
    display = "";
    
	//begins the game and the timer of the game with a delay
	//delay depends on the level of difficulty the user chooses 
    setTimeout(function(){
		
		//changes the display of the game
        for(var i = 0; i < values.length; i++){
			//calls the function that flips the cards 
            display += '<div id="card'+i+'" onclick="flip(this,\''+values[i]+'\')" style = "background: url(\'downloads/download'+i+'.png\')"></div>';
			
        }
		//inserts new display of the game once game starts 
        document.getElementById('gameboard').innerHTML = display;
		
    }, level);
    
	//calls the timer's function 
    setTimeout(function(){
        timeInterval = myTimer();
    }, level-500);
    
}

//variable for the cards the user flips and matches 
var flippedCards = 0; 

//array for the cards the user matches correctly 
var matches= [];

//array for the ids of the cards 
var indexes = [];

//function that flips the cards and resets if necessary 
function flip(card,value){
	
	//for when the amount of cards flipped is less than 2 
    if(card.innerHTML == "" && matches.length < 2){
		
		//shows the image that is clicked 
        card.innerHTML = '<img src=images/image'+value+'.jpg>';
		
        if(matches.length === 0){
			//only updates the elements of each array
            matches.push(value);
            indexes.push(card.id);
			
        } else if(matches.length == 1){
			//updates the elements of each array and continues 
            matches.push(value);
            indexes.push(card.id);
            
			//if the cards flipped match 
            if(matches[0] === matches[1]){
				//updates the amount of flipped cards and matched 
                flippedCards += 2;
				//resets both arrays 
                matches = [];
                indexes = [];
                
				//for when user successfully matches all of the cards 
                if(flippedCards == values.length){
					var txt; 
					//gives user option to play again or stop 
                    if(confirm("YOU WON! Press 'okay' to play again or 'cancel' to stop")) {
						location.reload();
					} else {
						txt = "CONGRATULATIONS ON YOUR WIN!"; 
						clearTimeout(timeInterval); 
					}
					//inserts winner message in the game 
					document.getElementById('winner').innerHTML = txt; 
                    
                }
			//for when cards flipped do not match 	
            }else {
                function flipBack(){
					//resets each image 
                    var card1 = document.getElementById(indexes[0]);
                    var card2 = document.getElementById(indexes[1]);
                    card1.innerHTML = "";
                    card2.innerHTML = "";
					//clears out the arrays for flipped cards and indexes 
                    matches = [];
                    indexes = [];
                }
                
                setTimeout(flipBack, 1000);
            }
        }
    }
}
//function for the timer 
function myTimer(){
	//variable for timer 
	var setTime = 0; 
	
	//timer for when user chooses 8 pictures 
    if(document.getElementById("8").checked) {
        setTime = 120000;
		
	//timer for when user chooses 10 pictures 
	}else if(document.getElementById("10").checked) {
        setTime = 150000;
		
	//timer for when user chooses 12 pictures 
	}else if(document.getElementById("12").checked) {
        setTime = 180000;
	}
	
	//sets up timer 
    var countDownDate = new Date().getTime()+ setTime;
    var t = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
		//inserts timer in the documents and starts counting down 
        document.getElementById("timer").innerHTML = '<b>'+ minutes + ":" + seconds+'</b>';
        
		//when timer runs out 
        if (distance < 0) {
            clearInterval(t);
            document.getElementById("timer").innerHTML = "Time has run out!";
            alert("Time has run out!");
            location.reload();
        }
       
    }, 1000);
	//returns the timer to its initiated variable 
	return t; 
}


