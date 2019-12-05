<script type="text/javascript" src="js/my_script_check_form.js"></script>
<script type="text/javascript">
    function js_submit() {
        if (isEmpty(document.getElementById('ten'), "<?= _nameError ?>")) {
            document.getElementById('ten').focus();
            return false;
        }


        if (!check_email(document.frm.email.value)) {
            alert("<?= _emailError1 ?>");
            document.frm.email.focus();
            return false;
        }


        if (isEmpty(document.getElementById('dienthoai'), "<?= _phoneError ?>")) {
            document.getElementById('dienthoai').focus();
            return false;
        }


        if (!isNumber(document.getElementById('dienthoai'), "<?= _phoneError1 ?>")) {
            document.getElementById('dienthoai').focus();
            return false;
        }







<?php /* ?>if(isEmpty(document.getElementById('txtcapcha'), "Please enter the security code.")){
  document.getElementById('txtcapcha').focus();
  return false;
  }<?php */ ?>

        document.frm.submit();
    }
</script>

<script language='javascript'>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

</script>

<script type="text/javascript">
    // JavaScript Document
    function re_capcha()
    {
        document.getElementById('vimg').src = "./ajax/check_captcha/captcha_image.php";
    }
</script>

<div class="row pd0 mg0 ">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="title_right wow zoomInUp"><h2><?= $title_tcat ?></h2></div>
    </div>
</div>
<div class="row pd0 mg0 ">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="box_content">
            <div class="content"> 
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInLeftBig">
                <?= $company_contact['noidung_' . $lang]; ?> 
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInRightBig">
                   <form method="post" name="frm" action="" enctype="multipart/form-data">
                        
						
                            <div class="form-group">
                            <!--    <label for="ten"><?= _hovaten ?></label>-->
                                <div class="input_item"><input placeholder="<?= _hovaten ?>" name="ten" type="text" class="form-control" id="ten" size="50" /></div><!--input_item-->
                            </div>                        
                            <div class="form-group">
                             <!--   <label for="diachi"><?= _diachi ?></label>-->
                                <div class="input_item"><input placeholder="<?= _diachi ?>" name="diachi" id="diachi" type="text"  class="form-control" size="50" /></div>
                            </div>
                            <div class="form-group">
                            <!--    <label for="dienthoai"><?= _dienthoai ?></label>-->
                                <div class="input_item"><input placeholder="<?= _dienthoai ?>" name="dienthoai" type="text" class="form-control" id="dienthoai" size="50"/></div><!--input_item-->
                            </div>
                            <div class="form-group">
                             <!--   <label for="email"><?= _email ?></label>-->
                                <div class="input_item"><input placeholder="<?= _email ?>" name="email" type="text" class="form-control" size="50"  /></div><!--input_item-->
                            </div>                                                  
                            <div class="form-group">
                            <!--    <label for="tieude1"><?= _tieude ?></label>-->
                                <div class="input_item"><input placeholder="<?= _tieude ?>" name="tieude1" type="text" class="form-control" id="tieude1" size="50"  /></div><!--input_item-->
                            </div>                         
                            <div class="form-group">
                             <!--   <label for="noidung"><?= _noidung ?></label>-->
                                <div class="input_item">
                                    <textarea placeholder="<?= _noidung ?>" name="noidung" class="form-control" rows="5" col="50" id="noidung" style="background-color:#FFFFFF; color:#666666;"></textarea>
                                </div><!--input_item-->
                            </div>
							<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
							
                            <div class="input_block nut_bt" >
                                <label>&nbsp;</label>
                                <div class="input_item" style="    text-align: right;"> 
                                    <input class="button" type="button" value="<?= _gui ?>" onclick="js_submit();" />
                                    <input class="button" type="button" value="<?= _nhaplai ?>" onclick="document.frm.reset();" />
                                </div><!--input_item-->
                            </div>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row pd0 mg0">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="content_map map-c wow fadeInUpBig">
		<?php if($row_setting["api"]=="") {?>
			<?=$row_setting["link_map"]?>
		<?php }else{?>	
					<div class="google-map-api"> 


                        <?php
                        if (!empty($map)) {
                            ?>
                           

                           
                            <div class="box_products" style="width:100%">




                                <script type="text/javascript">

                                // declare your maps outside of the functions like this and remove 
                                // your var where you create them.
                                    var <?php
                        foreach ($map as $k => $map_item) {
                            ?> map<?= $k ?>; <?php } ?>

                                    function initialize_contact() {

    <?php
    foreach ($map as $k => $map_item) {
        ?>
                                            var myLatlng<?= $k ?> = new google.maps.LatLng(<?= $map_item['toado'] ?>);
    <?php } ?>

                                        //  var myLatlng2 = new google.maps.LatLng(-37.818535,145.12194);
                                        //var myLatlng3 = new google.maps.LatLng(-37.834697,145.165394);

    <?php
    foreach ($map as $k => $map_item) {
        ?>
                                            var mapOptions<?= $k ?> = {
                                                zoom: 17,
                                                center: myLatlng<?= $k ?>
                                            }

    <?php } ?>

                                        // Note I removed the var

    <?php
    foreach ($map as $k => $map_item) {
        ?>
                                            map<?= $k ?> = new google.maps.Map(document.getElementById('map-tan<?= $k ?>'), mapOptions<?= $k ?>);

    <?php } ?>
                                        // map2 = new google.maps.Map(document.getElementById('map-box'), mapOptions2);
                                        //map3 = new google.maps.Map(document.getElementById('map-forest'), mapOptions3);


    <?php
    foreach ($map as $k => $map_item) {
        ?>
                                            var marker<?= $k ?> = new google.maps.Marker({
                                                position: myLatlng<?= $k ?>,
                                                map: map<?= $k ?>,
                                            });

    <?php } ?>



                                        // attach the tab click handler
                                        attachTabClick();
                                    }


                                    function attachTabClick()
                                    {

                                        $('.nav-tabs').bind('click', function (e)
                                        {
                                            // e.target is the link
                                            // so use its parent to check which map to show

                                            var tabId = e.target;

                                            //check the ID and only call the resize you need -



                                            if (tabId == 'panel-0')
                                            {
                                                resizeMap(map0)
                                            } else if (tabId == 'panel-1')
                                            {
                                                resizeMap(map1);
                                            } else if (tabId == 'panel-2')
                                            {
                                                resizeMap(map2)
                                            }



                                        });
                                    }


                                    function resizeMap(map)
                                    {
                                        setTimeout(function ()
                                        {
                                            var center = map.getCenter();
                                            google.maps.event.trigger(map, "resize");
                                            map.setCenter(center);
                                        }, 50);
                                    }


                                </script>



                                <div class="tabbable" id="tabs-331065">


                                    <ul class="nav nav-tabs" id="map-tabs">

                                        <?php
                                        foreach ($map as $k => $map_item) {
                                            ?> 


                                            <li id="map-tab<?= $k ?>" onclick="resizeMap(map<?= $k ?>);"  <?php if ($k == 0) echo 'class="active"';
                                    else echo ''; ?>  >
                                                <a href="#panel-<?= $k ?>" role="tab" data-toggle="tab"><?= $map_item["ten_$lang"] ?></a>
                                            </li>


                                            <?php
                                        }
                                        ?>     
                                        <div class="clear"></div>   
                                    </ul>


                                    <div class="tab-content">

                                        <?php
                                        foreach ($map as $k => $map_item) {
                                            ?>
                                            <div class="tab-pane <?php if ($k == 0) echo 'active';
                                            else echo ''; ?>" id="panel-<?= $k ?>">
                                                <div class="clear"></div>

                                                <div class="map-tab-content">
        <?= $map_item["mota_$lang"] ?>
                                                </div><!--end map-tab-content-->  


                                                <div id="map-tan<?= $k ?>" style="width:100%; height:500px;" ></div>



                                            </div>


                                            <?php
                                        }
                                        ?>         

                                    </div>

                                </div>


                            </div>

                            <?php
                        }
                        ?>    


                    </div><!--end google-map-api--> 


<?php }?>
                </div>
				<!--end map-c--> 
		
    </div>
</div>


