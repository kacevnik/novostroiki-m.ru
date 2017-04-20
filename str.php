<?php 
    include("inc/db.php");
    $fin = 1;
    $str = 2;
    if (isset($_GET['al']))       {$al = $_GET['al'];            $al = trim(stripslashes(htmlspecialchars($al)));}
    if (isset($_GET['op']))       {$op = $_GET['op'];            $op = trim(stripslashes(htmlspecialchars($op)));}
    
    if (selNovostroiData($al)){$selNovostroiData = selNovostroiData($al);}else{$_SESSION['error2'] = "<div class='error'>Ошибка</div>";header("Location: baza.php");exit();}
    
    $nameCookie = "history[".$selNovostroiData[0]["id"]."]";
    setcookie($nameCookie,time(),time()+60*60*24*365,"/");
    
    if($_COOKIE["history"]){
        arsort($_COOKIE["history"]);
        $i = 0;
        foreach ($_COOKIE["history"] as $key => $val) {
            $i++;
            if($i>6){
                $nameCookie = "history[".$key."]";
                setcookie($nameCookie,"",time()-60,"/");
            }
        }
    }
    
    $title = explode("||",$selNovostroiData[0]["title"]);
    $meta_k = explode("||",$selNovostroiData[0]["meta_k"]);
    $meta_d = explode("||",$selNovostroiData[0]["meta_d"]);
    if($op == "forum"){
        if($title[1]){$title = $title[1];}else{$title = $title[0];}        
        if($meta_k[1]){$meta_k = $meta_k[1];}else{$meta_k = $meta_k[0];}        
        if($meta_d[1]){$meta_d = $meta_d[1];}else{$meta_d = $meta_d[0];}        
    }
    elseif($op == "foto"){
        if($title[2]){$title = $title[2];}else{$title = $title[0];}        
        if($meta_k[2]){$meta_k = $meta_k[2];}else{$meta_k = $meta_k[0];}        
        if($meta_d[2]){$meta_d = $meta_d[2];}else{$meta_d = $meta_d[0];}    
    }
    elseif($op == "buy"){
        if($title[3]){$title = $title[3];}else{$title = $title[0];}        
        if($meta_k[3]){$meta_k = $meta_k[3];}else{$meta_k = $meta_k[0];}        
        if($meta_d[3]){$meta_d = $meta_d[3];}else{$meta_d = $meta_d[0];}       
    }
    else{
        $title = $title[0];    
        $meta_k = $meta_k[0];    
        $meta_d = $meta_d[0];    
    }
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title><?php echo $title ?></title>
    <meta name="keywords" content="<?php echo $meta_k ?>" />
    <meta name="description" content="<?php echo $meta_d ?>" />
</head>
<body>
	<div class="main">
<?php include("inc/top.inc.php"); ?>
		<div class="content">
<?php include("inc/main_map.inc.php");?>
<?php include("inc/filter.inc.php"); ?>
			<div class="content_page">
<?php echo $_SESSION["error2"]; unset($_SESSION["error2"]); ?>
<?php include("inc/left.inc.php"); ?>            
<?php include("inc/main_content.inc.php"); ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>