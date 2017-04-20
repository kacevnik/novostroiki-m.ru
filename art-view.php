<?php 
    include("inc/db.php");
    $str = 4;
    $fin = 1;
    if (isset($_GET['al']))  {$al= $_GET['al'];  $al = trim(stripslashes(htmlspecialchars($al)));}    
    if (preg_match("/^[-A-z0-9]{3,150}$/",$al)){$al = $al;}else{unset($al);}
    if(!$al){
        header("Location:art.php");
    }
    if(selDataArticle($al)){
        $selDataArticle = selDataArticle($al);
    }
    else{
        header("Location:art.php");    
    }
    $view = $selDataArticle[0]["view"] + 1;
    $upViewArticle = mysql_query("UPDATE article SET view='$view' WHERE alias='$al' AND pokaz='1'",$db);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title><?php echo $selDataArticle[0]["title"]; ?></title>
    <meta name="keywords" content="<?php echo $selDataArticle[0]["m_key"]; ?>" />
    <meta name="description" content="<?php echo $selDataArticle[0]["m_disc"]; ?>" />
</head>
<body>
	<div class="main">
<?php include("inc/top.inc.php"); ?>
		<div class="content">
<?php include("inc/main_map.inc.php"); ?>
<?php include("inc/filter.inc.php"); ?>
			<div class="content_page">
<?php echo $_SESSION["error2"]; unset($_SESSION["error2"]); ?>
<?php include("inc/left.inc.php"); ?>            
<?php include("inc/article.inc.php"); ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>