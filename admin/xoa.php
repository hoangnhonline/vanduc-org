<?php	
require_once("lib/classQuanTri.php");
$qt = new quantri;	

$loai = $_GET[loai];
$id = $_GET[id];settype($id,"int");
switch($loai){
	case "theloai":
		$qt->Xoa("theloai","idTL",$id);
		break;
	case "map":
		$qt->Xoa("map","idMap",$id);
		break;
	case "loaitin":	
		$qt->Xoa("loaitin","idLT",$id);	
		break;
	case "phuongthuc" :
		$qt->Xoa("phuongthuc","idPT",$id);	
		break;
	case "tin" : 
		$qt->Xoa("tin","idTin",$id);
		break;	
	case "user" : 
		$qt->Xoa("users","idUser",$id);
		break;	
	case "thongbao" : 
		$qt->Xoa("thongbaoloi","idThongBao",$id);
		break;	
	case "tinmoi" : 
		$sql1 = "DELETE FROM tinmoi WHERE idTin = $id";
		mysql_query($sql1);
	
		break;						
}



?>