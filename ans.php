<?php 
    include("inc/db.php");
    
    $fin = 1;
    $str = 5;
    
    if (isset($_POST['submit_message'])) {$submit_message = $_POST['submit_message'];    $submit_message = trim(stripslashes(htmlspecialchars($submit_message)));}
    if (isset($_POST['name_message']))   {$name_message = $_POST['name_message'];        $name_message = trim(stripslashes(htmlspecialchars($name_message)));}
    if (isset($_POST['email_message']))  {$email_message = $_POST['email_message'];      $email_message = strtolower(trim(stripslashes(htmlspecialchars($email_message))));}
    if (isset($_POST['text_message']))   {$text_message = $_POST['text_message'];        $text_message = trim(stripslashes(htmlspecialchars($text_message)));}
    if (isset($_POST['capcha_message'])) {$capcha_message = $_POST['capcha_message'];    $capcha_message = trim(stripslashes(htmlspecialchars($capcha_message)));}
    
    if (preg_match("/^[A-z0-9]{4,4}$/",$capcha_message)){$capcha_message = $capcha_message;}else{unset($capcha_message);}
    
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$email_message)){unset($email_message);}else{$email_message = $email_message;}
    
    if($submit_message){
        if($name_message and $text_message and $capcha_message){
            if($capcha_message == $_SESSION['capcha']){
                if($email_message){
                    $adminEmail = $myrow["adminemail"];
				    $subject = "Сообщение с сайта Novostroiki-m.ru";
                    $header = 'From: Novostroiki-m.ru <'.$adminEmail.'>';
				    $message = "<p>Написал: <i>".$name_message."</i><br>E-mail адрес: <i>".$email_message."</i></p><p>Текст сообщения:<br>".$text_message."</p><p>Пожалуйста, не отвечайте на это сообщение, оно было сгенерировано автоматически и только для информации.<br>Спаcибо.</p>";
                    mail($adminEmail,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
                    $_SESSION['error2'] = '<div class="error plus">Ваше сообщение отправленно администрации сайта. Спасибо.</div>';
				    header("Location: ans.php");
				    exit();        
                }
                else{
                    $_SESSION['error'] = '<p class="error_reg">Заполните поле E-mail правильно</p>';
                    header("Location: ans.php");
                    exit();    
                }     
            }
            else{
                $_SESSION['error'] = '<p class="error_reg">Не верно введены символы с картинки!</p>';
                header("Location: ans.php");
                exit();    
            }    
        }
        else{
            $_SESSION['error'] = '<p class="error_reg">Не все поля заполены</p>';
            header("Location: ans.php");
            exit();           
        }
    }
      
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title>Обратная связь Novostroiki-m.ru</title>
    <meta name="keywords" content="Обратная связь Novostroiki-m.ru" />
    <meta name="description" content="Если Вы хотите отправить нам сообщение, воспользуйтесь формой обратной связи." />
</head>
<body>
	<div class="main">
<?php include("inc/top.inc.php"); ?>
		<div class="content">
<?php include("inc/main_map.inc.php");?>
<?php include("inc/filter.inc.php"); ?>
			<div class="content_page">           
<?php include("inc/message.inc.php"); ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>