			<div class="map" style="height:1000px;">
				<script type="text/javascript">
<?php if(selMainMap()){$selMainMap = selMainMap(); $count = 0;} ?>                
                var infoBoxes = [];
<?php foreach($selMainMap as $item){ ?>
                var property<?php $count++; echo $count; ?> = '<div class="infobox"><div class="close"><img src="img/close.png" alt=""></div><div class="image"><a href="str.php?al=<?php echo $item["alias"]; ?>" ><img src="images/<?php echo $item["img"]; ?>" alt="<?php echo $item["name"]; ?>" width="130px"></a></div><div class="info"><div class="title"><a href="str.php?al=<?php echo $item["alias"]; ?>"><?php echo $item["name"]; ?></a></div><div class="property_info"><div class="area"><img src="img/kvm_or.png"/>от <?php echo $item["p_min"]; ?> м<sup>2</sup></div><div class="bedrooms"><img src="img/room_or.png"><?php echo $item["komnat"]; ?></div></div><div class="price">от <?php echo $item["prise_ot"]; ?> руб</div><div class="link"><a href="str.php?al=<?php echo $item["alias"]; ?>">Подробнее...</a><img src="img/more.png"/></div></div></div>';
                infoBoxes.push(property<?php echo $count; ?>);
<?php } ?>                  
                jQuery(document).ready(function ($) {
                    var map = $('#map').aviators_map({
                        locations: new Array(
<?php $count = 0; foreach($selMainMap as $item){ ?>
<?php if($count != 0){echo ",";}?>[<?php echo $item["dolg"]; ?>, <?php echo $item["shir"]; $count++;?>]                        
<?php } ?> 
),
                        types: new Array(
<?php $count = 0; foreach($selMainMap as $item){ ?>
<?php if($count != 0){echo ",";}?>'<?php echo $item["status"]; $count++; ?>'<?php } ?>                        
),
                        contents: infoBoxes,
                        transparentMarkerImage: 'img/marker-transparent.png',
                        transparentClusterImage: 'img/cluster-transparent.png',
                        zoom: 10,
                        center: {
<?php $rand = rand(1,$count) ?>                          
                            latitude: 55.754024+0.01,
                            longitude: 37.620567},
                        filterForm: '.map-filtering',
                        enableGeolocation: '',
                        pixelOffsetX: -75,
                        pixelOffsetY: -200
                    });
                });
            </script>

				<div id="map" style="height:1000px;">
					
				</div>
			</div>