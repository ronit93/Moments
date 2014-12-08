<?php
	$page = "signup";
	require($_SERVER['DOCUMENT_ROOT'] . "/moments/php/include/header.php");
?>
<html>
  <head>
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="/moments/css/signup.css">
  	<title>Moments</title>
  </head>
  <body>
  	<div class="main">
  		<div class="logo">
  			<img src="/moments/img/logo.png">
  		</div>
	  	<h1>Moments</h1>
	  	<h2>The new way to organize your memories</h2>
	  	<center>
		  	<div class="signup">
			  	<form action="/moments/php/signup.php" method="post" accept-charset="utf-8">
			  		<div class="item">Name: <input type="text" name="name"></div>
			  		<div class="item">Email: <input type="text" name="email"></div>
			  		<div class="item">Username: <input type="text" name="username"></div>
					<div class="item">Password:   <input type="password" name="password"></div>
					<input  class="button" type="submit" value="Sign Up">
				</form>
		  	<div>Already have an account? 
		  	<a href="/moments/login/" class="signup">Login</a>
		  	</div>
		  </div>
		</center>
	</div>
	<div class="footer-wrapper">
      <div class="footer"> 
        <div class="foot"> Copyright Moments Inc.</div>
      </div>
    </div>
  </body>
</html>