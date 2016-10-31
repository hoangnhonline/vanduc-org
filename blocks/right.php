<div class="box_common">
    <h3>Tin tức</h3>
    <ul>
        <?php 
		$rs = $t->ListTinTheoLoaiTin(8,0,5);
		while($row = mysql_fetch_assoc($rs)){
		?>
        <li><a href="index.php?com=detail&id=<?php echo $row['idTin'];?>"><?php echo $row['TieuDe']; ?></a></li>
        <?php } ?>   
            
        <li class="end_li right"><a href="index.php?com=cat&idc=8">Xem tất cả</a></li>
    </ul>
    <div class="clear"></div>
  </div>
  <div class="box_common pictures_box">
    <h3>Hình ảnh</h3>
    <?php include "blocks/hinhanh.php"; ?>
    <div class="clear"></div>
  </div>
  <div class="box_common">
        <h3>Bài giảng</h3>
            <ul>			   
                <?php 
				$rs = $t->ListTinTheoLoaiTin(10,0,5);
				while($row = mysql_fetch_assoc($rs)){
				?>
				<li><a href="index.php?com=detail&id=<?php echo $row['idTin'];?>"><?php echo $row['TieuDe']; ?></a></li>
				<?php } ?>   
                        
                <li class="end_li right"><a href="index.php?com=cat&idc=10">Xem tất cả</a></li>
            </ul>
        <div class="clear"></div>
  </div> 
  <div class="box_common">
        <h3>Fanpage Facebook</h3>
        <ul>	
            <li>
            	<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FChùa-Vạn-Đức-TPHCM%2F592025740827559&amp;width=200&amp; height=258&amp;colorscheme=light&amp;show_faces=true&amp; border_color=%23f7f7f7&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:258px;" allowtransparency="true"></iframe>
            </li>
        </ul>
            
        <div class="clear"></div>
  </div>
