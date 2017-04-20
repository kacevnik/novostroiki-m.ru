<?php if(!$fin){exit("ERROR");} ?>
<?php echo $_SESSION["error2"]; unset($_SESSION["error2"]); ?>
			<div class="content_page_new_user">
				    <h1>Доьавить объект в базу</h1>
                    <form class="reg_form" action="" method="post" style="width: 400px;">
                        <label>Наименование</label>
                        <input type="text" name="name_add_novo" class="reg_input" autocomplete="off" style="width: 400px;" required="required">
                        <label>Описание</label>
                        <textarea name="text_add_novo" class="reg_input" maxlength="5000" style="width: 400px; height: 80px;resize: vertical;"></textarea>
                        <label>Ваш E-mail</label>
                        <input type="text" name="email_add_novo" class="reg_input" autocomplete="off" style="width: 400px;" required="required">
                        <label>Ваш телефон для связи</label>
                        <input type="text" name="phone_add_novo" class="reg_input" autocomplete="off" style="width: 400px;" placeholder="+7 (926) 000-00-00">                        
                        <div style="clear: both;"></div>
                        <div class="g-recaptcha" data-sitekey="6LcLRB0UAAAAAB-vv_yl9t_S4c8IPQcV43OfNp7Y"></div>
                        <input type="submit" name="submit_add_novo" class="reg_sub" value="Отправить"  style="width: 400px;"> 
                        <?php if($_SESSION["error"]){echo $_SESSION["error"]; unset($_SESSION["error"]);} ?>  
                    </form>							
			</div>