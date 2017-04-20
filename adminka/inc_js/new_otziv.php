<?php

    include("../inc/db.php");

    if (isset($_POST['text']))    {$text = $_POST['text'];         $text = trim(stripslashes(htmlspecialchars($text)));}
    
    if($text == ""){unset($text);}
    
    if($text){
        
            echo trim(str2url($text));   

            }

?>   
