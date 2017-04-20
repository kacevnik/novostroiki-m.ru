<?php 
    include("inc/db.php");
    $str = 2;
    $fin = 1;
    if($_GET["page"]){ $page = $_GET["page"]; $page = abs((int)$page);}
        if($page == 1){
        header("Location:baza.php");
    }
    if(!$page){$page = 1;}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title>База новостроек</title>
    <meta name="keywords" content="база новостроек" />
    <meta name="description" content="База новостроек" />
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
<?php include("inc/main_content.inc.php"); ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>