<?php	
	require_once("../lib/class.db.php");
	$d = new db;
?>
<?php
	$idTL = $_POST['idTL'];  settype($idTL, "int");	
	$idTin = $_POST['idTin'];  settype($idTin, "int");	
	$layidLT=mysql_query("select idLT from tin where idTin=$idTin");
	$row_layidLT=mysql_fetch_array($layidLT);	
	$idLT=$row_layidLT['idLT'];
	$sql = "SELECT idLT, TenLT FROM loaitin WHERE idTL=$idTL";
	$loaitin = mysql_query($sql) or die(mysql_error());

?>


<option value="0">Chọn chủ đề</option>



<?php while ($row_loaitin = mysql_fetch_assoc($loaitin)) { ?>


	<option <? if($idLT==$row_loaitin['idLT']) echo "selected=selected";?> value="<?php echo $row_loaitin['idLT'];?>">
    
	<?php echo $row_loaitin['TenLT'];?> 
    
	</option>
    
    
    
<?php } ?>
