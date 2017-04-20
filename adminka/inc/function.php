<?php 
    
    function headerDate($param){
        $cislo = date("j",$param);
        $mes   = date("n",$param);
        if($mes == 1){$mes = "Января";}
        if($mes == 2){$mes = "Февраля";}
        if($mes == 3){$mes = "Марта";}
        if($mes == 4){$mes = "Апреля";}
        if($mes == 5){$mes = "Мая";}
        if($mes == 6){$mes = "Июня";}
        if($mes == 7){$mes = "Июля";}
        if($mes == 8){$mes = "Августа";}
        if($mes == 9){$mes = "Сентября";}
        if($mes == 10){$mes = "Октября";}
        if($mes == 11){$mes = "Ноября";}
        if($mes == 12){$mes = "Декабря";}
        
        $ear = date("Y",$param);
        
        $den = date("w",$param);
        if($den == 0){$den = "Вс";}
        if($den == 1){$den = "Пн";}
        if($den == 2){$den = "Вт";}
        if($den == 3){$den = "Ср";}
        if($den == 4){$den = "Чт";}
        if($den == 5){$den = "Пт";}
        if($den == 6){$den = "Сб";}
        
        $dataHeader = $cislo." ".$mes." ".$ear." ".$den;
        return $dataHeader;
    }
   
   function otzivData($param){
    $cislo = date("j", $param);
    $god = date("Y", $param);
    $mes = date("n", $param);
    
        if($mes == 1){$mes = "янв";}
        if($mes == 2){$mes = "фев";}
        if($mes == 3){$mes = "мар";}
        if($mes == 4){$mes = "апр";}
        if($mes == 5){$mes = "май";}
        if($mes == 6){$mes = "июн";}
        if($mes == 7){$mes = "июл";}
        if($mes == 8){$mes = "авг";}
        if($mes == 9){$mes = "сен";}
        if($mes == 10){$mes = "окт";}
        if($mes == 11){$mes = "ноя";}
        if($mes == 12){$mes = "дек";}
        
        return $dataHeader = $cislo." ".$mes." ".$god;
    
   }
   
   function otzivData2($param){
    $cislo = date("j", $param);
    $god = date("Y", $param);
    $mes = date("n", $param);
    $cas = date("H", $param);
    $min = date("i", $param);
    
        if($mes == 1){$mes = "января";}
        if($mes == 2){$mes = "февраля";}
        if($mes == 3){$mes = "марта";}
        if($mes == 4){$mes = "апреля";}
        if($mes == 5){$mes = "мая";}
        if($mes == 6){$mes = "июня";}
        if($mes == 7){$mes = "июля";}
        if($mes == 8){$mes = "августа";}
        if($mes == 9){$mes = "сентября";}
        if($mes == 10){$mes = "октября";}
        if($mes == 11){$mes = "ноября";}
        if($mes == 12){$mes = "декабря";}
        
        return $dataHeader = $cislo." ".$mes." ".$god." ".$cas.":".$min;
    
   }
   
function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',  'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        ' ' => '-',  '!' => '',  '.' => '','«' => '',  '»' => ''
    );
    return strtr($string, $converter);
}
function str2url($str) {
    // переводим в транслит
    $str = rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
    // заменям все ненужное нам на "-"
    //$str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    // удаляем начальные и конечные '-'
    $str = trim($str,"-");
    return $str;
}

function strNews($param, $otrez){
    
    $param = mb_substr($param, 0, $otrez,"UTF-8");
    $param = $param." ...</p>";
    return $param;
}

function pageBrank($param){    
    if(preg_match("/<!-- pagebreak -->/", $param)){
       $parts = explode("<!-- pagebreak -->", $param);
       return $parts[0];
    } 
    return $param;  
}
    
?>