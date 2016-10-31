<?php	
require_once("lib/class.db.php");
$d = new db;	

$loai = $_POST[loai];
$ThuTu = $_POST[ThuTu];settype($ThuTu,"int");

if($loai == "chungloai"){
	$idCanThayDoi = $d->LayId_DuaVaoThuTu('chungloai','idCL',$ThuTu);
	$ThuTuLen = $d->LayThuTuLen('chungloai',$ThuTu);
	$idDM_Tour_Xuong = $d->LayId_DuaVaoThuTu('chungloai','idCL',$ThuTuLen);	
	$sql1 = "UPDATE chungloai SET ThuTu = $ThuTuLen WHERE idCL = $idCanThayDoi";	
	$sql2 = "UPDATE chungloai SET ThuTu = $ThuTu WHERE idCL = $idDM_Tour_Xuong";
	mysql_query($sql1);
	mysql_query($sql2);	
}
if($loai == "loaisp"){
	$idCanThayDoi = $d->LayId_DuaVaoThuTu('loaisp','idLoai',$ThuTu);
	$ThuTuLen = $d->LayThuTuLen('loaisp',$ThuTu);
	$idDM_Tour_Xuong = $d->LayId_DuaVaoThuTu('loaisp','idLoai',$ThuTuLen);	
	$sql1 = "UPDATE loaisp SET ThuTu = $ThuTuLen WHERE idLoai = $idCanThayDoi";
	$sql2 = "UPDATE loaisp SET ThuTu = $ThuTu WHERE idLoai = $idDM_Tour_Xuong";
	mysql_query($sql1);
	mysql_query($sql2);	
}
if($loai == "thanhpho"){
	$idCanThayDoi = $d->LayId_DuaVaoThuTu('thanhpho','idTP',$ThuTu);
	$ThuTuLen = $d->LayThuTuLen('thanhpho',$ThuTu);
	$idDM_Tour_Xuong = $d->LayId_DuaVaoThuTu('thanhpho','idTP',$ThuTuLen);	
	$sql1 = "UPDATE thanhpho SET ThuTu = $ThuTuLen WHERE idTP = $idCanThayDoi";
	$sql2 = "UPDATE thanhpho SET ThuTu = $ThuTu WHERE idTP = $idDM_Tour_Xuong";
	mysql_query($sql1);
	mysql_query($sql2);	
}

if($loai == "danhmuc_ks"){
	$idCanThayDoi = $d->LayId_DuaVaoThuTu('dvt_ks_danhmuc','idDM_KS',$ThuTu,$quocgia);	
	echo $ThuTuLen = $d->LayThuTuLen('dvt_ks_danhmuc',$quocgia,$ThuTu);
	echo $idDM_KS_Xuong = $d->LayId_DuaVaoThuTu('dvt_ks_danhmuc','idDM_KS',$ThuTuLen,$quocgia);	
	echo $sql1 = "UPDATE dvt_ks_danhmuc SET ThuTu = $ThuTuLen WHERE idDM_KS= $idCanThayDoi";
	echo $sql2 = "UPDATE dvt_ks_danhmuc SET ThuTu = $ThuTu WHERE idDM_KS = $idDM_KS_Xuong";
	mysql_query($sql1);
	mysql_query($sql2);	
}

?>