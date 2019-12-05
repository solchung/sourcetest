

<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="title_right wow zoomInUp"><h2><?= $title_tcat ?></h2></div>
    </div>
</div>
    <?php
    $a_sid=array();
    foreach($_SESSION['ss'] as $k=>$v){
      $a_sid[$k]=$v['ssid'];
    }
   
    if($_GET['com']=='tim-kiem' || $_GET['com']=='tag') {?>
    <?php if(count($product)<1) {?>
    <p style="font-weight: bold;">
        Không tìm thấy thông tin sản phẩm. <a href="san-pham.html">Click vào đây để đến trang Sản phẩm</a>
    </p>
    <?php }?>
    <?php }?>

<div class="row pd0 mg0 ">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">	
	
<div class="box_product box_spnb">
    <?php for ($j = 0, $count_spmoi = count($product); $j < $count_spmoi; $j++) { ?>
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
			<a href="<?= $product[$j]["tenkhongdau_$lang"] ?>" title="<?=_xem?>" tabindex="0">
			<div class="item_duan wow flipInX" >

                    <div class="zoom_duan">
                        <img src="thumb/380x390/1/<?php
                        if ($product[$j]['photo'] != NULL)
                            echo _upload_product_l . $product[$j]['photo'];
                        else
                            echo 'images/no-image-available.png';
                        ?>" alt="<?= $product[$j]["ten_$lang"] ?>" />
						
						<div class="name_thietke">
								<h3>
									<?= $product[$j]["ten_$lang"] ?>
								</h3>
							
								
						</div>
                    </div>
              
            </div><!--item_product-->
			</a>
			</div>
<?php } ?>
    <div class="clear"></div>
    <div class="wrap_paging">
        <div class="paging paging_ajax clearfix"><?= pagesListLimit_layout($url_link, $totalRows, $pageSize, $offset) ?></div>
		
    </div><!--end wrap_paging-->
</div><!--box_product-->

</div>

</div>


