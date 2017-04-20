<?php if(selLeftCategory()){ ?>                    
                    <div class="history_list_cat">
                        <h2>КАТЕГОРИИ</h2>
                        <ul>
<?php $selLeftCategory = selLeftCategory(); foreach($selLeftCategory as $item){ 
    $selCountArts = mysql_query("SELECT id FROM article WHERE cat='".$item['id']."' AND pokaz='1'",$db);
    $count = mysql_num_rows($selCountArts);    
?>
                            <li><a href="art-cat.php?cat=<?php echo $item["id"] ?>"><?php echo $item["name"] ?></a><?php if($count>0){ ?><span><?php echo $count; ?></span><?php } ?></li>
<?php } ?>
                        </ul>
                    </div>
<?php } ?>