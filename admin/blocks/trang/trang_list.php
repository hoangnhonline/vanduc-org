<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live('click',function(){			
			var flag = confirm("Bạn có chắc chắn xóa");
			if(flag == true){
				var idTrang = $(this).attr("idTrang");
				$.get('xoa.php',{loai:"trang",id:idTrang},function(data){
					window.location.reload();			
				});	
			}
		})
        
	})
</script>

<div id="admin_navigation">
	<div style="float:left;width:80%">
		<h3>Quản lý trang : Xem danh sách</h3>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
        <a href="index.php?com=danhmuc_add"><input type="button" class="new" name="btnNew" value=""/></a><br />		
        <span>New</span>
    </div>
	<div style="float:left;width:5%;padding-top:5px">
    	<input type="submit" class="save" name="btnSumit" value=""/><br />		
        <span>Save</span>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
    	<input type="reset" class="cancel" name="btnCancel" value=""/><br />		
        <span>Reset</span>
    </div>
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div>
    	<fieldset>
        	<legend>++ Danh sách ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corner" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                            <tr>
                                <th scope="col" class="rounded-company"></th>                                

								<th scope="col" class="rounded">Tên sách </th>  
                                <th scope="col" class="rounded">Thứ tự trang  </th>                              
                                <th scope="col" class="rounded">Sửa</th>
                                <th scope="col" class="rounded-q4">Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
						
                        $sach = $trang->Trang_List();
                        while($row=mysql_fetch_assoc($sach)) {                 
                        ?>	
                            <tr>
                                <td><input type="checkbox" name="chon" idDM=<?php echo $row[idTrang]?>></td>                                    
                                <td align="left"><?php echo $row[TenSach]?></td>  
								<td align="left"><?php echo $row[ThuTu]?></td>  
                               
                                <td><a href="index.php?com=trang_edit&amp;idTrang=<?php echo $row[idTrang]?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td><img class="linkxoa" idTrang=<?php echo $row[idTrang]?> src="../img/icons/trash.png" alt="" title="" border="0"></td>
      <?php } ?>
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
