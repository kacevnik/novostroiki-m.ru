<?php 
    include("inc/db.php");
    $fin = 1;
    $str = 1;
    $LKstr = 2;
    
    if(!$_SESSION["admin"]){header("Location: new_user.php"); exit();}
    
    $passProverka = substr($_SESSION["admin"], 0, 32);
    $kodProverka = substr($_SESSION["admin"], 32, 32);
    
    $resUserID = mysql_query("SELECT id,email FROM user WHERE pass_reg='$passProverka' AND kod='$kodProverka' AND metka='1'",$db);
    $myrUserID = mysql_fetch_assoc($resUserID); $userID = $myrUserID['id']; $userEmail = $myrUserID['email'];
    
    if (isset($_GET['del']))              {$del = $_GET['del'];                      $del = abs((int)$del);}
    if (isset($_GET['upd']))              {$upd = $_GET['upd'];                      $upd = abs((int)$upd);}
    if($upd){
        $resProverkaUpdate = mysql_query("SELECT novostroika,developer,phone,comment,fon FROM phones WHERE id='$upd' AND user='$userID'",$db);
        if(mysql_num_rows($resProverkaUpdate)>0){
            $myrProverkaUpdate = mysql_fetch_assoc($resProverkaUpdate);
            $valueObj = $myrProverkaUpdate["novostroika"]; 
            $nameCompany = $myrProverkaUpdate["developer"]; 
            $phonesUP = $myrProverkaUpdate["phone"]; 
            $textsUP = $myrProverkaUpdate["comment"]; 
            $fonUP = $myrProverkaUpdate["fon"];  
            $resNameObj = mysql_query("SELECT name FROM novostroj WHERE id='$valueObj'",$db);
            if(mysql_num_rows($resNameObj)>0){
                $myrNameObj = mysql_fetch_assoc($resNameObj);
                $nameObj = $myrNameObj["name"];    
            }
            else{
                $nameObj = "Выбрать новостройку";    
            } 
        }
        else{unset($upd);}    
    }
    
    
    if($del){
        $resDeleteIDnovostroika  = mysql_query("SELECT id FROM phones WHERE id='$del' AND user='$userID'",$db);
        if(mysql_num_rows($resDeleteIDnovostroika)>0){
            $deleteNumber = mysql_query("DELETE FROM phones WHERE id='$del'",$db);
            header("Location: lk-phones.php");
            $_SESSION["error2"] = '<div class="error plus">Номер удален</div>';
            exit();    
        }    
    }
    
    if (isset($_POST['obj']))             {$obj = $_POST['obj'];                     $obj = abs((int)$obj);}  
    if ($obj == 0){unset($obj);}  
    if (isset($_POST['name_company']))    {$name_company = $_POST['name_company'];   $name_company = trim(stripslashes(htmlspecialchars($name_company)));}  
    if (isset($_POST['number_phone']))    {$number_phone = $_POST['number_phone'];   $number_phone = trim(stripslashes(htmlspecialchars($number_phone)));}  
    if (isset($_POST['text_comm']))       {$text_comm = $_POST['text_comm'];         $text_comm = trim(stripslashes(htmlspecialchars($text_comm)));}
    if (isset($_POST['check']))           {$check = $_POST['check'];                 $check = trim(stripslashes(htmlspecialchars($check)));}
    if ($check == "on"){$check = 1;}else{$check = 0;}
    if (isset($_POST['submit']))          {$submit = $_POST['submit'];               $submit = trim(stripslashes(htmlspecialchars($submit)));}
    if (isset($_POST['submitup']))        {$submitup = $_POST['submitup'];           $submitup = trim(stripslashes(htmlspecialchars($submitup)));}

    $obgRes = mysql_query("SELECT name FROM novostroj WHERE id='$obj' AND pokaz='1'",$db);
    if(mysql_num_rows($obgRes)>0){$obj = $obj;$objMyrName = mysql_fetch_assoc($obgRes);$novostroika =$objMyrName['name'];}else{unset($obj);}
    
    
    if (editPhone($number_phone)){$number_phone = editPhone($number_phone);}else{unset($number_phone);}
       
    if($submit){
        if($name_company and $number_phone and $obj){
            $resCheckCountInAccaunt = mysql_query("SELECT phone FROM phones WHERE user='$userID'",$db);
            if(mysql_num_rows($resCheckCountInAccaunt)<3){
                $resCheckNumberPhone = mysql_query("SELECT id FROM phones WHERE phone='$number_phone' AND novostroika='$obj'",$db);
                if(mysql_num_rows($resCheckNumberPhone)== 0){
                    if($check == 1){$podpiska = 'Да';}else{$podpiska = 'Нет';}
                    $add_date = time();
                    $message_date = $add_date + 360;
                    $insNumberPhone = mysql_query("INSERT INTO phones(novostroika,user,developer,phone,add_date,comment,pokaz,fon,user_email,date,date_message) VALUES ('$obj','$userID','$name_company','$number_phone','$add_date','$text_comm','0','$check','$userEmail','$add_date','$message_date')",$db);
                    $header = "From: \"".$myrow[name_site]."\" <".$myrow[adminemail].">";
                    $adminEmail = $myrow["adminemail"];
					$subject = "Новый Номер";
                    $messagetelo = "<p><b>Название компании: </b>".$name_company."</p><p><b>Номер: </b>".$number_phone."</p><p><b>E-mail пользователя: </b>".$userEmail."</p><p><b>Новостройка: </b>".$novostroika."</p><p><b>Комментарий: </b>".$text_comm."</p><p><b>Подписка: </b>".$podpiska."</p>";    
					mail($adminEmail,$subject,$messagetelo,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
                    $_SESSION['error2'] = '<div class="error plus">Новый номер добавлен!</div>';
				    header("Location: lk-phones.php");
				    exit();    
                }
                else{
                    header("Location: lk-phones.php");
                    $_SESSION["error2"] = '<div class="error">Данный номер для этого объекта есть</div>';
                    exit();    
                } 
            }
            else{
                header("Location: lk-phones.php");
                $_SESSION["error2"] = '<div class="error">Достигнут лимит номеров</div>';
                exit();    
            }                  
        }
        else{
            header("Location: lk-phones.php");
            $_SESSION["error2"] = '<div class="error">Заполните правильно все поля</div>';
            exit();    
        }    
    }
    
    if($submitup){
        if($name_company and $number_phone and $obj and $upd){
            $resCheckCountInAccaunt = mysql_query("SELECT phone FROM phones WHERE user='$userID'",$db);
            if(mysql_num_rows($resCheckCountInAccaunt)<3){
                $resCheckNumberPhone = mysql_query("SELECT id FROM phones WHERE phone='$number_phone' AND novostroika='$obj' AND id!='$upd'",$db);
                if(mysql_num_rows($resCheckNumberPhone)== 0){
                    if($check == 1){$podpiska = 'Да';}else{$podpiska = 'Нет';}
                    $insNumberPhone = mysql_query("UPDATE phones SET developer='$name_company',phone='$number_phone',comment='$text_comm',novostroika='$obj',fon='$check',pokaz='0',error='0' WHERE id='$upd'",$db);
                    $izm = "";
                    if($nameCompany != $name_company){$izm = $izm." Имя компании";}
                    if($valueObj != $obj){$izm = $izm."- Новостройка";}
                    if($phonesUP != $number_phone){$izm = $izm."- Номер телефона";}
                    if($textsUP != $text_comm){$izm = $izm."- Комментарий";}
                    if($izm == ""){$izm = "Нет";}
                    $header = "From: \"".$myrow[name_site]."\" <".$myrow[adminemail].">";
                    $adminEmail = $myrow["adminemail"];
					$subject = "Изменения номера";
                    $messagetelo = "<p><b>Название компании: </b>".$name_company."</p><p><b>Номер: </b>".$number_phone."</p><p><b>E-mail пользователя: </b>".$userEmail."</p><p><b>Новостройка: </b>".$novostroika."</p><p><b>Комментарий: </b>".$text_comm."</p><p><b>Подписка: </b>".$podpiska."</p><p><b>Изменения: </b>".$izm."</p>";    
					mail($adminEmail,$subject,$messagetelo,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
                    $_SESSION['error2'] = '<div class="error plus">Изменения сохранены!</div>';
				    header("Location: lk-phones.php");
				    exit();    
                }
                else{
                    header("Location: lk-phones.php?upd=".$upd);
                    $_SESSION["error2"] = '<div class="error">Данный номер для этого объекта есть</div>';
                    exit();    
                } 
            }
            else{
                header("Location: lk-phones.php?upd=".$upd);
                $_SESSION["error2"] = '<div class="error">Достигнут лимит номеров</div>';
                exit();    
            }                  
        }
        else{
            header("Location: lk-phones.php?upd=".$upd);
            $_SESSION["error2"] = '<div class="error">Заполните правильно все поля</div>';
            exit();    
        }    
    }

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>    
    <title>Личный кабинет пользователя:</title>
    <meta name="keywords" content="Личный кабинет пользователя" />
    <meta name="description" content="Личный кабинет пользователя" />
</head>
<body>
	<div class="main">
<?php include("inc/top.inc.php"); ?>
		<div class="content">
<?php include("inc/main_map.inc.php");?>
<?php include("inc/filter.inc.php"); ?>
			<div class="content_page">
<?php echo $_SESSION["error2"]; unset($_SESSION["error2"]); ?>
<?php include("inc/left.inc.php"); ?>            
<?php if($upd){include("inc/lk_content_phones_up.inc.php");}else{include("inc/lk_content_phones.inc.php");}  ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>