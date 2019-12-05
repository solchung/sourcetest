

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
	
<div class=" box_spnb">
    <?php for ($j = 0, $count_spmoi = count($product); $j < $count_spmoi; $j++) { ?>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pad_des">
			<div class="item_product wow flipInX" >
                <a href="<?= $product[$j]["tenkhongdau_$lang"] ?>">
                    <div class="zoom_product">
                        <img src="thumb1/270x235/1/<?php
                        if ($product[$j]['photo'] != NULL)
                            echo _upload_product_l . $product[$j]['photo'];
                        else
                            echo 'images/no-image-available.png';
                        ?>" alt="<?= $product[$j]["ten_$lang"] ?>" />
						<?php  if ($product[$j]['spmoi'] >0) {?>
						<div class="new_sp">
							New
						</div>
						<?php }?>
						<?php  if ($product[$j]['spkm'] >0) {?>
						<div class="km_sp">
							Sale
						</div>
						<?php }?>
						
                    </div>
                   
				
					<div class="name_product">
							
							<h3>
								<?= $product[$j]["ten_$lang"] ?>
							</h3>	<?php if($product[$j]["giamgia"]>0){?>
								<p >Giá <span><?= number_format($product[$j]["giamgia"], 0, ",", ".") . " VNĐ"; ?> 
									</span>
									<span class="i_giacu"class="i_giacu"><?php if ($product[$j]["gia_vnd"] == "") { ?> <?=_lienhe?> <?php } else { ?> <?= number_format($product[$j]['gia_vnd'], 0, ",", ".") . " VNĐ"; ?> <?php } ?></span>
								</p>
								
							<?php }else{?>
								<p>Giá: <span><?php if ($product[$j]["gia_vnd"] <=0 ) { ?> <?=_lienhe?> <?php } else { ?> <?= number_format($product[$j]['gia_vnd'], 0, ",", ".") . " VNĐ"; ?> <?php } ?></span></p>
							<?php }?>
						
				    </div>
                </a>
			
                              
            </div><!--item_product-->
	</div>
<?php } ?>
    <div class="clear"></div>
    <div class="wrap_paging">
        <div class="paging paging_ajax clearfix"><?= pagesListLimit_layout($url_link, $totalRows, $pageSize, $offset) ?></div>
		
    </div><!--end wrap_paging-->
</div><!--box_product-->

</div>

</div>


