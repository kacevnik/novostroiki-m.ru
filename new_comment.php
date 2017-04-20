<?php 
    include("inc/db.php");
    if (isset($_GET['id']))          {$id = $_GET['id'];                  $id = abs((int)$id);}
    if (isset($_GET['otvet']))       {$otvet = $_GET['otvet'];            $otvet = abs((int)$otvet);}
    if (isset($_GET['type']))        {$type = $_GET['type'];              $type = abs((int)$type);}
?>

<head>

</head>
<body>                         
                                <div id="formcomment">
                                    <form method="post" action="" style="margin-bottom: -15px;">
                                        <div class="com_form_div">
                                            <label class="control-label">
                                                Ваше Имя:
                                            </label><br />
                                            <input type="text" name="usernamecomm" id="usernamecomm" /><br />
                                            <label class="control-label">
                                                Ваш комментарий:
                                            </label>
                                            <div class="controls">
                                                <textarea id="textotziv" maxlength="2000" name="commenttext"></textarea>
                                            </div>
                                        </div>                                        
                                            <a onclick="newcomment(<?php echo $id; ?>, <?php echo $otvet; ?>, <?php echo $type; ?>)" class="reg_sub">Отправить сообщение</a>
                                    </form>
                                </div>
</body>