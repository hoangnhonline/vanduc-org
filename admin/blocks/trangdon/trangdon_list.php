<?php

$baiviet= $tp->TrangDon_List();

?>
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý trang đơn</h3>
    </div>    
		
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div>
    	<fieldset>
        	<legend>++ Danh sách ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corner" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                           
                            <tr class="tieudetable">
                                <th scope="col" class="rounded-company"></th>
                                <th scope="col" class="rounded" align="left">Tiêu đề</th>  
                                <th scope="col" class="rounded">Tiêu đề KD</th> 
                                <th scope="col" class="rounded">Sửa</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
                        $i=0;
                       while($row = mysql_fetch_assoc($baiviet)){                      
					   $i++;
                        ?>	
                            <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idSP=<?php echo $row[idTrangDon]?>></td>                                         
                                <td align="left"><?php echo $row[TieuDe]?></td>    
                                  
                                                         
                                <td><?php echo $row[TieuDe_KD]?></td>
                               
                                <td><a href="index.php?com=trangdon_edit&idTrangDon=<?php echo $row[idTrangDon]?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                               
                            </tr>
                        <?php } ?>                        
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
