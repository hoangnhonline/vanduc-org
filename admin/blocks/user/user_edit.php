<?php 
$idUser = $_GET[idUser];settype($idUser,"int");
$chitiet = $u->User_ChiTiet($idUser);
$row= mysql_fetch_assoc($chitiet);
if(isset($_POST[btnSumit])){
	$thanhcong = $u->User_Edit($idUser,$loi);	
	if($thanhcong==true){
		header("location:?com=user_list");
	}
}
?>

<form action="" method="post" name="form_add_dm_tour">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý user : cập nhật</h3>
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
                    	<td>Username</td>
                        <td><input type="text" name="Username" id="Username" class="tf" value="<?php echo $row[Username];?>" readonly="readonly" />
                        	<span class="error"><?php echo $loi[Username];?></span>
                        </td>                        
                    </tr>
                    <tr class="left">
                    	<td>Email</td>
                        <td><input type="text" name="Email" id="Email" class="tf" value="<?php echo $row[Email];?>"/></td>                        
                    </tr>
                     <tr class="left">
                    	<td>Điện thoại</td>
                        <td><input type="text" name="Dienthoai" id="Dienthoai" class="tf" value="<?php echo $row[Dienthoai];?>"/></td>                        
                    </tr>
                    <tr class="left">
                    	<td>Địa chỉ</td>
                        <td><textarea name="DiaChi"><?php echo $row[DiaChi]; ?></textarea></td>                        
                    </tr>
                     <tr class="left">
                    	<td>Giới tính</td>
                        <td> <label>
                            <input type="radio" name="GioiTinh" value="1" id="GioiTinh_1" <?php echo ($row[GioiTinh]==1) ? "checked" : "" ;?>  />
                           Nam</label>
                            <label>
                            <input type="radio" name="GioiTinh" value="0" id="GioiTinh_0" <?php echo ($row[GioiTinh]==0) ? "checked" : "" ; ?> />
                            Nữ</label></td>                        
                    </tr>
                     
                    <tr>
                   	  <td class="left">Active/Deactive</td>
                        <td>
                            <label>
                            <input type="radio" name="Active" value="1" id="Active_1" <?php echo ($row[Active]==1) ? "checked" : "" ;?>  />
                           Active</label>
                            <label>
                            <input type="radio" name="Active" value="0" id="Active_0" <?php echo ($row[Active]==0) ? "checked" : "" ; ?> />
                            Deactive</label>
                         
                        </td>                        
                    </tr>
                    <tr>
                   	  <td class="left">Group</td>
                        <td>
                            <label>
                            <input type="radio" name="idGroup" value="1" id="idGroup_1" <?php echo ($row[idGroup]==1) ? "checked" : "" ;?>  />
                           Ban quản trị</label>
                            <label>
                            <input type="radio" name="idGroup" value="0" id="idGroup_0" <?php echo ($row[idGroup]==0) ? "checked" : "" ; ?> />
                            Thành viên</label>
                         
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
	
  
    <div class="clr"></div>
</div>
</form>