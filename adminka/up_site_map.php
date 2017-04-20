<?php

    include("inc/db.php");
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    $resNovo = mysql_query("SELECT alias FROM novostroj WHERE pokaz='1'",$db);
    $myrNovo = mysql_fetch_array($resNovo);
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    $resArt = mysql_query("SELECT alias FROM article WHERE pokaz='1'",$db);
    $myrArt = mysql_fetch_array($resArt);
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    $resArtCat = mysql_query("SELECT id FROM art_cat",$db);
    $myrArtCat = mysql_fetch_array($resArtCat);
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    $resArtOkrug = mysql_query("SELECT id FROM okrug",$db);
    $myrArtOkrug = mysql_fetch_array($resArtOkrug);
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    $resArtMetro = mysql_query("SELECT id FROM metro WHERE idgorod='1'",$db);
    $myrArtMetro = mysql_fetch_array($resArtMetro);
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    $countNovostroi = mysql_num_rows($resNovo);
    $str = $myrow["str"];
    $strNovo = ceil($countNovostroi/$str);
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    $engine_root = $_SERVER['DOCUMENT_ROOT'];
    $count = 8;
    $countUrlInMap = $myrow['count_url_in_map'];
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    $sitemapXML='<?xml version="1.0" encoding="UTF-8"?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Last update of sitemap '.date("Y-m-d H:i:s+06:00").' -->';
    $sitemapTXT=NULL;
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------     
    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru</loc><changefreq>weekly</changefreq><priority>0.5</priority></url>";
    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/baza.php</loc><changefreq>weekly</changefreq><priority>0.7</priority></url>";
    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/map.php</loc><changefreq>weekly</changefreq><priority>0.3</priority></url>";
    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/art.php</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>";
    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/ans.php</loc><changefreq>weekly</changefreq><priority>0.3</priority></url>";
    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/add-novostroika.php</loc><changefreq>weekly</changefreq><priority>0.3</priority></url>";
    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/new_user.php</loc><changefreq>weekly</changefreq><priority>0.3</priority></url>";
    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/new_pass.php</loc><changefreq>weekly</changefreq><priority>0.3</priority></url>";
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    do{
        $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/str.php?al=".$myrNovo["alias"]."</loc><changefreq>weekly</changefreq><priority>0.7</priority></url>";    
        $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/str.php?al=".$myrNovo["alias"]."&amp;op=forum</loc><changefreq>weekly</changefreq><priority>0.7</priority></url>";    
        $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/str.php?al=".$myrNovo["alias"]."&amp;op=foto</loc><changefreq>weekly</changefreq><priority>0.7</priority></url>";    
        $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/str.php?al=".$myrNovo["alias"]."&amp;op=buy</loc><changefreq>weekly</changefreq><priority>0.7</priority></url>";
        $count = $count + 4;    
    }
    while($myrNovo = mysql_fetch_array($resNovo));
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    do{
        $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/art-view.php?al=".$myrArt["alias"]."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>";
        $count++;     
    }
    while($myrArt = mysql_fetch_array($resArt));
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    if($strNovo >= 2){
        for($i = 2; $i <= $strNovo ;$i++){
            $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/baza.php?page=".$i."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
            $count++;   
        }
    }
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    do{
        $idOkrug = $myrArtOkrug["id"];
        $resNovoOkrug = mysql_query("SELECT id FROM novostroj WHERE pokaz='1' AND okrug='$idOkrug'");
        if(mysql_num_rows($resNovoOkrug) > 0){
            $strNovoOkrug = ceil(mysql_num_rows($resNovoOkrug)/$str);
            if($strNovoOkrug >= 2){
                $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/sort.php?okrug=".$idOkrug."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
                $count++; 
                for($r = 2; $r <= $strNovoOkrug ;$r++){
                    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/sort.php?okrug=".$idOkrug."&amp;page=".$r."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
                    $count++; 
                }  
            }
            else{
                $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/sort.php?okrug=".$idOkrug."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
                $count++;      
            }
        }    
             
    }
    while($myrArtOkrug = mysql_fetch_array($resArtOkrug));
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    do{
        $idMetro = $myrArtMetro["id"];
        $resNovoMetro = mysql_query("SELECT id FROM novostroj WHERE pokaz='1' AND metro='$idMetro'");
        if(mysql_num_rows($resNovoMetro) > 1){
            $strNovoMetro = ceil(mysql_num_rows($resNovoMetro)/$str);
            if($strNovoMetro >= 2){
                $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/sort.php?metro=".$idMetro."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
                $count++; 
                for($j = 2; $j <= $strNovoMetro ;$j++){
                    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/sort.php?metro=".$idMetro."&amp;page=".$j."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
                    $count++; 
                }  
            }
            else{
                $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/sort.php?metro=".$idMetro."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
                $count++;      
            }
        }    
             
    }
    while($myrArtMetro = mysql_fetch_array($resArtMetro));
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  
    $countArts = mysql_num_rows($resArt);
    $strArts = $myrow["str_article"];
    $strArt = ceil($countArts/$strArts);
      
    if($strArt >= 2){
        for($k = 2; $k <= $strArt ;$k++){
            $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/art.php?page=".$k."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
            $count++;   
        }
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 
    $resArtCategory = mysql_query("SELECT id FROM art_cat",$db);
    $myrArtCategory = mysql_fetch_array($resArtCategory);
       
    do{
        $idCategory = $myrArtCategory["id"];
        $resNovoCategory = mysql_query("SELECT id FROM article WHERE pokaz='1' AND cat='$idCategory'");
        if(mysql_num_rows($resNovoCategory) > 1){
            $resNovoCategory = ceil(mysql_num_rows($resNovoCategory)/$strArts);
            if($resNovoCategory >= 2){
                $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/art-cat.php?cat=".$idCategory."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
                $count++; 
                for($q = 2; $q <= $resNovoCategory ;$q++){
                    $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/art-cat.php?page=".$q."&amp;cat=".$idCategory."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
                    $count++; 
                }  
            }
            else{
                $sitemapXML.="\r\n<url><loc>http://novostroiki-m.ru/art-cat.php?cat=".$idCategory."</loc><changefreq>weekly</changefreq><priority>0.6</priority></url>"; 
                $count++;      
            }
        }    
             
    }
    while($myrArtCategory = mysql_fetch_array($resArtCategory));
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 
    $sitemapXML.="\r\n</urlset>";
    
    $sitemapXML=trim(strtr($sitemapXML,array('%2F'=>'/','%3A'=>':','%3F'=>'?','%3D'=>'=','%26'=>'&','%27'=>"'",'%22'=>'"','%3E'=>'>','%3C'=>'<','%23'=>'#','&'=>'&')));
    
    $fp=fopen($engine_root.'/sitemap.xml','w+');if(!fwrite($fp,$sitemapXML)){echo 'Ошибка записи!';}fclose($fp);
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    if($countUrlInMap >= $count){
        $new_countUrlInMap = mysql_query("UPDATE mainset SET count_url_in_map='$count'",$db);
        $_SESSION['error'] = "<div class='error_plus'>В sitemap.xml: ".$count." адресов</div>";
        header("Location: index.php");
        exit();
    }
    else{
        $new_countUrlInMap = mysql_query("UPDATE mainset SET count_url_in_map='$count'",$db);
        $countUrlInMap = $count-$countUrlInMap;
        $_SESSION['error'] = "<div class='error_plus'>В sitemap.xml добавлено: ".$countUrlInMap." адресов, всего: ".$count."</div>";
        header("Location: index.php");
        exit();
    }
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
?>