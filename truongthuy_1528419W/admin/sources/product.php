<?php
if(isset($_POST) && isset($_SESSION[$login_name])){
	if($_SESSION[$login_name]==false)
	{
		redirect("index.php");	
	}
}
if (!defined('_source'))
    die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urldanhmuc = "";
$urldanhmuc.= (isset($_REQUEST['id_list'])) ? "&id_list=" . addslashes($_REQUEST['id_list']) : "";
$urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=" . addslashes($_REQUEST['id_cat']) : "";
$urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=" . addslashes($_REQUEST['id_item']) : "";
$urldanhmuc.= (isset($_REQUEST['id_sub'])) ? "&id_sub=" . addslashes($_REQUEST['id_sub']) : "";
$urldanhmuc.= (isset($_REQUEST['typechild'])) ? "&typechild=" . addslashes($_REQUEST['typechild']) : "";
if (isset($_REQUEST['id_product'])) {
    $_SESSION['id_product'] = (int) $_REQUEST['id_product'];
}
$url_back = $_SERVER['HTTP_REFERER'];
$id = @$_REQUEST['id'];
switch ($act) {

#==================================== Start Danh Sach Sản Phẩm  ===============================

    case "man":
        get_items();
        $template = "product/items";
        break;

    case "add":
        $template = "product/item_add";
        break;

    case "edit":
        get_item();
        $template = "product/item_add";
        break;

    case "save":
        save_item();
        break;

    case "delete_img":
        delete_img();
        break;

    case "delete":
        delete_item();
        break;


#==================================== End Danh Sach Sản Phẩm  ===============================		
#==================================== Start Danh Muc Cap 1   ===============================

    case "man_list":
        get_lists();
        $template = "product/lists";
        break;

    case "add_list":
        $template = "product/list_add";
        break;

    case "edit_list":
        get_list();
        $template = "product/list_add";
        break;

    case "save_list":
        save_list();
        break;

    case "delete_list":
        delete_list();
        break;


    case "delete_imglist":
        delete_imglist();
        break;



    #==================================== End Danh Muc Cap 1   ===============================	
#==================================== Start Danh Muc Cap 2   ===============================

    case "man_cat":
        get_cats();
        $template = "product/cats";
        break;

    case "add_cat":
        $template = "product/cat_add";
        break;

    case "edit_cat":
        get_cat();
        $template = "product/cat_add";
        break;

    case "save_cat":
        save_cat();
        break;

    case "delete_cat":
        delete_cat();
        break;

    case "delete_imgcat":
        delete_imgcat();
        break;

    #==================================== End Danh Muc Cap 2   ===============================	
#==================================== Start Danh Muc Cap 3   ===============================
    case "man_item":
        get_loais();
        $template = "product/loais";
        break;

    case "add_item":
        $template = "product/loai_add";
        break;

    case "edit_item":
        get_loai();
        $template = "product/loai_add";
        break;

    case "save_item":
        save_loai();
        break;

    case "delete_item":
        delete_loai();
        break;

    case "delete_imgitem":
        delete_imgitem();
        break;

    #==================================== End Danh Muc Cap 3   ===============================	
#==================================== Start Danh Muc Cap 4   ===============================

    case "man_sub":
        get_subs();
        $template = "product/subs";
        break;

    case "add_sub":
        $template = "product/sub_add";
        break;

    case "edit_sub":
        get_sub();
        $template = "product/sub_add";
        break;

    case "save_sub":
        save_sub();
        break;

    case "delete_sub":
        delete_sub();
        break;

    case "delete_imgsub":
        delete_imgsub();
        break;

#==================================== End Danh Muc Cap 4   ===============================
#==================================== Start RATING   ===============================

  	case "man_rating":
		get_ratings();
		$template = "product/rating";
		break;
		
		case "add_rating":		
		$template = "product/rating_add";
		break;

	case "edit_rating":		
		get_rating();
		$template = "product/rating_add";
		break;

	case "save_rating":
		save_rating();
		break;	
	
	case "delete_rating":
		delete_rating();
		break;	



#==================================== End RATING  ===============================		


    default:
        $template = "index";
}

#====================================

function fns_Rand_digit($min, $max, $num) {
    $result = '';
    for ($i = 0; $i < $num; $i++) {
        $result.=rand($min, $max);
    }
    return $result;
}

#---------------------------------------Start Main San Pham-------------------------------------------------

function get_items() {
    global $d, $items, $paging, $urldanhmuc, $url_back, $url_link, $totalRows, $pageSize, $offset;

    if (!empty($_POST)) {
        $multi = $_REQUEST['multi'];
        $id_array = $_POST['chon'];



        $count = count($id_array);
        if ($multi == 'show') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "UPDATE table_product SET hienthi =1 WHERE  id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }


        if ($multi == 'hide') {
            for ($i = 0; $i < $count; $i++) {

                $sql = "UPDATE table_product SET hienthi =0 WHERE  id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }

        if ($multi == 'del') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "SELECT * FROM table_product where id='" . $id_array[$i] . "'";
                $d->query($sql);
                //$cats= $d->fetch_array();


                if ($d->num_rows() > 0) {
                    while ($row = $d->fetch_array()) {
                        delete_file(_upload_product . $row['photo']);
                        delete_file(_upload_product . $row['thumb']);
                    }


                    $d->reset();
                    $sql = "select photo, thumb from #_hasp where id_photo='" . $id_array[$i] . "' and com='hasp'";
                    $d->query($sql);
                    $row_d = $d->result_array();
                    if (!empty($row_d)) {
                        foreach ($row_d as $row_d_item) {
                            delete_file(_upload_product . $row_d_item['photo']);
                            delete_file(_upload_product . $row_d_item['thumb']);
                        }
                        $sql = "delete from #_hasp where id_photo='" . $id_array[$i] . "' and com='hasp'";
                        $d->query($sql);
                    }
                    $sql = "delete from #_product where id='" . $id_array[$i] . "'";
                    $d->query($sql);
                }



                $sql = "delete from table_product where id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }
    }


    if ($_REQUEST['pt'] != '' && $_REQUEST['price'] != '' && $_REQUEST['listid'] != '') {
        $pt = $_REQUEST['pt'];
        $price = $_REQUEST['price'];
        $listid = $_REQUEST['listid'];
        $listid = explode(",", $_GET['listid']);

        for ($i = 0; $i < count($listid); $i++) {
            $idTin = (int) $listid[$i];
            $price = (int) $price;
            if ($pt == 'increase') {
                $sqlUPDATE_ORDER = "UPDATE table_product SET gia =gia+'$price' WHERE  id = " . $idTin . "";
                $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die(mysql_error());
            } elseif ($pt == 'decrease') {
                $sqlUPDATE_ORDER = "UPDATE table_product SET gia =gia-'$price' WHERE  id = " . $idTin . "";
                $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die(mysql_error());
            }
        }
    }





    #----------------------------------------------------------------------------------------

    if (@$_REQUEST['spmoi'] != '') {
        $id_up = $_REQUEST['spmoi'];
        $sql_sp = "SELECT id,spmoi FROM table_product where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $time = time();
        $hienthi = $cats[0]['spmoi'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product SET spmoi ='$time' WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product SET spmoi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }
    
    if (@$_REQUEST['tinhtrang'] != '') {
        $id_up = $_REQUEST['tinhtrang'];
        $sql_sp = "SELECT id,tinhtrang FROM table_product where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $time = time();
        $hienthi = $cats[0]['tinhtrang'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product SET tinhtrang ='$time' WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product SET tinhtrang =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }

    #----------------------------------------------------------------------------------------

    if (@$_REQUEST['spkm'] != '') {
        $id_up = $_REQUEST['spkm'];
        $sql_sp = "SELECT id,spkm FROM table_product where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $time = time();
        $hienthi = $cats[0]['spkm'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product SET spkm ='$time' WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product SET spkm =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }


    if (@$_REQUEST['spbc'] != '') {
        $id_up = $_REQUEST['spbc'];
        $sql_sp = "SELECT id,spbc FROM table_product where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $time = time();
        $hienthi = $cats[0]['spbc'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product SET spbc ='$time' WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product SET spbc =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }

    #----------------------------------------------------------------------------------------

    if (@$_REQUEST['spnoibat'] != '') {
        $id_up = $_REQUEST['spnoibat'];
        $sql_sp = "SELECT id,spnoibat FROM table_product where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $time = time();
        $hienthi = $cats[0]['spnoibat'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product SET spnoibat ='$time' WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product SET spnoibat =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }

    #----------------------------------------------------------------------------------------
    #----------------------------------------------------------------------------------------
    if (@$_REQUEST['hienthi'] != '') {
        $id_up = @$_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }
    #-------------------------------------------------------------------------------

    if (@$_REQUEST['typechild'] != '') {
        $typechild = addslashes($_REQUEST['typechild']);
        $where.=" and com='$typechild'";
    } else {
        $where.=" and com";
    }

    if ((int) @$_REQUEST['id_list'] != '') {
        $where.=" and id_list=" . $_REQUEST['id_list'] . "";
    }
    if ((int) @$_REQUEST['id_cat'] != '') {
        $where.=" and	id_cat=" . $_REQUEST['id_cat'] . "";
    }
    if ((int) @$_REQUEST['id_item'] != '') {
        $where.=" and	id_item=" . $_REQUEST['id_item'] . "";
    }

    if ((int) @$_REQUEST['id_sub'] != '') {
        $where.=" and	id_sub=" . $_REQUEST['id_sub'] . "";
    }


    if ($_REQUEST['keyword'] != '') {
        $keyword = addslashes($_REQUEST['keyword']);
        $where.="  and ten_vi LIKE '%$keyword%' or ten_en LIKE '%$keyword%' or ten_cn LIKE '%$keyword%' or ten_ge LIKE '%$keyword%' or masp LIKE '%$keyword%' ";
    }


    $sql = "SELECT count(id) AS numrows FROM #_product where id  $where ";
    $d->query($sql);
    $dem = $d->fetch_array();
    $totalRows = $dem['numrows'];
    $page = $_GET['p'];

    $pageSize = 20;
    $offset = 5;

    if ($page == "")
        $page = 1;
    else
        $page = $_GET['p'];
    $page--;
    $bg = $pageSize * $page;

    $sql = "select * from #_product where id $where order by stt,id desc limit $bg,$pageSize";
    $d->query($sql);
    $items = $d->result_array();
    // $url_link = "index.php?com=product&act=man&typechild='".$_GET['typechild']."'&keyword='".$_GET['keyword']."' " . $urldanhmuc;
    $url_link = "index.php?com=product&act=man&keyword=$_GET[keyword]" . $urldanhmuc;
}

function get_item() {
    global $d, $item, $url_back, $list_hasp, $ds_tags;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", $url_back);

    $ds_tags = shows_tag($id);

    $sql = "select * from #_product where id='" . $id . "' and com='$_REQUEST[typechild]' ";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", $url_back);
    $item = $d->fetch_array();


    ///lấy hình ảnh liên quan

    $sql = "select * from #_hasp where id_photo='" . $id . "' and com='hasp' order by stt asc";
    $d->query($sql);
    $list_hasp = $d->result_array();
}

function save_item() {
    global $d, $url_back, $config;

    $file_name = changeTitle($_POST['ten_vi']) . fns_Rand_digit(0, 3, 5);

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&id_list=$_GET[id_list]&typechild=$_GET[typechild]");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";




    if ($_REQUEST["delete_img_present"] == "delete_img") {

        $id = themdau($_GET['id']);
        $delete_img_present = $_REQUEST['delete_img_present'];


        if ($delete_img_present == 'delete_img') {




            if (isset($_GET['id'])) {

                $d->reset();
                $sql = "select id,thumb, photo from #_product where id='" . $id . "'";
                $d->query($sql);
                if ($d->num_rows() > 0) {
                    while ($row = $d->fetch_array()) {
                        delete_file(_upload_product . $row['photo']);
                        delete_file(_upload_product . $row['thumb']);
                    }
                    $sql = "UPDATE #_product SET photo ='',thumb='' WHERE  id = '" . $id . "'";
                    $d->query($sql);
                }
                if ($d->query($sql))
                    redirect($url_back);
                else
                    transfer("Xóa dữ liệu bị lỗi", $url_back);
            } else
                transfer("Không nhận được dữ liệu", $url_back);
        }
    }


    if ($id) {
        $id = themdau($_POST['id']);
        if ($photo = upload_image("file", _format_duoihinh, _upload_product, $file_name)) {
            //image_fix_orientation(_upload_product.$photo);
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _product_thumb_w, _product_thumb_h, _upload_product, $file_name, 1);

            $d->setTable('product');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product . $row['photo']);
                delete_file(_upload_product . $row['thumb']);
            }
        }




        delete_tag($id);
        insert_tag($id, $_POST['tag']);

        $data['id_khuvuc'] = implode(',', $_POST['id_khuvuc']);
        $data['id_list'] = (int) $_POST['id_list'];
        $data['id_cat'] = (int) $_POST['id_cat'];
        $data['id_item'] = (int) $_POST['id_item'];
        $data['id_sub'] = (int) $_POST['id_sub'];

        $data['id_tinh'] = (int) $_POST['id_tinh'];
        $data['id_huyen'] = (int) $_POST['id_huyen'];
        $data['id_phuong'] = (int) $_POST['id_phuong'];
        $data['id_duong'] = (int) $_POST['id_duong'];  

		$data['dientich'] = magic_quote($_POST['dientich']); 
        $data['phong'] = magic_quote($_POST['phong']);   
        $data['lau'] = magic_quote($_POST['lau']);
			if($_POST['Latitude']!=0 and $_POST['Longitude']!=0){
			$toado=$_POST['Latitude'].','.$_POST['Longitude'];
			$data['toado'] = $toado;
		}else{
			$data['toado'] = magic_quote($_POST['toado']);
		}

        $data['masp'] =magic_quote($_POST['masp']);
        $data['chatlieu'] = $_POST['chatlieu'];
        $data['ri'] = $_POST['ri'];
        $data['size'] = $_POST['size'];
        $data['xuatxu'] = $_POST['xuatxu'];
        //Thông tin về giá
        $data['gia_usd'] = $_POST['gia_usd']; //Tổng giá    
        $data['gia_vnd'] = $_POST['gia_vnd']; //Tổng giá     
        $data['giakm'] = (int) $_POST['giakm'];
        $data['giamgia'] = (int) $_POST['giamgia'];
        $data['khoihanh'] = magic_quote($_POST["khoihanh"]);
        /*         * ******color_n***** */
        $countsl = $_POST['color'];
        $min = $countsl[0];
        for ($k = 0; $k < count($countsl); $k++) {
            if ($min > $countsl[$k]) {
                $min = $countsl[$k];
            }
            if ($countsl[$k] != NULL) {
                $data['color'] = implode('|', $_POST['color']);
            }
        }
        /*         * ******End_color_n***** */
        foreach ($config["lang"] as $key => $value) {


            $data['h1_' . $value] = magic_quote($_POST['h1_' . $value]);
            $data['h2_' . $value] = magic_quote($_POST['h2_' . $value]);
            $data['title_' . $value] = magic_quote($_POST['title_' . $value]);
            $data['alt_' . $value] = magic_quote($_POST['alt_' . $value]);
            $data['keyword_' . $value] = magic_quote($_POST['keyword_' . $value]);
            $data['description_' . $value] = magic_quote($_POST['description_' . $value]);
            $data['deschar_' . $value] = magic_quote($_POST['deschar_' . $value]);


            $data['ten_' . $value] = magic_quote($_POST['ten_' . $value]);
			
   
			
			if($_POST['tenkhongdau_' . $value]=='') {
				$data['tenkhongdau_' . $value] = changeTitle($data['ten_' . $value]);
			}else{
				$data['tenkhongdau_' . $value]=changeTitle($_POST['tenkhongdau_' . $value]);
			}

            $data['thoigiandi_' . $value] = magic_quote($_POST['thoigiandi_' . $value]);

            $data['mota_' . $value] = magic_quote($_POST['mota_' . $value]);
            $data['noidung_' . $value] = magic_quote($_POST['noidung_' . $value]);
			$data['thongso_' . $value] = magic_quote($_POST['thongso_' . $value]);
			$data['huongdan_' . $value] = magic_quote($_POST['huongdan_' . $value]);
        }

		$data['loaisanpham'] = implode(',', $_POST['loaisanpham']);
        $data['com'] = $_REQUEST['typechild'];
        $data['stt'] = magic_quote($_POST['stt']);
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['is_index'] = isset($_POST['is_index']) ? 1 : 0;
        $data['ngaysua'] = time();

        $d->setTable('product');
        $d->setWhere('id', $id);
        if ($d->update($data)) {



            //Xử lý hình thêm 
            if (isset($_FILES['files'])) {
                $myFile = $_FILES['files'];
                $fileCount = count($myFile["name"]);
                $file_name = fns_Rand_digit(0, 9, 6);

                for ($i = 0; $i < $fileCount; $i++) {
                    if (move_uploaded_file($myFile["tmp_name"][$i], _upload_product . "/" . $file_name . "_" . $myFile["name"][$i])) {
                        $data1['stt'] = (int) $_POST['stthinh'][$i];
                        $data1['photo'] = $file_name . "_" . $myFile["name"][$i];
                        $data1['id_photo'] = $id;
                        $data1['hienthi'] = 1;
                        $data1['com'] = "hasp";
                        $d->setTable('hasp');
                        $d->insert($data1);
                    }
                }
            }



            if (isset($_POST['referer_link']))
                redirect($_POST['referer_link']);
            else
                redirect("index.php?com=product&act=man&typechild=$_GET[typechild]&curPage=" . @$_REQUEST['curPage'] . "");
        } else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man&typechild=$_GET[typechild]");
    }else {
        if ($photo = upload_image("file", _format_duoihinh, _upload_product, $file_name)) {

            //image_fix_orientation(_upload_product.$photo);

            $data['photo'] = $photo;

            $data['thumb'] = create_thumb($data['photo'], _product_thumb_w, _product_thumb_h, _upload_product, $file_name, 1);
        }


        $data['id_khuvuc'] = implode(',', $_POST['id_khuvuc']);
        $data['id_list'] = (int) $_POST['id_list'];
        $data['id_cat'] = (int) $_POST['id_cat'];
        $data['id_item'] = (int) $_POST['id_item'];
        $data['id_sub'] = (int) $_POST['id_sub'];



        $data['id_tinh'] = (int) $_POST['id_tinh'];
        $data['id_huyen'] = (int) $_POST['id_huyen'];
        $data['id_phuong'] = (int) $_POST['id_phuong'];
        $data['id_duong'] = (int) $_POST['id_duong'];  

		$data['dientich'] = magic_quote($_POST['dientich']); 
        $data['phong'] = magic_quote($_POST['phong']);   
        $data['lau'] = magic_quote($_POST['lau']);
		
		if($_POST['Latitude']!=0 and $_POST['Longitude']!=0){
			$toado=$_POST['Latitude'].','.$_POST['Longitude'];
			$data['toado'] = $toado;
		}else{
			$data['toado'] = magic_quote($_POST['toado']);
		}
		

        $data['masp'] =magic_quote($_POST['masp']);
        $data['chatlieu'] = $_POST['chatlieu'];
        $data['ri'] = $_POST['ri'];
        $data['size'] = $_POST['size'];
        $data['xuatxu'] = $_POST['xuatxu'];
        //Thông tin về giá
        $data['gia_usd'] = $_POST['gia_usd']; //Tổng giá    
        $data['gia_vnd'] = $_POST['gia_vnd']; //Tổng giá     
        $data['giakm'] = (int) $_POST['giakm'];
        $data['giamgia'] = (int) $_POST['giamgia'];

        $data['khoihanh'] = magic_quote($_POST["khoihanh"]);

        /*         * ******color_n***** */
        $countsl = $_POST['color'];
        $min = $countsl[0];
        for ($k = 0; $k < count($countsl); $k++) {
            if ($min > $countsl[$k]) {
                $min = $countsl[$k];
            }
            if ($countsl[$k] != NULL) {
                $data['color'] = implode('|', $_POST['color']);
            }
        }
        /*         * ******End_color_n***** */

        foreach ($config["lang"] as $key => $value) {

            $data['h1_' . $value] = magic_quote($_POST['h1_' . $value]);
            $data['h2_' . $value] = magic_quote($_POST['h2_' . $value]);
            $data['title_' . $value] = magic_quote($_POST['title_' . $value]);
            $data['alt_' . $value] = magic_quote($_POST['alt_' . $value]);
            $data['keyword_' . $value] = magic_quote($_POST['keyword_' . $value]);
            $data['description_' . $value] = magic_quote($_POST['description_' . $value]);
            $data['deschar_' . $value] = magic_quote($_POST['deschar_' . $value]);

            $data['ten_' . $value] = magic_quote($_POST['ten_' . $value]);
            $data['tenkhongdau_' . $value] = changeTitle($_POST['ten_' . $value]);

            $data['thoigiandi_' . $value] = magic_quote($_POST['thoigiandi_' . $value]);

            $data['mota_' . $value] = magic_quote($_POST['mota_' . $value]);
            $data['noidung_' . $value] = magic_quote($_POST['noidung_' . $value]);
        }


        /* -------------------------------------------------- */
		$data['loaisanpham'] = implode(',', $_POST['loaisanpham']);
        $data['com'] = $_REQUEST['typechild'];
        $data['stt'] = magic_quote($_POST['stt']);
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['is_index'] = isset($_POST['is_index']) ? 1 : 0;
        $data['ngaytao'] = time();
        $d->setTable('product');
        if ($d->insert($data)) {


            $idpro = mysql_insert_id();
            insert_tag($idpro, $_POST['tag']);


            //Xử lý hình trích đoạn
            if (isset($_FILES['files'])) {
                $myFile = $_FILES['files'];
                $fileCount = count($myFile["name"]);
                $file_name = fns_Rand_digit(0, 9, 6);

                for ($i = 0; $i < $fileCount; $i++) {
                    if (move_uploaded_file($myFile["tmp_name"][$i], _upload_product . "/" . $file_name . "_" . $myFile["name"][$i])) {
                        $data1['stt'] = (int) $_POST['stthinh'][$i];
                        $data1['photo'] = $file_name . "_" . $myFile["name"][$i];
                        $data1['id_photo'] = $idpro;
                        $data1['hienthi'] = 1;
                        $data1['com'] = 'hasp';
                        $d->setTable('hasp');
                        $d->insert($data1);
                    }
                }
            }


            redirect("index.php?com=product&act=man&typechild=$_GET[typechild]");
        } else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man&typechild=$_GET[typechild]");
    }
}

function delete_item() {
    global $d, $url_back;
    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_product where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product . $row['photo']);
                delete_file(_upload_product . $row['thumb']);
            }


            $d->reset();
            $sql = "select photo, thumb from #_hasp where id_photo='$id' and com='hasp'";
            $d->query($sql);
            $row_d = $d->result_array();
            if (!empty($row_d)) {
                foreach ($row_d as $row_d_item) {
                    delete_file(_upload_product . $row_d_item['photo']);
                    delete_file(_upload_product . $row_d_item['thumb']);
                }
                $sql = "delete from #_hasp where id_photo='$id' and com='hasp'";
                $d->query($sql);
            }
            $sql = "delete from #_product where id='" . $id . "'";
            $d->query($sql);
        }
        if ($d->query($sql))
            redirect($url_back);
        else
            transfer("Xóa dữ liệu bị lỗi", $url_back);
    }else if (isset($_GET['listid'])) {
        $listid = explode(",", $_GET['listid']);
        foreach ($listid as $listid_item) {
            $d->reset();
            $d->setTable('product');
            $d->setWhere('id', $listid_item);
            $d->select();
            if ($d->num_rows() == 0)
                transfer("Dữ liệu không có thực", $url_back);
            $row = $d->fetch_array();
            $id_d = $row['id'];
            delete_file(_upload_product . $row['photo']);
            delete_file(_upload_product . $row['thumb']);


            $d->reset();
            $sql = "select photo, thumb from #_hasp where id_photo='$id_d' and com='hasp'";
            $d->query($sql);
            $row_d = $d->result_array();
            if (!empty($row_d)) {
                foreach ($row_d as $row_d_item) {
                    delete_file(_upload_product . $row_d_item['photo']);
                    delete_file(_upload_product . $row_d_item['thumb']);
                }
                $sql = "delete from #_hasp where id_photo='$id_d' and com='hasp'";
                $d->query($sql);
            }
            $sql = "delete from #_product where id='" . $id_d . "'";
            $d->query($sql);
        }
        redirect($url_back);
    } else
        transfer("Không nhận được dữ liệu", $url_back);
}

/* ---------------END DANH SACH Main San Pham------------------ */


/* ---------------START DANH MUC CAP 4------------------ */

function get_subs() {
    global $d, $items, $paging, $url_back, $url_link, $totalRows, $pageSize, $offset;



    if (!empty($_POST)) {
        $multi = $_REQUEST['multi'];
        $id_array = $_POST['chonxoa'];

        $count = count($id_array);
        if ($multi == 'show') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "UPDATE table_product_sub SET hienthi =1 WHERE  id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }


        if ($multi == 'hide') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "UPDATE table_product_sub SET hienthi =0 WHERE  id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }

        if ($multi == 'del') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "SELECT * FROM table_product_sub where id='" . $id_array[$i] . "'";
                $d->query($sql);
                //$cats= $d->fetch_array();

                if ($d->num_rows() > 0) {
                    while ($row = $d->fetch_array()) {
                        delete_file(_upload_product_sub . $row['photo']);
                        delete_file(_upload_product_sub . $row['thumb']);
                    }
                }




                $sql = "delete from table_product_sub where id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }
    }


    #----------------------------------------------------------------------------------------
    if ($_REQUEST['hienthi'] != '') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_sub where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_sub SET hienthi =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product_sub SET hienthi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }


    if (@$_REQUEST['typeparent'] != '') {
        $typeparent = addslashes($_REQUEST['typeparent']);
        $where.=" and com='$typeparent'";
    } else {
        $where.=" and com";
    }


    if ((int) $_REQUEST['id_list'] != '') {
        $where.=" and	id_list=" . $_REQUEST['id_list'] . "";
    }
    if ((int) $_REQUEST['id_cat'] != '') {
        $where.=" and	id_cat=" . $_REQUEST['id_cat'] . "";
    }
    if ((int) $_REQUEST['id_item'] != '') {
        $where.=" and	id_item=" . $_REQUEST['id_item'] . "";
    }


    if ($_REQUEST['keyword'] != '') {
        $keyword = addslashes($_REQUEST['keyword']);
        $where.=" and ten_vi LIKE '%$keyword%' or ten_en LIKE '%$keyword%' or ten_cn LIKE '%$keyword%' or ten_ge LIKE '%$keyword%' ";
    }



    $sql = "SELECT count(id) AS numrows FROM #_product_sub where id  $where ";
    $d->query($sql);
    $dem = $d->fetch_array();
    $totalRows = $dem['numrows'];
    $page = $_GET['p'];

    $pageSize = 20;
    $offset = 5;

    if ($page == "")
        $page = 1;
    else
        $page = $_GET['p'];
    $page--;
    $bg = $pageSize * $page;

    $sql = "select * from #_product_sub where id $where order by stt,id desc limit $bg,$pageSize";
    $d->query($sql);
    $items = $d->result_array();
    $url_link = "index.php?com=product&act=man_sub&typeparent=$_GET[typeparent]" . $urldanhmuc;
}

function get_sub() {
    global $d, $item, $url_back;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", $url_back);

    $sql = "select * from #_product_sub where id='" . $id . "' and com='$_REQUEST[typeparent]' ";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", $url_back);
    $item = $d->fetch_array();
}

function save_sub() {
    global $d, $url_back, $config;

    $file_name = changeTitle($_POST['ten_vi']) . fns_Rand_digit(0, 3, 5);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_sub&typeparent=$_GET[typeparent]");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {


        if ($photo = upload_image("file", _format_duoihinh, _upload_product_sub, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _product_sub_thumb_w, _product_sub_thumb_h, _upload_product_sub, $file_name, 1);
            $d->setTable('product');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product_sub . $row['photo']);
                delete_file(_upload_product_sub . $row['thumb']);
            }
        }

        if ($_REQUEST["delete_img_present"] == "delete_img") {

            $id = themdau($_GET['id']);
            $delete_img_present = $_REQUEST['delete_img_present'];



            if ($delete_img_present == 'delete_img') {

                if (isset($_GET['id'])) {

                    $d->reset();
                    $sql = "select id,thumb, photo from #_product_sub where id='" . $id . "'";
                    $d->query($sql);
                    if ($d->num_rows() > 0) {
                        while ($row = $d->fetch_array()) {
                            delete_file(_upload_product_sub . $row['photo']);
                            delete_file(_upload_product_sub . $row['thumb']);
                        }
                        $sql = "UPDATE #_product_sub SET photo ='',thumb='' WHERE  id = '" . $id . "'";
                        $d->query($sql);
                    }
                    if ($d->query($sql))
                        redirect($url_back);
                    else
                        transfer("Xóa dữ liệu bị lỗi", $url_back);
                } else
                    transfer("Không nhận được dữ liệu", $url_back);
            }
        }

        $data['id_list'] = $_POST['id_list'];
        $data['id_cat'] = $_POST['id_cat'];
        $data['id_item'] = $_POST['id_item'];
        $data['com'] = $_REQUEST['typeparent'];


        foreach ($config["lang"] as $key => $value) {


            $data['h1_' . $value] = magic_quote($_POST['h1_' . $value]);
            $data['h2_' . $value] = magic_quote($_POST['h2_' . $value]);
            $data['title_' . $value] = magic_quote($_POST['title_' . $value]);
            $data['alt_' . $value] = magic_quote($_POST['alt_' . $value]);
            $data['keyword_' . $value] = magic_quote($_POST['keyword_' . $value]);
            $data['description_' . $value] = magic_quote($_POST['description_' . $value]);
            $data['deschar_' . $value] = magic_quote($_POST['deschar_' . $value]);


            $data['ten_' . $value] = magic_quote($_POST['ten_' . $value]);
            if($_POST['tenkhongdau_' . $value]=='') {
				$data['tenkhongdau_' . $value] = changeTitle($data['ten_' . $value]);
			}else{
				$data['tenkhongdau_' . $value]=changeTitle($_POST['tenkhongdau_' . $value]);
			}

            $data['mota_' . $value] = magic_quote($_POST['mota_' . $value]);
            $data['noidung_' . $value] = magic_quote($_POST['noidung_' . $value]);
        }


        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['is_index'] = isset($_POST['is_index']) ? 1 : 0;
        $data['ngaysua'] = time();

        $d->setTable('product_sub');
        $d->setWhere('id', $id);
        if ($d->update($data)) {
            redirect("index.php?com=product&act=man_sub&typeparent=$_GET[typeparent]&curPage=" . $_REQUEST['curPage'] . "");
        } else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_sub&typeparent=$_GET[typeparent]");
    }else {


        if ($photo = upload_image("file", _format_duoihinh, _upload_product_sub, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _product_sub_thumb_w, _product_sub_thumb_h, _upload_product_sub, $file_name, 1);
        }


        $data['id_list'] = $_POST['id_list'];
        $data['id_cat'] = $_POST['id_cat'];
        $data['id_item'] = $_POST['id_item'];
        $data['com'] = $_REQUEST['typeparent'];

        foreach ($config["lang"] as $key => $value) {

            $data['h1_' . $value] = magic_quote($_POST['h1_' . $value]);
            $data['h2_' . $value] = magic_quote($_POST['h2_' . $value]);
            $data['title_' . $value] = magic_quote($_POST['title_' . $value]);
            $data['alt_' . $value] = magic_quote($_POST['alt_' . $value]);
            $data['keyword_' . $value] = magic_quote($_POST['keyword_' . $value]);
            $data['description_' . $value] = magic_quote($_POST['description_' . $value]);
            $data['deschar_' . $value] = magic_quote($_POST['deschar_' . $value]);

            $data['ten_' . $value] = magic_quote($_POST['ten_' . $value]);
            $data['tenkhongdau_' . $value] = changeTitle($_POST['ten_' . $value]);
            $data['mota_' . $value] = magic_quote($_POST['mota_' . $value]);
            $data['noidung_' . $value] = magic_quote($_POST['noidung_' . $value]);
        }




        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['is_index'] = isset($_POST['is_index']) ? 1 : 0;
        $data['ngaytao'] = time();

        $d->setTable('product_sub');
        if ($d->insert($data))
            redirect("index.php?com=product&act=man_sub&typeparent=$_GET[typeparent]");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_sub&typeparent=$_GET[typeparent]");
    }
}

function delete_sub() {
    global $d, $url_back;



    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_product_sub where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product_sub . $row['photo']);
                delete_file(_upload_product_sub . $row['thumb']);
            }
        }
        $d->reset();
        $sql = "delete from #_product_sub where id='" . $id . "'";
        $d->query($sql);
        if ($d->query($sql))
            redirect($url_back);
        else
            transfer("Xóa dữ liệu bị lỗi", $url_back);
    }else if (isset($_GET['listid'])) {
        $listid = explode(",", $_GET['listid']);
        foreach ($listid as $listid_item) {
            $d->reset();
            $d->setTable('product_sub');
            $d->setWhere('id', $listid_item);
            $d->select();
            if ($d->num_rows() == 0)
                transfer("Dữ liệu không có thực", $url_back);
            $row = $d->fetch_array();
            delete_file(_upload_product_sub . $row['photo']);
            delete_file(_upload_product_sub . $row['thumb']);
            $d->delete();
        }
        redirect($url_back);
    } else
        transfer("Không nhận được dữ liệu", $url_back);
}

function delete_imgsub() {
    global $d, $url_back;
    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_product_sub where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product_sub . $row['photo']);
                delete_file(_upload_product_sub . $row['thumb']);
            }
            $sql = "UPDATE #_product_sub SET photo ='',thumb='' WHERE  id = '" . $id . "'";
            $d->query($sql);
        }
        if ($d->query($sql))
            redirect("index.php?com=product&act=edit_sub&id=" . $id);
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=edit_sub&id=" . $id);
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=edit_sub&id=" . $id);
}

#==================================== Start Danh Muc Cap 2   ===============================

function get_cats() {
    global $d, $items, $paging, $url_back, $url_link, $totalRows, $pageSize, $offset;


    if (!empty($_POST)) {
        $multi = $_REQUEST['multi'];
        $id_array = $_POST['chonxoa'];

        $count = count($id_array);
        if ($multi == 'show') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "UPDATE table_product_cat SET hienthi =1 WHERE  id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }


        if ($multi == 'hide') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "UPDATE table_product_cat SET hienthi =0 WHERE  id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }

        if ($multi == 'del') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "SELECT * FROM table_product_cat where id='" . $id_array[$i] . "'";
                $d->query($sql);
                //$cats= $d->fetch_array();

                if ($d->num_rows() > 0) {
                    while ($row = $d->fetch_array()) {

                        delete_file(_upload_product_cat . $row['photo']);
                        delete_file(_upload_product_cat . $row['thumb']);
                    }
                }

                $sql = "delete from table_product_cat where id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }
    }



    #----------------------------------------------------------------------------------------
    if (@$_REQUEST['hienthi'] != '') {
        $id_up = @$_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_cat where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }
	
	   if (@$_REQUEST['noibat'] != '') {
        $id_up = @$_REQUEST['noibat'];
        $sql_sp = "SELECT id,noibat FROM table_product_cat where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['noibat'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_cat SET noibat =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product_cat SET noibat =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }
    #-------------------------------------------------------------------------------


    if (@$_REQUEST['typeparent'] != '') {
        $typeparent = addslashes($_REQUEST['typeparent']);
        $where.=" and com='$typeparent'";
    } else {
        $where.=" and com";
    }


    if ($_REQUEST['keyword'] != '') {
        $keyword = addslashes($_REQUEST['keyword']);
        $where.=" and ten_vi LIKE '%$keyword%' or ten_en LIKE '%$keyword%' or ten_cn LIKE '%$keyword%' or ten_ge LIKE '%$keyword%' ";
    }


    if ((int) @$_REQUEST['id_list'] != '') {
        $where.=" and id_list=" . $_REQUEST['id_list'] . "";
    }


    $sql = "SELECT count(id) AS numrows FROM #_product_cat where id  $where ";
    $d->query($sql);
    $dem = $d->fetch_array();
    $totalRows = $dem['numrows'];
    $page = $_GET['p'];

    $pageSize = 20;
    $offset = 5;

    if ($page == "")
        $page = 1;
    else
        $page = $_GET['p'];
    $page--;
    $bg = $pageSize * $page;

    $sql = "select * from #_product_cat where id $where order by stt,id desc limit $bg,$pageSize";
    $d->query($sql);
    $items = $d->result_array();
    $url_link = "index.php?com=product&act=man_cat" . $urldanhmuc;




    #-------------------------------------------------------------------------------
}

function get_cat() {
    global $d, $item, $url_back;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", $url_back);

    $sql = "select * from #_product_cat where id='" . $id . "' and com='$_GET[typeparent]'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", $url_back);
    $item = $d->fetch_array();
}

function save_cat() {
    global $d, $url_back, $config;

    $file_name = changeTitle($_POST['ten_vi']) . fns_Rand_digit(0, 3, 5);

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat&typeparent=$_GET[typeparent]");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";


    if ($id) {
        if ($photo = upload_image("file", _format_duoihinh, _upload_product_cat, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _product_cat_thumb_w, _product_cat_thumb_h, _upload_product_cat, $file_name, 1);
            $d->setTable('product');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product_cat . $row['photo']);
                delete_file(_upload_product_cat . $row['thumb']);
            }
        }


        $data['id_list'] = $_POST['id_list'];
        $data['com'] = $_GET['typeparent'];

        foreach ($config["lang"] as $key => $value) {


            $data['h1_' . $value] = magic_quote($_POST['h1_' . $value]);
            $data['h2_' . $value] = magic_quote($_POST['h2_' . $value]);
            $data['title_' . $value] = magic_quote($_POST['title_' . $value]);
            $data['alt_' . $value] = magic_quote($_POST['alt_' . $value]);
            $data['keyword_' . $value] = magic_quote($_POST['keyword_' . $value]);
            $data['description_' . $value] = magic_quote($_POST['description_' . $value]);
            $data['deschar_' . $value] = magic_quote($_POST['deschar_' . $value]);


            $data['ten_' . $value] = magic_quote($_POST['ten_' . $value]);
            if($_POST['tenkhongdau_' . $value]=='') {
				$data['tenkhongdau_' . $value] = changeTitle($data['ten_' . $value]);
			}else{
				$data['tenkhongdau_' . $value]=changeTitle($_POST['tenkhongdau_' . $value]);
			}

            $data['mota_' . $value] = magic_quote($_POST['mota_' . $value]);
            $data['noidung_' . $value] = magic_quote($_POST['noidung_' . $value]);
        }



        if ($_REQUEST["delete_img_present"] == "delete_img") {

            $id = themdau($_GET['id']);
            $delete_img_present = $_REQUEST['delete_img_present'];



            if ($delete_img_present == 'delete_img') {

                if (isset($_GET['id'])) {

                    $d->reset();
                    $sql = "select id,thumb, photo from #_product_cat where id='" . $id . "'";
                    $d->query($sql);
                    if ($d->num_rows() > 0) {
                        while ($row = $d->fetch_array()) {
                            delete_file(_upload_product_cat . $row['photo']);
                            delete_file(_upload_product_cat . $row['thumb']);
                        }
                        $sql = "UPDATE #_product_cat SET photo ='',thumb='' WHERE  id = '" . $id . "'";
                        $d->query($sql);
                    }
                    if ($d->query($sql))
                        redirect($url_back);
                    else
                        transfer("Xóa dữ liệu bị lỗi", $url_back);
                } else
                    transfer("Không nhận được dữ liệu", $url_back);
            }
        }



        /* -------------------------------------------------- */
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['is_index'] = isset($_POST['is_index']) ? 1 : 0;
        $data['ngaysua'] = time();

        $d->setTable('product_cat');
        $d->setWhere('id', $id);
        if ($d->update($data)) {
            if (isset($_POST['referer_link']))
                redirect($_POST['referer_link']);
            else
                redirect("index.php?com=product&act=man_cat&typeparent=$_GET[typeparent]&curPage=" . $_REQUEST['curPage'] . "");
        } else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat&typeparent=$_GET[typeparent]");
    }else {

        if ($photo = upload_image("file", _format_duoihinh, _upload_product_cat, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _product_cat_thumb_w, _product_cat_thumb_h, _upload_product_cat, $file_name, 1);
        }


        $data['id_list'] = $_POST['id_list'];
        $data['com'] = $_GET['typeparent'];


        foreach ($config["lang"] as $key => $value) {

            $data['h1_' . $value] = magic_quote($_POST['h1_' . $value]);
            $data['h2_' . $value] = magic_quote($_POST['h2_' . $value]);
            $data['title_' . $value] = magic_quote($_POST['title_' . $value]);
            $data['alt_' . $value] = magic_quote($_POST['alt_' . $value]);
            $data['keyword_' . $value] = magic_quote($_POST['keyword_' . $value]);
            $data['description_' . $value] = magic_quote($_POST['description_' . $value]);
            $data['deschar_' . $value] = magic_quote($_POST['deschar_' . $value]);

            $data['ten_' . $value] = magic_quote($_POST['ten_' . $value]);
            $data['tenkhongdau_' . $value] = changeTitle($_POST['ten_' . $value]);
            $data['mota_' . $value] = magic_quote($_POST['mota_' . $value]);
            $data['noidung_' . $value] = magic_quote($_POST['noidung_' . $value]);
        }


        /* -------------------------------------------------- */
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['is_index'] = isset($_POST['is_index']) ? 1 : 0;
        $data['ngaytao'] = time();

        $d->setTable('product_cat');
        if ($d->insert($data))
            redirect("index.php?com=product&act=man_cat&typeparent=$_GET[typeparent]");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat&typeparent=$_GET[typeparent]");
    }
}

function delete_cat() {
    global $d, $url_back;
    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_product_cat where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product_cat . $row['photo']);
                delete_file(_upload_product_cat . $row['thumb']);
            }
        }
        $d->reset();
        $sql = "delete from #_product_cat where id='" . $id . "'";
        $d->query($sql);
        if ($d->query($sql))
            redirect($url_back);
        else
            transfer("Xóa dữ liệu bị lỗi", $url_back);
    }else if (isset($_GET['listid'])) {
        $listid = explode(",", $_GET['listid']);
        foreach ($listid as $listid_item) {
            $d->reset();
            $d->setTable('product_cat');
            $d->setWhere('id', $listid_item);
            $d->select();
            if ($d->num_rows() == 0)
                transfer("Dữ liệu không có thực", $url_back);
            $row = $d->fetch_array();
            delete_file(_upload_product_cat . $row['photo']);
            delete_file(_upload_product_cat . $row['thumb']);
            $d->delete();
        }
        redirect($url_back);
    } else
        transfer("Không nhận được dữ liệu", $url_back);
}

function delete_imgcat() {
    global $d, $url_back;
    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_product_cat where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product_cat . $row['photo']);
                delete_file(_upload_product_cat . $row['thumb']);
            }
            $sql = "UPDATE #_product_cat SET photo ='',thumb='' WHERE  id = '" . $id . "'";
            $d->query($sql);
        }
        if ($d->query($sql))
            redirect("index.php?com=product&act=edit_cat&id=" . $id);
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=edit_cat&id=" . $id);
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=edit_cat&id=" . $id);
}

/* ---------------END DANH MUC CAP 2------------------ */

/* ---------------Start DANH MUC CAP 3------------------ */

function get_loais() {
    global $d, $items, $paging, $url_back, $url_link, $totalRows, $pageSize, $offset;

    if (!empty($_POST)) {
        $multi = $_REQUEST['multi'];
        $id_array = $_POST['chonxoa'];

        $count = count($id_array);
        if ($multi == 'show') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "UPDATE table_product_item SET hienthi =1 WHERE  id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }


        if ($multi == 'hide') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "UPDATE table_product_item SET hienthi =0 WHERE  id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }

        if ($multi == 'del') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "SELECT * FROM table_product_item where id='" . $id_array[$i] . "'";
                $d->query($sql);
                //$cats= $d->fetch_array();

                if ($d->num_rows() > 0) {
                    while ($row = $d->fetch_array()) {

                        delete_file(_upload_product_item . $row['photo']);
                        delete_file(_upload_product_item . $row['thumb']);
                    }
                }

                $sql = "delete from table_product_item where id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect($url_back);
        }
    }


    #----------------------------------------------------------------------------------------
    if ($_REQUEST['hienthi'] != '') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_item where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }



    if (@$_REQUEST['typeparent'] != '') {
        $typeparent = addslashes($_REQUEST['typeparent']);
        $where.=" and com='$typeparent'";
    } else {
        $where.=" and com";
    }


    if ($_REQUEST['keyword'] != '') {
        $keyword = addslashes($_REQUEST['keyword']);
        $where.=" and ten_vi LIKE '%$keyword%' or ten_en LIKE '%$keyword%' or ten_cn LIKE '%$keyword%' or ten_ge LIKE '%$keyword%' ";
    }


    if ((int) $_REQUEST['id_list'] != '') {
        $where.=" and	id_list=" . $_REQUEST['id_list'] . "";
    }
    if ((int) $_REQUEST['id_cat'] != '') {
        $where.=" and	id_cat=" . $_REQUEST['id_cat'] . "";
    }


    $sql = "SELECT count(id) AS numrows FROM #_product_item where id  $where ";
    $d->query($sql);
    $dem = $d->fetch_array();
    $totalRows = $dem['numrows'];
    $page = $_GET['p'];

    $pageSize = 20;
    $offset = 5;

    if ($page == "")
        $page = 1;
    else
        $page = $_GET['p'];
    $page--;
    $bg = $pageSize * $page;

    $sql = "select * from #_product_item where id $where order by stt,id desc limit $bg,$pageSize";
    $d->query($sql);
    $items = $d->result_array();
    $url_link = "index.php?com=product&act=man_item&typeparent=$_GET[typeparent]" . $urldanhmuc;
}

function get_loai() {
    global $d, $item, $url_back;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", $url_back);

    $sql = "select * from #_product_item where id='" . $id . "' and com='$_REQUEST[typeparent]' ";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", $url_back);
    $item = $d->fetch_array();
}

function save_loai() {
    global $d, $url_back, $config;

    $file_name = changeTitle($_POST['ten_vi']) . fns_Rand_digit(0, 3, 5);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item&typeparent=$_GET[typeparent]");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {



        if ($photo = upload_image("file", _format_duoihinh, _upload_product_item, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _product_item_thumb_w, _product_item_thumb_h, _upload_product_item, $file_name, 1);
            $d->setTable('product');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product_item . $row['photo']);
                delete_file(_upload_product_item . $row['thumb']);
            }
        }




        $data['id_list'] = (int) $_POST['id_list'];
        $data['id_cat'] = (int) $_POST['id_cat'];
        $data['com'] = $_REQUEST['typeparent'];


        foreach ($config["lang"] as $key => $value) {


            $data['h1_' . $value] = magic_quote($_POST['h1_' . $value]);
            $data['h2_' . $value] = magic_quote($_POST['h2_' . $value]);
            $data['title_' . $value] = magic_quote($_POST['title_' . $value]);
            $data['alt_' . $value] = magic_quote($_POST['alt_' . $value]);
            $data['keyword_' . $value] = magic_quote($_POST['keyword_' . $value]);
            $data['description_' . $value] = magic_quote($_POST['description_' . $value]);
            $data['deschar_' . $value] = magic_quote($_POST['deschar_' . $value]);


            $data['ten_' . $value] = magic_quote($_POST['ten_' . $value]);
            if($_POST['tenkhongdau_' . $value]=='') {
				$data['tenkhongdau_' . $value] = changeTitle($data['ten_' . $value]);
			}else{
				$data['tenkhongdau_' . $value]=changeTitle($_POST['tenkhongdau_' . $value]);
			}

            $data['mota_' . $value] = magic_quote($_POST['mota_' . $value]);
            $data['noidung_' . $value] = magic_quote($_POST['noidung_' . $value]);
        }



        if ($_REQUEST["delete_img_present"] == "delete_img") {

            $id = themdau($_GET['id']);
            $delete_img_present = $_REQUEST['delete_img_present'];


            if ($delete_img_present == 'delete_img') {

                if (isset($_GET['id'])) {

                    $d->reset();
                    $sql = "select id,thumb, photo from #_product_item where id='" . $id . "'";
                    $d->query($sql);
                    if ($d->num_rows() > 0) {
                        while ($row = $d->fetch_array()) {
                            delete_file(_upload_product_item . $row['photo']);
                            delete_file(_upload_product_item . $row['thumb']);
                        }
                        $sql = "UPDATE #_product_item SET photo ='',thumb='' WHERE  id = '" . $id . "'";
                        $d->query($sql);
                    }
                    if ($d->query($sql))
                        redirect($url_back);
                    else
                        transfer("Xóa dữ liệu bị lỗi", $url_back);
                } else
                    transfer("Không nhận được dữ liệu", $url_back);
            }
        }



        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['is_index'] = isset($_POST['is_index']) ? 1 : 0;
        $data['ngaysua'] = time();

        $d->setTable('product_item');
        $d->setWhere('id', $id);
        if ($d->update($data)) {
            redirect("index.php?com=product&act=man_item&typeparent=$_GET[typeparent]&curPage=" . $_REQUEST['curPage'] . "");
        } else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_item&typeparent=$_GET[typeparent]");
    }else {

        if ($photo = upload_image("file", _format_duoihinh, _upload_product_item, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _product_item_thumb_w, _product_item_thumb_h, _upload_product_item, $file_name, 1);
        }



        $data['id_list'] = (int) $_POST['id_list'];
        $data['id_cat'] = (int) $_POST['id_cat'];
        $data['com'] = $_REQUEST['typeparent'];


        foreach ($config["lang"] as $key => $value) {

            $data['h1_' . $value] = magic_quote($_POST['h1_' . $value]);
            $data['h2_' . $value] = magic_quote($_POST['h2_' . $value]);
            $data['title_' . $value] = magic_quote($_POST['title_' . $value]);
            $data['alt_' . $value] = magic_quote($_POST['alt_' . $value]);
            $data['keyword_' . $value] = magic_quote($_POST['keyword_' . $value]);
            $data['description_' . $value] = magic_quote($_POST['description_' . $value]);
            $data['deschar_' . $value] = magic_quote($_POST['deschar_' . $value]);

            $data['ten_' . $value] = magic_quote($_POST['ten_' . $value]);
            $data['tenkhongdau_' . $value] = changeTitle($_POST['ten_' . $value]);
            $data['mota_' . $value] = magic_quote($_POST['mota_' . $value]);
            $data['noidung_' . $value] = magic_quote($_POST['noidung_' . $value]);
        }



        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['is_index'] = isset($_POST['is_index']) ? 1 : 0;
        $data['ngaytao'] = time();

        $d->setTable('product_item');
        if ($d->insert($data))
            redirect("index.php?com=product&act=man_item&typeparent=$_GET[typeparent]");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_item&typeparent=$_GET[typeparent]");
    }
}

function delete_loai() {
    global $d, $url_back;
    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_product_item where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product_item . $row['photo']);
                delete_file(_upload_product_item . $row['thumb']);
            }
        }
        $d->reset();
        $sql = "delete from #_product_item where id='" . $id . "'";
        $d->query($sql);
        if ($d->query($sql))
            redirect($url_back);
        else
            transfer("Xóa dữ liệu bị lỗi", $url_back);
    }else if (isset($_GET['listid'])) {
        $listid = explode(",", $_GET['listid']);
        foreach ($listid as $listid_item) {
            $d->reset();
            $d->setTable('product_item');
            $d->setWhere('id', $listid_item);
            $d->select();
            if ($d->num_rows() == 0)
                transfer("Dữ liệu không có thực", $url_back);
            $row = $d->fetch_array();
            delete_file(_upload_product_item . $row['photo']);
            delete_file(_upload_product_item . $row['thumb']);
            $d->delete();
        }
        redirect($url_back);
    } else
        transfer("Không nhận được dữ liệu", $url_back);
}

function delete_imgloai() {
    global $d, $url_back;
    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_product_item where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product_item . $row['photo']);
                delete_file(_upload_product_item . $row['thumb']);
            }
            $sql = "UPDATE #_product_item SET photo ='',thumb='' WHERE  id = '" . $id . "'";
            $d->query($sql);
        }
        if ($d->query($sql))
            redirect("index.php?com=product&act=edit_item&id=" . $id);
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=edit_item&id=" . $id);
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=edit_item&id=" . $id);
}

/* ---------------End DANH MUC CAP 3------------------ */


/* ---------------START DANH MUC CAP 1------------------ */

function get_lists() {
    global $d, $items, $paging, $url_back, $url_link, $totalRows, $pageSize, $offset;



    if (!empty($_POST)) {
        $multi = $_REQUEST['multi'];
        $id_array = $_POST['chonxoa'];



        $count = count($id_array);
        if ($multi == 'show') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "UPDATE table_product_list SET hienthi =1 WHERE  id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect("index.php?com=product&act=man_list&typeparent=$_GET[typeparent]");
        }


        if ($multi == 'hide') {
            for ($i = 0; $i < $count; $i++) {

                $sql = "UPDATE table_product_list SET hienthi =0 WHERE  id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect("index.php?com=product&act=man_list&typeparent=$_GET[typeparent]");
        }

        if ($multi == 'del') {
            for ($i = 0; $i < $count; $i++) {
                $sql = "SELECT * FROM table_product_list where id='" . $id_array[$i] . "'";
                $d->query($sql);
                //$cats= $d->fetch_array();

                if ($d->num_rows() > 0) {
                    while ($row = $d->fetch_array()) {

                        delete_file(_upload_product_list . $row['photo']);
                        delete_file(_upload_product_list . $row['thumb']);
                    }
                }


                $sql = "delete from table_product_list where id = " . $id_array[$i] . "";
                mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
            }
            redirect("index.php?com=product&act=man_list&typeparent=$_GET[typeparent]");
        }
    }



    #----------------------------------------------------------------------------------------

    if (@$_REQUEST['hienthi'] != '') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_list where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }


    #----------------------------------------------------------------------------------------

    if (@$_REQUEST['hienthitc'] != '') {
        $id_up = $_REQUEST['hienthitc'];
        $sql_sp = "SELECT id,hienthitc FROM table_product_list where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $time = time();
        $hienthi = $cats[0]['hienthitc'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthitc ='$time' WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthitc =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }
	 if (@$_REQUEST['noibat'] != '') {
        $id_up = $_REQUEST['noibat'];
        $sql_sp = "SELECT id,noibat FROM table_product_list where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $time = time();
        $hienthi = $cats[0]['noibat'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_list SET noibat ='$time' WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product_list SET noibat =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
        redirect($url_back);
    }
    #-------------------------------------------------------------------------------



    if (@$_REQUEST['typeparent'] != '') {
        $typeparent = addslashes($_REQUEST['typeparent']);
        $where.=" and com='$typeparent'";
    } else {
        $where.=" and com";
    }


    if ($_REQUEST['keyword'] != '') {
        $keyword = addslashes($_REQUEST['keyword']);
        $where.=" and ten_vi LIKE '%$keyword%' or ten_en LIKE '%$keyword%' or ten_cn LIKE '%$keyword%' or ten_ge LIKE '%$keyword%' ";
    }



    $sql = "SELECT count(id) AS numrows FROM #_product_list where id  $where ";
    $d->query($sql);
    $dem = $d->fetch_array();
    $totalRows = $dem['numrows'];
    $page = $_GET['p'];

    $pageSize = 20;
    $offset = 5;

    if ($page == "")
        $page = 1;
    else
        $page = $_GET['p'];
    $page--;
    $bg = $pageSize * $page;

    $sql = "select * from #_product_list where id $where order by stt,id desc limit $bg,$pageSize";
    $d->query($sql);
    $items = $d->result_array();
    $url_link = "index.php?com=product&act=man_list&typeparent=$_GET[typeparent]" . $urldanhmuc;
}

function get_list() {
    global $d, $item, $url_back;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", $url_back);
    $sql = "select * from #_product_list where id='" . $id . "' and com='$_GET[typeparent]'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", $url_back);
    $item = $d->fetch_array();
}

function save_list() {

    global $d, $url_back, $config, $add_field;

    $file_name = changeTitle($_POST['ten_vi']) . fns_Rand_digit(0, 3, 5);
	$file_name2 = changeTitle($_POST['ten_vi']) . fns_Rand_digit(0, 3, 5);

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&typeparent=$_GET[typeparent]");

    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {


        if ($photo = upload_image("file", _format_duoihinh, _upload_product_list, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _product_list_thumb_w, _product_list_thumb_h, _upload_product_list, $file_name, 1);
            $d->setTable('product');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product_list . $row['photo']);
                delete_file(_upload_product_list . $row['thumb']);
            }
        }
		if ($photo2 = upload_image("background", _format_duoihinh, _upload_product_list, $file_name2)) {
            $data['background'] = $photo2;
            $d->setTable('product');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product_list . $row['background']);
             
            }
        }



        foreach ($config["lang"] as $key => $value) {


            $data['h1_' . $value] = magic_quote($_POST['h1_' . $value]);
            $data['h2_' . $value] = magic_quote($_POST['h2_' . $value]);
            $data['title_' . $value] = magic_quote($_POST['title_' . $value]);
            $data['alt_' . $value] = magic_quote($_POST['alt_' . $value]);
            $data['keyword_' . $value] = magic_quote($_POST['keyword_' . $value]);
            $data['description_' . $value] = magic_quote($_POST['description_' . $value]);
            $data['deschar_' . $value] = magic_quote($_POST['deschar_' . $value]);


            $data['ten_' . $value] = magic_quote($_POST['ten_' . $value]);
            if($_POST['tenkhongdau_' . $value]=='') {
				$data['tenkhongdau_' . $value] = changeTitle($data['ten_' . $value]);
			}else{
				$data['tenkhongdau_' . $value]=changeTitle($_POST['tenkhongdau_' . $value]);
			}

            $data['mota_' . $value] = magic_quote($_POST['mota_' . $value]);
            $data['noidung_' . $value] = magic_quote($_POST['noidung_' . $value]);
        }



        if ($_REQUEST["delete_img_present"] == "delete_img") {

            $id = themdau($_GET['id']);
            $delete_img_present = $_REQUEST['delete_img_present'];



            if ($delete_img_present == 'delete_img') {

                if (isset($_GET['id'])) {

                    $d->reset();
                    $sql = "select id,thumb, photo from #_product_list where id='" . $id . "'";
                    $d->query($sql);
                    if ($d->num_rows() > 0) {
                        while ($row = $d->fetch_array()) {
                            delete_file(_upload_product_list . $row['photo']);
                            delete_file(_upload_product_list . $row['thumb']);
                        }
                        $sql = "UPDATE #_product_list SET photo ='',thumb='' WHERE  id = '" . $id . "'";
                        $d->query($sql);
                    }
                    if ($d->query($sql))
                        redirect($url_back);
                    else
                        transfer("Xóa dữ liệu bị lỗi", $url_back);
                } else
                    transfer("Không nhận được dữ liệu", $url_back);
            }
			if ($delete_img_present == 'delete_img2') {

                if (isset($_GET['id'])) {

                    $d->reset();
                    $sql = "select id,background from #_product_list where id='" . $id . "'";
                    $d->query($sql);
                    if ($d->num_rows() > 0) {
                        while ($row = $d->fetch_array()) {
                            delete_file(_upload_product_list . $row['background']);
                       
                        }
                        $sql = "UPDATE #_product_list SET background ='' WHERE  id = '" . $id . "'";
                        $d->query($sql);
                    }
                    if ($d->query($sql))
                        redirect($url_back);
                    else
                        transfer("Xóa dữ liệu bị lỗi", $url_back);
                } else
                    transfer("Không nhận được dữ liệu", $url_back);
            }
        }




        /* -------------------------------------------------- */
        $data['com'] = $_GET['typeparent'];
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['is_index'] = isset($_POST['is_index']) ? 1 : 0;
        $data['ngaysua'] = time();

        $d->setTable('product_list');
        $d->setWhere('id', $id);
        if ($d->update($data)) {
            if (isset($_POST['referer_link']))
                redirect($_POST['referer_link']);
            else
                redirect("index.php?com=product&act=man_list&typeparent=$_GET[typeparent]&curPage=" . $_REQUEST['curPage'] . "");
        } else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_list&typeparent=$_GET[typeparent]");
    }else {
        if ($photo = upload_image("file", _format_duoihinh, _upload_product_list, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], _product_list_thumb_w, _product_list_thumb_h, _upload_product_list, $file_name, 1);
        }
		if ($photo2 = upload_image("background", _format_duoihinh, _upload_product_list, $file_name2)) {
            $data['background'] = $photo2;
           
        }



        foreach ($config["lang"] as $key => $value) {

            $data['h1_' . $value] = magic_quote($_POST['h1_' . $value]);
            $data['h2_' . $value] = magic_quote($_POST['h2_' . $value]);
            $data['title_' . $value] = magic_quote($_POST['title_' . $value]);
            $data['alt_' . $value] = magic_quote($_POST['alt_' . $value]);
            $data['keyword_' . $value] = magic_quote($_POST['keyword_' . $value]);
            $data['description_' . $value] = magic_quote($_POST['description_' . $value]);
            $data['deschar_' . $value] = magic_quote($_POST['deschar_' . $value]);

            $data['ten_' . $value] = magic_quote($_POST['ten_' . $value]);
            $data['tenkhongdau_' . $value] = changeTitle($_POST['ten_' . $value]);
            $data['mota_' . $value] = magic_quote($_POST['mota_' . $value]);
            $data['noidung_' . $value] = magic_quote($_POST['noidung_' . $value]);
        }



        /* -------------------------------------------------- */
        $data['com'] = $_GET['typeparent'];
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['is_index'] = isset($_POST['is_index']) ? 1 : 0;
        $data['ngaytao'] = time();

        $d->setTable('product_list');
        if ($d->insert($data))
            redirect("index.php?com=product&act=man_list&typeparent=$_GET[typeparent]");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_list&typeparent=$_GET[typeparent]");
    }
}

function delete_list() {
    global $d, $url_back;
    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_product_list where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product_list . $row['photo']);
                delete_file(_upload_product_list . $row['thumb']);
            }
        }
        $d->reset();
        $sql = "delete from #_product_list where id='" . $id . "'";
        $d->query($sql);
        if ($d->query($sql))
            redirect($url_back);
        else
            transfer("Xóa dữ liệu bị lỗi", $url_back);
    }else if (isset($_GET['listid'])) {
        $listid = explode(",", $_GET['listid']);
        foreach ($listid as $listid_item) {
            $d->reset();
            $d->setTable('product_list');
            $d->setWhere('id', $listid_item);
            $d->select();
            if ($d->num_rows() == 0)
                transfer("Dữ liệu không có thực", $url_back);
            $row = $d->fetch_array();
            delete_file(_upload_product_list . $row['photo']);
            delete_file(_upload_product_list . $row['thumb']);
            $d->delete();
        }
        redirect($url_back);
    } else
        transfer("Không nhận được dữ liệu", $url_back);
}

function delete_imglist() {
    global $d, $url_back;
    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_product_list where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product_list . $row['photo']);
                delete_file(_upload_product_list . $row['thumb']);
            }
            $sql = "UPDATE #_product_list SET photo ='',thumb='' WHERE  id = '" . $id . "'";
            $d->query($sql);
        }
        if ($d->query($sql))
            redirect("http://localhost/thanhnienmoi/admin/index.php?com=product&act=edit_list&id=" . $id);
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=edit_list&id=" . $id);
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=edit_list&id=" . $id);
}

/* ---------------END DANH MUC CAP 1------------------ */



/*-------------------------------------Start Rating--------------------------------------------*/

function get_ratings(){
	global $d, $items, $paging, $url_back , $url_link,$totalRows , $pageSize, $offset;
	$id_product =  themdau($_GET['id_product']);
	
	
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['chon'];
		

		
		$count=count($id_array);
		if($multi=='show'){
			for($i=0;$i<$count;$i++){
				$sql = "UPDATE table_rating SET hienthi =1 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=product&act=man_rating&id_product=$id_product");			
		}
		
		
		if($multi=='hide'){
			for($i=0;$i<$count;$i++){

				$sql = "UPDATE table_rating SET hienthi =0 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=product&act=man_rating&id_product=$id_product");			
		}
		
		if($multi=='del'){
			for($i=0;$i<$count;$i++){
				$sql="SELECT * FROM table_rating where id='".$id_array[$i]."'";
				$d->query($sql);
				//$cats= $d->fetch_array();

				if($d->num_rows()>0){
				while($row = $d->fetch_array()){

						delete_file(_upload_rating.$row['photo']);
						delete_file(_upload_rating.$row['thumb']);			
					}
				}
	
				
				$sql = "delete from table_rating where id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=product&act=man_rating&id_product=$id_product");			
		}
		
		
	}


	
	#----------------------------------------------------------------------------------------

	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_rating where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_rating SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_rating SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	redirect($url_back);
	}
	
	

	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten LIKE '%$keyword%' or email LIKE '%$keyword%' or tieude LIKE '%$keyword%'  ";
	}
	

	
	$sql="SELECT count(id) AS numrows FROM #_rating where id  $where ";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=20;
	$offset=5;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_rating where    id_product='".$_GET['id_product']."' $where order by id desc limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link="index.php?com=product&act=man_rating&id_product=$id_product".$urldanhmuc;


}


function get_rating(){
	global $d, $item, $url_back;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", $url_back);	
	$sql = "select * from #_rating where id='".$id."' ";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $url_back);
	$item = $d->fetch_array();	
}

function save_rating(){
	
	global $d, $url_back,$config;
	$id_product =  $_POST['id_product'];	
	$file_name=changeTitle($_POST['ten_vi']).fns_Rand_digit(0,3,5);

	
	if(empty($_POST)  ) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_rating&id_product=$id_product");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){


			
			$data['ten'] = magic_quote($_POST['ten']);
			$data['email'] = magic_quote($_POST['email']);
			$data['tieude'] = magic_quote($_POST['tieude']);
			$data['noidung'] = magic_quote($_POST['noidung']);
			

		/*--------------------------------------------------*/	
		
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$data['ngaysua'] = time();
		
		$d->setTable('rating');
		$d->setWhere('id', $id);
		if($d->update($data)){
			if(isset($_POST['referer_link']))
				redirect($_POST['referer_link']);
			else
				redirect("index.php?com=product&act=man_rating&id_product=$id_product&curPage=".$_REQUEST['curPage']."");
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_rating&id_product=$id_product");
	}else{	
	

		
			$data['ten'] = magic_quote($_POST['ten']);
			$data['email'] = magic_quote($_POST['email']);
			$data['tieude'] = magic_quote($_POST['tieude']);
			$data['noidung'] = magic_quote($_POST['noidung']);
			$data['id_product'] = magic_quote($id_product);
			
		

		

	
		/*--------------------------------------------------*/	
		
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$data['ngaysua'] = time();
		
		$d->setTable('rating');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_rating&id_product=$id_product");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_rating&id_product=$id_product");
	}
}

function delete_rating(){
	global $d;
	if(isset($_GET['id'])){
		
		$id =  themdau($_GET['id']);
		$id_product =  themdau($_GET['id_product']);
		
		
		
		$d->reset();
		$sql = "select id_product from #_rating where id='".$id."'";
		$d->query($sql);
		$record = $d->fetch_array();
		$id_pro = $record['id_product'];

		$d->reset();
		$sql = "delete from #_rating where id='".$id."'";
		$kq = $d->query($sql);

		// update rating cho sản phẩm này
		$num_rating = getTotalStar($id_pro);
		updateRatingProduct($id_pro,$num_rating);
		
		if($kq){
			redirect("index.php?com=product&act=man_rating&id_product=$id_product");
		}else{
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_rating&id_product=$id_product");
		}

	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);

			$d->reset();
			$sql = "select id_product from #_rating where id='".$id."'";
			$d->query($sql);
			$record = $d->fetch_array();
			$id_pro = $record['id_product'];
			
			$d->reset();
			$sql = "delete from #_rating where id='".$id."'";
			$d->query($sql);

			// update rating cho sản phẩm này
			$num_rating = getTotalStar($id_pro);
			updateRatingProduct($id_pro,$num_rating);
		}
		redirect("index.php?com=product&act=man_rating");		
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_rating&id_product=$id_product");
}


/*-------------------------------------End Rating--------------------------------------------*/


#---------------------------------------Start Tag-------------------------------------------------

function insert_tag($itemid = '0', $tag = '') {
    global $d;
    $tagarray = explode(",", $tag);
    for ($i = 0; $i < count($tagarray); $i++) {
        $com = 'product';
        $usetag = mysql_real_escape_string(stripslashes(ltrim(rtrim($tagarray[$i]))));
        if ($usetag == "")
            continue;
        $query = "INSERT INTO table_tag (item_id,tag,com) VALUES ($itemid,'$usetag','$com')";
        mysql_query($query);
    }
}

function shows_tag($itemid = '0') {
    global $d;
    $query = "select tag from #_tag where item_id='$itemid' and com='product'";
    $d->query($query);
    $result = $d->result_array();
    for ($i = 0; $i < count($result); $i++) {
        $str.=$result[$i]['tag'] . ',';
    }
    return $str;
}

function delete_tag($itemid = '0') {
    global $d;
    $sql = "delete from #_tag where item_id='" . $itemid . "' and com='product'";
    $d->query($sql);
}

#---------------------------------------End Tag-------------------------------------------------
?>