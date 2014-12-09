<?php 
	
	session_start();

	$chapterID = $_GET['ch_id'];
	
	for ($i=$chapterID; $i<sizeof($_SESSION['chapters']); $i++) {
		if ($i+1 == sizeof($_SESSION['chapters'])) { //delete last element of array
			unset($_SESSION['chapters'][$i]);
		}
		else { //move everything else up one spot in the array
			$_SESSION['chapters'][$i] = $_SESSION['chapters'][$i+1];
		}
	}
	
	
	$redirect_url = "/moments/scrapbook/";
	header('Location: ' .  $redirect_url);
	exit;
	
?>