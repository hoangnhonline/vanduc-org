<?php 
$idND = $_GET[idND];settype($idND,"int");
$chitiet = $t->NoiDung_ChiTiet($idND);
$row = mysql_fetch_assoc($chitiet);

?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>

<form action="" method="post" name="form_add_dm_ks">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý nội dung: cập nhật <?php echo $row['Ten']; ?></h3>
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
	
    <div id="main_details" style="clear:both;padding-top: 20px">
        <?php 
        if(isset($_POST[btnSumit])){		
                $thanhcong = $t->NoiDung_Sua($idND,&$loi);	
                echo "<h3 style='color:blue'>Cập nhật thành công !</h3>";
        }else{
        ?>
        <fieldset class="details_form">
        	<legend>++ Nội dung ++</legend>
            <table>                      
                <tr>
                    <td>Chi tiết</td>
                    <td><div style="width:800px;overflow: hidden">
                        <textarea class="meta" name="NoiDung" id="NoiDung"><?php echo $row[NoiDung]?></textarea>
                        <script type="text/javascript">
                        var editor = CKEDITOR.replace( 'NoiDung',{
                            uiColor : '#9AB8F3',
                            language:'vi',
                            skin:'office2003',
                            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
                            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
                            filebrowserImageUploadUrl :'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                            toolbar:[
                            ['Source','-','Save'],
                            ['Copy','Paste','PasteText','PasteFromWord'],
                            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                            ['NumberedList','BulletedList'],
                            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                            ['Link','Unlink','Anchor','Image'],                           
                            ['Styles','Format','Font','FontSize'],
                            ['TextColor','BGColor']     
                            ]
                        });		
                        </script>
                        </div>
                    </td>                        
                </tr>                                   
            </table>
        </fieldset>
        <?php } ?>
    </div>
   
    <div class="clr"></div>
</div>
</form>