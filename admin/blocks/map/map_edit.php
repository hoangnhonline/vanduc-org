<?php 
$idMap = $_GET[idMap];settype($idMap,"int");
$chitiet = $map->Map_ChiTiet($idMap);
$row= mysql_fetch_assoc($chitiet);
if(isset($_POST[btnSumit])){
	$thanhcong = $map->Map_Edit($idMap,$loi);	
	if($thanhcong==true){
		header("location:?com=map_list");
	}
}
?>

<form action="" method="post" name="form_add_dm_tour">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý bản đồ : Cập nhật</h3>
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
                   	  <td>Tên doanh nghiệp</td>
                      <td><input type="text" name="TenDN" id="TenDN" class="tf" value="<?php echo $row[TenDN];?>" />
                       	  <span class="error"><?php echo $loi[TenDN];?></span>
                      </td>                        
                  </tr>
                 
                     
                  <tr>
                      <td colspan="2" class="left"><a style="text-decoration:none; color:#666" target="_blank" href="http://vitri.com.vn/gps_location.php">Click vào đây lấy tọa độ</a></td>
                </tr>
                  <tr>
               	    <td class="left">Kinh độ ( Lng )</td>
                      <td>
                        <input type="text" name="KinhDo" id="KinhDo" class="tf" value="<?php echo $row[KinhDo];?>"/>
                    </td>                        
                  </tr>
                  <tr>
               	    <td class="left">Vĩ độ (Lat )</td>
                      <td>
                        <input type="text" name="ViDo" id="ViDo" class="tf" value="<?php echo $row[ViDo];?>"/>
                    </td>                         
                </tr>
              </table>
            
        </fieldset>
    </div>
	<div class="clr"></div>
      <div id="main_details" style="clear:both;padding-top: 20px">
      <fieldset>
        	<legend>Thông tin chi tiết</legend>
            	<table>
                	               
                    
                    <tr class="left">
                    	<td>Thông tin</td>
                        <td><div style="width:800px;overflow: hidden">
                        <textarea class="meta" name="ThongTin" id="ThongTin"  ><?php echo $row[ThongTin];?></textarea>
                        
                         <script type="text/javascript">
                        var editor = CKEDITOR.replace( 'ThongTin',{
                            uiColor : '#9AB8F3',
                            language:'vi',
                            skin:'office2003',
                            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
                            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
                            filebrowserImageUploadUrl :'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

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
                        </script></div></td>                        
                    </tr>
                     
               
                </table>
            
        </fieldset>
      </div>
</div>
</form>