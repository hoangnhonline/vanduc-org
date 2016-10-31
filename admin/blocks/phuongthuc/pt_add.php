<?php 
if(isset($_POST[btnSumit])){
	$thanhcong = $pt->PhuongThuc_Them($loi);	
	if($thanhcong==true){
		header("location:?com=pt_list");
	}
}
?>

<form action="" method="post" name="form_add_dm_tour">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý phương thức : Thêm mới</h3>
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
                    	<td>Tên phương thức</td>
                        <td><input type="text" name="TenPT" id="TenPT" class="tf" />
                        	<span class="error"><?php echo $loi[TenPT];?></span>
                        </td>                        
                    </tr>
                   
                </table>
            
        </fieldset>
    </div>
  
    <div class="clr"></div>
</div>
</form>