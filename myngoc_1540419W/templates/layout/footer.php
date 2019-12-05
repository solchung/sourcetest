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

	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
		<div class="title_footer name_footer"><a ><h4><?=$row_setting["ten_$lang"]?></h4></a></div>
		<div class="">
			<?= $footer_nd['noidung'] ?>
	
		</div>
		<ul class="mxh_footer clearfix">	
			
				
			<?php for ($i = 0; $i < count($mxh2); $i++) { ?>
				<li><a href="<?= $mxh2[$i]["link"] ?>" target="_blank"><img src="<?= _upload_hinhanh_l . $mxh2[$i]["photo"] ?>" alt="<?= $mxh2[$i]["ten_$lang"] ?>"></a></li>
			<?php } ?> 
		
		</ul>
		
	</div>
	

	

	
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
		<div class="title_footer"><a ><h4>Thời gian mở cửa</h4></a></div>
		<div class="">
			<?= $thoigian_nd['noidung'] ?>
	
		</div>
		
    </div>
	
	<div class="col-lg-3 col-md-3 col-sm-6  col-xs-12 ">
		<div class="fb-page" data-href="<?=$row_setting['fanpage']?>" data-width="335" data-height="210" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?=$row_setting['fanpage']?>"><a href="<?=$row_setting['fanpage']?>">Facebook</a></blockquote></div></div>	
    </div>
	

	
	
 
</div>


</div>
</div>



<div class="background_footer2">
<div class="container pd0" style="">	
    <div class="row pd0 mg0">
      
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12   copyright_s">
            <p>2019 Copyright © <span><?=$row_setting["ten_$lang"]?></span>. Web Design by Nina.vn</p>
		
        </div>
	
	
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12   thongke_s">
           
			<p><?=_online?> :<span><?= $count_user_online ?></span><?=_homqua?>:<span><?= $yesterday_visitors ?></span> <?=_tongtruycap?>:<span><?= $all_visitors ?></span></p>
        </div>
	
	
    </div>
</div>
</div>

<?php include _template . "layout/chi_nhanh.php"; ?> 