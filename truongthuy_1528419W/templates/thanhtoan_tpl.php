<script type="text/javascript" src="js/my_script_check_form.js"></script>
<script type="text/javascript">
    function validEmail(obj) {
        var s = obj.value;
        for (var i = 0; i < s.length; i++)
            if (s.charAt(i) == " ") {
                return false;
            }
        var elem, elem1;
        elem = s.split("@");
        if (elem.length != 2)
            return false;

        if (elem[0].length == 0 || elem[1].length == 0)
            return false;

        if (elem[1].indexOf(".") == -1)
            return false;

        elem1 = elem[1].split(".");
        for (var i = 0; i < elem1.length; i++)
            if (elem1[i].length == 0)
                return false;
        return true;
    }//Kiem tra dang email
    function IsNumeric(sText)
    {
        var ValidChars = "0123456789";
        var IsNumber = true;
        var Char;

        for (i = 0; i < sText.length && IsNumber == true; i++)
        {
            Char = sText.charAt(i);
            if (ValidChars.indexOf(Char) == -1)
            {
                IsNumber = false;
            }
        }
        return IsNumber;
    }//Kiem tra dang so
    function check()
    {
        var frm = document.frm_order;

        if (frm.ten.value == '')
        {
            alert("<?= _nameError ?>");
            frm.ten.focus();
            return false;
        }
        if (frm.dienthoai.value == '')
        {
            alert("<?= _phoneError ?>");
            frm.dienthoai.focus();
            return false;
        }
		  if (!IsNumeric(frm.dienthoai)) {
            alert('<?= _phoneErrorNH1 ?>');
            frm.dienthoai.focus();
            return false;
        }
		  if (!isPhone(frm.dienthoai)) {
            alert('<?= _phoneErrorNH1 ?>');
            frm.dienthoai.focus();
            return false;
        }
        if (frm.diachi.value == '')
        {
            alert("<?= _addressError ?>");
            frm.diachi.focus();
            return false;
        }

        if (frm.email.value == '')
        {
            alert("<?= _emailError ?>");
            frm.email.focus();
            return false;
        }
        if (!validEmail(frm.email)) {
            alert('<?= _emailError1 ?>');
            frm.email.focus();
            return false;
        }
        frm.submit();
    }
</script>
<script language='javascript'>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

	
	$(document).on("click", 'input#httt', function () {	
	  if ($(this).val()==2) {
		$('.act_nmg').addClass("act_block");
	  }else{
		 $('.act_nmg').removeClass("act_block"); 
	  }
	});
</script>
<div class="row pd0 mg0 ">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
	<div class="title_right mg0"><h2><?=_thanhtoan?></h2>

	</div>

	</div>
</div>
<div id="main_content_web">
    <div class="block_content container3">
       

        <div class="clear"></div>
        <div class="show-info-web">
		 <form method="post" name="frm_order" action="" enctype="multipart/form-data" onsubmit="return check();">
		<div class="row pd0 mg0 ">
		
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pd0">	
		
			<div class="block_donhang  width_common" >
			<div class="title_donhang"><span><?=_thongtinnhanhang?></span>
		
			</div>
			</div>
            <div class="text" style="padding:10px;border:1px solid #cacaca;margin-bottom:20px">

				
			
                <div class="step-content ">
			
					
                   
					
					<div class="form-group row" >
						<div class="field required" >
							<!-- ko ifnot: element.label == '' -->
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-tn-12">
								<div class="txt_form">
									<b ><?= _hoten ?></b>
								</div>
							</div>
							<!-- /ko -->
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-tn-12">
								<div class="control" data-bind="css: {'_with-tooltip': element.tooltip}">
									<input type="text" name="ten" id="ten" class="input-text" value="<?= @$_SESSION['login_member']['hoten']?>" />
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row" >
						<div class="field required" >
							<!-- ko ifnot: element.label == '' -->
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-tn-12">
								<div class="txt_form">
									<b ><?= _dienthoai ?></b>
								</div>
							</div>
							<!-- /ko -->
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-tn-12">
								<div class="control" data-bind="css: {'_with-tooltip': element.tooltip}">
								
									<input  type="tel" name="dienthoai" id="dienthoai" class="input-text" value="<?= @$_SESSION['login_member']['phone'] ?>" onKeyPress="return isNumberKey(event)"/>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row" >
						<div class="field required" >
							<!-- ko ifnot: element.label == '' -->
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-tn-12">
								<div class="txt_form">
									<b ><?= _diachi ?></b>
								</div>
							</div>
							<!-- /ko -->
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-tn-12">
								<div class="control" data-bind="css: {'_with-tooltip': element.tooltip}">
									<input type="text" name="diachi"  id="diachi" class="input-text"  value="<?= @$_SESSION['login_member']['address'] ?>"/>
									
								</div>
							</div>
						</div>
					</div>
						<div class="form-group row" >
						<div class="field required" >
							<!-- ko ifnot: element.label == '' -->
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-tn-12">
								<div class="txt_form">
									<b >E-mail</b>
								</div>
							</div>
							<!-- /ko -->
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-tn-12">
								<div class="control" data-bind="css: {'_with-tooltip': element.tooltip}">
									
									<input type="text" name="email" id="email" class="input-text"  value="<?= @$_SESSION['login_member']['email'] ?>"/>
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group row note">
						<div class="field">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-tn-12">
								<div class="txt_form">
									<b><?=_ghichu?></b>
								</div>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-tn-12">
							
								<textarea class="form-control" placeholder="Nhập ghi chú (nếu có)" name="noidung"  cols="50" rows="5" ></textarea>
							</div>
						</div>
					</div>
					
                       
                   
					</div>

            </div><!--end left_formtt-->
				<!--left_formhttt-->
				<div class="block_donhang  width_common" >
				<div class="title_donhang"><span><?=_hinhthucthanhtoan?></span>
					
				</div>
				</div>
				<div class="text" style="padding:10px;border:1px solid #cacaca;margin-bottom:20px">
				
				<div class="step-content ">
				
					<div class="txt_form item_cod">
					<input type="radio" id="httt" name="httt" value="1" checked="checked" />
                                Thanh toán khi nhận hàng
								</div>
					<div class="txt_form item_cod">			
                    <input type="radio" id="httt"name="httt" value="2" />
                                Chuyển khoản qua ngân hàng
								</div>
								
					<div class="act_nmg">			
					<?php 
					$d->reset();
					$sql_news = "select noidung_$lang from #_info where hienthi=1 and com='thanhtoan' ";
					$d->query($sql_news);
					$tb_thanhtoan = $d->fetch_array();
					echo $tb_thanhtoan["noidung_$lang"];
					?>		
					</div>	
				</div>
				</div>
				<!--end left_formhttt-->
			
			</div>
			
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pd_right0">
			<div class="block_donhang  width_common" >
			<div class="title_donhang"><span>Đơn hàng</span>
				<a href="gio-hang" class="pull-right txt_back_cart txt_color_1">Sửa</a>
			</div>
			</div>
			<div class="text" style="padding:10px;border:1px solid #cacaca;margin-bottom:20px">
			<?php if(is_array($_SESSION['cart'])){ 
				$max=count($_SESSION['cart']);
                for($i=0;$i<$max;$i++){
                $pid=$_SESSION['cart'][$i]['productid'];
                $q=$_SESSION['cart'][$i]['qty'];
                $color=$_SESSION['cart'][$i]['color'];
                $pname=get_product_name($pid,$lang);
                $pimg=get_product_img($pid);
                $tongri=$q;
				
			
                if($q==0) continue;
			?>
			
			<div class="item_list_donhang">
				
			<div class="thumb_donhang">
				<img src="<?= _upload_product_l . $pimg ?>" width="75" height="75"/>
			</div>
		
			<div class="info_donhang">
				
				<div class="title_sanpham_donhang" ><?= $pname ?></div>
		
				<div class="qty">SL: <strong data-bind="text: $parent.qty"><?= $q ?></strong></div>
				
			</div>
			<div class="gia_thanh">
				 <span data-bind="text: getFormattedPrice($parent.row_total)"><?= number_format(get_price($pid), 0, ',', '.') ?>
                        &nbsp;đ</span>
			</div>
			<div class="clearfix"></div>

					</div>
			
			<?php }?>
			<div class="item_list_donhang">
			<div class="space_bottom_10">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-9">
					Tạm tính:
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3 text-right" ><?= number_format(get_order_total(), 0, ',', '.') ?>&nbsp;đ</div>
				<div class="clearfix"></div>
			</div>
			
			<div class="space_bottom_20 block_thanhtien">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
					Thành tiền:<br>
					(Đã bao gồm VAT)
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 text-right">
					<div class="txt_giatien" ><?= number_format(get_order_total(), 0, ',', '.') ?>&nbsp;đ</div>
				</div>
				<div class="clearfix"></div>
			</div>
			
			</div>
			
			<?php }?>
			
                
       
			 <div style=" ">
                            <input title='<?= _gui ?>' class="button_thanhtoan" type="submit" name="next" value="<?= _gui ?>" style="cursor:pointer;"/>
                       
                        </div>
			</div>			
		</div>
            </div>
		 </form>

        </div>
    </div>

</div><!--end main_content_web-->