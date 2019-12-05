<?php

if (!defined('_source'))
    die("Error");
@$idl = addslashes($_GET['idl']);
@$idcat = addslashes($_GET['idcat']);
@$idi = addslashes($_GET['idi']);
@$id_color = addslashes($_GET['color']);
@$id = addslashes($_GET['id']);


if ($id != '') {
	$id =magic_quote($id);
	$d->reset();
    $sql_detail = "select * from #_product where hienthi=1 and id='" . $id . "'";
    $d->query($sql_detail);
    $id_detail = $d->fetch_array();
	$id=$id_detail['id'];
    addtodaxem($id);
    // Rating & Reviews Comments Post ID

    if (!empty($_POST['sub-rating'])) {

        $id_pro = addslashes($_POST['id_product']);
        $tieude = addslashes($_POST['tieude']);
        $ten = addslashes($_POST['nguoidanhgia']);
        $noidung = addslashes($_POST['noidung_danhgia']);
        $ngaytao = time();
        $rating = addslashes($_POST['number_rating']);
        $url_back = $_SERVER['HTTP_REFERER'];

        $d->reset();
        $sql_in = "insert into table_rating(id_product,ngaytao,ten,tieude,noidung,rating) values ('$id_pro','$ngaytao','$ten','$tieude','$noidung','$rating')";
        if ($d->query($sql_in)) {

            // update rating cho sản phẩm này
            $num_rating = getTotalStar($id_pro);
            updateRatingProduct($id_pro, $num_rating);

            transfer(_danhgiasucc, $url_back);
        } else {
            transfer(_coloixayra, $url_back);
        }
    }



    // Update Views Product

    $sql_lanxem = "UPDATE #_product SET luotxem=luotxem+1  WHERE id ='" . $id . "'";
    $d->query($sql_lanxem);


    $d->reset();
    $sql_detail = "select * from #_product where hienthi=1 and id='" . $id . "'";
    $d->query($sql_detail);
    $row_detail = $d->fetch_array();
   
    $id_listhome = $row_detail['id_list'];
    $id_cathome = $row_detail['id_cat'];
    $id_itemhome = $row_detail['id_item'];

	

    // Tổng số người đánh giá cho sản phẩm này
    $total_review = getTotalRating($row_detail['id']);

    // arr người đánh giá cho sản phẩm này
    $arr_rating = getArrRating($row_detail['id']);


    // Get Info Catalog 1 

    $d->reset();
    $sql = "select ten_$lang,id,tenkhongdau_$lang from #_product_list where hienthi=1 and id='" . $row_detail['id_list'] . "' ";
    $d->query($sql);
    $dm1_list = $d->fetch_array();


    // Get Info Catalog 2 

    $d->reset();
    $sql = "select ten_$lang,id,tenkhongdau_$lang from #_product_cat where hienthi=1 and id=" . $row_detail['id_cat'];
    $d->query($sql);
    $dm2_cat = $d->fetch_array();


    // Get Info Catalog 3

    $d->reset();
    $sql = "select ten_$lang,id,tenkhongdau_$lang from #_product_item where hienthi=1 and id=" . $row_detail['id_item'];
    $d->query($sql);
    $dm3_cat = $d->fetch_array();



    // Share Facebook info product 
    $image = $http.$config_url . "/" . _upload_product_l . $row_detail['photo'];
   
    $description_web = strip_tags($row_detail["description_$lang"]);



    // Get Keyword + Des +  heading (h1,h2) 

    if ($row_detail["keyword_$lang"] != '')
        $row_setting["keywords_$lang"] = $row_detail["keyword_$lang"];
    if ($row_detail["description_$lang"] != '')
        $row_setting["description_$lang"] = $row_detail["description_$lang"];

    if ($row_detail["title_$lang"] != '')
        $row_setting["h1_$lang"] = $row_detail["title_$lang"];

    if ($row_detail["title_$lang"] != '')
        $row_setting["h2_$lang"] = $row_detail["title_$lang"];

    if ($row_detail["title_$lang"] != '') {
        $title_bar = $row_detail["title_$lang"];
    } else {
        $title_bar = $row_detail["ten_$lang"];
    }


    $title_tcat = $com_title;






    #ALBUM HÌNH======================	


    $d->reset();
    $sql_detail = "select id,photo from #_hasp where hienthi=1 and id_photo='" . $row_detail['id'] . "' and com='hasp' order by stt,id desc";
    $d->query($sql_detail);
    $album_hinh = $d->result_array();


    #các sản phẩm khác======================		
    $d->reset();
    $sql_sanphamkhac = "select * from #_product where hienthi=1 and id <>'" . $id . "' and com='" . $com_type . "' and id_list=" . $row_detail['id_list'] . "  order by stt,id desc limit 0,12";
    $d->query($sql_sanphamkhac);
    $sanpham_khac = $d->result_array();
} else {

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

    $sql_tintuc = "SELECT count(id) AS numrows FROM #_product where hienthi=1  and com='" . $com_type . "' ";

    if (isset($_GET['idl'])) {
        $idl = addslashes($_GET['idl']);
        $id_listhome = $idl;



        $d->reset();
        $sql_title = "select ten_$lang,id,tenkhongdau_$lang,title_$lang,keyword_$lang,description_$lang,h1_$lang,h2_$lang,photo from #_product_list where com='" . $com_type . "' and id='$idl'";
        $d->query($sql_title);
        $title_car = $d->fetch_array();

        $d->reset();
        $sql_title = "select * from #_product_list where com='" . $com_type . "' and id='$idl'";
        $d->query($sql_title);
        $title_idl = $d->fetch_array();

        $d->reset();
        $sql = "select ten_$lang,id,tenkhongdau_$lang from #_product_list where hienthi=1  and com='" . $com_type . "' and id='" . $title_car['id'] . "'   order by stt,id desc";
        $d->query($sql);
        $id_list1 = $d->result_array();






        $d->reset();
        $sql_detail = "select id,photo from #_hasp where hienthi=1 and id_photo='" . $row_detail['id'] . "'";
        $d->query($sql_detail);
        $album_hinh = $d->result_array();



        // Share Facebook info product 

        $d->reset();
		$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
		$d->query($sql_banner_giua);
		$row_logo = $d->fetch_array();
		
		$image=$http.$config_url."/"._upload_hinhanh_l.$row_logo["banner_$lang"]."";
		if($title_car["photo"]!=""){
				$image=$http.$config_url."/"._upload_product_list_l.$title_car["photo"]."";
		}
        $description_web = strip_tags($title_car["description_$lang"]);




        if ($title_car["keyword_$lang"] != '')
            $row_setting["keywords_$lang"] = $title_car["keyword_$lang"];
        if ($title_car["description_$lang"] != '')
            $row_setting["description_$lang"] = $title_car["description_$lang"];

        if ($title_car["title_$lang"] != '')
            $row_setting["h1_$lang"] = $title_car["title_$lang"];


        if ($title_car["title_$lang"] != '')
            $row_setting["h2_$lang"] = $title_car["title_$lang"];


        if ($title_car["title_$lang"] != '') {
            $title_bar = $title_car["title_$lang"];
        } else {
            $title_bar = $title_car["ten_$lang"];
        }


        $title_tcat = $title_car["ten_$lang"];
        $cat1 = $title_car["tenkhongdau_$lang"] . '/';
        $sql_tintuc.=" and id_list='" . $id_list1[0]['id'] . "' $where_khuvuc ";
        $sql_cap.=" and id_list='" . $id_list1[0]['id'] . "' $where_khuvuc ";
    }
    if (isset($_GET['idcat'])) {
        $idcat = addslashes($_GET['idcat']);
        $id_listhome = $idl;
        $id_cathome = $idcat;


		//echo $idcat;

        $d->reset();
        $sql = "select ten_$lang,id,tenkhongdau_$lang,photo from #_product_cat where com='" . $com_type . "' and id='$idcat'";
        $d->query($sql);
        $layid_list = $d->fetch_array();




        $d->reset();
        $sql_title = "select ten_$lang,id,tenkhongdau_$lang,title_$lang,keyword_$lang,description_$lang,h1_$lang,h2_$lang,photo from #_product_cat where com='" . $com_type . "' and id='$idcat'";
        $d->query($sql_title);
        $title_car = $d->fetch_array();



        $d->reset();
        $sql = "select ten_$lang,id,tenkhongdau_$lang,id_list from #_product_cat where hienthi=1 and com='" . $com_type . "' and id='" .$idcat. "' order by stt,id desc";
        $d->query($sql);
        $id_cat1 = $d->result_array();




        // Share Facebook info product 
        $image = $http.$config_url. "/" . _upload_product_cat_l . $title_car['photo'];
     
        $description_web = strip_tags($title_car["ten_$lang"]);




        if ($title_car["keyword_$lang"] != '')
            $row_setting["keywords_$lang"] = $title_car["keyword_$lang"];
        if ($title_car["description_$lang"] != '')
            $row_setting["description_$lang"] = $title_car["description_$lang"];

        if ($title_car["title_$lang"] != '')
            $row_setting["h1_$lang"] = $title_car["title_$lang"];

        if ($title_car["title_$lang"] != '')
            $row_setting["h2_$lang"] = $title_car["title_$lang"];

        if ($title_car["title_$lang"] != '') {
            $title_bar = $title_car["title_$lang"];
        } else {
            $title_bar = $title_car["ten_$lang"];
        }

		
        $title_tcat = $title_car["ten_$lang"];
        $cat2 = $title_car["tenkhongdau_$lang"] . '/';
        $sql_tintuc.=" and id_cat='" . $id_cat1[0]['id'] . "' $where_khuvuc ";
        $sql_cap.=" and id_cat='" . $id_cat1[0]['id'] . "' $where_khuvuc ";
		
		
    }
    if (isset($_GET['idi'])) {
        $idi = addslashes($_GET['idi']);
        $id_listhome = $idl;
        $id_cathome = $idcat;
        $id_itemhome = $idi;



        $d->reset();
        $sql_title = "select ten_$lang,id,tenkhongdau_$lang,title_$lang,keyword_$lang,description_$lang,photo  from #_product_item where com='" . $com_type . "' and id='$idi'";
        $d->query($sql_title);
        $title_car = $d->fetch_array();


        $d->reset();
        $sql = "select ten_$lang,id,tenkhongdau_$lang,id_list,id_cat from #_product_item where hienthi=1 and com='" . $com_type . "' and id='" . $title_car['id'] . "'   order by stt,id desc";
        $d->query($sql);
        $id_item1 = $d->result_array();


        // Share Facebook info product 
        $image = $http.$config_url. "/" . _upload_product_item_l . $title_car['photo'];
      
        $description_web = strip_tags($title_car["ten_$lang"]);

        if ($title_car["keyword_$lang"] != '')
            $row_setting["keywords_$lang"] = $title_car["keyword_$lang"];
        if ($title_car["description_$lang"] != '')
            $row_setting["description_$lang"] = $title_car["description_$lang"];
		
		if ($title_car["title_$lang"] != '')
            $row_setting["h1_$lang"] = $title_car["title_$lang"];

        if ($title_car["title_$lang"] != '')
            $row_setting["h2_$lang"] = $title_car["title_$lang"];

        if ($title_car["title_$lang"] != '') {
            $title_bar = $title_car["title_$lang"];
        } else {
            $title_bar = $title_car["ten_$lang"];
        }


        $title_tcat = $title_car["ten_$lang"];
        $cat3 = $title_car["tenkhongdau_$lang"] . '/';
        $sql_tintuc.=" and id_item='" . $id_item1[0]['id'] . "' $where_khuvuc ";
        $sql_cap.=" and id_item='" . $id_item1[0]['id'] . "' $where_khuvuc ";
    }


    $sql_tintuc.=" order by stt,ngaytao,id desc";

    $d->query($sql_tintuc);
    $dem = $d->fetch_array();

    $totalRows = $dem['numrows'];
    $page = $_GET['curPage'];

    $pageSize = 12;
    if ($limit > 0) {

        $pageSize = $limit;
    }

    $offset = 5;

    if ($page == "")
        $page = 1;
    else
        $page = $_GET['curPage'];
    $page--;
    $bg = $pageSize * $page;
	


    $d->reset();
    $sql = "select * from #_product where hienthi=1 and com='" . $com_type . "' $sql_cap  order by stt,id desc  limit $bg,$pageSize ";


    $d->query($sql);
    $product = $d->result_array();
	

    if (isset($_GET['idl']) and ! isset($_GET["idcat"])) {
        $catalog_url = @$cat1 . "";
        $gach_kc = "";
        $gach_sequence = "";
        $and_kc = "";

        //echo ("cap 1");
    } else if (isset($_GET["idl"]) and isset($_GET["idcat"]) and ! isset($_GET["idi"])) {


        // echo ("cap 2");
        $catalog_url = @$cat1 . "" . @$cat2 . "";
        $gach_kc = "";
        $gach_sequence = "";
        $and_kc = "";
    } else if (isset($_GET["idi"]) and isset($_GET["idcat"]) and isset($_GET["idi"])) {
        // echo ("cap 3");
        $catalog_url = @$cat1 . "/" . @$cat2 . "/" . @$cat3 . "";
        $gach_kc = "/";
        $gach_sequence = "";
        $and_kc = "--&";
    } else {
        $catalog_url = "$com.html/";
    }


    $url_link = getCurrentPageURL()."/page";
}
?>