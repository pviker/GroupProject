/** Validates zip code **/
function zipValid() {
	zip = document.getElementById( "postalcode" ).value;
	zipPattern = /^\d{5}((\-|\.|\+|\s?)\d{4})?$/;
	
	if (zipPattern.test(zip) == false){
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
		document.getElementById( "spanEmail" ).innerHTML = "<-- Invalid email";
	}
	
	if (emailPatt.test(email) == true){
		document.getElementById( "spanEmail" ).innerHTML = "";
	}
	
}

/** confirms 2nd passwd with 1st passwd **/
function confirmPasswd() {
	passwd = document.getElementById( "passwd" ).value;
	confirmPasswd = document.getElementById( "confirmPasswd" ).value;
}