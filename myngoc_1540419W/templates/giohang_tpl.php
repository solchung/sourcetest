<?php
//print_r($_SESSION['cart']);

if(@$_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if(@$_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	
	else if(@$_REQUEST['command']=='update'){

		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			
			
			
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Một số sản phẩm không cập nhật !, số lượng phải là một số giữa 1 và 999';
			}
		}
	}
?>
<script type="text/javascript">
	function del(pid){
		if(confirm('Bạn có thực sự muốn xóa mục này')){
			document.form2.pid.value=pid;
			document.form2.command.value='delete';
			document.form2.submit();
		}
	}
	function clear_cart(){
		if(confirm('Điều này sẽ làm cho giỏ hàng của bạn trống, tiếp tục không?')){
			document.form2.command.value='clear';
			document.form2.submit();
		}
	}
	function update_cart(){
		document.form2.command.value='update';
		document.form2.submit();
	}
</script>

<script type="text/javascript">
    function numberFormat(num, ext) {
        ext = (!ext) ? '  VNĐ' : ext;
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ext;
    }
    function updatePrice() {
        $tt = 0;
        $(".price_tt").each(function () {
            $h = $(this).html().replace(/\./g, "");
			//alert($h);
            $tt += parseInt($h);

        })
		


    }
    function price($val) {
        return parseInt($val.replace(/\./g, ""));
    }
    $(document).ready(function (e) {
        $(".change_qty").change(function () {

            $val = parseInt($(this).val());
            $id = $(this).data("id");
			$sori = $(this).data("sori");
			
			$color=$(this).data("color");
			
			if($val>1000){
            alert('Bạn đã vượt quá số lượng cho phép.');
            return false;
            }
			
			$tongri=$val;
            if (parseInt($val) < 1) {
                $(this).val(1);
                $val = 1;
            }
            $root = $(this).parents("tr");
            $price = parseInt($(this).data("price"));
            if ($price < 1) {
                $price = 0;
            }
			
			$root.find(".socai").html((parseInt($tongri)));
            $root.find(".price_tt").html(numberFormat(parseInt($price*$tongri)));
			$.ajax({
                url: "ajax/cart.php?type=update_qty",
                data: {"qty": $val, id: $id, color: $color,sori: $sori},
                type: "post",
                success: function (data) {
					
					$(".get_order_total").html(numberFormat(data))
                    updatePrice();
                }

            })
        })
    });
</script> 

<div id="main_content_web">


	<div class="block_content">


<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="title_right "><h2><?=_giohang?></h2></div>
    </div>
</div>
    


    <div class="clear"></div>
    <div class="show-info-web">  
      <form name="form2" method="post">
        <input type="hidden" name="pid" />
        <input type="hidden" name="command" />
        <table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size: 11px;" width="100%">
          <?php
			if(!empty($_SESSION['cart'])){
				echo '<tr class="bg-top-cart" >
				<td align="center">'._stt.'</td>
				<td align="center">'._masp.'</td>
				<td align="center">'._ten.'</td>
				<td align="center">'._hinhanh.'</td>
                              
				<td align="center" class="mobi_off">'._dongia.'</td>
				
                <td align="center">'._soluong.'</td>
				
				<td align="center"class="mobi_off">'._thanhtien.'</td>
				<td align="center">'._xoa.'</td>				
				</tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$color=$_SESSION['cart'][$i]['color'];
					
					$pname=get_product_name($pid,$lang);
					$pimg=get_product_img($pid);
					$sori=$q;
					$tongri=$q;
					if($q==0) continue;
			?>
            <tr bgcolor="#FFFFFF" style="text-align: center">
            <td width="3%" align="center" style="height: 25px;"><?=$i+1?></td>
            <td width="10%"><?=get_product_code($pid)?></td>
            <td width="15%"><?=$pname?></td>
			  <td width="10%"><img src="<?=_upload_product_l.$pimg?>" width="100" style="max-height:100px; margin-top:5px; margin-bottom:5px;"/></td>
			
	   	
            <td width="15%" align="center" class="mobi_off"><?=number_format(get_price($pid),0, ',', '.')?>
              &nbsp;VNĐ</td>
          
            <td width="15%" align="center" class="number-wrapper"><input type="number" data-sori="<?=$sori?>" data-id="<?=$pid?>" data-price="<?=get_price($pid)?>" data-color="<?=$color?>" maxlength="3" name="product<?=$pid?>" class="change_qty" value="<?=$q?>" maxlength="3" style="text-align:center; border:1px solid #d2d2d2 ;width: 40px ;height: 40px" />
              &nbsp;</td>
           
            <td width="40%" align="center" class="price_tt mobi_off "><?=number_format(get_price($pid)*$tongri,0, ',', '.') ?> &nbsp;VNĐ</td>
            <td width="10%" align="center"><a href="javascript:del(<?=$pid?>)"><img src="images/delete.png" border="0" /></a></td>
          </tr>
          <?php					
				}
			?>
          <tr>
            <td colspan="10" style="background:#E6E6E6; height:20px; color: #666;text-align: right"><b>Tổng đơn hàng:
              <span style="color: #F60;" class="get_order_total"><?=number_format(get_order_total(),0, ',', '.')?></span>
              &nbsp;VNĐ</b></td>

          </tr>
          <tr>
            <td colspan="7" align="right" style="padding:10px 0 0 0"><input type="button" value="<?=_tieptucmuahang?>" onclick="window.location='container-house'" class="button">
            <?php
				if(!empty($_SESSION['cart']) and count($_SESSION['cart'])>0){
			?>
              <input type="button" value="<?=_xoatatca?>" onclick="clear_cart()" class="button">
              <?php /*?><input type="button" value="<?=_capnhatgh?>" onclick="update_cart()" class="button"><?php */?>
              <input type="button" value="<?=_datmua?>" onclick="window.location='thanh-toan'" class="button">
            <?php
				}
			?>
             </td>
          </tr>
          <?php
            } else {
				echo "<tr><td>"._emptycart."</td>";
		}
            ?>
        </table>
      </form>
  </div>
</div>


</div><!--end main_content_web-->	

