<?php
	$page = "scrapbook";
	require($_SERVER['DOCUMENT_ROOT'] . "/moments/php/include/header.php");
?>
<html>
  <head>
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="/moments/css/scrapbook.css">
    <link rel="stylesheet" href="/moments/css/main.css">
    <link rel="stylesheet" href="/moments/js/jquery-ui/jquery-ui.css">
	<title>Moments</title>
  </head>
  <body>
  	<div class="menu-wrapper">
  		<div class="navbar"> 
  			<div class="nav">
  				<a href="/moments/scrapbook/" class="scrapbook">My Moments</a>
  			</div>
  			<div class="logo"> Moments </div>
  		</div>
  		<div class="menu">
  			<div class="add-btn-wrapper menu-item">
  				<a href="#" id="addChapterButton">
  					<img class="item" src="/moments/img/add_button2.png">
  					<h3 class="item"> Add Chapter </h3>
  				</a>
  			</div>
  			<h1 class="title menu-item">My Moments</h1>
  			<div class="user menu-item">
  					<h3 class="item"> <?php echo $_SESSION['username']; ?> </h3>
  					<a href="/moments/php/logout.php"><abbr title="Logout">
						<img class="item" src="/moments/img/logOut_button.png"></abbr>
					</a>
  			</div>
  		</div>
  	</div>
  	
  	<div class="main">
	  	
	  	<?php if (sizeof($_SESSION['chapters']) > 0): ?>
	  	
	  	<div class="items">
		  	<ul class="itemList sortable">
			  	
			  	<?php for ($i=0; isset($_SESSION['chapters'][$i]); $i++): ?>
			  	
			  	<li class="item" draggable="true" data-index="<?php echo $i; ?>">
			        <a href="/moments/chapter/?ch_id=<?php echo $i; ?>">
			  	  	<?php if (isset($_SESSION['chapters'][$i]['pages'][0]['items'][0]['thumb']) && $_SESSION['chapters'][$i]['pages'][0]['items'][0]['thumb'] != "/moments/img/default.png"): ?>
						<img class="content mainimg" src="<?php echo $_SESSION['chapters'][$i]['pages'][0]['items'][0]['thumb']; ?>">
					<?php else: ?>
					  	<img class="content mainimg" src="/moments/img/default.png">
					<?php endif; ?>
		              <!--<div class="options">
		                <!--<img id="share" src="/moments/img/share.png">--><!--TODO share button needs to be implemented
		                <a href="/moments/php/deleteChapter.php?ch_id=<?php echo $i; ?>"><img id="trash" src="/moments/img/trash.png"></a>
		              </div>-->
		              <div class="titlebox">  
		                <a class="confirmButton" href="/moments/php/deleteChapter.php?ch_id=<?php echo $i; ?>"><img id="trash" src="/moments/img/trash.png"></a>
		                <h2 class="title"><?php echo $_SESSION['chapters'][$i]['title'];?></h2>
		              </div>
			        </a>
			  	</li>
		        
		        <?php endfor; ?>
		        
		  	</ul>
	  	</div>
	  	
	  	<?php else: ?>
	  	
	    <div class="start">
	      <h1>Welcome to your scrapbook - Let's Get Started!</h1><br>
	      <h2> This is your main page where all your chapters of life will be located. </h2>
	      <h2> Add a chapter to your scrapbook by pressing the <img src="/moments/img/add_button2.png"> at the top left of this screen</h2>
	    </div>
    
		<?php endif; ?>
    
    
	    <div class="form hidden" id="addChapterForm">
	      <h3>Add Chapter</h3>
	      <form action="/moments/php/addChapter.php" method="post">
	        <div class="input">
	         <fieldset>
	              Add Title: <input class="field" type="text" name="title" required><br>
	              Location: <input class="field" type="text" name="location"><br>
	              <input class="button" type="submit" value="Add Chapter">
				        <button class="button" type="button" id="addChapterCancelButton"> Cancel </button>
	          </fieldset>
	        </div>
	      </form>
	    </div>
    
    
	</div><!--end main-->
  	
  <div class="footer-wrapper">
      <div class="footer"> 
        <div class="foot"> &copy Moments Inc.</div>
      </div>
    </div>
    
    
    <!--js-->
    <script src="/moments/js/jquery.js" charset="utf-8" type="text/javascript"></script>
    <script src="/moments/js/jquery-ui/jquery-ui.js" charset="utf-8" type="text/javascript"></script>
    <script src="/moments/js/main.js" charset="utf-8" type="text/javascript"></script>
    <script src="/moments/js/jquery.sortable.js"></script>
    <script charset="utf-8" type="text/javascript">
	    
	    //handle drag and drop sorting
	    $(".sortable").sortable();
	    $('.sortable').sortable().bind('sortupdate', function() {
		    
		    
		    $('.sortable').sortable('disable');
		    
		    
		    $(".itemList li").each(function(index) {
			    var oldIndex = $(this).attr("data-index");
			    var newIndex = index;
			    
			    if (newIndex < oldIndex) {
					$.ajax({
						url: '../php/swapChapter.php?old=' + oldIndex + "&new=" + newIndex,
						success: function (response) {//response is value returned from php
							//alert(response);
   						}
					});
			    }
			    
		    });
		    
		    location.reload();
		    		    
		});
    
    	$("#addChapterButton").click(function () {
	    	$("#addChapterForm").fadeIn(500);
    	});
    	
    	$("#addChapterCancelButton").click(function () {
	    	$("#addChapterForm").fadeOut(500);
    	});
    	
    	$("#dateInput").datepicker();
    	
    	$(".confirmButton").click(function (event) {
	    	var confirmed = confirm("Are you sure you want to delete?");
	    	if (!confirmed) {
		    	event.preventDefault();
	    	}
    	});
    
    </script>
    
    
  </body>
</html>