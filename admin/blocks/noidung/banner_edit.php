<?php 
$rs1 = mysql_query("SELECT * FROM noidung WHERE idND = 3");
$row1= mysql_fetch_assoc($rs1);

$rs2 = mysql_query("SELECT * FROM noidung WHERE idND = 4");
$row2= mysql_fetch_assoc($rs2);
?>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<form action="" method="post" name="form_add_dm_tour">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý banner trượt 2 bên</h3>
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
        <?php 
        if(isset($_POST[btnSumit])){
                $thanhcong = $t->Banner_Edit();	
                
                echo "<h3 style='color:blue'>Cập nhật thành công !</h3>";
               
        }else{
        ?>    
    	<fieldset>
        	<legend>Thông tin chi tiết</legend>
            	<table>                	
                    <tr id="tr_hinh">
                        <td>Banner trái</td>
                        <td><input type="text" name="UrlHinh_Trai" id="UrlHinh_Trai" class="tf" value="<?php echo $row1[NoiDung]?>"/>
                            <input type="button" name="btnChonFile" value="Chọn hình" onclick="BrowseServer('Images:/','UrlHinh_Trai')"  />                          
                        </td>                        
                    </tr>  
                     <tr id="tr_hinh">
                        <td>Banner phải</td>
                        <td><input type="text" name="UrlHinh_Phai" id="UrlHinh_Phai" class="tf" value="<?php echo $row2[NoiDung]?>"/>
                            <input type="button" name="btnChonFile" value="Chọn hình" onclick="BrowseServer('Images:/','UrlHinh_Phai')"  />
                           
                        </td>                        
                    </tr> 
                </table>
            
        </fieldset>
            <?php } ?>
    </div>
	
  
    <div class="clr"></div>
</div>
</form>