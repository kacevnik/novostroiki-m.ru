<?php 
    include("../inc/db.php");

    if (isset($_POST['id']))        {$id = $_POST['id'];               $id = abs((int)$id);}
    if (isset($_POST['linestar']))  {$linestar = $_POST['linestar'];   $linestar = abs((int)$linestar);}
    if (isset($_POST['star']))      {$star = $_POST['star'];           $star = abs((int)$star);}
    
    if($linestar<0 or $linestar>5){unset($linestar);}
    if($star<0 or $star>5){unset($star);}
    
    if($id and $linestar and $star){
        $resIdNovostroiki = mysql_query("SELECT id,name FROM novostroj WHERE id='$id'",$db);
        if(mysql_num_rows($resIdNovostroiki)>0){
            $myrIDNovostroiki = mysql_fetch_assoc($resIdNovostroiki);
            $resStar = mysql_query("SELECT id,sum,stars FROM star WHERE id_novo='$id' AND line='$linestar'",$db);
            if(mysql_num_rows($resStar)>0){
                $myrStar = mysql_fetch_assoc($resStar);
                $sum = $myrStar["sum"] + $star;
                $stars = $myrStar["stars"] + 1;
                $idStar = $myrStar["id"];
                $upStar = mysql_query("UPDATE star SET sum='$sum',stars='$stars' WHERE id='$idStar'",$db);
                $nameCookieStar = "star[".$id.$linestar."]";
                setcookie($nameCookieStar,$star,time()+60*60*24,"/");
                $selNovostroiData[0]["id"] = $id;
                $selNovostroiData[0]["name"] = $myrIDNovostroiki["name"];
                $sessionName = "s".$id.$linestar;
                $_SESSION[$sessionName] = 1;                
                include("../inc/str_star.inc.php");
            }
            else{
                $addStar = mysql_query("INSERT INTO star(id_novo,line,sum,stars) VALUES ('$id','$linestar','$star','1')",$db);
                $nameCookieStar = "star[".$id.$linestar."]";
                setcookie($nameCookieStar,$star,time()+60*60*24,"/");
                $selNovostroiData[0]["id"] = $id;
                $selNovostroiData[0]["name"] = $myrIDNovostroiki["name"];
                $sessionName = "s".$id.$linestar;
                $_SESSION[$sessionName] = 1;
                include("../inc/str_star.inc.php");
            }    
        }
        else{
            echo "Ошибка запроса!";    
        }
    }
    else{
        echo "Ошибка запроса!";
    }
 ?>