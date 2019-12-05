<?php  if(!defined('_source')) die("Error");

	$d->setTable('info');
	$d->setWhere("com",$com_type);
	$d->select("ten_$lang,noidung_$lang, keyword_$lang, description_$lang,title_$lang,h1_$lang,h2_$lang,is_index,photo,mota_$lang,luotxem,id");
	if($d->num_rows()>0){
		$row = $d->fetch_array();
		$noidung_info= $row["noidung_$lang"];
		if($row["keyword_$lang"]!='')
			$row_setting["keywords_$lang"]=$row["keyword_$lang"];
		if($row["description_$lang"]!='')
			$row_setting["description_$lang"]=$row["description_$lang"];
			
	if($row["title_$lang"]!='')
			$row_setting["h1_$lang"]=$row["title_$lang"];		
			
	if($row["title_$lang"]!='')
			$row_setting["h2_$lang"]=$row["title_$lang"];				
			
	if($row["title_$lang"]!='')
	{
			$title_bar=$row["title_$lang"];	
	}
	else
		
	{
			$title_bar=$row["ten_$lang"];	
			
	}		
		
		$sql_lanxem = "UPDATE #_info SET luotxem=luotxem+1  WHERE id ='".$row["id"]."'";
		$d->query($sql_lanxem);
			
	}
	
	
	if ($row["ten_$lang"]!='')
	{
		
		$title_tcat=$row["ten_$lang"];
		
	}
	else
	{
		$title_tcat=$com_title;
	}
	
	
	
	$d->reset();
	$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
	$d->query($sql_banner_giua);
	$row_logo = $d->fetch_array();
	
		$image=$http.$config_url."/"._upload_hinhanh_l.$row_logo["banner_$lang"]."";
	if($row["photo"]!=""){
		$image=$http.$config_url."/"._upload_info_l.$row["photo"]."";
	}	
	$url_web= getCurrentPageURL();
	
	$description_web=strip_tags($row["title_$lang"]);
?>