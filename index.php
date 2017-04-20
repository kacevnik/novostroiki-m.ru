<?php 
    include("inc/db.php");
    $str = 1;
    $fin = 1; 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title><?php echo $myrow["main_title"]; ?></title>
    <meta name="keywords" content="<?php echo $myrow["main_meta_k"]; ?>" />
    <meta name="description" content="<?php echo $myrow["main_meta_d"]; ?>" />
</head>
<body>
	<div class="main">
<?php include("inc/top.inc.php"); ?>
		<div class="content">
<?php include("inc/main_map.inc.php"); ?>
<?php include("inc/filter.inc.php"); ?>
			<div class="content_page">
<?php echo $_SESSION["error2"]; unset($_SESSION["error2"]); ?>
<?php echo $_SESSION["error"]; ?>
<?php unset($_SESSION["error"]); ?>
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