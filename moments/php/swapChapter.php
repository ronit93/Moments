<?php 
	
	session_start();

	$oldIndex = $_GET['old'];
	$newIndex = $_GET['new'];
	
	
	$temp = $_SESSION['chapters'][$newIndex];
	$_SESSION['chapters'][$newIndex] = $_SESSION['chapters'][$oldIndex];
	$_SESSION['chapters'][$oldIndex] = $temp;
	
?>