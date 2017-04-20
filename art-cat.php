<?php 
    include("inc/db.php");
    $str = 4;
    $fin = 1;
    if($_GET["page"]){ $page = $_GET["page"]; $page = abs((int)$page);}
    if($_GET["cat"]){ $cat = $_GET["cat"]; $cat = abs((int)$cat);}
    if($page == 1){
        header("Location:art-cat.php?cat=".$cat);
    }
    if(!$cat){
        header("Location:art.php");    
    }
    $urlCategory = "art-cat.php?cat=".$cat;
    if(!$page){$page = 1;}
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title>Статьи о Новостройках на тему: <?php echo selNameCategoryArt($cat); ?></title>
    <meta name="keywords" content="<?php echo selNameCategoryArt($cat); ?> Новостройки, <?php echo selNameCategoryArt($cat); ?> квартиры, <?php echo selNameCategoryArt($cat); ?>" />
    <meta name="description" content="Статьи на сайте Novostroiki-m.ru на тему: <?php echo selNameCategoryArt($cat); ?>" />
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
<?php include("inc/art_cat_content.inc.php");; ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>