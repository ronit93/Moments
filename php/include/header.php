<?php 
	
	session_start();
	
	//require functions
	require($_SERVER['DOCUMENT_ROOT'] . "/moments/php/functions.php");
	
	//open database connection
	require($_SERVER['DOCUMENT_ROOT'] . "/moments/php/db/open.php");
	
	//check logged in
	loginCheckAndRedirect($page);
	
?>