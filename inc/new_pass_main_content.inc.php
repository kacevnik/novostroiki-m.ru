			<?php if(!$fin){exit("ERROR");} ?>
            <?php echo $_SESSION["error2"]; unset($_SESSION["error2"]); ?>
            <div class="content_page_new_user">
				    <h1>Восстановление пароля</h1>
                    <form class="reg_form" action="" method="post">
                        <input type="text" name="email_pass" class="reg_input" autocomplete="off" placeholder="E-mail" required="required">
                        <div style="clear: both;"></div>
                        <div class="capcha_mess">
                            <span id="capcha"><img src="../capcha.php" class="img_capcha" onclick="reload_capcha()"/></span>
                            <div style="margin: 0 0 0 116px;"><input type="text" name="capcha_pass" class="reg_input_capcha" autocomplete="off" required="required"></div>
                            <div class="div_capcha">Введите символы с картинки</div>
                        </div>
                        <input type="submit" name="submit_new_pass" class="reg_sub" value="Восстановить"/>                         
                        <?php if($_SESSION["error"]){echo $_SESSION["error"]; unset($_SESSION["error"]);}else{ ?>
                        <p>Все поля обязательны к заполнению</p>
                        <?php } ?> 
                    </form>							
				</div>