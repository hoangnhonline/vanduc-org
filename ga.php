<?php
mysql_connect('mysql.onehost.vn', 'thietken_domain', 'domain!@#');
mysql_select_db('thietken_domain');

// Create connection
for($i = 0; $i <=100; $i++){
	echo $i."\r\n";
	$url="http://www.gamevui24.com/se-javstreaming.php"; 


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_NOBODY, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POST, 1);

	$html = curl_exec($ch);

	$redir = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);	

	$date = date('Y-m-d');
	$sql = "INSERT into domain(link, created_date) VALUES('$redir', '$date')";
	
	mysql_query($sql);
	$id = mysql_insert_id();
	if($id > 0){
		$redir = str_replace("ads-vi", "if", $redir);
	
		$ga = getGa($redir);
		mysql_query("INSERT INTO ga(domain_id, code, created_date) VALUES ($id, '$ga', '$date')");
	}
	curl_close($ch);

}

function getGa($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_NOBODY, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POST, 1);

	$html = curl_exec($ch);
	$tmp = strstr($html, 'cx=');
	$tmp1 = explode('&cof=', $tmp);
	return $return = str_replace("cx=", "", $tmp1[0]);	
}