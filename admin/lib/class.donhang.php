<?php 
require_once "class.db.php";
class donhang extends db{
	
	/* QUAN LY USER */
	
	function DonHang_List($idUser=-1,$TinhTrang= -1,$limit=-1,$offset=-1){
		$sql = "SELECT * FROM donhang WHERE 
				(idUser = $idUser OR $idUser = -1 ) AND (TinhTrang = $TinhTrang OR $TinhTrang = -1) 
				ORDER BY idDH ASC ";
		if($limit >0 && $offset >=0) $sql.= " LIMIT $offset,$limit";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}	
}

?>