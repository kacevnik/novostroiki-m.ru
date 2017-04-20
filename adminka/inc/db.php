<?php     
    include("config.php");
 
    $db = mysql_connect(HOST,ADMIN_DB,PASS_DB);
    mysql_query("SET NAMES 'utf8'",$db);
    mysql_select_db(NAME_DB,$db);
    
    $time = time();
    
    $result = mysql_query("SELECT * FROM mainset WHERE id='1'",$db);
    $myrow = mysql_fetch_array($result);
    
    include("function.php");
    
    include("lock.php");
    
    session_start();
    
?>