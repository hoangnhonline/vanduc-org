<?php 
$idDH = $_GET[idDH];settype($idDH,"int");
$sql = "SELECT donhangchitiet.*,TenSP FROM donhangchitiet,sanpham WHERE idDH = $idDH AND donhangchitiet.idSP = sanpham.idSP";
$donhang = mysql_query($sql);
?>
<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live("click",function(){			
			var idSP = $(this).attr("idSP");
			$.get('xoa.php',{loai:"sanpham",id:idSP},function(data){
				window.location.reload();			
			});	
		})
	})
</script>

<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý đơn hàng : chi tiết</h3>
    </div>
	
    <div class="clr"></div>
</div>
<div id="main_admin">

    
	<div>
    	<fieldset>
        	<legend>++ Đơn hàng chi tiết ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corners" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                           
                            <tr style="background-color:#06F;height:30px;color:#FFF">
                                <th scope="col" class="rounded-company"></th>
                                <th scope="col" class="rounded" align="left">idDH</th>                             
                                <th scope="col" class="rounded">idSP</th>
                                <th scope="col" class="rounded">Số Lượng</th> 
                                <th scope="col" class="rounded">Giá</th>                                
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
						$i=0;     
						if(mysql_num_rows($donhang) > 0){                   
                          while($row = mysql_fetch_assoc($donhang))     {  
						  $i++;              
                        ?>	
                            <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idChiTiet=<?php echo $row[idChiTiet]?>></td>                                 
                                <td align="left"><?php echo $row[idDH]?></td>  
                                <td align="left"><?php echo $row[TenSP]?></td>    
                                <td align="center"><?php echo $row[SoLuong]?></td>   
                                <td align="left"><?php echo number_format($row[Gia]); ?> VNĐ</td>                                
                            </tr>
                        <?php  } }else{?>
                        <tr><td colspan="9">Không có đơn hàng nào !</td></tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
