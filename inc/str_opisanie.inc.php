							<div class="nav_page_content">
<?php include("str_table.inc.php"); if($selNovostroiData[0]["dis"] !=""){ ?>
								<h1>Описание <?php echo $selNovostroiData[0]["name"]; ?></h1>
                                <div class="discription_novo">
                                    <?php echo $selNovostroiData[0]["dis"]; ?>
                                </div>
                                <?php } ?>	
							</div>