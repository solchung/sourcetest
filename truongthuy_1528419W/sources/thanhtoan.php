<?php
if($_SESSION['cart']==''){
    transfer("Không có sản phẩm nào trong giỏ hàng!", "trang-chu.html");
}

if (!defined('_source'))
    die("Error");
// thanh tieu de
$title_bar = _thanhtoan;
if (!empty($_POST)) {
    $hoten = $_POST['ten'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $xe = $_POST['xe'];
    $noidung = $_POST['noidung'];
    $httt = @$_POST['httt'];

    //validate dữ liệu
    $hoten = trim(strip_tags($hoten));
    $dienthoai = trim(strip_tags($dienthoai));
    $diachi = trim(strip_tags($diachi));
    $email = trim(strip_tags($email));
    $xe = trim(strip_tags($xe));
    $noidung = trim(strip_tags($noidung));
    settype($httt, "int");

    if (get_magic_quotes_gpc() == false) {
        $hoten = mysql_real_escape_string($hoten);
        $dienthoai = mysql_real_escape_string($dienthoai);
        $diachi = mysql_real_escape_string($diachi);
        $email = mysql_real_escape_string($email);
        $xe = mysql_real_escape_string($xe);
        $noidung = mysql_real_escape_string($noidung);
    }
    $coloi = false;
    if ($hoten == NULL) {
        $coloi = true;
        $error_hoten = "Bạn chưa nhập họ tên<br>";
    }
    if ($dienthoai == NULL) {
        $coloi = true;
        $error_dienthoai = "Bạn chưa nhập điện thoại<br>";
    }
    if ($diachi == NULL) {
        $coloi = true;
        $error_diachi = "Bạn chưa nhập địa chỉ<br>";
    }

//    if ($email == NULL) {
//        $coloi = true;
//        $error_email = "Bạn chưa nhập email<br>";
//    } 
//    elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
//        $coloi = true;
//        $error_email = "Bạn nhập email không đúng<br>";
//    }
    /* if ($httt <1 and $httt>2) { 
      $coloi=true; $error_httt = "Bạn chưa chọn hình thức thanh toán<br>";
      } */

    if ($coloi == FALSE) {

        $body = '<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1; padding:5px;" width="100%">';
        if (is_array($_SESSION['cart'])) {
            $body.='<tr bgcolor="#075992">
				<td align="center" style="font-weight:bold;color:#FFF">STT</td>
				<td style="font-weight:bold;color:#FFF">Tên</td>
				<td style="font-weight:bold;color:#FFF">Hình ảnh</td>
                            
				<td align="center" style="font-weight:bold;color:#FFF">Giá</td>
				
                                <td align="center" style="font-weight:bold;color:#FFF">Số lượng</td>
                                <td align="center" style="font-weight:bold;color:#FFF">Tổng giá</td></tr>';
            $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
                $pid = $_SESSION['cart'][$i]['productid'];
                $q = $_SESSION['cart'][$i]['qty'];
                $color = $_SESSION['cart'][$i]['color'];
                $pname = get_product_name($pid, 'vi');
                $pimg = get_product_img($pid);
                $tongri=$q;
                if ($q == 0)
                    continue;
                $body.='<tr bgcolor="#FFFFFF"><td width="10%" align="center">' . ($i + 1) . '</td>';
                $body.='<td width="29%">' . $pname;
                $body.='</td>';
                $body.='<td width="25%"><img src="http://'. $config_url .'/' . _upload_product_l . $pimg;
                $body.='" width="150"/></td>';
             
                $body.='<td width="20%">' . number_format(get_price($pid), 0, ',', '.') . '&nbsp;VNĐ</td>';
             
                $body.='<td width="14%">' . $q . '</td>';
                
                $body.='<td>' . number_format(get_price($pid)*$tongri, 0, ',', '.') . '&nbsp;VNĐ</td>
                    </tr>
					<br/>';
            }
            $body.='<tr><td colspan="5">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
              <td style="text-align:left;"> ';
            $body.=' <strong>Tổng giá bán: ' . number_format(get_order_total(), 0, ',', '.') . ' &nbsp;VNĐ</strong></td>
              <td colspan="5" align="right">&nbsp;</td>
             </tr>
             </table>   
                </td></tr>';
        }
        else {
            $body.='<tr bgColor="#FFFFFF"><td>There are no items in your shopping cart!</td>';
        }
        $body.='</table><br />';


        $mahoadon = strtoupper(ChuoiNgauNhien(6));
        $ngaydangky = time();
        $tonggia = get_order_total();

        $body1 = '<b>Mã đơn hàng:</b> <strong>' . $mahoadon . '</strong><br />		    
    			<b>Họ tên: </b><strong>' . $hoten . '</strong><br />		  
        		<b>Điện thoại: </b><strong>' . $dienthoai . '</strong><br />		  
        		<b>Email: </b><strong>' . $email . '</strong><br />
                    
           		<b>Địa chỉ: </b><strong>' . $diachi . '</strong><br />';
        $data_send = $body . $body1;

        // lấy địa chỉ IP
        $ip_address = getRealIPAddress();

		$d->reset();
        $sql_order = "INSERT INTO  table_order (madonhang,hoten,dienthoai,diachi,email,xe,httt,tonggia,noidung,ngaytao,trangthai,ip_address,id_thanhvien,thongtinhoadon,ghichu,Invoice_No) 
				  VALUES ('$mahoadon','$hoten','$dienthoai','$diachi','$email','$xe','$httt','$tonggia','$noidung','$ngaydangky','1','$ip_address','0','','','')";
        // Thêm đơn hàng vào Database
        //mysql_query($sql_order) or die(mysql_error());
		
		$d->query($sql_order);

		
        $id_order_inserted = mysql_insert_id(); //lấy id của đơn hàng vừa lưu thành công
        // Duyệt từ phần tử trong giỏ hàng để lưu vào chi tiết đơn hàng
        foreach ($_SESSION['cart'] as $item_cart) {

            // lấy dữ liệu cho từng sản phẩm trong giỏ hàng
            $d->reset();
            $sql = "select ten_$lang,id,tenkhongdau_$lang,photo,gia_vnd from table_product where id='" . $item_cart['productid'] . "'";
            $d->query($sql);
            $item_pro = $d->fetch_array();


            // đơn giá của từng item (màu + giảm giá + option)
            
			$price_item = get_price($item_pro['id']);
            $soluong=(int)$item_cart['qty'];
            $tongri=$soluong*$item_pro['ri'];


            // lưu vào bảng chi tiết đơn hàng
            $sql_order_detail = "INSERT INTO  table_order_detail (id_order,id_product,gia,soluong,color,ri,tongri,id_daily,ten,songuoilon,sotreem,soembe,tongsokhach) 
				  				VALUES ('$id_order_inserted','$item_pro[id]','$price_item','$soluong','$item_cart[color]','0','$tongri','0','','0','0','0','0')";
           // mysql_query($sql_order_detail) or die(mysql_error());
			$d->query($sql_order_detail);
        }
  if($email!=''){      
        /* ----------------SEND MAIL CHO KHÁCH HÀNG  VÀ  CHỦ CỬA HÀNG-------------------- */
        $subject = "Thông tin đơn hàng từ " . $row_setting["ten_$lang"];
        include_once "phpmailer/class.phpmailer.php";
        //Khởi tạo đối tượng
        $mail = new PHPMailer();
        //Thiet lap thong tin nguoi gui va email nguoi gui
        $mail->IsSMTP(); // Gọi đến class xử lý SMTP
        $mail->SMTPAuth = true;                  // Sử dụng đăng nhập vào account
        $mail->Host = $row_setting["iphost"];     // Thiết lập thông tin của SMPT
        $mail->Username = $row_setting["usernameaccount"]; // SMTP account username
        $mail->Password = $row_setting["password"];           // SMTP account password
        $mail->SetFrom($row_setting["mailhost"], $row_setting["ten_$lang"]);

        //Thiết lập thông tin người nhận
        $mail->AddAddress($email, $hoten);
        $mail->AddAddress($row_setting['email'], $row_setting["ten_$lang"]);

        //Thiết lập email nhận email hồi đáp
        //nếu người nhận nhấn nút Reply
        $mail->AddReplyTo($row_setting['email'], $row_setting["ten_$lang"]);

        /* =====================================
         * THIET LAP NOI DUNG EMAIL
         * ===================================== */

        //Thiết lập tiêu đề
        $mail->Subject = "Thông tin đặt hàng từ website " . $row_setting["ten_$lang"];

        //Thiết lập định dạng font chữ
        $mail->CharSet = "utf-8";

        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

        //Thiết lập nội dung chính của email
        
        $mail->MsgHTML($data_send);
       
        if (!$mail->Send()) {
            transfer("Có lỗi xảy ra!", "index.html");
        } else {
            unset($_SESSION['cart']);
            transfer("Gửi đơn hàng thành công!<br/>", "http://$config_url/");
        }
  }

        // $iduser = mysql_insert_id();
        // if ($httt == 2) {
            // require_once("nganluong.php");
            //Tài khoản nhận tiền
            // $receiver = "duyhung862000@yahoo.com";
            //Khai báo url trả về 
            // $return_url = "http://localhost/tich-hop-nang-cao/complete.php";
            //Giá của cả giỏ hàng 
            // $price = $tonggia;
           //Mã giỏ hàng 
            // $order_code = $mahoadon;
            //Thông tin giao dịch
            // $transaction_info = "Hãy lập trình thông tin giao dịch của bạn vào đây";
           // Khai báo đối tượng của lớp NL_Checkout
            // $nl = new NL_Checkout();
            //Tạo link thanh toán đến nganluong.vn
            // $url = $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price);
            // redirect($url);
        // } else {
            // unset($_SESSION['cart']);
            // transfer("Đơn hàng của bạn đã được gửi", "http://$config_url/");
        // }
    }
}
?>