<?php 
    include("inc/db.php");
    
    if($_SESSION["admin"]){header("Location: index.php"); exit();}
    
    $fin = 1;
    
    if (isset($_GET['np']))       {$np = $_GET['np'];            $np = trim(stripslashes(htmlspecialchars($np)));}
    if (preg_match("/^[A-z0-9]{64,64}$/",$np)){$np = $np;}else{unset($np);}
    
    if (isset($_POST['submit_new_pass']))   {$submit_new_pass = $_POST['submit_new_pass'];   $submit_new_pass = trim(stripslashes(htmlspecialchars($submit_new_pass)));}
    if (isset($_POST['email_pass']))        {$email_pass = $_POST['email_pass'];             $email_pass = trim(stripslashes(htmlspecialchars($email_pass)));}
    if (isset($_POST['capcha_pass']))       {$capcha_pass = $_POST['capcha_pass'];           $capcha_pass = strtolower(trim(stripslashes(htmlspecialchars($capcha_pass))));}
    
    if (isset($_POST['submit_new_pass2']))  {$submit_new_pass2 = $_POST['submit_new_pass2']; $submit_new_pass2 = trim(stripslashes(htmlspecialchars($submit_new_pass2)));}
    if (isset($_POST['new_pass1']))         {$new_pass1 = $_POST['new_pass1'];               $new_pass1 = trim(stripslashes(htmlspecialchars($new_pass1)));}
    if (isset($_POST['new_pass2']))         {$new_pass2 = $_POST['new_pass2'];               $new_pass2 = trim(stripslashes(htmlspecialchars($new_pass2)));}
    
    if (preg_match("/^[A-z0-9]{4,20}$/",$new_pass1)){$new_pass1 = $new_pass1;}else{unset($new_pass1);}
    if (preg_match("/^[A-z0-9]{4,20}$/",$new_pass2)){$new_pass2 = $new_pass2;}else{unset($new_pass2);}
    
    if (preg_match("/^[A-z0-9]{4,4}$/",$capcha_pass)){$capcha_pass = $capcha_pass;}else{unset($capcha_pass);}
    
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$email_pass)){unset($email_pass);}else{$email_pass = $email_pass;}
    
    if($submit_new_pass){
        if($email_pass){
            if($capcha_pass == $_SESSION['capcha']){
                $resKodPoEmail = mysql_query("SELECT metka,pass_reg,kod,login FROM user WHERE email='$email_pass'",$db);
                if(mysql_num_rows($resKodPoEmail) > 0){
                    $myrKodPoEmail = mysql_fetch_array($resKodPoEmail);
                    if($myrKodPoEmail['metka'] == 1){
                        $adminEmail = $myrow["adminemail"];
                        $pass = $myrKodPoEmail['pass_reg'];
                        $kod = $myrKodPoEmail['kod'];
                        $login = $myrKodPoEmail['login'];
                        $np = $pass.$kod;
                        $dateVosPass = time() + 86400;
                        $siteName = $myrow["name_site"];
                        $subject = "Восстановление пароля на сайте: Novostroiki-m.ru";
                        $header = 'From: Novostroiki-m.ru <'.$adminEmail.'>';
                        if($resDateVosPass = mysql_query("UPDATE user SET date_vos_pass='$dateVosPass' WHERE pass_reg='$pass' AND kod='$kod'",$db)){
       					    $url = "http://".$siteName."/new_pass.php?np=".$np."";
       					    $message = "<h2 style='text-align: center'>Восстановление пароля</h2><p>Ваш Логин: <b>".$login."</b></p><p>Для создания нового пароля для Вашего Аккаунта перейдите по ссылке:<br><a href='".$url."' target='blank'>Восстоновление пароля</a></p><p><b>Внимание ссылка действительна до: ".date("H:i d.m.Y",$dateVosPass)." (Сутки).</b></p><p>Пожалуйста, не отвечайте на это сообщение, оно было сгенерировано автоматически и только для информации.<br>Спасибо.</p>";
                            mail($email_pass,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
                            $_SESSION['error2'] = "<div class='error plus'>На Вашу почту отправлено письмо с инструкцией по восстановлению пароля. Спасибо.</div>";
       					    header("Location: new_pass.php");
       					    exit();
                        }
                        else{
                            $_SESSION['error'] = "<p class='error_reg'>Не правильный запрос, ссылка недействительна:(</p>";
                            header("Location: new_pass.php");
                            exit();                            
                        }       
                    }
                    else{
                        $_SESSION['error'] = "<p class='error_reg'>Аккаунт не активирован</p>";
                        header("Location: new_pass.php");
                        exit();   
                    }
                }
                else{
                    $_SESSION['error'] = "<p class='error_reg'>Пользователь с эл. почтой <i>".$email_pass."</i> не зарегистрирован на сайте</p>";
                    header("Location: new_pass.php");
                    exit();   
                }
            }
            else{
                $_SESSION['error'] = "<p class='error_reg'>Не верно введены символы с картинки!</p>";
                header("Location: new_pass.php");
                exit();
            }    
        }
        else{
            $_SESSION['error'] = "<p class='error_reg'>Поле Email не заполнено, или заполнено некорректно</p>";
            header("Location: new_pass.php");
            exit();
        }
    }
    
    if($np){
        $passProverka = substr($np, 0, 32);
        $kodProverka = substr($np, 32, 32);
        $resNewPass = mysql_query("SELECT date_vos_pass,email FROM user WHERE pass_reg='$passProverka' AND kod='$kodProverka'",$db);
        if(mysql_num_rows($resNewPass) > 0){
            $myrNewPass = mysql_fetch_array($resNewPass);
            $pokaz = 1;
            if(time() <= $myrNewPass["date_vos_pass"]){
                if($submit_new_pass2){
                    if($new_pass1 and $new_pass2){
                        if($new_pass1 == $new_pass2){
                            $loginUser = $myrNewPass["email"];
                            $pass1 = md5($new_pass1);
                            $kod =  md5(time());
                            if($resDateVosPass = mysql_query("UPDATE user SET date_vos_pass='0',pass_reg='$pass1',kod='$kod',count_bed_pass='0' WHERE email='$loginUser'",$db)){
                                $_SESSION['error2'] = "<div class='error plus'>Пароль изменен. Спасибо.</div>";
           					    header("Location: new_pass.php");
           					    exit();                            
                            }    
                        }
                        else{
                            $_SESSION['error'] = "<p class='error_reg'>Пароли не совпадают</p>";
                            header("Location: new_pass.php?np=".$np);
                            exit();                        
                        }   
                    }
                    else{
                        $_SESSION['error'] = "<p class='error_reg'>Не все поля заполены, Пароли только латиница и цифры</p>";
                        header("Location: new_pass.php?np=".$np);
                        exit();                    
                    }    
                }
            }
            else{
                $_SESSION['error'] = "<p class='error_reg'>Не правильный запрос, Жизнь ссылки закончилась.</p>";
                header("Location: new_pass.php");
                exit();                 
            }
        }
        else{
            $_SESSION['error'] = "<p class='error_reg'>Не правильный запрос, ссылка недействительна:(</p>";
            header("Location: new_pass.php");
            exit();            
        }    
    }
      
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title>Восстановление пароля</title>
    <meta name="keywords" content="Восстановление пароля Novostroiki-m.ru" />
    <meta name="description" content="Восстановление пароля Novostroiki-m.ru" />
</head>
<body>
	<div class="main">
<?php include("inc/top.inc.php"); ?>
		<div class="content">
<?php include("inc/main_map.inc.php");?>
<?php include("inc/filter.inc.php"); ?>
			<div class="content_page">           
<?php
    if($np){
        include("inc/new_pass_np_main_content.inc.php");
    }
    else{
        include("inc/new_pass_main_content.inc.php");    
    }     
?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>