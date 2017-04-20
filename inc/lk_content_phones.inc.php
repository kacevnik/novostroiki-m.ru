                <div class="main_content">
					<div class="content">
						<h1 style="margin-top: 0">Личный кабинет</h1>
						<div class="page_content" style="width: 100%;">
<?php include("lk_menu.inc.php"); ?>							
                            <div class="nav_page_content">
<?php if(selListNumberPhone($userID)){$selListNumberPhone = selListNumberPhone($userID) ?>
                            <h2>Ваши добавленные телефоны:</h2>
                            <table class="page_table_buy">
<?php 
    $i=0; 
    foreach($selListNumberPhone as $itemPhones){ 
        $i++;
        $novostroiID = $itemPhones["novostroika"];
        $selDataNovostroi = mysql_query("SELECT alias,name FROM novostroj WHERE id='$novostroiID'",$db);
        if(mysql_num_rows($selDataNovostroi)== 0){
            $nameNovo = "Объект удален или не существует";
        }
        else{
            $myrDataNovostroi = mysql_fetch_assoc($selDataNovostroi);
            $nameNovo = $myrDataNovostroi["name"];
            $aliasNovo = $myrDataNovostroi["alias"];
        }
        if($itemPhones["fon"] == 0){
            $fonTitle = "Оповещение по E-mail выключено";
            $fonClass = "lk_email_off";
        }
        else{
            $fonTitle = "Оповещение по E-mail включено";
            $fonClass = "lk_email_on";
        }
        
        if($itemPhones["pokaz"] == 1){
            if($itemPhones["date"] < time()){
                $UpdateText = "Обновить";
                $UpdateID = 'id="update_'.$itemPhones["id"].'" ';
                $UpdateClass = "lk_update_phone";
            }
            if($itemPhones["date"] > time()){
                $UpdateText = upDate($itemPhones["date"]);
                $UpdateID = '';
                $UpdateClass = "lk_update_phone_in";    
            }
        }else{
                $UpdateText = "На проверке";
                $UpdateID = '';
                $UpdateClass = "lk_update_phone_in";
        }
?>
                                    <tr>
                                        <td class="lk_first_td"><?php echo $i; ?>.</td>
                                        <td>
                                            <div style="margin-bottom: 5px;">
                                                <h5><?php echo $itemPhones["developer"]; ?></h5>                                                
                                                    <a href="str.php?al=<?php echo $aliasNovo; ?>&op=buy" target="_blank" title="Перейти к объекту" class="lk_a_set lk_home"></a>
                                                    <a href="lk-phones.php?upd=<?php echo $itemPhones["id"]; ?>" title="Редактировать" class="lk_a_set lk_pen"></a>
                                                    <a id="mute_<?php echo $itemPhones["id"]; ?>" title="<?php echo $fonTitle; ?>" class="lk_a_set <?php echo $fonClass; ?>"></a>
                                                    <a href="lk-phones.php?del=<?php echo $itemPhones["id"]; ?>" title="Удалить" onclick ="return confirm('Удалить?');" class="lk_a_set lk_del"></a>
                                                
                                            </div>
                                            <div>
                                                <span><?php echo $itemPhones["comment"]; ?></span>
                                                <?php if($itemPhones["error"] == 1){ ?><p class="error_phone">Ошибка! Не соблюдены правила размещения номера</p><?php } ?>
                                            </div>
                                        </td>
                                        <td class="lk_phone"><?php echo $itemPhones["phone"]; ?><br /><span><?php echo $nameNovo ?></span></td>
                                        <td class="lk_last_td"><a <?php echo $UpdateID; ?>class="<?php echo $UpdateClass; ?>"><?php echo $UpdateText; ?></a></td>
                                    </tr>
<?php } ?>
                                </table>
<?php } ?>
                                <div class="item_block">
                                    <h2>Добавить новый телефон:</h2>
                                    <form action="" method="post">
                                    <table class="tb_up_pass">
                                        <tr>
                                            <td>
                                                <input name="obj" type="text" id="object_end" class="reg_input" style="width: 350px; display: none;" value="0">
                                                <div class="div_select">
                                                    <div class="div_select_text" style="float: left;">Выбрать новостройку</div>
                                                    <div class="div_select_arrow">
                                                </div>                                                
                                                <div id="list_block" class="div_select_list">
                                                    <div class="div_select_list_serch border_r3">
                                                        <input id="input_serch" type="text" class="div_select_list_serch_input"/>
                                                        <div class="div_select_list_serch_ico">
                                                        </div>
                                                    </div>
                                                    <ul class="list_serch">
<?php foreach($selMainMap as $item){ ?>
                                                        <li class="item_list_serch" id="serch_<?php echo $item["id"]; ?>"><?php echo $item["name"]; ?></li>
<?php } ?>
                                                    </ul>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="name_company" class="reg_input" autocomplete="off" required="required" placeholder="Название компании, офиса" style="width: 350px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="number_phone" class="reg_input" autocomplete="off" required="required" placeholder="Номер телефона" style="width: 350px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea name="text_comm" class="reg_input" maxlength="200" placeholder="Комментарий" style="width: 350px; height: 80px;resize: vertical;"></textarea>
                                            </td>
                                        <tr>
                                            <td class="lk_td_check">
                                                <input class="lk_check" type="checkbox" name="check" checked="checked"/>Оповещать меня по E-mail при необходимости обновления времени
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="submit" class="reg_sub" value="Добавить номер"/></td>
                                        </tr>
                                    </table>                                       
                                    </form>
                                    <div class="up_pass_message">                               
                                    </div>
                                </div>
                                <div style="clear: both;"></div>
                                <div class="lk_pravila">
                                    <h2>Правила использования номеров на портале Novostroiki-m.ru</h2>
                                    <p>1. Не более 3-х номеров на один аккаунт.</p>
                                    <p>2. Номера не должны повторяться для одного объекта и не должны содержать добавочных номеров (Их можно указать в комментарии к номеру)</p>
                                    <p>3. Все поля кроме поля "Комментарий" должны быть обязательно заполнены.</p>
                                    <p>4. Поле "Комментарий" не более 200-х символов.</p>
                                    <p>5. Номера отображаются после проверки администрацией сайта.</p>    
                                </div>
							</div>                            
						</div>							
                    </div>															
	           </div>