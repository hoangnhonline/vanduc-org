<?php
ob_start();
class db {
	public $conn = NULL;
	public $result = NULL;
	public $host="localhost";
	public $user="cuacuonc_mrhoang";
	public $pass="15789hoang";
	public $database="cuacuonc_mrhoang";
    
	function __construct(){
		$this->conn = mysql_connect($this->host, $this->user, $this->pass) or die(mysql_error());
		mysql_select_db($this->database,$this->conn) or die(mysql_error());
		mysql_query("set names 'utf8'"); 	 
	}		
    
	public function Login(){
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		if (get_magic_quotes_gpc()== false) {
			$email = trim(mysql_real_escape_string($email));
			$password = trim(mysql_real_escape_string($password));
		}	
		$sql = sprintf("SELECT * FROM users WHERE email='%s' AND password ='%s'", $email, $password);
		$user = mysql_query($sql) or die(mysql_error());	
		if (mysql_num_rows($user)==1) {//success
			$row_user = mysql_fetch_assoc($user);
			$_SESSION['kt_login_id'] = $row_user['idUser'];			
			$_SESSION['kt_HoTen'] = $row_user['HoTen'];
			$_SESSION['kt_idGroup'] = $row_user['idGroup'];
			if (isset($_POST['nho'])== true){
				setcookie("email", $_POST['email'], time() + 60*60*24*7 );
				setcookie("pw", $_POST['password'], time() + 60*60*24*7 );
			} else {
				setcookie("email", $_POST['email'], -1);
				setcookie("pw", $_POST['password'], -1);
		  	}	
			
			header("location: mainquantri.php");			
		} else  header("location: dangnhap.php"); //fail
	} //function Login
   

} //class db
?>