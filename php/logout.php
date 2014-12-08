<?php  
	
	
	//totally clear session
	session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
	
	$redirect_url = "/moments/login/";
	header('Location: ' .  $redirect_url);
	exit;
	
?>