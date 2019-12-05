
<script language="javascript">
      function addtocart(pid){
        document.form1.productid.value=pid;
        document.form1.command.value='add';
        document.form1.submit();
        return false;       
      }
    </script>
        <form name="form1" action="index.php">
            <input type="hidden" name="productid" />
            <input type="hidden" name="command" />
        </form>

<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="title_right "><h2><?= $com_title ?></h2></div>
    </div>
</div>

<div class="box_product box_spnb">
    <?php
    $a_sid=array();
foreach($_SESSION['ss'] as $k=>$v){
  $a_sid[$k]=$v['ssid'];
}
         
        for ($j = 0, $max=count($_SESSION['dx']); $j < $max; $j++) {
        $pid=$_SESSION['dx'][$j]['dxid'];
         
        $d->reset();
        $sql = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id,photo,thumb,masp,color,id_list,size,chatlieu,xuatxu,ri,spmoi,spkm,spbc,tinhtrang,giamgia from #_product where hienthi=1 and com='product' and id='".$pid."'  order by stt asc ";		
        $d->query($sql);
        $product = $d->fetch_array();
    ?>
    
    
    
    <script type="text/javascript">
    $(document).ready(function() {
      $('.thanhtoannhanh<?=$j?>').click(function(e) { 
          if(<?=$product['tinhtrang']?> > 0){
             $('#notice_cart').html('Sản phẩm hết hàng');
                      $('#notice_cart').fadeIn().delay(2500).fadeOut(); 
                      return flase;
          }
        var dem=0;
        var stt=0;
        var pid=0;
        stt=$("select.color<?=$j?>").val();
        pid =$(".pid<?=$j?>").val();
        $('.sluong1<?=$j?>').each(function(index, element) {
          var psluong = $(this).val();
          if(psluong>1000){
            alert('Bạn đã vượt quá số lượng cho phép.');
            return false;
            }
          if(psluong>0){
            dem++;
           
            var color = $("select.color<?=$j?> .load_color"+stt).data("title");
                
            $.ajax({
              type: "POST",
              url: "ajax/add_giohang.php", 
              dataType:'text',
              data: {pid:pid,psluong:psluong,color:color},
              success: function(string){
                  var getData = $.parseJSON(string);
                  console.log(getData);                
                  var result = getData.result_giohang;                
                  var count = getData.count;                             
                  if(result > 0) { 
                      $('#notice_cart').html('Bạn đã thêm thành công sản phẩm này vào giỏ hàng');
                      $('#notice_cart').fadeIn().delay(2500).fadeOut();
                   // alert('Bạn đã thêm thành công sản phẩm này vào giỏ hàng');      
                    $('.soluong_e').html(count);
                  }
                    else if (result == -1)alert('Sản phẩm này không tồn tại');
                    else if (result == 0)alert('Sản phẩm này đã có trong giỏ hàng');
                }          
              });
          }//end if
        });//end each
        if(dem<=0){
          alert('Nhập số lượng sản phẩm cần mua.');
        }
      });//end click

  });
</script> 

<script type="text/javascript">

            $(document).ready(function () {
                $('a.btn_love<?=$j?>').click(function () {
                    if($(this).find('.save<?=$j?>').hasClass('active_love')){
                        var id = $(this).data('value');
                        $.ajax({
                            type: "POST",
                            url: "ajax/ajax_yeuthich.php",
                            dataType: "json",
                            data:  {id:id,cmd:'del'},
                            success: function (res) {
                                $('#notice_cart').html('');
                                if (res['kq'] == 1)
                                    $('#notice_cart').html('Đã xóa khỏi danh sách yêu thích');
                                $('#notice_cart').fadeIn().delay(2500).fadeOut();
                                $('.yeuthich_e').attr('value', res['comp_total']);
                                $('.yeuthich_e').html(res['comp_total']);
                                $(".save<?=$j?>").removeClass("active_love");
                            }
                        });
                        return false;
                    }else{
                        var id = $(this).data('value');
                        $.ajax({
                            type: "POST",
                            url: "ajax/ajax_yeuthich.php",
                            dataType: "json",
                            data: {id:id,cmd:'add'},
                            success: function (res) {
                                $('#notice_cart').html('');
                                if (res['kq'] == 0)
                                    $('#notice_cart').html('Đã thêm vào danh sách yêu thích');
                                $('#notice_cart').fadeIn().delay(2500).fadeOut();
                                $('.yeuthich_e').attr('value', res['comp_total']);
                                $('.yeuthich_e').html(res['comp_total']);
                                $(".save<?=$j?>").addClass("active_love");
                            }
                        });
                        return false;
                    }
                });
            });


        </script>

  
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 pd0 ">

            <div class="item_product" >
                <a href="san-pham/<?= $product["tenkhongdau"] ?>-<?= $product["id"] ?>.html">
                    <div class="zoom_product">
                        <img src="thumb/280x320/1/<?php
                        if ($product['photo'] != NULL)
                            echo _upload_product_l . $product['photo'];
                        else
                            echo 'images/no-image-available.png';
                        ?>" alt="<?= $product['ten'] ?>" />
                    </div>
                    <div class="name_product">
                        <h3>
                            <?= $product['ten'] ?>
                        </h3>
						<img src="images/icon_star.png" alt="<?= $product['ten'] ?>" />
                        <p><?php if ($product["gia_vnd"] <=0 ) { ?> <?= _lienhe ?> <?php } else { ?> <?= number_format($product['gia_vnd'], 0, ",", ".") . " VNĐ"; ?> <?php } ?></p>

                    </div>
					<?php if ($product["giamgia"] >0 ) { ?>
					<div class="i_giamgia">
					<p>-<?=$product["giamgia"]?>%</p>
					</div>
                    <?php }?>
             
                </a>
                              
            </div><!--item_product-->

        </div>
<?php } ?>
    <div class="clear"></div>
<!--    <div class="wrap_paging">
        <div class="paging paging_ajax clearfix"><?= pagesListLimit_layout($url_link, $totalRows, $pageSize, $offset) ?></div>
    </div>-->
    <!--end wrap_paging-->
</div><!--box_product-->




