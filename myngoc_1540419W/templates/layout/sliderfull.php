
<?php
	$com='sliderintro';
	// if( $_GET['com']=='menu'|| $_GET['com']=='tiec-rieng' || $_GET['com']=='gioi-thieu'|| $_GET['com']=='su-kien'|| $_GET['com']=='khuyen-mai'|| $_GET['com']=='tuyen-dung'|| $_GET['com']=='hinh-anh' ){
		// $com=$_GET['com'];
	// }

	$d->reset();
	$sql = "select photo,link, ten_$lang as ten, mota_$lang as mota from #_image_url where hienthi=1 and com='$com' order by stt,id desc";
	$d->query($sql);
	$result_slider = $d->result_array();
	
	$d->reset();
	$sql = "select noidung_$lang as noidung,ten_$lang as ten from #_info where com='intro' order by stt,id desc";
	$d->query($sql);
	$intro = $d->fetch_array();
	
	$d->reset();
	$sql_banner_giua = "select banner_$lang from #_banner where com='logointro' ";
	$d->query($sql_banner_giua);
	$row_logointro = $d->fetch_array();


	$d->reset();
	$sql_banner_giua = "select banner_$lang from #_banner where com='logoinan' ";
	$d->query($sql_banner_giua);
	$row_logoinan = $d->fetch_array();

	$d->reset();
	$sql_banner_giua = "select banner_$lang from #_banner where com='logocamera' ";
	$d->query($sql_banner_giua);
	$row_logocamera = $d->fetch_array();


?>
<style>
	.carousel-item {
	  height: 100vh;
	  min-height: 300px;
	  background: no-repeat center center scroll;
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;
	}

</style>
<div id="carouselExampleIndicators" class="carousel slide carousel-fade"   data-ride="carousel" data-pause="false">
		
	<div class="carousel-inner" role="listbox">
	  <!-- Slide One - Set the background image for this slide in the line below -->
		<?php for ($i = 0; $i < count($result_slider); $i++) { ?> 
		  <div class="carousel-item <?php if($i==0) echo 'active'; ?>" style="background-image: url('<?=_upload_hinhanh_l.$result_slider[$i]["photo"]?>')">
		
				
		  </div>
		 <?php }?>	
	</div>

</div>

<div class="content_intro">
	<div class="container">
	<div class="title_intro"><h2><?=$intro["ten"]?></h2></div>
	<div class="logo_intro">
		<div class="bk_camera">
			<a href="camera" alt="Camera">
			<div class="clipboard_camera" style="-webkit-clip-path: polygon(100% 0%, 75% 50%, 100% 100%, 25% 100%, 0% 50%, 25% 0%);clip-path: polygon(100% 0%, 75% 50%, 100% 100%, 25% 100%, 0% 50%, 25% 0%);background-image:url(<?= _upload_hinhanh_l . $row_logocamera["banner_$lang"] ?>)">
			<div class="title_intro_n">Camera</div>
			</div>
			</a>
		</div>
		<div class="bk_inan">
			<a href="in-an" alt="Camera">
			<div class="clipboard_inan" style="-webkit-clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);
clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);background-image:url(<?= _upload_hinhanh_l . $row_logoinan["banner_$lang"] ?>)">
			<div class="title_intro_n">In ấn</div>
			</div>
			</a>

		</div>
		<img class="" src="<?= _upload_hinhanh_l . $row_logointro["banner_$lang"] ?>" alt="<?= $row_logointro["banner_$lang"] ?>" />
	</div>
	<div class="footer_intro"><?=$intro["noidung"]?></div>
	</div>
</div>
	
 
	  