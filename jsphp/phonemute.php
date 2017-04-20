<?php
    include("../inc/db.php");
    
    if (isset($_POST['id'])){$id = $_POST['id'];$id = abs((int)$id);}
    if($id){
        $resUserData = mysql_query("SELECT user,fon FROM phones WHERE id='$id'",$db);
        if(mysql_num_rows($resUserData)>0){
            $myrUserData = mysql_fetch_assoc($resUserData);
            $fon = $myrUserData["fon"];
            $user = $myrUserData["user"];
            $resUserProverka = mysql_query("SELECT pass_reg,kod FROM user WHERE id='$user'",$db);
            if(mysql_num_rows($resUserProverka)>0){
                $myrUserProverka = mysql_fetch_assoc($resUserProverka);
                $proverka = $myrUserProverka["pass_reg"].$myrUserProverka["kod"];
                if($proverka == $_SESSION["admin"]){
                    if($fon == 1){
                        $updata = mysql_query("UPDATE phones SET fon='0' WHERE id='$id' AND user='$user'",$db);
                        echo 1;
                    }
                    else{
                        $updata = mysql_query("UPDATE phones SET fon='1' WHERE id='$id' AND user='$user'",$db);
                        echo 1;
                    }
                }
            }
        }
    }
    
?>