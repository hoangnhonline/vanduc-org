<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live('click',function(){			
			var flag = confirm("Bạn có chắc chắn xóa");
			if(flag == true){
				var idPT = $(this).attr("idPT");
				$.get('xoa.php',{loai:"phuongthuc",id:idPT},function(data){
					window.location.reload();			
				});	
			}
		})
       
	})
</script>

<div id="admin_navigation">
	<div style="float:left;width:80%">
		<h3>Quản lý phương thức : Xem danh sách</h3>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
        <a href="index.php?com=pt_add"><input type="button" class="new" name="btnNew" value=""/></a><br />		
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
        	<legend>++ Phương thức ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corner" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                            <tr>
                                <th scope="col" class="rounded-company"></th>       
                               
                                <th scope="col" class="rounded" align="left">Tên phương thức</th> 
                                <th scope="col" class="rounded">Sửa</th>
                                <th scope="col" class="rounded-q4">Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                       <?php 
					   $chungloai = $pt->PhuongThuc_List();
                        while($row=mysql_fetch_assoc($chungloai)) {                 
                        ?>	
                            <tr>
                                <td><input type="checkbox" name="chon" idPT=<?php echo $row[idPT]?>></td>  
                                  
                                <td align="left"><?php echo $row[TenPT]?></td>    
                                    
                                                         
                               
                               
                                <td><a href="index.php?com=pt_edit&amp;idPT=<?php echo $row[idPT]?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td>
                                	<img class="linkxoa" idPT=<?php echo $row[idPT]?> src="../img/icons/trash.png" alt="" title="" border="0">
                                </td>
      <?php } ?>
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
