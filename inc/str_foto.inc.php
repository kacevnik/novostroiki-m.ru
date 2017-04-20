							<div class="nav_page_content">
                                <h1 style="margin-top: 0"><?php echo $selNovostroiData[0]["name"]; ?> - фотографии и ход страитеьства</h1>
<?php if(selFotoStr($selNovostroiData[0]["id"])){$selFotoStr = selFotoStr($selNovostroiData[0]["id"]); ?>				
                                <ul class="galary_page">
<?php $ifoto = 1; foreach($selFotoStr as $itemFotoGalery){ ?>
                                    <li>
                                        <a class="gallery" title="<?php echo $ifoto; $ifoto++; ?> из <?php echo count($selFotoStr); ?>" rel="group" href="images/<?php echo $selNovostroiData[0]["id"]; ?>/<?php echo $itemFotoGalery["url"]; ?>"><img src="images/<?php echo $selNovostroiData[0]["id"]; ?>/<?php echo $itemFotoGalery["url"]; ?>"></a>
                                    </li>
<?php } ?>
                                </ul>
<?php }else{ ?> 
<p>Фото отсутствует</p>
<?php }?>
                            <p style="color: #b4b4b4">Ознакомьтесь с последними фотографиями с <?php echo $selNovostroiData[0]["name"]; ?>, которые продемонстрируют Вам основные моменты планировки и хода строительства. Общие виды, планировки квартир, дизайнерские решения и проектные изображения <?php echo $selNovostroiData[0]["name"]; ?>. Если Вы хотите добавить фотографию или видео с <?php echo $selNovostroiData[0]["name"]; ?>, сообщите нам через форму обратной связи.</p>          									
							</div>