<?php
session_start();
@define ( '_template' , '../templates/');
@define ( '_lib' , '../libraries/');
@define ( '_source' , '../sources/');
if(!isset($_SESSION['lang']))
{
	$_SESSION['lang']='vi';
}
$lang=$_SESSION['lang'];
include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";

include_once _lib."class.database.php";
include_once _source."lang_$lang.php";
include_once _lib."functions_giohang.php";
include_once _lib."file_requick.php";
include_once _lib."counter.php";
include_once "class_paging_ajax.php";
$d = new database($config['database']);
@$limit = (int) $row_setting['phantrang_sp'];
$loai=$_POST["id_cap2"];
	
	
//$dieukien = $_POST["id_cap2"];

$paging = new paging_ajax();

$paging->class_pagination = "pagination";
$paging->class_active = "active";
$paging->class_inactive = "inactive";
$paging->class_go_button = "go_button";
$paging->class_text_total = "total";
$paging->class_txt_goto = "txt_go_button";
if($limit >0 ){	
	$paging->per_page = $limit;
}else{
	$paging->per_page = 8;	
}


$paging->page = $_POST["page"];

if($loai==0){ 
$paging->text_sql = "select photo,link, ten_$lang , mota_$lang  from table_image_url where hienthi=1 and com= 'hinhanh' order by stt,id desc  ";
}else if($loai==1)
$paging->text_sql = "select * from table_news where hienthi=1 and com='news' and tinnoibat>0 order by stt,id desc  ";
else if($loai==2){
$paging->text_sql = "select * from table_news where hienthi=1 and com='khachhang' and tinnoibat>0 order by stt,id desc  ";
}

$result_pag_data = $paging->GetResult();

$message = '';
$paging->data = "" . $message . "";



?>

<?php if($loai==0){ ?>

<div id="gallery_ablum" style="display:none;">
	<?php
	$j=0;
	while ($row = mysql_fetch_array($result_pag_data)) { $j++;

	?>		
		<a href="">
		<img alt="<?=$row["ten_$lang"]?>"
			 src="<?= _upload_hinhanh_l . $row['photo'] ?>"
			 data-image="<?= _upload_hinhanh_l . $row['photo'] ?>"
			 data-description="<?=$row["mota_$lang"]?>"
			 style="display:none">
		</a>
	<?php } ?>
		
</div>
<div class="clear"></div>
	<?php if($j==0) echo "Chưa có dữ liệu ...."; else{ echo $paging->Load();}?>
	<div class="clear"></div>			
<script type="text/javascript">

	$().ready(function () {

		$("#gallery_ablum").unitegallery({
			tiles_type:"justified",
			
			tiles_nested_optimal_tile_width:550,
			tile_enable_shadow:false,
		
			tile_overlay_opacity:0.3,
			tile_show_link_icon:false,
			tile_image_effect_type:"sepia",
			tile_image_effect_reverse:true,
			tile_enable_textpanel:true,
			lightbox_textpanel_title_color:"e5e5e5",
			
			tiles_space_between_cols:5
		});

	});
	
</script>

<?php }else  if($loai==1 || $loai==2){?>
<div class="container">
<div class="row pd0 mg0">	
	<?php
	$j=0;
	while ($row = mysql_fetch_array($result_pag_data)) { $j++;

	?>	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
		   <a href="<?= $row["tenkhongdau_$lang"] ?>" title="<?= $row["ten_$lang"] ?>">
				<div class="list_tin_nb">
					<div class="img_tin_nb">
					<img src="thumb/175x130/1/<?= _upload_news_l . $row["photo"] ?>" alt="<?= $row["ten_$lang"] ?>" > 
					</div>
					<div class="mota_tin_nb">
				   
					<h3><?= $row["ten_$lang"] ?></h3>
					
					<p class="post_date"><?= date('d-M-Y', $row["ngaytao"]) ?></p>
					<p><?= catchuoi($row["mota_$lang"], 50) ?></p>
				
					</div>
				</div>
			</a>
	</div>
	<?php } ?>
</div>		
</div>
<div class="clear"></div>
	<?php if($j==0) echo "Chưa có dữ liệu ...."; else{ echo $paging->Load();}?>
<div class="clear"></div>	



<?php }?>


		

	