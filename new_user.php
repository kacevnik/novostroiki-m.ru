<?php 
    include("inc/db.php");
    if($_SESSION["admin"]){header("Location: index.php"); exit();}
    $fin = 1;
    
    if (isset($_GET['p']))       {$p = $_GET['p'];            $p = trim(stripslashes(htmlspecialchars($p)));}
    if (preg_match("/^[A-z0-9]{64,64}$/",$p)){$p = $p;}else{unset($p);}
    
    if($p){
        $passProverka = substr($p, 0, 32);
        $kodProverka = substr($p, 32, 32);
        $resP = mysql_query("SELECT metka,login,email FROM user WHERE pass_reg='$passProverka' AND kod='$kodProverka'",$db);
        if(mysql_num_rows($resP) > 0){
            $myrP = mysql_fetch_array($resP);
            if($myrP["metka"] == 0){
                $loginUser = $myrP["login"];
                $loginEmail = $myrP["email"];
                $upMetkaUser = mysql_query("UPDATE user SET metka='1' WHERE pass_reg='$passProverka' AND kod='$kodProverka'");
                $upP = mysql_query("UPDATE sub_email SET flag='1' WHERE email='$loginEmail'",$db);
                $siteName = $myrow["name_site"];
                $adminEmail = $myrow["adminemail"];
                $subject = "Новый пользователь(Сайт): Novostroiki-m.ru";
                $header = "From: \"".$siteName."\" ".$adminEmail;
                $message = "<p>Здравствуйте, Administrator!<br>Новый пользователь на сайте</p><p>Логин: ".$loginUser."<br>E-mail: ".$loginEmail."</p>";
                mail($adminEmail,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
                $_SESSION['error2'] = "<div class='error plus'>Регистрация пользователя <b>".$loginUser."</b> подтверждена. Теперь Вы можете зайти на сайт</div>";
                header("Location: new_user.php");
                exit();
            }
            else {$_SESSION['error2'] = "<div class='error'>Данный аккаунт уже активирован, ссылка недействительна:(</div>";
            header("Location: new_user.php");
            exit();}
        }
        else {$_SESSION['error2'] = "<div class='error'>Неправильный запрос:(</div>";
        header("Location: new_user.php");
        exit();}   
    }
    
    if (isset($_POST['submit_new_user']))   {$submit_new_user = $_POST['submit_new_user']; $submit_new_user = trim(stripslashes(htmlspecialchars($submit_new_user)));}
    if (isset($_POST['login_reg']))         {$login_reg = $_POST['login_reg'];             $login_reg = trim(stripslashes(htmlspecialchars($login_reg)));}
    if (isset($_POST['email_reg']))         {$email_reg = $_POST['email_reg'];             $email_reg = strtolower(trim(stripslashes(htmlspecialchars($email_reg))));}
    if (isset($_POST['pass_reg']))          {$pass_reg = $_POST['pass_reg'];               $pass_reg = trim(stripslashes(htmlspecialchars($pass_reg)));}
    if (isset($_POST['pass_w_reg']))        {$pass_w_reg = $_POST['pass_w_reg'];           $pass_w_reg = trim(stripslashes(htmlspecialchars($pass_w_reg)));}
    if (isset($_POST['capcha_reg']))        {$capcha_reg = $_POST['capcha_reg'];           $capcha_reg = strtolower(trim(stripslashes(htmlspecialchars($capcha_reg))));}
    
    if (preg_match("/^[A-z0-9]{4,20}$/",$pass_reg)){$pass_reg = $pass_reg;}else{unset($pass_reg);}
    if (preg_match("/^[A-z0-9]{4,20}$/",$login_reg)){$login_reg = $login_reg;}else{unset($login_reg);}
    
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$email_reg)){unset($email_reg);}else{$email_reg = $email_reg;}
    
    $login_reg2 = strtolower($login_reg);
    
    if($submit_new_user){
        if($email_reg and $pass_reg and $capcha_reg and $pass_w_reg and $login_reg){
            if($capcha_reg == $_SESSION['capcha']){
                if($pass_reg == $pass_w_reg){
				    $resProEmailUser = mysql_query("SELECT email FROM user WHERE email='$email_reg'",$db);
				    if(mysql_num_rows($resProEmailUser) == false){
				        $resProEmailLogin = mysql_query("SELECT login FROM user WHERE login2='$login_reg2'",$db);
				        if(mysql_num_rows($resProEmailLogin) == false){
                            $parol = $pass_reg;
                            $pass_reg = md5($pass_reg);
                            $kod =  md5($time);
                            $metka = 1;
                            $p = $pass_reg.$kod;
                            $siteName = $myrow["name_site"];
                            $adminEmail = $myrow["adminemail"];
    					    $resultnewlogin = mysql_query("INSERT INTO user(login,login2,email,pass_reg,kod) VALUES ('$login_reg','$login_reg2','$email_reg','$pass_reg','$kod')",$db);
                            $resProverka = mysql_query("SELECT id FROM sub_email WHEHE email='$email_reg'",$db);
                            if(mysql_num_rows($resProverka) == 0){
                                $resultNewEmail = mysql_query("INSERT INTO sub_email(email,flag,date,date_del,kod) VALUES ('$email_reg','0','$time','0','$kod')",$db);    
                            }                           
    					    $subject = "Подтверждение регистрации на сайте: Novostroiki-m.ru";
                            $header = 'From: Novostroiki-m.ru <'.$adminEmail.'>';
    					    $url = "http://".$siteName."/login.php?p=".$p."";
    					    $message = "<h2 style='text-align: center'>Благодарим Вас за регистрацию на сайте</h2><p>Ваш Логин: ".$login_reg."<br>Ваш пароль: ".$parol."</p><p>Для подтверждения регистрации, перейдите по ссылке:<br><a href='http://".$siteName."/new_user.php?p=".$p."' target='blank'>Подтверждение регистрации</a></p><p>Пожалуйста, не отвечайте на это сообщение, оно было сгенерировано автоматически и только для информации.<br>Спаcибо.</p>";
                            mail($email_reg,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
                            $_SESSION['error2'] = '<div class="error plus">На указанную почту отправлено письмо с подтверждением регистрации. Спасибо.</div>';
    					    header("Location: new_user.php");
    					    exit();
                        }
                        else {$_SESSION['error'] = '<p class="error_reg">Пользователь с логином <i>'.$login_reg.'</i> уже зарегистрирован на сайте!</p>';
                        header("Location: new_user.php");
                        exit();} 
                    }
                    else {$_SESSION['error'] = '<p class="error_reg">Пользователь с эл. почтой <i>'.$email_reg.'</i> уже зарегистрирован на сайте!</p>';
                    header("Location: new_user.php");
                    exit();}  
                }
                else {$_SESSION['error'] = '<p class="error_reg">Пароли не совпадают!</p>';
                header("Location: new_user.php");
                exit();}                  
            }
            else {$_SESSION['error'] = '<p class="error_reg">Не верно введены символы с картинки!</p>';
            header("Location: new_user.php");
            exit();}             
        }
        else {$_SESSION['error'] = '<p class="error_reg">Не все поля заполены, Пароль и логин только латиница и цифры!</p>';
        header("Location: new_user.php");
        exit();}        
    }
      
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title>Регистрация на сайте</title>
    <meta name="keywords" content="Регистрация на сайте" />
    <meta name="description" content="Регистрация на сайте" />
</head>
<body>
	<div class="main">
<?php include("inc/top.inc.php"); ?>
		<div class="content">
<?php include("inc/main_map.inc.php");?>
<?php include("inc/filter.inc.php"); ?>
			<div class="content_page">           
<?php include("inc/new_user_main_content.inc.php"); ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>