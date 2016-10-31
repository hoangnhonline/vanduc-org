<?php 
$link = "index.php?com=user_list";
$limit = 10;
$page_show=5;
$danhmucs = $u->User_List(-1,-1);
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
$chungloai = $u->User_List($limit,$offset);

?>
<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live('click',function(){			
			var flag = confirm("Bạn có chắc chắn xóa");
			if(flag == true){
				var idUser = $(this).attr("idUser");
				$.get('xoa.php',{loai:"user",id:idUser},function(data){
					//window.location.reload();			
				});	
			}
		})        
	})
</script>

<div id="admin_navigation">
	<div style="float:left;width:80%">
		<h3>Quản lý user : Xem danh sách</h3>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
    <!--
        <a href="index.php?com=user_add"><input type="button" class="new" name="btnNew" value=""/></a><br />		
        <span>New</span>
        -->
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
        	<legend>++ Thành viên ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corners" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                        	<tr>
                                <td colspan="8"><?php echo $cl->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                            <tr style="background-color:#03F;color:#FFF;height:30px">
                                <th scope="col" class="rounded-companys"></th>       
                               
                                <th scope="col" class="rounded">Username</th> 
                                <th scope="col" class="rounded">Email</th> 
                                <th scope="col" class="rounded">Điện thoại</th>
                                <th scope="col" class="rounded">Giới tính</th>
                                <th scope="col" class="rounded">Nhóm</th>                                
                                <th scope="col" class="rounded">Sửa</th>
                                <th scope="col" class="rounded-q4">Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
						$ThuTuMax = $cl->ThuTuMax('chungloai');
						$ThuTuMin = $cl->ThuTuMin('chungloai');      
						$i=0;                  
                        while($row=mysql_fetch_assoc($chungloai)) {                 
						$i++;
                        ?>	
                            <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idUser=<?php echo $row[idUser]?>></td>  
                                  
                                <td align="left"><?php echo $row[Username]?></td>    
                                    
                                                         
                               <td align="left"><?php echo $row[Email]?></td>  
                                <td align="left"><?php echo $row[Dienthoai]?></td>  
                                <td align="left"><?php echo ($row[GioiTinh]==1) ? "Nam" : "Nữ"; ?></td> 
                                <td align="left"><?php echo ($row[idGroup]==1) ? "<font color=red>Ban quản trị</font>" : "Thành viên";?></td> 
                                
                               
                                <td><a href="index.php?com=user_edit&amp;idUser=<?php echo $row[idUser]?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td>
                                	<img class="linkxoa" idUser=<?php echo $row[idUser]?> src="../img/icons/trash.png" alt="" title="" border="0">
                                </td>
      <?php } ?>
      						<tr>
                                <td colspan="8"><?php echo $cl->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
