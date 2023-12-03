/* 
	Webpro Fall 2023 Da best
	Author: Nadia Trigoso
	Date: 11/21/2023
	Validated: OK 4 sure */ 


//performs the calculation for the pay of each employee
function calculation(hours) {
	//hourly rate 
    var rate= 15; 
	
	//variable for paycheck of each employee
	var paycheck = 0;
	//for when hours are under 40
    if (hours <= 40) {
		paycheck = hours * rate; 
        return paycheck;
	//for when hours are over 40
    } else {
		paycheck = ((hours - 40) * rate * 1.5) + (40 * rate); 
        return paycheck;
    }
}
var total = 0;
//functions for taking each entry that the user puts in 
function entries() {
    var index = 1;
	//for when user enters input 
    while (true) {
		var regex = /^[0-9]+$/; 
        var hours = parseInt(prompt("Enter hours worked for employee " + index + " (or) any number less than -1 to finish:"));
		
		//checks user's input and validation 
        if ((hours <= -1 || regex.test(hours) === false) && index === 1) {
			//for when user enters invalid user input first 
			if(regex.test(hours) === false) {
				alert("Invalid input."); 
			}
            alert("No employees entered.");
            return;
			
		//for when users decide that they want to stop entering hours or enter invalid input 
        } else if (hours <= -1 || regex.test(hours) === false) {
			if(hours <= -1) {
				break;
			}
			
			else {
				//message that user gets for invalid input 
				alert("Invalid input."); 
				break; 
			}
		//calculates the paycheck of each employee and calculates the total
        }else {
			var pay = calculation(hours);
			total += pay;
			//calls the function that adds the employee's information to the table 
			add(index, hours, pay);
			index++;
		}
        
    }
	//outputs the total pay for all employees in the document 
    document.getElementById("total").innerText = "Total Pay of All Employees: $" + total.toFixed(2);
}
//function that puts employees' information in table 
function add(index, hours, pay) {
	
	//creates a table
    let table = document.getElementById("payroll");
	
	//create a new row in the table
    var row = table.insertRow();
	
	//creates new cells within the table 
    var c1 = row.insertCell(0);
	c1.innerHTML = index;
	
    var c2 = row.insertCell(1);
	c2.innerHTML = hours;
	
    var c3 = row.insertCell(2);
	c3.innerHTML = "$" + pay.toFixed(2);
}