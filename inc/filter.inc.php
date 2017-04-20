		<div class="center_content">	
            <div class="filter">
				<form method="post" action="sort.php">
					<div class="filter_left">
                        <input type="text" value="" name="serch_object" id="serch_object" class="location_text metr" placeholder="Введите название новостройки или метро" autocomplete="off"/>
                        <select name="okrug" class="location_filter">
                            <option value="">Округ/Направление</option>
<?php if(selOkrug()){$selOkrug = selOkrug();} foreach($selOkrug as $item){ ?>
                            <option value="<?php echo $item["id"]; ?>"><?php echo $item["name"]; ?></option>
<?php } ?>
                        </select>
                        <input type="text" value="" name="prise_ot" class="location_text price" placeholder="Цена за кв. м. от" autocomplete="off">
                        <input type="text" value="" name="prise_do" class="location_text price" placeholder="Цена за кв. м. до" autocomplete="off">	
					</div>
                    <div class="search_list_object">
                        <ul class="list_serch_object">
<?php foreach($selMainMap as $item_sesrch_object){?>
                            <li class="item_list_serch_object"><a class="search_list_object_novo" href="str.php?al=<?php echo $item_sesrch_object['alias']; ?>"><?php echo $item_sesrch_object['name']; ?></a></li>
<?php } ?>
<?php $selMetro = selMetro(); foreach($selMetro as $item_selMetro){?>
                            <li class="item_list_serch_object"><a class="search_list_object_metro" href="sort.php?metro=<?php echo $item_selMetro['id']; ?>"><?php echo $item_selMetro['name']; ?></a></li>
<?php } ?>
                        </ul>
                    </div>
					<div class="filter_right">
						<input type="submit" name="submit_filter" class="submit_filter" value="Фильтровать!">
					</div>
				</form>
			</div>
        </div>