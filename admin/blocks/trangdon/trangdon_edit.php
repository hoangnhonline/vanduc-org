<?php
$idTrangDon= $_GET[idTrangDon];
settype($idTrangDon,"int");
$chitiet = $tp->TrangDon_ChiTiet($idTrangDon);
$row = mysql_fetch_assoc($chitiet);

if(isset($_POST[btnSumit])){
	$thanhcong = $tp->TrangDon_Sua($idTrangDon,$loi);	
	if($thanhcong==true){
		header("location:?com=trangdon_list");
	}
}
?>
<script type="text/javascript">

	$(document).ready(function(){
		$("input[name=TieuDe]").blur(function(){
			var TieuDeKS= $(this).val();
			$.post("blocks/ajax.php",{str:TieuDeKS},function(data){				
				$("input[name=TieuDe_KD]").val(data);
			})
		})
       
		
	})
</script>
<form action="" method="post" name="form_add_dm_ks">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý trang đơn : cập nhật</h3>
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
        	<legend>Thông tin chính</legend>
            	<table>
                   
                    <tr class="left">
                    	<td>Tiêu đề</td>
                        <td><input type="text" name="TieuDe" id="TieuDe" class="tf" value="<?php echo $row[TieuDe]?>" />
                        	<span class="error"><?php echo $loi[TieuDe];?></span>
                        </td>                        
                    </tr>
                    <tr class="left">
                    	<td>Tiêu đề KD</td>
                        <td><input type="text" name="TieuDe_KD" id="TieuDe_KD" class="tf" value="<?php echo $row[TieuDe_KD]?>"/></td>                        
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
                    <td><input type="text" name="Title" id="Title" class="tf" value="<?php echo $row[Title]?>" /></td>                        
                </tr>
                <tr>
                    <td>Meta Description</td>
                    <td><textarea class="meta" name="MetaD"><?php echo $row[MetaD]?></textarea></td>                        
                </tr>
                <tr>
                    <td>Meta Keyword</td>
                    <td><textarea class="meta" name="MetaK"><?php echo $row[MetaK]?></textarea></td>                        
                </tr>                    
            </table>
        </fieldset>
    </div>
    <div id="main_details" style="clear:both;padding-top: 20px">
        <fieldset class="details_form">
        	<legend>Thông tin chi tiết</legend>
            <table>            
               
                <tr>
                    <td>Nội dung</td>
                    <td><div style="width:800px;overflow: hidden">
                        <textarea class="meta" name="NoiDung" id="NoiDung"><?php echo $row[NoiDung]?></textarea>
                        <script type="text/javascript">
                        var editor = CKEDITOR.replace( 'NoiDung',{
                            uiColor : '#9AB8F3',
                            language:'vi',
							height:300,
                            skin:'office2003',                            
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
            </table>
        </fieldset>
        
    </div>
   
    <div class="clr"></div>
</div>
</form>