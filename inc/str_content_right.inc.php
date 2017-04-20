						<div class="page_content_rigth">
							<div class="page_content_rigth_span">
								<div class="page_content_rigth_span2">
									<img src="<?php if($selNovostroiData[0]["img"] == ""){echo 'img/novostroiki-ivo.jpg';}else{echo 'images/'.$selNovostroiData[0]["img"];}  ?>" alt='<?php echo $selNovostroiData[0]["name"] ?>' title='<?php echo $selNovostroiData[0]["name"]; ?>' class="page_content_rigth_main_img"/>
<?php if(selVideoStr($selNovostroiData[0]["id"])){$selVideoStr = selVideoStr($selNovostroiData[0]["id"]); ?>
									<div class="page_rigth_video">
										<span class="title">
											Видео<br/>
											<?php echo $selNovostroiData[0]["name"]; ?>
										</span>
<?php foreach($selVideoStr as $itemVideo){ if($itemVideo["class"] == 'yt'){?>
										<a class="gallery_video"  href="#testube<?php echo $itemVideo["id"];?>">
										<span><div><?php echo $itemVideo["name"]; ?></div></span>
											<img alt="<?php echo $itemVideo["name"]; ?>" src="https://i1.ytimg.com/vi/<?php echo $itemVideo["url"]; ?>/mqdefault.jpg">
										</a>
                                        <div style="display:none" id="testube<?php echo $itemVideo["id"];?>">
                                            <object width="853" height="480">
                                                <param name="movie" value="http://www.youtube.com/v/<?php echo $itemVideo["url"];?>"></param>
                                                <param name="allowFullScreen" value="true"></param>
                                                <param name="allowscriptaccess" value="always"></param>
                                                <embed src="http://www.youtube.com/v/<?php echo $itemVideo["url"];?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="853" height="480"></embed>
                                            </object>
                                        </div>
<?php }else{ ?>
                                        <a class="gallery_video"  href="#testube<?php echo $itemVideo["id"];?>">
										<span><div><?php echo $itemVideo["name"]; ?></div></span>
											<img alt="<?php echo $itemVideo["name"]; ?>" src="img/web_camera.png">
										</a>
                                        <div style="display:none" id="testube<?php echo $itemVideo["id"];?>">
                                            <img width="853" alt="<?php echo $itemVideo["name"];?>" src="<?php echo $itemVideo["url"];?>" style="height: 478px;">
                                        </div>
<?php }} ?>
									</div>
<?php } ?>
									<div class="reiting" id="reiting">
<?php include("str_star.inc.php"); ?>
                                    </div>
                                    <div class="right_about">
                                        <h2>Расположение на карте<br><span><?php echo $selNovostroiData[0]["name"] ?></span></h2>
                                        <a href="str.php?al=<?php echo $selNovostroiData[0]["alias"] ?>&op=buy">
                                            <img src="img/map_marker_go.png" alt="<?php echo $selNovostroiData[0]["name"] ?> на карте" />
                                        </a>    
                                    </div>
                                    </div>	
								</div>								
							</div>