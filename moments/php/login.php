<?php

	session_start();
	
	//open database connection
	//require($_SERVER['DOCUMENT_ROOT'] . "/moments/php/db/open.php");
	
	
	//log in handler
	if (!$_SESSION['loggedIn']) { //if we have NOT logged in yet
		
		//set username & password
		if (isset($_POST['username'])) { $username = strtolower($_POST['username']); }
		else { $username = ""; }
		if (isset($_POST['password'])) { $password = $_POST['password']; }
		else { $password = ""; }
		
		//try to log in
		$loginSuccess = attemptLogin($username, $password, $connection); //connection is used when we actually have a database.
		
		if ($loginSuccess) {
			$_SESSION['loggedIn'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['chapters'] = array();
		}
		else {
			$_SESSION['loggedIn'] = false;
		}
	}
	
	
	//close database connection
	//require($_SERVER['DOCUMENT_ROOT'] . "/moments/php/db/close.php");
	
	
	//redirect to destination
	if (!$loginSuccess) {
		$redirect_url = "/moments/login/?alert=login_failed";
	}
	else {
		$redirect_url = "/moments/scrapbook/";
	}
	
	header('Location: ' .  $redirect_url);
	exit;
	
	
	/****FUNCTIONS****/
	
	function attemptLogin ($username, $password, $connection) {
	
		/*
		$query = "SELECT * FROM members WHERE username = '";
		$query .= $username;
		$query .= "' AND password = '";
		$query .= $password;
		$query .= "'";
		
		$result = mysql_query($query, $connection);
		$rows = mysql_num_rows($result);
		if ($rows) {
			return true;
		}
		else {
			return false;
		}
		*/
		
		
		if ($username == "" || $password == "") {
			return false;
		}
		
		//check against our premade one
		if ("user212" == $username && "password212" == $password) {
			return true;
		}
		
		//check against our signup one
		else if ($_SESSION['signup']['username'] == $username && $_SESSION['signup']['password'] == $password) {
			return true;
		}
		
		else {
			return false;
		}
		
	}
	
	
?>