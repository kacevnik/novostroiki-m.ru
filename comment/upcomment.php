<?php
    if (isset($_POST['id']))   {$id = $_POST['id'];       $id = abs((int)$id);}
    if (isset($_POST['type'])) {$type = $_POST['type'];   $type = abs((int)$type);}
    include('../inc/db.php');
?>

<?php if(selCommentForNovo($id, $type)){$selCommentForNovo = selCommentForNovo($id, $type);} ?>
                                    <div class="new_comm">
                                        <a href="new_comment.php?id=<?php echo $id; ?>&otvet=0" class="add_comment">Добавить новый комментарий или отзыв</a>
                                        <!--Что бы оставить комментарий, нужно <a href="">Войти</a> или <a href="">Зарегистрироваться</a>-->
                                    </div>
<?php if(count($selCommentForNovo) == 0){ ?>
                                    <div class="new_comm">                                        
                                        Коментариев пока нет. БУДЬ ПЕРВЫМ.
                                    </div>
<?php } if(count($selCommentForNovo) > 0){?>
                                    <ul>
<?php foreach($selCommentForNovo as $item){ if($item["step"] > 7){$step = 7*20;}else{$step = $item["step"]*20;}?>
                                        <li style="<?php echo 'margin-left:'.$step.'px' ?>">
                                            <img src="img/def_avatar.png" alt="">
                                            <div class="comm_page_body">
                                                <h6><?php echo $item["name_user"]; ?><span><?php echo upDate($item["date"]); ?></span></h6>
                                                <p><?php echo $item["text"]; ?></p>
                                                <a href="new_comment.php?id=<?php echo $id; ?>&otvet=<?php echo $item["id"]; ?>&type=<?php echo $type; ?>" class="add_comment">Ответить</a>
                                            </div>
                                        </li>
<?php } ?>
                                    </ul>
<?php } ?>