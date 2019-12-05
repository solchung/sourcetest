
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
         
        for ($j = 0, $max=count($_SESSION['ss']); $j < $max; $j++) {
        $pid=$_SESSION['ss'][$j]['ssid'];
         
        $d->reset();
        $sql = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id,photo,thumb,masp,color,id_list,size,chatlieu,xuatxu,ri,spmoi,spkm,spbc,tinhtrang from #_product where hienthi=1 and com='product' and id='".$pid."'  order by stt asc ";		
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

        <?php $color = explode('|', $product['color']); ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pd0 five_sp">

            <div class="item_product" >
                <a href="san-pham/<?= $product["tenkhongdau"] ?>-<?= $product["id"] ?>.html">
                    <div class="zoom_product">
                        <img src="thumb/228x190/2/<?php
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
                        <p>MSP:<?= $product['masp'] ?></p>

                    </div>
                    <?php 
                    if($product['spmoi']>0){
                    ?>
                    <img class="new_sp" src="images/icon_new.png" alt="new">
                    <?php }?>
                    <?php 
                    if($product['spkm']>0){
                    ?>
                    <img class="km_sp" src="images/icon_km.png" alt="khuyến mãi">
                    <?php }?>
                    <?php 
                    if($product['spbc']>0){
                    ?>
                    <img class="hot_sp" src="images/icon_hot.png" alt="bán chạy">
                    <?php }?>
                    <?php
                    if($product['tinhtrang']>0){
                    ?>
                    <img class="tt_sp" src="images/outstock.png" alt="tình trang">
                    <?php }?>
                    
                    <div class="hover_sp">
                        <div class="row pd0 mg0 line_sp pd_sp">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0 left_sp">Size</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0 right_sp"><?= $product["size"] ?></div>
                        </div>
                        <div class="row pd0 mg0 line_sp pd_sp">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0 left_sp">Chất liệu</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0 right_sp"><?= $product["chatlieu"] ?></div>
                        </div>
                        <div class="row pd0 mg0 line_sp pd_sp">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0 left_sp">Xuất xứ</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0 right_sp"><?= $product["xuatxu"] ?></div>
                        </div>
                        <div class="row pd0 mg0 pd_sp">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0 left_sp">Ri</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0 right_sp"><?= $product["ri"] ?></div>
                        </div>
                        <div class="row pd0 mg0" style="width: 100%;text-align: center" >
                        <a href="san-pham/<?= $product["tenkhongdau"] ?>-<?= $product["id"] ?>.html" class="xem_sp">Xem chi tiết</a>
                        </div>
                            
                    </div>
                </a>
                <div class="order_product">
                    <div class="top_order">
                        <div class="cont_sg" style="display:none;height:0px;">
                            <input type="hidden" name="color" class="color" data-rel="0">
                            
                          </div>
                          <input type="hidden" value="<?=$product['id']?>" class="pid<?=$j?>">
                    </div>
                    <div class="row pd0 mg0">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0">
                            <div class="row pd0 mg0">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0">
                                    <p>Số lượng(Ri)</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0">
                                    <input  type="number" min="0" class="sluong1<?=$j?> sl_order" name="sluong1" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0">
                            <div class="row pd0 mg0">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0">
                                    <p>Màu sắc</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0">
                                    <select  class="color<?=$j?> <?php  if($product['color']=='') echo'opacity_color'; ?>" <?php  if($product['color']=='') echo'disabled'; ?>>
                                       <?php if($product[$j]['color']==''){?>
                                        <option>Chọn</option>
                                        <?php }?>
                                        <?php for($i=0;$i<count($color);$i++){?>
                                        <option class="load_color<?=$i+1?>" max="1"  data-rel="<?=$i+1?>" value="<?=$i+1?>" data-title="<?=$color[$i]?>"><?=$color[$i]?></option>
                                        <?php }?>
                                    </select>                                 
                                </div>
                            </div>
                        </div>
                    </div>       
                    <div class="row pd0 mg0 text_order">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0 ">
                             <a data-value="<?=$product['id']?>" class="btn_love<?=$j?> po">
                            <div class="love save<?=$j?>  <?php if(in_array($product['id'],$a_sid)) echo 'active_love';?>"><img src="images/icon_heart.png" alt="heart"/></div>
                            <p>Yêu thích</p>
                           </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0 line_order">
                            <a class="po thanhtoannhanh<?=$j?>"  data-id="<?=$product["id"]?>" >
                            <div class="order"><img  src="images/icon_order.png" alt="order"/></div>
                            <p>Thêm vào giỏ</p>
                            </a>
                        </div>
                    </div> 
                </div>                
            </div><!--item_product-->

        </div>
<?php } ?>
    <div class="clear"></div>
<!--    <div class="wrap_paging">
        <div class="paging paging_ajax clearfix"><?= pagesListLimit_layout($url_link, $totalRows, $pageSize, $offset) ?></div>
    </div>-->
    <!--end wrap_paging-->
</div><!--box_product-->




