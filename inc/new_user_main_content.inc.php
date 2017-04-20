			<?php if(!$fin){exit("ERROR");} ?>
            <?php echo $_SESSION["error2"]; unset($_SESSION["error2"]); ?>
            <div class="content_page_new_user">
				    <h1>Регистрация</h1>
                    <form class="reg_form" action="" method="post">
                        <input type="text" name="login_reg" class="reg_input" autocomplete="off" placeholder="Логин" required="required">
                        <input type="text" name="email_reg" class="reg_input" autocomplete="off" placeholder="E-mail" required="required">
                        <input type="password" name="pass_reg" class="reg_input" autocomplete="off" placeholder="Пароль" required="required">
                        <input type="password" name="pass_w_reg" class="reg_input" autocomplete="off" placeholder="Пароль еще раз" required="required">
                        <div style="clear: both;"></div>
                        <div class="capcha_mess">                        
                            <span id="capcha"><img src="../capcha.php" class="img_capcha" onclick="reload_capcha()"/></span>
                            <div style="margin: 0 0 0 116px;"><input type="text" name="capcha_reg" class="reg_input_capcha" autocomplete="off" required="required"></div>
                            <div class="div_capcha">Введите символы с картинки</div>
                        </div>

                        <input type="submit" name="submit_new_user" class="reg_sub" value="Регистрация"/>                         
                        <?php if($_SESSION["error"]){echo $_SESSION["error"]; unset($_SESSION["error"]);}else{ ?>
                        <p>Все поля обязательны к заполнению</p>
                        <?php } ?> 
                    </form>							
				</div>