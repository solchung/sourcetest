<?php 
	$d->reset();
	$sqlm = "select toado,ten_$lang as ten,mota_$lang as mota from #_bando where hienthi=1 and com='bando' and tinnoibat=1 order by stt,id desc";
	$d->query($sqlm);
	$footer_map = $d->fetch_array();
?>

<?php if($row_setting["api"]=="") {?>
	
	<div class="content_map_footer" ><?=$row_setting["link_map"]?></div>
<?php }else{?>
<script type="text/javascript">
            var map;
            var infowindow;
            var marker = new Array();
            var old_id = 0;
            var infoWindowArray = new Array();
            var infowindow_array = new Array();
            function initialize_footer() {
                var defaultLatLng = new google.maps.LatLng(<?= $footer_map['toado'] ?>);
                var myOptions = {
                    zoom: 16,
                    center: defaultLatLng,
                    scrollwheel: true,
                    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                    navigationControl: true,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                    mapTypeId: google.maps.MapTypeId.ROADMAP

                };
                map = new google.maps.Map(document.getElementById("map_canvas2"), myOptions);
                map.setCenter(defaultLatLng);
                var arrLatLng = new google.maps.LatLng(<?= $footer_map['toado'] ?>);
    
                loadMarker(arrLatLng,  7895);

                moveToMaker(7895);
            }
            function loadMarker(myLocation, myInfoWindow, id) {
                marker[id] = new google.maps.Marker({position: myLocation, map: map, visible: true});
                var popup = myInfoWindow;
                infowindow_array[id] = new google.maps.InfoWindow({content: popup});
                google.maps.event.addListener(marker[id], 'mouseover', function () {
                    if (id == old_id)
                        return;
                    if (old_id > 0)
                        infowindow_array[old_id].close();
                    infowindow_array[id].open(map, marker[id]);
                    old_id = id;
                });
                google.maps.event.addListener(infowindow_array[id], 'closeclick', function () {
                    old_id = 0;
                });
            }
            function moveToMaker(id) {
                var location = marker[id].position;
                map.setCenter(location);
                if (old_id > 0)
                    infowindow_array[old_id].close();
                infowindow_array[id].open(map, marker[id]);
                old_id = id;
            }

        </script>
		<div class="border_map">
        <div id="map_canvas2" style="width:100%;height: 350px;"></div></div>
<?php }?>		