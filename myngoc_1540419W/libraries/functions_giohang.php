<?php
function count_duan($pid) {
    global $d, $row;
    $sql = "select id from #_product where hienthi=1 and id_tinh=$pid and com='duan'";
    $d->query($sql);
    $row = $d->result_array();
    return count($row);
}

function get_tong_tien($id = 0) {
    global $d;
    if ($id > 0) {
        $d->reset();
        $sql = "select gia_vnd,soluong from #_order_detail where id_order='" . $id . "'";
        $d->query($sql);
        $result = $d->result_array();
        $tongtien = 0;
        for ($i = 0, $count = count($result); $i < $count; $i++) {
            $tongtien+= $result[$i]['gia_vnd'] * $result[$i]['soluong'];
        }
        return $tongtien;
    } else
        return 0;
}

function get_product_name($pid, $lang) {
    global $d, $row;
    $sql = "select ten_$lang from #_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row["ten_$lang"];
}
function get_product_code($pid) {
    global $d, $row;
    $sql = "select masp from #_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row["masp"];
}
function get_product_img($pid) {
    global $d, $row;
    $sql = "select photo from #_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row['photo'];
}

function get_ri($pid) {
    global $d, $row;
    $sql = "select ri from #_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return (int)$row['ri'];
}

function get_price($pid) {
    global $d, $row;
    $sql = "select gia_vnd,giamgia from table_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
	if($row['giamgia']>0){
	$giamgia=($row['gia_vnd']-(($row['giamgia']/100)*$row['gia_vnd'])	);
	return $giamgia;	
	}else{
	return $row['gia_vnd'];	
		
	}
 
}

function get_price_km($pid) {
    global $d, $rows;
    $sql = "select giamgia,gia_vnd from table_product where id=$pid";
    $d->query($sql);
    $rows = $d->fetch_array();
    return 100-($rows['giamgia'] * 100 / $rows['gia_vnd']);
}

function remove_product($pid) {
    $pid = intval($pid);
    $max = count($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid']) {
            unset($_SESSION['cart'][$i]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

function get_order_detail() {
    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = $_SESSION['cart'][$i]['qty'];
        $price = (get_price($pid));
        $sum=$price * $q;
    }
    return $sum;
}

function get_order_total() {
    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = $_SESSION['cart'][$i]['qty'];
        $price = (get_price($pid));
        $sum+=$price * $q;
    }
    return $sum;
}

function get_total() {
    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $sum++;
    }
    return $sum;
}

//	function addtocart($pid,$q){
//		if($pid<1 or $q<1) return;
//
//		if(is_array($_SESSION['cart'])){
//			
//			$i=product_exists($pid);
//		
//			if($i!=-1) {
//				$_SESSION['cart'][$i]['qty']=$q+$_SESSION['cart'][$i]['qty'];
//
//				return;
//				}
//			else{
//			$max=count($_SESSION['cart']);
//			$_SESSION['cart'][$max]['productid']=$pid;
//			$_SESSION['cart'][$max]['qty']=$q;
//			}
//		}
//		else{
//			$_SESSION['cart']=array();
//			$_SESSION['cart'][0]['productid']=$pid;
//			$_SESSION['cart'][0]['qty']=$q;
//
//		}
//	}
//	function product_exists($pid){
//		$pid=intval($pid);
//		$max=count($_SESSION['cart']);
//		$flag=-1;
//		
//		for($i=0;$i<$max;$i++){
//			if($pid==$_SESSION['cart'][$i]['productid']){
//				$flag=$i;
//				break;
//			}
//		}
//		return $flag;
//	}

function addtocart($pid, $q, $color) {

    if ($pid < 1 or $q < 1)
        return;

    if (is_array($_SESSION['cart'])) {
        if (product_exists($pid, $q, $color))
            return;

        $max = count($_SESSION['cart']);
        $_SESSION['cart'][$max]['productid'] = $pid;
        $_SESSION['cart'][$max]['qty'] = $q;
        $_SESSION['cart'][$max]['color'] = $color;
        return count($_SESSION['cart']);
    }
    else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][0]['productid'] = $pid;
        $_SESSION['cart'][0]['qty'] = $q;
        $_SESSION['cart'][0]['color'] = $color;

        return count($_SESSION['cart']);
    }
}

function product_exists($pid, $q, $color) {
    $pid = intval($pid);
    $max = count($_SESSION['cart']);
    $flag = 0;
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid'] && $color == $_SESSION['cart'][$i]['color']) {
            $_SESSION['cart'][$i]['qty'] = $_SESSION['cart'][$i]['qty'] + $q;
            $flag = 1;
            break;
        }
    }
    return $flag;
}

function update_slmua($pid, $q) {
    global $d, $row;
    $sql = "UPDATE #_product SET slmua=slmua+$q  WHERE id=$pid";
    $d->query($sql);
}
/***********yeuthic***************/
function remove_sosanh($pid) {

    $pid = intval($pid);
    $max = count($_SESSION['ss']);
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['ss'][$i]['ssid']) {
            unset($_SESSION['ss'][$i]);
            break;
        }
    }
    $_SESSION['ss'] = array_values($_SESSION['ss']);
}

function remove_sosanh_m($pid) {

    $pid = intval($pid);
    $max = count($_SESSION['ssm']);
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['ssm'][$i]['ssmid']) {
            unset($_SESSION['ssm'][$i]);
            break;
        }
    }
    $_SESSION['ssm'] = array_values($_SESSION['ssm']);
}

function addtososanh($ssid) {

    if (is_array($_SESSION['ss'])) {
        if (sosanh_exists($ssid))
            return 0;
        $max = count($_SESSION['ss']);
//        if ($max == 3)
//            return 4;
        // return $max;
        $_SESSION['ss'][$max]['ssid'] = $ssid;
    }
    else {
        $_SESSION['ss'] = array();
        $_SESSION['ss'][0]['ssid'] = $ssid;
    }
    // return 1;
}

function addtososanhm($ssmid) {

    if (is_array($_SESSION['ssm'])) {
        if (sosanhm_exists($ssmid))
            return 0;
        $max = count($_SESSION['ssm']);
//        if ($max == 2)
//            return 3;
        // return $max;
        $_SESSION['ssm'][$max]['ssmid'] = $ssmid;
    }
    else {
        $_SESSION['ssm'] = array();
        $_SESSION['ssm'][0]['ssmid'] = $ssmid;
    }
    // return 1;
}

function sosanh_exists($ssid) {
    $ssid = intval($ssid);
    $max = count($_SESSION['ss']);
    $flag = 0;
    for ($i = 0; $i < $max; $i++) {
        if ($ssid == $_SESSION['ss'][$i]['ssid']) {
            $flag = 1;
            break;
        }
    }
    return $flag;
}

function sosanhm_exists($ssmid) {
    $ssmid = intval($ssmid);
    $max = count($_SESSION['ssm']);
    $flag = 0;
    for ($i = 0; $i < $max; $i++) {
        if ($ssmid == $_SESSION['ssm'][$i]['ssmid']) {
            $flag = 1;
            break;
        }
    }
    return $flag;
}
/**************end_yeuthic*************/

/****************da_xem****************/
function remove_daxem($pid) {

    $pid = intval($pid);
    $max = count($_SESSION['dx']);
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['dx'][$i]['ssid']) {
            unset($_SESSION['dx'][$i]);
            break;
        }
    }
    $_SESSION['dx'] = array_values($_SESSION['dx']);
}

function remove_daxem_m($pid) {

    $pid = intval($pid);
    $max = count($_SESSION['dxm']);
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['dxm'][$i]['dxmid']) {
            unset($_SESSION['dxm'][$i]);
            break;
        }
    }
    $_SESSION['dxm'] = array_values($_SESSION['dxm']);
}

function addtodaxem($dxid) {

    if (is_array($_SESSION['dx'])) {
        if (sosanh_exists($dxid))
            return 0;
		$flag=0;
        $max = count($_SESSION['dx']);
		for($i=0;$i<$max;$i++){
			if($dxid==$_SESSION['dx'][$i]['dxid']){
				$flag=1;
				break;
				
		}}
		if($flag==1)
		{
			
		}else{
        $_SESSION['dx'][$max]['dxid'] = $dxid;
		}
    }
    else {
        $_SESSION['dx'] = array();
        $_SESSION['dx'][0]['dxid'] = $dxid;
    }
    // return 1;
}

function addtodaxemm($dxmid) {

    if (is_array($_SESSION['dxm'])) {
        if (daxemm_exists($dxmid))
            return 0;
        $max = count($_SESSION['dxm']);
//        if ($max == 2)
//            return 3;
 //        return $max;
        $_SESSION['dxm'][$max]['dxmid'] = $dxmid;
    }
    else {
        $_SESSION['dxm'] = array();
        $_SESSION['dxm'][0]['dxmid'] = $dxmid;
    }
    // return 1;
}

function daxem_exists($dxid) {
    $dxid = intval($dxid);
    $max = count($_SESSION['dx']);
    $flag = 0;
    for ($i = 0; $i < $max; $i++) {
        if ($dxid == $_SESSION['dx'][$i]['dxid']) {
            $flag = 1;
            break;
        }
    }
    return $flag;
}

function daxemm_exists($dxmid) {
    $dxmid = intval($dxmid);
    $max = count($_SESSION['dxm']);
    $flag = 0;
    for ($i = 0; $i < $max; $i++) {
        if ($dxmid == $_SESSION['dxm'][$i]['dxmid']) {
            $flag = 1;
            break;
        }
    }
    return $flag;
}
/**************************************/
?>