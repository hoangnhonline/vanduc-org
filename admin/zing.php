<html>
<head>
</head>
<body>
<?php 
set_time_limit(0);  
include ("function_laytin.php"); 
$urlwebsite="http://news.zing.vn/blog/choi-vui.html"; 
$links=Zing_TrangChu($urlwebsite); 

foreach ($links as $td => $url){ 
	
	$tin=Zing_Lay1Tin($urlwebsite,$url); 
	echo $tin['tieude'],"<br>"; 
	
	//$content = preg_replace('#<div class="more_news">.*</div>#isU','',$tin['content']);
	//$content = preg_replace('#<div class="tags">.*</div>#isU','',$content); 
	//$content = preg_replace('#<h1 class="pTitle">.*</h1>#isU','',$content); 
	//$content = preg_replace('#<h2 class="pHead">.*</h2>#isU','',$content);
	//$content = preg_replace('#<ul class="share_buttons">.*</ul>#isU','',$content);
	//$content = preg_replace('#<div id="discussion_tools">.*</div>#isU','',$content);
	//$content = preg_replace('#<iframe id="starbuzzCards">.*</iframe>#isU','',$content);
	
	
	//$tin['content']=$content;
	echo "<hr>"; 
	flush(); 
	LuuTinVaoDB($tin, $url,"zing.vn"); 
	next($links); 
} 
?>
<br />

</body>
</html>