<?php
	$sql = "SELECT id,user_email,date_message,phone,developer FROM phones WHERE date_message<'$time' AND pokaz='1' AND fon='1' ORDER BY id LIMIT 1";
    $res = mysql_query($sql, $db);
    if(mysql_num_rows($res) > 0){
        $myr = mysql_fetch_assoc($res);
        $adminEmail = $myrow["adminemail"];
        $name_company = $myr["developer"];
        $user_email = $myr["user_email"];
        $number_phone = $myr["phone"];
        $header = 'From: Novostroiki-m.ru <'.$adminEmail.'>';
        $phoneID = $myr["id"];
        $newTimesMessage = time() + 86400;
        $subject = "Напоменание об обновлении номера.";
        $messagetelo = "<p><b>Название компании: </b>".$name_company."</p><p><b>Номер: </b>".$number_phone."</p><p>Для обновления номера перейдите в свой кабинет на сайт <a href='http://novostroiki-m.ru/lk-phones.php' target='blank'>Novostroiki-m.ru</a></p><p>Пожалуйста, не отвечайте на это сообщение, оно было сгенерировано автоматически и только для информации.<br>Спаcибо.</p>";    
mail($user_email,$subject,$messagetelo,$header."\r\nContent-type:text/html;Charset=utf-8\r\n");
        $updata = mysql_query("UPDATE phones SET date_message='$newTimesMessage' WHERE id='$phoneID'",$db);    
    }
?>