
  <!--<div class="box_common">
    <h3>Phật Học</h3>
    <ul>	
    	<?php 
		$rs = $t->ListTinTheoLoaiTin(2,0,5);
		while($row = mysql_fetch_assoc($rs)){
		?>
        <li><a target="_blank" href="#"><?php echo $row['TieuDe']; ?></a></li>
        <?php } ?>    
        <li class="end_li right"><a target="_blank" href="http://phapbao.org/category/phat-hoc/">Xem tất cả</a></li>
    </ul>
    <div class="clear"></div>
  </div>
  -->
  <div class="box_common">
    <h3>Văn Học</h3>
    <ul>
    	<?php 
		$rs = $t->ListTinTheoLoaiTin(3,0,5);
		while($row = mysql_fetch_assoc($rs)){
		?>
        <li><a href="index.php?com=detail&id=<?php echo $row['idTin'];?>"><?php echo $row['TieuDe']; ?></a></li>
        <?php } ?>     
        <li class="end_li right"><a href="index.php?com=cat&idc=3">Xem tất cả</a></li>
    </ul>
    <div class="clear"></div>
  </div>
  <?php if($com!='detail'){?>
  <div class="box_common video_box">
    <h3>Video</h3>
    <div class="block_slide">
    	<?php echo include "blocks/video.php"; ?>
    </div>
    <div class="clear"></div>
  </div>
  <?php } ?>
  <div class="box_common">
    <h3>Kinh</h3>
    <ul>
    	<?php 
		$rs = $t->ListTinTheoLoaiTin(4,0,5);
		while($row = mysql_fetch_assoc($rs)){
		?>
        <li><a href="index.php?com=detail&id=<?php echo $row['idTin'];?>"><?php echo $row['TieuDe']; ?></a></li>
        <?php } ?>         
        <li class="end_li right"><a href="index.php?com=cat&idc=4">Xem tất cả</a></li>
    </ul>
    <div class="clear"></div>
  </div>
