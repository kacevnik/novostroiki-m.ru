			<?php if(!$fin){exit("ERROR");} ?>
            <?php echo $_SESSION["error2"]; unset($_SESSION["error2"]); ?>
            <div class="content_page_new_user">
				    <h1>Восстановление пароля</h1>
                    <form class="reg_form" action="" method="post">
                        <input type="password" name="new_pass1" class="reg_input" autocomplete="off" placeholder="Новый пароль" required="required">
                        <input type="password" name="new_pass2" class="reg_input" autocomplete="off" placeholder="Еще разок пароль" required="required">
                        <input type="submit" name="submit_new_pass2" class="reg_sub" value="Подтвердить"/>                         
                        <?php if($_SESSION["error"]){echo $_SESSION["error"]; unset($_SESSION["error"]);}else{ ?>
                        <p>Все поля обязательны к заполнению</p>
                        <?php } ?> 
                    </form>							
				</div>