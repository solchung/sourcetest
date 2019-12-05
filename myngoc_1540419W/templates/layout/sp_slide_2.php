
<?php 

	
	$d->reset();
	$sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang,ngaytao from #_news where hienthi=1 and tinnoibat >0  and com='dambao'  order by stt asc ";
	$d->query($sql);
	$dambao=$d->result_array();

?>

<div class="box_visao">
	<div class="container ">
		<div class="title_right bk_none wow zoomInUp"  >
			<a >
				<h2 >TẠI SAO PHẢI TRÃI NGHIỆM TẠI ĐĂNG DƯƠNG ?</h2>
				<p class="">Chúng tôi luôn cho bạn những giá trị âm nhạc tốt nhất có thể khi các bạn đến với các khóa học của chúng tôi</p>
			</a>
		</div>
		
	
		<div class="row pd0 mg0 ">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
			<div class="run_dambao run_none">
			<?php for($i=0;$i<count($dambao);$i++) {?>
			                            
				<div class="item_dambao">
				<a href="<?= $dambao[$i]['tenkhongdau_' . $lang] ?>">
					<img src="thumb/110x110/1/<?= _upload_news_l . $dambao[$i]["photo"] ?>" alt="<?= $dambao[$i]['ten_' . $lang] ?>" > 
					<h3><?= $dambao[$i]['ten_' . $lang] ?></h3>
					<p><?= catchuoi($dambao[$i]['mota_' . $lang], 90) ?></p>
					<div class="clearfix"></div>
				</a>	
				</div>
			
			<?php }?>
			</div>
			</div>
		</div>
	</div>
</div>



<div class="duan_index">
    <div class="container" >
    
        <div class="content-container news-content">
            <div class="wrap-tabs ">
			<div class="row pd0 mg0 ">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
					

				<div class="title_right bk_white bk_none wow zoomInUp"  >
					<a href="khoa-hoc">
						<h2 >Các khóa học</h2>
						<p class="">Dưới đây là một số khóa học bên chúng tôi đang giảng dạy cho các học viên hiện nay</p>
					</a>
				</div>
					
				</div>
			</div>
			
              
                            <div class="box-line-sp run_none" >
							<?php 
							$d->reset();
							$sql = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id,mota_$lang as mota,photo,ngaytao from #_news where hienthi=1 and com='dichvu' and tinnoibat>0 order by stt asc";
							$d->query($sql);
							$congtrinh_nb = $d->result_array();
							for($j=0;$j<count($congtrinh_nb);$j++) {?>
								<div class="">
								<a href="<?=$congtrinh_nb[$j]['tenkhongdau']?>">
									 <div class="item_product_s wow flipInX" >

											<div class="zoom_product_s">
												<img src="thumb/380x280/1/<?php
												if ($congtrinh_nb[$j]['photo'] != NULL)
													echo _upload_news_l . $congtrinh_nb[$j]['photo'];
												else
													echo 'images/no-image-available.png';
												?>" alt="<?= $congtrinh_nb[$j]['ten'] ?>" />
												
												
											</div>
											<div class="name_product_s">
													<div class="post_date_n">
												
														
													</div>
													<h3>
														<?= $congtrinh_nb[$j]['ten'] ?>
													</h3>
													
											</div>
									  
										</div><!--item_product-->
								</a>		
								</div>						
							<?php }?>							
							</div>
               
            </div><!-- end wrap-tabs -->

        </div> 
    </div>   
</div>

<script type="text/javascript">
    $(window).load(function () {
		callback_slick();	
     
    });
	
	 function callback_slick() {
				 $('.box-line-sp').slick({
					autoplay:false,
                    dots: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 3,
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
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                });
		}
</script>



<script type="text/javascript">
	$(document).ready(function () {
		$('.run_dambao').slick({
			autoplay:true,
			dots: false,
			infinite: false,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 1,
		   
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: false,
						dots: false
					}
				},
				{
					breakpoint: 700,
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

	