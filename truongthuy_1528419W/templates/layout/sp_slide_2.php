
<?php 

	
	$d->reset();
	$sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang,ngaytao from #_news where hienthi=1 and tinnoibat >0  and com='gioithieu'  order by stt asc ";
	$d->query($sql);
	$dambao=$d->result_array();

?>

<div class="box_visao">
	<div class="container ">
	

		<div class="row pd0 mg0 ">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
			<div class="run_dambao run_none">
			<?php for($i=0;$i<count($dambao);$i++) {?>
			                            
				<div class="item_dambao">
				<a href="<?= $dambao[$i]['tenkhongdau_' . $lang] ?>">
					<img src="thumb/50x50/2/<?= _upload_news_l . $dambao[$i]["photo"] ?>" alt="<?= $dambao[$i]['ten_' . $lang] ?>" > 
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
			slidesToShow: 3,
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
						slidesToShow: 3,
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

	