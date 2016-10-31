<?php 
$idTin = (int) $_GET['id'];
$rs = $t->Tin_ChiTiet($idTin);
$row = mysql_fetch_assoc($rs);
$idLT =$row['idLT'];
require_once "admin/lib/class.loaitin.php";
	$lt = new loaitin;
	$rschitiet = $lt->LoaiTin_ChiTiet($idLT);
	$row_loaitin = mysql_fetch_assoc($rschitiet);
?>
<p id="cat_name" style="margin-left:0px;"><a href="index.php">Trang chủ</a><span> >> </span>
<a href="index.php?com=cat&idc=<?php echo $idLT;?>"><?php echo $row_loaitin['TenLT']; ?></a></p>
<div id="single_page_content">
								<div id="post_content">
				<h1 class="title_single_page "><?php echo $row['TieuDe'];?></h1>
				<p style="text-align: justify;"><strong><em><?php echo $row['TomTat'];?></em></strong></p>
<div align="justify">
<?php echo $row['NoiDung'];?>
</div>
				</div><!--End post_content-->
					
		  </div>