<?php
	
	$d->reset();
	$sql = "select photo,link, ten_$lang, mota_$lang from #_image_url where hienthi=1 and com='slider' order by stt,id desc";
	$d->query($sql);
	$slider=$d->result_array();
	

	
?>

<link href="camera/css/camera.css" type="text/css" rel="stylesheet" />

<script src="camera/scripts/jquery.mobile.customized.min.js"></script>
<script src="camera/scripts/camera.min.js"></script>
<script src="camera/scripts/jquery.easing.1.3.js"></script>


 <script type="text/javascript">
            jQuery(document).ready(function($) {
                jQuery('#camera_wrap_1').camera({
				
				width: '1200px',
				height:'auto',
				pagination: false,
				thumbnails: false
                });
            });
 </script>               
        
  

<div id="slider-camera-wrapper">

<div class="camera_wrap camera_magenta_skin" id="camera_wrap_1">

	<?php for ($i=0;$i<count($slider);$i++) {?>	 		
		<div  data-src="thumb/1200x444/1/<?=_upload_hinhanh_l.$slider[$i]["photo"]?>" data-link="<?=$slider[$i]["link"]?>" data-target="_blank">
		</div>
     <?php }?>   
				
	</div><!-- #camera_wrap_1 -->


</div><!--end slider-camera-wrapper-->