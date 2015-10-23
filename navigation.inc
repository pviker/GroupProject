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
    return  //"<!DOCTYPE html>\n" .
    		$this -> DisplayHeader() .
			$this -> DisplayTitle() .
    		$this -> DisplayKeywords() .
    		$this -> DisplayStyles() .
    		$this -> DisplayScripts() .
    		"</head>\n<body>\n\n" .
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
  	return //"<!DOCTYPE html>\n
			"<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\">\n
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

/** TESTING **/  	
//	$filePath = $_SERVER['DOCUMENT_ROOT'];
//	$filePath .= "/ics325/GroupProject";
//	$filePath = $_SERVER['PHP_SELF'];
//	$filePath = $_SERVER['PATH'];

	$loggedIn = "<a href=\"$this->server/ics325/GroupProject/accounts/login.php\">login</a>";
	if(isset($_SESSION['uname'])) {
        $loggedIn = "Logged in as: " . $_SESSION['uname'] . " | <a href=\"$this->server/ics325/GroupProject/accounts/logout.php\">logout</a>";
    }
	
	// $guitarSubCatList = $this->getGuitarNav();
	
    return "<!--START MENU-->

		<div>
			<ul id=\"mainNav\">
				<li><a href=\"$this->server/ics325/GroupProject/index.php\">home</a></li>
				
				<li>
					<a href=\"$this->server/ics325/GroupProject/products.php?cat=Guitars\">guitars</a>
					<ul>" 
					. $this->getGuitarNav() . 
					"</ul>
				</li>
				
				<li>
					<a href=\"$this->server/ics325/GroupProject/products.php?cat=Amps\">amps</a>
					<ul>" 
					. $this->getAmpsNav() . 
					"</ul>
				</li>
				
				<li>
					<a href=\"$this->server/ics325/GroupProject/products.php?cat=Drums\">drums</a>
					<ul>" 
					. $this->getDrumsNav() . 
					"</ul>
				</li>
				
				<li>
					<a href=\"$this->server/ics325/GroupProject/info/about.php\">information</a>
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
			| <a href=\"$this->server/ics325/GroupProject/accounts/admin.php\"> admin </a>
		</div>";  // end return 
		 
	} // end display menu function
	
	public function getGuitarNav(){
		require("controllers/database.php");
		
	    $query = "select category, subcategory from categories where category = \"Guitars\"";
	    $results = mysqli_query($dbc, $query);
		
		$guitar = "";
		while($row = mysqli_fetch_assoc($results)) {    
        	$guitar .= "<li><a href=\"$this->server/ics325/GroupProject/products.php?cat=" . $row["category"] . "&subcat=" . $row["subcategory"] . "\">" . $row["subcategory"] . "</a></li>";    
        }
		
		return $guitar;
	}
	
	public function getAmpsNav(){
		require("controllers/database.php");
		
	    $query = "select category, subcategory from categories where category = \"Amps\"";
	    $results = mysqli_query($dbc, $query);
		
		$amps = "";
		while($row = mysqli_fetch_assoc($results)) {    
        	$amps .= "<li><a href=\"$this->server/ics325/GroupProject/products.php?cat=" . $row["category"] . "&subcat=" . $row["subcategory"] . "\">" . $row["subcategory"] . "</a></li>";    
        }
		
		return $amps;
	}
	
	public function getDrumsNav(){
		require("controllers/database.php");
		
	    $query = "select category, subcategory from categories where category = \"Drums\"";
	    $results = mysqli_query($dbc, $query);
		
		$drums = "";
		while($row = mysqli_fetch_assoc($results)) {    
        	$drums .= "<li><a href=\"$this->server/ics325/GroupProject/products.php?cat=" . $row["category"] . "&subcat=" . $row["subcategory"] . "\">" . $row["subcategory"] . "</a></li>";    
        }
		
		return $drums;
	}
	
} // end class navigation
?>
