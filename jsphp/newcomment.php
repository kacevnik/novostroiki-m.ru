<?php
    include("../inc/db.php");
    
    $time = time();
        
    if (isset($_POST['id']))         {$id = $_POST['id'];                $id = abs((int)$id);}
    if (isset($_POST['text']))       {$text = $_POST['text'];            $text = trim(stripslashes(htmlspecialchars($text)));}
    if (isset($_POST['otvet']))      {$otvet = $_POST['otvet'];          $otvet = abs((int)$otvet);}
    if (isset($_POST['type']))       {$type = $_POST['type'];            $type = abs((int)$type);}
    if (isset($_POST['user']))       {$user = $_POST['user'];            $user = trim(stripslashes(htmlspecialchars($user)));}
    if($type == 1){$urlLink = "str.php";}else{$urlLink = "view_company.php.php";}
    
    if($type == 1 || $type == 2){}else{exit();}
    
    if($user != ""){
        if($text != ""){
            if($type == 1){
                $resDataNovostroiki = mysql_query("SELECT alias,name FROM novostroj WHERE id='$id' AND pokaz='1'",$db);
            }
            else{
                $resDataNovostroiki = mysql_query("SELECT alias,name FROM compani WHERE id='$id' AND pokaz='1'",$db);
            }
            if(mysql_num_rows($resDataNovostroiki) > 0){
                $myrDataNovostroiki = mysql_fetch_assoc($resDataNovostroiki);
                $nameAlias = $myrDataNovostroiki['alias'];
                $nameNovo = $myrDataNovostroiki['name'];
            }
            else{
                exit();
            }
            if($otvet == 0){
                $res = mysql_query("SELECT id,num FROM comments WHERE id_novostroi='$id' AND type='$type'",$db);
                if(mysql_num_rows($res) > 0){
                    $myr = mysql_fetch_assoc($res);
                    do{
                        $idComments = $myr["id"];
                        $numCom = $myr["num"] + 1;
                        $upNumComments = mysql_query("UPDATE comments SET num='$numCom' WHERE id_novostroi='$id' AND id='$idComments' AND type='$type'",$db);   
                    }   
                    while($myr = mysql_fetch_assoc($res)); 
                }
                $resultnewcomment = mysql_query("INSERT INTO comments(id_novostroi,name_user,step,num,date,text,pokaz,type) VALUES ('$id','$user',$otvet,'1','$time','$text','1','$type')",$db);
//Отправка письма администратору
                $resIdComment = mysql_query("SELECT id FROM comments WHERE num='1' AND id_novostroi='$id' AND type='$type'",$db);
                $myrIdComment = mysql_fetch_assoc($resIdComment);
                $myrIdCom = $myrIdComment["id"];           
                $siteName = $myrow["name_site"];
                $adminEmail = $myrow["adminemail"];
                $subject = "Новый Комментарий: Novostroiki-m.ru";
                $header = 'From: Novostroiki-m.ru<'.$adminEmail.'>';
                $message = "<p>Здравствуйте, Administrator!<br>На сайте новый комментарий в статье: <a href='http://novostroiki-m.ru/".$urlLink."?al=".$nameAlias."'>".$nameNovo."</a></p><p><b>Пользователь:</b> ".$user."</p><p><b>Комментарий:</b><i> ".$text."</i></p><p><a href='http://novostroiki-m.ru/comment/del_comment.php?com=".$myrIdCom."' style='color: red;'>Удалить комментарий</p>";
                mail($adminEmail,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
            }
            else{
                $resStepCom = mysql_query("SELECT step,num FROM comments WHERE id='$otvet' AND type='$type'",$db);
                $myrStepCom =  mysql_fetch_assoc($resStepCom);
                $firstNum = $myrStepCom["num"];
                $firstStep = $myrStepCom["step"] + 1;
                $res = mysql_query("SELECT id,num FROM comments WHERE id_novostroi='$id' AND num>'$firstNum' AND type='$type'",$db);
                $firstNum++;
                if(mysql_num_rows($res)> 0){
                        $myr = mysql_fetch_assoc($res);
                    do{
                        $idComments = $myr["id"];
                        $numCom = $myr["num"] + 1;
                        $upNumComments = mysql_query("UPDATE comments SET num='$numCom' WHERE id_novostroi='$id' AND id='$idComments' AND type='$type'",$db);   
                    }   
                    while($myr = mysql_fetch_assoc($res));
                    $resultnewcomment = mysql_query("INSERT INTO comments(id_novostroi,name_user,step,num,date,text,pokaz,type) VALUES ('$id','$user',$firstStep,'$firstNum','$time','$text','0','$type')",$db);
                }
                else{
                    $resultnewcomment = mysql_query("INSERT INTO comments(id_novostroi,name_user,step,num,date,text,pokaz,type) VALUES ('$id','$user',$firstStep,'$firstNum','$time','$text','0','$type')",$db);    
                }
                $resIdComment = mysql_query("SELECT id FROM comments WHERE pokaz='0' AND id_novostroi='$id' AND type='$type'",$db);
                $myrIdComment = mysql_fetch_assoc($resIdComment);
                $myrIdCom = $myrIdComment["id"];
                $upPokazComm= mysql_query("UPDATE comments SET pokaz='1' WHERE id_novostroi='$id' AND id='$myrIdCom'",$db);           
                $siteName = $myrow["name_site"];
                $adminEmail = $myrow["adminemail"];
                $subject = "Новый Комментарий: Novostroiki-m.ru";
                $header = 'From: Novostroiki-m.ru<'.$adminEmail.'>';
                $message = "<p>Здравствуйте, Administrator!<br>На сайте новый комментарий в статье: <a href='http://novostroiki-m.ru/".$urlLink."?al=".$nameAlias."'>".$nameNovo."</a></p><p><b>Пользователь:</b> ".$user."</p><p><b>Комментарий:</b><i> ".$text."</i></p><p><a href='http://novostroiki-m.ru/comment/del_comment.php?com=".$myrIdCom."' style='color: red;'>Удалить комментарий</p>";
                mail($adminEmail,$subject,$message,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
            }
            
            echo "<h1>Ваш комментарий добавлен! Спасибо</H1>";
        }
        else{echo '<form method="post" action="" style="margin-bottom: -15px;">
                                        <div class="com_form_div">
                                            <label class="control-label">
                                                Ваше Имя:
                                            </label><br />
                                            <input type="text" name="usernamecomm" id="usernamecomm" /><br />
                                            <label class="control-label">
                                                Ваш комментарий:
                                            </label><strong style="color: red;">Заполнети поле комментария</strong>
                                            <div class="controls">
                                                <textarea id="textotziv" maxlength="2000" name="commenytext">'.$text.'</textarea>
                                            </div>
                                        </div>                                        
                                            <a onclick="newcomment('.$id.', '.$otvet.', '.$type.'" class="reg_sub">Отправить сообщение</a>
                                    </form>';}
    }
    else{echo '<form method="post" action="" style="margin-bottom: -15px;">
                                        <div class="com_form_div">
                                            <label class="control-label">
                                                Ваше Имя:
                                            </label><strong style="color: red;">Заполните поле Имя</strong><br />
                                            <input type="text" name="usernamecomm" id="usernamecomm" /><br />
                                            <label class="control-label">
                                                Ваш комментарий:
                                            </label>
                                            <div class="controls">
                                                <textarea id="textotziv" maxlength="2000" name="commenytext">'.$text.'</textarea>
                                            </div>
                                        </div>                                        
                                            <a onclick="newcomment('.$id.', '.$otvet.', '.$type.'" class="reg_sub">Отправить сообщение</a>
                                    </form>';}
?>