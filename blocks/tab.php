<div class="news_tabs right">
      <ul class="list_tabs">
        <li class="first_li active"><a href="#" title="tab_1">Tin nổi bật</a></li>
        <li class="end_li"><a href="#" title="tab_2">Tin mới cập nhật</a></li>        
      </ul>
      <div class="clear"></div>
      <div style="display: block;" class="item_tab" id="tab_1">
        <ul class="list_news">
        	<?php 
			$rs = $t->TinNoiBat(0,9);
			while($row = mysql_fetch_assoc($rs)){
			?>
			<li><a href="index.php?com=detail&id=<?php echo $row['idTin'];?>"><?php echo $row['TieuDe']; ?></a></li>
			<?php } ?>             
        </ul>
      </div>
      <div style="display: none;" class="item_tab" id="tab_2">
        <ul class="list_news">
            <?php 
			$rs = $t->TinMoiNhat(0,9);
			while($row = mysql_fetch_assoc($rs)){
			?>
			<li><a href="index.php?com=detail&id=<?php echo $row['idTin'];?>"><?php echo $row['TieuDe']; ?></a></li>
			<?php } ?>    		
        </ul>
      </div>      
</div>