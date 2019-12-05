<?php  if(!defined('_source')) die("Error");
	
	
	$d->reset();
	$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
	$d->query($sql_banner_giua);
	$row_logo = $d->fetch_array();

	$image=$http.$config_url."/"._upload_hinhanh_l.$row_logo["banner_$lang"]."";

	$title_bar=$row_setting["title_$lang"];
	$description_web=strip_tags($row_setting["title_$lang"]);



	

?>