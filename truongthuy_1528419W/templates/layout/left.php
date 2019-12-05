
<div class="row pd0 mg0 ">


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">

	<div class="cate-pro">
	  
		<h4 class="title-catalog">Sản phẩm khuyến mãi</h4>
	</div><!--cate-pro-->	
	<div class="row pd0 mg0 bk_content_left">
		<div  class="run_sp_left run_none">
		<?php
		$d->reset();
		$sql = "select ten_$lang ,tenkhongdau_$lang ,id,photo,thumb,masp,color,giamgia,gia_vnd,spmoi,spbc,spkm from #_product where hienthi=1 and com='product' and spkm>0 order by stt,id asc";		
		$d->query($sql);
		$products = $d->result_array();
			 
		for ($j = 0; $j < count($products); $j++) {?>
		<div class="">

		<div class="item_product wow flipInX" style="    width:100%;">
		<a href="<?= $products[$j]["tenkhongdau_$lang"] ?>">

		<div class="zoom_product">
			<img src="thumb/280x280/1/<?php
			if ($products[$j]['photo'] != NULL)
				echo _upload_product_l . $products[$j]['photo'];
			else
				echo 'images/no-image-available.png';
			?>" alt="<?= $products[$j]["ten_$lang"] ?>" />
			
			<?php  if ($products[$j]['spmoi'] >0) {?>
			<div class="new_sp">
				New
			</div>
			<?php }?>
			<?php  if ($products[$j]['spkm'] >0) {?>
			<div class="km_sp">
				Sale
			</div>
			<?php }?>
			
		</div>


		<div class="name_product">
				<h3>
					<?= $products[$j]["ten_$lang"] ?>
				</h3>
					<?php if($products[$j]["giamgia"]>0){?>
					<p >Giá <span><?= number_format($products[$j]["giamgia"], 0, ",", ".") . " đ"; ?> 
						</span>
						<span class="i_giacu"class="i_giacu"><?php if ($products[$j]["gia_vnd"] == "") { ?> <?=_lienhe?> <?php } else { ?> <?= number_format($products[$j]['gia_vnd'], 0, ",", ".") . " đ"; ?> <?php } ?></span>
					</p>
					
				<?php }else{?>
					<p>Giá: <span><?php if ($products[$j]["gia_vnd"] <=0 ) { ?> <?=_lienhe?> <?php } else { ?> <?= number_format($products[$j]['gia_vnd'], 0, ",", ".") . " đ"; ?> <?php } ?></span></p>
				<?php }?>
		</div>
		</a>
		</div>
		</div>
					
		<?php } ?>
		</div> 

	</div>
	
</div>
</div>
<script type="text/javascript">
    $(window).load(function () {
		callback_slick_left();	
     
    });
	
	 function callback_slick_left() {
				 $('.run_sp_left').slick({
					autoplay:true,
                    dots: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 2,
                    slidesToScroll: 1,
					vertical:true,
                    arrows:false,
                    responsive: [
                        {
                            breakpoint: 1124,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                infinite: true
                               
                            }
                        },
                        {
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        }

                    ]
                });
		}
</script>