<?php 
	
	session_start();
	
	$_SESSION['signup'] = array();
	$_SESSION['signup']['username'] = $_POST['username'];
	$_SESSION['signup']['password'] = $_POST['password'];
	$_SESSION['signup']['email'] = $_POST['email'];
	$_SESSION['signup']['name'] = $_POST['name'];
	$_SESSION['loggedIn'] = true;
	$_SESSION['username'] =  $_POST['username'];
	$_SESSION['chapters'] = array();
	
	//redirect to scrapbook, don't force user to log in again!
	//$redirect_url = "/moments/login/?alert=signed_up&username=" . $_POST['username'];
	//header('Location: ' .  $redirect_url);
	//exit;

	$redirect_url = "/moments/scrapbook/";
	
	header('Location: ' .  $redirect_url);
	exit;
	

	
?>