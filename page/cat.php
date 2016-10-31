<?php 
$idLT =(int) $_GET['idc'];
if($idLT>0){
	
	$link = "index.php?com=cat&idc=".$idLT;
	
	$limit = 10;
	
	$tins = $t->ListTinTheoLoaiTin($idLT,-1,-1);
	
	$total_record = mysql_num_rows($tins);
	
	$total_page = ceil($total_record/$limit);
	require_once "admin/lib/class.loaitin.php";
	$lt = new loaitin;
	if(isset($_GET['page'])==false){
		$page = 1;
	}
	else{ 
		$page=$_GET['page'];
		settype($page,"int");
	}
	
	$offset = $limit * ($page - 1);
	$listsp = $t->ListTinTheoLoaiTin($idLT,$offset,$limit);
	$page_show=5;
	$rschitiet = $lt->LoaiTin_ChiTiet($idLT);
	$row_loaitin = mysql_fetch_assoc($rschitiet);
?>
<div class="clear"></div>
<p id="cat_name"><a href="index.php">Trang chủ</a><span> >> </span>
<a href="index.php?com=cat&idc=<?php echo $idLT;?>"><?php echo $row_loaitin['TenLT']; ?></a></p>
<div id="col_center_box_new">
    ﻿<?php
	while($row = mysql_fetch_assoc($listsp)){
	?>	
    <div class="block_new"> 
    <a  class="left wrap_img" href="index.php?com=detail&id=<?php echo $row['idTin']; ?>">	<img src="<?php echo $row['UrlHinh'];?>" class="attachment-thumbnail wp-post-image" alt="<?php echo $row['TieuDe']; ?>" title="<?php echo $row['TieuDe']; ?>" height="110" width="110"></a>
        <a class="clor_yellow" href="index.php?com=detail&id=<?php echo $row['idTin']; ?>"><?php echo $row['TieuDe']; ?></a>
        <div class="detail_news">
            <span class="clor_gray date_timte left"><?php echo date('d/m/Y H:i',$row['Ngay']);?></span><a class="left clor_gray news_hot" href="#"></a>
        </div>
        <p><?php echo $row['TomTat']; ?></p>					
        <a href="index.php?com=detail&id=<?php echo $row['idTin']; ?>" class="link_detail_news">Chi Tiết</a>
    </div><!--end of block_new -->
    <?php } ?>   
    <?php echo $t->phantrang($page,$page_show,$total_page,$link);?>
</div>
<?php } else { echo "Không có data !"; }?>