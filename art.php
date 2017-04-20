<?php 
    include("inc/db.php");
    $str = 4;
    $fin = 1;
    if($_GET["page"]){ $page = $_GET["page"]; $page = abs((int)$page);}
        if($page == 1){
        header("Location:art.php");
    }
    if(!$page){$page = 1;}
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title>Статьи о Новостройках, ремонте и строительстве</title>
    <meta name="keywords" content="Статьи о Новостройках, ремонте и строительстве" />
    <meta name="description" content="Статьи о Новостройках, ремонте и строительстве" />
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
<?php include("inc/art_content.inc.php"); ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>