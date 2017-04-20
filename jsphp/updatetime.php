<?php
    include("../inc/db.php");
    
    if (isset($_POST['id'])){$id = $_POST['id'];$id = abs((int)$id);}
    if($id){
        $times = time();
        $resUserData = mysql_query("SELECT user,fon FROM phones WHERE id='$id' AND pokaz='1' AND '$times'>date",$db);
        if(mysql_num_rows($resUserData)>0){
            $myrUserData = mysql_fetch_assoc($resUserData);
            $fon = $myrUserData["fon"];
            $user = $myrUserData["user"];
            $resUserProverka = mysql_query("SELECT pass_reg,kod FROM user WHERE id='$user'",$db);
            if(mysql_num_rows($resUserProverka)>0){
                $myrUserProverka = mysql_fetch_assoc($resUserProverka);
                $proverka = $myrUserProverka["pass_reg"].$myrUserProverka["kod"];
                if($proverka == $_SESSION["admin"]){
                    $newTimes = $times + $myrow["up_number_phone"];
                    $updata = mysql_query("UPDATE phones SET date='$newTimes',date_message='$newTimes' WHERE id='$id' AND user='$user'",$db);
                    echo upDate($newTimes);
                }
            }
        }
    }
    
?>