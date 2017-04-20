				<div class="main_content">
					<div class="content">
						<h1 style="margin-top: 0"><?php echo $selDataArticle[0]["name"]; ?></h1>
						<div class="atr_main_text">	
<?php echo $selDataArticle[0]["text"]; ?>                        
                        </div>
                        <div style="clear: both;"></div>
                        <div class="atr_info">                            
                            <div class="art_span"><?php echo $view; ?> </div>
                            <div class="art_view_date"><?php echo upDate($selDataArticle[0]["date"]); ?></div>
                            <div class="art_before_cat">
                                <a href="art-cat.php?cat=<?php echo $selDataArticle[0]["cat"]; ?>"><?php echo selNameCategoryArt($selDataArticle[0]["cat"]); ?></a>
                            </div>
                        </div>													
					</div>											
				</div>