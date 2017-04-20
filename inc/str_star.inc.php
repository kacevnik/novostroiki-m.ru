										<h3>Рейтинг<br><span><?php echo $selNovostroiData[0]["name"]; ?></span></h3>
										<p>Экология:</p>
                                        <img id="starimg_1" src="img/load.gif"style="display: none;"/>
										<ul id="starul_1">
<?php 
    $id = $selNovostroiData[0]["id"];

    if(selSrar($id,1)){
        $selStar = selSrar($id,1);
        $widthStar = round($selStar[0]["sum"]/$selStar[0]["stars"]*30);
        $countStat = $selStar[0]["stars"];
    }
    else{
        $widthStar = 0;
        $countStat = 0;    
    } 
?>
											<li class="star_r2" style="width: <?php echo $widthStar; $sS = "s".$id."1"; ?>px"></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 1,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" <?php if(selCookieIzbr3($_COOKIE["star"], 1,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,1,1)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 1,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 30px" <?php if(selCookieIzbr3($_COOKIE["star"], 1,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,1,2)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 1,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 60px" <?php if(selCookieIzbr3($_COOKIE["star"], 1,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,1,3)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 1,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 90px" <?php if(selCookieIzbr3($_COOKIE["star"], 1,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,1,4)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 1,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 120px" <?php if(selCookieIzbr3($_COOKIE["star"], 1,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,1,5)"<?php } ?>></li>
										</ul>
										<p class="reiting_count_before"><?php echo $countStat; ?></p>
										<p>Инфраструктура:</p>
                                        <img id="starimg_2" src="img/load.gif"style="display: none;"/>
										<ul id="starul_2">
<?php 
    if(selSrar($id,2)){
        $selStar = selSrar($id,2);
        $widthStar = round($selStar[0]["sum"]/$selStar[0]["stars"]*30);
        $countStat = $selStar[0]["stars"];
    }
    else{
        $widthStar = 0;
        $countStat = 0;    
    } 
?>
											<li class="star_r2" style="width: <?php echo $widthStar; $sS = "s".$id."2"; ?>px"></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 2,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" <?php if(selCookieIzbr3($_COOKIE["star"], 2,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,2,1)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 2,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 30px" <?php if(selCookieIzbr3($_COOKIE["star"], 2,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,2,2)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 2,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 60px" <?php if(selCookieIzbr3($_COOKIE["star"], 2,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,2,3)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 2,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 90px" <?php if(selCookieIzbr3($_COOKIE["star"], 2,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,2,4)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 2,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 120px" <?php if(selCookieIzbr3($_COOKIE["star"], 2,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,2,5)"<?php } ?>></li>
										</ul>
										<p class="reiting_count_before"><?php echo $countStat; ?></p>
										<p>Транспортная доступность:</p>
                                        <img id="starimg_3" src="img/load.gif"style="display: none;"/>
										<ul id="starul_3">
<?php 
    if(selSrar($id,3)){
        $selStar = selSrar($id,3);
        $widthStar = round($selStar[0]["sum"]/$selStar[0]["stars"]*30);
        $countStat = $selStar[0]["stars"];
    }
    else{
        $widthStar = 0;
        $countStat = 0;    
    } 
?>
											<li class="star_r2" style="width: <?php echo $widthStar; $sS = "s".$id."3"; ?>px"></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 3,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" <?php if(selCookieIzbr3($_COOKIE["star"], 3,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,3,1)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 3,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 30px" <?php if(selCookieIzbr3($_COOKIE["star"], 3,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,3,2)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 3,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 60px" <?php if(selCookieIzbr3($_COOKIE["star"], 3,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,3,3)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 3,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 90px" <?php if(selCookieIzbr3($_COOKIE["star"],3,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,3,4)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 3,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 120px" <?php if(selCookieIzbr3($_COOKIE["star"], 3,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,3,5)"<?php } ?>></li>
										</ul>
										<p class="reiting_count_before"><?php echo $countStat; ?></p>
										<p>Цена - Качество:</p>
                                        <img id="starimg_4" src="img/load.gif"style="display: none;"/>
										<ul id="starul_4">
<?php 
    if(selSrar($id,4)){
        $selStar = selSrar($id,4);
        $widthStar = round($selStar[0]["sum"]/$selStar[0]["stars"]*30);
        $countStat = $selStar[0]["stars"];
    }
    else{
        $widthStar = 0;
        $countStat = 0;    
    } 
?>
											<li class="star_r2" style="width: <?php echo $widthStar; $sS = "s".$id."4"; ?>px"></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 4,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" <?php if(selCookieIzbr3($_COOKIE["star"], 4,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,4,1)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 4,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 30px" <?php if(selCookieIzbr3($_COOKIE["star"], 4,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,4,2)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 4,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 60px" <?php if(selCookieIzbr3($_COOKIE["star"], 4,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,4,3)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 4,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 90px" <?php if(selCookieIzbr3($_COOKIE["star"],4,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,4,4)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 4,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 120px" <?php if(selCookieIzbr3($_COOKIE["star"], 4,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,4,5)"<?php } ?>></li>
										</ul>
										<p class="reiting_count_before"><?php echo $countStat; ?></p>
										<p>Общая оценка:</p>
                                        <img id="starimg_5" src="img/load.gif"style="display: none;"/>
										<ul id="starul_5">
<?php 
    if(selSrar($id,5)){
        $selStar = selSrar($id,5);
        $widthStar = round($selStar[0]["sum"]/$selStar[0]["stars"]*30);
        $countStat = $selStar[0]["stars"];
    }
    else{
        $widthStar = 0;
        $countStat = 0;    
    } 
?>
											<li class="star_r2" style="width: <?php echo $widthStar; $sS = "s".$id."5"; ?>px"></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 5,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" <?php if(selCookieIzbr3($_COOKIE["star"], 5,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,5,1)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 5,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 30px" <?php if(selCookieIzbr3($_COOKIE["star"], 5,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,5,2)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 5,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 60px" <?php if(selCookieIzbr3($_COOKIE["star"], 5,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,5,3)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 5,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 90px" <?php if(selCookieIzbr3($_COOKIE["star"],5,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,5,4)"<?php } ?>></li>
											<li class="<?php if(selCookieIzbr3($_COOKIE["star"], 5,$id) or $_SESSION[$sS] == 1){echo "star_r4";}else{ ?>star_r1<?php } ?>" style="left: 120px" <?php if(selCookieIzbr3($_COOKIE["star"], 5,$id) or $_SESSION[$sS] == 1){}else{?>onclick="addstar(<?php echo $id ?>,5,5)"<?php } ?>></li>
										</ul>
										<p class="reiting_count_before"><?php echo $countStat; ?></p>
                                    	<script>
                                            $('.star_r1').hover(function(){
                            					var a1 = $(this);
                            					a1.addClass('star_r3');
                            					var a2 = a1.prev();
                            					a2.addClass('star_r3');
                            					var a3 = a2.prev();
                            					a3.addClass('star_r3');
                            					var a4 = a3.prev();
                            					a4.addClass('star_r3');
                            					var a5 = a4.prev();
                            					a5.addClass('star_r3');
                            					$('.star_r2').removeClass('star_r3');
                            				},function(){
                            					$('.star_r2').removeClass('star_r3');
                            					$('.star_r1').removeClass('star_r3');
                            				});
                                        </script>