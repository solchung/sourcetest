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
$loai=$_GET['loai'];
$stt=$_GET['stt'];
?>
	
   
	 
		<div class="box-line-sp">
		  <?php
		
		  
			$d->reset();
			$sql = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id,photo,thumb,masp,color,giamgia,gia_vnd from #_product where hienthi=1 and com='thietke' and spnoibat>0 and id_list='".$id."' order by stt,id asc ";		
			$d->query($sql);
			$product_spec = $d->result_array();
                         
            for ($j = 0; $j < count($product_spec); $j++) {
                                ?>
				<div class="">
					 <div class="item_duan wow flipInX" >

							<div class="zoom_duan">
								<img src="thumb/380x390/1/<?php
								if ($product_spec[$j]['photo'] != NULL)
									echo _upload_product_l . $product_spec[$j]['photo'];
								else
									echo 'images/no-image-available.png';
								?>" alt="<?= $product_spec[$j]['ten'] ?>" />
								
								<div class="name_thietke">
										<h3>
											<?= $product_spec[$j]['ten'] ?>
										</h3>
								
										
								</div>
							</div>
					  
					</div><!--item_product-->
				</div>			
			<?php } ?>

	</div><!--box_product-->
	
	
	