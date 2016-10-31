<?php 
require_once "class.db.php";
class phuongthuc extends db{
	
	/* QUAN LY CHUNG LOAI */
	function PhuongThuc_Them(&$loi){	
	
		$thanhcong=true;
		
		$TenPT = $this->processData($_POST[TenPT]);
		
		if($TenPT=="")
		{
			$thanhcong= false;
			$loi[TenPT]= "Chưa nhập tên thành phố";
		}
	
		if($thanhcong==false){
			return $thanhcong;
		}else{
			$sql = "INSERT INTO phuongthuc 
					VALUES(NULL,'$TenPT')";
			mysql_query($sql) or die(mysql_error().$sql);		
		}
		return $thanhcong;
	}
	function PhuongThuc_Edit($idPT,&$loi){
		settype($idPT,"int");
		$thanhcong=true;
		
		$TenPT = $this->processData($_POST[TenPT]);
		
		if($TenPT=="")
		{
			$thanhcong= false;
			$loi[TenPT]= "Chưa nhập tên thành phố";
		}
	
		if($thanhcong==false){
			return $thanhcong;
		}else{
			$sql = "UPDATE phuongthuc 
					SET TenPT = '$TenPT'
					WHERE idPT = $idPT";
			mysql_query($sql) or die(mysql_error().$sql);		
		}
		return $thanhcong;
	}
	function PhuongThuc_List($AnHien=-1){
		$sql = "SELECT * FROM phuongthuc";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function PhuongThuc_ChiTiet($idPT){
		$sql = "SELECT * FROM phuongthuc WHERE idPT = $idPT";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	
}

?>