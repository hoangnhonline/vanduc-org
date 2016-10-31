<?php
require_once "class.db.php";
class quantri extends db{
	

	function Xoa($table,$field,$value){
		$sql ="DELETE FROM $table WHERE $field= $value";
		mysql_query($sql) or die(mysql_error());
	}
   
	function PhanTrang($page,$url,$limit,$sotrang){
		$dau=1;
		$cuoi=0;
		$dau=$page - floor($limit/2);
		
		
			
		$cuoi=$dau+$limit;
		if($cuoi>$sotrang)
		{
			
			$cuoi=$sotrang+1;
			$dau=$cuoi-$limit;
		}
		if($dau<1) $dau=1;
		
		if($page >1) { ?>
		 <a href="?<?=$url?>&page=1">Đầu</a>
		<a href="?<?=$url?>&page=<?php if($page > 1)echo($page - 1);?> ">Trước</a>
		
		<?php } 
		for($i=$dau; $i<$cuoi; $i++)
		{
			?>
			<a href="?<?=$url?>&page=<?php echo $i;?>"  <?php if($page==$i) echo "style='background-color:yellow'";?>>
			<?
				echo $i."  ";
			?>
			</a>
	<?
		}
	?>
	<?php if($page < $sotrang) {?>
	 <a href="?<?=$url?>&page=<?php echo($page + 1)?>">Kế</a>
	<a href="?<?=$url?>&page=<?php echo $sotrang;?>">Cuối</a>
	<?php }
	
	
	}
	
	
	
	
	
} //class quantri
?>