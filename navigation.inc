<?php
class Navigation {
  // class Page's attributes
  protected $content;
  protected $title = "Music Electric Inc.";
  protected $keywords = "Music, Electric, Inc, Instruments, Gear, Guitars, Drums";
  protected $buttons;
 
  // public function __construct()  {
    // $this->buttons = array("Home"   => "home.php",
                           // "Contact"  => "contact.php",
                           // "Services" => "services.php",
                           // "Site Map" => "map.php");
  // }
//   
  // public function setContent ( $str )  {
    // $this->content = $str.$this->buttons["Site Map"];
  // }
 
  public function __toString() {
    return "<html>\n<head>\n".
   		$this -> DisplayTitle().
    		$this -> DisplayKeywords().
    		$this -> DisplayStyles().
    		"</head>\n<body>\n".
//    		$this -> DisplayHeader().
    		$this -> DisplayMenu()
//    		$this->content.
//    		$this -> DisplayFooter().
//    		"</body>\n</html>\n"
;
  }
 
  public function DisplayTitle() {
    return "<title>".$this->title."</title>";
  }
 
  public function DisplayKeywords() {
    return "<meta name=\"keywords\" content=\"" . 
   $this->keywords."\"/>";
  }
 
  public function DisplayStyles() {
  	 return "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/style.css\" />" .
	 			"<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/navigation.css\" />";
  }
 
//  public function DisplayHeader() {
    // return
  		// '<table width="100%" cellpadding="12"'. 
// 'cellspacing="0" border="0">'.
      	// '<tr bgcolor ="black">'.
        // // '<td align ="left"><img src = "images/logo.gif" /></td>'.
        // '<td><h1>TLA Consulting Pty Ltd</h1></td>'.
        // // '<td align ="right"><img src = "images/logo.gif" /></td>'.
      	// '</tr>'.
  		// '</table>';
//  }
 
  public function DisplayMenu()  {
    // $str = "<table width=\"100%\" bgcolor=\"white\"".
           // "cellpadding=\"4\" cellspacing=\"4\">\n". "<tr>\n";
//  
    // //calculate button size
    // $width = 100/count($buttons);
//  
    // while (list($name, $url) = each($buttons)) {
      // $str .= $this -> DisplayButton($width, $name, $url,
                         // !$this->IsURLCurrentPage($url));
    // }
    // $str .= "</tr>\n";
    // $str .= "</table>\n";
    // return $str;
    
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
		<!--END MENU-->	";    
  }
/* 
  public function IsURLCurrentPage($url)  {
    if(strpos($_SERVER['PHP_SELF'], $url )==false)     {
      return false;
    } else {
      return true;
    }
  }
 
  public function DisplayButton($width,$name,$url,$active = true) {
    if ($active) {
      return 
        "<td width = \"".$width."%\">"."<a href=\"".$url."\">".
        "<img src=\"images/s-logo.gif\" alt=\"".$name.
        "\"border=\"0\" /></a>".
        "<a href=\"".$url.
        "\"><span class=\"menu\">".$name."</span></a>".
        "</td>";
    } else {
      return "<td width=\"".$width."%\">".
         "<img src=\"images/side-logo.gif\">".
         "<span class=\"menu\">".$name."</span>".
         "</td>";
    } 
  }
 
  public function DisplayFooter()  {
    return
     '<table width="100%" bgcolor="black" cellpadding="12" '.     
     'border="0">'.
        '<tr>'.
     '<td>'.
     '<p class="foot">&copy; TLA Consulting Pty Ltd.</p>'.
     '<p class="foot">Please see our <a href ="">legal '.
     'information page</a></p>'.'</td></tr></table>';
  }
 * 
 */
}
?>
