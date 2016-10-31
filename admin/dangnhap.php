<?php 
session_start(); 
require "lib/class.db.php";
$d =  new db;
if (isset($_POST['btnLog'])==true){	
	$d->Login();
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style>
#tbldn    { border:solid 3px #036; color:#036;  font-weight:bold }
#tbldn th { background-color:#036; color:#6FC; padding:5px}
#email, #password{ 	background-color:#036; color:#6FF; padding:3px;
					border:solid 1px #990; width:280px;}
#btnLog{ background-color:#036; color:#6FF; width:120px; 
		  padding:3px; border:solid 1px #6FF}
#error { color: red; font-size: 16px; margin-bottom: 15px;}
</style>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table id=tbldn width=400 border=0 align=center cellpadding=4 cellspacing=0>
<tr> <th colspan="2" align="center">ÐĂNG NHẬP</th> </tr>
<tr>
    <td>Email</td>
    <td><input type="text" name="email" id="email" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'];?>" /></td>
</tr>
<tr><td>Password</td>
    <td><input type="password" name="password" id="password" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['pw'];?>" /></td>
</tr>	
<tr><td>&nbsp;</td>
    <td> 
		<input type="submit" name="btnLog" id="btnLog" value="Đăng nhập"/>
	<input type="checkbox" name="nho" id="nho" /> Ghi nhớ
   </td>
</tr>
</table>
</form>

</body>
</html>
