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
 
//session_start();

class URLpath {
	protected $server;
  
	public function __construct(){
		global $path;
  	
	//setPath('http://'.$_SERVER["SERVER_NAME"]);
	
 	$this->server = 'http://'.$_SERVER["SERVER_NAME"];
	$path = $this->server; 					// domain name for localhost
//	$this->server = 'http://'.$_SERVER["SERVER_NAME"].'/~ics325fa1528';		// domain name for school server
//	$this->filePath = $_SERVER["DOCUMENT_ROOT"]."/ics325/GroupProject/\n";	// testing purposes
	}
  
  public function setPath($server){
  	$this->server = $server;
  	//return $server;
  }
  
  public function getPath(){
  	return $this->server;
  }
	
} // end class navigation
?>
