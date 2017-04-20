<?php 
    include("inc/db.php");
    
    if (isset($_POST['submit']))         {$submit = $_POST['submit'];              $submit = trim(stripslashes(htmlspecialchars($submit)));}
    
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
    if (isset($_POST['ipoteka']))        {$ipoteka = $_POST['ipoteka'];            $ipoteka = abs((int)$ipoteka);}
    if (isset($_POST['rassrochka']))     {$rassrochka = $_POST['rassrochka'];      $rassrochka = abs((int)$rassrochka);}
    if (isset($_POST['v_ipoteka']))      {$v_ipoteka = $_POST['v_ipoteka'];        $v_ipoteka = abs((int)$v_ipoteka);}
    if (isset($_POST['parking']))        {$parking = $_POST['parking'];            $parking = abs((int)$parking);}
    if (isset($_POST['fz_214']))         {$fz_214 = $_POST['fz_214'];              $fz_214 = abs((int)$fz_214);}
    if (isset($_POST['otdelka']))        {$otdelka = $_POST['otdelka'];            $otdelka = abs((int)$otdelka);}
    if (isset($_POST['w_metro']))        {$w_metro = $_POST['w_metro'];            $w_metro = abs((int)$w_metro);}
    if (isset($_POST['thouse']))         {$thouse = $_POST['thouse'];              $thouse = abs((int)$thouse);}
    if (isset($_POST['apart']))          {$apart = $_POST['apart'];                $apart = abs((int)$apart);}
    
    if ($name == "" or $name == " "){unset($name);}
    if ($alias == "" or $alias == " "){unset($alias);}
    
    if($submit){
        if($name and $alias){
            $new_Novostroika = mysql_query("INSERT INTO novostroj(name,alias,title,prise_ot,prise_do,p_min,p_max,transport,mkad,komnat,spec,status,big_adres,adres,phone,sait,okrug,metro,dis,zoom,dolg,shir,meta_k,meta_d,hit,date,arxiv,pokaz,vip,m_date,ipoteka,rassrochka,v_ipoteka,parking,fz_214,otdelka,w_metro,thouse,apart) VALUES ('$name','$alias','$title','$prise_ot','$prise_do','$p_min','$p_max','$transport','$mkad','$komnat','$spec','$status','$big_adres','$adres','$phone','$sait','$okrug','$metro','$dis','$zoom','$dolg','$shir','$meta_k','$meta_d','$hit','$date','$arxiv','$pokaz','$vip','$time','$ipoteka','$rassrochka','$v_ipoteka','$parking','$fz_214','$otdelka','$w_metro','$thouse','$apart')",$db);

            
            if($new_Novostroika){
            $res_new_id = mysql_query("SELECT id FROM novostroj ORDER BY id DESC LIMIT 1",$db);
            $myr_new_id = mysql_fetch_array($res_new_id);
            mkdir("../images/".$myr_new_id["id"]);
            $_SESSION['error'] = "<div class='error_plus'>Новостройка добавлена.</div>";
            header("Location: index.php");
            exit(); 
            }else{
                
            $_SESSION['error'] = "<div class='error_plus'>Ошибка.</div>";
            header("Location: index.php");
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
	<title>Добавить новостройку</title>
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
            	<td style="padding: 3px 6px;"><input type="text" id="name_post" autocomplete="off" onkeyup="new_otziv(1)" onblur="proverka_alias(1)" onblur="new_otziv(1)" required="required" name="name" size="75" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Алиас:</td>
            	<td style="padding: 3px 6px;"><input type="text" id="alias" autocomplete="off" required="required" name="alias" onblur="proverka_alias(1)" size="75" style="height: 25px; font-size: 20px;"/><span id="imgalias"></span></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Цены от и до:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" name="prise_ot" size="20" style="height: 25px; font-size: 20px;"/>
                <input type="text" autocomplete="off" name="prise_do" size="20" style="height: 25px; font-size: 20px; margin-left: 15px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Площадь от и до:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" name="p_min" size="20" style="height: 25px; font-size: 20px;"/>
                <input type="text" autocomplete="off" name="p_max" size="20" style="height: 25px; font-size: 20px; margin-left: 15px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Время до метро:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="transport" size="47" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Расстояние до МКАД:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" name="mkad" size="47" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Комнат:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="komnat" value="1, 2, 3, 4" size="47" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Спец. заголовок:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="spec" size="47" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Статус маркера:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="status">
                        <option value="building-area">Building-area (Строительство)</option>
                        <option value="apartment">Apartment (Дом построен)</option>
                        <option value="villa">Villa (Таунхаус)</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Полный адрес:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="big_adres" size="75" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Расположение:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="adres" size="47" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Телефон:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="phone" size="47" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Сайт:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="sait" size="47" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Округ/Направление:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="okrug">
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
            	<td style="padding: 3px 6px;"><textarea name="dis" cols="77" rows="10"></textarea></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Зум на карте:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="zoom" size="47" style="height: 25px; font-size: 20px;" value="14"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Широта:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="dolg" size="47" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Долгота:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="shir" size="47" style="height: 25px; font-size: 20px;"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Title:</td>
            	<td style="padding: 3px 6px;"><textarea name="title" cols="77" rows="3">ЖК «xxxxx» в Новая Купавна, цены на квартиры||ЖК «xxxxx» форум, отзывы жильцов и комментарии покупателей||ЖК «xxxxx» фотографии, планировки и ход строительства||ЖК «xxxxx» расположение на карте и где купить?</textarea></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Meta keys:</td>
            	<td style="padding: 3px 6px;"><textarea name="meta_k" cols="77" rows="3">жк xxxxx, жк xxxxx цены, жк xxxxx квартиры, жк xxxxx новная купавна||жк xxxxx форум, жк xxxxx отзывы||жк xxxxx фото, жк xxxxx фотографии, жк xxxxx планировки, жк xxxxx ход строительства||жк xxxxx на карте, жк xxxxx где купить</textarea></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Meta Discription:</td>
            	<td style="padding: 3px 6px;"><textarea name="meta_d" cols="77" rows="3"></textarea></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Просмотры:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="hit" size="47" style="height: 25px; font-size: 20px;" value="100"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Дата:</td>
            	<td style="padding: 3px 6px;"><input type="text" autocomplete="off" required="required" name="date" size="47" style="height: 25px; font-size: 20px;" value="<?php echo date("Y-m-d") ?>"/></td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Архив:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="arxiv">
                        <option value="1">Да</option>
                        <option value="2" selected="">Нет</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Показ:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="pokaz">
                        <option value="1" selected="">Да</option>
                        <option value="2">Нет</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Позиция:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="vip">
                        <option value="0" selected="">Нет</option>
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
                        <option value="1" selected="">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Рассрочка:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="rassrochka">
                        <option value="1">Да</option>
                        <option value="0" selected="">Нет</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Военная ипотека:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="v_ipoteka">
                        <option value="1">Да</option>
                        <option value="0" selected="">Нет</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Подземный паркинг:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="parking">
                        <option value="1">Да</option>
                        <option value="0" selected="">Нет</option>
                    </select>
                </td>
            </tr>
           	<td style="padding: 3px 6px;">Таунхаус:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="thouse">
                        <option value="1">Да</option>
                        <option value="0" selected="">Нет</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">ФЗ-214:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="fz_214">
                        <option value="1">Да</option>
                        <option value="0" selected="">Нет</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Отделка:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="otdelka">
                        <option value="1">Да</option>
                        <option value="0" selected="">Нет</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Рядом метро:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="w_metro">
                        <option value="1">Да</option>
                        <option value="0" selected="">Нет</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;">Апартаменты:</td>
            	<td style="padding: 3px 6px;">
                    <select style="height: 30px; font-size: 20px;" name="apart">
                        <option value="1">Да</option>
                        <option value="0" selected="">Нет</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td style="padding: 3px 6px;"></td>
            	<td style="padding: 3px 6px;"><input type="submit" name="submit" style="padding:16px 96px; font-size: 24px; margin-top: 30px;" value="Добавить"/></td>
            </tr>
            </table>
        </form>
    </body>
</html>