<?php 
$link = "index.php?com=duyet_list";

$limit = 100;

$tins = $t->Duyet_List();

$total_record = mysql_num_rows($tins);

$total_page = ceil($total_record/$limit);

if(isset($_GET[page])==false){
	$page = 1;
}
else{ 
	$page=$_GET[page];
	settype($page,"int");
}

$offset = $limit * ($page - 1);
$listsp = $t->Duyet_List($limit,$offset);
$page_show=5;
?>
<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live("click",function(){			
			var idTin = $(this).attr("idTin");
			$.get('xoa.php',{loai:"tinmoi",id:idTin},function(data){
				$('#tin_'+idTin).hide(1000);
			});	
		})
		$("#idTL").change(function(){
			var idTL= $(this).val();
			$.post("blocks/ajax_laylsp.php",{idTL:idTL},function(data){				
				$("#idLT").html(data);
			})
		})//check all	
	})
</script>

<div id="admin_navigation">
	<div style="float:left;width:80%">
		<h3>Quản lý bài viết : Xem danh sách</h3>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
        <a href="index.php?com=tin_add"><input type="button" class="new" name="btnNew" value=""/></a><br />		
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
        	<legend>++ Danh sách bài viết ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corners" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                            <tr>
                                <td colspan="6"><?php echo $t->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                            <tr style="background-color:#06F;height:30px;color:#FFF">
                                <th scope="col" class="rounded-company"></th>       
                               
                                <th scope="col" class="rounded" align="left">Tiêu đề</th>
                                <th scope="col" class="rounded">Source</th>
                                <th scope="col" class="rounded">Hình</th> 
                                <th scope="col" class="rounded">Sửa</th>
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
                            <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?> id="tin_<?php echo $row['idTin'];?>">
                                <td><input type="checkbox" name="chon" idTin=<?php echo $row['idTin']?>></td>                                 
                                <td align="left"><?php echo $row['TieuDe']?> </td> 
                                <td align="left"><?php echo $row['source']?> </td>    
                                <td><img src="<?php echo $row['urlHinh']?>" alt="<?php echo $row['TieuDe']?>" title="" border="0" width="80" height="80"></td>
                               
                                <td><a target="_blank" href="index.php?com=duyet_add&idTinMoi=<?php echo $row['idTin']?>"><img src="img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td><img onclick="return confirm('Bạn có chắc chắn xóa ?');" class="linkxoa" idTin=<?php echo $row['idTin']?> src="img/icons/trash.png" alt="" title="" border="0"></td>
                            </tr>
                        <?php  } }else{?>
                        <tr><td colspan="6">Không có bài viết nào !</td></tr>
                        <?php } ?>
                        <tr>
                                <td colspan="6"><?php echo $t->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                        
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
