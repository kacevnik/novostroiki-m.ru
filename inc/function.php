<?php 
//------------------------------------------------------------------------
//Выборка из БД для главной карты.

    function selMainMap(){
        global $db;
        $arr = array();
        $sql = "SELECT id,name,alias,img,p_min,komnat,prise_ot,dolg,shir,status FROM novostroj WHERE pokaz='1' ORDER BY name";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД списка метро.

    function selMetro(){
        global $db;
        $arr = array();
        $sql = "SELECT id,name FROM metro WHERE idgorod='1' ORDER BY name ";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }

//------------------------------------------------------------------------
//Выборка из БД списка Округов и Направлений.

    function selOkrug(){
        global $db;
        $arr = array();
        $sql = "SELECT id,name FROM okrug ORDER BY category,id";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД списка Новостроек на index страницу.

    function selNovoIndex(){
        global $db;
        $arr = array();
        $sql = "SELECT id,name,alias,img,p_min,prise_ot,spec,adres FROM novostroj WHERE pokaz='1' AND vip='3'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД списка Данных фотографий для данной новостройки.

    function selFoto($param){
        global $db;
        $arr = array();
        $sql = "SELECT url FROM foto WHERE novostroika='".$param."'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД списка Данных Видео для данной новостройки.

    function selVideo($param){
        global $db;
        $arr = array();
        $sql = "SELECT url,class,name FROM video WHERE novostroika='".$param."'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД списка Комментариев для данной новостройки.

    function selComments($param, $type){
        global $db;
        $arr = array();
        $sql = "SELECT id FROM comments WHERE id_novostroi='".$param."' AND type='".$type."' AND pokaz='1'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД списка популярных новостроек для левого сайтбара

    function selPopulNovo($param){
        global $db;
        $arr = array();
        $sql = "SELECT alias,name FROM novostroj ORDER BY hit DESC LIMIT ".$param."";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Функция выборки цены из БД, и если нет то парсинг с сайта

    function selPriseAndPars($url){
        $data = date('Y-m-d');
        global $db;
        $arr = array();
        $sql = "SELECT rub,usd,eur FROM prise_m2 WHERE date='".$data."'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            $str = iconv("windows-1251","UTF-8",file_get_contents($url));
            $str = explode('<th>Квартиры в Москве</th>',$str);            
            $str = explode('руб/кв.м',$str[1]);
            $str = str_replace('<tr>','',$str[0]);
            $str = str_replace('</tr>','',$str);
            $str = str_replace('</td>','',$str);            
            $str = explode('<td>',$str);
            $rub = str_replace(' ','',$str[4]);
            $str_date = trim($str[1]);
            $usd = round($rub/$str[2],2);
            $eur = round($rub/$str[3],2);
            if($str_date == date("d.m.y")){
                $sql = "INSERT INTO prise_m2(date,rub,usd,eur) VALUES ('$data','$rub','$usd','$eur')";
                mysql_query($sql,$db);
            }
            $date2 = date('Y-m-d',time()- 86400);
            $sql2 = "SELECT rub,usd,eur FROM prise_m2 WHERE date='".$data2."'";
            $res = mysql_query($sql2, $db);
            if(mysql_num_rows($res) > 0){
                $myr = mysql_fetch_assoc($res);
                do{
                   $arr[] = $myr; 
                }
                while($myr = mysql_fetch_assoc($res));
                return $arr;
            }            
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД списка Новостроек для базы согласно страницы

    function selNovoStr($page,$count){
        global $db;
        $arr = array();
        $sql = "SELECT id FROM novostroj WHERE pokaz='1'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $countNovo = mysql_num_rows($res);
            $total = intval((($countNovo - 1) / $count) + 1);
            if(empty($page) or $page < 0) $page = 1;
            if($page > $total) $page = $total;
            $start = $page * $count - $count;
            $sql = "SELECT id,img,alias,name,prise_ot,transport,metro,adres,ipoteka,rassrochka,v_ipoteka,parking,fz_214,otdelka,w_metro,thouse,apart FROM novostroj WHERE pokaz='1' ORDER BY date DESC LIMIT $start, $count";
            $res = mysql_query($sql, $db);
            if(mysql_num_rows($res) > 0){
                $myr = mysql_fetch_assoc($res);
                do{
                   $arr[] = $myr; 
                }
                while($myr = mysql_fetch_assoc($res));
                return $arr;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }


//------------------------------------------------------------------------
//Выборка из БД списка Новостроек для страницы сортировки

    function selNovoSort($page,$count,$get_sql,$order){
        global $db;
        $arr = array();
        $sql = "SELECT id FROM novostroj WHERE pokaz='1'".$get_sql;
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $countNovo = mysql_num_rows($res);
            $total = intval((($countNovo - 1) / $count) + 1);
            if(empty($page) or $page < 0) $page = 1;
            if($page > $total) $page = $total;
            $start = $page * $count - $count;
            $sql = "SELECT id,img,alias,name,prise_ot,transport,metro,adres,ipoteka,rassrochka,v_ipoteka,parking,fz_214,otdelka,w_metro,thouse FROM novostroj WHERE pokaz='1'".$get_sql." ORDER BY ".$order." LIMIT $start, $count";
            $res = mysql_query($sql, $db);
            if(mysql_num_rows($res) > 0){
                $myr = mysql_fetch_assoc($res);
                do{
                   $arr[] = $myr; 
                }
                while($myr = mysql_fetch_assoc($res));
                return $arr;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }    
//------------------------------------------------------------------------
//Выборка из БД имя метро

    function selNameMetro($metro){
        global $db;
        $arr = array();
        $sql = "SELECT name FROM metro WHERE id='$metro'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }

//------------------------------------------------------------------------
//Выборка из БД имя округа направления

    function selNameOkrug($okrug){
        global $db;
        $arr = array();
        $sql = "SELECT name FROM okrug WHERE id='$okrug'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка количества новостроек на данной станции метро

    function selCountMetro($metro){
        global $db;
        $arr = array();
        $sql = "SELECT id FROM novostroj WHERE metro='$metro' AND pokaz='1'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
//------------------------------------------------------------------------
//Выборка количества новостроек на данной направлении или округе

    function selCountOkrug($okrug){
        global $db;
        $arr = array();
        $sql = "SELECT id FROM novostroj WHERE okrug='$okrug' AND pokaz='1'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
     
//------------------------------------------------------------------------
//Выборка куки с перебором и выборкой

    function selCookieIzbr($data){
        global $db;
        foreach($data as $i){
            $i = abs((int)$i);
            $sql = "SELECT id,name,alias FROM novostroj WHERE id='$i'";
            $res = mysql_query($sql,$db);
            if(mysql_num_rows($res)){
                $myr = mysql_fetch_assoc($res);
                $text = $text.'<li><span class="izbr_del" onclick="addMainIsbr('.$myr["id"].')"></span><a href="str.php?al='.$myr["alias"].'">'.$myr["name"].'</a></li>';
            }    
        }
        return $text;
    }
    
//------------------------------------------------------------------------
//Выборка куки с перебором и выборкой 2

    function selCookieIzbr2($cookie_array, $id){
        if($cookie_array){
            foreach($cookie_array as $i){
                $i = abs((int)$i);
                if($i == $id){
                    return true;
                    break;
                }
            }
            return false;    
        }
        else{
            return false;
        }
    }
//------------------------------------------------------------------------
//Выборка данных для STR

    function selNovostroiData($al){
        global $db;
        $arr = array();
        $sql = "SELECT name,id,alias,big_adres,transport,mkad,komnat,p_min,p_max,prise_ot,prise_do,sait,dis,hit,metro,okrug,title,meta_k,meta_d,img,phone,zoom,shir,dolg FROM novostroj WHERE alias='$al'";
        $res = mysql_query($sql,$db);
        if(mysql_num_rows($res)){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        } 
    }
    
//------------------------------------------------------------------------
//Выборка комментариев для новостройки

    function selCommentForNovo($id, $type){
        global $db;
        $arr = array();
        $sql = "SELECT id_novostroi,name_user,date,text,step,id FROM comments WHERE id_novostroi='$id' AND pokaz='1' AND type='$type' ORDER BY num";
        $res = mysql_query($sql,$db);
        if(mysql_num_rows($res)){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        } 
    }
//------------------------------------------------------------------------
//Обработка даты для коментариев

    function upDate($mtime){
        $mouRu = array('1'=>'янв','2'=>'фев','3'=>'мар','4'=>'апр','5'=>'май','6'=>'июн','7'=>'июл','8'=>'авг','9'=>'сен','10'=>'окт','11'=>'ноя','12'=>'дек');
        $mon  = date("n",$mtime);
        $mon = $mouRu[$mon];
        return $date = date("d ",$mtime).$mon.date(" Y H:i",$mtime);
    }

//------------------------------------------------------------------------
//Счетчик показов для новостройки

    function upHit($id,$hit){
        global $db;
        $hit = $hit + 1;
        $sql = "UPDATE novostroj SET hit='$hit' WHERE id='$id'";
        $res = mysql_query($sql,$db);
    }
    
//------------------------------------------------------------------------
//Выборка и БД трех случайных новостроек для раздела новостройки рядом

    function selNovoRand($okrug,$id){
        $okrug = abs((int)$okrug);
        $id = abs((int)$id);
        global $db;
        $arr = array();
        $sql = "SELECT alias,name,img,id,prise_ot,transport,adres,metro,ipoteka,rassrochka,v_ipoteka,fz_214,parking,otdelka,w_metro,thouse,apart FROM novostroj WHERE okrug='$okrug' AND pokaz='1' AND id!='$id' ORDER BY RAND() LIMIT 3";
        $res = mysql_query($sql,$db);
        if(mysql_num_rows($res)){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        } 
    }

//------------------------------------------------------------------------
//Выборка данных для рейтингов

    function selSrar($id,$line){
        global $db;
        $arr = array();
        $sql = "SELECT sum,stars FROM star WHERE id_novo='$id' AND line='$line'";
        $res = mysql_query($sql,$db);
        if(mysql_num_rows($res)){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        } 
    }
    
//------------------------------------------------------------------------
//Выборка куки с перебором и выборкой 2

    function selCookieIzbr3($cookie_array, $line,$id){
        if($cookie_array){
            foreach($cookie_array as $key=>$val){
                $serch = $id.$line;
                if($key == $serch){
                    return true;
                    break;
                }
            }
            return false;    
        }
        else{
            return false;
        }
    }

//------------------------------------------------------------------------
//Выборка из БД массмва видео для определенной новостройки

    function selVideoStr($id){
        global $db;
        $arr = array();
        $id = abs((int)$id);
        $sql = "SELECT id,name,url,class FROM video WHERE novostroika='$id'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД массмва изображений для галереи страницы новостройки

    function selFotoStr($id){
        global $db;
        $arr = array();
        $id = abs((int)$id);
        $sql = "SELECT url FROM foto WHERE novostroika='$id'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД массива телефонов для страницы: Где купмть?

    function selPhoneBuy($id){
        global $db;
        $time = time();
        $arr = array();
        $id = abs((int)$id);
        $sql = "SELECT developer,phone,comment FROM phones WHERE novostroika='$id' AND date>'$time' AND pokaz='1' ORDER BY RAND()";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Функция обработки телефонного номера

    function editPhone($phone){
        if($phone){
            if($phone != ""){
                $arr = array("(",")"," ","-","+");
                $phone = str_replace($arr,"", $phone);
                if (preg_match("/^[0-9]{10,11}$/",$phone)){
                        $znak1 = "+7";
                        if($znak1 == "+7"){
                            $znak2 = substr($phone, 1, 3);
                            $znak3 = substr($phone, 4, 3);
                            $znak4 = substr($phone, 7, 2);
                            $znak5 = substr($phone, 9, 2);
                            $itog = $znak1." (".$znak2.") ".$znak3."-".$znak4."-".$znak5;
                            $phone = $itog;
                            return $phone;
                        }
                        else{
                            return $phone;
                        }    
                }
                else{
                    return false;
                }    
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД массмва категорий для вывода в левом блоке меню

    function selLeftCategory(){
        global $db;
        $arr = array();
        $sql = "SELECT id,name FROM art_cat ORDER BY sort";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }

//------------------------------------------------------------------------
//Выборка из БД массива статей для статей

    function selListArticle($page,$count){
        global $db;
        $arr = array();
        $sql = "SELECT id FROM article WHERE pokaz='1'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $countNovo = mysql_num_rows($res);
            $total = intval((($countNovo - 1) / $count) + 1);
            if(empty($page) or $page < 0) $page = 1;
            if($page > $total) $page = $total;
            $start = $page * $count - $count;
            $sql = "SELECT id,img,alias,name,description,view,cat FROM article WHERE pokaz='1' ORDER BY date DESC LIMIT $start, $count";
            $res = mysql_query($sql, $db);
            if(mysql_num_rows($res) > 0){
                $myr = mysql_fetch_assoc($res);
                do{
                   $arr[] = $myr; 
                }
                while($myr = mysql_fetch_assoc($res));
                return $arr;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }


//------------------------------------------------------------------------
//Выборка из БД массива статей для статей

    function selListArticle2($page,$count,$cat){
        global $db;
        $arr = array();
        $sql = "SELECT id FROM article WHERE pokaz='1' AND cat='$cat'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $countNovo = mysql_num_rows($res);
            $total = intval((($countNovo - 1) / $count) + 1);
            if(empty($page) or $page < 0) $page = 1;
            if($page > $total) $page = $total;
            $start = $page * $count - $count;
            $sql = "SELECT id,img,alias,name,description,view FROM article WHERE pokaz='1' AND cat='$cat' ORDER BY date DESC LIMIT $start, $count";
            $res = mysql_query($sql, $db);
            if(mysql_num_rows($res) > 0){
                $myr = mysql_fetch_assoc($res);
                do{
                   $arr[] = $myr; 
                }
                while($myr = mysql_fetch_assoc($res));
                return $arr;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

//------------------------------------------------------------------------
//Выборка из БД массива всех статей

    function selNameCategoryArt($id){
        $id = abs((int)$id);
        global $db;
        $sql = "SELECT name FROM art_cat WHERE id='$id'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            return $arr = $myr["name"];
        }
        else{
            return false;
        }
    }
  
//------------------------------------------------------------------------
//Выборка из БД массива имени категории по ID

    function selAllArticle(){
        global $db;
        $arr = array();
        $sql = "SELECT id FROM article WHERE pokaz='1'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }

//Выборка из БД массива имени категории по ID

    function selAllArticle2($cat){
        global $db;
        $arr = array();
        $sql = "SELECT id FROM article WHERE pokaz='1' AND cat='$cat'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
//------------------------------------------------------------------------
//Выборка из БД массива данных по статье согласно alias

    function selDataArticle($al){
        global $db;
        $arr = array();
        $sql = "SELECT name,text,view,date,cat,m_key,m_disc,title FROM article WHERE pokaz='1' AND alias='$al'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
//------------------------------------------------------------------------
//Выборка из БД массмва списка номеров для каждого юзера в Личном кабинете

    function selListNumberPhone($userID){
        global $db;
        $arr = array();
        $userID = abs((int)$userID);
        $sql = "SELECT id,novostroika,developer,phone,comment,pokaz,fon,date,error FROM phones WHERE user='$userID'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Функция смены фона на день строителя.

    function dayBilder(){
        if(date("n") == 8 and date("N") == 7 and date("j") < 15){
            return true;
        }
        else{
            return false;
        }
    }
    
//------------------------------------------------------------------------
//Выборка из БД данных для обработки банерной рекламы.

    function selBanner(){
        global $db;
        $arr = array();
        $sql = "SELECT id,img,slogan FROM banner WHERE pokaz='1' ORDER BY RAND()";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $myr = mysql_fetch_assoc($res);
            do{
               $arr[] = $myr; 
            }
            while($myr = mysql_fetch_assoc($res));
            return $arr;
        }
        else{
            return false;
        }
    }
  
//------------------------------------------------------------------------
//Функция обновления количества показов банера

    function AddViewsBanner($id, $position){
        global $db;
        global $time;
        global $ip;
        $data_d = date("Y-m-d",$time);
        $sql = mysql_query("INSERT INTO view_banner(time_d,ip,banner,data_d,position) VALUES ('$time','$ip','$id','$data_d','$position')",$db);  
    }
//------------------------------------------------------------------------
//Функция выборки данный по показам рекалмной компании. Главная
    function statistica_main($k, $date1, $date2){
        global $db;
        $arr = array();
        if($k > 0 and $date1 > 0 and $date2 > 0){
            $sql1 = "SELECT id FROM banner WHERE kod='$k' AND pokaz='1'";
            $res1 = mysql_query($sql1,$db);
            $myr1 = mysql_fetch_assoc($res1);
            $id = $myr1["id"];
            if(mysql_num_rows($res1) > 0){
                $sql2 = "SELECT ip,time_d,data_d,country,sity FROM clik_banner WHERE banner='$id' AND time_d>'$date1' AND time_d<'$date2' ORDER BY time_d DESC";
                $res2 = mysql_query($sql2, $db);
                if(mysql_num_rows($res2) > 0){
                    $myr2 = mysql_fetch_assoc($res2);
                    do{
                        $arr[] = $myr2; 
                    }
                    while($myr2 = mysql_fetch_assoc($res2));
                    return $arr;
                }
                else{
                    return false;    
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }  
//------------------------------------------------------------------------
//Функция выборки данный по показам рекалмной компании. Второй вариант
    function statistica_main_date($k, $date){
        global $db;
        $arr = array();
        if($k > 0 and $date){
            $sql1 = "SELECT id FROM banner WHERE kod='$k' AND pokaz='1'";
            $res1 = mysql_query($sql1,$db);
            $myr1 = mysql_fetch_assoc($res1);
            $id = $myr1["id"];
            if(mysql_num_rows($res1) > 0){
                $sql2 = "SELECT ip,time_d,data_d,country,sity FROM clik_banner WHERE banner='$id' AND data_d='$date' ORDER BY time_d DESC";
                $res2 = mysql_query($sql2, $db);
                if(mysql_num_rows($res2) > 0){
                    $myr2 = mysql_fetch_assoc($res2);
                    do{
                        $arr[] = $myr2; 
                    }
                    while($myr2 = mysql_fetch_assoc($res2));
                    return $arr;
                }
                else{
                    return false;    
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
//------------------------------------------------------------------------
//функция проверки посещения сайта поискоыми робатами 
   
function isBot(){
/* Эта функция будет проверять, является ли посетитель роботом поисковой системы */
  $bots = array(
    'rambler','googlebot','aport','yahoo','msnbot','turtle','mail.ru','omsktele',
    'yetibot','picsearch','sape.bot','sape_context','gigabot','snapbot','alexa.com',
    'megadownload.net','askpeter.info','igde.ru','ask.com','qwartabot','yanga.co.uk',
    'scoutjet','similarpages','oozbot','shrinktheweb.com','aboutusbot','followsite.com',
    'dataparksearch','google-sitemaps','appEngine-google','feedfetcher-google',
    'liveinternet.ru','xml-sitemaps.com','agama','metadatalabs.com','h1.hrn.ru',
    'googlealert.com','seo-rus.com','yaDirectBot','yandeG','yandex',
    'yandexSomething','Copyscape.com','AdsBot-Google','domaintools.com',
    'Nigma.ru','bing.com','dotnetdotcom'
  );
  foreach($bots as $bot)
    if(stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false){
      $botname = $bot;
      return true;
    }
  return false;
} 

//------------------------------------------------------------------------
//функция определения пренадлежности IP 

    function addMessage($ip){
        $arr = array();
        $zapros = "http://ipgeobase.ru:7020/geo?ip=".$ip;
        $content = iconv("windows-1251","UTF-8",file_get_contents($zapros));
        if(stripos($content,"Not found")){
            $arr["c"] = "n/a";
            $arr["s"] = "n/a";
        }
        else{
            $contry = explode("<country>",$content);
            $contry = explode("</country>",$contry[1]);
            $contry = $contry[0];
            $sity = explode("<city>",$content);
            $sity = explode("</city>",$sity[1]);
            $sity = $sity[0];
            $arr["c"] = $contry;
            $arr["s"] = $sity;            
        }
        return $arr;
    } 
    
//------------------------------------------------------------------------
//функция определения даты новогодней заставки 
    function hny(){
        $date = array('21-12','22-12','23-12','24-12','25-12','26-12','27-12','28-12','29-12','30-12','31-12','01-01','02-01','03-01','04-01','05-01','06-01','07-01','08-01','09-01','10-01','11-01','12-01','13-01','14-01'); 
        foreach($date as $d){
            if(stripos(date("d-m"), $d) !== false){
                return true;
            }    
        } 
        return false;
    }
    
//------------------------------------------------------------------------
//Выборка из БД списка Звстройщиков для базы согласно страницы

    function selBazaCompany($page,$count){
        global $db;
        $arr = array();
        $sql = "SELECT id FROM compani WHERE pokaz='1'";
        $res = mysql_query($sql, $db);
        if(mysql_num_rows($res) > 0){
            $countNovo = mysql_num_rows($res);
            $total = intval((($countNovo - 1) / $count) + 1);
            if(empty($page) or $page < 0) $page = 1;
            if($page > $total) $page = $total;
            $start = $page * $count - $count;
            $sql = "SELECT id,img,alias,name,dis,adress,phone FROM compani WHERE pokaz='1' ORDER BY id DESC LIMIT $start, $count";
            $res = mysql_query($sql, $db);
            if(mysql_num_rows($res) > 0){
                $myr = mysql_fetch_assoc($res);
                do{
                   $arr[] = $myr; 
                }
                while($myr = mysql_fetch_assoc($res));
                return $arr;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

?>