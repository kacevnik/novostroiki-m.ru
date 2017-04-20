<?php
    if (isset($_GET['p']))   {$p = $_GET['p'];   $p = trim(stripslashes(htmlspecialchars($p)));}
    if (isset($_GET['un']))  {$un = $_GET['un']; $un = trim(stripslashes(htmlspecialchars($un)));}
    
    if (preg_match("/^[A-z0-9]{32,32}$/",$p)){$p = $p;}else{unset($p);}
    if (preg_match("/^[A-z0-9]{32,32}$/",$un)){$un = $un;}else{unset($un);}
    
    include("inc/db.php");
    if($_SESSION['sub_email']){
        $kod = $_SESSION['sub_email'];
        $siteName = $myrow["name_site"];
        $adminEmail = $myrow["adminemail"];
        $resEmailP = mysql_query("SELECT email FROM sub_email WHERE kod='$kod'",$db);
        if(mysql_num_rows($resEmailP)> 0 ){
            $myrEmailP = mysql_fetch_assoc($resEmailP);
            $email = $myrEmailP["email"];
            $subject = "Подтверждение подписки на сайте: Novostroiki-m.ru";
            $header = 'From: Novostroiki-m.ru <'.$adminEmail.'>';
            $message = "<h2 style='text-align: center'>Благодарим Вас за подписку</h2><p>Для подтверждения подписки, перейдите по ссылке:<br><a href='http://".$siteName."/sub_email.php?p=".$kod."' target='blank'>Подтверждение регистрации</a></p><p></p><p>Если Вы получили это письмо случайно и не понимаете о чем идет речь, проигнорируйте это сообщение!</p><p>Пожалуйста, не отвечайте на это сообщение, оно было сгенерировано автоматически и только для информации.<br>Спаcибо.</p>";
            mail($email,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
            $_SESSION['error2'] = "<div class='error plus'>Ваш Email добавлен в рассылку.Перейдите в почту и подтвердите подписку.</div>";
            unset($_SESSION['sub_email']);               
            header("Location: index.php");
            exit();    
        }
        else{
            $_SESSION['error2'] = "<div class='error'>Ошибка запроса.</div>";              
            header("Location: index.php");
            exit();            
        }        
    }
    else{
        if($p){
            $resP = mysql_query("SELECT email FROM sub_email WHERE kod='$p'",$db);
            if(mysql_num_rows($resP)>0){
                $myrP = mysql_fetch_assoc($resP);
                $userEmail = $myrP["email"];
                $siteName = $myrow["name_site"];
                $adminEmail = $myrow["adminemail"];
                $upP = mysql_query("UPDATE sub_email SET flag='1' WHERE kod='$p'",$db);
                $header = 'From: Novostroiki-m.ru <'.$adminEmail.'>';
                $subject = "Новый подписчик";
                $message = "<p>Новый подписчик на сайте:<br>E-mail: <strong>".$userEmail."</strong></p><p>Пожалуйста, не отвечайте на это сообщение, оно было сгенерировано автоматически и только для информации.<br>Спаcибо.</p>";
                mail($adminEmail,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
                $_SESSION['error2'] = "<div class='error plus'>Вы подтвердили подписку.</div>";              
                header("Location: index.php");
                exit();   
            }
            else{
                $_SESSION['error2'] = "<div class='error'>Ошибка запроса.</div>";              
                header("Location: index.php");
                exit();    
            }
        }
        elseif($un){
            $resP = mysql_query("SELECT kod FROM sub_email WHERE kod='$un'",$db);
            if(mysql_num_rows($resP)>0){
                $newDate = time()+15552000;
                $upP = mysql_query("UPDATE sub_email SET date_del='$newDate' WHERE kod='$un'",$db); 
                $_SESSION['error2'] = "<div class='error plus'>Вы отписались от подписки. Мы сожалеем:(</div>";              
                header("Location: index.php");
                exit();   
            }
            else{
                $_SESSION['error2'] = "<div class='error'>Ошибка запроса.</div>";              
                header("Location: index.php");
                exit();    
            }            
        }    
    }

?>