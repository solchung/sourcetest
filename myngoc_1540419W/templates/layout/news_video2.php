<?php 
	  $d->reset();
	  $sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang,ngaytao from #_news where hienthi=1 and com='tailieu' and tinnoibat>0 order by stt asc ";
	  $d->query($sql);
	  $giaithuong=$d->result_array();
	  
	  $d->reset();
		$sql = "select ten_$lang, mota_$lang, photo from #_image_url where hienthi=1 and com='solieu' order by stt,id desc";
		$d->query($sql);
	  $solieu=$d->result_array();

?>



<div class="box_tienich">
<div class=" container">
    <div class="row pd0 mg0">
        
			<div class="box_t_left col-lg-8 col-md-8 col-sm-12 col-xs-12 pd0">
				<div class="title_tienich wow zoomInUp">
                    <h3 ><?=_giaithuong?></h3><span></span>
                </div>
				 <div class="box_doitac2">
				<?php for ($i = 0; $i < count($giaithuong); $i++) { ?>
				<div class="img_doitac">
								<a href="http://<?= $config_url ?>/giai-thuong/<?=$giaithuong[$i]["tenkhongdau_$lang"]?>-<?=$giaithuong[$i]['id']?>.html" title="<?= $giaithuong[$i]["ten_$lang"] ?>">
									<img src="thumb/235x190/2/<?php if ($giaithuong[$i]['photo'] != NULL) echo _upload_news_l . $giaithuong[$i]['photo'];
									else echo 'images/no-image-available.png'; ?>"  >
								</a>
				</div>
				<?php }?>
        </div>
            </div>
		
			<div class="box_t_right col-lg-4 col-md-4 col-sm-12 col-xs-12 pd0" style="overflow:hidden">
						<div class="text_center wow zoomInUp">
				 <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                </script>
            <div class="fb-page" data-href="<?=$row_setting['fanpage']?>" data-width="605" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?=$row_setting['fanpage']?>"><a href="<?=$row_setting['fanpage']?>">Facebook</a></blockquote></div></div>
				</div>
			
			</div>
			
          
			
			
         
        </div>
    </div> 
</div>

<script type="text/javascript">
            $(document).ready(function () {
                $('.box_doitac2').slick({
                    dots: false,
					autoplay:true,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                   
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
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
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                });

            });
        </script>
	<div class="box_solieu">
		<div class="container pd0">
			<div class="row pd0 mg0">
			<?php for($i=0;$i<count($solieu);$i++) {?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pd0">
					<div class="item_solieu">
						<p ><span rel="<?=$solieu[$i]["mota_$lang"]?>" class="counter" ><?=$solieu[$i]["mota_$lang"]?></span> +</p>
						<h3 ><?=$solieu[$i]["ten_$lang"]?></h3>
					</div>
				</div>	
			<?php }?>		
			</div>	
		</div>
	</div>		
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>	
	<script src="js/countUp.js"></script>

	<script>
        jQuery(document).ready(function($) {
			
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
		
	
    </script>
	
		