                <div class="main_content">
					<div class="content">
						<h1 style="margin-top: 0">Личный кабинет</h1>
						<div class="page_content" style="width: 100%;">
<?php include("lk_menu.inc.php"); ?>							
                            <div class="nav_page_content">
                                <div class="item_block">
                                    <h2>Редактировать телефон:</h2>
                                    <form action="" method="post">
                                    <table class="tb_up_pass">
                                        <tr>
                                            <td>
                                                <input name="obj" type="text" id="object_end" class="reg_input" style="width: 350px; display: none;" value="<?php echo $valueObj; ?>">
                                                <div class="div_select">
                                                    <div class="div_select_text" style="float: left;"><?php echo $nameObj; ?></div>
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
                                                <input type="text" name="name_company" class="reg_input" autocomplete="off" required="required" value="<?php echo $nameCompany; ?>" style="width: 350px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="number_phone" class="reg_input" autocomplete="off" required="required" value="<?php echo $phonesUP; ?>" style="width: 350px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea name="text_comm" class="reg_input" maxlength="200" style="width: 350px; height: 80px;resize: vertical;"><?php echo $textsUP; ?></textarea>
                                            </td>
                                        <tr>
                                            <td class="lk_td_check">
                                                <input class="lk_check" type="checkbox" name="check"<?php if($fonUP == 1){echo 'checked="checked"';} ?> />Оповещать меня по E-mail при необходимости обновления времени
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="submitup" class="reg_sub" value="Сохранить изменения"/></td>
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
                                    <p>2. Номера не должны повторятся для одного объекта и не должны содержать добавочных номеров(Их можно указать в комментарии к номеру)</p>
                                    <p>3. Все поля кроме поля "Комментарий" должны быть обезательно заполнены.</p>
                                    <p>4. Поле "Комментарий" не более 200-х символов.</p>
                                    <p>5. Номера отоюражаются после проверки администрацией сайта.</p>    
                                </div>
							</div>                            
						</div>							
                    </div>															
	           </div>