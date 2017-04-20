<?php
    if (isset($_GET['k']))       {$k = $_GET['k'];          $k = abs((int)$k);} 
    //print_r(ipMessage("37.204.128.96"));
    //echo date("d-m-H-i-s",$date1 = $time - time()%(3600*24) - date("Z"));
    $date1 = $time - time()%(3600*24) - date("Z");
    $date2 = $date1 - 86400;
    $date3 = $date1 - 518400;
    $date4 = $date1 - 2592000;
?>
				<div class="main_content">
					<div class="content">
						<h1 class="page-header" style="margin-top: 0">Статистика по переходам.</h1>
                        <div  class="static_table">
                            <ul>
                                <li style="font-weight: bold;">Фильтр:</li>
                                <li><a onclick="sortDate(<?php echo $k; ?>, <?php echo $date1; ?>, <?php echo $time; ?>)">Сегодня</a></li>
                                <li><a onclick="sortDate(<?php echo $k; ?>, <?php echo $date2; ?>, <?php echo $date1; ?>)">Вчера</a></li>
                                <li><a onclick="sortDate(<?php echo $k; ?>, <?php echo $date3; ?>, <?php echo $time; ?>)">За 7 дней</a></li>
                                <li><a onclick="sortDate(<?php echo $k; ?>, <?php echo $date4; ?>, <?php echo $time; ?>)">За 30 дней</a></li>
                                <li><a onclick="sortDate(<?php echo $k; ?>, <?php echo "0000000001"; ?>, <?php echo $time; ?>)">Все</a></li>
                                <li>Выбрать дату: <input type="text" id="datepicker"></li>
                            </ul>
                            <script>
  $(function() {
    $.datepicker.regional['ru'] = { 
        closeText: 'Закрыть', 
        prevText: '&#x3c;Пред', 
        nextText: 'След&#x3e;', 
        currentText: 'Сегодня', 
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'], 
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'], 
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'], 
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'], 
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'], 
        dateFormat: 'yy-mm-dd', 
        firstDay: 1, 
        isRTL: false 
    };
    
    $.datepicker.setDefaults($.datepicker.regional['ru']); 
    $( "#datepicker" ).datepicker({onClose: function(dateText, inst) { dateCal(<?php echo $k; ?>) }});
  });
  </script>
                            <div  id="main_static">
                            <table>
                                <tr style="font-weight: bold; text-align: center; color: #fff; background-color: #696969;">
                                    <td style="width: 7%;">№</td>
                                    <td>Время перехода</td>
                                    <td>IP пользователя</td>
                                    <td style="width: 7%;">Страна</td>
                                    <td style="width: 17%;">Город</td>
                                </tr>
<?php 
    if(statistica_main($k, $date1, $time)){
    $statistica_main = statistica_main($k, $date1, $time); 
?>                                
<?php $count_statistica_main = 0; $stat_style = 0; $date_style=""; foreach($statistica_main as $item_statistica_main){ $count_statistica_main++;?>
                                <tr <?php if($date_style == $item_statistica_main["data_d"]){if($stat_style == 0){echo 'class="static_edd"';}}else{if($stat_style == 0){$stat_style = 1;}else{$stat_style = 0; echo 'class="static_edd"';}} ?>>
                                    <td><?php echo $count_statistica_main; ?></td>
                                    <td><?php echo upDate($item_statistica_main["time_d"]); ?></td>
                                    <td><?php echo $item_statistica_main["ip"]; ?></td>
                                    <td style="text-align: center;"><?php if($item_statistica_main["country"] != 'n/a'){echo '<img src="img/flag_ico/'.strtolower($item_statistica_main["country"]).'.png" title="'.$name_contry[$item_statistica_main["country"]].'" >';}else{echo $item_statistica_main["country"];}; ?></td>
                                    <td><?php echo $item_statistica_main["sity"]; ?></td>
                                </tr>
<?php $date_style = $item_statistica_main["data_d"]; ?>
<?php }}else{ ?>
                            <tr>
                                <td></td>
                                <td style="color: #adadad; font-size: 20px; width: 100%;">Данные отсутствуют</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
<?php } ?>
                            </table>
                            </div>                            
                        </div>
						<hr/>					
					</div>											
				</div>
