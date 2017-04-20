				<div class="main_content">
					<div class="content">
						<h1 class="page-header" style="margin-top: 0">Новостройки Москвы и Подмосковья</h1>
						<div class="row_fluid">
<?php if(selNovoIndex()){$selNovoIndex = selNovoIndex(); foreach($selNovoIndex as $item){ ?>                        
							<div class="span">
								<div class="span2">								
									<div class="span3">										
										<a href="str.php?al=<?php echo $item["alias"]; ?>">
											<img src="images/<?php echo $item["img"]; ?>" alt='<?php echo $item["name"]; ?>'/>
										</a>
										<a class="span_bg" href="str.php?al=<?php echo $item["alias"]; ?>"></a>
										<div class="rent top green"><?php echo $item["spec"]; ?></div>
										<div class="price">от <?php echo number_format($item["prise_ot"],0,'.',' '); ?> руб</div>	
									</div>									
									<div class="info">
										<div class="w">
											<a href="str.php?al=<?php echo $item["alias"]; ?>"><?php echo $item["name"]; ?></a>
											<span><?php echo $item["adres"]; ?></span>
										</div>	
									</div>
									<div class="row_icon">
<?php if(selFoto($item["id"])){?>
										<div class="foto">
											<img src="img/foto_ico.png" alt=""/>
											<div><?php echo count(selFoto($item["id"])); ?></div>
										</div>
<?php } if(selVideo($item["id"])){?>
										<div class="video">
											<img src="img/video.png" alt=""/>
											<div><?php echo count(selVideo($item["id"])); ?></div>
										</div>
<?php } if(selComments($item["id"])){?>
										<div class="comm">
											<img src="img/comment_ico.png" alt=""/>
											<div><?php echo count(selComments($item["id"])); ?></div>
										</div>
<?php }else{ ?>
                                        <div class="area">
											<img src="img/kvm_or_2.png" alt=""/>
											<div>от <?php echo $item["p_min"] ?> м<sup>2</sup></div>
										</div>
<?php } ?>
									</div>															
								</div>	
							</div>
<?php }} ?>															
						</div>
						<div class="show_all_baza">
							<a href="baza.php">База новостроек Москвы и Подмосковья</a>
							<img src="img/more_baza.png"/>	
						</div>
						<hr/>
<?php echo $myrow["main_text"]; ?>						
					</div>											
				</div>