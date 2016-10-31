<?php 
session_start();
require_once "admin/lib/class.db.php";
$d = new db;
$com = $_GET['com'];
switch($com){
	 case "contact":              
        $title = "Liên hệ chùa Vạn Đức";
        $metaD = "Liên hệ chùa Vạn Đức";
        $metaK = "Liên hệ chùa Vạn Đức";   
        break;
	case "about":
		$title = "Giới thiệu chùa Vạn Đức";
        $metaD = "Giới thiệu chùa Vạn Đức";
        $metaK = "Giới thiệu chùa Vạn Đức";        
        break;		
    case "cat":
        $idLT = $_GET['idc'];
        $page =  ($_GET['page'] > 0)  ? $_GET['page'] : 1;
        $data = $d->getInfoSeo("loaitin","idLT",$idLT);
        $title = $data[0];
        $metaD = $data[1];
        $metaK = $data[2];       
        break;  
    case "detail":
        $idTin = $_GET['id'];  
		$data = $d->getInfoSeo("tin","idTin",$idTin);
        $title = $data[0];
        $metaD = $data[1];
        $metaK = $data[2];         
        break;
   
    default :
		$title ="Chùa Vạn Đức TP Hồ Chí Minh"; 
		$metaD ="Những lời Kinh tiếng Kệ, câu pháp ngữ nhẹ nhàng, chính là sợi dây kết nối tất cả mọi người chúng ta lại với nhau từ mọi miền trên trái đất này, thấm đượm trong niềm an lạc. Mỗi ngày qua đi là mỗi ngày chúng ta hoàn thiện hạnh nguyện, từng bước chân đến dần bến bờ hạnh phúc tuyệt đối."; 
		$metaK ="Phật Học, Phật Pháp,Kinh, Bài Giảng, Pháp Âm, Văn Học, Tùy Bút";
        break;
        
}
?>