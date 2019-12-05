<?php 

$d->reset();
$sql_news = "select ten_$lang,tenkhongdau_$lang,id,photo,thumb,mota_$lang,ngaytao from #_news where hienthi=1 and com='chinhsach' and tinnoibat>0  order by stt,id asc";
$d->query($sql_news);
$chinhsach_nb = $d->result_array();


?>

<?php
$d->reset();
$sql = "select photo,link, ten_$lang, mota_$lang from #_image_url where hienthi=1 and com='".$loai."mangxahoift' order by stt,id desc";
$d->query($sql);
$mxh2 = $d->result_array();
?>

<?php
$d->reset();
$sql = "select noidung_$lang as noidung from #_info where  com='".$loai."footer' order by stt,id desc";
$d->query($sql);
$footer_nd = $d->fetch_array();

$d->reset();
$sql = "select noidung_$lang as noidung from #_info where  com='".$loai."thoigian' order by stt,id desc";
$d->query($sql);
$thoigian_nd = $d->fetch_array();


$d->reset();
$sql = "select photo,link, ten_$lang, mota_$lang from #_image_url where hienthi=1 and com='bct' order by stt desc";
$d->query($sql);
$bct = $d->fetch_array();

?>

<div class="container pd0" style="">	
<div class="background_footer">

<div class="row pd0 mg0">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">		
		<div class="">
			<?= $footer_nd['noidung'] ?>	
		</div>
			<div class="border_footer">
			<div class="row pd0 mg0">

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text_center">
			<div class="item_hotro">

						<p>Điạ chỉ công ty:</p>
						<p><?=$row_setting["diachi_$lang"]?></p>
						

				
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text_center">
			<div class="item_hotro">


						<p>Hotline đặt hàng:</p>
						<p><span><?=$row_setting["hotline"]?></span></p>

			</div>	
			</div>	
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text_center">
			<div class="item_hotro">

						<p>Email liên hệ:</p>
						<p><?=$row_setting["email"]?></p>

			</div>	
			</div>	
			
			</div>
			</div>		
	</div>
 
</div>


</div>
</div>



<div class="background_footer2">
<div class="container pd0" style="">	
    <div class="row pd0 mg0">
      
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12   copyright_s text_center">
            <p>2019 Copyright © <span><?=$row_setting["ten_$lang"]?></span>. Web Design by Nina.vn</p>
		
        </div>
	
	<?/**
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12   thongke_s">
           
			<p><?=_online?> :<span><?= $count_user_online ?></span><?=_homqua?>:<span><?= $yesterday_visitors ?></span> <?=_tongtruycap?>:<span><?= $all_visitors ?></span></p>
        </div>
	**/?>
	
    </div>
</div>
</div>

<?php include _template . "layout/bando.php"; ?> 