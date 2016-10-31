<?php 
$theloai = $tl->TheLoai_List();
$loai = $lt->LoaiTin_List();
$link = "index.php?com=tin_list";

if(isset($_GET[idTL]) && $_GET[idTL] > 0 ){
    $idTL =$_GET[idTL];
   $link.="&idTL=$idTL";
 }else {
    $idTL = -1;
}
if(isset($_GET[idLT]) && $_GET[idLT] > 0 ) 
    { $idLT =$_GET[idLT];
    $link.="&idLT=$idLT";
}else { $idLT = -1;}
if(isset($_GET[tukhoa]) && $_GET[tukhoa] != "" ) { $tukhoa =($_GET[tukhoa]);
$link.="&tukhoa=$tukhoa";
}else{ $tukhoa = "";}

$limit = 100;

$tins = $t->Tin_List($idTL,$idLT,$tukhoa);

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
$listsp = $t->Tin_List($idTL,$idLT,$tukhoa,$limit,$offset);
$page_show=5;
?>
<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live("click",function(){			
			var idTin = $(this).attr("idTin");
			$.get('xoa.php',{loai:"tin",id:idTin},function(data){
				window.location.reload();			
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

	<div style="margin-bottom:20px">
    	<form method="get">
        	<input type="hidden"  name="com" value="tin_list"/>
    	<fieldset>
        	<legend>++ Tìm kiếm ++</legend>
            	<div style="text-align: left"> 
              <b>Chuyên mục </b>
                 <select id="idTL" name="idTL">
                          	<option value="-1">--Tất cả--</option> 
                            <?php while($row_cl = mysql_fetch_assoc($theloai)){?>
                            <option 
                            <?php echo ($_GET[idTL] == $row_cl[idTL]) ? "selected" : ""; ?>
                            value="<?php echo $row_cl[idTL];?>"><?php echo $row_cl[TenTL];?></option>
                            <?php } ?>
                          </select> 
                 &nbsp;&nbsp;&nbsp;&nbsp;<b>Chủ đề</b>
                <select name="idLT" id="idLT">
                    <option value="-1">--Tất cả--</option>
                    <?php                              
                    while($row_loai = mysql_fetch_assoc($loai)){
                    ?>
                    <option value="<?php echo $row_loai[idLT]?>"
                    <?php if($_GET[idLT]==$row_loai[idLT]) echo "selected"; ?>
                    >
                        <?php echo $row_loai[TenLT];?>
                    </option>
                    <?php } ?>
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>Từ khóa</b>
                <input type="text" name="tukhoa" value="<?php echo $_GET[tukhoa]?>"  />
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value=" Tìm " name="btnTim" class="nut" />
                </div>
        </fieldset>
        </form>
    </div><!---tim kiem -->

    
    
    
    
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
                               
                                <th scope="col" class="rounded" align="left">Tên bài viết</th>
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
                            <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idTin=<?php echo $row[idTin]?>></td>                                 
                                <td align="left"><?php echo $row[TieuDe]?> </td>    
                                <td><img src="<?php echo $row[UrlHinh]?>" alt="<?php echo $row[TieuDe]?>" title="" border="0" width="80" height="80"></td>
                               
                                <td><a href="index.php?com=tin_edit&idTin=<?php echo $row[idTin]?>"><img src="img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td><img onclick="return confirm('Bạn có chắc chắn xóa ?');" class="linkxoa" idTin=<?php echo $row[idTin]?> src="img/icons/trash.png" alt="" title="" border="0"></td>
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
