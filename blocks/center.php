<div class="clear"></div>
<div id="col_center_box_new">
    ﻿<?php 
	$rs = $t->ListTinTheoLoaiTin(2,0,8);
	while($row = mysql_fetch_assoc($rs)){
	?>	
    <div class="block_new"> 
    <a class="left wrap_img" href="index.php?com=detail&id=<?php echo $row['idTin']; ?>">	<img src="<?php echo $row['UrlHinh'];?>" class="attachment-thumbnail wp-post-image" alt="<?php echo $row['TieuDe']; ?>" title="<?php echo $row['TieuDe']; ?>" height="110" width="110"></a>
        <a class="clor_yellow" href="index.php?com=detail&id=<?php echo $row['idTin']; ?>"><?php echo $row['TieuDe']; ?></a>
        <div class="detail_news">
            <span class="clor_gray date_timte left"><?php echo date('d/m/Y H:i',$row['Ngay']);?></span><a class="left clor_gray news_hot" href="#"></a>
        </div>
        <p><?php echo $row['TomTat']; ?></p>					
        <a href="index.php?com=detail&id=<?php echo $row['idTin']; ?>" class="link_detail_news">Chi Tiết</a>
    </div><!--end of block_new -->
    <?php } ?>   
</div>