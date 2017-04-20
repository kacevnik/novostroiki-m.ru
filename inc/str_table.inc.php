								<table class="page_table">
									<tr>
										<td>
											Адрес новостройки 
										</td>
										<td>
											<strong><?php echo $selNovostroiData[0]["big_adres"]; ?></strong>
										</td>
									</tr>
									<tr>
										<td>
											Ближайшее метро
										</td>
										<td>
<?php if(selNameMetro($selNovostroiData[0]["metro"])){$selNameMetro = selNameMetro($selNovostroiData[0]["metro"]);}if(selCountMetro($selNovostroiData[0]["metro"])){$selCountMetro = selCountMetro($selNovostroiData[0]["metro"]);} ?>
											<?php if(count($selCountMetro)-1>0){ ?><a href="sort.php?metro=<?php echo $selNovostroiData[0]["metro"]; ?>" title="Рядом новостройки - <?php echo count($selCountMetro)-1; ?> шт."><?php echo $selNameMetro[0]["name"]; ?></a><?php }else{echo $selNameMetro[0]["name"];} ?>			
										</td>
									</tr>
									<tr>
										<td>
											Округ/Направление
										</td>
										<td>
<?php if(selNameOkrug($selNovostroiData[0]["okrug"])){$selNameOkrug = selNameOkrug($selNovostroiData[0]["okrug"]);}if(selCountMetro($selNovostroiData[0]["metro"])){$selCountOkrug = selCountOkrug($selNovostroiData[0]["okrug"]);} ?>
											<?php if(count($selCountOkrug)-1>0){ ?><a href="sort.php?okrug=<?php echo $selNovostroiData[0]["okrug"]; ?>" title="Рядом новостройки - <?php echo count($selCountOkrug)-1; ?> шт."><?php echo $selNameOkrug[0]["name"]; ?></a><?php }else{echo $selNameOkrug[0]["name"];} ?>
										</td>
									</tr>
									<tr>
										<td>
											Расстояние до метро
										</td>
										<td>
											<?php echo $selNovostroiData[0]["transport"]; ?>			
										</td>
									</tr>
<?php if($selNovostroiData[0]["mkad"] > 0){ ?>
									<tr>
										<td>
											Расстояние от МКАД:
										</td>
										<td>
											<?php echo $selNovostroiData[0]["mkad"]; ?> км
										</td>
									</tr>
<?php } ?>
									<tr>
										<td>
											Количество комнат
										</td>
										<td>
											<?php echo $selNovostroiData[0]["komnat"]; ?>		
										</td>
									</tr>
									<tr>
										<td>
											Площади квартир
										</td>
										<td>
											от <strong><?php echo $selNovostroiData[0]["p_min"]; ?></strong> до <strong><?php echo $selNovostroiData[0]["p_max"]; ?></strong> кв. метров
										</td>
									</tr>
									<tr>
										<td>
											Стоимость кв.м
										</td>
										<td>
											от <strong><?php echo number_format($selNovostroiData[0]["prise_ot"],0,'.',' '); if($selNovostroiData[0]["prise_do"] > 0){?></strong> до <strong><?php echo number_format($selNovostroiData[0]["prise_do"],0,'.',' '); ?></strong><?php } ?> руб. за кв. м
										</td>
									</tr>									
									<tr>
										<td>
											Официальный сайт проекта
										</td>
										<td>
											<noindex><a href="<?php echo $selNovostroiData[0]["sait"]; ?>" target="_blank" id="blink" rel="nofollow">Перейти на сайт</a></noindex>
										</td>
									</tr>
								</table>