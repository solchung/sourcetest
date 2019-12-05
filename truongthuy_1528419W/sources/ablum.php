<?php  if(!defined('_source')) die("Error");
		@$idl =  addslashes($_GET['idl']);
		@$idcat =  addslashes($_GET['idcat']);
		@$idi =  addslashes($_GET['idi']);
		@$idsub =  addslashes($_GET['idsub']);
		@$id=  addslashes($_GET['id']);	
if(isset($_GET['id'])){

	
}else{
	
	$d->reset();
	$sql_contact = "select noidung_$lang,mota_$lang,ten_$lang,keyword_$lang,description_$lang,h1_$lang,h2_$lang,photo from #_info where com='".$com_type."' ";
	$d->query($sql_contact);
	$key_des_info = $d->fetch_array();
	
	if($key_des_info["keyword_$lang"]!='')
	$row_setting["keywords_$lang"]=$key_des_info["keyword_$lang"];
	if($key_des_info["description_$lang"]!='')
	$row_setting["description_$lang"]=$key_des_info["description_$lang"];

	if($key_des_info["title_$lang"]!='')
	$row_setting["h1_$lang"]=$key_des_info["title_$lang"];		

	if($key_des_info["title_$lang"]!='')
	$row_setting["h2_$lang"]=$key_des_info["title_$lang"];	

	if($key_des_info["title_$lang"]!='')
	{
			$title_bar=$key_des_info["title_$lang"];		
			$title_tcat=$key_des_info["title_$lang"];	
	}
	else
		
	{
			$title_bar=$com_title;		
			$title_tcat=$com_title;		
			
	}
	// Share Facebook info product 

	$d->reset();
	$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
	$d->query($sql_banner_giua);
	$row_logo = $d->fetch_array();
	
	$image=$http.$config_url."/"._upload_hinhanh_l.$row_logo["banner_$lang"]."";
	if($key_des_info["photo"]!=""){
			$image=$http.$config_url."/"._upload_info_l.$key_des_info["photo"]."";
		}
	$description_web = strip_tags($key_des_info["description_$lang"]);

	@$limit = (int) $row_setting['phantrang_sp'];

	$sql_news = "SELECT count(id) AS numrows FROM #_image_url where hienthi=1  and com='".$com_type."' ";


	
	$sql_news.=" order by stt desc";

	$d->query($sql_news);	
	$dem=$d->fetch_array();

	$totalRows=$dem['numrows'];
	$page=$_GET['curPage'];
		
	$pageSize=12;
	if($limit >0 ){
	
	$pageSize=$limit;
	
	}
	
	$offset=5;
							
	if ($page=="")
			$page=1;
		else 
			$page=$_GET['curPage'];
	$page--;
	$bg=$pageSize*$page;

	$d->reset();
	$sql="select * from #_image_url where hienthi=1 and com='".$com_type."' $sql_cap order by stt desc  limit $bg,$pageSize ";

	
	$d->query($sql);
	$tintuc=$d->result_array();



	
	$url_link = getCurrentPageURL()."/page";

	
	
}
?>