<?php 
	
	function loginCheckAndRedirect($page) {
		session_start();
		
		if (!$_SESSION['loggedIn'] && $page != "login" && $page != "signup") {
			$redirect_url = "/moments/login";
			header('Location: ' .  $redirect_url);
			exit;
		}
		
		if ($_SESSION['loggedIn'] && ($page == "login" || $page == "signup")) {
			$redirect_url = "/moments/scrapbook";
			header('Location: ' .  $redirect_url);
			exit;
		}
		
	}
	
	function loginCheck() {
		session_start();
		if (!$_SESSION['loggedIn']) {
			return 0;
		}
		else {
			return 1;
		}
	}
	
	
	
	
?>