<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 	<link  rel="stylesheet" type="text/css" href="styles/style.css" />
    <title>String Processor App - ICS325 - Assignment 2</title>
</head>

<body>

	<table>
	    <form action="Results.php" method="post">
	    	<tr>
	    		<td>0. Input CSV strings</td>
	    		<td><input type="text" name="csvStrings" 
	    				value="me, tro, pol, it, an, u, ni, ver, si, ty" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>1. Find super string?</td>
	    		<td><input type="checkbox" name="findSuperString" checked /></td>	
	    	</tr>
	    	<tr>
	    		<td>2. Begins with sub-String?</td>
	    		<td><input type="text" name="beginSubString" value="metro" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>3. Ends with sub-String?</td>
	    		<td><input type="text" name="endSubString" value="rsity" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>4. Contains this  sub-String?</td>
	    		<td><input type="text" name="containsSubString" value="anuni" size="35" /></td>
	    	</tr>
			<tr>
	    		<td>5. Contains these CSV strings?</td>
	    		<td><input type="text" name="containsCSVStrings" 
	    				value="tro, it, an, u, si, ty, me, ni" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>6. Can make this String?</td>
	    		<td><input type="text" name="canMakeString" value="troverty" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>7. How many CSV strings intersect?</td>
	    		<td><input type="text" name="intersectStrings" 
	    				value="tro, it, an, u, si, ty, me, ni, y, m" size="35" /></td>
	    	</tr>
	    	<tr>
	    		<td>8. Is it an anagram?</td>
	    		<td><input type="text" name="isAnagram" 
	    				value="tro, pol, it, u, ni, si, ty, ver, me, an" size="35" /></td>
	    	</tr> 
	    	<tr>
	    		<td>9. Add this string at this position.</td>
	    		<td><input type="text" name="insertString" value="state" size="10" />
	    			<input type="text" name="insertStringNumber" value="6" size="2" /></td>
	    	</tr>
	    	<tr>
	    		<td>10. Get the string from this position</td>
	    		<td><input type="text" name="getStringFrom" value="8" size="2" /></td>
	    	</tr>	
	    	<tr>
	    		<td>11. Check for number of  csv strings</td>
	    		<td><input type="checkbox" name="csvStringCount" checked /></td>	
	    	</tr>
	    	<tr>
	    		<td>12. Check for length of super string</td>
	    		<td><input type="checkbox" name="superStringLength" checked /></td>	
	    	</tr>
	    	<tr>
	    		<td>13. Reverse CSV Strings</td>
	    		<td><input type="checkbox" name="reverseCSVStrings" checked /></td>	
	    	</tr>
	    	<tr>
	    		<td>14. Is it palindrome?</td>
	    		<td><input type="checkbox" name="isPalindrome" checked /></td>	
	    	</tr>
	    	<tr>
	    		<td>15. Is it isogram?</td>
	    		<td><input type="checkbox" name="isIsogram" checked /></td>	
	    	</tr>
	        <tr>
	        	<td></td><td><input type="submit" class="submitButton" /></td>
	        </tr>
	    </form>
	</table>
</body>
</html>
