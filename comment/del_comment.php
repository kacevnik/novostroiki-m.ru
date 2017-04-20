<?php 

    include("../inc/db.php");

    if (isset($_GET['com']))         {$com = $_GET['com'];                $com = abs((int)$com);}
    
    if (isset($_POST['kod']))        {$kod = $_POST['kod'];               $kod = trim(stripslashes(htmlspecialchars($kod)));}
    if (isset($_POST['submit']))     {$submit = $_POST['submit'];         $submit = trim(stripslashes(htmlspecialchars($submit)));}

    if($submit){
    if($com and $submit and $kod){
        $propusk = date("H", time());
        $propusk = $propusk."9564";
        if($propusk == $kod){
            $res = mysql_query("SELECT id_novostroi FROM comments WHERE id = '$com'",$db);
            if(mysql_num_rows($res)){
                $myr = mysql_fetch_assoc($res);
                $idNovo = $myr["id_novostroi"];
                
                $delComm = mysql_query("DELETE FROM comments WHERE id = '$com'",$db);
                
                $resNum = mysql_query("SELECT id FROM comments WHERE id_novostroi='$idNovo' ORDER BY num",$db);
                if(mysql_num_rows($resNum)>0){
                    $myrNum = mysql_fetch_assoc($resNum);
                    $count = 1;
                    do{
                        $comId = $myrNum["id"];
                        $upNumComment = mysql_query("UPDATE comments SET num='$count' WHERE id='$comId'",$db); 
                        $count++; 
                    }
                    while($myrNum = mysql_fetch_assoc($resNum));
                }

            }
            
            $_SESSION['error'] = "<div class='error plus'>Удалено</div>";
            header("Location: ../index.php");            
            exit();         

        }
        else{
            $_SESSION['error'] = "<div class='error'>Ошибка ;(</div>";
            header("Location: ../index.php");
            exit();
        }
    }
    else{
        $_SESSION['error'] = "<div class='error'>Ошибка :(</div>";
        header("Location: ../index.php");
        exit();
    }
    }
?>
<form method="post">
    <p><input type="text" name="kod"/></p>
    <p><input type="submit" name="submit" /></p>
</form>