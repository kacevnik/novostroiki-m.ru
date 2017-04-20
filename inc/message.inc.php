<?php if(!$fin){exit("ERROR");} ?>
<?php echo $_SESSION["error2"]; unset($_SESSION["error2"]); ?>
			<div class="content_page_new_user">
				    <h1>Отправтье нам сообщение</h1>
                    <form class="reg_form" action="" method="post" style="width: 400px;">
                        <input type="text" name="name_message" class="reg_input" autocomplete="off" placeholder="Ваше имя" style="width: 400px;" required="required">
                        <input type="text" name="email_message" class="reg_input" autocomplete="off" placeholder="E-mail" style="width: 400px;" required="required">
                        <textarea name="text_message" class="reg_input" maxlength="2500" placeholder="Сообщение" style="width: 400px; height: 80px;resize: vertical;"></textarea>
                        <div style="clear: both;"></div>
                        <div class="capcha_mess">
                            <span id="capcha"><img src="../capcha.php" class="img_capcha" onclick="reload_capcha()"/></span>
                            <div style="margin: 0 0 0 116px;"><input type="text" name="capcha_message" class="reg_input_capcha" autocomplete="off" required="required"></div>
                            <div class="div_capcha" style="margin:  42px 0 0 116px;">Введите символы с картинки</div>
                        </div>
                        <input type="submit" name="submit_message" class="reg_sub" value="Отправить"  style="width: 400px;"> 
                        <?php if($_SESSION["error"]){echo $_SESSION["error"]; unset($_SESSION["error"]);}else{ ?>
                        <p>Все поля обязательны к заполнению</p>
                        <?php } ?>   
                    </form>							
			</div>