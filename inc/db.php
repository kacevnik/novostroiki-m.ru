<?php 
    
    include("config.php");
    $db = mysql_connect(HOST,ADMIN_DB,PASS_DB);
    mysql_query("SET NAMES 'utf8'",$db);
    mysql_select_db(NAME_DB,$db);
    
    $result = mysql_query("SELECT * FROM mainset WHERE id='1'",$db);
    $myrow = mysql_fetch_array($result);
    
    $urlka = $_SERVER['HTTP_REFERER'];
    $time = time();
    $ip = $_SERVER['REMOTE_ADDR'];
    $url_capcha = 'https://www.google.com/recaptcha/api/siteverify';
    $secret_capcha = '6LcLRB0UAAAAAAhq7yWGjCZ6osuok5tjQgk7UAMi';
    
    include("message_phone.inc.php");
    
    include("function.php");
    
    include("sub_new_novo.inc.php");
?>