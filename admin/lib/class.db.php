<?php 
session_start();
class db{   
    private $host = "mysql.onehost.vn";
	private $db = "thietken_vanduc";
	function __construct(){
		//mysql_connect("mysql.onehost.vn","tindulich","datviet009");
		mysql_connect("mysql.onehost.vn","thietken_vanduc","ht24112011");
		mysql_select_db($this->db) or die("Can't connect database");
		mysql_query("SET NAMES 'utf8'") or die(mysql_error());	
	}
	function processData($str)
	{
		$str=trim(strip_tags($str));	
		if (get_magic_quotes_gpc()== false) {
			$str = mysql_real_escape_string($str);			
		}
		return $str;
	}	
	function getInfoSeo($table,$pk,$id){
		$sql = "SELECT Title ,MetaD,MetaK FROM $table WHERE $pk = '$id'";
		$rs = mysql_query($sql);
		$row = mysql_fetch_assoc($rs);
		$data = array($row[Title],$row[MetaD],$row[MetaK]);
		return $data;
	}
		
	function string_limit($str,$limit){
		if (strlen($str) <= $limit) { 
			$str = $str;
		} 
		else { 
			$str = wordwrap($str,$limit); 
			$str = substr($str, 0, strpos($str, "\n"));					
		} 		
		return $str;	
	}
	
	function phantrang($page,$page_show,$total_page,$link){
		$dau=1;
		$cuoi=0;
		$dau=$page - floor($page_show/2);		
		if($dau<1) $dau=1;	
		$cuoi=$dau+$page_show;
		if($cuoi>$total_page)
		{
			
			$cuoi=$total_page+1;
			$dau=$cuoi-$page_show;
			if($dau<1) $dau=1;
		}
		echo "<div id='thanhphantrang'>";
		if($page > 1){
			($page==1) ? $class = " class='selected'" : $class="" ;	
			echo "<a".$class." href=".$link."&page=1>Đầu</a>"	;							
		}
		for($i=$dau; $i<$cuoi; $i++)
		{
			($page==$i) ? $class = " class='selected'" : $class="" ;		
			echo "<a".$class." href=".$link."&page=$i>$i</a>";			
		}
		if($page < $total_page) { 
			($page==$total_page) ? $class = " class='selected'" : $class="" ;		
			echo "<a".$class." href=".$link."&page=$total_page>Cuối</a>";
		}
		echo "</div>";
	}
	function phantrang2($page,$page_show,$total_page,$link){
		$dau=1;
		$cuoi=0;
		$dau=$page - floor($page_show/2);		
		if($dau<1) $dau=1;	
		$cuoi=$dau+$page_show;
		if($cuoi>$total_page)
		{
			
			$cuoi=$total_page+1;
			$dau=$cuoi-$page_show;
			if($dau<1) $dau=1;
		}
		echo "<div id='thanhphantrang'>";
		if($page > 1){
			($page==1) ? $class = " class='selected'" : $class="" ;	
			echo "<a".$class." href=".$link."1.html>Đầu</a>"	;							
		}
		for($i=$dau; $i<$cuoi; $i++)
		{
			($page==$i) ? $class = " class='selected'" : $class="" ;		
			echo "<a".$class." href=".$link."$i.html>$i</a>";			
		}
		if($page < $total_page) { 
			($page==$total_page) ? $class = " class='selected'" : $class="" ;		
			echo "<a".$class." href=".$link."$total_page.html>Cuối</a>";
		}
		echo "</div>";
	}
    function ThuTuMax($table)
    {
        $sql = "SELECT MAX(ThuTu) as max FROM $table";
        $rs = mysql_query($sql);
        $row = mysql_fetch_assoc($rs);
        return $row[max];
        
    }
	
	function LayThuTuLen($table,$ThuTu){
		$sql = "SELECT MAX(ThuTu) as ThuTu_Len FROM $table WHERE ThuTu < $ThuTu";
		$rs = mysql_query($sql);
		$row = mysql_fetch_assoc($rs);
		return $row[ThuTu_Len];
	}
	function LayThuTuXuong($table,$ThuTu){
		$sql = "SELECT MIN(ThuTu) as ThuTu_Xuong FROM $table WHERE ThuTu > $ThuTu";
		$rs = mysql_query($sql);
		$row = mysql_fetch_assoc($rs);
		return $row[ThuTu_Xuong];
	}
	function LayId_DuaVaoThuTu($table,$tencot,$ThuTu)
	{
		$sql = "SELECT  $tencot  FROM $table WHERE ThuTu = $ThuTu";
		$rs = mysql_query($sql);
		$row = mysql_fetch_assoc($rs);
		return $row[$tencot];
	}
	function ThuTuMin($table)
    {
        $sql = "SELECT MIN(ThuTu) as ThuTuMin FROM $table";
        $rs = mysql_query($sql);
        $row = mysql_fetch_assoc($rs);
        return $row[ThuTuMin];
        
    }
	
	function cat_gioi_han($str,$so_ky_tu){
		if(strlen($str) <= $so_ky_tu){
			$str = $str;
		}else{
			$str = wordwrap($str,$so_ky_tu); 
			$str = substr($str, 0, strpos($str, "\n"))."...";
		}
		return $str;
	}
	function LayIdBV($table,$TieuDe_KD){
		$sql = "SELECT idBV FROM $table WHERE TieuDe_KD = '$TieuDe_KD'";
		$rs = mysql_query($sql);
		$row = mysql_fetch_assoc($rs);
		return $row[idBV];
		
	}
  
	function changeTitle($str){
		$str = $this->stripUnicode($str);
		$str = str_replace("?","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);		
		$str = str_replace("  "," ",$str);
		$str = trim($str);
		$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","-",$str);
		$str = str_replace("---","-",$str);
		$str = str_replace("--","-",$str);
		$str = str_replace('"','',$str);
		$str = str_replace('"',"",$str);	
		$str = str_replace(":","",$str);
		$str = str_replace("(","",$str);
		$str = str_replace(")","",$str);
		$str = str_replace(",","",$str);
		$str = str_replace(".","",$str);
		$str = str_replace("%","",$str);
		return $str;
	}
	function stripUnicode($str){
	  if(!$str) return false;
	   $unicode = array(
		 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		 'd'=>'đ',
		 'D'=>'Đ',
		 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		  'i'=>'í|ì|ỉ|ĩ|ị',	  
		  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		 ''=>'?',
		 '-'=>'/'
	   );
	   foreach($unicode as $khongdau=>$codau) {
			$arr=explode("|",$codau);
		  $str = str_replace($arr,$khongdau,$str);
	   }
	return $str;
	}
	
	function smtpmailer($to, $from, $from_name, $subject, $body) { 
        global $error;
        $mail = new PHPMailer(); 
        $mail->IsSMTP(); 
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465; 
        $mail->Username = GUSER;  
        $mail->Password = GPWD;           
        $mail->SetFrom($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
		$mail->CharSet="utf-8";
        $mail->IsHTML(true);
        $mail->AddAddress($to);
        if(!$mail->Send()) {
            $error = 'Gởi mail bị lỗi : '.$mail->ErrorInfo; 
            return false;
        } else {
            $error = 'Thư của bạn đã được gởi đi !';
            return true;
        }
    }
	
	function insert($table,$data = array()){
		$key = "";
		$value = "";
		foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . $v  ."'";
		}
		echo $key."<br />";
		echo $value;
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$this->sql = "insert into ".$table.$key." values ".$value;
		$this->query();
		$this->insert_id = mysql_insert_id();
		return $this->result;
	}
	
	function update($data = array()){
		$values = "";
		foreach($data as $k => $v){
			$values .= ", " . $k . " = '" . $v  ."' ";
		}
		if($values{0} == ",") $values{0} = " ";
		$this->sql = "update " . $this->refix . $this->table . " set " . $values;
		$this->sql .= $this->where;
		return $this->query();
	}
	
	function delete(){
		$this->sql = "delete from " . $this->refix . $this->table . $this->where;
		return $this->query();
	}
	
	function select($str = "*"){
		$this->sql = "select " . $str;
		$this->sql .= " from " . $this->refix .$this->table;
		$this->sql .=  $this->where;
		$this->sql .=  $this->order;
		$this->sql .=  $this->limit;
		return $this->query();
	}
	function GetCat($id)
	{
			$sql ="SELECT ten_kd FROM table_product_cat WHERE id=$id";
			$rs=mysql_fetch_assoc(mysql_query($sql));
			return $rs[ten_kd];
	}
	function GetItem($id)
	{
			$sql ="SELECT ten_kd FROM table_product_item WHERE id=$id";
			$rs=mysql_fetch_assoc(mysql_query($sql));
			return $rs[ten_kd];
	}
	function GetDesc($table,$ten_kd){
		$sql = "SELECT descs FROM $table WHERE ten_kd = '$ten_kd'";
		$rs=mysql_fetch_assoc(mysql_query($sql));
		return $rs[descs];
	}
	function GetTitle($table,$ten_kd){
		$sql = "SELECT ten FROM $table WHERE ten_kd = '$ten_kd'";
		$rs=mysql_fetch_assoc(mysql_query($sql));
		return $rs[ten];
	}
	function GetKeys($table,$ten_kd){
		$sql = "SELECT keywords FROM $table WHERE ten_kd = '$ten_kd'";
		$rs=mysql_fetch_assoc(mysql_query($sql));
		return $rs[keywords];
	}
	public function Login(){
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		if (get_magic_quotes_gpc()== false) {
			$email = trim(mysql_real_escape_string($email));
			$password = trim(mysql_real_escape_string($password));
		}	
		//$sql = sprintf("SELECT * FROM users WHERE email='%s' AND password ='%s'", $email, $password);
		//$user = mysql_query($sql) or die(mysql_error());	
		if ($email=="admin@vanduc.org" && $password=="vanducthichtinhnhon") {//successd
	
			//$row_user = mysql_fetch_assoc($user);
			$_SESSION['kt_login_id'] = 'admin@deal24g.com';	
			
			header("location:index.php");			
		} else  header("location:dangnhap.php"); //fail
	} 
    function tien_te($number){
		return number_format($number,0,",",".");
	}
	function checkTagTonTai($tag){
		$sql = "SELECT tag_id FROM tag WHERE BINARY tag_name LIKE '%$tag%'";
		$rs = mysql_query($sql);
		$row = mysql_num_rows($rs);
		if($row == 1){
			$row = mysql_fetch_assoc($rs);
			$idTag = $row[tag_id];
		}else{
			$tag_kd = $this->changeTitle($tag);
			$idTag = $this->insertTag($tag,$tag_kd);
		}
		return $idTag;
	}
	function insertTag($tag,$tag_kd){
		$sql = "INSERT INTO tag VALUES (NULL,'$tag','$tag_kd')";
		$rs = mysql_query($sql);
		$id= mysql_insert_id();
		return $id;			
	}
	function addTagToArticle($sp_id,$tag_id){
		$sql = "INSERT INTO sp_tag VALUES ($sp_id,$tag_id)";
		mysql_query($sql) or die(mysql_error().$sql);
	}
}
?>