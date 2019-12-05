<?php


$d->reset();
$sql_news = "select ten_$lang,tenkhongdau_$lang,id,photo,thumb,mota_$lang,ngaytao from #_news where hienthi=1 and com='news' and tinnoibat>0  order by stt,id asc";
$d->query($sql_news);
$tintuc_nb = $d->result_array();
?>

<?php if($source=='index'){ ?>
<div class="row pd0 mg0 ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
        <div class="title_right "><a href="tin-tuc.html"><h2><?= _tintuc?></h2></a></div>
    </div>
</div>
<div class="box_product box_spnb run_tin">
    <?php for ($i = 0, $count_spmoi = count($tintuc_nb); $i < $count_spmoi; $i++) { ?>

    
        <a href="tin-tuc/<?=$tintuc_nb[$i]["tenkhongdau_$lang"]?>-<?=$tintuc_nb[$i]['id']?>.html" title="<?=$tintuc_nb[$i]["ten_$lang"]?>">
        <div class="item_tin">
			<div class="zoom_tin">
            <img src="thumb/270x190/1/<?php if($tintuc_nb[$i]['photo']!=NULL) echo _upload_news_l.$tintuc_nb[$i]['photo']; else echo 'images/no-image-available.png';?>" alt="<?=$tintuc_nb[$i]["ten_$lang"]?>"/>
            </div>
			<!--
			<h3><?=$tintuc_nb[$i]["ten_$lang"]?></h3>
            -->
            <p class="mota_tin">
                    <?=catchuoi($tintuc_nb[$i]["mota_$lang"],300)?>
            </p>
           
        </div>
        </a>
    
    <?php }?>
</div>
<?php }?>

<script type="text/javascript">
            $(document).ready(function () {
                $('.run_tin').slick({
					autoplay: true,
                    dots: false,
                    infinite: true,
                    speed: 1000,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                   
                    responsive: [
                        {
                            breakpoint: 1034,
                            settings: {
                                slidesToShow:3,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: false
                            }
                        },
                        {
                            breakpoint: 770,
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

