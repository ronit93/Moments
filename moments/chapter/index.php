<?php
	$page = "chapter";
	require($_SERVER['DOCUMENT_ROOT'] . "/moments/php/include/header.php");
	
	$chapterID = $_GET['ch_id'];
?>
<html>
  <head>
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/moments/css/main.css">
    <link rel="stylesheet" href="/moments/css/chapter.css">
    <link rel="stylesheet" href="/moments/js/jquery-ui/jquery-ui.css">
    <title>Moments</title>
  </head>
  <body>
  	<div class="menu-wrapper">
  		<div class="navbar"> 
  		   <div class="back-btn">
	           <a href="/moments/scrapbook/">
	           		<abbr title="My Moments">
	    				<img class="item" src="/moments/img/back_button2.png">
	    			</abbr>
	           </a>
  			</div>
  			<div class="nav">
  				<a href="/moments/scrapbook/" class="scrapbook">My Moments</a> >
  				<a href="/moments/chapter/?ch_id=<?php echo $chapterID; ?>" class="chapter"><?php echo $_SESSION['chapters'][$chapterID]['title']; ?></a>
  			</div>
  			<div class="logo"> Moments </div>
  		</div>
  		<div class="menu">
  			<div class="add-btn-wrapper menu-item">
  				<a href="#" id="addPageButton">
  					<img class="item" src="/moments/img/add_button2.png">
  					<h3 class="item">Add Page</h3>
  				</a>
  			</div>
        <div class="title-date">
    			<h1 class="title"><?php echo $_SESSION['chapters'][$chapterID]['title']; ?></h1>
          <!--<img class="edit" id="edit-title" src="/moments/img/edit.png">--><!--TODO edit button needs to be implemented-->
          <!--<h3 class="date"><?php echo $_SESSION['chapters'][$chapterID]['date']; ?></h3> -->
          <!--<img class="edit" id="edit-date" src="/moments/img/edit.png">--><!--TODO edit button needs to be implemented-->
        </div>
  			<div class="user menu-item">
				<h3 class="item"> <?php echo $_SESSION['username']; ?> </h3>
				<!--Logout button-->
				<a href="/moments/php/logout.php">
					<abbr title="Logout">
						<img class="item" src="/moments/img/logOut_button.png">
					</abbr>
				</a>
  			</div>
  		</div>
  	</div>
  	<div class="main">
	  	
		  	<?php if (sizeof($_SESSION['chapters'][$chapterID]['pages']) > 0): ?>
	
		  	<div class="items">
			  	<ul class="itemList sortable">
			  	
				  	<?php for ($i=0; isset($_SESSION['chapters'][$chapterID]['pages'][$i]); $i++): ?>

				  	<li class="item" draggable="true" data-index="<?php echo $i; ?>">
					  	<a href="/moments/page/?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $i; ?>">
				  			<!--<div class="options">
				  				<!--<img id="share" src="/moments/img/share.png">--><!--TODO share button needs to be implemented
				  				<a href="/moments/php/deletePage.php?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $i; ?>"><img id="trash" src="/moments/img/trash.png"></a>
			          		</div>-->
					  		<?php if (isset($_SESSION['chapters'][$chapterID]['pages'][$i]['items'][0]['thumb']) && $_SESSION['chapters'][$chapterID]['pages'][$i]['items'][0]['thumb'] != "/moments/img/default.png"): ?>
						  		<img class="content mainimg" src="<?php echo $_SESSION['chapters'][$chapterID]['pages'][$i]['items'][0]['thumb']; ?>">
						  	<?php else: ?>
				  				<img class="content mainimg" src="/moments/img/default.png">
				  			<?php endif; ?>
					  		<div class="titlebox">	
					  			<!--<img id="share" src="/moments/img/share.png">--><!--TODO share button needs to be implemented-->
				  				<a class="confirmButton" href="/moments/php/deletePage.php?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $i; ?>"><img id="trash" src="/moments/img/trash.png"></a>
						  		<h2 class="title"><?php echo $_SESSION['chapters'][$chapterID]['pages'][$i]['title'];?></h2>
						  	</div>
					  	</a>
				  	</li>
				  	
				  	<?php endfor; ?>
			  	
			  	</ul>
		  	</div>

			  	<?php else: ?>
			  	
			    <div class="start">
			      <h1>This is the <?php echo $_SESSION['chapters'][$chapterID]['title']; ?> chapter!</h1>
			      <h2> Add a page to this chapter by pressing the <img src="/moments/img/add_button2.png"> at the top left of this screen</h2>
			    </div>
    
		  	
		  	<?php endif; ?>
		  	
		  	
	        <!--The pop up window for 'Add Page'-->
		      <div class="form hidden" id="addPageForm">
		        <h3>Add Page</h3>
		        <form action="/moments/php/addPage.php?ch_id=<?php echo $chapterID; ?>" method="post">
		          <div class="input">
		           <fieldset>
		                Add Title: <input class="field" type="text" name="title" required><br>
		                Date: <input class="field" type="text" name="date" id="dateInput"><br>
		                Location: <input class="field" type="text" name="location"><br>
		                <input class="button" type="submit" value="Add Page">
		                <button class="button" type="button" id="addPageCancelButton"> Cancel </button>
		            </fieldset>
		          </div>
		        </form>
		      </div><!--end form-->
	      
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
						url: '../php/swapPage.php?ch_id=<?php echo $chapterID; ?>&old=' + oldIndex + "&new=" + newIndex,
						success: function (response) {//response is value returned from php
							//alert(response);
   						}
					});
			    }
			    
		    });
		    
		    location.reload();
		    		    
		});
    
    	$("#addPageButton").click(function () {
	    	$("#addPageForm").fadeIn(500);
    	});
    	
    	$("#addPageCancelButton").click(function () {
	    	$("#addPageForm").fadeOut(500);
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