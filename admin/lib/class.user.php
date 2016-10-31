<?php 
require_once "class.db.php";
class users extends db{
	
	/* QUAN LY USER */
	
	function User_List($limit=-1,$offset=-1){
		$sql = "SELECT * FROM users ORDER BY idUser ASC ";
		if($limit >0 && $offset >=0) $sql.= " LIMIT $offset,$limit";
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}	
	function User_ChiTiet($idUser){
		$sql = "SELECT * FROM users Where idUser = $idUser ";		
		$rs = mysql_query($sql) or die(mysql_error());
		return $rs;
	}	
	function User_Edit($idUser,&$loi){
		settype($idUser,"int");
		$thanhcong=true;
		
		$Email = $this->processData($_POST[Email]);
		$Dienthoai = $this->processData($_POST[Dienthoai]);
		
		$DiaChi = $this->processData($_POST[DiaChi]);
		$Dienthoai = $this->processData($_POST[Dienthoai]);
		
		$GioiTinh = $_POST[GioiTinh];settype($GioiTinh,"int");
		
		$Active = $_POST[Active];settype($Active,"int");
		$idGroup = $_POST[idGroup];settype($idGroup,"int");
		
	
		if($thanhcong==false){
			return $thanhcong;
		}else{
			$sql = "UPDATE users 
					SET Email = '$Email',DiaChi = '$DiaChi',Active = $Active,idGroup = $idGroup,
					Dienthoai = '$Dienthoai',GioiTinh = '$GioiTinh'
					WHERE idUser = $idUser";
			mysql_query($sql) or die(mysql_error().$sql);		
		}
		return $thanhcong;
	}
}

?>