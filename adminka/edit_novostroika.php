<?php 
    include("inc/db.php");
    
    if (isset($_GET['id']))         {$id = $_GET['id'];              $id = trim(stripslashes(htmlspecialchars($id)));}
    
    $res_Id = mysql_query("SELECT * FROM novostroj WHERE id='$id'",$db);
    if(mysql_num_rows($res_Id) > 0){
        $myr_Id = mysql_fetch_array($res_Id);    
    }
    else{
        $_SESSION['error'] = "<div class='error'>Неправильный запрос.</div>";
        header("Location: index.php");
        exit();    
    }
    
    $urlka = $_SERVER["HTTP_REFERER"];
    
    if (isset($_POST['submit']))         {$submit = $_POST['submit'];              $submit = trim(stripslashes(htmlspecialchars($submit)));}
    if (isset($_POST['submit2']))        {$submit2 = $_POST['submit2'];            $submit2 = trim(stripslashes(htmlspecialchars($submit2)));}
    
    if (isset($_POST['name']))           {$name = $_POST['name'];                  $name = trim(stripslashes(htmlspecialchars($name)));}
    if (isset($_POST['alias']))          {$alias = $_POST['alias'];                $alias = trim(stripslashes(htmlspecialchars($alias)));}
    if (isset($_POST['prise_ot']))       {$prise_ot = $_POST['prise_ot'];          $prise_ot = trim(stripslashes(htmlspecialchars($prise_ot)));}
    if (isset($_POST['prise_do']))       {$prise_do = $_POST['prise_do'];          $prise_do = trim(stripslashes(htmlspecialchars($prise_do)));}
    if (isset($_POST['p_min']))          {$p_min = $_POST['p_min'];                $p_min = trim(stripslashes(htmlspecialchars($p_min)));}
    if (isset($_POST['p_max']))          {$p_max = $_POST['p_max'];                $p_max = trim(stripslashes(htmlspecialchars($p_max)));}
    if (isset($_POST['transport']))      {$transport = $_POST['transport'];        $transport = trim(stripslashes(htmlspecialchars($transport)));}
    if (isset($_POST['mkad']))           {$mkad = $_POST['mkad'];                  $mkad = trim(stripslashes(htmlspecialchars($mkad)));}
    if (isset($_POST['komnat']))         {$komnat = $_POST['komnat'];              $komnat = trim(stripslashes(htmlspecialchars($komnat)));}
    if (isset($_POST['spec']))           {$spec = $_POST['spec'];                  $spec = trim(stripslashes(htmlspecialchars($spec)));}
    if (isset($_POST['status']))         {$status = $_POST['status'];              $status = trim(stripslashes(htmlspecialchars($status)));}
    if (isset($_POST['big_adres']))      {$big_adres = $_POST['big_adres'];        $big_adres = trim(stripslashes(htmlspecialchars($big_adres)));}
    if (isset($_POST['adres']))          {$adres = $_POST['adres'];                $adres = trim(stripslashes(htmlspecialchars($adres)));}
    if (isset($_POST['phone']))          {$phone = $_POST['phone'];                $phone = trim(stripslashes(htmlspecialchars($phone)));}
    if (isset($_POST['sait']))           {$sait = $_POST['sait'];                  $sait = trim(stripslashes(htmlspecialchars($sait)));}    
    if (isset($_POST['okrug']))          {$okrug = $_POST['okrug'];                $okrug = trim(stripslashes(htmlspecialchars($okrug)));}
    if (isset($_POST['metro']))          {$metro = $_POST['metro'];                $metro = trim(stripslashes(htmlspecialchars($metro)));}
    if (isset($_POST['dis']))            {$dis = $_POST['dis'];                    $dis = trim($dis);}
    if (isset($_POST['zoom']))           {$zoom = $_POST['zoom'];                  $zoom = trim(stripslashes(htmlspecialchars($zoom)));}
    if (isset($_POST['dolg']))           {$dolg = $_POST['dolg'];                  $dolg = trim(stripslashes(htmlspecialchars($dolg)));}
    if (isset($_POST['shir']))           {$shir = $_POST['shir'];                  $shir = trim(stripslashes(htmlspecialchars($shir)));}    
    if (isset($_POST['title']))          {$title = $_POST['title'];                $title = trim(stripslashes(htmlspecialchars($title)));}
    if (isset($_POST['meta_k']))         {$meta_k = $_POST['meta_k'];              $meta_k = trim(stripslashes(htmlspecialchars($meta_k)));}
    if (isset($_POST['meta_d']))         {$meta_d = $_POST['meta_d'];              $meta_d = trim(stripslashes(htmlspecialchars($meta_d)));}
    if (isset($_POST['hit']))            {$hit = $_POST['hit'];                    $hit = trim(stripslashes(htmlspecialchars($hit)));}
    if (isset($_POST['date']))           {$date = $_POST['date'];                  $date = trim(stripslashes(htmlspecialchars($date)));}
    if (isset($_POST['arxiv']))          {$arxiv = $_POST['arxiv'];                $arxiv = trim(stripslashes(htmlspecialchars($arxiv)));}    
    if (isset($_POST['pokaz']))          {$pokaz = $_POST['pokaz'];                $pokaz = trim(stripslashes(htmlspecialchars($pokaz)));}
    if (isset($_POST['vip']))            {$vip = $_POST['vip'];                    $vip = trim(stripslashes(htmlspecialchars($vip)));}
    if (isset($_POST['count_img']))      {$count_img = $_POST['count_img'];        $count_img = abs((int)$count_img);}
    if (isset($_POST['ipoteka']))        {$ipoteka = $_POST['ipoteka'];            $ipoteka = abs((int)$ipoteka);}
    if (isset($_POST['rassrochka']))     {$rassrochka = $_POST['rassrochka'];      $rassrochka = abs((int)$rassrochka);}
    if (isset($_POST['v_ipoteka']))      {$v_ipoteka = $_POST['v_ipoteka'];        $v_ipoteka = abs((int)$v_ipoteka);}
    if (isset($_POST['parking']))        {$parking = $_POST['parking'];            $parking = abs((int)$parking);}
    if (isset($_POST['fz_214']))         {$fz_214 = $_POST['fz_214'];              $fz_214 = abs((int)$fz_214);}
    if (isset($_POST['otdelka']))        {$otdelka = $_POST['otdelka'];            $otdelka = abs((int)$otdelka);}
    if (isset($_POST['w_metro']))        {$w_metro = $_POST['w_metro'];            $w_metro = abs((int)$w_metro);}
    if (isset($_POST['thouse']))         {$thouse = $_POST['thouse'];              $thouse = abs((int)$thouse);}
    if (isset($_POST['apart']))          {$apart = $_POST['apart'];                $apart = abs((int)$apart);}
    
    $sel_count_img = mysql_query("SELECT id FROM foto WHERE novostroika='$id'",$db);
    $sel_count_img = mysql_num_rows($sel_count_img);

    if ($name == "" or $name == " "){unset($name);}
    if ($alias == "" or $alias == " "){unset($alias);}
    
    if($submit2){
        if($count_img){
            $count_Img2 = 0;
            for($count_i = 1; $count_i <= $count_img; $count_i++){                
                $name_img = $count_i.".jpg";
                $proverka_img = mysql_query("SELECT id FROM foto WHERE novostroika='$id' AND url='$name_img'",$db);
                if(mysql_num_rows($proverka_img) > 0){continue;}
                    $date_img = date("Y-m-d");
                    $up_count_img = mysql_query("INSERT INTO foto(url,novostroika,date,m_date) VALUES ('$name_img','$id','$date_img','$time')",$db);
                    $count_Img2++;   
            }
                $_SESSION['error'] = "<div class='error_plus'>Добавлено ".$count_Img2." шт.</div>";
                header("Location: ".$urlka);
                exit();
        }
    }
    
    if($submit){
        if($name and $alias){
            $new_Novostroika = mysql_query("UPDATE novostroj SET name='$name',alias='$alias',prise_ot='$prise_ot',prise_do='$prise_do',p_min='$p_min',p_max='$p_max',transport='$transport',mkad='$mkad',komnat='$komnat',spec='$spec',status='$status',big_adres='$big_adres',adres='$adres',phone='$phone',sait='$sait',okrug='$okrug',metro='$metro',dis='$dis',zoom='$zoom',dolg='$dolg',shir='$shir',title='$title',meta_k='$meta_k',meta_d='$meta_d',hit='$hit',date='$date',arxiv='$arxiv',pokaz='$pokaz',vip='$vip',ipoteka='$ipoteka',rassrochka='$rassrochka',v_ipoteka='$v_ipoteka',parking='$parking',fz_214='$fz_214',otdelka='$otdelka',w_metro='$w_metro',thouse='$thouse',apart='$apart' WHERE id='$id'",$db); 
            if($new_Novostroika){
                $_SESSION['error'] = "<div class='error_plus'>Сохранения изменины.</div>";
                header("Location: ".$urlka);
                exit();   
            }
            else{
                $_SESSION['error'] = "<div class='error'>Ошибка сохранения</div>";
                header("Location: ".$urlka);
                exit();    
            }
               
        }
        else{
            $_SESSION['error'] = "<div class='error'>Ошибка! Нет имени или алиаса.</div>";
            header("Location: add_novostroika.php");
            exit();
        }
    }
     
    include("inc/head.php");
?>
	<title>Редактировать новостройку</title>
</head>
    <h1><a href="index.php">На главную</a></h1>
<?php 
    echo $_SESSION['error']; 
    unset($_SESSION['error']);
?>
    <body>
        <form action="" method="post" style="margin: 0 0 40px 0;">
            <table>
            <tr>
            	<td style="padding: 3px 6px;">Название:</td>
            	<td style="padding: 3px 6px;"><input type="text" id="name_post" autocomplete="off" onkeyup="new_otziv(1)" onblur="proverka_alias(1)" onblur="new_otziv(1)" required="required" name="name" size="75" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["name"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Алиас:</td>
            	<td style="padding: 3px 6px;"><input type="text" id="alias" autocomplete="off" required="required" name="alias" onblur="proverka_alias(1)" size="75" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["alias"]; ?>"/><span id="imgalias"></span></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Цены от и до:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" name="prise_ot" size="20" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["prise_ot"]; ?>"/>
                <input type="text" autocomplete="off" name="prise_do" size="20" style="height: 25px; font-size: 20px; margin-left: 15px;" value="<?php echo $myr_Id["prise_do"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Площадь от и до:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" name="p_min" size="20" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["p_min"]; ?>"/>
                <input type="text" autocomplete="off" name="p_max" size="20" style="height: 25px; font-size: 20px; margin-left: 15px;" value="<?php echo $myr_Id["p_max"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Время до метро:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="transport" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["transport"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Расстояние до МКАД:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" name="mkad" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["mkad"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Комнат:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="komnat" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["komnat"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Спец. заголовок:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="spec" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["spec"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Статус маркера:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="status">
                        <option value="<?php echo $myr_Id["status"]; ?>" selected=""><?php echo $myr_Id["status"]; ?></option>
                        <option value="building-area">Building-area (Строительство)</option>
                        <option value="apartment">Apartment (Дом построен)</option>
                        <option value="villa">Villa (Таунхаус)</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Полный адрес:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="big_adres" size="75" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["big_adres"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Расположение:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="adres" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["adres"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Телефон:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="phone" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["phone"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Сайт:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="sait" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["sait"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Округ/Направление:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="okrug">
<?php
    $id_Okrug = $myr_Id["okrug"];
    $res_okrug_name = mysql_query("SELECT name FROM okrug WHERE id='$id_Okrug'",$db);
    $myr_okrug_name = mysql_fetch_array($res_okrug_name);
?>
                    <option value="<?php echo $id_Okrug; ?>" selected=""><?php echo $myr_okrug_name['name']; ?></option>
<?php 
    $resOkrug = mysql_query("SELECT id,name FROM okrug ORDER BY category",$db);
    $myrOkrug = mysql_fetch_array($resOkrug);
        do{
?>
                                <option value="<?php echo $myrOkrug['id']; ?>"><?php echo $myrOkrug['name']; ?></option>
<?php
    }
    while($myrOkrug = mysql_fetch_array($resOkrug));
?>  
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Метро:</td>
            	<td style="padding: 3px 6px;">
                    <select  style="height: 30px; font-size: 20px; width: 290px;" name="metro" id="sort_metro_id" >
<?php
    $id_Metro = $myr_Id["metro"];
    $res_metro_name = mysql_query("SELECT name FROM metro WHERE id='$id_Metro'",$db);
    $myr_metro_name = mysql_fetch_array($res_metro_name);
?>
                    <option value="<?php echo $id_Metro; ?>" selected=""><?php echo $myr_metro_name['name']; ?></option>
<?php 
    $resMetero = mysql_query("SELECT id,name FROM metro WHERE idgorod='1' ORDER BY name",$db);
    $myrMetero = mysql_fetch_array($resMetero);
        do{
?>
                                <option value="<?php echo $myrMetero['id']; ?>"><?php echo $myrMetero['name']; ?></option>
<?php
    }
    while($myrMetero = mysql_fetch_array($resMetero));
?>
                    </select>
                    <input type="text" autocomplete="off" id="sort_metro" onkeyup="sortirovka_metro(1)" size="20" style="height: 25px; font-size: 20px; margin-left: 15px;"/>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Описание:</td>
            	<td style="padding: 3px 6px;"><textarea name="dis" cols="77" rows="10"><?php echo $myr_Id['dis']; ?></textarea></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Зум на карте:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="zoom" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["zoom"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Широта:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="dolg" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["dolg"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Долгота:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="shir" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["shir"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Title:</td>
            	<td style="padding: 3px 6px;"><textarea name="title" cols="77" rows="3"><?php echo $myr_Id['title']; ?></textarea></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Meta keys:</td>
            	<td style="padding: 3px 6px;"><textarea name="meta_k" cols="77" rows="3"><?php echo $myr_Id['meta_k']; ?></textarea></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Meta Discription:</td>
            	<td style="padding: 3px 6px;"><textarea name="meta_d" cols="77" rows="3"><?php echo $myr_Id['meta_d']; ?></textarea></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Просмотры:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="hit" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["hit"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Дата:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="date" size="47" style="height: 25px; font-size: 20px;" value="<?php echo $myr_Id["date"]; ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Архив:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="arxiv">
                        <option value="<?php echo $myr_Id["arxiv"]; ?>" selected=""><?php if($myr_Id["arxiv"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["arxiv"]==1){echo "<option value='2'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Показ:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="pokaz">
                        <option value="<?php echo $myr_Id["pokaz"]; ?>" selected=""><?php if($myr_Id["pokaz"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["pokaz"]==1){echo "<option value='2'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Позиция:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="vip">
                        <?php if($myr_Id["vip"] == 0){echo "<option value='0' selected=''>Нет</option>";}if($myr_Id["vip"] == 1){echo "<option value='1' selected=''>Главная тройка</option>";}if($myr_Id["vip"] == 2){echo "<option value='2' selected=''>Боковая и низ</option>";}if($myr_Id["vip"] == 3){echo "<option value='3' selected=''>На главной</option>";} ?>
                        <option value="0">Нет</option>
                        <option value="1">Главная тройка</option>
                        <option value="2">Боковая и низ</option>
                        <option value="3">На главной</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Ипотека:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="ipoteka">
                        <option value="<?php echo $myr_Id["ipoteka"]; ?>" selected=""><?php if($myr_Id["ipoteka"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["ipoteka"]==1){echo "<option value='0'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Рассрочка:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="rassrochka">
                        <option value="<?php echo $myr_Id["rassrochka"]; ?>" selected=""><?php if($myr_Id["rassrochka"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["rassrochka"]==1){echo "<option value='0'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Военная ипотека:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="v_ipoteka">
                        <option value="<?php echo $myr_Id["v_ipoteka"]; ?>" selected=""><?php if($myr_Id["v_ipoteka"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["v_ipoteka"]==1){echo "<option value='0'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Подземный паркинг:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="parking">
                        <option value="<?php echo $myr_Id["parking"]; ?>" selected=""><?php if($myr_Id["parking"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["parking"]==1){echo "<option value='0'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Таунхаус:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="thouse">
                        <option value="<?php echo $myr_Id["thouse"]; ?>" selected=""><?php if($myr_Id["thouse"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["thouse"]==1){echo "<option value='0'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">ФЗ-214:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="fz_214">
                        <option value="<?php echo $myr_Id["fz_214"]; ?>" selected=""><?php if($myr_Id["fz_214"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["fz_214"]==1){echo "<option value='0'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Отделка:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="otdelka">
                        <option value="<?php echo $myr_Id["otdelka"]; ?>" selected=""><?php if($myr_Id["otdelka"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["otdelka"]==1){echo "<option value='0'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Рядом метро:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="w_metro">
                        <option value="<?php echo $myr_Id["w_metro"]; ?>" selected=""><?php if($myr_Id["w_metro"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["w_metro"]==1){echo "<option value='0'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Апартаменты:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="apart">
                        <option value="<?php echo $myr_Id["apart"]; ?>" selected=""><?php if($myr_Id["apart"] == 1){echo "Да";}else{echo "Нет";} ?></option>
                        <?php if($myr_Id["apart"]==1){echo "<option value='0'>Нет</option>";}else{echo "<option value='1'>Да</option>";}?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;"></td>
            	<td style="padding: 3px 6px;"><input type="submit" name="submit" style="padding:16px 96px; font-size: 24px; margin-top: 30px;" value="Сохранить"/></td>
            </tr>
            </form>
            <tr>
            	<td style="padding: 3px 6px;">Всего картинок</td>

            	<td style="padding: 3px 6px;"><?php echo $sel_count_img; if($sel_count_img>0){echo " шт.";}?> </td>
            </tr>
            <form action="" method="post">
            <tr>
            	<td style="padding: 3px 6px;">Добавить картинки:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" name="count_img" size="20" style="height: 25px; font-size: 20px;" value=""/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;"></td>
            	<td style="padding: 3px 6px;"><input type="submit" name="submit2" style="padding:8px 30px; margin-top: 10px;" value="Добавить"/></td>
            </tr>
            </form>
            </table>
        
        
    </body>
</html>