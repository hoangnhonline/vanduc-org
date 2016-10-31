<?php 
include "lib/class.db.php";
$d = new db;
$idTin = $_POST['idTin'];settype($idTin,"int");
$anhien = $_POST['AnHien'];settype($anhien,"int");
$sql = "UPDATE tin SET AnHien = $anhien WHERE idTin = $idTin";
mysql_query($sql);
?>