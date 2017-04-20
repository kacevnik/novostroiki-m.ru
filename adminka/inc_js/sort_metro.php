<?php

    include("../inc/db.php");

    if (isset($_POST['text']))    {$text = $_POST['text'];         $text = trim(stripslashes(htmlspecialchars($text)));}
    
    if($text == ""){unset($text);}
    
    if($text){  
            $resPostMain = mysql_query("SELECT * FROM metro WHERE name LIKE '%$text%' AND idgorod='1'",$db);
            if(mysql_num_rows($resPostMain) > 0){
                $myrPostMain = mysql_fetch_array($resPostMain);
                do{
                   echo "<option value='".$myrPostMain["id"]."'>".$myrPostMain["name"]."</option>"; 
                }
                while($myrPostMain = mysql_fetch_array($resPostMain));
            }
            else{
                echo "Нет вариантов";
            }
            }

?> 