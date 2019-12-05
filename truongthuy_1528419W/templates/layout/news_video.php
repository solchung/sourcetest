
<?php 	  
	$d->reset();
	$sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang,ngaytao,mota_$lang as mota from #_news where hienthi=1 and com='news' and tinnoibat>0 order by stt asc ";
	$d->query($sql);
	$truyenthong=$d->result_array();
	
	$d->reset();
	$sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang,ngaytao from #_news where hienthi=1 and com='solieu' order by stt asc limit 0,4";
	$d->query($sql);
	$solieu=$d->result_array();

?>

<div class="box_dangkynhantin">
<div class="container">
	<div class="box_dangkynhantin_white">
	<div class="row pd0 mg0">
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">	
		<div class="title_right bk_white bk_none wow zoomInUp"  >
			<a href="" ><h2 >Đăng ký nhận báo giá</h2>
			<p><?=$row_setting["silogan_$lang"]?></p>
			</a>
		</div>
		
		<div class="newsletter wow flipInX">
				
                <form action="#" method="post" id="subscribe_form" name="subscribe-form">
				<div class="row pd0 mg0 ">
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
				
					<input type="text" name="first_name" id="first_name" placeholder="<?= _nameError ?>....." onfocus="if (this.value == '<?= _nameError ?>.....')
						this.value = ''" class="form_newsletter">
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">	
					
					<input type="text" name="phone_newsletter" id="phone_newsletter" placeholder="<?= _phoneError ?>....." onfocus="if (this.value == '<?= _phoneError ?>.....')
						this.value = ''" class="form_newsletter">
				</div>
				<div class="text_dknt address_news clearfix"><p>Địa chỉ: <?=$row_setting["diachi_$lang"]?></p></div>
				
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">	
				
					<input type="text" name="diachi_newsletter" id="diachi_newsletter" class="form_newsletter" placeholder="<?= _addressError ?>....." onfocus="if (this.value == '<?= _addrressError ?>.....')
						this.value = ''" class="form_newsletter">
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">	
				
					<input type="email" name="email_newsletter" id="email_newsletter" class="form_newsletter" placeholder="<?= _emailError ?>....." onfocus="if (this.value == '<?= _emailError ?>.....')
						this.value = ''" class="form_newsletter">
				</div>
				<div class="text_dknt phone_news clearfix"><p>Hotline: <span><?=$row_setting["hotline"]?></span></p></div>
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">	
					 
						<textarea placeholder="<?= _noidung ?>" name="noidung_newsletter" rows="4" col="50" id="noidung_newsletter" class="form_newsletter"></textarea>
				</div>
				
                    <input type="submit" value="<?=_gui?>" name="subscribe-go" id="send_email_newsletter" class="send_email_newsletter">
				
				</div>
				
				</div>	
                </form>

                <div class="clear"></div>

             <script type="text/javascript">
                    $(document).ready(function (e) {
                        $('#send_email_newsletter').click(function () {
							
							var opt = $('#opt');
							
                            var el = $('#email_newsletter');
                            var sex = $('#phone_newsletter');
                            var first_name = $('#first_name');
                            var last_name = $('#last_name');
							var noidung_newsletter = $('#noidung_newsletter');
							
							var diachi_newsletter = $('#diachi_newsletter');
							var tieude_newsletter = $('#tieude_newsletter');
							
                            var emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
							if (first_name.val() == '') {
                                first_name.focus();
                                alert('<?= _nameError ?>');
                                return false;
                            }
                            if (el.val() == '') {
                                el.focus();
                                alert('<?= _emailError ?>');
                                return false;
                            }
						
                            if (!emailRegExp.test(el.val())) {
                                el.focus();
                                alert('<?= _emailError1 ?>');
                            } else {
								
							grecaptcha.ready(function() {
							grecaptcha.execute('<?=$config_site?>', {action: 'newsletter'}).then(function(token) {
								// add token to form
							$('#subscribe_form').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
								
								$.ajax({
								type: 'POST',
								url: 'ajax/newsletter.php',
								data: 'email=' + el.val() + '&sex=' + sex.val() + '&first_name=' + first_name.val() + '&last_name=' + last_name.val() + '&noidung=' + noidung_newsletter.val() + '&token=' + token+ '&diachi_newsletter=' + diachi_newsletter.val() ,
								success: function (result) {
									if(result==0){
										swal("Vượt quá số lần gửi mail. Vui lòng thực hiện lại sau vài phút!", "", "error");
									}else{
										if(result==1){
											swal("<?=_emailnaydaduocdangky?>!", "", "success");
										}else if(result==2){
											swal("<?=_bandangkythanhcong?>!", "", "success");
										}else if(result==3){
											swal("<?=_vuilongquaylaisau?>!", "", "success");
										}
										
									}
								}
								});
								
							});
							});
								
								
								
								
                               
                            }
                            return false;
                        });
                    });
                </script>


            </div>
		</div>
		
		</div>
		</div>	
	
	
</div>	
</div>
<div class="box_solieu">
	<div class="container">
		<div class="row pd0 mg0">
		<?php for($i=0;$i<count($solieu);$i++) {?>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 pd0">
				<div class="item_solieu">
					<div class="bk_solieu">
					<p ><span rel="<?=$solieu[$i]["mota_$lang"]?>" class="counter" ><?=$solieu[$i]["mota_$lang"]?></span>+</p></div>
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
	
<div class="box_tienich">
<div class=" container">

    <div class="row pd0 mg0">	
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="title_tienich">
					<h3 ><?=_tintuc?> - sự kiện</h3>
				</div>
				
				  <div class="box_tin_nb wow zoomInUp">
                    <div class="row pd0 mg0 box_tin_none">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd0">
                            <?php if(count($truyenthong)>0){ ?>
							<a href="<?= $truyenthong[0]['tenkhongdau_' . $lang] ?>" title="<?= $truyenthong[0]['ten_' . $lang] ?>">
                                <div class="one_news">
                                    <img src="thumb/360x205/1/<?= _upload_news_l . $truyenthong[0]["photo"] ?>" alt="<?= $truyenthong[0]['ten_' . $lang] ?>" > 
                                    <h3><?= $truyenthong[0]['ten_' . $lang] ?></h3>
                                    <p><?= catchuoi($truyenthong[0]['mota_' . $lang], 120) ?></p>
                                </div>
								<div class="">
							
                                    <p  class="icon_xemthem2"><?=_xemthem?></p>
							
								</div>	
                            </a>
							<?php }?>
							
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div id="bx-pagerdv">
                            <?php for ($i = 1; $i < count($truyenthong); $i++) { ?>
							<div>
                                <a href="<?= $truyenthong[$i]['tenkhongdau_' . $lang] ?>" title="<?= $truyenthong[$i]['ten_' . $lang] ?>">
                                     <div class="list_tin_nb">
										<div class="img_tin_nb">
                                        <img src="thumb/150x110/1/<?= _upload_news_l . $truyenthong[$i]["photo"] ?>" alt="<?= $truyenthong[$i]['ten_' . $lang] ?>" > 
                                        </div>
										<div class="mota_tin_nb">
										
										<h3><?= $truyenthong[$i]["ten_$lang"] ?></h3>
										
										
										<p><?= catchuoi($truyenthong[$i]["mota_$lang"], 50) ?></p>
									
										</div>
                                    </div>
                                </a>
								</div>
                            <?php } ?>
							</div>
                        </div>
                    </div>
                 
                </div>
		</div>	
		
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
		<div class="title_tienich">
			<h3 >Video</h3>
		</div>	
			<?php include _template."layout/video.php";?>
		</div>
		

		
	</div>

</div>
</div> 
<script type="text/javascript">
	$(document).ready(function () {
		
		  $('#bx-pagerdv').slick({
			dots: false,
			autoplay:true,
			infinite: true,arrows:false,
			speed: 300,
			slidesToShow:3,
			slidesToScroll: 1,
			vertical: true,
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