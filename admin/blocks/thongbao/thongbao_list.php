<?php 
$link = "index.php?com=thongbao_list";
$limit = 10;
$page_show=5;
$danhmucs = $tb->ThongBao_List(-1,-1);
$total_record = mysql_num_rows($danhmucs);

$total_page = ceil($total_record/$limit);

if(isset($_GET[page])==false){
	$page = 1;
}
else{ 
	$page=$_GET[page];
	settype($page,"int");
}

$offset = $limit * ($page - 1);
$chungloai = $tb->ThongBao_List($limit,$offset);

?>
<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live('click',function(){			
			var flag = confirm("Bạn có chắc chắn xóa");
			if(flag == true){
				var idThongBao = $(this).attr("idThongBao");
				$.get('xoa.php',{loai:"thongbao",id:idThongBao},function(data){
					window.location.reload();			
				});	
			}
		})
       
	})
</script>

<div id="admin_navigation">
	<div style="float:left;width:80%">
		<h3>Quản lý thông báo lỗi : Xem danh sách</h3>
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
        	<legend>++ Thông báo lỗi ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corners" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                        	<tr>
                                <td colspan="5"><?php echo $tb->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                            <tr style="background-color:#03F;color:#FFF;height:30px">
                                <th scope="col" class="rounded-companys"></th>       
                               
                                <th scope="col" class="rounded">Email</th> 
                                <th scope="col" class="rounded">Tiêu đề</th>
                                <th scope="col" class="rounded">Nội dung</th>
                                <th scope="col" class="rounded-q4">Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
						
						$i=0;                  
                        while($row=mysql_fetch_assoc($chungloai)) {                 
						$i++;
                        ?>	
                            <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idThongBao=<?php echo $row[idThongBao]?>></td>  
                                  
                                <td align="left"><?php echo $row[Email]?></td>    
                                    
                                                         
                               <td align="left">
								<?php echo $row[TieuDe]; ?>
                               </td>  
                               
                                <td align="left"><?php echo $row[NoiDung]; ?></td>
                                <td>
                                	<img class="linkxoa" idThongBao=<?php echo $row[idThongBao]?> src="../img/icons/trash.png" alt="" title="" border="0">
                                </td>
      <?php } ?>
      						<tr>
                                <td colspan="5"><?php echo $tb->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
