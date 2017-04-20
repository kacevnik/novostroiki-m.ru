<?php

    include("db.php");

    if (isset($_POST['data']))    {$data = $_POST['data'];         $data = trim(stripslashes(htmlspecialchars($data)));}
    
    if($text != 333){unset($text);}
    
    if($data){
        $data = date("Y-m-d");
            echo $data;   

            }

?>   
