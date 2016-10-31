<?php 
$loai = $lt->LoaiTin_List();

if(isset($_POST[btnSumit])){		
	$thanhcong = $t->Tin_Them($loi);	
	if($thanhcong==true){
		
		header("location:?com=tin_list");
	}
}
?>
<link href="css/ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    var debounce =  function(func, wait, immediate) {
    var timeout, result;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) result = func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) result = func.apply(context, args);
      return result;
    };
  };
    
    
	$(document).ready(function(){       
		$("input[name=TieuDe]").blur(function(){
			var TieuDe= $(this).val();
			$.post("blocks/ajax.php",{str:TieuDe},function(data){				
				$("input[name=TieuDe_KD]").val(data);
			})
		})
		$("#idTL").change(function(){
			var idTL= $(this).val();
			$.post("blocks/ajax_laylsp.php",{idTL:idTL},function(data){				
				$("#idLT").html(data);
			})
		})//check all		
		$('#tags').on("keydown", function (event) {
				if (event.keyCode === $.ui.keyCode.TAB && $(this).data("autocomplete").menu.active) {
					event.preventDefault();
				}
			}).autocomplete({
				source: debounce(function (request, response) {
					$.getJSON("ajax_tag.php", {
						term: extractLast(request.term)
					}, response);
				}, 500),
				search: function () {
					// custom minLength
					var term = extractLast(this.value);
					if (term.length < 2) {
						return false;
					}
				},
				focus: function () {
					// prevent value inserted on focus
					return false;
				},
				select: function (event, ui) {
					var terms = split(this.value);
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push(ui.item.value);
					// add placeholder to get the comma-and-space at the end
					terms.push("");
					this.value = terms.join("; ");
					return false;
				}
			});	
				
				
		$('#upload_images').ajaxForm({
     		beforeSend: function() {				
			},
			uploadProgress: function(event, position, total, percentComplete) {
				           
			},
			complete: function(data) {       
				var arrRes = JSON.parse(data.responseText); 
				alert(arrRes['thongbao']);
				$("#hinhanh").html(arrRes['text'] + arrRes['str_hinhanh']);
				$( "#div_upload" ).dialog('close');				
			}
    	}); 
		$("#btnUpload").click(function(){
			$("#div_upload" ).dialog({
				modal: true,
				title: 'Upload images',
				width: 350,
				draggable: true,
				resizable: false,
				position: "center middle"
			});
		});
		$("#add_images").click(function(){
			$( "#wrapper_input_files" ).append("<input type='file' name='images[]' /><br />");
		});
	});
function split(val) {
	return val.split(/;\s*/);
}

function extractLast(term) {
	return split(term).pop();
}	
</script>
<form action="" method="post" name="form_add_dm_ks">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>Quản lý bài viết: Thêm mới</h3>
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
        	<legend>Thông tin chung</legend>
            	<table>
                    <tr>
                    	<td class="left">Chuyên mục</td>
                        <td>
                          <select name="idLT" id="idLT">
                            	<option value="0">Chọn chủ đề</option>   
                                <?php                              
                                while($row_loai = mysql_fetch_assoc($loai)){
                                ?>
                                <option value="<?php echo $row_loai[idLT]?>"
                                <?php if($_POST[idLT]==$row_loai[idLT]) echo "selected"; ?>
                                >
                                    <?php echo $row_loai[TenLT];?>
                                </option>
                                <?php } ?>
                            </select>
                            <span class="error"><?php echo $loi[idLT];?></span>                      
                        </td> 
                    	                     
                    </tr>
                                                
                    <tr class="left">
                    	<td>Tiêu đề</td>
                        <td><input type="text" name="TieuDe" id="TieuDe" class="tf" value="<?php echo $_POST[TieuDe]?>" />
                        	<span class="error"><?php echo $loi[TieuDe];?></span>
                        </td>                        
                    </tr>
                    <tr class="left">
                    	<td>Tiêu đề KD</td>
                        <td>
                        	<input type="text" name="TieuDe_KD" id="TieuDe_KD" class="tf" value="<?php echo $_POST[TieuDe_KD]?>"/>				                        </td>                        
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
                    <td><input type="text" name="Title" id="Title" class="tf" value="<?php echo $_POST[Title]?>" /></td>                        
                </tr>
                <tr>
                    <td>Meta Description</td>
                    <td><textarea class="meta" name="MetaD"><?php echo $_POST[MetaD]?></textarea></td>                        
                </tr>
                 <tr>      
                	<td>Meta Keywords</td>             
                    <td><textarea class="meta" name="MetaK"><?php echo $_POST[MetaK]?></textarea></td>                        
                </tr>                    
            </table>
        </fieldset>
    </div>
    <div id="main_details" style="clear:both;padding-top: 20px">
        <fieldset class="details_form">
        	<legend>Thông tin chi tiết</legend>
            <table>
                          
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
                    <td>Tin nổi bật</td>
                    <td>                          
                        <label>
                        <input type="radio" name="NoiBat" value="0" id="NoiBat_1"  checked="checked"/>
                       Bình thường</label>
                        <label>
                        <input type="radio" name="NoiBat" value="1" id="NoiBat_0"  />
                        Nổi bật</label>
                    </td>                        
                </tr>                
                             
                <tr>
                    <td>Hình đại diện</td>
                    <td><input type="text" name="UrlHinh" id="UrlHinh" class="tf" value="<?php echo $_POST[UrlHinh]?>"/>
                        <input type="button" name="btnChonFile" value="Chọn hình" onclick="BrowseServer('Images:/','UrlHinh')"  />
                        <div id="preview">
                            <div id="thumbnails"></div>
                        </div>   
                        <span class="error"><?php echo $loi[UrlHinh];?></span>
                    </td>                        
                </tr>                    
            </table>
        </fieldset>
        
    </div>
    <div id="main_details" style="clear:both;padding-top: 20px">
        <fieldset class="details_form">
        	<legend>++ Nội dung bài viết ++</legend>
            <table>                          
                <tr>
                    <td>Mô tả</td>
                    <td>
                        <textarea style="height:100px;width:500px" class="meta" name="TomTat" id="TomTat" rows="10"><?php echo $_POST[TomTat]?></textarea>                       
                    </td>                        
                </tr>               
                
                <tr>
                    <td>Chi tiết</td>
                    <td><div style="width:800px;overflow: hidden">
                        <textarea class="meta" name="NoiDung" id="NoiDung"><?php echo $_POST[NoiDung]?></textarea>
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
        
    </div>
   
    <div class="clr"></div>
</div>
</form>
<script type="text/javascript" src="js/form.js"></script>
<script type="text/javascript" src="js/core.js"></script>
<script type="text/javascript" src="js/widget.js"></script>
<script type="text/javascript" src="js/custom.js"></script>