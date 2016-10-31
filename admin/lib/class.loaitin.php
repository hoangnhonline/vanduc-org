<?php 
require_once "class.db.php";
class loaitin extends db{
	
	/* QUAN LY LOAI SP */
	function LoaiTin_Them(&$loi){	
	
		$thanhcong=true;
		
		$TenLT = $this->processData($_POST[TenLT]);
		$TenLT_KD = $this->processData($_POST[TenLT_KD]);
	
		$Title = $this->processData($_POST[Title]);
		$MetaD = $this->processData($_POST[MetaD]);
		$MetaK = $this->processData($_POST[MetaK]);
		
	
		
		if($Title=="") $Title=$TenLT;
		if($MetaD=="") $MetaD=$TenLT;
		if($MetaK=="") $MetaK=$TenLT;
		if($TenLT_KD=="") $TenLT_KD = $this->changeTitle($TenLT);
		
		if($TenLT=="")
		{
			$thanhcong= false;
			$loi[TenLT]= "Chưa nhập tên loại";
		}
	
		if($thanhcong==false){
			return $thanhcong;
		}else{
			$sql = "INSERT INTO loaitin 
					VALUES(NULL,'$TenLT','$TenLT_KD','$Title','$MetaD','$MetaK')";
			mysql_query($sql) or die(mysql_error().$sql);		
		}
		return $thanhcong;
	}
	function LoaiTin_Edit($idLT,&$loi){
		settype($idLT,"int");
		$thanhcong=true;
		
		$TenLT = $this->processData($_POST[TenLT]);
		$TenLT_KD = $this->processData($_POST[TenLT_KD]);
		
				
		$Title = $this->processData($_POST[Title]);
		$MetaD = $this->processData($_POST[MetaD]);
		$MetaK = $this->processData($_POST[MetaK]);
		
		$AnHien = $_POST[AnHien];settype($AnHien,"int");
		
		if($Title=="") $Title=$TenLT;
		if($MetaD=="") $MetaD=$TenLT;
		if($MetaK=="") $MetaK=$TenLT;
		if($TenLT_KD=="") $TenLT_KD = $this->changeTitle($TenLT);
		
		if($TenLT=="")
		{
			$thanhcong= false;
			$loi[TenLT]= "Chưa nhập tên loại";
		}
	
		if($thanhcong==false){
			return $thanhcong;
		}else{
			$sql = "UPDATE loaitin 
					SET TenLT = '$TenLT',TenLT_KD = '$TenLT_KD',
					Title = '$Title',MetaD = '$MetaD',MetaK = '$MetaK' 
					WHERE idLT = $idLT";
			mysql_query($sql) or die(mysql_error().$sql);		
		}
		return $thanhcong;
	}
	function LoaiTin_List($limit=-1,$offset=-1){
		$sql = "SELECT loaitin.* FROM loaitin 
				ORDER BY idLT ASC ";
		if($limit >0 && $offset >=0) $sql.= " LIMIT $offset,$limit";		
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function GetIdLT($TenLT_KD){
		$sql = "SELECT idLT FROM loaitin
				WHERE TenLT_KD = '$TenLT_KD'";				
		$rs = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($rs);
		$idLT = $row['idLT'];
		return $idLT;
	}
	
	function LoaiTin_ChiTiet($idLT){
		$sql = "SELECT * FROM loaitin
				WHERE idLT = $idLT";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
		
	}
}

?>