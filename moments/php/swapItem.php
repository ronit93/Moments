<?php 
	
	session_start();

	$oldIndex = $_GET['old'];
	$newIndex = $_GET['new'];
	$chapterID = $_GET['ch_id'];
	$pageID = $_GET['pg_id'];
	
	
	$temp = $_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$newIndex];
	$_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$newIndex] = $_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$oldIndex];
	$_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$oldIndex] = $temp;
	
?>