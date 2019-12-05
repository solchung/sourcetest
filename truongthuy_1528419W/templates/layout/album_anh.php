<?php

$d->reset();
$sql = "select photo,link, ten_$lang as ten, mota_$lang as mota from #_image_url where hienthi=1 and com='hinhanh' order by stt,id desc";
$d->query($sql);
$ab_ha = $d->result_array();
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="video">
            
            <div class="row pd0 mg0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
              
                    
                   

                    
                    <div class="row pd0 mg0">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 pd0">  
                            <div class="khung_anh">
                                 <?php for($i=0;$i<count($ab_ha);$i++) {?>
                                   
                                        <a  href="<?=_upload_hinhanh_l.$ab_ha[$i]['photo']?>" ><img src="thumb/440x295/1/<?=_upload_hinhanh_l.$ab_ha[$i]["photo"]?>"  title="<?=$ab_ha[$i]['ten']?>" /></a>
              
                                    <?php }?>
                            </div>
                        </div><!-------khung-video-------->    
                        <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12 pd0">
                            <div class="list_anh">
                                
                                    <?php for($i=0;$i<count($ab_ha);$i++) {?>
                                    
                                        <a  href="<?=_upload_hinhanh_l.$ab_ha[$i]['photo']?>" ><img src="thumb/130x95/1/<?=_upload_hinhanh_l.$ab_ha[$i]["photo"]?>"  title="<?=$ab_ha[$i]['ten']?>" /></a>
              
                                    <?php }?>
                               
                            </div>
                        </div><!-------list_video-------->    
                    </div><!--------row_content_video----->
                </div>
            </div>    
        </div>
    </div><!--------end_video-------->
    
    <script type="text/javascript">
            $(document).ready(function () {
				 $('.khung_anh').slick({
				  slidesToShow: 1,
				  slidesToScroll: 1,
				  arrows: false,
				  fade: true,
				  asNavFor: '.list_anh'
				});	
                $('.list_anh').slick({
					autoplay:true,
					arrows:false,
                    dots: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    vertical:true,asNavFor: '.khung_anh',
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                infinite: true,vertical:true,
                                dots: false
                            }
                        },
                        {
                            breakpoint: 700,
                            settings: {
                                slidesToShow: 4,vertical:false,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 3,vertical:false,
                                slidesToScroll: 1
                            }
                        }

                    ]
                });

            });
        </script>
		<script type="text/javascript">
		  $(document).ready(function($) {
			!(function(){

			  $('.khung_anh,.list_anh').photobox('a', { thumbs:true, loop:false });

			})();
		  });
		</script>

