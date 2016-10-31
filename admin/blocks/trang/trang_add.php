<?php 

if(isset($_POST[btnSumit])){	
	$thanhcong = $trang->Trang_Them($loi);	
	if($thanhcong==true){
		header("location:?com=trang_list");
	}
}
?>
<script type="text/javascript">
	$(document).ready(function(){		
		$("#idSach").change(function(){			
			var idSach = $(this).val();
			$('#idDM').load('blocks/ajax_laydanhmuctrang.php?idSach=' + idSach);
		})
		$("#idML").change(function(){				
			$("select[name=idSach]").load("blocks/ajax_laysach.php?idML="+ $(this).val());
		})
	});

</script>
<form action="" method="post" name="form_add_dm_ks">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý trang : Thêm mới</h3>
    </div>    
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div id="main_left">
    	<fieldset>
        	<legend>Thông tin chi tiết</legend>
            	<table>
                	<tr class="left">
                    	<td>Thư mục</td>
                        <td>
							<select name='idML' id="idML">
								<option value='0'>Thư mục</option>
								<?php $MucLuc = $ml->MucLuc_List();
								while($row =  mysql_fetch_assoc($MucLuc)){
								?>
								<option <?php if($row_ct['idML']==$row[idML]) echo "selected"; ?> value='<?php echo $row[idML]?>'><?php echo $row['TenMucLuc']; ?></option>
								<?php } ?>
							</select>
                        </td>                        
                    </tr> 
					<tr class="left">
                    	<td>Tên sách</td>
                        <td>
							<select name='idSach' id="idSach">
								<option value='0'>Chọn sách</option>
								<?php $sach = $s->Sach_List();
								while($row =  mysql_fetch_assoc($sach)){
								?>
								<option value='<?php echo $row[idSach]?>'><?php echo $row['TenSach']; ?></option>
								<?php } ?>
							</select>
                        </td>                        
                    </tr>     
                    <tr class="left">
                    	<td>Mục lục</td>
                        <td>
							<select name='idDM' id="idDM">
								<option value='0'>Chọn mục lục</option>
								<?php $danhmuc = $dm->DanhMuc_List();
								while($row =  mysql_fetch_assoc($danhmuc)){
								?>
								<option value='<?php echo $row[idDM]?>'><?php echo $row['DanhMuc']; ?></option>
								<?php } ?>
							</select>
                        </td>                             
                    </tr>     
                     <tr class="left">
                    	<td>Thứ tự trang</td>
                        <td><input type="text" name="ThuTu" id="ThuTu" class="tf" />
                        	<span class="error"><?php echo $loi[ThuTu];?></span>
                        </td>                        
                    </tr>     
                     <tr class="left">
                    	<td>Ghi chú</td>
                        <td><textarea id="GhiChu" name="GhiChu">
                        
                        </textarea>
                        </td>                        
                    </tr>
                               
                </table>
            
        </fieldset>
    </div>
	<div class="clear"></div>
    <div id="main_details" style="clear:both;padding-top: 20px">
        <fieldset class="details_form">
        	<legend>Thông tin chi tiết</legend>
            <table>              
                
                <tr>
                    <td>Nội dung</td>
                    <td><div style="width:900px;overflow: hidden">
                        <textarea class="meta" name="NoiDung" id="NoiDung"><?php echo $_POST[NoiDung]?></textarea>
                        <script type="text/javascript">
                        var editor = CKEDITOR.replace( 'NoiDung',{
                            uiColor : '#9AB8F3',
                            language:'vi',
                            skin:'office2003',
                           	height:300,
                            toolbar:[
                            ['Source','-','Save','NewPage','Preview','-','Templates'],
                            ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
                            ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                            ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
                            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                            ['Link','Unlink','Anchor'],
                            ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
                            ['Styles','Format','Font','FontSize'],
                            ['TextColor','BGColor'],
                            ['Maximize', 'ShowBlocks','-','About']
                            ]
                        });		
                        </script>
                        </div>
                    </td>                        
                </tr>       
                <tr>
                	<td colspan="2" align="center">
                    <div id="admin_navigation" style="padding-left:300px">
                    <div style="float:left;width:5%;padding-top:5px">
                        <input type="submit" class="save" name="btnSumit" value=""/><br />		
                        <span>Save</span>
                    </div>
                    <div style="float:left;width:5%;padding-top:5px;">
                        <input type="reset" class="cancel" name="btnCancel" value=""/><br />		
                        <span>Reset</span>
                        
                    </div>
                    </div>
                    </td>
                </tr>                            
            </table>
        </fieldset>
        
    </div>
   
    <div class="clr"></div>
</div>
</form>