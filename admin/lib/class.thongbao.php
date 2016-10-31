<?php 
require_once "class.db.php";
class thongbao extends db{
	
	/* QUAN LY USER */
	
	function ThongBao_List($limit=-1,$offset=-1){
		$sql = "SELECT * FROM thongbaoloi ORDER BY idThongBao DESC ";
		if($limit >0 && $offset >=0) $sql.= " LIMIT $offset,$limit";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}	
}

?>