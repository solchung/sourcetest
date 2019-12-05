<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li><a href="index.php?com=setting&act=capnhat"><span>Thiết lập hệ thống</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Cấu hình website</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
    function TreeFilterChanged2() {
        $('#validate').submit();
    }
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=setting&act=save" method="post" enctype="multipart/form-data">

    <div class="widget">
        <div class="title"><img src="./images/icons/dark/close.png" alt="" class="titleIcon" />
            <h6>Cấu Hình Host Mail</h6>
        </div>	


        <div class="formRow">
            <label>Iphost</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['iphost'] ?>" name="iphost" title="Ihost" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>	


        <div class="formRow">
            <label>Username account</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['usernameaccount'] ?>" name="usernameaccount" title="Username account" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>


        <div class="formRow">
            <label>Mailhost</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['mailhost'] ?>" name="mailhost" title="Mailhost" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>	


        <div class="formRow">
            <label>Password</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['password'] ?>" name="password" title="Password" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>	


    </div><!--end widget-->






<!--    <div class="widget">
        <div class="title"><img src="./images/icons/dark/close.png" alt="" class="titleIcon" />
            <h6>Tạm khóa website</h6>
        </div>		
        <div class="formRow">
            <label>Tạm khóa website: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check chọn nếu bạn muốn đóng website"> </label>
            <div class="formRight">           
                <input type="checkbox" name="active" id="check1" value="1" <?= ($item['is_active'] == 1) ? 'checked="checked"' : '' ?> />
                <label for="check1">Đồng ý</label>           
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Thông báo: <img src="./images/question-button.png" class="icon_que tipS" original-title="Dòng thông báo xuất hiện khi đóng website"></label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Viết thông báo ngắn gọn" class="tipS" name="short" id="short"><?= @$item['thongbao'] ?></textarea>
            </div>
            <div class="clear"></div>
        </div>	       	        
    </div>end widget-->

    <div class="widget">
        <div class="title"><img src="./images/icons/dark/users.png" alt="" class="titleIcon" />
            <h6>Thông tin công ty</h6>
        </div>			



        <div class="tab_gaconit">      

            <div id="tabs_container">

                <ul id="tabs">

                    <?php
                    foreach ($config["lang"] as $key => $value) {
                        # code...
                        $active = '';
                        if ($key == 0) {
                            $active = "active";
                        }

                        echo '<li class="' . $active . '"><a href="#tab' . $value . '">' . $config["langs"][$value] . '</a></li>';
                    }
                    ?>


                </ul><!--tabs-->
            </div><!--tabs_container-->


            <div id="tabs_content_container">


                <?php
                foreach ($config["lang"] as $key => $value) {
                    # code...
                    $active = '';
                    $active_block = '';
                    if ($key == 0) {

                        $active = "active";
                        $active_block = "style='display:block;'";
                    }
                    ?> 	

                    <div id="tab<?= $value ?>" class="tab_content" <?= $active_block ?>>

                        <div class="formRow">
                            <label>Tiêu đề <?= $value ?></label>
                            <div class="formRight">
                                <input type="text" value="<?= @$item['ten_' . $value] ?>" name="ten_<?= $value ?>" title="Nội dung tiêu đề <?= $value ?> bài viết" class="tipS" />
                            </div><!--end formRight-->

                            <div class="clear"></div>           
                        </div><!--end formRow-->




                        <div class="formRow">
                            <label>Địa chỉ <?= $value ?></label>
                            <div class="formRight">

                                <textarea cols="10" rows="10" name="diachi_<?= $value ?>" id="diachi_<?= $value ?>"><?= @$item['diachi_' . $value] ?></textarea>

                            </div>
                            <div class="clear"></div>
                        </div>


    <div class="formRow">
      <label>Silogan <?=$value?></label>
      <div class="formRight">
      <input type="text" value="<?=@$item['silogan_'.$value]?>" name="silogan_<?=$value?>" title="Nhập silogan <?=$value?>" class="tipS" />
      </div><!--end formRight-->

      <div class="clear"></div>
      </div><!--end formRow-->



                        <div class="formRow">
                            <label>Copyright <?= $value ?></label>
                            <div class="formRight">
                                <input type="text" value="<?= @$item['copyright_' . $value] ?>" name="copyright_<?= $value ?>" title="Nhập copyright <?= $value ?>" class="tipS" />
                            </div><!--end formRight-->

                            <div class="clear"></div>           
                        </div><!--end formRow-->



                        <div class="formRow">
                            <label>Thông tin website <?= $value ?></label>
                            <div class="formRight">

                                <textarea cols="10" rows="10" name="mailphanhoi_<?= $value ?>" id="mailphanhoi_<?= $value ?>"><?= @$item['mailphanhoi_' . $value] ?></textarea>

                                <script type="text/javascript">//<![CDATA[
                                    window.CKEDITOR_BASEPATH = 'ckeditor/';
                                    //]]></script>
                                <script type="text/javascript" src="ckeditor/ckeditor.js?t=B5GJ5GG"></script>
                                <script type="text/javascript">//<![CDATA[
                                    CKEDITOR.replace('mailphanhoi_<?= $value ?>', {"width":<?= $config['ckeditor']['width'] ?>, "height":<?= $config['ckeditor']['height'] ?>, });
                                    //]]></script>

                            </div>
                            <div class="clear"></div>
                        </div>

                    </div><!--tab_content-->

<?php } ?>  

            </div><!--end tabs_content_container-->


        </div><!--end tab_gaconit-->



        <div class="formRow">
            <label>Author</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['author_web'] ?>" name="author_web" title="Nhập author" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>




        <div class="formRow">
            <label>Email</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['email'] ?>" name="email" title="Nhập địa chỉ email" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>



        <div class="formRow">
            <label>Website</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['website'] ?>" name="website" title="Nhập địa chỉ website" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>


<?php /* ?> <div class="formRow">
  <label>Tọa độ</label>
  <div class="formRight">
  <input type="text" value="<?=@$item['toado']?>" name="toado" title="Nhập địa chỉ tọa độ" class="tipS" />
  </div>
  <div class="clear"></div>
  </div><?php */ ?>


        <div class="formRow">
            <label>Fanpage Facebook</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['fanpage'] ?>" name="fanpage" title="Nhập địa chỉ fanpage" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
		
		 <div class="formRow">
            <label>Webmail</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['zalo'] ?>" name="zalo" title="Nhập link zalo" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
	
		
	


    </div>

    <div class="widget">

        <div class="title">
            <img src="./images/icons/dark/users.png" alt="" class="titleIcon" />
            <h6>Thông tin thêm</h6>
        </div>			


<?php /* ?><div class="formRow">
  <label>File nhạc</label>
  <div class="formRight">
  <?php if ($_REQUEST['act']=='capnhat')
  {?>
  <b>File nhạc hiện tại:</b><a target="_blank" href="<?=_upload_hinhanh.$item['filenhac']?>">Download</a><br />
  <?php }?>
  <b>File nhạc:</b> <input type="file" name="file" id="file" /> FORMAT :mp3|wav|flac <br /><br />
  </div>
  <div class="clear"></div>
  </div><?php */ ?>





        <div class="formRow">
            <label>Hotline</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['hotline'] ?>" name="hotline" title="Nhập số điện thoại hotline" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>




        <div class="formRow">
            <label>Điện thoại</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['dienthoai'] ?>" name="dienthoai" title="Nhập số điện thoại " class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
	
		<div class="formRow">
            <label>Số Zalo</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['zalo'] ?>" name="zalo" title="Nhập Zalo" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
		<div class="formRow">
            <label>Link chỉ đường</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['skype'] ?>" name="skype" title="Nhập link" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
		
		 <div class="formRow">
            <label>Phân trang sản phẩm</label>
            <div class="formRight">
                <input type="number" value="<?= @$item['phantrang_sp'] ?>" name="phantrang_sp" title="Nhập số lượng" class="tipS" />
            </div>
            <div class="clear"></div>
         </div>
		
		 <div class="formRow">
            <label>Phân trang bài viết</label>
            <div class="formRight">
                <input type="number" value="<?= @$item['phantrang_bv'] ?>" name="phantrang_bv" title="Nhập số lượng" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label>Favicon</label>
            <div class="formRight">

<?php if ($_REQUEST['act'] == 'capnhat') {
    ?>
                    <img src="<?= _upload_hinhanh . $item['favicon'] ?>"  alt="NO PHOTO" style="max-width:100px;" /><br />
                <?php } ?>
                <input type="file" id="file" name="img" /> <img src="./images/question-button.png" alt="Upload favicon" class="icon_question tipS" original-title="Tải hình đại diện website (ảnh JPEG, GIF , JPG , PNG, ICO)"> Width:15px |Hieght:15px
            </div>
            <div class="clear"></div>
        </div>	
		
		 <div class="formRow hide_tinhtrang">
            <label>Hình đóng dấu</label>
            <div class="formRight">
				<?php if ($_REQUEST['act'] == 'capnhat') {?>
                    <img src="../upload/watermark.png"  alt="NO PHOTO" style="max-width:100px;" /><br />
                <?php } ?>
                <input type="file" id="watermark" name="watermark" /> <img src="./images/question-button.png" alt="Upload watermark" class="icon_question tipS" original-title="Tải hình watermark (PNG)"> Width:240px |Height:auto
            </div>
            <div class="clear"></div>
        </div>	

		<div class="formRow">
            <label>Key api map</label>
            <div class="formRight">
                <input type="text" value="<?= @$item['api'] ?>" name="api" title="Nhập key google map class="tipS" />
            </div>
            <div class="clear"></div>
        </div>	

		<div class="formRow">
            <label>Iframe google map</label>
            <div class="formRight">
             
				
				<textarea cols="10" rows="10" name="link_map" id="link_map"><?= @$item['link_map'] ?></textarea>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow hide_tinhtrang">
            <label>Image google map</label>
            <div class="formRight">

<?php if ($_REQUEST['act'] == 'capnhat') {
    ?>
                    <img src="<?= _upload_hinhanh . $item['image_map'] ?>"  alt="NO PHOTO" style="max-width:100px;" /><br />
                <?php } ?>
                <input type="file" id="image_map" name="image_map" /> <img src="./images/question-button.png" alt="Upload image map" class="icon_question tipS" original-title="Tải hình đại diện website (ảnh JPEG, GIF , JPG , PNG, ICO)"> Width:auto |Hieght:auto
            </div>
            <div class="clear"></div>
        </div>	
		 <div class="formRow hide_tinhtrang">
                <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
                <div class="formRight">
                  
                    <input type="checkbox" name="act_map" id="act_map" value="1" <?= (!isset($item['act_map']) || $item['act_map'] == 1) ? 'checked="checked"' : '' ?> />
                    <label for="check1">Hiển thị map hình</label>            
                </div>
                <div class="clear"></div>
            </div>

     <div class="formRow">
            <label>Nhúng Code Chat </label>
            <div class="formRight">

                <textarea cols="10" rows="10" name="codechat" id="codechat">
				<?=@unzip_chuanhoa($item['codechat'])?>
				</textarea>

            </div>
            <div class="clear"></div>
        </div>



        <div class="formRow">
            <label>Nhúng Code Analytics </label>
            <div class="formRight">

                <textarea cols="10" rows="10" name="code_analytics" id="code_analytics"><?=@unzip_chuanhoa($item['code_analytics'])?></textarea>

            </div>
            <div class="clear"></div>
        </div>



        <div class="formRow">
            <label>Nhúng Geo Meta </label>
            <div class="formRight">

                <textarea cols="10" rows="10" name="geo_meta" id="geo_meta">
				<?=@unzip_chuanhoa($item['geo_meta'])?>
				</textarea>

            </div>
            <div class="clear"></div>
        </div>





    </div><!--END widget-->



    <div class="widget">
        <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
            <h6>Nội dung seo</h6>
        </div>			



        <div class="formRow">
            <label>Tạo SEO <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bấm TẠO SEO để tạo Tiêu đề, Mô tả, Từ khoá cho danh mục sản phẩm"> </label>
            <div class="formRight">
                <input type="button" class="blueB" onclick="CreateTitleSEO();" value="Tạo SEO" />
            </div>
            <div class="clear"></div>
        </div>	



        <div class="tab_gaconit">      

            <div id="tabs_seo_container">
                <ul id="tabs_seo">

<?php
foreach ($config["lang"] as $key => $value) {

    $active = "";

    if ($key == 0) {

        $active = "active";
    }


    echo '<li class="' . $active . '"><a href="#tab' . $value . '_seo">' . $config["langs"][$value] . '</a></li>';
    # code...
}
?>		

                </ul><!--tabs_seo-->
            </div><!--tabs_container-->



            <div id="tabs_seo_content_container">


<?php
foreach ($config["lang"] as $key => $value) {

    $active = "";
    $active_block = "";
    if ($key == 0) {
        $active = "active";
        $active_block = "style='display:block' ";
    }
    # code...
    ?> 

                    <div id="tab<?= $value ?>_seo" class="tab_seo_content <?= $active ?>" <?= $active_block ?>>


                        <div class="formRow hide_tinhtrang">
                            <label>H1 <?= $value ?></label>
                            <div class="formRight">
                                <input type="text" value="<?= @$item['h1_' . $value . ''] ?>" name="h1_<?= $value ?>" title="Nội dung thẻ meta h1 <?= $value ?> dùng để SEO" class="tipS" />
                            </div>
                            <div class="clear"></div>
                        </div>


                        <div class="formRow hide_tinhtrang">
                            <label>H2 <?= $value ?></label>
                            <div class="formRight">
                                <input type="text" value="<?= @$item['h2_' . $value . ''] ?>" name="h2_<?= $value ?>" title="Nội dung thẻ meta h2 <?= $value ?> dùng để SEO" class="tipS" />
                            </div>
                            <div class="clear"></div>
                        </div>


                        <div class="formRow">
                            <label>Title <?= $value ?></label>
                            <div class="formRight">
                                <input type="text" value="<?= @$item['title_' . $value . ''] ?>" name="title_<?= $value ?>" title="Nội dung thẻ meta Title <?= $value ?> dùng để SEO" class="tipS" />
                            </div>
                            <div class="clear"></div>
                        </div>






                        <div class="formRow">
                            <label>Từ khóa <?= $value ?></label>
                            <div class="formRight">
                                <input type="text" value="<?= @$item['keywords_' . $value . ''] ?>" name="keyword_<?= $value ?>" title="Từ khóa chính <?= $value ?> cho sản phẩm" class="tipS" />
                            </div>
                            <div class="clear"></div>
                        </div>



                        <div class="formRow">
                            <label>Description <?= $value ?>:</label>
                            <div class="formRight">
                                <textarea rows="8" cols="" title="Nội dung thẻ meta Description <?= $value ?> dùng để SEO" class="tipS" name="description_<?= $value ?>"><?= @$item['description_' . $value . ''] ?></textarea>
                                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="deschar_<?= $value ?>" value="<?= @$item['deschar_' . $value . ''] ?>" /> ký tự <b>(Tốt nhất là 160 ký tự)</b>
                            </div>
                            <div class="clear"></div>
                        </div>


                    </div><!--end tab_content-->


<?php } ?> 


            </div><!--end tabs_content_container-->   


        </div><!--end tab_gaconit-->   





        <div class="formRow">
            <div class="formRight">
                <input type="hidden" name="id" id="id_this_setting" value="<?= @$item['id'] ?>" />
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            </div>
            <div class="clear"></div>
        </div> 			
    </div>


</form>   