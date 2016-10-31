<?php 
require_once "class.db.php";
class theloai extends db{
	
	/* QUAN LY CHUNG LOAI */
	function TheLoai_Them(&$loi){	
	
		$thanhcong=true;
		
		$TenTL = $this->processData($_POST[TenTL]);
		$TenTL_KD = $this->processData($_POST[TenTL_KD]);
		$Title = $this->processData($_POST[Title]);
		$MetaD = $this->processData($_POST[MetaD]);
		$MetaK = $this->processData($_POST[MetaK]);
		
		
		if($Title=="") $Title=$TenTL;
		if($MetaD=="") $MetaD=$TenTL;
		if($MetaK=="") $MetaK=$TenTL;
		if($TenTL_KD=="") $TenTL_KD = $this->changeTitle($TenTL);
		
		if($TenTL=="")
		{
			$thanhcong= false;
			$loi[TenTL]= "Chưa nhập tên chủng loại";
		}
	
		if($thanhcong==false){
			return $thanhcong;
		}else{
			$sql = "INSERT INTO theloai 
					VALUES(NULL,'$TenTL','$TenTL_KD','$Title','$MetaD','$MetaK')";
			mysql_query($sql) or die(mysql_error().$sql);		
		}
		return $thanhcong;
	}
	function TheLoai_Edit($idTL,&$loi){
		settype($idTL,"int");
		$thanhcong=true;
		
		$TenTL = $this->processData($_POST[TenTL]);
		$TenTL_KD = $this->processData($_POST[TenTL_KD]);
		$Title = $this->processData($_POST[Title]);
		$MetaD = $this->processData($_POST[MetaD]);
		$MetaK = $this->processData($_POST[MetaK]);
		
		if($Title=="") $Title=$TenTL;
		if($MetaD=="") $MetaD=$TenTL;
		if($MetaK=="") $MetaK=$TenTL;
		if($TenTL_KD=="") $TenTL_KD = $this->changeTitle($TenTL);
		
		if($TenTL=="")
		{
			$thanhcong= false;
			$loi[TenTL]= "Chưa nhập tên chủng loại";
		}
	
		if($thanhcong==false){
			return $thanhcong;
		}else{
			$sql = "UPDATE theloai 
					SET TenTL = '$TenTL',TenTL_KD = '$TenTL_KD',
					Title = '$Title',MetaD = '$MetaD',MetaK = '$MetaK' 
					WHERE idTL = $idTL";
			mysql_query($sql) or die(mysql_error().$sql);		
		}
		return $thanhcong;
	}
	function TheLoai_List($limit=-1,$offset=-1){
		$sql = "SELECT * FROM theloai ORDER BY idTL ";
		if($limit >0 && $offset >=0) $sql.= " LIMIT $offset,$limit";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function TheLoai_ChiTiet($idTL){
		$sql = "SELECT * FROM theloai WHERE idTL = $idTL";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}
	function getIdTL($TenTL_KD){
		$sql = "SELECT idTL FROM theloai WHERE TenTL_KD = '$TenTL_KD'";
		$rs = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($rs);
		$idTL = $row[idTL];
		return $idTL;
	}
}

?>