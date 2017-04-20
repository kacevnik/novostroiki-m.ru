<?php if(!$fin){exit("ERROR");} ?>
							<div class="nav_page_content">
                                <h1 style="margin-top: 0"><?php echo $selNovostroiData[0]["name"]; ?> - Где купить?</h1>				
                                <table class="page_table_buy">
<?php if(selPhoneBuy($selNovostroiData[0]["id"])){$selPhoneBuy = selPhoneBuy($selNovostroiData[0]["id"]); foreach($selPhoneBuy as $itemPhone){ ?>
                                    <tr>
                                        <td><?php echo $itemPhone["developer"]; ?><br><span><?php echo $itemPhone["comment"]; ?></span></td>
                                        <td><?php echo $itemPhone["phone"]; ?></td>
                                    </tr>
<?php }} ?>
                                    <tr>
                                        <td><?php echo $selNovostroiData[0]["name"]; ?></td>
                                        <td><?php echo $selNovostroiData[0]["phone"]; ?></td>
                                    </tr>
                                </table>
                                <a href="<?php if($_SESSION["admin"]){echo 'lk.php';}else{echo 'new_user.php';} ?>" class="add_phone">Добавить телефон</a>
                                <div id="property-map" style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden; -webkit-transform: translateZ(0); width: 655px; margin-bottom: 10px; height: 500px; border: 1px solid #003f4f;">
                                </div>
                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        function LoadMapProperty() {
                                            var locations = new Array(
                                              [<?php echo $selNovostroiData[0]["dolg"]; ?>, <?php echo $selNovostroiData[0]["shir"]; ?>]
                                            );
                                            var types = new Array(
                                              'family-house'
                                            );
                                            var markers = new Array();
                                            var plainMarkers = new Array();
                        
                                            var mapOptions = {
                                                center: new google.maps.LatLng(<?php echo $selNovostroiData[0]["dolg"]; ?>, <?php echo $selNovostroiData[0]["shir"]; ?>),
                                                zoom: <?php echo $selNovostroiData[0]["zoom"]; ?>,
                                                mapTypeId: google.maps.MapTypeId.ROADMAP,
                                                scrollwheel: false
                                            };
                        
                                            var map = new google.maps.Map(document.getElementById('property-map'), mapOptions);
                        
                                            $.each(locations, function (index, location) {
                                                var marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(location[0], location[1]),
                                                    map: map,
                                                    icon: '/img/marker-transparent.png'
                                                });
                        
                                                var myOptions = {
                                                    draggable: true,
                                                    content: '<div class="marker ' + types[index] + '"><div class="marker-inner"></div></div>',
                                                    disableAutoPan: true,
                                                    pixelOffset: new google.maps.Size(-21, -58),
                                                    position: new google.maps.LatLng(location[0], location[1]),
                                                    closeBoxURL: "",
                                                    isHidden: false,
                                                    // pane: "mapPane",
                                                    enableEventPropagation: true
                                                };
                                                marker.marker = new InfoBox(myOptions);
                                                marker.marker.isHidden = false;
                                                marker.marker.open(map, marker);
                                                markers.push(marker);
                                            });
                        
                                            google.maps.event.addListener(map, 'zoom_changed', function () {
                                                $.each(markers, function (index, marker) {
                                                    marker.infobox.close();
                                                });
                                            });
                                        }
                        
                                        google.maps.event.addDomListener(window, 'load', LoadMapProperty);
                        
                                        var dragFlag = false;
                                        var start = 0, end = 0;
                        
                                        function thisTouchStart(e) {
                                            dragFlag = true;
                                            start = e.touches[0].pageY;
                                        }
                        
                                        function thisTouchEnd() {
                                            dragFlag = false;
                                        }
                        
                                        function thisTouchMove(e) {
                                            if (!dragFlag) return;
                                            end = e.touches[0].pageY;
                                            window.scrollBy(0, ( start - end ));
                                        }
                        
                                        document.getElementById("property-map").addEventListener("touchstart", thisTouchStart, true);
                                        document.getElementById("property-map").addEventListener("touchend", thisTouchEnd, true);
                                        document.getElementById("property-map").addEventListener("touchmove", thisTouchMove, true);
                                    });

                            </script>          					
							</div>