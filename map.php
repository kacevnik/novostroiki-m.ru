<?php 
    include("inc/db.php");
    $str = 3;
    $fin = 1; 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title>Новостройки Москвы и Подмосковья на карте с ценами от застройщика</title>
    <meta name="keywords" content="новостройки на карте, новостройки москвы на карте, новостройки подмосковья на карте, новостройки от застройщика на карте" />
    <meta name="description" content="На этой странице представлены все основные новостройки Москвы и Подмосковья, а также их цены, указанные застройщиком." />
</head>
<body>
	<div class="main">
<?php include("inc/top.inc.php"); ?>
		<div class="content">
<?php include("inc/main_map_content.inc.php"); ?>
		</div>
		<div class="clear"></div>

<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot3.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>