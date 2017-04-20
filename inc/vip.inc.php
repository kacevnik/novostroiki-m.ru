<?php if(selBanner()){$selBanner = selBanner(); $position = 0;?>
					<div class="left_bar">
<?php foreach($selBanner as $selBannerItem){ $position++; ?>
						<div class="item">
							<a href="<?php if(isBot){ ?>red.php?to=<?php echo $selBannerItem["id"]."&sort=".$position;} ?>" target="blank">
								<img src="images/vip/<?php echo $selBannerItem["img"]; ?>" alt=""/>
							</a>
							<a href="<?php if(isBot){ ?>red.php?to=<?php echo $selBannerItem["id"]."&sort=".$position;} ?>" class="title" target="blank"><?php echo $selBannerItem["slogan"]; ?></a>								
						</div>
<?php  AddViewsBanner($selBannerItem["id"],$position); ?>
<?php } ?>
					</div>
<?php } ?>