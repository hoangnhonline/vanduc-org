<?php 
include "config.php"; 
include "simplehtmldom/simple_html_dom.php"; 
function LuuTinVaoDB($tin, $url, $source){
	$tieude = trim(mysql_real_escape_string(strip_tags($tin['tieude'])));
	$tomtat = trim(mysql_real_escape_string(strip_tags($tin['tomtat'])));
	$urlhinh = trim(mysql_real_escape_string(strip_tags($tin['urlHinh'])));
	$content = trim(mysql_real_escape_string($tin['content']));

$sql = "SELECT idTin from tinmoi where urlGoc='{$url}'";
	$rs = mysql_query($sql) or die (mysql_error());
	if (mysql_num_rows($rs) >0 ) return false;	

	$sql="INSERT INTO tinmoi (TieuDe,TomTat,urlHinh, Content, urlGoc, Source, Ngay)
		VALUES ('$tieude','$tomtat','$urlhinh', '$content', '$url', '$source', Now())";
	mysql_query($sql) or die (mysql_error());
	return true;
}

function HCM24h_TrangChu($url) { 
    $linkarray=array(); 
    $html = file_get_html($url); 
	$urlphu = "http://hcm.24h.com.vn";
   
	
	foreach ($html->find("div.listNews ul li.lst-normal a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    }
	
	foreach ($html->find(".baiviet-TopContent .baiviet-title") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    } 
	foreach ($html->find(".div_title_news a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    } 
	
    foreach ($html->find(".baiviet-bailienquan a") as $link){             
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    }
     
    
    $html->clear(); 
    unset($html); 
    return $linkarray; 
} 
function HCM24h_Lay1Tin($urlwebsite,$url) { 
	
    $html = file_get_html($url); 
    $tin = array(); 
    $td = $html->find('h1.baiviet-title',0); 
    $tin['tieude']=$td->innertext; 
    $td->outertext=''; 
    $tt = $html->find('div.baiviet-head-noidung',0); 
    $tin['tomtat']=str_replace("(du lich) -","",$tt->innertext); 	
    $tt->outertext = ''; 
    $content = $html->find('div#baiviet-container div.text-conent',0);         
    
    $urlHinh = '';
	if ($content!=NULL)
	foreach( $content->find('img') as $img) {		
		if (substr($img->src,0,1) == "/") $img->src = $urlwebsite.$img->src;
		$tenfile = basename($img->src);
		$pathfile = "../hinh/".$tenfile;
		file_put_contents($pathfile, file_get_contents($img->src));
		$img->src = "../hinh/".$tenfile;		
		if($urlHinh=='') $urlHinh=$img->src;
	}
	$tin['content'] = $content->innertext;
    $tin['urlHinh'] = $urlHinh;

    $html->clear(); 
    unset($html); 
    return $tin; 
} 

function Zing_TrangChu($url) { 
    $linkarray=array(); 
    $html = file_get_html($url); 
	$urlphu = "http://news.zing.vn/choi-vui";
	
	foreach ($html->find(".cate_featured h2 a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    }
	
	
	foreach ($html->find(".cate_topview a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    }
	
	
	foreach ($html->find(".main_list h2 a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    }
	
	foreach ($html->find(".typicalnewsfocus h2 a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    }
     
    
    $html->clear(); 
    unset($html); 
    return $linkarray; 
} 
function Zing_Lay1Tin($urlwebsite,$url) { 
	
    $html = file_get_html($url); 
    $tin = array(); 
    $td = $html->find('.pTitle',0); 
    $tin['tieude']=$td->innertext; 
    $td->outertext=''; 
    $tt = $html->find('.pHead',0); 
    $tin['tomtat']=$tt->innertext; 
	
    $tt->outertext = ''; 
    $content = $html->find('.newsdetail_wrapper',0);         
    
    foreach( $content->find('img') as $img) {		
		if (substr($img->src,0,1) == "/") $img->src = $img->src;
		$tenfile = basename($img->src);
		$pathfile = "../hinh/".$tenfile;
		file_put_contents($pathfile, file_get_contents($img->src));
		$img->src = "../hinh/".$tenfile;		
		if($urlHinh=='') $urlHinh=$img->src;
	}
    $tin['content'] = $content->innertext; 	
	
	
	
	$tin['urlHinh'] = $urlHinh;
 
    $html->clear(); 
    unset($html); 
    return $tin; 
}
function TinDuLich_TrangChu($url) { 
    $linkarray=array(); 
    $html = file_get_html($url); 
	$urlphu = "http://dulichvn.org.vn";
   
	
	foreach ($html->find(".news a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    }
	
	foreach ($html->find(".more a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    } 
	
     
    
    $html->clear(); 
    unset($html); 
    return $linkarray; 
} 
function TinDuLich_Lay1Tin($urlwebsite,$url) { 
    $html = file_get_html($url); 
    $tin = array(); 
    $td = $html->find('div.news',0); 
    $tin['tieude']=$td->innertext; 
    $td->outertext='';     
    $tin['tomtat']="Moi ban nhap tom tat"; 	
    $tt->outertext = ''; 
    $content = $html->find('td[style="font-size:12px;"]',0);         
    
   foreach( $content->find('img') as $img) {		
		if (substr($img->src,0,1) == "/") $img->src = "http://dulichvn.org.vn".$img->src;
		$tenfile = basename($img->src);
		$pathfile = "../hinh/".$tenfile;
		file_put_contents($pathfile, file_get_contents("http://dulichvn.org.vn"."/".$img->src));
		$img->src = "../hinh/".$tenfile;		
		if($urlHinh=='') $urlHinh=$img->src;
	}
    $tin['content'] = $content->innertext; 
	$tin['urlHinh'] = $urlHinh;
    $html->clear(); 
    unset($html); 
    return $tin; 
} 
?>