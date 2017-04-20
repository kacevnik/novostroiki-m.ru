                <div class="main_content">
					<div class="content">
						<h1 style="margin-top: 0">Личный кабинет</h1>
						<div class="page_content" style="width: 100%;">
<?php include("lk_menu.inc.php"); ?>							
                            <div class="nav_page_content">
                                <div class="item_block">
                                    <h2>Смена пароля</h2>
                                    <form action="" method="post">
                                    <table class="tb_up_pass">
                                        <tr>
                                            <td><input type="password" name="old_pass" class="reg_input" autocomplete="off" required="required" placeholder="Старый Пароль" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="password" name="new_pass" class="reg_input" autocomplete="off" required="required" placeholder="Новый Пароль"/></td>
                                        </tr>
                                        <tr>
                                            <td><input type="password" name="new_pass_w" class="reg_input" autocomplete="off" required="required" placeholder="Еще раз новый пароль"/></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="submit" class="reg_sub" value="Сменить пароль"/></td>
                                        </tr>
                                    </table>                                       
                                    </form>
                                    <div class="up_pass_message">
                                        Будте внимательны при смене пароля. Следует заполнить все поля. Минимум 4, максимум 20 символов латинского алфавита, а так же цифры от 0 до 9.
                                    </div>
                                </div>
							</div>                            
						</div>							
                    </div>															
	           </div>