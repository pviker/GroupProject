<?php
class Navigation {
  // class Page's attributes
  protected $title = "Music Electric Inc.";
  protected $keywords = "Music, Electric, Inc, Instruments, Gear, Guitars, Drums";
 
  public function __toString() {
    return  "<html>\n<head>\n".
			$this -> DisplayTitle().
    		$this -> DisplayKeywords().
    		$this -> DisplayStyles().
    		"</head>\n<body>\n\n".
    		$this -> DisplayMenu();
  }
 
  public function DisplayTitle() {
    return "<title>".$this->title."</title>\n";
  }
 
  public function DisplayKeywords() {
    return "<meta name=\"keywords\" content=\"" . 
   				$this->keywords."\" />\n";
  }
 
  public function DisplayStyles() {
  	 return "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/style.css\" />\n" .
	 			"<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/navigation.css\" />\n";
  }
 
  public function DisplayMenu()  {

    return "<!--START MENU-->
		<div>
			<ul id=\"mainNav\">
				<li><a href=\"index.php\">home</a></li>
				
				<li>
					<a href=\"#\">guitars</a>
					<ul>
						<li><a href=\"#\">acoustic</a></li>
						<li><a href=\"guitars/electrics.php\">electric</a></li>
						<li><a href=\"#\">bass</a></li>
					</ul>
				</li>
				
				<li>
					<a href=\"#\">amps</a>
					<ul>
						<li><a href=\"#\">acoustic</a></li>
						<li><a href=\"amps/electric.php\">electric</a></li>
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
<!--END MENU-->\n";    
  }
}
?>
