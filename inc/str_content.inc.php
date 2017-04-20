<?php
    if(!$fin){exit("ERROR");} 
    include("str_menu.inc.php");
    if($op == "forum"){include("str_forum.inc.php");}
    elseif($op == "foto"){include("str_foto.inc.php");}
    elseif($op == "buy"){include("str_buy.inc.php");}
    else{include("str_opisanie.inc.php");}
    
    include("str_rydom.inc.php"); 
?>	
						</div>
<?php include("str_content_right.inc.php"); ?>							
						</div>															
					</div>