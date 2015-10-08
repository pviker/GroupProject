function yesTxtFn() {
	phoneNum = document.getElementById( "phone" ).value;
	email = document.getElementById( "email" ).value;
	zip = document.getElementById( "postalcode" ).value;
	zipPattern = /^\d{5}((\-|\.|\+|\s?)\d{4})?$/;
	canZipPatt = /^[A-C|E|G-H|J-N|P|R-T|VXY]\d[A-C|E|G-H|J-N|P|R-T|V-Z]\s?\d[A-C|E|G-H|J-N|P|R-T|V-Z]\d$/;
	phonePatt = /^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/;
	emailPatt = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
	
	if (zipPattern.test(zip) == false || canZipPatt.test(zip) == false ){
		document.getElementById( "spanZip" ).innerHTML = "<-- Invalid Postal Code";
	}
	
	if (zipPattern.test(zip) == true || canZipPatt.test(zip) == true ){
		document.getElementById( "spanZip" ).innerHTML = "";
	}
	
	if (phonePatt.test(phoneNum) == false){
		document.getElementById( "spanPhoneNum" ).innerHTML = "<-- Invalid Phone Number";
	}
	
	if (phonePatt.test(phoneNum) == true){
		document.getElementById( "spanPhoneNum" ).innerHTML = "";
	}
	
	if (emailPatt.test(email) == false){
		document.getElementById( "spanEmail" ).innerHTML = "<-- Invalid email";
	}
	
	if (emailPatt.test(email) == true){
		document.getElementById( "spanEmail" ).innerHTML = "";
	}
}