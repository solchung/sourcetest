<?php
$d->reset();
$sql = "select ten_$lang, link, photo from #_image_url where hienthi=1 and com='".$loai."doitac' order by stt,id desc";
$d->query($sql);
$dt = $d->result_array();
?>
<div class="bk_doitac">
<div class="container pd0">
<div class="row pd0 mg0">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
	
        <div class="box_doitac run_none">
            <?php for ($i = 0; $i < count($dt); $i++) { ?>
            <div class="img_doitac">
                            <a href="<?= $dt[$i]["link"] ?>" target="_blank" title="<?= $dt[$i]["ten_$lang"] ?>">
                                <img src="thumb/189x98/2/<?php if ($dt[$i]['photo'] != NULL) echo _upload_hinhanh_l . $dt[$i]['photo'];
                                else echo 'images/no-image-available.png'; ?>"  >
                            </a>
            </div>
            <?php }?>
        </div>
        
    </div>
</div>
</div>
</div>
<script type="text/javascript">
            $(document).ready(function () {
                $('.box_doitac').slick({
                    dots: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 6,
                    slidesToScroll: 1,
					
					infinite: true,
					autoplay: true,
                    autoplaySpeed: 100,
					speed: 3000,
					cssEase: 'linear',arrows:true,
                    responsive: [
                        {
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 5,
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



