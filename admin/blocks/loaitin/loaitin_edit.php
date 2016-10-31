<?php 
$idLT = $_GET[idLT];settype($idLT,"int");
$chitiet = $lt->LoaiTin_ChiTiet($idLT);
$row= mysql_fetch_assoc($chitiet);
if(isset($_POST[btnSumit])){
	$thanhcong = $lt->LoaiTin_Edit($idLT,$loi);	
	if($thanhcong==true){
		header("location:?com=loaitin_list");
	}
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("input[name=TenLT]").blur(function(){
			var TenLT= $(this).val();
			$.post("blocks/ajax.php",{str:TenLT},function(data){				
				$("input[name=TenLT_KD]").val(data);
			})
		})		
	})
</script>
<form action="" method="post" name="form_add_dm_tour">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý chuyên mục : cập nhật</h3>
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
	
	<div id="main_left">
    	<fieldset>
        	<legend>Thông tin chi tiết</legend>
            	<table>
                	                    
                    <tr class="left">
                    	<td>Tên chuyên mục</td>
                        <td><input type="text" name="TenLT" id="TenLT" class="tf" value="<?php echo $row[TenLT];?>" />
                        	<span class="error"><?php echo $loi[TenLT];?></span>
                        </td>                        
                    </tr>
                    <tr class="left">
                    	<td>Tên chuyên mục KD</td>
                        <td><input type="text" name="TenLT_KD" id="TenLT_KD" class="tf" value="<?php echo $row[TenLT_KD];?>"/></td>                        
                    </tr>
                    <tr>
                   	  <td class="left">&nbsp;</td>
                        <td>&nbsp;
                         
                        </td>                        
                    </tr>
                </table>
            
        </fieldset>
    </div>
	<div id="main_right">
    	<fieldset class="details_form">
        	<legend>Metadata</legend>
            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="Title" id="Title" class="tf" value="<?php echo $row[Title];?>" /></td>                        
                </tr>
                <tr>
                    <td>Meta Description</td>
                    <td><textarea class="meta" name="MetaD"><?php echo $row[MetaD];?></textarea></td>                        
                </tr>
                <tr>
                    <td>Meta Keyword</td>
                    <td><textarea class="meta" name="MetaK"><?php echo $row[MetaK];?></textarea></td>                        
                </tr>                    
            </table>
        </fieldset>
    </div>
  
    <div class="clr"></div>
</div>
</form>