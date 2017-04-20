<?php
    if (isset($_POST['email_mail_sub']))   {$email_mail_sub = $_POST['email_mail_sub'];   $email_mail_sub = trim(stripslashes(htmlspecialchars($email_mail_sub)));}
    if (isset($_POST['submit_mail_sub']))  {$submit_mail_sub = $_POST['submit_mail_sub']; $submit_mail_sub = trim(stripslashes(htmlspecialchars($submit_mail_sub)));}
    
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$email_mail_sub)){unset($email_mail_sub);}else{$email_mail_sub = $email_mail_sub;}
    if($submit_mail_sub){
        if($email_mail_sub){
            $selMailPovtor = mysql_query("SELECT kod,flag FROM sub_email WHERE email = '$email_mail_sub'",$db);
            if(mysql_num_rows($selMailPovtor)== 0){
                $time = time();
                $kod = md5($time.$email_mail_sub."9564");
                $resultNewEmail = mysql_query("INSERT INTO sub_email(email,flag,date,date_del,kod) VALUES ('$email_mail_sub','0','$time','0','$kod')",$db);
                $_SESSION['error2'] = "<div class='error plus'>Ваш Email добавлен в рассылку.Перейдите в почту и подтвердите подписку.</div>";
                //Отправка письма подписчику----------
                $siteName = $myrow["name_site"];
                $adminEmail = $myrow["adminemail"];
                $subject = "Подтверждение подписки на сайте: Novostroiki-m.ru";
                $header = 'From: Novostroiki-m.ru <'.$adminEmail.'>';
                $message = "<h2 style='text-align: center'>Благодарим Вас за подписку</h2><p>Для подтверждения подписки, перейдите по ссылке:<br><a href='http://".$siteName."/sub_email.php?p=".$kod."' target='blank'>Подтверждение регистрации</a></p><p></p><p>Если Вы получили это письмо случайно и не понимаете о чем идет речь, проигнорируйте это сообщение!</p><p>Пожалуйста, не отвечайте на это сообщение, оно было сгенерировано автоматически и только для информации.<br>Спаcибо.</p>";
mail($submit_mail_sub,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
                //---------------------------------------                
                header("Location: ".$urlka);
                exit();                
            }
            else{
                $myrMailPovtor = mysql_fetch_assoc($selMailPovtor);
                $flag = $myrMailPovtor["flag"];
                $kod = $myrMailPovtor["kod"];
                if($flag == 1){
                    $_SESSION['error2'] = "<div class='error'>Данный электронный адрес уже подписан на рассылку</div>";
                    header("Location: ".$urlka);
                    exit();                    
                }
                else{
                    $_SESSION['sub_email'] = $kod;
                    $_SESSION['error2'] = '<div class="error">Данный электронный адрес уже подписан на рассылку, но не актевирован. Для активации перейдите по <a href="sub_email.php">ссылке</a></div>';
                    header("Location: ".$urlka);
                    exit();    
                }  
            }    
        }
        else{
            $_SESSION['error2'] = "<div class='error'>Заполните поле E-mail Правильно</div>";
            header("Location: ".$urlka);
            exit(); 
        }
    }
?>