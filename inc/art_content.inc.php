				<div class="main_content">
					<div class="content">
						<h1 style="margin-top: 0">Статьи</h1>
<?php if(selListArticle($page,$myrow["str_article"])){$selListArticle = selListArticle($page,$myrow["str_article"]); foreach($selListArticle as $item){ ?>
							<div class="span4">
								<div class="span4_img">
									<a href="art-view.php?al=<?php echo $item["alias"]; ?>">
										<img class="img_ioop" src="article/main/<?php echo $item["img"]; ?>" alt="<?php echo $item["name"]; ?>"/>
									</a>
								</div>
								<div class="span4_content">
									<h1><a href="art-view.php?al=<?php echo $item["alias"]; ?>"><?php echo $item["name"]; ?></a><?php if($item["view"]>0){ ?><div class="art_span"><?php echo $item["view"]; ?></div><?php } ?></h1>
                                    <div class="art_list">
                                    <?php echo $item["description"]; ?>
                                    </div>
                                    <div class="art_before">
                                        <a href="art-view.php?al=<?php echo $item["alias"]; ?>">Подробнее...</a>
                                        <div class="art_before_cat">
                                            <a href="art-cat.php?cat=<?php echo $item["cat"]; ?>"><?php echo selNameCategoryArt($item["cat"]); ?></a>
                                        </div>
                                    </div>
								</div>
								<div class="span4_arrow"></div>																			
							</div>
<?php }} ?>															
						<div class="navigation">
							<ul>
<?php
    $total = intval(((count(selAllArticle()) - 1) / $myrow["str_article"]) + 1); 
    if ($page != 1) $pervpage = '<li><a href="art.php?page=1">Первая</a></li><li><a href="art.php?page='. ($page - 1) .'">Предыдущая</a></li>';
                
    if ($page != $total) $nextpage = '<li><a href="art.php?page='. ($page + 1) .'">Следующая</a></li><li><a href="art.php?page=' .$total. '">Последняя</a></li>';
                
    if($page - 2 > 0) $page2left = ' <li><a href="art.php?page='. ($page - 2) .'">'. ($page - 2) .'</a></li>';
    if($page - 1 > 0) $page1left = '<li><a href="art.php?page='. ($page - 1) .'">'. ($page - 1) .'</a></li>';
                
    if($page + 2 <= $total) $page2right = '<li><a href="art.php?page='. ($page + 2) .'">'. ($page + 2) .'</a></li>';
    if($page + 1 <= $total) $page1right = '<li><a href="art.php?page='. ($page + 1) .'">'. ($page + 1) .'</a></li>';
    
    if ($total > 1)
                {
                Error_Reporting(E_ALL & ~E_NOTICE);
                
                echo $pervpage.$page2left.$page1left.'<li><a href="" class="activ_nav">'.$page.'</a></li>'.$page1right.$page2right.$nextpage;
                }
?>
							</ul>
						</div>
						<?php if($total>$myrow["str_article"]){ ?><hr/><?php } ?>
					</div>											
				</div>