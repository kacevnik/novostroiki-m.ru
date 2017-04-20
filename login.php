<?php    
    include("inc/db.php");
    
    if($_SESSION["admin"]){header("Location: index.php"); exit();}

    if (isset($_POST['submit_in']))   {$submit_in = $_POST['submit_in']; $submit_in = trim(stripslashes(htmlspecialchars($submit_in)));}
    if (isset($_POST['pass_in']))     {$pass_in = $_POST['pass_in'];     $pass_in = trim(stripslashes(htmlspecialchars($pass_in)));}
    if (isset($_POST['login_in']))    {$login_in = $_POST['login_in'];   $login_in = trim(stripslashes(htmlspecialchars($login_in)));}
    
    if (preg_match("/^[A-z0-9]{4,20}$/",$pass_in)){$pass_in = $pass_in;}else{unset($pass_in);}
    if (preg_match("/^[A-z0-9]{4,20}$/",$login_in)){$login_in = $login_in;}else{unset($login_in);}
    
    if($submit_in){
        if($login_in and $pass_in){
            $pass_in = md5($pass_in);
            $login_in2 = strtolower($login_in);
            $resLoginVxod = mysql_query("SELECT login2,pass_reg,metka,kod,vxod1,count_bed_pass,email FROM user WHERE login2='$login_in2'",$db);
            if(mysql_num_rows($resLoginVxod) > 0){
                $myrLoginVxod = mysql_fetch_array($resLoginVxod);
                $count_bed_pass = $myrLoginVxod["count_bed_pass"];
                if($count_bed_pass < $myrow["count_bed_pass"]){
                    $metkaVxod = $myrLoginVxod["metka"];
                    $passVxod2 = $myrLoginVxod["pass_reg"];
                    $kodVxod = $myrLoginVxod["kod"];
                    $Vxod2 = $myrLoginVxod["vxod1"];
                    $email_user = $myrLoginVxod["email"];
                    $loginVxod = $myrLoginVxod["login2"];
                    if($metkaVxod == 1){
                        if($pass_in == $passVxod2){
                            $_SESSION['admin'] = $passVxod2.$kodVxod;
                            $resDateVosPass = mysql_query("UPDATE user SET count_bed_pass='0',vxod1='$time',vxod2='$Vxod2' WHERE pass_reg='$passVxod2' AND kod='$kodVxod'",$db);
                            $_SESSION['error2'] = "<div class='error plus'>Добро Пожаловать на сайт</div>";
                            header("Location: ".$urlka);
                            exit();   
                        }
                        else {
                            if($count_bed_pass == $myrow["count_bed_pass"] - 1){
                                $_SESSION['error2'] = "<div class='error'>Неверный пароль</div>";
                                $new_count_bed_pass = $count_bed_pass + 1;
                                $up_count_bed_pass = mysql_query("UPDATE user SET count_bed_pass='$new_count_bed_pass' WHERE pass_reg='$passVxod2' AND kod='$kodVxod'",$db);
                                $adminEmail = $myrow["adminemail"];
        					    $subject = "Внимание! Ваш аккаунт заблокирован";
                                $header = 'From: Novostroiki-m.ru <'.$adminEmail.'>';
        					    $message = "<h2 style='text-align: center'></h2><p>Ваш логин: <i>".$loginVxod."</i></p><p>Внимание! В связи с неоднократными, неправильными вводами паролей к Вашему аккаунту за короткий интервал времени, Администрация сайта Novostroiki-m.ru заблокировала вход к Вашему личному кабинету.</p><p>Эта мера была предпринета для сохранения Вашей личной информации. И доступ к аккаунту будет оставаться заблокированным до тех пор, пока Вы не смените пароль.</p><p>Пожалуйста, будьте крайне внимательны! Мошенники могут рассылать письма с таким же содержанием. Поэтому не восстанавливайте пароль, переходя по ссылке из письма!</p><p>Пожалуйста, не отвечайте на это сообщение, оно было сгенерировано автоматически и только для информации.<br>Приносим свои извинения.<br>Спаcибо.</p>";
                                mail($email_user,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
        					    $subject2 = "Внимание! аккаунт заблокирован";
                                $header2 = 'From: Novostroiki-m.ru <'.$adminEmail.'>';
                                if($Vxod2 == 0){$mess = "<br>Дата последнего входа: <i>НЕТ</i>";}else{$mess = "<br>Дата последнего входа: <i>".upDate($Vxod2)."</i>";}
        					    $message2 = "<h2 style='text-align: center'>Внимание!</h2><p>Внимание! В связи с неоднократными, неправильными вводами паролей, заблокирован аккаунт.</p><p>Логин: <i>".$loginVxod."</i><br>Email: <i>".$email_user."</i>".$mess."</p><p>Пожалуйста, не отвечайте на это сообщение, оно было сгенерировано автоматически и только для информации.<br>Спаcибо.</p>";
                                mail($adminEmail,$subject2,$message2,$header2."\r\nContent-type:text/html;Charset=utf-8\r\n");                                
                                header("Location: ".$urlka);
                                exit();
                            }
                            if($count_bed_pass < $myrow["count_bed_pass"]){
                                $new_count_bed_pass = $count_bed_pass + 1;
                                $up_count_bed_pass = mysql_query("UPDATE user SET count_bed_pass='$new_count_bed_pass' WHERE pass_reg='$passVxod2' AND kod='$kodVxod'",$db);
                                $_SESSION['error2'] = "<div class='error'>Неверный пароль</div>";
                                header("Location: ".$urlka);
                                exit();
                            }  
                        }   
                    }
                    else {$_SESSION['error2'] = "<div class='error'>Аккаунт пользователя не активирован</div>";
                    header("Location: ".$urlka);
                    exit();}
                }
                else {$_SESSION['error2'] = "<div class='error'>Внимание! Этот аккаунт заблокирован. воспользуйтесь услугой <a href='new_pass.php'>восстановления пароля</a>.</div>";
                header("Location: ".$urlka);
                exit();}               
            }
            else {$_SESSION['error2'] = "<div class='error'>Пользователь <b><i>".$login_in."</i></b> не зарегистрирован на сайте</div>";
            header("Location: ".$urlka);
            exit();}       
        }
        else {$_SESSION['error2'] = "<div class='error'>Не все поля заполены, Пароль и логин только латиница и цифры</div>";
        header("Location: ".$urlka);
        exit();}   
    }
?>