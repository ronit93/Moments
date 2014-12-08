<?php 
	
	session_start();

	$chapterID = $_GET['ch_id'];
	$pageID = $_GET['pg_id'];
	
	for ($i=$pageID; $i<sizeof($_SESSION['chapters'][$chapterID]['pages']); $i++) {
		if ($i+1 == sizeof($_SESSION['chapters'][$chapterID]['pages'])) { //delete last element of array
			unset($_SESSION['chapters'][$chapterID]['pages'][$i]);
		}
		else { //move everything else up one spot in the array
			$_SESSION['chapters'][$chapterID]['pages'][$i] = $_SESSION['chapters'][$chapterID]['pages'][$i+1];
		}
	}
	
	
	$redirect_url = "/moments/chapter/?ch_id=$chapterID";
	header('Location: ' .  $redirect_url);
	exit;
	
?>