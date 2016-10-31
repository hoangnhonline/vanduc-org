<?php 
require_once "class.db.php";
class map extends db{
	
	/* QUAN LY CHUNG LOAI */
	function Map_Them(&$loi){	
	
		$thanhcong=true;
		
		$TenDN = $this->processData($_POST[TenDN]);
		$ThongTin = $this->processData($_POST[ThongTin]);
		$KinhDo = $this->processData($_POST[KinhDo]);
		$ViDo = $this->processData($_POST[ViDo]);
		
		$ThongTin=trim(str_replace((array(" <","> ")),array("<",">"),$ThongTin));
		
		
		if($TenDN=="")
		{
			$thanhcong= false;
			$loi[TenDN]= "Chưa nhập tên doanh nghiệp";
		}
		if($ThongTin=="")
		{
			$thanhcong= false;
			$loi[ThongTin]= "Chưa nhập thông tin doanh nghiệp";
		}
	
		if($thanhcong==false){
			return $thanhcong;
		}else{
			$sql = "INSERT INTO map 
					VALUES(NULL,'$TenDN','$ThongTin','$KinhDo','$ViDo')";
			mysql_query($sql) or die(mysql_error().$sql);		
		}
		return $thanhcong;
	}
	function Map_Edit($idMap,&$loi){
		settype($idMap,"int");
		$thanhcong=true;
		
		$TenDN = $this->processData($_POST[TenDN]);
		$ThongTin = $this->processData($_POST[ThongTin]);
		$KinhDo = $this->processData($_POST[KinhDo]);
		$ViDo = $this->processData($_POST[ViDo]);
		
		$ThongTin=trim(str_replace((array(" <","> ")),array("<",">"),$ThongTin));
		
		
		if($TenDN=="")
		{
			$thanhcong= false;
			$loi[TenDN]= "Chưa nhập tên doanh nghiệp";
		}
		if($ThongTin=="")
		{
			$thanhcong= false;
			$loi[ThongTin]= "Chưa nhập thông tin doanh nghiệp";
		}
		
		if($thanhcong==false){
			return $thanhcong;
		}else{
			$sql = "UPDATE map 
					SET TenDN = '$TenDN',ThongTin = '$ThongTin',KinhDo = '$KinhDo',
					ViDo = '$ViDo'
					WHERE idMap = $idMap";
			mysql_query($sql) or die(mysql_error().$sql);		
		}
		return $thanhcong;
	}
	function Map_List($limit=-1,$offset=-1){
		$sql = "SELECT * FROM map ";
		if($limit >0 && $offset >=0) $sql.= " LIMIT $offset,$limit";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function Map_ChiTiet($idMap){
		$sql = "SELECT * FROM map WHERE idMap = $idMap";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
}

?>