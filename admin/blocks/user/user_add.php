<?php 
if(isset($_POST[btnSumit])){
	$thanhcong = $cl->ChungLoai_Them($loi);	
	if($thanhcong==true){
		header("location:?com=chungloai_list");
	}
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("input[name=TenCL]").blur(function(){
			var TenCL= $(this).val();
			$.post("blocks/ajax.php",{str:TenCL},function(data){				
				$("input[name=TenCL_KD]").val(data);
			})
		})		
	})
</script>
<form action="" method="post" name="form_add_dm_tour">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý chủng loại : Thêm mới</h3>
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
                    	<td>Tên chủng loại</td>
                        <td><input type="text" name="TenCL" id="TenCL" class="tf" />
                        	<span class="error"><?php echo $loi[TenCL];?></span>
                        </td>                        
                    </tr>
                    <tr class="left">
                    	<td>Tên chủng loại KD</td>
                        <td><input type="text" name="TenCL_KD" id="TenCL_KD" class="tf"/></td>                        
                    </tr>
                     
                    <tr>
                   	  <td class="left">Ẩn/Hiện</td>
                        <td>
                            <label>
                            <input type="radio" name="AnHien" value="1" id="AnHien_1"  checked="checked"/>
                           Hiện</label>
                            <label>
                            <input type="radio" name="AnHien" value="0" id="AnHien_0"  />
                            Ẩn</label>
                         
                        </td>                        
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
                    <td><input type="text" name="Title" id="Title" class="tf" /></td>                        
                </tr>
                <tr>
                    <td>Meta Description</td>
                    <td><textarea class="meta" name="MetaD"></textarea></td>                        
                </tr>
                <tr>
                    <td>Meta Keyword</td>
                    <td><textarea class="meta" name="MetaK"></textarea></td>                        
                </tr>                    
            </table>
        </fieldset>
    </div>
  
    <div class="clr"></div>
</div>
</form>