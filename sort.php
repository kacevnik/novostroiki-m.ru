<?php 
    include("inc/db.php");
    $str = 2;
    $fin = 1;
    if($_GET["page"]){ $page = $_GET["page"]; $page = abs((int)$page);}
    
    if (isset($_POST['submit_filter'])) {$submit_filter = $_POST['submit_filter'];}
    if (isset($_POST['metro']))         {$metro = $_POST['metro'];           $metro = abs((int)$metro);}
    if (isset($_POST['okrug']))         {$okrug = $_POST['okrug'];           $okrug = abs((int)$okrug);}
    if (isset($_POST['p_min']))         {$p_min = $_POST['p_min'];           $p_min = abs((int)$p_min);}
    if (isset($_POST['prise_ot']))      {$prise_ot = $_POST['prise_ot'];     $prise_ot = abs((int)$prise_ot);}
    if (isset($_POST['prise_do']))      {$prise_do = $_POST['prise_do'];     $prise_do = abs((int)$prise_do);} 
    
    if($submit_filter){
        if($metro){$get_metro = "metro=".$metro."&";}else{$get_metro = "";}
        if($okrug){$get_okrug = "okrug=".$okrug."&";}else{$get_okrug = "";}
        if($p_min){$get_p_min = "p_min=".$p_min."&";}else{$get_p_min = "";}
        if($prise_ot){$get_prise_ot = "prise_ot=".$prise_ot."&";}else{$get_prise_ot = "";}
        if($prise_do){$get_prise_do = "prise_do=".$prise_do."";}else{$get_prise_do = "";}
        $urlik = $get_metro.$get_okrug.$get_p_min.$get_prise_ot.$get_prise_do."*";
        $urlik = str_replace("&*", "", $urlik);
        $urlik = str_replace("*", "", $urlik);
        header("Location: sort.php?".$urlik);
    }
    
    if (isset($_GET['metro']))      {$metro = $_GET['metro'];           $metro = abs((int)$metro);}
    if (isset($_GET['okrug']))      {$okrug = $_GET['okrug'];           $okrug = abs((int)$okrug);}
    if (isset($_GET['p_min']))      {$p_min = $_GET['p_min'];           $p_min = abs((int)$p_min);}
    if (isset($_GET['prise_ot']))   {$prise_ot = $_GET['prise_ot'];     $prise_ot = abs((int)$prise_ot);}
    if (isset($_GET['prise_do']))   {$prise_do = $_GET['prise_do'];     $prise_do = abs((int)$prise_do);}
    
    if($page == 1){
        if($metro or $metro!=0){$ref_metro = "metro=".$metro."&";}else{$ref_metro = "";}
        if($okrug or $okrug!=0){$ref_okrug = "okrug=".$okrug."&";}else{$ref_okrug = "";}
        if($p_min or $p_min!=0){$ref_p_min = "p_min=".$p_min."&";}else{$ref_p_min = "";}
        if($prise_ot or $prise_ot!=0){$ref_prise_ot = "prise_ot=".$prise_ot."&";}else{$ref_prise_ot = "";}
        if($prise_do or $prise_do!=0){$ref_prise_do = "prise_do=".$prise_do."";}else{$ref_prise_do = "";}
        $url_ref = $ref_metro.$ref_okrug.$ref_p_min.$ref_prise_ot.$ref_prise_do."*";
        $url_ref = str_replace("&*", "", $url_ref);
        $url_ref = str_replace("*", "", $url_ref);
        header("Location: sort.php?".$url_ref);
    }
    
    if(!$metro and !$okrug and !$p_min and !$prise_ot and !$prise_do){
        header("Location: baza.php");   
    }
    
    if(!$page){$page = 1;}
    
    if($metro){$sql_metro = " AND metro='".$metro."'";}else{$sql_metro = "";}
    if($okrug){$sql_okrug = " AND okrug='".$okrug."'";}else{$sql_okrug = "";}
    if($p_min){$sql_p_min = " AND p_min>='".$p_min."'";}else{$sql_p_min = "";}
    if($prise_ot){$sql_prise_ot = " AND prise_ot>='".$prise_ot."'";}else{$sql_prise_ot = "";}
    if($prise_do){$sql_prise_do = " AND prise_ot<='".$prise_do."'";}else{$sql_prise_do = "";}
    if($prise_ot or $prise_do){$sql_order = "prise_ot";}elseif($p_min){$sql_order = "p_min DESC";}else{$sql_order = "id DESC";}
    $get_sql = $sql_metro.$sql_okrug.$sql_p_min.$sql_prise_ot.$sql_prise_do;
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <?php include("inc/head.inc.php"); ?>
    
    <title>Новостройки <?php if($metro){$resNameMetro = mysql_query("SELECT name FROM metro WHERE id='$metro'",$db);
    $myrNameMetro = mysql_fetch_array($resNameMetro); echo "метро - ".$myrNameMetro["name"];} if($okrug){$resNameOkrug = mysql_query("SELECT name FROM okrug WHERE id='$okrug'",$db);
    $myrNameOkrug = mysql_fetch_array($resNameOkrug); echo "Округ/Направление - ".$myrNameOkrug["name"];} ?> - Страница - <?php echo $page; ?></title>
    <meta name="keywords" content="новостройки москва<?php if($metro){echo ", новостройки метро ".$myrNameMetro["name"];}?><?php if($okrug){echo ", новостройки ".$myrNameOkrug["name"];} ?>" />
    <meta name="description" content="Новостройки Москвы и Московской области<?php echo $page; ?>" />
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
<?php include("inc/sort_content.inc.php"); ?>	
			</div>
		</div>
		<div class="clear"></div>
<?php include("inc/foot1.inc.php"); ?>
<?php include("inc/foot2.inc.php"); ?>
	</div>
</body>
</html>