<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>123</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
	
   
</head>
<body>
<?php 
$ch = curl_init();
$keyword = "nhu y";
curl_setopt($ch, CURLOPT_URL,"http://sieuthivip.vn/api.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"action=getList&keyword=".$keyword);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);
$arrData = json_decode($server_output, true);
echo "<pre>"; print_r($arrData);
?>
<script type="text/javascript">
$(document).ready(function(){
	$.ajax({
		url : 'http://sieuthivip.vn/api.php',
		data : {
			name : "abc",
			action : "getList"
		},
		dataType : 'json',
		type : 'POST',
		success:function(data){
			
		}
	})
});
</script>
</body></html>