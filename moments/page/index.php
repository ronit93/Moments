<?php
	$page = "page";
	require($_SERVER['DOCUMENT_ROOT'] . "/moments/php/include/header.php");
	
	$chapterID = $_GET['ch_id'];
	$pageID = $_GET['pg_id'];
?>
<html>
  <head>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/moments/css/main.css">
    <link rel="stylesheet" href="/moments/css/page.css">
    <title>Moments</title>
     <!--js-->
    <script src="/moments/js/jquery.js" charset="utf-8" type="text/javascript"></script>
    <script src="/moments/js/main.js" charset="utf-8" type="text/javascript"></script>
    <script src="/moments/js/jquery.sortable.js"></script>
  </head>
  <body>
    <div class="menu-wrapper">
      <div class="navbar"> 
        <div class="back-btn">
          <a href="/moments/chapter/?ch_id=<?php echo $chapterID; ?>">
            <abbr title="<?php echo $_SESSION['chapters'][$chapterID]['title']; ?>">
              <img class="item" src="/moments/img/back_button2.png">
            </abbr>
          </a>
        </div>
        <div class="nav">
          <a href="/moments/scrapbook/" class="scrapbook">My Moments</a> >
          <a href="/moments/chapter/?ch_id=<?php echo $chapterID; ?>" class="chapter"><?php echo $_SESSION['chapters'][$chapterID]['title']; ?></a> >
          <a href="/moments/chapter/?ch_id=<?php echo $pageID; ?>" class="page"><?php echo $_SESSION['chapters'][$chapterID]['pages'][$pageID]['title']; ?></a> 
        </div>
        <div class="logo"> Moments </div>
      </div>
      <div class="menu">
        <div class="add-btn-wrapper menu-item">
          <a href="#" id="addItemButton">
            <img class="item" src="/moments/img/add_button2.png">
            <h3 class="item">Add Item</h3>
          </a>
        </div>
        <div class="title-date">
          <h1 class="title"><?php echo $_SESSION['chapters'][$chapterID]['pages'][$pageID]['title']; ?></h1>
          <!--<img class="edit" id="edit-title" src="/moments/img/edit.png">--><!--TODO edit button needs to be implemented-->
          <h3 class="date"><?php echo $_SESSION['chapters'][$chapterID]['pages'][$pageID]['date']; ?></h3>
          <!--<img class="edit" id="edit-date" src="/moments/img/edit.png">--><!--TODO edit button needs to be implemented-->
        </div>
        <div class="user menu-item">
            <h3 class="item"> <?php echo $_SESSION['username']; ?> </h3>
            <a href="/moments/php/logout.php"><abbr title="Logout"><img class="item" src="/moments/img/logOut_button.png"></abbr></a>
        </div>
      </div>
    </div>
    
    
    <?php if (isset($_SESSION['chapters'][$chapterID]['pages'][$pageID-1])): ?>
    <a href="/moments/page/?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $pageID-1; ?>">
    	<abbr title="<?php echo $_SESSION['chapters'][$chapterID]['pages'][$pageID-1]['title']; ?>">
        <img id="left-arrow" class="arrow" src="/moments/img/left-arrow.png">
      </abbr>

    </a>
    <?php endif; ?>
    
    <?php if (sizeof($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items']) > 0): ?>

	    <div class="main">
		    
	      <div class="items">
			  <ul class="itemList sortable">
			      
			    <?php for ($i=0; isset($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$i]); $i++): ?>
			      
			      	<li class="item grabbable" draggable="true" data-index="<?php echo $i; ?>">
				        <a href="<?php echo $_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$i]['url']; ?>" target="_blank">
					        <div>
		                <!--<div class="options">
		                  <!--<img id="share" src="/moments/img/share.png">--><!--TODO share button needs to be implemented
		                  <a href="/moments/php/deleteItem.php?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $pageID; ?>&it_id=<?php echo $i; ?>"><img id="trash" src="/moments/img/trash.png"></a>
		                </div>-->
                    <div id="content" data-src="<?php echo $_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$i]['url']; ?>">
                        <img src="<?php echo $_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$i]['thumb']; ?>" class="content mainimg">
                    </div>
					          <div class="titlebox"> <h4 class="caption"><?php echo $_SESSION['chapters'][$chapterID]['pages'][$pageID]['items'][$i]['text'];?></h4>
		                  <a class="confirmButton" href="/moments/php/deleteItem.php?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $pageID; ?>&it_id=<?php echo $i; ?>"><img id="trash" src="/moments/img/trash.png"></a>
		                </div>
					        </div>
				        </a>
			      	</li>
			      
			    <?php endfor; ?>
			    
			  </ul>
		  </div>
      <?php else: ?>
          
          <div class="start">
            <h1>This is the <?php echo $_SESSION['chapters'][$chapterID]['pages'][$pageID]['title'];?> page!</h1>
            <h2> Add an item to this page by pressing the <img src="/moments/img/add_button2.png"> at the top left of this screen</h2>
          </div>
          

	<?php endif; ?>
	      
	    <div class="socialImport-container hidden" id="socialAlbumSelect">
        <div class="socialImport">
          <div class="albums">
            <a class="album" href="#" data-album="europe">
	            <img src="http://api.ning.com/files/4uLsgpBK3A*j9I3VkhQIc-B12utHi4DBIhKbFvOkNOYqTVtZLLifOM-j8ikNtz-eeFQslqWi-ajHrdb95aJbuMcVubEvpg*Y/A2d8DdPCEAAsP_E.jpg">
	            <p>Europe</p>
	        </a>
	        <a class="album" href="#" data-album="junior_year">
	            <img src="http://alivecampus.com/wp-content/uploads/2013/06/Quad-Day-credit-Flikr.jpg">
	            <p>Junior Year</p>
	        </a>
	        <a class="album" href="#" data-album="summer_2014">
	            <img src="http://i2.cdn.turner.com/cnn/dam/assets/130530161523-100-beaches-crane-beach-horizontal-gallery.jpg">
	            <p>Summer 2014</p>
	        </a>
	        <a class="album" href="#" data-album="sophomore_year">
	            <img src="http://upload.wikimedia.org/wikipedia/commons/1/1a/Harper_Midway_Chicago.jpg">
	            <p>Sophomore Year</p>
	        </a>
          </div>
        </div>
         <button class="button pointer" type="button" id="cancelAlbumAddButton"> Cancel </button>
      </div>

      <div class="socialImport-container hidden" id="socialImageAdd">
        <button class="button pointer" type="button" id="cancelImageCancelButton"> Cancel </button>
        <p class="instructions">Click on an item to add it to your Page</p>
        <!--<button class="button pointer" type="button" id="addImageAddButton"> Add </button>-->
        <div class="socialImportImages">
          <div class="images hidden" id="images-europe">
            <a class="image" href="#"
	           data-text="Sunset in France"
		       data-url="http://api.ning.com/files/4uLsgpBK3A*j9I3VkhQIc-B12utHi4DBIhKbFvOkNOYqTVtZLLifOM-j8ikNtz-eeFQslqWi-ajHrdb95aJbuMcVubEvpg*Y/A2d8DdPCEAAsP_E.jpg"
			   data-thumb="http://api.ning.com/files/4uLsgpBK3A*j9I3VkhQIc-B12utHi4DBIhKbFvOkNOYqTVtZLLifOM-j8ikNtz-eeFQslqWi-ajHrdb95aJbuMcVubEvpg*Y/A2d8DdPCEAAsP_E.jpg">
			       <img src="http://api.ning.com/files/4uLsgpBK3A*j9I3VkhQIc-B12utHi4DBIhKbFvOkNOYqTVtZLLifOM-j8ikNtz-eeFQslqWi-ajHrdb95aJbuMcVubEvpg*Y/A2d8DdPCEAAsP_E.jpg">
			</a>
            <a class="image" href="#"
	           data-text="Milan in the Evening"
		       data-url="http://api.ning.com/files/8*U0dXYgYqkGtlMi2pfRvu9w5-Ypjc5UPA2qD3DhFWXD8Vk0TzsbcLU1cKeMDmkRZCuwdGINumGdFmbJ0IbJ7*JH1dfkxPmF/KamineskyBlogMilanNavigli1Final.jpg?width=750"
			   data-thumb="http://api.ning.com/files/8*U0dXYgYqkGtlMi2pfRvu9w5-Ypjc5UPA2qD3DhFWXD8Vk0TzsbcLU1cKeMDmkRZCuwdGINumGdFmbJ0IbJ7*JH1dfkxPmF/KamineskyBlogMilanNavigli1Final.jpg?width=750">
			       <img src="http://api.ning.com/files/8*U0dXYgYqkGtlMi2pfRvu9w5-Ypjc5UPA2qD3DhFWXD8Vk0TzsbcLU1cKeMDmkRZCuwdGINumGdFmbJ0IbJ7*JH1dfkxPmF/KamineskyBlogMilanNavigli1Final.jpg?width=750">
			</a>
			<a class="image" href="#"
	           data-text="Pompeii Visit"
		       data-url="http://api.ning.com/files/l-4OBRk5ozae9BvBjLXa6MDuCmbWCN3yIklO2v0bXa8HYC4WK5yv3w*Mc9CxK63cW4TnOl-we1JPFjOmoOHN3-LVSXt2x9eL/italypompeii.jpg"
			   data-thumb="http://api.ning.com/files/l-4OBRk5ozae9BvBjLXa6MDuCmbWCN3yIklO2v0bXa8HYC4WK5yv3w*Mc9CxK63cW4TnOl-we1JPFjOmoOHN3-LVSXt2x9eL/italypompeii.jpg">
			       <img src="http://api.ning.com/files/l-4OBRk5ozae9BvBjLXa6MDuCmbWCN3yIklO2v0bXa8HYC4WK5yv3w*Mc9CxK63cW4TnOl-we1JPFjOmoOHN3-LVSXt2x9eL/italypompeii.jpg">
			</a>
			<a class="image" href="#"
	           data-text="Greek Isles of Patras"
		       data-url="http://api.ning.com/files/8*U0dXYgYqlltkyPvDlY5n6cYhhkTvAd55ImTZF731C9xPVM0zoaGJGp*CxFDNatHpSKV3mVPzhJA7xyqIg3YGFcCdi18RrO/POROS20FROM20GALATASWEB.jpg"
			   data-thumb="http://api.ning.com/files/8*U0dXYgYqlltkyPvDlY5n6cYhhkTvAd55ImTZF731C9xPVM0zoaGJGp*CxFDNatHpSKV3mVPzhJA7xyqIg3YGFcCdi18RrO/POROS20FROM20GALATASWEB.jpg">
			       <img src="http://api.ning.com/files/8*U0dXYgYqlltkyPvDlY5n6cYhhkTvAd55ImTZF731C9xPVM0zoaGJGp*CxFDNatHpSKV3mVPzhJA7xyqIg3YGFcCdi18RrO/POROS20FROM20GALATASWEB.jpg">
			</a>
	      <a class="image" href="#"
	             data-text="Ronda, Spain"
	           data-url="http://www.abercrombiekent.com.au/spain/Itineraries/images/spain-Main_3.JPG"
	         data-thumb="http://www.abercrombiekent.com.au/spain/Itineraries/images/spain-Main_3.JPG">
	             <img src="http://www.abercrombiekent.com.au/spain/Itineraries/images/spain-Main_3.JPG">
	      </a>
	      <a class="image" href="#"
	             data-text="La Alhambra"
	           data-url="https://farm3.staticflickr.com/2807/10872601495_7ca901e5ea.jpg"
	         data-thumb="https://farm3.staticflickr.com/2807/10872601495_7ca901e5ea.jpg">
	             <img src="https://farm3.staticflickr.com/2807/10872601495_7ca901e5ea.jpg">
	      </a>
	      <a class="image" href="#"
	             data-text="Cathedral"
	           data-url="http://wikitravel.org/upload/shared//thumb/9/97/Cathedral_granada_interior.jpg/320px-Cathedral_granada_interior.jpg"
	         data-thumb="http://wikitravel.org/upload/shared//thumb/9/97/Cathedral_granada_interior.jpg/320px-Cathedral_granada_interior.jpg">
	             <img src="http://wikitravel.org/upload/shared//thumb/9/97/Cathedral_granada_interior.jpg/320px-Cathedral_granada_interior.jpg">
	      </a>
	      <a class="image" href="#"
	             data-text="Switzerland"
	           data-url="http://farm8.staticflickr.com/7201/7000893333_cff86d752b_b.jpg"
	         data-thumb="http://farm8.staticflickr.com/7201/7000893333_cff86d752b_b.jpg">
	             <img src="http://farm8.staticflickr.com/7201/7000893333_cff86d752b_b.jpg">
	      </a>
          </div>
          <div class="images hidden" id="images-junior_year">
            <a class="image" href="#"
	           data-text="Quad Day!"
		       data-url="http://alivecampus.com/wp-content/uploads/2013/06/Quad-Day-credit-Flikr.jpg"
			   data-thumb="http://alivecampus.com/wp-content/uploads/2013/06/Quad-Day-credit-Flikr.jpg">
			       <img src="http://alivecampus.com/wp-content/uploads/2013/06/Quad-Day-credit-Flikr.jpg">
			</a>
			<!--add some more!-->
          </div>
          <div class="images hidden" id="images-summer_2014">
            <a class="image" href="#"
	           data-text="Our Hotel View"
		       data-url="http://i2.cdn.turner.com/cnn/dam/assets/130530161523-100-beaches-crane-beach-horizontal-gallery.jpg"
			   data-thumb="http://i2.cdn.turner.com/cnn/dam/assets/130530161523-100-beaches-crane-beach-horizontal-gallery.jpg">
			       <img src="http://i2.cdn.turner.com/cnn/dam/assets/130530161523-100-beaches-crane-beach-horizontal-gallery.jpg">
			     </a>

            <a class="image" href="#"
             data-text="Beach nearby"
           data-url="http://www.mattheweckert.com/wp-content/uploads/2013/07/summer-wallpaper7.png"
         data-thumb="http://www.mattheweckert.com/wp-content/uploads/2013/07/summer-wallpaper7.png">
             <img src="http://www.mattheweckert.com/wp-content/uploads/2013/07/summer-wallpaper7.png">
           </a>

           <a class="image" href="#"
             data-text="Fun in the sand"
           data-url="http://assets.spooncdn.com/wp-content/uploads/sites/38/2014/05/summer.jpg?"
         data-thumb="http://assets.spooncdn.com/wp-content/uploads/sites/38/2014/05/summer.jpg?">
             <img src="http://assets.spooncdn.com/wp-content/uploads/sites/38/2014/05/summer.jpg?">
           </a>
           <a class="image" href="#"
             data-text="Jumping in!"
           data-url="http://chipsifraternity.files.wordpress.com/2012/05/summer-picture1.jpg"
         data-thumb="http://chipsifraternity.files.wordpress.com/2012/05/summer-picture1.jpg">
             <img src="http://chipsifraternity.files.wordpress.com/2012/05/summer-picture1.jpg">
           </a>

            <!--add some more!-->
          </div>
          <div class="images hidden" id="images-sophomore_year">
            <a class="image" href="#"
	           data-text="First sights at U Chicago"
		       data-url="http://upload.wikimedia.org/wikipedia/commons/1/1a/Harper_Midway_Chicago.jpg"
			   data-thumb="http://upload.wikimedia.org/wikipedia/commons/1/1a/Harper_Midway_Chicago.jpg">
			       <img src="http://upload.wikimedia.org/wikipedia/commons/1/1a/Harper_Midway_Chicago.jpg">
			</a>
            <!--add some more!-->
          </div>
        </div>
      </div>
      
      
      
      <!--File Upload Popup-->
      <div class="form hidden" id="uploadAdd">
        <h3>Upload Item</h3>
        <form action="/moments/php/addItem.php?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $pageID; ?>" name="fileUpload" method="post" enctype="multipart/form-data" id="uploadAddForm">
          <div class="input">
           <fieldset>
              <div class="import">
	              <input type="hidden" name="upload" value="true">
	              <p>Upload your Item:</p>
                  <input class="field" type="file" name="mediaUpload" id="uploadMediaInput" required>
                  <p>Add a Thumbnail Image:</p>
                  <input class="field" type="file" name="thumbUpload" id="uploadThumbInput">
                  <p>Add a Caption:</p>
                  <input class="field" type="text" name="text" id="uploadCaptionInput">
              </div>
            </fieldset>
          </div>
          <button class="button pointer" type="button" id="cancelUploadButton"> Cancel </button>
		  <button class="button pointer" type="submit" id="uploadSubmitButton"> Add Item </button>
        </form>
        <img class="blueLoader" src="/moments/img/blue_loader.gif" alt="Loading..."/>
      </div>
      
      
        <!--The pop up window for 'Add Item' on a page-->
      <div class="form hidden" id="addItemForm">
        <h3>Add Item</h3>
        <form action="/moments/php/addItem.php?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $pageID; ?>" method="post">
          <div class="input">
           <fieldset>
              <div class="import">
                <h4>Import media from:</h4>
                <div class="icons">
                  <div class="facebook pointer icon"><img src="../img/facebook.png"></div>
                  <div class="instagram pointer icon"><img src="../img/instagram.png"></div>
                  <div class="twitter pointer icon"><img src="../img/twitter1.png"></div>
                  <div class="folder pointer icon"><img src="../img/Grey_Generic_Folder.png"></div>
                </div>
              </div>
            </fieldset>
          </div>
        </form>
        <button class="button pointer" type="button" id="cancelImport"> Cancel </button>
      </div>
      
      <div class="form hidden" id="addCaptionForm">
        <h3>Add Caption</h3>
        <form action="/moments/php/addItem.php?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $pageID; ?>" method="post">
          <div class="input">
           <fieldset>
              <div class="caption">
                <p>Add a Caption to your Item:</p>
                <input class="field" type="text" name="caption" id="captionInput">
                <input class="button" type="submit" value="Add Item" id="captionSubmitButton">
                <button class="button pointer" type="button" id="cancelCaptionButton"> Cancel </button>
              </div>
            </fieldset>
          </div>
        </form>
      </div>
      
      <form action="/moments/php/addItem.php?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $pageID; ?>" method="post" accept-charset="utf-8" class="hidden" id="addItemForm" name="addItemForm">
      	<input id="addItemFormTextInput" type="hidden" name="text" value="">
      	<input id="addItemFormURLInput" type="hidden" name="url" value="">
      	<input id="addItemFormThumbInput" type="hidden" name="thumb" value="">
      </form>

	      
	</div><!--end main-->
	  
	  
	<?php if (isset($_SESSION['chapters'][$chapterID]['pages'][$pageID+1])): ?>
    <a href="/moments/page/?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $pageID+1; ?>">
    	<abbr title="<?php echo $_SESSION['chapters'][$chapterID]['pages'][$pageID+1]['title']; ?>">
        <img id="right-arrow" class="arrow" src="/moments/img/right-arrow.png">
      </abbr>
    </a>
    <?php endif; ?>

	  <div class="footer-wrapper">
        <div class="footer">
            <div class="foot"> &copy Moments Inc.</div>
        </div>
      </div>
      
    
   
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
						url: '../php/swapItem.php?ch_id=<?php echo $chapterID; ?>&pg_id=<?php echo $pageID; ?>&old=' + oldIndex + "&new=" + newIndex,
						success: function (response) {//response is value returned from php
							//alert(response);
   						}
					});
			    }
			    
		    });
		    
		    location.reload();
		    		    
		});
		
		
		

      	$("#cancelImport").click(function() {
        	$("#addItemForm").fadeOut(500);
      	});
    	$("#addItemCancelButton").click(function () {
	    	$("#addItemForm").fadeOut(500);
    	});
    	$("#cancelAlbumAddButton").click(function () {
	    	$("#socialAlbumSelect").fadeOut(500);
    	});
    	$("#cancelCaptionButton").click(function() {
        	$("#addCaptionForm").fadeOut(500);
      	});
      	$("#cancelUploadButton").click(function() {
        	$("#uploadAdd").fadeOut(500);
      	});
    	$("#cancelImageCancelButton").click(function () {
	    	$("#socialImageAdd").fadeOut(500);
	    	$("#socialImageAdd .images").each(function () { //each set of images must be faded out on cancel
		    	$(this).fadeOut(500);
	    	});
    	});
    	$("#addItemButton").click(function () {
	    	$("#socialAlbumSelect").fadeOut(500);
	    	$("#socialImageAdd").fadeOut(500);
	    	$("#addItemForm").fadeIn(500);
    	});
    	
    	
    	//selecting an option from the add item menu
    	$("#addItemForm .facebook").click(function () {
	    	$("#addItemForm").fadeOut(500);
	    	$("#socialImageAdd").fadeOut(500);
	    	$("#socialAlbumSelect").fadeIn(500);
    	});
    	$("#addItemForm .instagram").click(function () {
	    	$("#addItemForm").fadeOut(500);
	    	$("#socialImageAdd").fadeOut(500);
	    	$("#socialAlbumSelect").fadeIn(500);
    	});
    	$("#addItemForm .twitter").click(function () {
	    	$("#addItemForm").fadeOut(500);
	    	$("#socialImageAdd").fadeOut(500);
	    	$("#socialAlbumSelect").fadeIn(500);
    	});
    	$("#addItemForm .folder").click(function () {
	    	$("#addItemForm").fadeOut(500);
	    	$("#socialImageAdd").fadeOut(500);
	    	$("#uploadAdd").fadeIn(500);
    	});
    	
    	
      function addItem() {
        var link = document.forms["fileUpload"]["mediaUpload"].value; //gets the wrong value!
        var type = link.substring(link.lastIndexOf('.')+1);
        switch(type) {
            case "mp4":
                $("#content").append('<!--if item is a video, have the thumbnail be displayed-->\
                        <video width="300" height="200" class="content" id="video_content" controls>\
                          <source type="video/mp4">\
                          Your browser does not support the video tag.\
                        </video>');
                break;
            case "mp3":
                $("#content").append('<!--if the item is audio, have the audio be displayed-->\
                        <audio class="content" id="audio_content" controls>\
                          <source type="audio/mpeg">\
                          Your Browser does not support the Audio tag.\
                        </audio>');
                break;
            case "txt":
                $("#content").append('<iframe width="300px" class="content" id="text_content" seamless>\
                          Your browser does not support the iframe tag.\
                        </iframe>');
                break;
            default:
                $("#content").append('<!--if item is an image, have the thumbnail be displayed-->\
                        <img class="content" id="img_content" >');

        }
                        
      }
      
    	//clicking the upload button
    	$("#uploadSubmitButton").click(function (event) {
	    	event.preventDefault();
	    	$("#uploadAddForm").css("opacity", ".3");
	    	$("#cancelUploadButton").css("opacity", ".3");
	    	$("#uploadSubmitButton").css("opacity", ".3");
	    	$("#uploadAdd .blueLoader").show();
        addItem();
	    	$("#uploadAddForm").submit();
    	});

                        /*  function setItem() {
                            var items = <?php echo json_encode($_SESSION['chapters'][$chapterID]['pages'][$pageID]['items']); ?>;
                            alert('items: ' + JSON.stringify(items));
                            var size = items.length;
                            var i = <?php echo $i;?>;
                            var link = $("#content").attr("data-src");
                            alert('link: ' + link); 
                            var type = link.substring(link.lastIndexOf('.')+1);
                            switch(type) {
                              case "mp4":
                                  alert('type video!');
                                  $("#content").append('<!--if item is a video, have the thumbnail be displayed-->\
                                          <video width="300" height="200" class="content" id="video_content" controls>\
                                            <source src="' + link + '"  type="video/mp4">\
                                            Your browser does not support the video tag.\
                                          </video>');
                                  break;
                              case "mp3":
                                  alert('type audio!');
                                  $("#content").append('<!--if the item is audio, have the audio be displayed-->\
                                          <audio class="content" id="audio_content" controls>\
                                            <source src="' + link + '" type="audio/mpeg">\
                                            Your Browser does not support the Audio tag.\
                                          </audio>');
                                  break;
                              case "txt":
                                  alert('type text!');
                                  $("#content").append('<iframe src="' + link + '" width="300px" class="content" id="text_content" seamless>\
                                            Your browser does not support the iframe tag.\
                                          </iframe>');
                                  break;
                              default:
                                  $("#content").append('<!--if item is an image, have the thumbnail be displayed-->\
                                          <img src="' + link + '"  class="content" id="img_content" >');

                            }
                            alert(link);
                            $("#content .content").attr('src', link);
                            alert('content: ' + $("#content").html()); //how apply it to correct item??
                          }
                          setItem();*/
    	//selecting an album from the social import menu
    	$("#socialAlbumSelect .album").click(function () {
	    	$("#addItemForm").fadeOut(500);
	    	$("#socialAlbumSelect").fadeOut(500);
	    	//fade in only the specific album's images
	    	var album = $(this).attr("data-album");
	    	$("#socialImageAdd #images-" + album).fadeIn(500);
	    	$("#socialImageAdd").fadeIn(500);
    	});
    	
    	
    	//selecting an image from the social import menu
    	$("#socialImageAdd .image").click(function () {
	    	var text = $(this).attr("data-text");
	    	var url = $(this).attr("data-url");
	    	var thumb = $(this).attr("data-thumb");
	    	$("#addItemForm #addItemFormTextInput").val(text);
	    	$("#addItemForm #addItemFormURLInput").val(url);
	    	$("#addItemForm #addItemFormThumbInput").val(thumb);
	    	$("#addCaptionForm").fadeIn(500);
	    	$("#socialImageAdd").fadeOut(500);
	    	$("#socialImageAdd .images").each(function () { //each set of images must be faded out on selection
		    	$(this).fadeOut(500);
	    	});
    	});
    	
    	//adding a caption
    	$("#addCaptionForm #captionSubmitButton").click(function (event) {
	    	event.preventDefault();
	    	var text = $("#addCaptionForm #captionInput").val();
	    	$("#addItemForm #addItemFormTextInput").val(text);
	    	document.addItemForm.submit();
    	});
    	
    	
    	$(".confirmButton").click(function (event) {
	    	var confirmed = confirm("Are you sure you would like to delete?");
	    	if (!confirmed) {
		    	event.preventDefault();
	    	}
    	});
    	
    </script>
    
    
  </body>
</html>