<html>
<head>
	<title>Lấy tin tự động TINDULICH.VN</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
</head>
<body>
<?php 
set_time_limit(0);  
include ("function_laytin.php"); 
$urlwebsite="http://hcm.24h.com.vn/du-lich-c76.html"; 
$links=HCM24h_TrangChu($urlwebsite); 

foreach ($links as $td => $url){ 
	
	$tin=HCM24h_Lay1Tin($urlwebsite,$url); 	
	echo $tin['tieude'];
	//echo $tin['tomtat'];
	//echo $tin['urlHinh'];
	//$content = preg_replace('#<a class="xemTiep">.*</a>#isU','',$tin['content']);
//	echo $tin['content']=$content;
	echo "<hr />";
	flush(); 
	LuuTinVaoDB($tin, $url,"hcm.24h.com.vn"); 
	next($links); 
} 
?>
<br />

</body>
</html>