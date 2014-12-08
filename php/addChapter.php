<?php 
	
	session_start();
	
	
	$newChapter = array();
	$newChapter['title'] = $_POST['title'];
	$newChapter['date'] = $_POST['date'];
	$newChapter['location'] = $_POST['location'];
	$newChapter['pages'] = array();
	
	array_push($_SESSION['chapters'], $newChapter);
	
	
	$redirect_url = "/moments/chapter/?ch_id=" . (sizeof($_SESSION['chapters']) - 1);
	header('Location: ' .  $redirect_url);
	exit;
	
?>