<?php

$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$d = new database($config['database']);

$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting = $d->fetch_array();

$d->reset();
$sql_banner_giua = "select banner_$lang from #_banner where com='banner_top' ";
$d->query($sql_banner_giua);
$row_logo = $d->fetch_array();


$image = "http://" . $config_url . "/" . _upload_hinhanh_l . $row_logo["banner_$lang"] . "";
$url_web = "http://" . $config_url . "/" . $com . ".html";
$title_bar = $row_setting["title_$lang"];
$description_web = strip_tags($row_setting["title_$lang"]);

	if($com!=''){
	$com=magic_quote($com);
    $arr_menu =
		array(
			
			array("tbl"=>"product_cat","field"=>"idcat","com"=>"thuc-don","type"=>$loai."product"),
			array("tbl"=>"product_list","field"=>"idl","com"=>"thuc-don","type"=>$loai."product"),
			array("tbl"=>"product","field"=>"id","com"=>"thuc-don","type"=>$loai."product"),
			

			array("tbl"=>"news","field"=>"id","com"=>"tin-tuc","type"=>$loai."news"),
			array("tbl"=>"news","field"=>"id","com"=>"y-kien-khach-hang","type"=>$loai."khachhang")
	
			
		);
		foreach($arr_menu as $k=>$v){
			
				if($v['type']!='')
					$d->query("select id,tenkhongdau_$lang from #_".$v['tbl']." where hienthi=1 and tenkhongdau_$lang='".$com."' and com='".$v['type']."'");
				
				else
					$d->query("select id,tenkhongdau_$lang from #_".$v['tbl']." where hienthi=1 and tenkhongdau_$lang='".$com."'");
				if($d->num_rows()>=1){
					$row = $d->fetch_array();
					
					$_GET[$v['field']] = $row["id"];
					$com = $v['com'];					
					break;
				}
			}
	}


switch ($com) {

    case 'langs':
        if (isset($_GET['lang'])) {
            switch ($_GET['lang']) {
                case 'vi':
                    $_SESSION['lang'] = 'vi';
                    break;
                case 'en':
                    $_SESSION['lang'] = 'en';
                    break;
                case 'cn':
                    $_SESSION['lang'] = 'cn';
                    break;
                case 'ge':
                    $_SESSION['lang'] = 'ge';
                    break;
                default :
                    $_SESSION['lang'] = 'vi';
                    break;
            }
        } else {
            $_SESSION['lang'] = 'vi';
        }
        if (@$_GET['loai'] == 'intro') {


            echo '<script type="text/javascript">
						window.location = "index.php";
					</script>';
        }
        break;



			
	case 'gioi-thieu':
        $source = "about";
        $com_type =  $loai."gioithieu";
        $com_title = _gioithieu;
        $template = "about";
		$type_og = "article";
        break;	
	
	// case 'gioi-thieu':
       // $source = "news";
       // $com_type = $loai."gioithieu";
       // $com_title = _gioithieu;
       // $template = isset($_GET['id']) ? "news_detail" : "news";
       // $type_og = isset($_GET['id']) ? "article" : "object";
	   // break;	
	   
	case 'thuc-don':
       $source = "product";
       $com_type = $loai."product";
       $com_title = "Thực đơn";
       $template = isset($_GET['id']) ? "product_detail" : "product";
       $type_og = isset($_GET['id']) ? "article" : "object";
	   break;   
	
	

	case 'y-kien-khach-hang':
       $source = "news";
       $com_type = $loai."khachhang";
       $com_title = "Ý kiến khách hàng";
       $template = isset($_GET['id']) ? "news_detail" : "news";
       $type_og = isset($_GET['id']) ? "article" : "object";
	   break;  
	case 'tin-tuc':
       $source = "news";
       $com_type = $loai."news";
       $com_title = "Tin tức";
       $template = isset($_GET['id']) ? "news_detail" : "news";
       $type_og = isset($_GET['id']) ? "article" : "object";
	   break;     
	
	// case 'chinh-sach':
       // $source = "news";
       // $com_type = $loai."chinhsach";
       // $com_title = "chính sách";
       // $template = isset($_GET['id']) ? "news_detail" : "news";
       // $type_og = isset($_GET['id']) ? "article" : "object";
	   // break;  
	case 'hinh-anh':
       $source = "ablum";
       $com_type = $loai."hinhanh";
       $com_title = "Thư viện ảnh";
       $template = isset($_GET['id']) ? "news_detail" : "ablum";
       $type_og = isset($_GET['id']) ? "article" : "object";
	   break;     


	// case 'videos':
       // $source = "videoclip";
       // $com_type = "video";
       // $com_title ="Video";
        // $template = isset($_GET['id']) ? "video_detail" : "video";
       // break;


    case 'lien-he':
		$com_type = "lienhe";
		$com_title = _lienhe;
        $source =   "contact";
        $template = "contact";
        break;

    case 'tim-kiem':
        $source = "search";
        $com_title = _timkiem;
        $template = "product";
        break;

    //case 'doi-tac':
    //    $source = "doitac";
    //     $com_type = "doitac";
    //    $com_title = _doitac;
    //    $template = "doitac";
    //    break;

    //case 'gio-hang':
    //    $source = "giohang";
    //    $template = "giohang";
    //    break;

    //case 'thanh-toan':
    //    $source = "thanhtoan";
    //    $template = "thanhtoan";
    //    break;

    case 'error':
			$source = "index";
			$template = "404";
			
			break;

		
	case '':
		$source="index";
		$template="index";
		$type_og = "website";	
	break;	
	
	case 'index':
		$source="index";
		$template="index";	
		$type_og = "website";	
	break;			

    default:
        $source = "index";
        $template = "index";
		$type_og = "website";
        break;
}

if($config['index']==1){
	
	if($_SERVER["REQUEST_URI"]=='/index.php'){
		header("location:".$http.$config_url);	
	}
}

if ($source != "")
    include _source . $source . ".php";

if ($_REQUEST['com'] == 'logout') {
    session_unregister($login_name);
    header("Location:index.php");
}
?>