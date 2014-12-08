<?php 
	
	session_start();

	$chapterID = $_GET['ch_id'];
	$pageID = $_GET['pg_id'];
	
	
	$newItem = array();
	
	
	//handle file uploads
	if ($_POST['upload'] == "true") {
		
		$uploaddir = '../uploads/';
		$mediaFile = $uploaddir . basename(time() . "-" . $_FILES['mediaUpload']['name']);
		move_uploaded_file($_FILES['mediaUpload']['tmp_name'], $mediaFile);
		$newItem['url'] = $mediaFile;
		
		if ($_FILES['thumbUpload']['name'] == "") {
			$newItem['thumb'] = "/moments/img/default.png";
			$newItem['thumb'] = "/moments/img/default.png";
		}
		else {
			$thumbFile = $uploaddir . basename(time() . "-" . $_FILES['thumbUpload']['name']);
			move_uploaded_file($_FILES['thumbUpload']['tmp_name'], $thumbFile);
			$newItem['thumb'] = $thumbFile;
		}

		$newItem['text'] = $_POST['text'];

	}
	
	//handle social media imports
	else {
		$newItem['text'] = $_POST['text'];
		$newItem['url'] = $_POST['url'];
		$newItem['thumb'] = $_POST['thumb'];
		
		if ($_POST['thumb'] == "") {
			$newItem['thumb'] = "/moments/img/default.png";
		}
	}
	
	
	
	
	
	array_push($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'], $newItem);
	
	
	$redirect_url = "/moments/page/?ch_id=$chapterID&pg_id=$pageID";
	header('Location: ' .  $redirect_url);
	exit;
	
?>