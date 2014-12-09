<?php 
	
	session_start();

	$chapterID = $_GET['ch_id'];
	$pageID = $_GET['pg_id'];
	$itemID = $_GET['it_id'];
	
	//delete any upload files here
	if (substr($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$itemID]['url'], 0, 10) === '../uploads') {
		unlink($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$itemID]['url']);
	}
	if (substr($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$itemID]['thumb'], 0, 10) === '../uploads') {
		unlink($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$itemID]['thumb']);
	}
	
	//move all items down the array
	for ($i=$itemID; $i<sizeof($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items']); $i++) {
		if ($i+1 == sizeof($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'])) { //delete last element of array
			unset($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$i]);
		}
		else { //move everything else up one spot in the array
			$_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$i] = $_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$i+1];
		}
	}
	
	$redirect_url = "/moments/page/?ch_id=$chapterID&pg_id=$pageID";
	header('Location: ' .  $redirect_url);
	exit;
	
?>