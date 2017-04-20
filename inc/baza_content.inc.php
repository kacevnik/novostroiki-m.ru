				<div class="main_content">
					<div class="content">
						<h1 style="margin-top: 0">База новостроек Москвы и Подмосковья
<?php if(selMainMap()){if(count(selMainMap()) > 100){ ?>
                            <span>Всего <?php echo count(selMainMap()); ?></span>
<?php }} ?>
                        </h1>
<?php if(selNovoStr($pade,$myrow["str"])){$selNovoStr = selNovoStr($page,$myrow["str"]); foreach($selNovoStr as $item){?>
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
											<li><a href="str.php?al=<?php echo $item["alias"]; ?>&op=foto">Фото и ход строительства<?php if(selFoto($item["id"])){$selFoto = selFoto($item["id"]);?>: <?php echo count($selFoto); ?> шт.<?php } ?></a></li>
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
<?php }if($item["apart"] == 1){ ?>
                                        <div class="span4_icon_item apart"><div>Апартаменты</div></div>
<?php }if(count($selFoto) > 0){ ?>
										<div class="span4_icon_item foto_span4"><span><?php echo count($selFoto); ?></span><div>Фотографии: <?php echo count($selFoto); unset($selFoto);?> шт.</div></div>
<?php }if(selVideo($item["id"])){$selVideo = selVideo($item["id"]);if(count($selVideo) > 0){ ?>
										<div class="span4_icon_item video_span4"><span><?php echo count($selVideo); ?></span><div>Видео: <?php echo count($selVideo); unset($selVideo);?> шт.</div></div>
<?php }} if(count($selComments) > 0){ ?>
										<div class="span4_icon_item comment_span4"><span><?php echo count($selComments); ?></span><div>Коментарии: <?php echo count($selComments); unset($selComments);?> шт.</div></div>
<?php } ?>
									</div>	
								</div>
								<div class="span4_arrow"></div>																			
							</div>
<?php unset($selComments);unset($selFoto);}}else{echo "В базе нет объектов!";} ?>															
						<div class="navigation">
							<ul>
<?php
    $total = intval(((count(selMainMap()) - 1) / $myrow["str"]) + 1); 
    if ($page != 1) $pervpage = '<li><a href="baza.php?page=1">Первая</a></li><li><a href="baza.php?page='. ($page - 1) .'">Предыдущая</a></li>';
                
    if ($page != $total) $nextpage = '<li><a href="baza.php?page='. ($page + 1) .'">Следующая</a></li><li><a href="baza.php?page=' .$total. '">Последняя</a></li>';
                
    if($page - 2 > 0) $page2left = ' <li><a href="baza.php?page='. ($page - 2) .'">'. ($page - 2) .'</a></li>';
    if($page - 1 > 0) $page1left = '<li><a href="baza.php?page='. ($page - 1) .'">'. ($page - 1) .'</a></li>';
                
    if($page + 2 <= $total) $page2right = '<li><a href="baza.php?page='. ($page + 2) .'">'. ($page + 2) .'</a></li>';
    if($page + 1 <= $total) $page1right = '<li><a href="baza.php?page='. ($page + 1) .'">'. ($page + 1) .'</a></li>';
    
    if ($total > 1)
                {
                Error_Reporting(E_ALL & ~E_NOTICE);
                
                echo $pervpage.$page2left.$page1left.'<li><a href="" class="activ_nav">'.$page.'</a></li>'.$page1right.$page2right.$nextpage;
                }
?>

							</ul>
						</div>
<?php if($page == 1){ ?>
						<hr/>
						<h1>База новостроек</h1>
						<p>Для лучшего и более точного анализа жилой недвижимости перед покупкой, представляем Вам базу новостроек Москвы и Подмосковья. При создании базы новостроек мы старались уделить особое внимание удобству и простоте преподносимой информации, акцентируя внимание на основных и главных характеристиках того или иного объекта. Выбор жилья в современном мегаполисе, таком как Москва, или в близлежащих районах, является важным шагом в жизни каждого человека или семьи. Ведь от этого выбора зависит будущее на много лет вперед. И что бы сделать этот шаг следует учесть множество параметров приобретаемой квартиры.</p>
						<h2>Главные аспекты базы новостроек.</h2>
						<p><strong>База новостроек</strong> на сайте Novostroiki-m.ru представлена в виде каталога всех строящихся или уже сданных жилых объектов Москвы и Московской области. Особое внимание уделено основным характеристикам новостроек. Таким как: Цены на квартиры и подробные обзоры и описания, инфраструктура района и транспортная доступность, экология окружающей среды и последние новости и акции. Ну и, конечно же, ни одна база новостроек не обходиться без отзывов и комментариев. В нашей базе мы постарались вобрать все известные Новостройки Москвы и Подмосковья, отфильтровать их и представить на суд обычному обывателю.</p>
<?php } ?>
					</div>											
				</div>