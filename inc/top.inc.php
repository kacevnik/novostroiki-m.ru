<?php if(!$fin){exit("ERROR");} ?>
		<div class="top">
            
                <div class="center_content">
    				<div class="top_box">
    					<div class="top_header">
    						<div class="top_header_name_site">
    							<div class="top_logo">
    								<a href="index.php" title="Новостройки Москвы и Подмосковья"><img src="img/logo.png" alt="Новостройки Подмосковья"/></a>	
    							</div>
    							<div class="top_name_site">
    								<a href="index.php">Novostroiki-m.ru</a>	
    							</div>
    						</div>
    <?php if(!$_SESSION["admin"]){ ?>
    						<div class="top_link_enter">
    							<a href="new_user.php">Регистрация</a><br/>
    							<a href="new_pass.php">Напомнить пароль</a>
    						</div>
    						<div class="top_form_in">
    							<form method="post" action="login.php">
    								<input type="text" name="login_in" placeholder="Логин" autocomplete="off" required="required" class="in"/>
    								<input type="password" name="pass_in" placeholder="Пароль" autocomplete="off" required="required" class="in"/>
    								<input type="submit" name="submit_in" class="sub" value="Вход"/>
    							</form>	
    						</div>
    <?php }else{ ?>			
                            <ul class="top_user_menu">
                                <li><a href="lk.php">Кабинет</a></li>
                                <li><a href="">Настройки</a></li>
                                <li><a href="logout.php">Выход</a></li>
                            </ul>
    <?php } ?>				
    					</div>
    					<div class="header_nav">
    						<ul class="header_menu">
    							<li <?php if($str == 1){echo 'class="activ"';}?>><a href="index.php">Главная</a></li>
    							<li <?php if($str == 2){echo 'class="activ"';}?>><a href="baza.php">База новостроек</a></li>
    							<li <?php if($str == 3){echo 'class="activ"';}?>><a href="map.php">Новостройки на карте</a></li>
    							<li <?php if($str == 4){echo 'class="activ"';}?>><a href="art.php">Статьи</a></li>
    							<li <?php if($str == 5){echo 'class="activ"';}?>><a href="ans.php">Обратная связь</a></li>
    						</ul>
    						<div class="header_right">
    							<a href="add-novostroika.php" class="header_right_a">Добавить объект</a>
    							<div class="plus_top">
    								<a href="add-novostroika.php">
    									<img src="img/plus_top.gif" alt="Добавить новостройку в базу"/>	
    								</a>								
    							</div>	
    						</div>						
    					</div>	
    				</div>
                    <?php if(hny()){ ?><div class="hny">
                    </div><?php } ?>
                </div>
		</div>