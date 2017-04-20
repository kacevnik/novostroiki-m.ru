<?php    
    if (isset($_POST['id']))  {$id = $_POST['id'];  $id = abs((int)$id);}
    
    if($id){
        include("../inc/db.php");
        if($_COOKIE["izbr"]){
            foreach($_COOKIE["izbr"] as $key=>$value){
                if($key == $id){
                    $flag = 1;
                    $name = "izbr[".$id."]";
                    setcookie($name,"",time()-3600,'/');
                    break;                      
                }
                else{
                    $name = "izbr[".$id."]";
                    setcookie($name,$id,time()+100000000,'/');    
                }
            }
            if($flag == 1){
                foreach($_COOKIE["izbr"] as $i){
                    $i = abs((int)$i);
                    $sql = "SELECT id,name,alias FROM novostroj WHERE id='$i' AND id!='$id'";
                    $after = '<div class="history_star">
                            <h2>Избранные новостройки</h2>
                            <ul>';
                    $res = mysql_query($sql,$db);
                    if(mysql_num_rows($res)){
                        $myr = mysql_fetch_assoc($res);
                        $text = $text.'<li><span class="izbr_del" onclick="addMainIsbr('.$myr["id"].')"></span><a href="str.php?al='.$myr["alias"].'">'.$myr["name"].'</a></li>';
                    }
                    $before = '</ul></div>';    
                }
            }else{
                $sql = "SELECT id,name,alias FROM novostroj WHERE id='$id'";
                    $res = mysql_query($sql,$db);
                    if(mysql_num_rows($res)){
                        $myr = mysql_fetch_assoc($res);
                        $text = '<li><span class="izbr_del" onclick="addMainIsbr('.$myr["id"].')"></span><a href="str.php?al='.$myr["alias"].'">'.$myr["name"].'</a></li>';
                    }
                foreach($_COOKIE["izbr"] as $i){
                    $i = abs((int)$i);
                    $sql = "SELECT id,name,alias FROM novostroj WHERE id='$i'";
                    $after = '<div class="history_star">
                            <h2>Избранные новостройки</h2>
                            <ul>';                    
                    $res = mysql_query($sql,$db);
                    if(mysql_num_rows($res)){
                        $myr = mysql_fetch_assoc($res);
                        $text = $text.'<li><span class="izbr_del" onclick="addMainIsbr('.$myr["id"].')"></span><a href="str.php?al='.$myr["alias"].'">'.$myr["name"].'</a></li>';
                    }
                    $before = '</ul></div>';    
                }
            }           
        }
        else{
            $name = "izbr[".$id."]";
            setcookie($name,$id,time()+100000000,'/');
            $sql = "SELECT id,name,alias FROM novostroj WHERE id='$id'";
            $after = '<div class="history_star">
                            <h2>Избранные новостройки</h2>
                            <ul>';            
                    $res = mysql_query($sql,$db);
                    if(mysql_num_rows($res)){
                        $myr = mysql_fetch_assoc($res);
                        $text = '<li><span class="izbr_del" onclick="addMainIsbr('.$myr["id"].')"></span><a href="str.php?al='.$myr["alias"].'">'.$myr["name"].'</a></li>';
                    }
                    $before = '</ul></div>';  
        }
        echo $after.$text.$before;   
    }   
?>