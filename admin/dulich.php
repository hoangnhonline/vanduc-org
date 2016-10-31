<html>
<head>
	<title>Lay tin tu dong </title>	
<body>
<?php 
set_time_limit(0);  
include ("function_laytin.php"); 
$urlwebsite="http://dulichvn.org.vn"; 
$links=TinDuLich_TrangChu($urlwebsite); 

foreach ($links as $td => $url){ 
	
	$tin=TinDuLich_Lay1Tin($urlwebsite,$urlwebsite."/".$url); 
	echo $tin['tieude']; 
	//echo $tin['tomtat'],"<br>"; 
	//echo $tin['content'];  
	echo "<hr>"; 
	flush(); 
	LuuTinVaoDB($tin, $url,"dulichvn.org.vn"); 
	next($links); 
} 
?>
<br />

</body>
</html>