/* 
	Webpro Fall 2023 Da best 
	Author: Nadia Trigoso
	Date: 11/05/2023 
	Validated: OK 4 sure */
	
document.addEventListener("DOMContentLoaded", function(){
	var tiles = document.querySelectorAll('.box'); 
	var clear = document.getElementById('clear'); 
	
	let down = false;
	let beginning;
	
	function clickTiles(tile) {
		
	/*Part II:Make a single tile turn black when its clicked
	& Part III: Implement Fill Toggling */
		tile.classList.toggle('filled');
		
		//Part VII: Implement X-Filling
		if(tile.classList.contains('filled')) {
			//if tile was previously filled, new image will be an x image 
			tile.classList.toggle("crossed-out");
		}
		 
	}
	
	
  tiles.forEach((tile) => {
	  
	/* Part VI: Drag and Fill */
	//calls funtions mouseDown() and mouseEnry() 
    tile.addEventListener("mousedown", (event) => mouseDown(event, tile));
    tile.addEventListener("mouseenter", () => mouseEntry(tile));
	
	// Has alert pop up after user takes finger off mouse 
	tile.addEventListener("mouseup", function(){
		
		// Part I: Make an alert pop up when user clicks a tile
		alert('You clicked a tile!'); 
	});
	
  });
	
	//Part V: Add a "Clear" Button to the Page 
	clear.addEventListener("click", function(){
		var filled = document.querySelectorAll(".filled"); 
		
		//if user hits clear button and confirms their choice 
		if(confirm("Are you sure you want to clear?")) {
			filled.forEach((tile) => {
				//clears out the tiles 
				tile.classList.remove("filled"); 
			}); 
		};
	}); 
	//function for part VI for when user has their mouse down 
	function mouseDown(event, tile) {
		down = true;
		beginning = tile.classList.contains("filled");
		clickTiles(tile);
		
	}
	//function for part VI for what happens to the tiles if user continues to have their mouse down
	function mouseEntry(tile) {
		if (down) {
			//calls function that colors tiles black 
			clickTiles(tile);
		}
		
	}
	//function for when user lifts their mouse up 
	function mouseUp() {
		down = false;
		beginning = undefined;
		
		
	}
	//calls the function mouseUp()
	document.addEventListener("mouseup", mouseUp); 
	
}); 