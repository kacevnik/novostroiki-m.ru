				<div class="main_content">
					<div class="content">
						<h1 style="margin-top: 0">Новостройки <?php if($metro){$resNameMetro = mysql_query("SELECT name FROM metro WHERE id='$metro'",$db);
    $myrNameMetro = mysql_fetch_array($resNameMetro); echo "метро - ".$myrNameMetro["name"];} if($okrug){$resNameOkrug = mysql_query("SELECT name FROM okrug WHERE id='$okrug'",$db);
    $myrNameOkrug = mysql_fetch_array($resNameOkrug); echo "Округ/Направление - ".$myrNameOkrug["name"];} ?></h1>
<?php if(selNovoSort($pade,$myrow["str"],$get_sql,$sql_order)){$selNovoSort = selNovoSort($page,$myrow["str"],$get_sql,$sql_order); foreach($selNovoSort as $item){?>
							<div class="span4">
								<div class="span4_img">
									<a href="str.php?al=<?php echo $item["alias"]; ?>">
										<img class="img_ioop" src="<?php if($item["img"] == ""){echo 'img/novostroiki-ivo.jpg';}else{echo 'images/'.$item["img"];}  ?>" alt="<?php echo $item["name"]; ?>"/>
									</a>
								</div>
								<div class="span4_content">
									<h1><a href="str.php?al=<?php echo $item["alias"]; ?>"><?php echo $item["name"]; ?></a> - от <?php echo number_format($item["prise_ot"],0,'.',' '); ?> руб.<span title="В избранное" onclick="addMainIsbr('<?php echo $item["id"]; ?>')" <?php if(selCookieIzbr2($_COOKIE["izbr"], $item["id"])){echo 'class="pols"';} ?>></span></h1>
									<div class="span4_metro">
										<span></span>
<?php if(selNameMetro($item["metro"])){$selNameMetro = selNameMetro($item["metro"]);}if(selCountMetro($item["metro"])){$selCountMetro = selCountMetro($item["metro"]);} ?>
                                        <?php if(count($selCountMetro)-1>0){ ?><a href="sort.php?metro=<?php echo $item["metro"]; ?>" title="Рядом новостройки - <?php echo count($selCountMetro)-1; ?> шт."><?php echo $selNameMetro[0]["name"]; ?></a><?php }else{echo $selNameMetro[0]["name"];} ?> - <?php echo $item["transport"]; ?> (<?php echo $item["adres"]; ?>)
									</div>
									<div class="span4_links">
										<ul>
											<li><a href="str.php?al=<?php echo $item["alias"]; ?>&op=forum">Форум и отзывы жильцов<?php if(selComments($item["id"])){$selComments = selComments($item["id"]); ?>: <?php echo count($selComments); ?> шт.<?php } ?></a></li>
											<li><a href="str.php?al=<?php echo $item["alias"]; ?>&op=foto">Фото и ход страительства<?php if(selFoto($item["id"])){$selFoto = selFoto($item["id"]);?>: <?php echo count($selFoto); ?> шт.<?php } ?></a></li>
											<li><a href="str.php?al=<?php echo $item["alias"]; ?>&op=buy">Где купить</a></li>
										</ul>	
									</div>
									<div class="span4_icon">
<?php if($item["ipoteka"] == 1){ ?>
                                        <div class="span4_icon_item ipoteka"><div>Ипотека</div></div>
<?php }if($item["rassrochka"] == 1){ ?>     
                                        <div class="span4_icon_item rasrochka"><div>Расрочка</div></div>
<?php }if($item["v_ipoteka"] == 1){ ?>
										<div class="span4_icon_item v_ipoteka"><div>Военная ипотека</div></div>
<?php }if($item["fz_214"] == 1){ ?>
										<div class="span4_icon_item fz"><div>ФЗ-214</div></div>
<?php }if($item["thouse"] == 1){ ?>
										<div class="span4_icon_item thouse"><div>Таунхаусы</div></div>
<?php }if($item["parking"] == 1){ ?>
										<div class="span4_icon_item parkovka"><div>Подземная парковка</div></div>
<?php }if($item["otdelka"] == 1){ ?>
										<div class="span4_icon_item remont"><div>Чистовая отделка</div></div>	
<?php }if($item["w_metro"] == 1){ ?>
										<div class="span4_icon_item metro"><div>Метро в шаговой доступности</div></div>
<?php }if(count($selFoto) > 0){ ?>
										<div class="span4_icon_item foto_span4"><span><?php echo count($selFoto); ?></span><div>Фотографии: <?php echo count($selFoto); ?> шт.</div></div>
<?php }if(selVideo($item["id"])){$selVideo = selVideo($item["id"]);if(count($selVideo) > 0){ ?>
										<div class="span4_icon_item video_span4"><span><?php echo count($selVideo); ?></span><div>Видео: <?php echo count($selVideo); ?> шт.</div></div>
<?php }} if(count($selComments) > 0){ ?>
										<div class="span4_icon_item comment_span4"><span><?php echo count($selComments); ?></span><div>Коментарии: <?php echo count($selComments); ?> шт.</div></div>
<?php } ?>
									</div>	
								</div>
								<div class="span4_arrow"></div>																			
							</div>
<?php unset($selComments);unset($selFoto);unset($selVideo);}}else{echo "В базе нет объектов!";} ?>															
						<div class="navigation">
							<ul>
<?php
    if($metro){$url_metro = "metro=".$metro."&";}else{$url_metro = "";}
    if($okrug){$url_okrug = "okrug=".$okrug."&";}else{$url_okrug = "";}
    if($p_min){$url_p_min = "p_min=".$p_min."&";}else{$url_p_min = "";}
    if($prise_ot){$url_prise_ot = "prise_ot=".$prise_ot."&";}else{$url_prise_ot = "";}
    if($prise_do){$url_prise_do = "prise_do=".$prise_do;}else{$url_prise_do = "";}
    $url_nav = $url_metro.$url_okrug.$url_p_min.$url_prise_ot.$url_prise_do."*";
    $url_nav = str_replace("&*", "", $url_nav);
    $url_nav = str_replace("*", "", $url_nav);
    
    $resCountSortNovo = mysql_query("SELECT id FROM novostroj WHERE pokaz='1'".$get_sql,$db);
    $countSortNovo = mysql_num_rows($resCountSortNovo);
    
    $total = intval((($countSortNovo - 1) / $myrow["str"]) + 1); 
    if ($page != 1) $pervpage = '<li><a href="sort.php?'.$url_nav.'&page=1">Первая</a></li><li><a href="sort.php?'.$url_nav.'&page='. ($page - 1) .'">Предыдущая</a></li>';
                
    if ($page != $total) $nextpage = '<li><a href="sort.php?'.$url_nav.'&page='. ($page + 1) .'">Следующая</a></li><li><a href="sort.php?'.$url_nav.'&page=' .$total. '">Последняя</a></li>';
                
    if($page - 2 > 0) $page2left = ' <li><a href="sort.php?'.$url_nav.'&page='. ($page - 2) .'">'. ($page - 2) .'</a></li>';
    if($page - 1 > 0) $page1left = '<li><a href="sort.php?'.$url_nav.'&page='. ($page - 1) .'">'. ($page - 1) .'</a></li>';
                
    if($page + 2 <= $total) $page2right = '<li><a href="sort.php?'.$url_nav.'&page='. ($page + 2) .'">'. ($page + 2) .'</a></li>';
    if($page + 1 <= $total) $page1right = '<li><a href="sort.php?'.$url_nav.'&page='. ($page + 1) .'">'. ($page + 1) .'</a></li>';
    
    if ($total > 1)
                {
                Error_Reporting(E_ALL & ~E_NOTICE);
                
                echo $pervpage.$page2left.$page1left.'<li><a href="" class="activ_nav">'.$page.'</a></li>'.$page1right.$page2right.$nextpage;
                }
?>

							</ul>
						</div>
						<hr/>
					</div>											
				</div>