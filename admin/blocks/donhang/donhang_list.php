<?php 
$users = $u->User_List();

$link = "index.php?com=donhang_list";

if(isset($_GET[idUser]) && $_GET[idUser] > 0 ) {
    $idUser =($_GET[idUser]);settype($idUser,"int");
    $link.="&idUser=$idUser";
}else{  $idUser = -1;}
if(isset($_GET[TinhTrang]) && $_GET[TinhTrang] > 0 ){
    $TinhTrang =$_GET[TinhTrang];
   $link.="&TinhTrang=$TinhTrang";
 }else {
    $TinhTrang = -1;
}


$limit = 5;

$sanphams = $dh->DonHang_List($idUser,$TinhTrang,-1,-1);

$total_record = mysql_num_rows($sanphams);

$total_page = ceil($total_record/$limit);

if(isset($_GET[page])==false){
	$page = 1;
}
else{ 
	$page=$_GET[page];
	settype($page,"int");
}

$offset = $limit * ($page - 1);
$listsp = $dh->DonHang_List($idUser,$TinhTrang,$limit,$offset);
$page_show=5;
?>
<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live("click",function(){			
			var idDH = $(this).attr("idDH");
			$.get('xoa.php',{loai:"donhang",id:idDH},function(data){
				window.location.reload();			
			});	
		})
	})
</script>

<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý đơn hàng : Danh sách</h3>
    </div>
	
    <div class="clr"></div>
</div>
<div id="main_admin">

	<div style="margin-bottom:20px">
    	<form method="get">
        	<input type="hidden"  name="com" value="donhang_list"/>
    	<fieldset>
        	<legend>++ Tìm kiếm ++</legend>
            	<div style="text-align: left"> 
               <b> User </b>
                <select name="idUser">
                    <option value="-1">--Tất cả--</option> 
					<?php while($row_tp = mysql_fetch_assoc($users)){?>
                    <option <?php echo ($_GET[idUser] == $row_tp[idUser]) ? "selected" : ""; ?> 
                    value="<?php echo $row_tp[idUser];?>"><?php echo $row_tp[Username];?></option>
                    <?php } ?>
                </select>                 
                 &nbsp;&nbsp;&nbsp;&nbsp;<b>Tình trạng</b>
                 <select id="TinhTrang" name="TinhTrang">
                          	<option value="-1">--Tất cả--</option> 
                           
                            <option value="0" <?php if($_GET[TrinhTrang]==0) echo "selected"; ?>>Chưa giao</option>
                            <option value="1" <?php if($_GET[TrinhTrang]==1) echo "selected"; ?>>Đã giao</option>
                           
                          </select> 
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value=" Tìm " name="btnTim" class="nut" />
                </div>
        </fieldset>
        </form>
    </div><!---tim kiem -->

    
    
    
    
	<div>
    	<fieldset>
        	<legend>++ Danh sách đơn hàng ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corners" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                            <tr>
                                <td colspan="9"><?php echo $dh->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                            <tr style="background-color:#06F;height:30px;color:#FFF">
                                <th scope="col" class="rounded-company"></th>       
                               
                                <th scope="col" class="rounded" align="left">Tên người nhận</th>
                                <th scope="col" class="rounded">Email</th>
                                <th scope="col" class="rounded">Điện thoại</th>
                                <th scope="col" class="rounded">Thời điểm giao</th> 
                                <th scope="col" class="rounded">Địa điểm giao</th> 
                                <th scope="col" class="rounded">Tình trạng</th>
                                <th scope="col" class="rounded">Chi tiết</th>
                                <th scope="col" class="rounded-q4">Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
						$i=0;     
						if(mysql_num_rows($listsp) > 0){                   
                          while($row = mysql_fetch_assoc($listsp))     {  
						  $i++;              
                        ?>	
                            <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idDH=<?php echo $row[idDH]?>></td>                                 
                                <td align="left"><?php echo $row[TenNguoiNhan]?></td>  
                                <td align="left"><?php echo $row[Email]?></td>    
                                <td align="left"><?php echo $row[Dienthoai]?></td>                                 
                                <td align="left"><?php echo date('d-m-Y',strtotime($row[ThoiDiemGiaohang])); ?></td>
                                <td align="left"><?php echo $row[DiaDiemGiaoHang]?></td>
                                <td align="left"><?php echo ($row[TinhTrang]==0) ? "Chưa giao" : "Đã giao"; ?></td>
                                 <td><a href="index.php?com=donhang_chitiet&idDH=<?php echo $row[idDH]; ?>">Chi tiết</a></td>
                                <td><img onclick="return confirm('Bạn có chắc chắn xóa ?');" class="linkxoa" idDH=<?php echo $row[idDH]?> src="../img/icons/trash.png" alt="" title="" border="0"></td>
                            </tr>
                        <?php  } }else{?>
                        <tr><td colspan="9">Không có đơn hàng nào !</td></tr>
                        <?php } ?>
                        <tr>
                                <td colspan="9"><?php echo $dh->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                        
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
