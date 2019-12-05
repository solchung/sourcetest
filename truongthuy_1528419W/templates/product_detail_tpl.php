

<script type="text/javascript">
    var mzOptions = {zoomMode: "magnifier"};
    MagicZoomPlus.options = {
        'pan-zoom': false,
        'expand-size': 'width=480'
    }


</script>
<style>

</style>


<br>
<div class="row pd0 mg0 ">

<div class="product">
    <div class="box_content">  
		
		<div class="row pd0 mg0 ">
				    <div class="col-lg-6 col-md-6  col-sm-6 col-xs-6  des320  " style="text-align: center">
		<div class="ct-l col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">

				<div class="ct-img">

					<a id="Zoomer" href="thumb1/600x400/2/<?= _upload_product_l . $row_detail["photo"] ?>"  class="MagicZoom" data-options="zoomMode: magnifier;" title="<?= $row_detail["ten_$lang"] ?>">
						<img style="max-width: 100%;height: auto" src="thumb1/600x400/2/<?= _upload_product_l . $row_detail["photo"] ?>" border="0" style="float:left;" />
					</a>

				</div>
			</div><!--End ct-1-->
			 <div class="ct-sp-j hinh_anh_1 col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
				<?php
				$count_hinhanh = count($album_hinh);
				//echo $count_hinhanh; exit;
				if ($count_hinhanh > 0) {
					?>   
					<div id="slideShow" class="run_none">               
				
						<div class="i_pic_con ">

							<a href="thumb1/600x400/2/<?= _upload_product_l . $row_detail['photo'] ?>" rel="zoom-id: Zoomer" rev="thumb1/600x400/2/<?= _upload_product_l . $row_detail['photo'] ?>" title="<?= $row_detail['ten'] ?>"><img src="thumb1/600x400/2/<?= _upload_product_l . $row_detail['photo'] ?>" class="jshop_img_thumb" /></a>
						</div>			 
						<?php for ($i = 0; $i < $count_hinhanh; $i++) { ?>       
							
						<div class="i_pic_con ">

							<a href="thumb1/600x400/2/<?= _upload_product_l . $album_hinh[$i]['photo'] ?>" rel="zoom-id: Zoomer" rev="thumb1/600x400/2/<?= _upload_product_l . $album_hinh[$i]['photo'] ?>" title="<?= $row_detail['ten'] ?>"><img src="thumb1/600x400/2/<?= _upload_product_l . $album_hinh[$i]['photo'] ?>" class="jshop_img_thumb" /></a>
						</div>
							
					<?php } ?>                                
						  
				   
					</div>
				<?php } ?> 

			</div><!--ct-sp-j-->

		</div><!--End colum-->
        <div class="col-lg-6 col-md-6  col-sm-6 col-xs-6 des320  ">
            <ul class="product_info_2">
				
				<li class="noborder"> <h3><?= $row_detail["ten_$lang"]?></h3></li>
				<li class="noborder"> <b><?= _mota ?>: </b> <?= $row_detail["mota_$lang"] ?></li>
				<?php if($row_detail["dientich"]!=""){?>
				<li class="noborder"> <b><?= _tinhtrang?>: </b> <span style="color:#F00;"> <?= $row_detail["dientich"] ?></span> </li>
				<?php }?>
				<?php if($row_detail["giamgia"]>0){?>
				<li><b><?=_giamoi?>: <span style="color:#F00;">  <?php if ($row_detail["giamgia"] <=0) { ?> <?= _lienhe ?> <?php } else { ?> <?= number_format($row_detail['giamgia'], 0, ",", ".") . " VNĐ"; ?> <?php } ?></span></b></li>
				<li><b><?=_giacu?>: <span style="color:#d2d2d2;text-decoration: line-through;"><?php if ($row_detail["gia_vnd"] == "") { ?> <?= _lienhe ?> <?php } else { ?> <?= number_format($row_detail['gia_vnd'], 0, ",", ".") . " VNĐ"; ?> <?php } ?></span></b></li>
				<?php }else{?>
                <li><b><?=_gia?>: <span style="color:#F00;"><?php if ($row_detail["gia_vnd"] <=0) { ?> <?= _lienhe ?> <?php } else { ?> <?= number_format($row_detail['gia_vnd'], 0, ",", ".") . " VNĐ"; ?> <?php } ?></span></b></li>
				<?php }?>
			
                <li><b><?= _ngaydang ?>:</b><?= date('d-m-Y', $row_detail["ngaytao"]) ?></li>   

                <li class="noborder"><b><?= _luotxem ?>:</b> <?= $row_detail['luotxem'] ?></li>
			
           
            </ul> 
            <div style="margin:10px 0">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style">
                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                    <a class="addthis_button_tweet"></a>
                    <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                    <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar": false};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52843d4e1ff0313a"></script>
                <!-- AddThis Button END -->
            </div>

        </div> 
		  <div class="thongtin_sp">
            <div class="clear" style="height:20px;"></div>
            <div id="info_deals" class="usual"> 
                <ul id="tab_content">
                    <li ><a href="#" name="tab1"><?=_thongtinsanpham?></a></li>
                    <li ><a href="#" name="tab2"><?= _binhluan?></a></li>
					
                </ul>
                <div id="tab1" class="content_tab">
                     <?= $row_detail["noidung_" . $lang] ?>
                        <div class="clear"></div>
                </div>
                <div id="tab2" class="content_tab">
					          <div class="fb-comments" data-href="<?= getCurrentPageURL(); ?>" data-width="100%" data-num-posts="10"></div>
    
                        <div class="clear"></div>
                </div>
			
            </div>
            
            <div class="clear"></div>
        </div>
        <!---end tag-->
		
			</div>
	
		

    </div>   
</div>

	
</div>

<div class="clear" style="height:20px;"></div>


<div class="title_right"><h2>Sản phẩm cùng loại</h2></div>
   

<div class="box_spnb">
<div class="row pd0 mg0">
	  <div  class="">
		  <?php
		
                         
			for ($j = 0; $j < count($sanpham_khac); $j++) {?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 pad_des">
			
				<div class="item_product wow flipInX">
				<a href="<?= $sanpham_khac[$j]["tenkhongdau_$lang"] ?>">
				
                    <div class="zoom_product">
                        <img src="thumb/270x235/1/<?php
                        if ($sanpham_khac[$j]['photo'] != NULL)
                            echo _upload_product_l . $sanpham_khac[$j]['photo'];
                        else
                            echo 'images/no-image-available.png';
                        ?>" alt="<?= $sanpham_khac[$j]["ten_$lang"] ?>" />
						
						<?php  if ($sanpham_khac[$j]['spmoi'] >0) {?>
						<div class="new_sp">
							New
						</div>
						<?php }?>
						<?php  if ($sanpham_khac[$j]['spkm'] >0) {?>
						<div class="km_sp">
							Sale
						</div>
						<?php }?>
						
                    </div>
                   
				
					<div class="name_product">
							<h3>
								<?= $sanpham_khac[$j]["ten_$lang"] ?>
							</h3>
								<?php if($sanpham_khac[$j]["giamgia"]>0){?>
								<p >Giá <span><?= number_format($sanpham_khac[$j]["giamgia"], 0, ",", ".") . " VNĐ"; ?> 
									</span>
									<span class="i_giacu"class="i_giacu"><?php if ($sanpham_khac[$j]["gia_vnd"] == "") { ?> <?=_lienhe?> <?php } else { ?> <?= number_format($sanpham_khac[$j]['gia_vnd'], 0, ",", ".") . " VNĐ"; ?> <?php } ?></span>
								</p>
								
							<?php }else{?>
								<p>Giá: <span><?php if ($sanpham_khac[$j]["gia_vnd"] <=0 ) { ?> <?=_lienhe?> <?php } else { ?> <?= number_format($sanpham_khac[$j]['gia_vnd'], 0, ",", ".") . " VNĐ"; ?> <?php } ?></span></p>
							<?php }?>
				    </div>
                </a>
				</div>
				</div>
								
			<?php } ?>
	</div>
</div><!--box_product-->
</div>
<script>
$(".content_tab[id^='tab']").hide(); // Hide all content
    $("#tab_content li:first").attr("id","current"); // Activate the first tab
    $(".content_tab#tab1").fadeIn(); // Show first tab's content
    
    $('#tab_content a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return;       
        }
        else{             
          $(".content_tab").hide(); // Hide all content
          $("#tab_content li").attr("id",""); //Reset id's
          $(this).parent().attr("id","current"); // Activate this
          $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
        }
    });
</script>

<script type="text/javascript">
            $(document).ready(function () {
                $('#slideShow').slick({
                    dots: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 8,
                    slidesToScroll: 1,
					vertical:false,
					infinite: true,
					autoplay: true,
                    autoplaySpeed: 100,
					speed: 3000,
					cssEase: 'linear'
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 6,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: false
                            }
                        },
                        {
                            breakpoint: 810,
                            settings: {
								vertical:false,
                                slidesToShow: 4,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
								vertical:false,	
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        }

                    ]
                });
            });
			

        </script>