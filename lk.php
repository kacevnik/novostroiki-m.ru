<?php 
    include("inc/db.php");
    $fin = 1;
    $str = 1;
    $LKstr = 1;
    
    if(!$_SESSION["admin"]){header("Location: new_user.php"); exit();}
    
    if (isset($_POST['old_pass']))    {$old_pass = $_POST['old_pass'];       $old_pass = trim(stripslashes(htmlspecialchars($old_pass)));}  
    if (isset($_POST['new_pass']))    {$new_pass = $_POST['new_pass'];       $new_pass = trim(stripslashes(htmlspecialchars($new_pass)));}  
    if (isset($_POST['new_pass_w']))  {$new_pass_w = $_POST['new_pass_w'];   $new_pass_w = trim(stripslashes(htmlspecialchars($new_pass_w)));}  
    if (isset($_POST['submit']))      {$submit = $_POST['submit'];           $submit = trim(stripslashes(htmlspecialchars($submit)));}
    
    if (preg_match("/^[A-z0-9]{4,20}$/",$old_pass)){$old_pass = $old_pass;}else{unset($old_pass);}
    if (preg_match("/^[A-z0-9]{4,20}$/",$new_pass)){$new_pass = $new_pass;}else{unset($new_pass);}
    if (preg_match("/^[A-z0-9]{4,20}$/",$new_pass_w)){$new_pass_w = $new_pass_w;}else{unset($new_pass_w);}
    
    if($submit){
        if($old_pass and $new_pass and $new_pass_w){
            if($new_pass == $new_pass_w){
                $old_pass = md5($old_pass);
                $passProverka = substr($_SESSION["admin"], 0, 32);
                $kodProverka = substr($_SESSION["admin"], 32, 32);
                $selProverka = mysql_query("SELECT id FROM user WHERE pass_reg='$passProverka' AND kod='$kodProverka'",$db);
                if(mysql_num_rows($selProverka)>0){
                    $myrProverka = mysql_fetch_assoc($selProverka);
                    $IDuser = $myrProverka["id"];
                    if($old_pass == $passProverka){
                        $newPass = md5($new_pass);
                        $upPass = mysql_query("UPDATE user SET pass_reg='$newPass' WHERE id='$IDuser'",$db);
                        $_SESSION["admin"] = $newPass.$kodProverka;
                        header("Location: lk.php");
                        $_SESSION["error2"] = '<div class="error plus">Пароль изменен!</div>';
                        exit();    
                    }
                    else{
                        header("Location: lk.php");
                        $_SESSION["error2"] = '<div class="error">Старый пароль неверный</div>';
                        exit();    
                    }    
                }
                else{
                    header("Location: lk.php");
                    $_SESSION["error2"] = '<div class="error">Ошибка запроса!</div>';
                    exit();    
                }        
            }
            else{
                header("Location: lk.php");
                $_SESSION["error2"] = '<div class="error">Новые пароли не совпадают</div>';
                exit();    
            }    
        }
        else{
            header("Location: lk.php");
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
<?php include("inc/lk_content.inc.php"); ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>