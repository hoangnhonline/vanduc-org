<?php
/*
$realm = 'Restricted area';

//user => password
$users = array('admin' => 'vanducthichtinhnhon');


if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

    die('Text to send if user hits Cancel button');
}


// analyze the PHP_AUTH_DIGEST variable
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Wrong Credentials!');


// generate the valid response
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
    die('Wrong Credentials!');
// function to parse the http auth header
function http_digest_parse($txt)
{
    // protect against missing data
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
}
*/
?>
<?php ob_start();
	session_start();
	require_once "checkLogin.php";
	require_once("lib/classQuanTri.php");	
	require_once("lib/class.theloai.php");	
	require_once("lib/class.loaitin.php");
	require_once("lib/class.tin.php");
	require_once("lib/class.user.php");
	$tl = new theloai;
	$lt = new loaitin;
	$qt = new quantri;
	$t = new tin;
	$u = new users;
	$com='';
    if(isset($_GET['com']))
    {
   	    $com = $_GET['com'];
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản trị</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
</head>

<body>
<div id="wrapper" style="background-color:#FFF;min-height:600px;margin-top:20px;border-radius:  10px 10px 10px 10px;">
	<div id="header" style="clear:both;background-color:#FFF">
    	<div style="float:left;width:30%"></div>
        <div style="float:left;width:40%;"><h1 style="margin-left:50px">QUẢN TRỊ WEBSITE</h1></div>
        <div id="chao" style="width:30%;float:right;color:#F3C">
        	<span>Chào Admin <?php echo $_SESSION[kt_HoTen] ?>
            </span>
             <div id="thoat"><a href="thoat.php" style="color:#00C">Thoát</a> </div>
           </div>
    </div>
    <div style="clear:both"></div>
    <div id="thanhmenu" style="margin-bottom:20px"><?php include 'blocks/layout/menu.php';?></div>
    <div id="content">
     	<?php		   	
		if ($com=="") include "blocks/tin/tin_list.php";	
		elseif ($com=="theloai_add") include "blocks/theloai/theloai_add.php";
		elseif ($com=="theloai_edit") include "blocks/theloai/theloai_edit.php";
		elseif ($com=="theloai_list") include "blocks/theloai/theloai_list.php";
			
		elseif ($com=="map_add") include "blocks/map/map_add.php";
		elseif ($com=="map_edit") include "blocks/map/map_edit.php";
		elseif ($com=="map_list") include "blocks/map/map_list.php";
		
		elseif ($com=="loaitin_add") include "blocks/loaitin/loaitin_add.php";
		elseif ($com=="loaitin_edit") include "blocks/loaitin/loaitin_edit.php";
		elseif ($com=="loaitin_list") include "blocks/loaitin/loaitin_list.php";
		
		elseif ($com=="pt_add") include "blocks/phuongthuc/pt_add.php";
		elseif ($com=="pt_edit") include "blocks/phuongthuc/pt_edit.php";
		elseif ($com=="pt_list") include "blocks/phuongthuc/pt_list.php";	
		
		elseif ($com=="tin_add") include "blocks/tin/tin_add.php";	
		elseif ($com=="tin_edit") include "blocks/tin/tin_edit.php";
		elseif ($com=="tin_list") include "blocks/tin/tin_list.php";
		elseif ($com=="donhang_list") include "blocks/donhang/donhang_list.php";
		elseif ($com=="donhang_chitiet") include "blocks/donhang/donhang_ct.php";
		elseif ($com=="thongbao_list") include "blocks/thongbao/thongbao_list.php";	
		
		elseif ($com=="trangdon_list") include "blocks/trangdon/trangdon_list.php";
		elseif ($com=="trangdon_edit") include "blocks/trangdon/trangdon_edit.php";	
			
		elseif ($com=="user_list") include "blocks/user/user_list.php";
		elseif ($com=="user_edit") include "blocks/user/user_edit.php";	
		elseif ($com=="user_add") include "blocks/user/user_add.php";	
		
		elseif ($com=="duyet_list") include "blocks/duyet/duyet_list.php";	
		elseif ($com=="duyet_add") include "blocks/duyet/duyet_add.php";
		
		elseif ($com=="noidung_edit") include "blocks/noidung/noidung_edit.php";
		
		?>       
    </div>
</div>
</body>
</html>