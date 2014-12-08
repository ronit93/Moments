<?php
	$page = "login";
	require($_SERVER['DOCUMENT_ROOT'] . "/moments/php/include/header.php");
?>
<html>
  <head>
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="/moments/css/login.css">
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
		  	<div class="login">
			  	<form action="/moments/php/login.php" method="post">
			  		<div class="item">Username: <input type="text" name="username" value="<?php echo $_GET['username']; ?>"></div>
					<div class="item">Password:   <input type="password" name="password"></div>
					<input class="button" type="submit" value="Login">
				</form>
			</div>
		  	<div>Don't have an account?
		  		<a href="/moments/signup/" class="signup">Sign Up</a>
		  	</div>
		</center>
	</div><!--end main-->
	
	<div class="footer-wrapper">
      <div class="footer"> 
        <div class="foot"> Copyright Moments Inc.</div>
      </div>
    </div>
    
    
    <!--js-->
    <script src="/moments/js/jquery.js" charset="utf-8" type="text/javascript"></script>
    <script src="/moments/js/main.js" charset="utf-8" type="text/javascript"></script>
    <script charset="utf-8" type="text/javascript">

    
    </script>
    
    
  </body>
</html>