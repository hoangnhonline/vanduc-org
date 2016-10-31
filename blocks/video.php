<div class="bx-wrapper" style="width:180px; position:relative;">
	<div class="bx-window" style="width:180px; height:570px; position:relative; overflow:hidden;">
		<ul style="height: 999999px; position: relative; top: -209px;" class="list_slide">
			<?php 
			$rs = $t->ListTinTheoLoaiTin(7,0,5);
			while($row = mysql_fetch_assoc($rs)){
			?>
            <li class="pager" style="list-style: none outside none; height: 190px;">
				<a href="index.php?com=detail&id=<?php echo $row['idTin'];?>">
					<img src="<?php echo str_replace("../",'',$row['UrlHinh']); ?>" class="attachment-thumbnail wp-post-image" alt="<?php echo $row['TieuDe']; ?>" title="<?php echo $row['TieuDe']; ?>" height="150" width="150">
				</a>
			</li>
            <?php } ?>
		</ul>
	</div>
	<a href="" class="bx-prev">prev</a>
	<a href="" class="bx-next">next</a>
</div>