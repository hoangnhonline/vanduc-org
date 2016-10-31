<?php	
require_once("lib/class.db.php");
$d = new db;	

$loai = $_POST[loai];
$ThuTu = $_POST[ThuTu];settype($ThuTu,"int");

if($loai == "chungloai"){
	$idCL_can_tang = $d->LayId_DuaVaoThuTu('chungloai','idCL',$ThuTu);
	$ThuTuXuong = $d->LayThuTuXuong('chungloai',$ThuTu);
	$idCL_Len = $d->LayId_DuaVaoThuTu('chungloai','idCL',$ThuTuXuong);	
	$sql1 = "UPDATE chungloai SET ThuTu = $ThuTuXuong WHERE idCL = $idCL_can_tang";
	$sql2 = "UPDATE chungloai SET ThuTu = $ThuTu WHERE idCL = $idCL_Len";
	mysql_query($sql1);
	mysql_query($sql2);	
}
if($loai == "loaisp"){
	$idCL_can_tang = $d->LayId_DuaVaoThuTu('loaisp','idLoai',$ThuTu);
	$ThuTuXuong = $d->LayThuTuXuong('loaisp',$ThuTu);
	$idCL_Len = $d->LayId_DuaVaoThuTu('loaisp','idLoai',$ThuTuXuong);	
	$sql1 = "UPDATE loaisp SET ThuTu = $ThuTuXuong WHERE idLoai = $idCL_can_tang";
	$sql2 = "UPDATE loaisp SET ThuTu = $ThuTu WHERE idLoai = $idCL_Len";
	mysql_query($sql1);
	mysql_query($sql2);	
}
if($loai == "thanhpho"){
	$idCL_can_tang = $d->LayId_DuaVaoThuTu('thanhpho','idTP',$ThuTu);
	$ThuTuXuong = $d->LayThuTuXuong('thanhpho',$ThuTu);
	$idCL_Len = $d->LayId_DuaVaoThuTu('thanhpho','idTP',$ThuTuXuong);	
	$sql1 = "UPDATE thanhpho SET ThuTu = $ThuTuXuong WHERE idTP = $idCL_can_tang";
	$sql2 = "UPDATE thanhpho SET ThuTu = $ThuTu WHERE idTP = $idCL_Len";
	mysql_query($sql1);
	mysql_query($sql2);	
}

if($loai == "danhmuc_tour"){
	$idDM_can_tang = $d->LayId_DuaVaoThuTu('dvt_ks_danhmuc','idDM_KS',$ThuTu,$quocgia);
	$ThuTuXuong = $d->LayThuTuXuong('dvt_ks_danhmuc',$quocgia,$ThuTu);
	$idDM_KS_Len = $d->LayId_DuaVaoThuTu('dvt_ks_danhmuc','idDM_KS',$ThuTuXuong,$quocgia);	
	$sql1 = "UPDATE dvt_ks_danhmuc SET ThuTu = $ThuTuXuong WHERE idDM_KS = $idDM_can_tang";
	$sql2 = "UPDATE dvt_ks_danhmuc SET ThuTu = $ThuTu WHERE idDM_KS = $idDM_KS_Len";
	mysql_query($sql1);
	mysql_query($sql2);	
}
?>