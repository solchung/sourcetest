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
@$limit = (int) $row_setting['phantrang_bv'];
$loai=$_POST["id_cap2"];
if($_POST["id_cap2"]==0){
	$dieukien ='';
}else{
	$dieukien ='and id_list='.$loai.'';
}

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
	$paging->per_page = 12;	
}


$paging->page = $_POST["page"];

$paging->text_sql = "select * from table_news where hienthi=1 and com='dichvu' and tinnoibat>0  $dieukien  order by stt,id desc  ";


$result_pag_data = $paging->GetResult();

$message = '';
$paging->data = "" . $message . "";



?>
	<?php
	$j=0;
	while ($row = mysql_fetch_array($result_pag_data)) { $j++;

	?>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">	
						<a href="<?=$row["tenkhongdau_$lang"]?>">
									 <div class="item_product_s wow flipInX" >

											<div class="zoom_product_s">
												<img src="thumb/270x270/1/<?php
												if ($row['photo'] != NULL)
													echo _upload_news_l . $row['photo'];
												else
													echo 'images/no-image-available.png';
												?>" alt="<?= $row["ten_$lang"] ?>" />
												
												
											</div>
											<div class="name_product_s">
													<h3>
														<?= $row["ten_$lang"] ?>
													</h3>
													
											</div>
									  
										</div><!--item_product-->
								</a>
			
			</div>	
	
	<?php } ?>
	<div class="clear"></div>
	<?php if($j==0) echo "Chưa có dự án ...."; else{ echo $paging->Load();}?>
	<div class="clear"></div>

	