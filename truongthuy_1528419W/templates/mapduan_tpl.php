<?php 
	$d->reset();
    $sql_img = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id from #_product_list where hienthi=1 and com='duan'  order by stt asc";
    $d->query($sql_img);
    $loai_da = $d->result_array();
	
	$d->reset();
    $sql_img = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id from #_city_list where hienthi=1  order by ten asc";
    $d->query($sql_img);
    $tinh = $d->result_array();
?>



<script type="text/javascript">
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function sortchange() {
	var id = $('#loai_da').val();
	setCookie('psortfilter',id, 1);
	window.location.reload();
}

</script>

<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="title_right wow zoomInUp"><h2><?= $title_tcat ?></h2></div>
    </div>
</div>


<div class="row pd0 mg0 ">
	<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 pd0">	
		<div class="row pd0 mg0 ">
		<input type="hidden" id="address" value="Địa chỉ" />
		<input type="hidden" id="toado" value="Toa do" />
		<div class="five_sp col-lg-3 col-md-6 col-sm-6 col-xs-12">	
			<select name="tinh" id="tinh"  class="form-control">
				<option value=""><?=_chontinhthanh?></option>
				<?php
					foreach($tinh as $k=> $tinh_item){
				?>
					<option value="<?=$tinh_item['id']?>" title="<?=$tinh_item['ten']?>"><?=$tinh_item['ten']?></option>
				<?php   
					}
				?>
			</select>
		</div>	
		<div class="five_sp col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<select name="quan" id="quan"  class="form-control">
				<option value=""><?=_chonquanhuyen?></option>    
			</select>            
		</div>
		<div class="five_sp col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <select name="phuong" id="phuong"  class="form-control">
                <option value=""><?=_chonphuong?></option>
            </select>
		</div>
		<div class="five_sp col-lg-3 col-md-4 col-sm-6 col-xs-12">		
            <select name="duong" id="duong"  class="form-control">
                <option value=""><?=_chonduong?></option>
            </select>
		</div>
		<div class="five_sp col-lg-3 col-md-4 col-sm-6 col-xs-12">	
			<select name="loai_da" id="loai_da" onchange="sortchange();"  class="form-control">
				<option value=""><?=_loaiduan?></option>
				<?php
					foreach($loai_da as $k=> $tinh_item){
				?>
					<option value="<?=$tinh_item['id']?>" title="<?=$tinh_item['ten']?>" <?php if($_COOKIE['psortfilter']==$tinh_item['id']) echo 'selected'; ?>><?=$tinh_item['ten']?></option>
				<?php   
					}
				?>
			</select>
		</div>
		</div>
		
		<div class="row pd0 mg0 ">		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
				<div id="map"></div>
			</div>
		</div>

	</div>
	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pd0">	
	<div class="contet_duan">
	
	</div>
	<div class="clear"></div>
    <div class="wrap_paging">
        <div class="paging paging_ajax clearfix"><?= pagesListLimit_layout($url_link, $totalRows, $pageSize, $offset) ?></div>
		
    </div><!--end wrap_paging-->
	</div>

</div>
	<link rel="stylesheet" type="text/css"  href="modules/map/css/map.css"/>
	
	<script src="https://maps.google.com/maps?file=googleapi&amp;key=AIzaSyAd1qCCy9Qb1t3jSZoaOeMsAA--IXWWfoQ&amp;v=2.x" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">

     var greenIcon = new GIcon(G_DEFAULT_ICON);
     greenIcon.image = "modules/map/images/red-house-icon.png";
     var markerOptions = {icon: greenIcon};

     var greenIcon_me = new GIcon(G_DEFAULT_ICON);
     greenIcon_me.image = "images/location_me_gaconit.png";
     var markerOptions_me = {icon: greenIcon_me};

     $(document).ready(function () {
         var map = new GMap2($("#map").get(0));

<?php if (isset($_REQUEST["tinh"]) || isset($_REQUEST["quan"])) { ?>

             var burnsvilleMN = new GLatLng(<?= $location_center[0]["toado"] ?>);

<?php } else { ?>

             var burnsvilleMN = new GLatLng(10.889149, 106.645839);

<?php } ?>


         map.setCenter(burnsvilleMN, 12);
         var markers = [];
         var bdscontent = [];
         var bdsdetail = [];
         var i = 0;

					
         var marker_me = [];
         var locationme_content = [];
         var locationme_detail = [];
         var gaconit = 0;
		var toado=0;
		var toado1=0;



         function success_why_always_me(marker, index, content) {

             var coords;

             coords = new google.maps.LatLng(marker.coords.latitude, marker.coords.longitude);
             //$('.right_title').html(Add_VipType);
             // $(".right_title").html(coords);

             //$("input[name=location]").value(coords);


             //$('input[name=location]').val(coords);
             var pos_location_me = {
                 lat: marker.coords.latitude,
                 lng: marker.coords.longitude
             };


             // var location_me='10.852689000000002, 106.63503659999992';


             var point = new GLatLng(pos_location_me);


             markerText = "<p>Vị trí của bạn</p>";
             marker = new GMarker(point);
             marker = new GMarker(point, markerOptions_me);
             //map.setContent('Location found.');



             map.addOverlay(marker);
             marker.openInfoWindow(markerText);
             google.maps.Event.addListener(marker, "click", function () {
                 marker.openInfoWindow(markerText);
             });


             marker_me[gaconit] = marker;
             locationme_content[gaconit] = "<div class='map_description'><div class='map_title'>Vị trí của bạn</div><div>Vị trí của bạn</div></div>";
             locationme_detail[gaconit] = "<div class='map_description'><div class='map_title'>Vị trí của bạn</div><div>Vị trí của bạn</div></div>";
             gaconit++;
          $(marker_me).each(function (gaconit, marker) {

                 // alert(locationme_content[gaconit])
                 $("<div />")
                         .html(locationme_content[gaconit])
                         .click(function () {
                             //displayPoint(marker, gaconit, bdsdetail[i]);
                             //  success_why_always_me(marker,gaconit,locationme_detail[gaconit]);
                         })
                         .appendTo("#list-an");


                 GEvent.addListener(marker, "click", function () {
                     //displayPoint(marker, gaconit, bdsdetail[i]);
                     //success_why_always_me(marker,gaconit,locationme_detail[gaconit]);

                 });
             });


         }


<?php for ($i = 0; $i < count($product); $i++) { ?>
             var point = new GLatLng(<?= $product[$i]["toado"]?>);
             marker = new GMarker(point);
             marker = new GMarker(point, markerOptions);
             map.addOverlay(marker);
             //alert(point);
             markers[i] = marker;
             bdscontent[i] = "<div class='list_duan_nb clearfix'><img src=thumb/120x120/1/<?= _upload_product_l . $product[$i]["photo"] ?> alt='<?= $product[$i]["ten_$lang"] ?>' ><div class='mota_duan_nb'><div class='post_date'><p><?=date("d",$product[$i]["ngaytao"])?></p><p><span><?= date("M",$product[$i]["ngaytao"]) ?></span></p></div><h3><?= $product[$i]["ten_$lang"] ?></h3><p><?= $product[$i]["dientich"] ?> <span>m<sup>2</sup></span><?= $product[$i]["phong"] ?> <span><?=_phong?></span><?= $product[$i]["lau"] ?> <span><?=_lau?></span></p></div><p><?=catchuoi($product[$i]["mota_$lang"],120)?></p></div>";
             bdsdetail[i] = "<div class='map_description'><div class='map_title'><a href='<?= $product[$i]["tenkhongdau_$lang"] ?>'><?= $product[$i]["ten_$lang"] ?></a></div><div><a href='<?= $product[$i]["tenkhongdau_$lang"] ?>'><?= $product[$i]["mota_$lang"] ?></a></div></div>";
             i++;

<?php } ?>
	
       // success(marker, -1, bdsdetail[-1]);

         $(markers).each(function (i, marker) {
             $("<div />")
                     .html(bdscontent[i])
                     .click(function () {
                         displayPoint(marker, i, bdsdetail[i]);
                         //success_why_always_me(marker,i+1,bdsdetail[i+1]);
                     })
                     .appendTo(".contet_duan");


             GEvent.addListener(marker, "click", function () {
                 displayPoint(marker, i, bdsdetail[i]);
                 // success_why_always_me(marker,gaconit,locationme_detail[gaconit]);
                 // success_why_always_me(marker,i+1,bdsdetail[i+1]);

             });
         });
		 var geocoder = new google.maps.Geocoder();
		 $('#tinh').change(function(e) {
			var value = $(this).val();
			if(value != '')
			$('#quan').load("ajax/ajax_tour_cat.php?id="+value);

			address=$("#tinh option:selected").text();
			$('#address').val(address);
			var address_n = jQuery('#address').val();
			
			
			var address = jQuery('#address').val();
			<!----code lay toa do dang text--->
			geocoder.geocode( { 'address': address}, function(results, status) {
				console.log(address);
				if (status == google.maps.GeocoderStatus.OK) {			
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();					
				toado = latitude;
				toado1 = longitude;
						
				} 
				
			}); 		
			setTimeout(function(){
				var greenIcon_q = new GIcon(G_DEFAULT_ICON);
				greenIcon_q.image = "modules/map/images/red-house-icon.png";
				var markerOptions_q = {icon: greenIcon_q};	
				var point_q = new GLatLng(toado,toado1);
				marker_q = new GMarker(point_q);
				marker_q = new GMarker(point_q, markerOptions_q);
				 
			
				displayPoint(marker_q);
			 },500);
			<!----end code lay toa do dang text--->
			return false;
		});
		
		$('#quan').change(function(e) {
                var value = $(this).val();
                if(value != '')
                $('#phuong').load("ajax/ajax_tour_item.php?id="+value);
				$('#duong').load("ajax/ajax_tour_duong.php?id="+value);
		
				var tinh=$("#tinh option:selected").text();
				var quan = $("#quan option:selected").text();
				address = quan + ', ' + tinh;	
				$('#address').val(address);
					<!----code lay toa do dang text--->
			geocoder.geocode( { 'address': address}, function(results, status) {
				console.log(address);
				if (status == google.maps.GeocoderStatus.OK) {			
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();					
				toado = latitude;
				toado1 = longitude;
						
				} 
				
			}); 		
			setTimeout(function(){
				var greenIcon_q = new GIcon(G_DEFAULT_ICON);
				greenIcon_q.image = "modules/map/images/red-house-icon.png";
				var markerOptions_q = {icon: greenIcon_q};	
				var point_q = new GLatLng(toado,toado1);
				marker_q = new GMarker(point_q);
				marker_q = new GMarker(point_q, markerOptions_q);
				 
			
				displayPoint(marker_q);
			 },500);
			<!----end code lay toa do dang text--->
                return false;
        });

		$('#phuong').change(function(e) {
                var value = $(this).val();
                if(value != '')				
                var tinh=$("#tinh option:selected").text();
				var quan = $("#quan option:selected").text();
				var phuong = $("#phuong option:selected").text();
				address = phuong + ', ' + quan + ', ' + tinh;	
				$('#address').val(address);
					<!----code lay toa do dang text--->
			geocoder.geocode( { 'address': address}, function(results, status) {
				console.log(address);
				if (status == google.maps.GeocoderStatus.OK) {			
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();					
				toado = latitude;
				toado1 = longitude;
						
				} 
				
			}); 		
			setTimeout(function(){
				var greenIcon_q = new GIcon(G_DEFAULT_ICON);
				greenIcon_q.image = "modules/map/images/red-house-icon.png";
				var markerOptions_q = {icon: greenIcon_q};	
				var point_q = new GLatLng(toado,toado1);
				marker_q = new GMarker(point_q);
				marker_q = new GMarker(point_q, markerOptions_q);
				 
			
				displayPoint(marker_q);
			 },500);
			<!----end code lay toa do dang text--->
                return false;
        });
		
		$('#duong').change(function(e) {
                var value = $(this).val();
                if(value != '')				
                var tinh=$("#tinh option:selected").text();
				var quan = $("#quan option:selected").text();
				var phuong = $("#phuong option:selected").text();
				var duong = $("#duong option:selected").text();
				address = duong + ', ' +phuong + ', ' + quan + ', ' + tinh;	
				$('#address').val(address);
					<!----code lay toa do dang text--->
			geocoder.geocode( { 'address': address}, function(results, status) {
				console.log(address);
				if (status == google.maps.GeocoderStatus.OK) {			
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();					
				toado = latitude;
				toado1 = longitude;
						
				} 
				
			}); 		
			setTimeout(function(){
				var greenIcon_q = new GIcon(G_DEFAULT_ICON);
				greenIcon_q.image = "modules/map/images/red-house-icon.png";
				var markerOptions_q = {icon: greenIcon_q};	
				var point_q = new GLatLng(toado,toado1);
				marker_q = new GMarker(point_q);
				marker_q = new GMarker(point_q, markerOptions_q);
				 
			
				displayPoint(marker_q);
			 },500);
			<!----end code lay toa do dang text--->
                return false;
        }); 
        
		
		function displayPoint(marker, index, content) {
             var moveEnd = GEvent.addListener(map, "moveend", function () {
                 var markerOffset = map.fromLatLngToDivPixel(marker.getLatLng());
                 marker.openInfoWindowHtml(content);
                 GEvent.removeListener(moveEnd);
             });
			 //alert(marker);
             map.panTo(marker.getLatLng());
         }


         if (navigator.geolocation) {
             navigator.geolocation.getCurrentPosition(success_why_always_me);
         } else {
             error('Geo Location is not supported');
         }

     });
</script>
