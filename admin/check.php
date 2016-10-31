<?php 
require_once "classQuanTri.php";
$qt = new quantri;

$mkcu = $_POST[mkcu];
$mkcu = $qt->processData($mkcu);
$mkcu= md5($mkcu);
$idUser = $_POST[idUser];settype($idUser,"int");
$check = $qt->CheckMK($mkcu,$idUser);
if($check==false) echo "Mật khẩu củ không đúng !";
?>