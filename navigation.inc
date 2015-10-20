<?php

/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: navigation.inc
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This include file holds the navigation menu for the website. It is 
 * 				applied to all php view pages of the MVC model.
 *   
 * */
 
session_start();

class Navigation {
  // class Page's attributes
  protected $title = "Music Electric Inc.";
  protected $keywords = "Music, Electric, Inc, Instruments, Gear, Guitars, Drums";
  protected	$server;
  protected $filePath;
  
  public function __construct(){
  	$this->server = 'http://'.$_SERVER["SERVER_NAME"];    					// domain name for localhost
//	$this->server = 'http://'.$_SERVER["SERVER_NAME"].'/~ics325fa1528';		// domain name for school server
//	$this->filePath = $_SERVER["DOCUMENT_ROOT"]."/ics325/GroupProject/\n";	// testing purposes
  }
 
  public function __toString() {
    return  $this -> DisplayHeader().
			$this -> DisplayTitle().
    		$this -> DisplayKeywords().
    		$this -> DisplayStyles().
    		$this -> DisplayScripts().
    		"</head>\n<body>\n\n".
    		$this -> DisplayMenu()
    		//. $this-> filePath
			;			
  }
  
  public function GetServer() {
  	return $this->server;
  }
  
  public function GetFilePath() {
  	return $this->filePath;
  }
  
  public function DisplayHeader(){
  	return "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"
			 	\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
			<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\">\n
			<head>\n";
  }
 
  public function DisplayTitle() {
	return "<title>".$this->title."</title>\n";
  }
 
  public function DisplayKeywords() {
    return "<meta name=\"keywords\" content=\"" . 
   				$this->keywords."\" />\n";
  }
 
  public function DisplayStyles() {
		
  	return "<link rel=\"stylesheet\" type=\"text/css\" href=\"$this->server/ics325/GroupProject/styles/style.css\" />\n" .
  		   "<link rel=\"stylesheet\" type=\"text/css\" href=\"$this->server/ics325/GroupProject/styles/form.css\" />\n" .
  		   "<link rel=\"stylesheet\" type=\"text/css\" href=\"$this->server/ics325/GroupProject/styles/userInfoTable.css\" />\n" .
	 	   "<link rel=\"stylesheet\" type=\"text/css\" href=\"$this->server/ics325/GroupProject/styles/navigation.css\" />\n";
  }
  
  public function DisplayScripts() {
  	return "<script type=\"text/javascript\" src=\"$this->server/ics325/GroupProject/js/validateScript.js\"> </script>\n";
  }
 
  public function DisplayMenu()  {
  	
//	$filePath = $_SERVER['DOCUMENT_ROOT'];
//	$filePath .= "/ics325/GroupProject";
//	$filePath = $_SERVER['PHP_SELF'];
//	$filePath = $_SERVER['PATH'];

	$loggedIn = "<a href=\"$this->server/ics325/GroupProject/accounts/login.php\">login</a>";
	if(isset($_SESSION['uname'])) {
        $loggedIn = "Logged in as: " . $_SESSION['uname'] . " | <a href=\"$this->server/ics325/GroupProject/accounts/logout.php\">logout</a>";
    }
    return "<!--START MENU-->

		<div>
			<ul id=\"mainNav\">
				<li><a href=\"$this->server/ics325/GroupProject/index.php\">home</a></li>
				
				<li>
					<a href=\"$this->server/ics325/GroupProject/guitars/guitars.php\">guitars</a>
					<ul>
						<li><a href=\"$this->server/ics325/GroupProject/guitars/acoustics.php\">acoustic</a></li>
						<li><a href=\"$this->server/ics325/GroupProject/guitars/electrics.php\">electric</a></li>
						<li><a href=\"$this->server/ics325/GroupProject/guitars/basses.php\">bass</a></li>
					</ul>
				</li>
				
				<li>
					<a href=\"$this->server/ics325/GroupProject/amps/amps.php\">amps</a>
					<ul>
						<li><a href=\"$this->server/ics325/GroupProject/amps/acoustic.php\">acoustic</a></li>
						<li><a href=\"$this->server/ics325/GroupProject/amps/electric.php\">electric</a></li>
						<li><a href=\"$this->server/ics325/GroupProject/amps/bass.php\">bass</a></li>
					</ul>
				</li>
				
				<li>
					<a href=\"$this->server/ics325/GroupProject/drums/drums.php\">drums</a>
					<ul>
						<li><a href=\"$this->server/ics325/GroupProject/drums/acoustic.php\">acoustic</a></li>
						<li><a href=\"$this->server/ics325/GroupProject/drums/electric.php\">electric</a></li>
					</ul>
				</li>
				
				<li>
					<a href=\"$this->server/ics325/GroupProject/info/info.php\">information</a>
					<ul>
						<li><a href=\"$this->server/ics325/GroupProject/info/about.php\">about</a></li>
						<li><a href=\"$this->server/ics325/GroupProject/info/contact.php\">contact</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
		<!--END MENU-->\n
		<div class=\"head\">Music Electric Inc.</div>
		<div class=\"users\">"
			. $loggedIn .
			" | <a href=\"$this->server/ics325/GroupProject/accounts/register.php\">register</a>
		</div>";  // end return  
  }
}
?>
