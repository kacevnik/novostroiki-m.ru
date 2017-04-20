<div class="b-share-social">
    <div class="yashare-auto-init float-r" data-yasharel10n="ru" data-yasharetype="none" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,lj,liveinternet,yaru,gplus">
    </div>
</div>

<?php if(selNovoRand($selNovostroiData[0]["okrug"],$selNovostroiData[0]["id"])){$selNovoRand = selNovoRand($selNovostroiData[0]["okrug"],$selNovostroiData[0]["id"]); ?>
                            <div class="rydom">
                            <h2>Новостройки рядом <?php echo $selNovostroiData[0]["name"]; ?></h2>
<?php foreach($selNovoRand as $itemRandom){ ?>
                                <div class="span5">
    								<div class="span5_img">
    									<a href="str.php?al=<?php echo $itemRandom["alias"]; ?>">
    										<img class="img_ioop" src="<?php if($itemRandom["img"] == ""){echo 'img/novostroiki-ivo.jpg';}else{echo 'images/'.$itemRandom["img"];}  ?>" alt="<?php echo $itemRandom["name"]; ?>">
    									</a>
    								</div>
    								<div class="span5_content">
    									<h1><a href="str.php?al=<?php echo $itemRandom["alias"]; ?>"><?php echo $itemRandom["name"]; ?></a> - от <?php echo number_format($itemRandom["prise_ot"],0,'.',' '); ?> руб.<span title="В избранное" onclick="addMainIsbr('<?php echo $itemRandom["id"]; ?>')" <?php if(selCookieIzbr2($_COOKIE["izbr"], $itemRandom["id"])){echo 'class="pols"';} ?>></span></h1>
    									<div class="span5_metro">
    										<span></span>
<?php if(selNameMetro($itemRandom["metro"])){$selNameMetroR = selNameMetro($itemRandom["metro"]);}if(selCountMetro($itemRandom["metro"])){$selCountMetro = selCountMetro($itemRandom["metro"]);} ?>
                                        <?php if(count($selCountMetro)-1>0){ ?><a href="sort.php?metro=<?php echo $itemRandom["metro"]; ?>" title="Рядом новостройки - <?php echo count($selCountMetro)-1; ?> шт."><?php echo $selNameMetroR[0]["name"]; ?></a><?php }else{echo $selNameMetroR[0]["name"];} ?> - <?php echo $itemRandom["transport"]; ?> (<?php echo $itemRandom["adres"]; ?>)
    									</div>
    									<div class="span4_icon">
<?php if($itemRandom["ipoteka"] == 1){ ?>
    										<div class="span5_icon_item ipoteka"><div>Ипотека</div></div>
<?php }if($itemRandom["rassrochka"] == 1){ ?> 
    										<div class="span5_icon_item rasrochka"><div>Расрочка</div></div>
<?php }if($itemRandom["v_ipoteka"] == 1){ ?>
    										<div class="span5_icon_item v_ipoteka"><div>Военная ипотека</div></div>
<?php }if($itemRandom["fz_214"] == 1){ ?>
    										<div class="span5_icon_item fz"><div>ФЗ-214</div></div>
<?php }if($itemRandom["thouse"] == 1){ ?>
										    <div class="span4_icon_item thouse"><div>Таунхаусы</div></div>
<?php }if($itemRandom["parking"] == 1){ ?>
    										<div class="span5_icon_item parkovka"><div>Подземная парковка</div></div>
<?php }if($itemRandom["otdelka"] == 1){ ?>
    										<div class="span5_icon_item remont"><div>Чистовая отделка</div></div>
<?php }if($itemRandom["w_metro"] == 1){ ?>	
    										<div class="span5_icon_item metro"><div>Метро в шаговой доступности</div></div>
<?php }if($itemRandom["apart"] == 1){ ?>	
    										<div class="span5_icon_item apart"><div>Апартаменты</div></div>
<?php }if(selFoto($itemRandom["id"])){$selFotoR = selFoto($itemRandom["id"]);}if(count($selFotoR)>0){?>
    										<div class="span5_icon_item foto_span4"><span><?php echo count($selFotoR); ?></span><div>Фотографии: <?php echo count($selFotoR); unset($selFotoR);?> шт.</div></div>
<?php }if(selVideo($itemRandom["id"])){$selVideoR = selVideo($itemRandom["id"]);}if(count($selVideoR) > 0){ ?>
    										<div class="span5_icon_item video_span4"><span><?php echo count($selVideoR); ?></span><div>Видео: <?php echo count($selVideoR); unset($selVideoR);?> шт.</div></div>
<?php }if(selComments($itemRandom["id"])){$selCommentsR = selComments($itemRandom["id"]);}if(count($selCommentsR)>0){ ?>
    										<div class="span5_icon_item comment_span4"><span><?php echo count($selCommentsR); ?></span><div>Коментарии: <?php echo count($selCommentsR); unset($selCommentsR);?> шт.</div></div>
<?php } ?>
    									</div>	
    								</div>
    								<div class="span5_arrow"></div>																			
    							</div>
<?php } if((count($selCountOkrug)-4)>0){?>
                                <div class="show_all_baza">
        							<a href="sort.php?okrug=<?php echo $selNovostroiData[0]["okrug"]; ?>">Новостройки рядом <?php echo $selNovostroiData[0]["name"]; ?> - еще <?php echo count($selCountOkrug)-4; ?> шт.</a>
        							<img src="img/more_baza.png">	
                                </div>
<?php } ?>
                            </div>
<?php }?>