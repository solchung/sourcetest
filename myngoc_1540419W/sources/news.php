<?php  if(!defined('_source')) die("Error");
		@$idl =  addslashes($_GET['idl']);
		@$idcat =  addslashes($_GET['idcat']);
		@$idi =  addslashes($_GET['idi']);
		@$idsub =  addslashes($_GET['idsub']);
		@$id=  addslashes($_GET['id']);	
if(isset($_GET['id'])){
	#tin tuc chi tiet


	$id =  addslashes($_GET['id']);

	$sql_lanxem = "UPDATE #_news SET luotxem=luotxem+1  WHERE id ='".$id."'";
	$d->query($sql_lanxem);
			
	$sql = "select * from #_news where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$tintuc_detail = $d->result_array();



	$ten_list=$tintuc_detail[0]['tenkhongdau_$lang'];
	$ten_cat=$tintuc_detail[0]['tenkhongdau_$lang'];
	$id_listhome=$tintuc_detail[0]['id_list'];
	$id_cathome=$tintuc_detail[0]['id_cat'];
	$id_itemhome=$tintuc_detail[0]['id_item'];
		
	
	$title_tcat=$com_title;
	
	if($tintuc_detail[0]["keyword_$lang"]!='')
		$row_setting["keywords_$lang"]=$tintuc_detail[0]["keyword_$lang"];
	if($tintuc_detail[0]["description_$lang"]!='')
		$row_setting["description_$lang"]=$tintuc_detail[0]["description_$lang"];
		
	if($tintuc_detail[0]["title_$lang"]!='')
		$row_setting["h1_$lang"]=$tintuc_detail[0]["title_$lang"];	
		
	if($tintuc_detail[0]["title_$lang"]!='')
		$row_setting["h2_$lang"]=$tintuc_detail[0]["title_$lang"];	
		
	if($tintuc_detail[0]["title_$lang"]!='')
		{
			$title_bar=$tintuc_detail[0]["title_$lang"];	
		}
		else
		
		{
			$title_bar=$tintuc_detail[0]["ten_$lang"];	
			
		}
		
		  // Share Facebook info news 

        $image = $http.$config_url . "/" ._upload_news_l.$tintuc_detail[0]['photo'];
		$description_web=strip_tags($tintuc_detail[0]["mota_$lang"]);



	#ALBUM HÌNH======================	
		
				
		$d->reset();
		$sql_detail = "select id,photo from #_hasp where hienthi=1 and id_photo='".$tintuc_detail[0]['id']."' and com='hanews' order by stt desc";
		$d->query($sql_detail);
		$album_hinh = $d->result_array();	
     
		
	#các tin cu hon
	$sql_khac = "select ten_$lang,tenkhongdau_$lang,ngaytao,id,photo from #_news where hienthi=1 and id <>'".$id."' and com='".$com_type."' order by stt,ngaytao desc limit 0,5";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();


	$sql_khac = "select ten_$lang,tenkhongdau_$lang,ngaytao,id,photo from #_news where hienthi=1 and com='".$com_type."' order by stt,ngaytao desc";
	$d->query($sql_khac);
	$tintuc_gt = $d->result_array();

	
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
	
	
	$d->reset();
	$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
	$d->query($sql_banner_giua);
	$row_logo = $d->fetch_array();
	
	$image=$http.$config_url."/"._upload_hinhanh_l.$row_logo["banner_$lang"]."";
	if($key_des_info["photo"]!=""){
			$image=$http.$config_url."/"._upload_info_l.$key_des_info["photo"]."";
		}
	$description_web = strip_tags($key_des_info["description_$lang"]);

	@$limit = (int) $row_setting['phantrang_bv'];

	$sql_news = "SELECT count(id) AS numrows FROM #_news where hienthi=1  and com='".$com_type."' ";

	if(isset($_GET['idl'])){
		$idl =  addslashes($_GET['idl']);
		$id_listhome=$idl;
		
		$d->reset();
		$sql_title="select ten_$lang,id,tenkhongdau_$lang from #_news_list where com='".$com_type."' and id='$idl'";
		$d->query($sql_title);
		$lay_idlist = $d->fetch_array();	
		
		$d->reset();
		$sql_title="select ten_$lang,id,tenkhongdau_$lang,title_$lang,keyword_$lang,description_$lang,mota_$lang,photo,h1_$lang,h2_$lang from #_news_list where com='".$com_type."' and id='$idl'";
		$d->query($sql_title);
		$title_car = $d->fetch_array();
		
		
		$d->reset();
		$sql = "select ten_$lang,id,tenkhongdau_$lang from #_news_list where hienthi=1 and com='".$com_type."' and id='".$lay_idlist['id']."'   order by stt,id desc";
		$d->query($sql);
		$id_list1 = $d->result_array();
		
		
		
		
		if($title_car["keyword_$lang"]!='')
			$row_setting["keywords_$lang"]=$title_car["keyword_$lang"];
		if($title_car["description_$lang"]!='')
			$row_setting["description_$lang"]=$title_car["description_$lang"];
			
		if($title_car["title_$lang"]!='')
			$row_setting["h1_$lang"]=$title_car["title_$lang"];	
			
		if($title_car["title_$lang"]!='')
			$row_setting["h2_$lang"]=$title_car["title_$lang"];					
		if($title_car["title_$lang"]!='')
			$description_web=strip_tags($title_car["title_$lang"]);	
			
			
		if($title_car["title_$lang"]!='')
		{
			$title_bar=$title_car["title_$lang"];	
		}
		else
		
		{
			$title_bar=$title_car["ten_$lang"];	
			
		}
		
		$d->reset();
		$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
		$d->query($sql_banner_giua);
		$row_logo = $d->fetch_array();
		
		$image=$http.$config_url."/"._upload_hinhanh_l.$row_logo["banner_$lang"]."";
		if($title_car["photo"]!=""){
				$image=$http.$config_url."/"._upload_news_list_l.$title_car["photo"]."";
		}
        $description_web = strip_tags($title_car["description_$lang"]);
		
		
	
		$title_tcat=$title_car["ten_$lang"];
		$cat1=$title_car['tenkhongdau_$lang'].'';
		$sql_news.=" and id_list='".$id_list1[0]['id']."'";
		$sql_cap.=" and id_list='".$id_list1[0]['id']."'";
	}
	
	if(isset($_GET['idcat'])){
		$idcat =  addslashes($_GET['idcat']);
		$id_listhome=$idl;
		$id_cathome=$idcat;
		
		
	
		
		$d->reset();
		$sql_title="select ten_$lang,id,tenkhongdau_$lang,title_$lang,keyword_$lang,description_$lang,photo from #_news_cat where com='".$com_type."' and id='$idcat'";
		$d->query($sql_title);
		$title_car = $d->fetch_array();	
		
		$d->reset();
		$sql = "select ten_$lang,id,tenkhongdau_$lang,id_list from #_news_cat where hienthi=1 and com='".$com_type."' and id='".$title_car['id']."' order by stt,id desc";
		$d->query($sql);
		$id_cat1 = $d->result_array();
		
		
		
		if($title_car["keyword_$lang"]!='')
			$row_setting["keywords_$lang"]=$title_car["keyword_$lang"];
		if($title_car["description_$lang"]!='')
			$row_setting["description_$lang"]=$title_car["description_$lang"];
		
		if($title_car["title_$lang"]!='')
			$row_setting["h1_$lang"]=$title_car["title_$lang"];	
			
		if($title_car["title_$lang"]!='')
			$row_setting["h2_$lang"]=$title_car["title_$lang"];		
			
		$d->reset();
		$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
		$d->query($sql_banner_giua);
		$row_logo = $d->fetch_array();
		
		$image=$http.$config_url."/"._upload_hinhanh_l.$row_logo["banner_$lang"]."";
		if($title_car["photo"]!=""){
				$image=$http.$config_url."/"._upload_news_cat_l.$title_car["photo"]."";
		}
        $description_web = strip_tags($title_car["description_$lang"]);
		
	
			
		
		if($title_car["title_$lang"]!='')
		{
			$title_bar=$title_car["title_$lang"];	
		}
		else
		
		{
			$title_bar=$title_car["ten_$lang"];	
			
		}		
			
		
		$title_tcat=$title_car["ten_$lang"];
			
		
		$cat2=$title_car['tenkhongdau_$lang'].'/';
		$sql_news.=" and id_cat='".$id_cat1[0]['id']."'";

		$sql_cap.=" and id_cat='".$id_cat1[0]['id']."'";
	}
	
	
	if(isset($_GET['idi'])){
		$idi =  addslashes($_GET['idi']);
		$id_listhome=$idl;
		$id_cathome=$idcat;
		$id_itemhome=$idi;
		

		
		$d->reset();
		$sql_title="select ten_$lang,id,tenkhongdau_$lang,title_$lang,keyword_$lang,description_$lang  from #_news_item where com='".$com_type."' and id='$idi'";
		$d->query($sql_title);
		$title_car = $d->fetch_array();	
		
		
		$d->reset();
		$sql = "select ten_$lang,id,tenkhongdau_$lang,id_list,id_cat from #_news_item where hienthi=1 and com='".$com_type."' and id='".$title_car['id']."'   order by stt,id desc";
		$d->query($sql);
		$id_item1 = $d->result_array();
		
		if($title_car["keyword_$lang"]!='')
			$row_setting["keywords_$lang"]=$title_car["keyword_$lang"];
		if($title_car["description_$lang"]!='')
			$row_setting["description_$lang"]=$title_car["description_$lang"];
		if($title_car["title_$lang"]!='')
			$row_setting["h1_$lang"]=$title_car["title_$lang"];	
			
		if($title_car["title_$lang"]!='')
			$row_setting["h2_$lang"]=$title_car["title_$lang"];		
		
		if($title_car["title_$lang"]!='')
		{
			$title_bar=$title_car["title_$lang"];	
		}
		else
		
		{
			$title_bar=$title_car["ten_$lang"];	
			
		}	
		
		$d->reset();
		$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
		$d->query($sql_banner_giua);
		$row_logo = $d->fetch_array();
		
		$image=$http.$config_url."/"._upload_hinhanh_l.$row_logo["banner_$lang"]."";
		if($title_car["photo"]!=""){
				$image=$http.$config_url."/"._upload_news_item_l.$title_car["photo"]."";
		}
        $description_web = strip_tags($title_car["description_$lang"]);
			
	
		$title_tcat=$title_car["ten_$lang"];
		$cat3=$title_car['tenkhongdau_$lang'].'/';
		$sql_news.=" and id_item='".$id_item1[0]['id']."'";
		$sql_cap.=" and id_item='".$id_item1[0]['id']."'  ";
		
		
	}	
	
	
	$sql_news.=" order by stt,ngaytao desc";

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
	$sql="select * from #_news where hienthi=1 and com='".$com_type."' $sql_cap order by stt,ngaytao desc  limit $bg,$pageSize ";

	
	$d->query($sql);
	$tintuc=$d->result_array();


	if(isset($_GET['idl'])  and !isset($_GET["idcat"]))
		{
		  $catalog_url=@$cat1."";
		  $gach_kc="/";
		  $gach_sequence="/";
		  $and_kc="&";
		  
		  //echo ("cap 1");
		
		}
		else if (isset($_GET["idl"]) and isset($_GET["idcat"]) and !isset($_GET["idi"]) ){
			
			
			// echo ("cap 2");
		   $catalog_url=@$cat1."/".@$cat2."";
		   $gach_kc="/";
		   $gach_sequence="/";
		   $and_kc="-&";
		
			
		}
		else if (isset($_GET["idi"]) and isset($_GET["idcat"]) and isset($_GET["idi"]))
		{
		  // echo ("cap 3");
		  $catalog_url=@$cat1."/".@$cat2."/".@$cat3."";
		  $gach_kc="/";
		  $gach_sequence="";
		  $and_kc="--&";
		}
		else{
		$catalog_url="$com.html/";
		}

	
	$url_link = getCurrentPageURL()."/page";

	
	
}
?>