<?php 
require "config.php"; 
include "simplehtmldom/simple_html_dom.php"; 
function LuuTinVaoDB($tin, $url, $source){ 
    $tieude = trim(mysql_real_escape_string(strip_tags($tin['tieude']))); 
    $tomtat = trim(mysql_real_escape_string(strip_tags($tin['tomtat']))); 
    $content = trim(mysql_real_escape_string($tin['content'])); 
	$urlhinh = trim(mysql_real_escape_string($tin['urlHinh'])); 
	
	$sql = "INSERT INTO tin VALUES(NULL,'$tieude','','$urlhinh','$tomtat','$content','$tieude','$tieude','$tieude',8,36,1,0)";
	mysql_query($sql) or die(mysql_error());
	

} 
function TinDuLich_TrangChu($url) { 
    $linkarray=array(); 
   
	$html = file_get_html($url); 
	$urlphu = "http://tindulich.vn";
   /*
		foreach ($html->find("td.body_photovideo p a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    } 
	foreach ($html->find(".news-tweener h1 a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    }
	*/
	
	/*
	foreach ($html->find("ul.body_photovideo li p a") as $link){     		
        if ($link->href==NULL)  continue; 
        if ($link->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$link->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($link->href,0,1)=="/") $link->href=$urlphu. $link->href; 
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href; 
    } 
	*/
	foreach ($html->find("ul.body_photovideo li a img") as $img){     		
        if ($img->src==NULL)  continue; 
        if ($img->plaintext==NULL) continue; 
        $text=str_replace("&nbsp;"," ",$img->plaintext); 
        $text=trim($text);         
        if ($text=="") continue; 
        if (substr($img->src,0,1)=="/") $link->href=$urlphu. $img->src; 
        if (in_array($img->src,$linkarray)==false) $linkarray[$text]=$img->src; 
    } 
     
    
    $html->clear(); 
    unset($html); 
	
    return $linkarray; 
	
} 
function TinDuLich_Lay1Tin($urlwebsite,$url) { 

    $html = file_get_html($url); 
    $tin = array(); 
    $td = $html->find('h1.cssDefaultTitle',0); 
    $tin['tieude']=$td->innertext; 
    $td->outertext='';     
	if($html->find('#share_web',0)->next_sibling()->next_sibling()){
		$tomt = $html->find('#share_web',0)->next_sibling()->next_sibling();
		$tin['tomtat']=$tomt->innertext; 
		$tomt->outertext = ''; 
	}else{
		continue;
	}
	if($html->find('#share_web',0)->next_sibling()->next_sibling()->next_sibling()){
		 $content = $html->find('#share_web',0)->next_sibling()->next_sibling()->next_sibling();         
		 $urlHinh = '';
		if ($content!=NULL)
		foreach( $content->find('img') as $img) {				
				if (substr($img->src,0,1) == "/") $img->src = "http://tindulich.vn".$img->src; 
				if($urlHinh=='') $urlHinh=$img->src; 
			
		}
		$tin['content'] = $content->innertext;
		$tin['urlHinh'] = $urlHinh;
	}else{
		continue;
	}
    $html->clear(); 
    unset($html); 
    return $tin; 
	
} 
?>