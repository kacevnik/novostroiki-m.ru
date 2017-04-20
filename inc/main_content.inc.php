<?php 
    if($str == 1){include("inc/index_content.inc.php");}
    elseif($str == 2){
        if($al){
            include("inc/str_content.inc.php");    
        }
        else{
            include("inc/baza_content.inc.php");    
        }        
    }
    else{
        include("inc/index_content.inc.php");
    }
?>