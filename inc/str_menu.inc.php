<?php upHit($selNovostroiData[0]["id"],$selNovostroiData[0]["hit"]); ?>
				<div class="main_content">
					<div class="content">
						<h1 style="margin-top: 0"><?php echo $selNovostroiData[0]["name"]; ?></h1>
						<div class="page_content">
							<a class="izbr" onclick="addMainIsbr('<?php echo $selNovostroiData[0]["id"]; ?>')"><?php if(selCookieIzbr2($_COOKIE["izbr"], $selNovostroiData[0]["id"])){echo "Убрать из избранного";}else{ echo "В избранное";} ?></a>
							<span style="<?php if(selCookieIzbr2($_COOKIE["izbr"], $selNovostroiData[0]["id"])){echo "background-position-y: -15px";} ?>"></span>
							<ul class="nav_page">
								<li><a href="str.php?al=<?php echo $selNovostroiData[0]["alias"]; ?>"<?php if($op != "forum" and $op != "foto" and $op != "buy"){echo 'class="activ"';} ?>>Описание</a></li>
								<li><a href="str.php?al=<?php echo $selNovostroiData[0]["alias"]; ?>&op=forum" <?php if($op == "forum"){echo 'class="activ"';} ?>>Форум и отзывы</a></li>
								<li><a href="str.php?al=<?php echo $selNovostroiData[0]["alias"]; ?>&op=foto" <?php if($op == "foto"){echo 'class="activ"';} ?>>Фото и ход строительства</a></li>
								<li><a href="str.php?al=<?php echo $selNovostroiData[0]["alias"]; ?>&op=buy" <?php if($op == "buy"){echo 'class="activ"';} ?>>Где купить</a></li>
							</ul>