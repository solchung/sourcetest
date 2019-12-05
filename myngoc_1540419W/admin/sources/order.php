<?php	
if(isset($_POST) && isset($_SESSION[$login_name])){
	if($_SESSION[$login_name]==false)
	{
		redirect("index.php");	
	}
}
if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

$urldanhmuc ="";
$urldanhmuc.= (isset($_REQUEST['id_user'])) ? "&id_user=".addslashes($_REQUEST['id_user']) : "";
$urldanhmuc.= (isset($_REQUEST['datefm'])) ? "&id_user=".addslashes($_REQUEST['datefm']) : "";
$urldanhmuc.= (isset($_REQUEST['dateto'])) ? "&id_user=".addslashes($_REQUEST['dateto']) : "";
$urldanhmuc.= (isset($_REQUEST['status'])) ? "&status=".addslashes($_REQUEST['status']) : "";

$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "order/items";
		break;
	case "add":		
		$template = "order/item_add";
		break;
	case "edit":		
		get_item();
		$template = "order/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;	
	default:
		$template = "index";
}

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_items(){		
	global $d, $items, $url_link,$totalRows , $pageSize, $offset;
	
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);				
		if($multi=='del'){
			for($i=0;$i<$count;$i++){
								
				
				$sql = "delete from #_order_detail where id_order 	='".$id_array[$i]."'";
				$d->query($sql);
		
				$sql = "delete from table_order where id = '".$id_array[$i]."'";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");			
							
			}
			redirect("index.php?com=order&act=man&type=".$_REQUEST['type']);			
		}
		
		
	}
	
	$where=" where id<> 0 "; 
	if($_GET["ngaybd"]!=''){
	$ngaybatdau = $_GET["ngaybd"];		
	$Ngay_arr = explode("/",$ngaybatdau); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày sinh<br>";} else $ngaybatdau=$nam."-".$thang."-".$ngay;
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
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày sinh<br>";} else $ngayketthuc=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao<=".strtotime($ngayketthuc)." ";
		
	}

	
	if($_GET["keyword"]!=''){
		$where.=" and (madonhang like '%".$_GET["keyword"]."%' or hoten like '%".$_GET["keyword"]."%' )  ";
	}
	
	//sotien
	if($_GET["sotien"]!='' && $_GET["sotien"]>0){
		$sql="select giatu,giaden from #_giasearch where id='".$_GET["sotien"]."'";
		$d->query($sql);
		$giatim=$d->fetch_array();
		if($giatim!=null){
			$where.=" and tonggia>=".$giatim['giatu']." and tonggia<=".$giatim['giaden']." ";			
		}
	}
	//httt
	if($_GET["httt"]!='' && $_GET["httt"] > 0){
		$where.=" and httt=".$_GET["httt"]." ";
	}
	//tinhtrang
	if($_GET["tinhtrang"]!='' && $_GET["tinhtrang"]>0){
		$where.=" and trangthai=".$_GET["tinhtrang"]." ";
	}
	
	
	
	

								
	$sql="SELECT count(id) AS numrows FROM #_order $where";
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
	
	if ($_GET["keyword"]=='' && $_GET["sotien"]==0 && $_GET["httt"]=='' && $_GET["ngaykt"]=='' && $_GET["ngaybd"]=='' && $_GET["tinhtrang"]==0 ) 
	{
		$where_limit=" limit $bg,$pageSize";
	}
	
	$sql = "select * from #_order $where order by id desc $where_limit";		
	$d->query($sql);
	$items = $d->result_array();	
	
	//print_r($sql);
	
	$url_link='index.php?com=order&act=man';		
}

function get_item(){
	global $d, $item,$result_ctdonhang;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
	
	$sql = "select * from #_order where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=order&act=man");
	$item = $d->fetch_array();
	
	
	$d->reset();
	$sql="select * from #_order_detail where id_order = '".$item['id']."'";
	$d->query($sql);
	$result_ctdonhang=$d->result_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);			
		
		$data['Invoice_No'] = $_POST['Invoice_No'];
		$data['ghichu'] = $_POST['ghichu'];
		$data['trangthai'] = $_POST['id_tinhtrang'];				
		$d->setTable('order');
		$d->setWhere('id', $id);
		if($d->update($data))
		{
			
			
			
			if($id>0){
			//$idTeam = $_POST['team'];
			
			
			$sql = "select * from #_order_detail where id_order=".$id."  order by id desc ";		
			$d->query($sql);
			$idTeam = $d->result_array();
			
			
			$sql = "select * from #_order where id=".$id."  order by id desc ";		
			$d->query($sql);
			$info_order = $d->fetch_array();
			//print_r($info_order);
			//die();
			
//				$historyorder['id_order_parent'] = $id;
//				$historyorder['id_thanhvien'] = $info_order["id_thanhvien"];
//				$historyorder['madonhang'] = $info_order["madonhang"];
//				$historyorder['hoten'] = $info_order["hoten"];
//				$historyorder['dienthoai'] = $info_order["dienthoai"];
//				$historyorder['diachi'] = $info_order["diachi"];
//				$historyorder['thongtinhoadon'] = $info_order["thongtinhoadon"];
//				$historyorder['email'] = $info_order["email"];
//				$historyorder['httt'] = $info_order["httt"];
//				$historyorder['tonggia'] = $info_order["tonggia"];
//				$historyorder['ngaytao'] = $info_order["ngaytao"];
//				$historyorder['ghichu'] = $info_order["ghichu"];
//				$historyorder['trangthai'] = $info_order["trangthai"];
//				$historyorder['hienthi'] = $info_order["hienthi"];
//				$historyorder['id_tinhthanh'] = $info_order["id_tinhthanh"];
//				$historyorder['id_quanhuyen'] = $info_order["id_quanhuyen"];
//				$historyorder['id_coupon'] = $info_order["id_coupon"];
//				$historyorder['Invoice_No'] = $info_order["Invoice_No"];
//				$historyorder['ip_address'] = $info_order["ip_address"];
//				$historyorder['phivanchuyen'] = $info_order["phivanchuyen"];
//				$historyorder['id_quocgia'] = $info_order["id_quocgia"];
//				$historyorder['total_thue'] = $info_order["total_thue"];
//				$historyorder['type_payment'] = $info_order["type_payment"];
//				$historyorder['id_tragop'] = $info_order["id_tragop"];
//				$historyorder['sotientratruoc'] = $info_order["sotientratruoc"];
//				$historyorder['sotiengopmoithang'] = $info_order["sotiengopmoithang"];
//				
//				$historyorder['time_edit'] = time();
//				
//				
//				$d->setTable('historyorder');
//				
//				$d->insert($historyorder);
				
				
//			$id_historyorder=mysql_insert_id();
//			
//			for($i=0;$i<count($idTeam);$i++){
//				
//				$historyorder_detail['id_order'] = $id;
//				$historyorder_detail['id_historyorder'] = $id_historyorder;
//				$historyorder_detail['id_product'] = $idTeam[$i]["id_product"];
//				$historyorder_detail['id_daily'] = $idTeam[$i]["id_daily"];
//				$historyorder_detail['gia'] = $idTeam[$i]["gia"];
//				$historyorder_detail['soluong'] = $idTeam[$i]["soluong"];
//				$historyorder_detail['id_color'] = $idTeam[$i]["id_color"];
//				$historyorder_detail['id_option'] = $idTeam[$i]["id_option"];
//				$historyorder_detail['thue'] = $idTeam[$i]["thue"];
//				$historyorder_detail['ghichu'] = $idTeam[$i]["ghichu"];
//				
//				$historyorder_detail['time_edit'] = time();
//				
//				
//				$d->setTable('historyorder_detail');
//				
//				$d->insert($historyorder_detail);
//				
//				
//			}
			}
			
		
			
			
			redirect("index.php?com=order&act=man&curPage=".$_REQUEST['curPage']."");
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=order&act=man");
	}
}

function delete_item(){
  
	global $d;
	
	if($_REQUEST['p']!='')
	{ $id_catt.="&p=".$_REQUEST['p'];
        
	}
	
	
	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);
		
		//update_soluongton_order($id); // Cập nhật lại số lượng tồn kho khi xóa đơn hàng
		
		$d->reset();
		$sql = "delete from #_order where id='".$id."'";
		$d->query($sql);
		
		$d->reset();
		$sql = "delete from #_order_detail where id_order 	='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=order&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=order&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
}
?>