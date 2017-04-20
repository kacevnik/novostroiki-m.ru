				<div class="left">
<?php if($str == 4){include("left_list_cat.inc.php");}  ?>
<?php include("vip.inc.php"); ?>
                    <div class="history_clock">
                        <h2>Последние<br>просмотренные новостройки</h2>
                        <ul>
<?php 
    if($_COOKIE["history"]){
        arsort($_COOKIE["history"]);
        foreach ($_COOKIE["history"] as $key => $val) {
            $key = abs((int)$key);
            $resNameHistory = mysql_query("SELECT name,alias FROM novostroj WHERE id='$key'",$db);
            if(mysql_num_rows($resNameHistory)>0){
                $myrNameHistory = mysql_fetch_assoc($resNameHistory);
?>
                            <li><a href="str.php?al=<?php echo $myrNameHistory["alias"]; ?>"><?php echo $myrNameHistory["name"]; ?></a><span><?php echo upDate($val) ?></span></li>
<?php
            }            
        }
    }
?>
                        </ul>
                    </div>
                    <div id="izbr">
<?php if($_COOKIE["izbr"]){ ?>
                    
                        <div class="history_star">
                            <h2>Избранные новостройки</h2>
                            <ul>
<?php echo selCookieIzbr($_COOKIE["izbr"]); ?>
                            </ul>
                        </div>
<?php ;} ?>
                    </div>
                    <div class="history_prise">
                        <h2>Средняя стоимость м<sup>2</sup></h2>
                        <span id="info_prise"><?php $selPriseAndPars = selPriseAndPars('http://www.kurs.metrinfo.ru/kurs'); echo number_format($selPriseAndPars[0]["rub"],0,'.',' ')." руб" ?></span>
                        <ul>
                            <li class="activ_s" title="<?php echo number_format($selPriseAndPars[0]["rub"],0,'.',' ')." руб" ?>">RUB</li>
                            <li title="<?php echo number_format($selPriseAndPars[0]["eur"],0,'.',' ')." &#8364;"; ?>">EUR</li>
                            <li title="<?php echo number_format($selPriseAndPars[0]["usd"],0,'.',' ')." $"; ?>" style="width: 68px;">USD</li>
                        </ul>
                        <a href="">График цен на м<sup>2</sup></a>
                    </div>
                    <div class="history_home">
                        <h2>Популярные новостройки</h2>
                        <ul>
<?php if(selPopulNovo(5)){ $selPopulNovo = selPopulNovo(5); foreach($selPopulNovo as $item){ ?>
                            <li><a href="str.php?al=<?php echo $item["alias"]; ?>"><?php echo $item["name"]; ?></a></li>
<?php }} ?>
                        </ul>
                    </div>
                    <div class="mail_line">
                        <h2>Подписаться<br>на новые новостройки</h2>
                        <form method="post" action="" onsubmit="return subForm()">
                            <input type="text" name="email_mail_sub" class="reg_input" id="email_mail_sub" autocomplete="off" placeholder="E-mail" style="width: 205px;" required="required">
                            <input type="submit" name="submit_mail_sub" class="reg_sub" id="submit_mail_sub" value="Отправить" style="width: 205px; margin-bottom: 10px;">
                        </form>
                    </div>	
				</div>