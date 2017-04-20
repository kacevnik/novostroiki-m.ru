<?php 
    include("inc/db.php");
    $resNovostroiki = mysql_query("SELECT * FROM novostroj",$db);
    $myrNovostroiki = mysql_fetch_array($resNovostroiki);

    include("inc/head.php");
?>
	<title>Новостройки</title>
</head>

<body>
<div><h3><a href="add_novostroika.php">Добавить +</a></h3>   <?php echo time(); ?></div>
<div><h3><a href="up_site_map.php">карта сайта</a></h3></div>
<div>
    фильтр:
    <input type="text" size="20" onblur="filter(1)" onkeyup="filter(1)" id="filter"/>
</div>
<?php 
    echo $_SESSION['error']; 
    unset($_SESSION['error']);
?>
    <table id="novostroiki" style="margin-top: 20px;">
<?php
    $nomer = 1; 
    do{
?>
        <tr>
            <td style="padding: 3px 6px;">
                <?php echo $nomer; $nomer = $nomer + 1;?>
            </td>
            <td style="padding: 3px 6px;">
                <a href="http://novostroiki-m.ru/str.php?al=<?php echo $myrNovostroiki["alias"]; ?>" target="_blank" title="Просмотр в новом окне">
                    <?php echo $myrNovostroiki["name"]; ?>
                </a>
            </td>
            <td style="padding: 3px 6px;">
                <a href="edit_novostroika.php?id=<?php echo $myrNovostroiki["id"];?>">
                    Редактировать
                </a>
            </td>
        </tr>
<?php
    }
    while($myrNovostroiki = mysql_fetch_array($resNovostroiki))
?>
    </table>
</body>
</html>