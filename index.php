<?php
	
	session_start();
	
	if ($_SESSION['loggedIn']) {
		$redirect_url = "/moments/scrapbook";
		header('Location: ' .  $redirect_url);
		exit;
	}
	else {
		$redirect_url = "/moments/login";
		header('Location: ' .  $redirect_url);
		exit;
	}
	
?>