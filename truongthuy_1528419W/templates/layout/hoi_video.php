
<?php  
  $d->reset();
  $sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang from #_news where hienthi=1 and com='news' and tinnoibat>0 order by stt asc limit 12";
  $d->query($sql);
  $tintuc_sk=$d->result_array();
  
  $d->reset();
  $sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang,noidung_$lang from #_news where hienthi=1 and com='cauhoi' order by id desc ";
  $d->query($sql);
  $hoidap=$d->result_array();


   $d->reset();
  $sql="select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang,link from #_video where hienthi=1 and com='video'  order by stt asc";
  $d->query($sql);
  $video_clip=$d->result_array();

?>

<script type="text/javascript">
  $(document).ready(function() {
      $('.select_video a').click(function (){
      var str = $(this).attr('rel');
            if(str != '')
      $('#box_video').load("ajax/ajax_video.php?id="+str);
      return false;
    });
  });
</script>


<div class="container2 pd0">
	<div class="row pd0 mg0 ">
		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
		<div class="title-index">
        <h3 class="title-index-name"><?=_hoidap?></h3>
		</div><!--END title_index--> 
		<div class="box_boc">
		<div class="box_cauhoi">
		<?php for($i=0;$i<count($hoidap);$i++){?>
		
		<div class="item_cauhoi">
		<div class="row pd0 mg0">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 img_cauhoi">
		<img src="images/khach-hang.jpeg" alt="khachhang"/>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text_cauhoi">
		<h3><?=$hoidap[$i]["ten_$lang"]?></h3>
		<p><?=$hoidap[$i]["mota_$lang"]?></p>
		</div>
		</div>
		</div>
		<?php if($hoidap[$i]["noidung_$lang"]!=''){?>
		<div class="item_cauhoi">
		<div class="row pd0 mg0">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text_cauhoi">
		<h3>Admin</h3>
		<p><?=$hoidap[$i]["noidung_$lang"]?></p>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 img_cauhoi">
		<img src="images/admin.jpg" alt="admin"/>
		</div>
		</div>
		</div>
		<?php }?>
		
		<?php }?>
		
		</div>
		<div class="khung_hoidap">
		<form action="#" method="post" id="hoi_form" name="hoi-form">
		<input placeholder="<?= _hovaten ?>" name="ten_cauhoi" type="text" class="form-control" id="ten_cauhoi"  />
		<input placeholder="<?= _email ?>" name="email_cauhoi" type="text" class="form-control" id="email_cauhoi"  />
                    <input type="text" name="text_cauhoi" id="text_cauhoi" value="" placeholder="<?=_nhapcauhoicuaban?>" onfocus="if (this.value == '<?=_nhapcauhoicuaban?>')
                                this.value = ''" class="hoi-form">
                    <input type="submit" value="<?= _gui ?>" name="send_hoi" id="send_hoi" class="">
                    <div class="clear"></div>      
        </form>
		</div>
		</div>
		</div>
		
		<script type="text/javascript">
                    $(document).ready(function (e) {
                        $('#send_hoi').click(function () {
							var ten = $('#ten_cauhoi');	
							var mail = $('#email_cauhoi');	
                            var el = $('#text_cauhoi');
							var emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
							
							 if (ten.val() == ''||ten.val() == '<?=_hovaten?>') {
                                ten.focus();
                                alert('<?=_nameError?>');
                                return false;
                            }

							
								if (!emailRegExp.test(mail.val())) {
								   el.focus();
								   alert('<?=_emailError1?>');
								   return false;
								}
							
							
									
                            if (el.val() == ''||el.val() == '<?=_nhapcauhoicuaban?>') {
                                el.focus();
                                alert('<?=_contentError?>');
                                return false;
                            }
 
                                $.ajax({
                                    type: 'POST',
                                    url: 'ajax/cauhoi.php',
                                    data: 'email=' + el.val() + '&ten=' + ten.val() + '&mail=' + mail.val() ,
                                    success: function (result) {
                                        alert(result);
                                        $('#text_cauhoi').val(" ");
										$('#email_cauhoi').val(" ");
										$('#ten_cauhoi').val(" ");
                                    }
                                });               
                            return false;
                        });
                    });
                </script>
		
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 ">
		<div class="title-index">
        <h3 class="title-index-name">Video</h3>
		</div><!--END title_index--> 
		<div id="box_video">
    
		  <?php
		  $url = $video_clip[0]["link"];
		  preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches);
		  ?>
      
			<iframe width="100%" height="390" src="https://www.youtube.com/embed/<?=$matches[1]?>" frameborder="0" allowfullscreen></iframe>
        
         
        
		</div><!--end box_video-->
       
       
        <div class="select_video" >
			 <?php for($i=0,$count_video=count($video_clip);$i<$count_video;$i++) { ?>      
				<div>
				<a  rel="<?=$video_clip[$i]["id"]?>"><img src="thumb/160x100/1/<?=_upload_video_l.$video_clip[$i]["photo"]?>"></a>
				</div>  
			  <?php } ?>             
        </div>

		</div>
	</div>
</div>

<script type="text/javascript">
            $(document).ready(function () {
                $('.select_video').slick({
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
                            breakpoint: 630,
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