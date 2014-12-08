<?php 
	
	session_start();

	$oldIndex = $_GET['old'];
	$newIndex = $_GET['new'];
	$chapterID = $_GET['ch_id'];
	
	
	$temp = $_SESSION['chapters'][$chapterID]['pages'][$newIndex];
	$_SESSION['chapters'][$chapterID]['pages'][$newIndex] = $_SESSION['chapters'][$chapterID]['pages'][$oldIndex];
	$_SESSION['chapters'][$chapterID]['pages'][$oldIndex] = $temp;
	
?>