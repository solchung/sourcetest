<?php

error_reporting(0);
session_start();
$session = session_id();

@define('_template', '../templates/');


@define('_source', '../sources/');
@define('_lib', '../libraries/');
@define(_upload_folder, './media/upload/');


include_once _lib . "config.php";

//Lưu ngôn ngữ chọn vào $_SESSION
$lang_arr = array("vi", "en", "cn", "ge");
if (isset($_GET['lang']) == true) {
    if (in_array($_GET['lang'], $lang_arr) == true) {
        $lang = $_GET['lang'];
        $_SESSION['lang'] = $lang;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {

    $lang = $config["lang_default"];
}

require_once _source . "lang_$lang.php";

include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";
include_once _lib . "file_requick.php";
include_once _source . "counter.php";
include_once _source . "useronline.php";

$d = new database($config['database']);
$id=$_GET['id'];

$d->reset();
					$sql="select * from #_news where hienthi=1 and id='".$id."'  order by stt,ngaytao desc";
					$d->query($sql);
					$mota_con=$d->fetch_array();
?>
	
   
	 
	<div class="box-hinh-loai clearfix">
		  <?php
		
		  
			$d->reset();
			$sql_detail = "select id,photo from #_hasp where hienthi=1 and id_photo='".$id."' order by stt desc";
			$d->query($sql_detail);

			$product_spec = $d->result_array();
                         
            for ($j = 0; $j < count($product_spec); $j++) {
                                ?>
				<div class="">
					
								<img src="thumb/405x250/1/<?php
								if ($product_spec[$j]['photo'] != NULL)
									echo _upload_news_l . $product_spec[$j]['photo'];
								else
									echo 'images/no-image-available.png';
								?>" alt="<?= $product_spec[$j]['id'] ?>" />
					
				</div>			
			<?php } ?>

	</div><!--box_product-->
	
	<div class="box-mota-loai clearfix">
		<?=$mota_con["mota_$lang"]?>
	</div>
	
	
	
	