<?php
    if (isset($_GET['to']))       {$to = $_GET['to'];            $to = abs((int)$to);}
    if (isset($_GET['sort']))     {$sort = $_GET['sort'];        $sort = abs((int)$sort);}
    
    if($to and $sort){
        include("inc/db.php");
        $sel = mysql_query("SELECT url,name,a_email,messdge FROM banner WHERE id='$to' AND pokaz='1'",$db);
        if(mysql_num_rows($sel) > 0){
            $myr = mysql_fetch_assoc($sel);
            $u = $myr["url"];
            $m = $myr["messdge"];
            $e = $myr["a_email"];
            $n = $myr["name"];
            $geo = addMessage($ip);
            $country = $geo['c'];
            $sity = $geo['s']; 
            if($sity == ""){$sity = "n/a";} 

            if($m == 1){
                $adminEmail = $myrow["adminemail"];
                $subject = "Новый Клик: Novostroiki-m.ru";
                $header = 'From: Novostroiki-m.ru<'.$adminEmail.'>';
                $message = "<p>Здравствуйте!<br><br>Произведен переход по рекламной компании: ".$n."<br>IP адрес: ".$ip."<br>Страна: ".$name_contry[$geo['c']]."<br>Город :".$sity."</p><p>Пожалуйста, не отвечайте на это сообщение, оно было сгенерировано автоматически и только для информации.<br>Спасибо.</p>";
                mail($e,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");    
            }

                
            $data_d = date("Y-m-d",$time);
            $sql = mysql_query("INSERT INTO clik_banner(time_d,ip,banner,data_d,position,url,country,sity) VALUES ('$time','$ip','$to','$data_d','$sort','$urlka','$country','$sity')",$db);
            header("Location: ".$u); 
        }
        else{header("Location: index.php");}              
    }
    else{header("Location: index.php");}
?>