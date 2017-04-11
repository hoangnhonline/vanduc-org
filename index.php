<?php
//echo "<h1>Server đang bảo trì, vui lòng quay lại sau 08:00 ngày 17-12-2016. Xin cảm ơn.</h1>";die; 
require_once "admin/lib/class.db.php";
require_once "admin/lib/class.tin.php";
$t = new tin ;
$com = $_GET['com'];
include "seo/seo.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $title; ?></title>
	<meta name="keywords" content="<?php echo $metaK; ?>">
	<meta name="description" content="<?php echo $metaD; ?>">
	<link href="files/reset.css" rel="stylesheet" type="text/css">
	<link href="files/style.css" rel="stylesheet" type="text/css">
	<link href="files/style_sonlong.css" rel="stylesheet" type="text/css">
	<script language="javascript" type="text/javascript" src="files/jquery-1.js"></script>
	<script language="javascript" type="text/javascript" src="files/jquery-ui.js"></script>
	<script language="javascript" type="text/javascript" src="files/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="files/loopedslider.js"></script>
	<script language="javascript" type="text/javascript" src="files/jquery_002.js"></script>
	<script language="javascript" type="text/javascript" src="files/son-long-to-dinh.js"></script>
	<script language="javascript" type="text/javascript" src="files/script.js"></script>	
    <script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-39152396-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	<script type="text/javascript">
			$(document).ready(function () {
				// buttons for next and previous item						 
				var buttons = { previous:$('#jslidernews1 .button-previous'),
					next:$('#jslidernews1 .button-next') };
				$obj = $('#jslidernews1').lofJSidernews({ interval:4000,
					easing:'easeInOutQuad',
					duration:1200,
					auto:true,
					maxItemDisplay:3,
					startItem:0,
					navPosition:'horizontal', // horizontal
					navigatorHeight:null,
					navigatorWidth:25,
					mainWidth:600,
					buttons:buttons});
			});
		</script>
		<script src="files/jquery_002.js" type="text/javascript"></script>
		<script type="text/javascript">
			(function($){
				$(function(){
					$('.pictures_box .list_slide').bxSlider({
						displaySlideQty: 3,
						moveSlideQty: 1,
						auto: true,
						pause: 5000
					});
					$('.video_box .list_slide').bxSlider({
						displaySlideQty: 3,
						moveSlideQty: 1,
						auto: true,
						pause: 3000
					});
				});
			}(jQuery))
		</script>		
</head>
<body>
<div class="wrapper">
  <div class="logo"><a href="#"><img src="files/logo.png"></a></div>
  <div class="w960 container">
    <?php include "blocks/menu.php"; ?>
    <div class="clear"></div>    
    <div class="container_content">
<div style="float:right;margin:10px">
    <!-- AddThis Button BEGIN -->

    	<div class="addthis_toolbox addthis_default_style ">
<a style="width:60px" class="addthis_button_google_plusone" g:plusone:size="medium"></a>  
            <a style="width:80px" class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
            <a class="addthis_button_tweet" style="width:80px"></a>  
            <a class="addthis_counter addthis_pill_style" style="width:80px"></a>
        </div>
        <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5129711b16cfa014"></script>
        <!-- AddThis Button END -->
    </div>
     <div class="clear"></div> 
    <?php 
		if($com==''){
			include "blocks/slideshow.php";
			include "blocks/tab.php";
		} 
	?>
    <div class="clear"></div> 
   
    <div id="col_left" class="left">
    	<?php include "blocks/left.php"; ?>
    </div>
    <?php if($com=='cat'){?>    
    <div id="col_centers" style="width:780px;float:right;margin-top:20px" class="left">		  
		<?php include "page/cat.php"; ?>
    </div>
    <?php }elseif($com=='detail'){?>
    <div id="col_centers" style="width:770px;float:right;margin-top:20px;padding-right:10px" class="left">		  
		<?php include "page/detail.php"; ?>
    </div>

    <?php }elseif($com=='about'){?>
    <div id="col_centers" style="width:770px;float:right;margin-top:20px;padding-right:10px" class="left">		  
		<?php include "page/about.php"; ?>
    </div>
    <?php }elseif($com=='contact'){?>
    <div id="col_centers" style="width:770px;float:right;margin-top:20px;padding-right:10px" class="left">		  
		<?php include "page/contact.php"; ?>
    </div>
	<?php }else{ ?>    
    <div id="col_center" class="left">		  
		<?php include "blocks/center.php"; ?>
    </div>
    <div id="col_right" class="right">
      	<?php include "blocks/right.php"; ?>
    </div>
    <?php } ?>
   
    </div>
  </div>
  <div class="clear"></div>
</div>
<?php include "blocks/footer.php"; ?>
</body></html>
