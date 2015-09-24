<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 	<link  rel="stylesheet" type="text/css" href="styles/style.css" />
    <title>**RESULTS** String Processor App - ICS325 - Assignment 2</title>
</head>

<body>

<?php

	// foreach ($_POST as $key=>$value) {
	   			 // $$key=htmlspecialchars(strip_tags($value));
				 // echo "Key Value: " .$key. "<br>
				 	// Variable Value: " . $value . "<br>";	
	// }
	 
	// global $superString;
	// global $strarray;
	$strarray = explode (", ", htmlspecialchars($_POST['csvStrings']));
	$superString = implode ("", $strarray);
		
	// extract fields from form and create variables
	foreach ($_POST as $key=>$value) {
	    // create a new variable with a name matching the 'name' attribute of
	    // each field in the form
	    $$key=htmlspecialchars(strip_tags($value));	
	 }

	// get form text field value and echo back
	function getCSVString(){
		echo htmlspecialchars($_POST['csvStrings']);
	}

	// 1. explode to get super string
	function getString($superString){
		//checkbox validation true
	 	if(isset($_POST['findSuperString'])){
	 		echo $superString;
		}
		//checkbox validation false
		if(!isset($_POST['findSuperString'])){
			echo "**NOT CHECKED**";
		}
	}
	
	// 2. check to see if 1st logical string is contained in beginsWith();
	function beginsWith($beginSubString){
		$subStringLength = strlen($beginSubString);
		$stringLength = 0;
		$valid = FALSE;
		global $strarray;
		global $superString;
		
		// sequentially add char_count per logical string
		// if char_count matches char_count($beginSubString)
		// check for sub-string and make it valid, else = FALSE
		foreach ($strarray as $string){
			$stringLength = strlen($string) + $stringLength;
			if ($subStringLength == $stringLength){
				$pos = strrpos($superString, $beginSubString);
				if ($pos == 0) {
					$valid = TRUE;
					echo $beginSubString. " (YES)";
				} // end if @ pos 0
			} // end string length compare	
		} // end foreach
		
		if ($valid === FALSE){
			echo $beginSubString. " (NO)";
		} // end if not valid = false
		
	} // end beginsWith function
	
	// 3. check to see if 1st logical string is contained in beginsWith();
	function endsWith($endSubString){
		$subStringLength = strlen($endSubString);
		$stringLength = 0;
		$valid = FALSE;
		global $strarray;
		global $superString;
		$arraySize = count($strarray);
		$indexCount = $arraySize;
		$currentString = "";
		
		// sequentially add char_count per logical string
		// if char_count matches char_count($beginSubString)
		// check for sub-string and make it valid, else = FALSE
		for ($i=0; $i<$arraySize; $i++) {
			
			$currentString = $strarray[$indexCount-1].$currentString;
			$stringLength = strlen($strarray[$indexCount-1]) + $stringLength;
			$indexCount--;
			if ($subStringLength == $stringLength){
				$pos = strrpos($superString, $endSubString);
				
				$success = $endSubString === "" || (($temp = strlen($superString) - strlen($endSubString)) >= 0 
														&& strpos($superString, $endSubString, $temp) !== FALSE);
				
				if ($success == 1) {
					$valid = TRUE;
					echo $endSubString. " (YES)";
				} // end if @ pos 0
			} // end string length compare	
		} // end foreach
		
		if ($valid === FALSE){
			echo $endSubString. " (NO)";
		} // end if not valid = false
	}
	
	// 13. reverse array
	function reverse($strarray){
	 	if(isset($_POST['reverseCSVStrings'])){
	 		$reverseArray = array_reverse($strarray);
			foreach ($reverseArray as $onestring)
				echo $onestring. ", ";	
		}else if(!isset($_POST['reverseCSVStrings'])){
			echo "**NOT CHECKED**";
		}
	} // end reverse function
	
	// 12. get length of superString
	function getCodepointLength(){
		global $superString;
		
		if(isset($_POST['superStringLength'])){
	 		echo strlen($superString);
		}else if(!isset($_POST['superStringLength'])){
			echo "";
		}
	} // end getCodepointLength function
	
	// 11. count CSV strings
	function getLength(){
		global $strarray;
		
		if(isset($_POST['csvStringCount'])){
			echo count($strarray);
		} else if(!isset($_POST['csvStringCount'])){
			echo "";
		}
	} // end getLength()
	
	// 10. get logical character from value
	function getStringAt($getStringFrom){
		global $strarray;
		
		if ( $getStringFrom <= 0 || $getStringFrom > count($strarray) ){
			echo "Position doesn't exist";
		} else {
			echo $strarray[$getStringFrom - 1]. " (" .$getStringFrom. ")";
		}
	} // end getStringAt function

	// 9. add string at given index and echo superstring
	function addStringAt($insertString, $insertStringNumber, $strarray){
		if ( $insertStringNumber <= 0 || $insertStringNumber > count($strarray) ){
			echo "Position doesn't exist";
		} else {
			$strarray[$insertStringNumber - 1] = $insertString.$strarray[$insertStringNumber - 1];
			echo implode ("", $strarray);
			echo " (" .$insertString. ", " .$insertStringNumber. ")";
		}
	} // end addStringAt function

	// 7. get array intersect from input CSV strings and original CSV strings
	function getIntersectingRank($intersectStrings, $strarray){
		echo $intersectStrings;
		$strarray2 = explode (", ", $intersectStrings);
		$intersectArray = array_intersect($strarray, $strarray2);
		echo " (" .count($intersectArray). ")";
	} // end getIntersectingRank function

	// 8. returns true of input param is anagram of superstring
	function isAnagram($isAnagram, $strarray, $superString){
		echo $isAnagram;
		$strarray2 = explode (", ", $isAnagram);
		$superString2 = implode("", $strarray2);
		$intersectArray = array_intersect($strarray, $strarray2);
			if (strlen($superString2) == strlen($superString)){
				echo " (YES)";
			} else {
				echo " (NO)";
			}
	} // end isAnagram function

	// 14. checks whether superstring is a palindrome
	function isPalindrome(){
		global $superString;
		if (isset($_POST['isPalindrome'])){
			$revSuper = strrev($superString);
			if ($revSuper == $superString){
				echo "YES";
			} else if ($revSuper != $superString){
				echo "NO";
			}
		}else if(!isset($_POST['isPalindrome'])) {
			echo "N/A";
		}
	} // end isPalindrome() function

	// 15. checks whether logical characters are an isogram
	function isIsogram($strarray){
		$isogramValid = TRUE;
		foreach($strarray as $string){
			foreach (count_chars($string, 1) as $i => $val) {
   				if ($val > 1){
   					$isogramValid = FALSE;
   				}
			} // loop to count chars in each logical string
		} // end foreach to loop through logical characters
		
		if (!$isogramValid){
			echo "NO";
		} else if ($isogramValid){
			echo "YES";
		}
	} // end isIsogram function

	// 5. checks if given substrings are contained within superstring
	function containsAllString($containsCSVStrings){
		global $superString;
		$containsArray = explode (", ", $containsCSVStrings);
		$valid = TRUE;
		
		foreach ($containsArray as $needle){
			if (strpos($superString, $needle) !== false) {
	    		$valid = TRUE;
			} else {
				$valid = FALSE;
				break;
			} // end if else
		} // end foreach
		
		if ($valid == FALSE){
			echo $containsCSVStrings. " (NO)";
		} else if($valid == TRUE){
			echo $containsCSVStrings. " (YES)";
		} // end if else
	} // end containsAllString();

	// 4. checks if superString contains Substring
	function contains($containsSubString){
		global $strarray;
		$a = "";
		$valid = FALSE;
		
		foreach ($strarray as $char){
			$a = $a.$char;
			if ( strpos($a, $containsSubString) !== false ) {
				$valid = TRUE;
				break;
			} else {
				$valid = FALSE;
			}
		} // end foreach
		
		 if ($valid == TRUE){
			 echo $containsSubString." (YES)";
		 } else if ($valid == FALSE){
			 echo $containsSubString." (NO)";
		 }
		
	}

?>

	<table>
	    <form action="StringProcessor.php" method="post">
	    	<tr>
	    		<td>0. Input CSV strings</td>
	    		<td><input type="text" name="csvStrings" readonly="true"
	    				value="<?php getCSVString(); ?>" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>1. Find super string?</td>
	    		<td><input type="text" name="findSuperString" readonly="true" 
	    				value="<?php getString($superString); ?>" size="35" /></td>	
	    	</tr>
	    	<tr>
	    		<td>2. Begins with sub-String?</td>
	    		<td><input type="text" name="beginSubString" readonly="true"
	    				value="<?php beginsWith($beginSubString); ?>" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>3. Ends with sub-String?</td>
	    		<td><input type="text" name="endSubString" 
	    				value="<?php endsWith($endSubString); ?>" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>4. Contains this  sub-String?</td>
	    		<td><input type="text" name="containsSubString" 
	    				value="<?php contains($containsSubString); ?>" size="35" /></td>
	    	</tr>
			<tr>
	    		<td>5. Contains these CSV strings?</td>
	    		<td><input type="text" name="containsCSVStrings" 
	    				value="<?php containsAllString($containsCSVStrings); ?>" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>6. Can make this String?</td>
	    		<td><input type="text" name="canMakeString" value="troverty" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>7. How many CSV strings intersect?</td>
	    		<td><input type="text" name="intersectStrings" 
	    				value="<?php getIntersectingRank($intersectStrings, $strarray); ?>" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>8. Is it an anagram?</td>
	    		<td><input type="text" name="isAnagram" 
	    				value="<?php isAnagram($isAnagram, $strarray, $superString); ?>" size="35" /></td>
	    	</tr> 
	    	<tr>
	    		<td>9. Add this string at this position.</td>
	    		<td><input type="text" name="insertString" 
	    				value="<?php addStringAt($insertString, $insertStringNumber, $strarray); ?>" size="35" />
	    			</td>
	    	</tr>
	    	<tr>
	    		<td>10. Get the string from this position</td>
	    		<td><input type="text" name="getStringFrom" 
	    				value="<?php getStringAt($getStringFrom); ?>" size="20" /></td>
	    	</tr>	
	    	<tr>
	    		<td>11. Check for number of  csv strings</td>
	    		<td><input type="text" name="csvStringCount" readonly="true" 
	    				value="<?php getLength(); ?>" size="4" /></td>
	    	</tr>
	    	<tr>
	    		<td>12. Check for length of super string</td>
	    		<td><input type="text" name="superStringLength" readonly="true" 
	    				value="<?php getCodepointLength(); ?>" size="4" /></td>
	    	</tr>
	    	<tr>
	    		<td>13. Reverse CSV Strings</td>
	    		<td><input type="text" name="reverseCSVStrings" readonly="true" 
	    				value="<?php reverse($strarray); ?>" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>14. Is it palindrome?</td>
	    		<td><input type="text" name="isPalindrome" readonly="true" 
	    				value="<?php isPalindrome(); ?>" size="4" /></td>	
	    	</tr>
	    	<tr>
	    		<td>15. Is it isogram?</td>
	    		<td><input type="text" name="isIsogram" readonly="true"
	    				value="<?php isIsogram($strarray); ?>" size="4" /></td>	
	    	</tr>
	        <tr>
	        	<td></td><td><input type="submit" class="submitButton" value="Start Over" /></td>
	        </tr>
	    </form>
	</table>
</body>
</html>
