<?php	
if(isset($_POST) && isset($_SESSION[$login_name])){
	if($_SESSION[$login_name]==false)
	{
		redirect("index.php");	
	}
}
if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	

	case "luotxem":
                get_luotxem();
		$template = "thongke/luotxemsanpham";
		break;
        case "luotxem_cap1":
                
		$template = "thongke/luotxemcap1";
		break;
          case "luotxem_cap2": 
		$template = "thongke/luotxemcap2";
		break;  
            
             case "reset_luotxem": 
		reset_luotxem();
		break; 
	
		$template = "index";
}



function  reset_luotxem(){
    global $d, $items, $url_link,$url_back,$totalRows , $pageSize, $offset;
    
        $d->reset();
	$sql = "UPDATE table_product SET luotxem =0 ";
	mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
        $url_link='index.php?com=thongke&act=luotxem_cap1';	
        redirect($url_link);
    
}

function get_luotxem(){		
	global $d, $items, $url_link,$totalRows , $pageSize, $offset;
	
	
	
	$where=" where id<> 0 "; 
	if($_GET["ngaybd"]!=''){
	$ngaybatdau = $_GET["ngaybd"];		
	$Ngay_arr = explode("/",$ngaybatdau); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày bắt đầu <br>";} else $ngaybatdau=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao>=".strtotime($ngaybatdau)." ";
	}

	if($_GET["ngaykt"]!=''){
	$ngayketthuc = $_GET["ngaykt"];		
	$Ngay_arr = explode("/",$ngayketthuc); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày kết thúc <br>";} else $ngayketthuc=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao<=".strtotime($ngayketthuc)." ";
		
	}

	
	if($_GET["keyword"]!=''){
		$where.=" and (masp like '%".$_GET["keyword"]."%' or ten_vi like '%".$_GET["keyword"]."%' )  ";
	}
	
//	//httt
//	if($_GET["httt"]!='' && $_GET["httt"] > 0){
//		$where.=" and httt=".$_GET["httt"]." ";
//	}
	//tinhtrang
	if($_GET["tinhtrang"]!='' && $_GET["tinhtrang"]>0){
		$where.=" and id_list=".$_GET["tinhtrang"]." ";
	}

								
	$sql="SELECT count(id) AS numrows FROM #_product $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=10;
	$offset=5;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_product $where order by id desc limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link='index.php?com=thongke&act=luotxem';		
}






?>