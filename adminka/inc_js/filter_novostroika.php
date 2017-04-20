<?php    
    include("../inc/db.php");
    
    if (isset($_POST['text']))    {$text = $_POST['text'];         $text = trim(stripslashes(htmlspecialchars($text)));}
    
    $resNovostroiki = mysql_query("SELECT * FROM novostroj WHERE name LIKE '%$text%'",$db);
    $myrNovostroiki = mysql_fetch_array($resNovostroiki);

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