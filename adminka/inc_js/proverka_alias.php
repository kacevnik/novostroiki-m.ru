<?php

    include("../inc/db.php");

    if (isset($_POST['text']))    {$text = $_POST['text'];         $text = trim(stripslashes(htmlspecialchars($text)));}
    
    if($text == ""){unset($text);}
    
    if($text){  
            $resPostMain = mysql_query("SELECT id FROM novostroj WHERE alias='$text'",$db);
            if(mysql_num_rows($resPostMain) > 0){
                echo "<img src='img/publish_x.png'  style='margin: 0 0 -2px 8px;'/>";
            }
            else{
                echo "<img src='img/tick.png'  style='margin: 0 0 -2px 8px;'/>";   
            }
            }

?> 