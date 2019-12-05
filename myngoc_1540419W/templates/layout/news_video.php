
<?php 	  
	$d->reset();
	$sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang,ngaytao,mota_$lang as mota from #_news where hienthi=1 and com='news' and tinnoibat>0 order by stt asc ";
	$d->query($sql);
	$truyenthong=$d->result_array();
	
	$d->reset();
	$sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang,ngaytao,mota_$lang as mota from #_news where hienthi=1 and com='khachhang' and tinnoibat>0 order by stt asc ";
	$d->query($sql);
	$ykiien=$d->result_array();

?>
<div class="box_khachhang">
<div class=" container">

    <div class="row pd0 mg0">	
	
		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
			<div class="title_right wow zoomInUp">
                    <h2 >Ý kiến khách hàng</h2><span></span>
                </div>
			<div class="box_line_kh">
			<div class="scroll_ykien run_none">
				<?php for ($i = 0; $i < count($ykiien); $i++) { ?>
				<div class="">
					
						<div class="list_tin_ykien">
						 <a href="<?=$ykiien[$i]["tenkhongdau_$lang"]?>">
							
							<div class="list_tin_thongtin ">
							
								<img src="thumb/140x140/1/<?= _upload_news_l . $ykiien[$i]["photo"] ?>" alt="<?= $ykiien[$i]['ten_' . $lang] ?>" >

							</div>
							<div class="list_tin_mota">
																		
									<p class="mota"><?=catchuoi($ykiien[$i]["mota_$lang"],120)?></p>
									<h3>
									
										<?=$ykiien[$i]["ten_$lang"]?>
										<p>Khách hàng</p>	
									</h3>
									
							</div>	
							
						</a>
	
					</div>
					
				</div>
				<?php } ?>
			</div>
			<div>
		</div>
	
		
	</div>
</div>
</div>	

<div class="hinhanh_index">
<div class=" container">
			<div class="title_right   wow zoomInUp"  >
			<a href="thu-vien-anh" >
			<h2 >Thư viện ảnh</h2>
			
			</a>
		
			</div>
			<?php 
			$d->reset();
			$sql = "select photo,link, ten_$lang , mota_$lang as mota from #_image_url where hienthi=1 and com= '".$loai."hinhanh' order by stt,id desc";
			$d->query($sql);
			$hinhanh_nb = $d->result_array();	
			?>
			<div id="gallery" class="video_des">
				<div class="row pd0 mg0">
						
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pad_video_1">
						<div class="row pd0 mg0">
						<?php for($j=0;$j<2;$j++) {?>
					
						
						
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pad_video_2 fadeIn wow">
					
							<a href="<?php if ($hinhanh_nb[$j]['photo'] != NULL)
																		echo _upload_hinhanh_l . $hinhanh_nb[$j]['photo'];
																	else
																		echo 'images/no-image-available.png';
																	?>" >	
							<div class="item_video">
						
								<img src="thumb/375x230/1/<?php
													if ($hinhanh_nb[$j]['photo'] != NULL)
														echo _upload_hinhanh_l . $hinhanh_nb[$j]['photo'];
													else
														echo 'images/no-image-available.png';
													?>" alt="<?=$hinhanh_nb[$j]["ten_$lang"]?>"/>

								<div class="hover_video">
									<h3><?=$hinhanh_nb[$j]["ten_$lang"]?></h3>
								</div>
								
							</div>
							</a>
							</div>
						
						
				
						<?php }?>
						</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pad_video fadeIn wow">
							<a href="<?php if ($hinhanh_nb[2]['photo'] != NULL)
																		echo _upload_hinhanh_l . $hinhanh_nb[2]['photo'];
																	else
																		echo 'images/no-image-available.png';
																	?>" >	
							<div class="item_video">
								<img src="thumb/435x490/1/<?php
													if ($hinhanh_nb[2]['photo'] != NULL)
														echo _upload_hinhanh_l . $hinhanh_nb[2]['photo'];
													else
														echo 'images/no-image-available.png';
													?>" alt="<?=$hinhanh_nb[2]["ten_$lang"]?>"/>
						
								<div class="hover_video">
									<h3><?=$hinhanh_nb[2]["ten_$lang"]?></h3>
								</div>
							</div>
							</a>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pad_video_1">
						<div class="row pd0 mg0">
						<?php for($j=3;$j<5;$j++) {?>
					
						
						
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pad_video_2 fadeIn wow">
					
								<a href="<?php if ($hinhanh_nb[$j]['photo'] != NULL)
																		echo _upload_hinhanh_l . $hinhanh_nb[$j]['photo'];
																	else
																		echo 'images/no-image-available.png';
																	?>" >	
							<div class="item_video">
						
								<img src="thumb/375x230/1/<?php
													if ($hinhanh_nb[$j]['photo'] != NULL)
														echo _upload_hinhanh_l . $hinhanh_nb[$j]['photo'];
													else
														echo 'images/no-image-available.png';
													?>" alt="<?=$hinhanh_nb[$j]["ten_$lang"]?>"/>

								<div class="hover_video">
									<h3><?=$hinhanh_nb[$j]["ten_$lang"]?></h3>
								</div>
								
							</div>
							</a>
							</div>
						
						
				
						<?php }?>
						</div>
						</div>
						
						</div>
			</div>
			<div class="text_center">
								<a href="hinh-anh"  >
                                    <p  class="icon_xemthem"><?=_xemthem?></p>
								</a>
								</div>	
			</div>
	
</div>	
<div class="box_tienich">
<div class="container">
    <div class="row pd0 mg0">
        
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInLeft ">
                <div class="title_tienich ">
                    <h3 >Tin tức </h3><span></span>
                </div>
				     <?php if(count($truyenthong)>0) {?>
                <div class="box_tin_nb">
                    <div class="row pd0 mg0 box_tin_none">
                  
                        <div class="">
						<div id="bx-pagerdv">
                            <?php for ($i = 0; $i < count($truyenthong); $i++) { ?>
							<div>
                                <a href="<?= $truyenthong[$i]['tenkhongdau_' . $lang] ?>" title="<?= $truyenthong[$i]['ten_' . $lang] ?>">
                                    <div class="list_tin_nb">
                                        <img src="thumb/165x165/1/<?= _upload_news_l . $truyenthong[$i]["photo"] ?>" alt="<?= $truyenthong[$i]['ten_' . $lang] ?>" > 
                                        <h3><?= $truyenthong[$i]['ten_' . $lang] ?></h3>
                                        <p><?= catchuoi($truyenthong[$i]['mota_' . $lang], 90) ?></p>
										<div class="clear">
										</div>
                                    </div>
                                </a>
								</div>
                            <?php } ?>
							</div>
                        </div>
                    </div>
                    <ul class="list_rp_nb" style="display: none">
                        <?php for ($i = 0; $i < count($truyenthong); $i++) { ?>
                            <li>
                                <a href="<?= $truyenthong[$i]['tenkhongdau_' . $lang] ?>" title="<?= $truyenthong[$i]['ten_' . $lang] ?>"><?= $truyenthong[$i]['ten_' . $lang] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
					 <?php }?>
            </div>
		
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInRight">
				<div class="title_tienich wow zoomInUp">
                    <h3 >Video Clip</h3><span></span>
                </div>
				<?php include _template . "layout/video.php"; ?>
			</div>
			
          
			
			
         
        </div>
    </div> 
</div>
<script type="text/javascript">
	$(document).ready(function () {

		
		$('.scroll_ykien').slick({
		
			autoplay:true,
			arrows:false,
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 2,
			slidesToScroll: 1,
		
			cssEase: 'linear',
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						infinite: true,
						dots: false
					}
				},
				{
					breakpoint: 700,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}

			]
		});

	});
</script>
<script type="text/javascript">
            $(document).ready(function () {
				
				  $('#bx-pagerdv').slick({
                    dots: false,
                    autoplay:true,
					infinite: true,arrows:false,
                    speed: 300,
                    slidesToShow:2,
                    slidesToScroll: 1,
					vertical: true,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: false
                            }
                        },
                        {
                            breakpoint: 600,
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


            });
        </script>