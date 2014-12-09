<?php 
	
	session_start();

	$chapterID = $_GET['ch_id'];
	
	
	$newPage = array();
	$newPage['title'] = $_POST['title'];
	$newPage['date'] = $_POST['date'];
	$newPage['location'] = $_POST['location'];
	$newPage['items'] = array();
	
	array_push($_SESSION['chapters'][$chapterID]['pages'], $newPage);
	
	
	$redirect_url = "/moments/page/?ch_id=$chapterID&pg_id=" . (sizeof($_SESSION['chapters'][$chapterID]['pages']) - 1);
	header('Location: ' .  $redirect_url);
	exit;
	
?>