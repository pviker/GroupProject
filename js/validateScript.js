/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: validateScript.js
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This script holds all validation functions for the user registration form.
 *   
 * */

function engageSubmit(){
	
}

/** Validates zip code **/
function zipValid() {
	zip = document.getElementById( "postalcode" ).value;
	zipPattern = /^\d{5}((\-|\.|\+|\s?)\d{4})?$/;
	
	if (zipPattern.test(zip) == false){
		formValid(false);
		document.getElementById( "spanZip" ).innerHTML = "<-- Invalid Postal Code";
	}
	
	if (zipPattern.test(zip) == true){
		
		document.getElementById( "spanZip" ).innerHTML = "";
	}
	
}

/** Validate phone numbers **/
function phoneValid() {
	phoneNum = document.getElementById( "phone" ).value;
	phonePatt = /^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/;
	
	if (phonePatt.test(phoneNum) == false){
		formValid(false);
		document.getElementById( "spanPhoneNum" ).innerHTML = "<-- Invalid Phone Number";
	}
	
	if (phonePatt.test(phoneNum) == true){
		
		document.getElementById( "spanPhoneNum" ).innerHTML = "";
	}
	
}

/** validates email **/
function emailValid() {
	email = document.getElementById( "email" ).value;
	emailPatt = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
	
	if (emailPatt.test(email) == false){
		formValid(false);
		document.getElementById( "spanEmail" ).innerHTML = "<-- Invalid email";
	}
	
	if (emailPatt.test(email) == true){
		
		document.getElementById( "spanEmail" ).innerHTML = "";
	}
	
}

/** confirms 2nd passwd with 1st passwd **/
function passwdValid() {
	passwd = document.getElementById( "passwd" ).value;
	confirmPasswd = document.getElementById( "confirmPasswd" ).value;
	
	if (passwd == confirmPasswd){
		formValid(true);
		document.getElementById( "spanPasswd" ).innerHTML = "<-- It's a match!";
	}  else if (passwd != confirmPasswd){
		formValid(false);
		document.getElementById( "spanPasswd" ).innerHTML = "";
	}
}

function pValid() {
	passwd = document.getElementById( "passwd" ).value;
	
	if (passwd == ""){
		formValid(false);
		document.getElementById( "spanP" ).innerHTML = "<-- Required!";		
	}
}

function usernameValid() {
	username = document.getElementById( "user" ).value;
	
	if (username == ""){
		formValid(false);
		document.getElementById( "spanUsername" ).innerHTML = "<-- Required!";
	} 
}

/** Flags submit button if fields are invald **/
function formValid(flag) {
	if (flag == true){
		document.getElementById( "submit" ).type = "submit";
		document.getElementById( "submit" ).style.opacity = 1;
	} else if (flag == false){
		document.getElementById( "submit" ).type = "button";
		document.getElementById( "submit" ).style.opacity = .5;
	}
}
