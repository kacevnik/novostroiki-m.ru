<?php 
    include("inc/db.php");
    
    $fin = 1;
    
    if (isset($_POST['submit_add_novo'])) {$submit_add_novo = $_POST['submit_add_novo'];    $submit_add_novo = trim(stripslashes(htmlspecialchars($submit_add_novo)));}
    if (isset($_POST['name_add_novo']))   {$name_add_novo = $_POST['name_add_novo'];        $name_add_novo = trim(stripslashes(htmlspecialchars($name_add_novo)));}
    if (isset($_POST['email_add_novo']))  {$email_add_novo = $_POST['email_add_novo'];      $email_add_novo = strtolower(trim(stripslashes(htmlspecialchars($email_add_novo))));}
    if (isset($_POST['text_add_novo']))   {$text_add_novo = $_POST['text_add_novo'];        $text_add_novo = trim(stripslashes(htmlspecialchars($text_add_novo)));}
    if (isset($_POST['capcha_add_novo'])) {$capcha_add_novo = $_POST['capcha_add_novo'];    $capcha_add_novo = trim(stripslashes(htmlspecialchars($capcha_add_novo)));}
    if (isset($_POST['phone_add_novo']))  {$phone_add_novo = $_POST['phone_add_novo'];      $phone_add_novo = trim(stripslashes(htmlspecialchars($phone_add_novo)));}
    
    if (preg_match("/^[A-z0-9]{4,4}$/",$capcha_add_novo)){$capcha_add_novo = $capcha_add_novo;}else{unset($capcha_add_novo);}
    
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$email_add_novo)){unset($email_add_novo);}else{$email_add_novo = $email_add_novo;}
      
    if($submit_add_novo){
        if($name_add_novo and $text_add_novo and $capcha_add_novo){
            if($capcha_add_novo == $_SESSION['capcha']){
                if($email_add_novo){
                    if(editPhone($phone_add_novo)){$phone = editPhone($phone_add_novo);}else{$phone = "Не указанно";}
                    $header = "From: \"".$myrow[name_site]."\" <".$myrow[adminemail].">";
                    $adminEmail = $myrow["adminemail"];
					$subject = "Новая новостройка";
                    $messagetelo = "<p><b>Название: </b>".$name_add_novo."</p><p><b>Описание: </b>".$text_add_novo."</p><p><b>E-mail: </b>".$email_add_novo."</p><p><b>Телефон: </b>".$phone."</p>";    
                    $subject2 = "Информация по Вашей заявке на новый обьект";
					mail($adminEmail,$subject,$messagetelo,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
                    $message2 = "<h3 style='margin:0 auto'>Ваша заявка принята</h3><p>В данный момент она находиться на рассмотрении.</p><p>Возможно, в скором времени с Вами свяжется администрация сайта
                     <a href='http://novostroiki-m.ru' target='_blank'>Novostroiki-M.RU</a>.</p><p>Спасибо!</p><br /><p>Это письмо сгенерировано
                      автоматически, отвечать на него не нужно:)</p>";
                    mail($email_add_novo,$subject2,$message2,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
                    $_SESSION['error2'] = '<div class="error plus">Ваш заявка принята</div>';
				    header("Location: add-novostroika.php");
				    exit();        
                }
                else{
                    $_SESSION['error'] = '<p class="error_reg">Заполните поле E-mail правильно</p>';
                    header("Location: add-novostroika.php");
                    exit();    
                }     
            }
            else{
                $_SESSION['error'] = '<p class="error_reg">Не верно введены символы с картинки!</p>';
                header("Location: add-novostroika.php");
                exit();    
            }    
        }
        else{
            $_SESSION['error'] = '<p class="error_reg">Заполните поля: Наименование, Описание, E-mail и проверочный код</p>';
            header("Location: add-novostroika.php");
            exit();           
        }    
    }

      
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title>Добавить новостройку в базу Novostroiki-m.ru</title>
    <meta name="keywords" content="Добавить новостройку в базу Novostroiki-m.ru" />
    <meta name="description" content="Добавить новостройку в базу Novostroiki-m.ru." />
</head>
<body>
	<div class="main">
<?php include("inc/top.inc.php"); ?>
		<div class="content">
<?php include("inc/main_map.inc.php");?>
<?php include("inc/filter.inc.php"); ?>
			<div class="content_page">           
<?php include("inc/add_novostroika.inc.php"); ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>