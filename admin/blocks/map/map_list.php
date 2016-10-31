<?php 
$link = "index.php?com=map_list";
$limit = 10;
$page_show=5;
$danhmucs = $map->Map_List(-1,-1);
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
$map = $map->Map_List($limit,$offset);

?>
<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live('click',function(){			
			var flag = confirm("Bạn có chắc chắn xóa");
			if(flag == true){
				var idMap = $(this).attr("idMap");
				$.get('xoa.php',{loai:"map",id:idMap},function(data){
					window.location.reload();			
				});	
			}
		})
         $(".tang").live('click',function(){
            var ThuTu = $(this).attr("ThuTu");			
            $.post('tang.php',{loai:'chungloai',ThuTu:ThuTu},function(data){
				window.location.reload();
            })
        })
		$(".giam").live('click',function(){
            var ThuTu = $(this).attr("ThuTu");
            $.post('giam.php',{loai:'chungloai',ThuTu : ThuTu},function(data){
				window.location.reload();
            })
        })
	})
</script>

<div id="admin_navigation">
	<div style="float:left;width:80%">
		<h3>Quản lý bản đồ : Xem danh sách</h3>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
        <a href="index.php?com=map_add"><input type="button" class="new" name="btnNew" value=""/></a><br />		
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
        	<legend>++ Bản đồ ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corners" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                        	<tr>
                                <td colspan="5"><?php //echo $map->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                            <tr style="background-color:#03F;color:#FFF;height:30px">
                                <th scope="col" class="rounded-companys"></th>       
                               
                                <th scope="col" class="rounded">Tên doanh nghiệp</th> 
                       
                                <th scope="col" class="rounded">Sửa</th>
                                <th scope="col" class="rounded-q4">Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
						//$ThuTuMax = $cl->ThuTuMax('chungloai');
						//$ThuTuMin = $cl->ThuTuMin('chungloai');      
						$i=0;                  
                        while($row=mysql_fetch_assoc($map)) {                 
						$i++;
                        ?>	
                            <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idCL=<?php echo $row[idMap]?>></td>  
                                  
                                <td align="left"><?php echo $row[TenDN]?></td>    
                                    
                                                         
                          
                               
                                <td><a href="index.php?com=map_edit&amp;idMap=<?php echo $row[idMap]?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td>
                                	<img class="linkxoa" idMap=<?php echo $row[idMap]?> src="../img/icons/trash.png" alt="" title="" border="0">
                                </td>
      <?php } ?>
      						<tr>
                                <td colspan="5"><?php //echo $map->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
