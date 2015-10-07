<?php

class Navigation {
  // class Page's attributes
  protected $title = "Music Electric Inc.";
  protected $keywords = "Music, Electric, Inc, Instruments, Gear, Guitars, Drums";
  protected	$server;
  
  public function __construct(){
  	$this->server = 'http://'.$_SERVER["SERVER_NAME"];    					// domain name for localhost
//	$this->server = 'http://'.$_SERVER["SERVER_NAME"].'/~ics325fa1528';		// domain name for school server
  }
 
  public function __toString() {
    return  "<html>\n<head>\n".
			$this -> DisplayTitle().
    		$this -> DisplayKeywords().
    		$this -> DisplayStyles().
    		"</head>\n<body>\n\n".
    		$this -> DisplayMenu();			
  }
  
  public function GetServer(){
  	return $this->server;
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
	 	   "<link rel=\"stylesheet\" type=\"text/css\" href=\"$this->server/ics325/GroupProject/styles/navigation.css\" />\n";
  }
 
  public function DisplayMenu()  {
  	
//	$filePath = $_SERVER['DOCUMENT_ROOT'];
//	$filePath .= "/ics325/GroupProject";
//	$filePath = $_SERVER['PHP_SELF'];
//	$filePath = $_SERVER['PATH'];

    return "<!--START MENU-->
		<div>
			<ul id=\"mainNav\">
				<li><a href=\"$this->server/ics325/GroupProject/index.php\">home</a></li>
				
				<li>
					<a href=\"#\">guitars</a>
					<ul>
						<li><a href=\"#\">acoustic</a></li>
						<li><a href=\"$this->server/ics325/GroupProject/guitars/electrics.php\">electric</a></li>
						<li><a href=\"#\">bass</a></li>
					</ul>
				</li>
				
				<li>
					<a href=\"#\">amps</a>
					<ul>
						<li><a href=\"#\">acoustic</a></li>
						<li><a href=\"$this->server/ics325/GroupProject/amps/electric.php\">electric</a></li>
						<li><a href=\"#\">bass</a></li>
					</ul>
				</li>
				
				<li>
					<a href=\"#\">drums</a>
					<ul>
						<li><a href=\"#\">acoustic</a></li>
						<li><a href=\"#\">electric</a></li>
					</ul>
				</li>
				
				<li>
					<a href=\"#\">information</a>
					<ul>
						<li><a href=\"#\">about</a></li>
						<li><a href=\"#\">contact</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
<!--END MENU-->\n
		<div class=\"head\">Music Electric Inc.</div>
		<div class=\"users\"><a href=\"$this->server/ics325/GroupProject/accounts/login.php\">login</a> | 
			<a href=\"$this->server/ics325/GroupProject/accounts/register.php\">register</a></div>";    
  }
}
?>