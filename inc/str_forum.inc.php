							<div class="nav_page_content">
<?php include("str_table.inc.php"); if(selCommentForNovo($selNovostroiData[0]["id"], 1)){$selCommentForNovo = selCommentForNovo($selNovostroiData[0]["id"],1);} ?>
								<div class="comm_page" id="commetlist">
                                    <div class="new_comm">
                                        <a href="new_comment.php?id=<?php echo $selNovostroiData[0]["id"]; ?>&otvet=0&type=1" class="add_comment">Добавить новый комментарий или отзыв</a>
                                        <!--Что бы оставить комментарий, нужно <a href="">Войти</a> или <a href="">Зарегистрироваться</a>-->
                                    </div>
<?php if(count($selCommentForNovo) == 0){ ?>
                                    <div class="new_comm">                                        
                                        Коментариев пока нет. БУДЬ ПЕРВЫМ.
                                    </div>
<?php } if(count($selCommentForNovo) > 0){?>
                                    <ul>
<?php foreach($selCommentForNovo as $item){ if($item["step"] > 7){$step = 7*20+90;}else{$step = $item["step"]*20+90;}?>
                                        <li>
                                            <img src="img/def_avatar.png" alt="">
                                            <div class="comm_page_body" style="margin-left: <?php echo $step; ?>px;">
                                                <h6><?php echo $item["name_user"]; ?><span><?php echo upDate($item["date"]); ?></span></h6>
                                                <p><?php echo $item["text"]; ?></p>
                                                <a href="new_comment.php?id=<?php echo $selNovostroiData[0]["id"]; ?>&otvet=<?php echo $item["id"]; ?>&type=1" class="add_comment">Ответить</a>                                                   
                                            </div>
                                            
                                        </li>
<?php } ?>
                                    </ul>
<?php } ?>
                                <p style="color: #b4b4b4">На этой странице представлен своеобразный форум жильцов <?php echo $selNovostroiData[0]["name"]; ?>. Вы можете ознакомиться с отзывами о <?php echo $selNovostroiData[0]["name"]; ?> от собственников квартир и планирующих преобрести недвижемость. А так же имеете возможность Вы сами оставить отзывы или коментарии.</p>
                                </div>									
							</div>