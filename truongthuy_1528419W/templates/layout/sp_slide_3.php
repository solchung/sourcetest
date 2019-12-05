<?php 
	$d->reset();
	$sql = "select ten_$lang,tenkhongdau_$lang,id,mota_$lang,photo,noibat from #_product_list where hienthi=1 and com='product' and noibat>0 order by stt asc";
	$d->query($sql);
	$list_menu_nb = $d->result_array();

?>


<?php for($i=0;$i<count($list_menu_nb);$i++){ ?>

<div class="box_sp_km">
    <div class="container" >
    
        <div class="content-container news-content">
            <div class="wrap-tabs ">
			<div class="row pd0 mg0 ">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
					<div class="title_right wow zoomInUp"  >
						<a href="<?=$list_menu_nb[$i]["tenkhongdau_$lang"]?>" ><h2 ><?=$list_menu_nb[$i]["ten_$lang"]?></h2></a>
					</div>
				</div>
			</div>
			
             <div  class="run_sp run_none">
		  <?php
			$d->reset();
			$sql = "select ten_$lang ,tenkhongdau_$lang ,id,photo,thumb,masp,color,giamgia,gia_vnd,spmoi,spbc,spkm from #_product where hienthi=1 and com='product' and id_list='".$list_menu_nb[$i]["id"]."' and spmoi>0 order by stt,id asc";		
			$d->query($sql);
			$products = $d->result_array();
                         
			for ($j = 0; $j < count($products); $j++) {?>
				<div class="">
			
				<div class="item_product wow flipInX" style="    width: 94.4%;">
				<a href="<?= $products[$j]["tenkhongdau_$lang"] ?>">
				
                    <div class="zoom_product">
                        <img src="thumb/275x200/1/<?php
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
            </div><!-- end wrap-tabs -->

        </div> 
    </div>   
</div>
<?php }?>

<script type="text/javascript">
    $(window).load(function () {
		callback_slick_bv();	
     
    });
	
	 function callback_slick_bv() {
				 $('.run_sp').slick({
					autoplay:true,
                    dots: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 1,
				
                    arrows:true,
                    responsive: [
                        {
                            breakpoint: 1124,
                            settings: {
                                slidesToShow: 3,
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
	