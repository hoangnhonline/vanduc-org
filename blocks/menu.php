<div class="link_navigation">
  <ul>
    <li class="first_li <?php if($com=='') echo "active"; ?>" ><a href="index.php"><span>Trang chủ</span></a></li>
    <li <?php if($com=='about') echo "class='active'"; ?>><a href="index.php?com=about" ><span>Giới thiệu</span></a></li>
    <li <?php if($_GET['idc']==2) echo "class='active'"; ?>><a  href="index.php?com=cat&idc=2" ><span>Phật Học</span></a></li>
    <li <?php if($_GET['idc']==5) echo "class='active'"; ?>><a  href="index.php?com=cat&idc=5"><span>Pháp âm</span></a></li>
    <li <?php if($_GET['idc']==6) echo "class='active'"; ?>><a href="index.php?com=cat&idc=6"><span>Hình ảnh</span></a></li>    
    <li <?php if($_GET['idc']==3) echo "class='active'"; ?>><a href="index.php?com=cat&idc=3"><span>Văn học</span></a></li>
	<li <?php if($_GET['idc']==13) echo "class='active'"; ?>><a href="index.php?com=cat&idc=13"><span>Từ thiện</span></a></li>
    <li <?php if($_GET['idc']==9) echo "class='active'"; ?>><a href="index.php?com=cat&idc=9"><span>Thông báo</span></a></li>    
    <li class="end_li <?php if($com=='contact') echo "active"; ?>"  ><a href="index.php?com=contact"><span>Liên hệ</span></a></li>
  </ul>
</div>