<?php 
$link = "index.php?com=loaitin_list";
$limit = 10;
$page_show=5;
if(isset($_GET[idTL]) && $_GET[idTL] > 0 ) {
    $idTL =($_GET[idTL]);settype($idTL,"int");
    $link.="&idTL=$idTL";
}else{  $idTL = -1;}

$danhmucs = $lt->LoaiTin_List(-1,-1);
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
$loai = $lt->LoaiTin_List($limit,$offset);

?>
<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live('click',function(){			
			var flag = confirm("Bạn có chắc chắn xóa");
			if(flag == true){
				var idLT = $(this).attr("idLT");
				$.get('xoa.php',{loai:"loaitin",id:idLT},function(data){
					window.location.reload();			
				});	
			}
		})
        
	})
</script>

<div id="admin_navigation">
	<div style="float:left;width:80%">
		<h3>Quản lý chuyên mục : Xem danh sách</h3>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
        <a href="index.php?com=loaitin_add"><input type="button" class="new" name="btnNew" value=""/></a><br />		
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
        	<legend>++ chuyên mục ++</legend>
            	<div style="text-align: center">                                       
                    <table id="rounded-corners" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                        	<tr>
                                <td colspan="5"><?php echo $lt->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                            <tr style="background-color:#03F;color:#FFF;height:30px">
                                <th scope="col" class="rounded-company"></th>                                                                     
                                <th scope="col" class="rounded">chuyên mục</th> 
                                <th scope="col" class="rounded">Sửa</th>
                                <th scope="col" class="rounded-q4">Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 					
                        $i=0;
                        while($row=mysql_fetch_assoc($loai)) {   						
						$i++;
                        ?>	
                            <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idLT=<?php echo $row[idLT]?>></td>                              
                                <td align="left"><?php echo $row[TenLT]?></td>    
                                    
                                                         
                             
                               
                                <td><a href="index.php?com=loaitin_edit&amp;idLT=<?php echo $row[idLT]?>"><img src="img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td>
                                	<img class="linkxoa" idLT=<?php echo $row[idLT]?> src="img/icons/trash.png" alt="" title="" border="0">
                                </td>
      <?php } ?>
      						<tr>
                                <td colspan="5"><?php echo $lt->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
