<?php

$d->reset();
$sql = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id,photo,mota_$lang as mota,link from #_video where hienthi=1 and com='video' order by stt asc";
$d->query($sql);
$result_list = $d->result_array();
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="video">
            
            <div class="row pd0 mg0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
       
                    <div class="row pd0 mg0">
                 
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
                            <div class="list_video">
                                
                                    <?php for($i=0;$i<count($result_list);$i++) {?>
									
									  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
											<a class="iframe " href="https://www.youtube.com/embed/<?=$result_list[$i]["link"]?>?autoplay=1">
											
											<div class="item_video">
												<img src="https://img.youtube.com/vi/<?=$result_list[$i]["link"]?>/0.jpg " alt="<?=$result_list[$i]["ten"]?>"/>
											<div class="title_video">
											<?=$result_list[$i]["ten"]?>
											</div>
											<div class="hover_video">
											</div>
											</div>
											</a>
										</div>
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
				$(".iframe").fancybox({
				type: "iframe"
				});
                $('.list_video').slick({
                    dots: false,
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

