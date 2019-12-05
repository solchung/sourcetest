<?php

$d->reset();
$sql = "select ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,id,photo,mota_$lang as mota,link from #_video where hienthi=1 and com='".$loai."video' order by stt asc";
$d->query($sql);
$result_list = $d->result_array();
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="video">
            
            <div class="row pd0 mg0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
                    <script type="text/javascript">
                           $(document).ready(function () {
                            $('.list_video a').click(function ()
                            {
                                    var strclip = $(this).attr('rel');
                                    $("#khung").attr("src","https://www.youtube.com/embed/"+strclip);	
                            });
                            });

                    </script>
                    
                   

                    
                    <div class="row pd0 mg0">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">  
                            <div class="khung_video">
                                <iframe width="100%" height="270" id="khung"
                                        src="https://www.youtube.com/embed/<?=$result_list[0]['link']?>" frameborder="0" allowfullscreen>
                                </iframe> 
                            </div>
                        </div><!-------khung-video-------->    
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
                            <div class="list_video">
                                
                                    <?php for($i=0;$i<count($result_list);$i++) {?>
                                   
                                        <a  rel="<?=$result_list[$i]['link']?>" ><img width="138" height="95" src="https://img.youtube.com/vi/<?=$result_list[$i]["link"]?>/0.jpg "  title="<?=$result_list[$i]['ten']?>" /></a>
              
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
                $('.list_video').slick({
					autoplay:true,
					arrows:false,
                    dots: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    vertical:false,
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
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
						  {
                            breakpoint: 650,
                            settings: {
                                slidesToShow:3,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        }

                    ]
                });

            });
        </script>

