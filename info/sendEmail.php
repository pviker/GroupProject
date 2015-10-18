<?php

	if(isset($_POST['subject'])){
		$subject = $_POST['subject'];
	}else $subject = "no subject";
	
	if(isset($_POST['clientEmail'])){
		$clientEmail = $_POST['clientEmail'];
	}else $clientEmail = "no email";
	
	if(isset($_POST['comments'])){
		$message = $_POST['comments'];
	}else $message = "no comments";
	
	$to = "pviker@me.com";
	
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= "From: patviker@gmx.com" . "\r\n";
	$headers .= "Cc: patrickviker@gmail.com" . "\r\n";
	
	
	if(mail($to,$subject,$message,$headers)){
		echo "Success, bitches!";
	} else echo "Didn't work";
	
//	$mail = mail("pviker@me.com", "Subject is this!", "First line of text\nSecond line of text");
	
//	echo $success;
	
//	echo $message;
	
	// header("Location: ../index.php");
//  
	// session_start();
//  
	// $_SESSION['emailMessage'] = "Message succesfully sent!";

?>