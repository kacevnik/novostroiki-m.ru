<?php
    include("../inc/db.php");
        
    if (isset($_POST['k']))         {$k = $_POST['k'];                $k = abs((int)$k);}
    if (isset($_POST['date1']))     {$date1 = $_POST['date1'];        $date1 = abs((int)$date1);}
    if (isset($_POST['date2']))     {$date2 = $_POST['date2'];        $date2 = abs((int)$date2);}
?>
                                <table>
                                <tr style="font-weight: bold; text-align: center; color: #fff; background-color: #696969;">
                                    <td style="width: 7%;">№</td>
                                    <td>Время перехода</td>
                                    <td>IP пользователя</td>
                                    <td style="width: 7%;">Страна</td>
                                    <td style="width: 17%;">Город</td>                                    
                                </tr>
<?php
    if(statistica_main($k, $date1, $date2)){$statistica_main = statistica_main($k, $date1, $date2);
    $count_statistica_main = 0; $stat_style = 0; $date_style=""; foreach($statistica_main as $item_statistica_main){ $count_statistica_main++;
?>
                                <tr <?php if($date_style == $item_statistica_main["data_d"]){if($stat_style == 0){echo 'class="static_edd"';}}else{if($stat_style == 0){$stat_style = 1;}else{$stat_style = 0; echo 'class="static_edd"';}} ?>>
                                    <td>
                                    
                                    <?php echo $count_statistica_main; ?></td>
                                    <td><?php echo upDate($item_statistica_main["time_d"]); ?></td>
                                    <td><?php echo $item_statistica_main["ip"]; ?></td>
                                    <td style="text-align: center;"><?php if($item_statistica_main["country"] != 'n/a'){echo '<img src="img/flag_ico/'.strtolower($item_statistica_main["country"]).'.png" title="'.$name_contry[$item_statistica_main["country"]].'" >';}else{echo $item_statistica_main["country"];}; ?></td>
                                    <td><?php echo $item_statistica_main["sity"]; ?></td>
                                </tr>
                                <?php $date_style = $item_statistica_main["data_d"]; ?>
<?php } }else{?>
                                <tr>
                                    <td></td>
                                    <td style="color: #adadad; font-size: 20px;">Данные отсутствуют</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
<?php } ?>
                            </table>