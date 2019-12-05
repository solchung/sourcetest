<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=info&act=man&typechild=<?=$_GET['typechild']?>"><span><?=$name_cap?></span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Cập nhật</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}	
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=info&act=save&typechild=<?=$_GET['typechild']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
        
    


<?php if ($image_active=="on") {?>     

 <div class="formRow" >
	
	<label>Tải hình ảnh:</label>
	
	<div class="formRight">
            	
       <?php if ($_REQUEST['act']=='capnhat')
        {?>
         <img src="<?php if($item['photo']!=NULL) echo _upload_info.$item['photo']; else echo 'images/no_image.jpg';?>"  alt="NO PHOTO" style="max-width:300px;" />
         <a class="delete_img_present" title="Xoá ảnh" onclick="Action_Delete_Img('index.php?com=info&act=save&typechild=<?=$_GET['typechild']?>&delete_img_present=delete_img');return false;">Xoá ảnh</a>
                    <br>
        <?php }?>
        
     	<input type="file" id="file" name="file" />
		<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình đại diện cho sản phẩm (ảnh JPEG, GIF , JPG , PNG)"> <strong><?=$kichthuoc_image?></strong>
		
		</div>
			<div class="clear"></div>
	</div>     

<?php }?>

  
        
        
  <div class="tab_gaconit">      
        
    <div id="tabs_container">
    	<ul id="tabs">
          
          <?php foreach ($config["lang"] as $key => $value) {
            # code...
            $active='';
            if ($key==0)
            {
              $active="active";

            }

            echo '<li class="'.$active.'"><a href="#tab'.$value.'">'.$config["langs"][$value].'</a></li>';

          }?>
         
        </ul><!--tabs-->
	</div><!--tabs_container-->
    
    
    
    <div id="tabs_content_container">
      
       

    	 <?php foreach ($config["lang"] as $key => $value) {
      # code...
      $active='';
      $active_block='';
      if ($key==0)
      {

        $active="active";
        $active_block="style='display:block;'";

      }
     ?> 
      
        <div id="tab<?=$value?>" class="tab_content" <?=$active_block?>>


    <?php if ($tieude_active=="on") {?>          

      <div class="formRow">
			<label>Tiêu đề <?=$value?> </label>
			<div class="formRight">
				<input type="text" value="<?=@$item['ten_'.$value]?>" name="ten_<?=$value?>" title="Nội dung tiêu đề bài viết <?=$value?>" id="short" class="tipS validate[required]"   />
			</div><!--end formRight-->
            
			<div class="clear"></div>           
		</div><!--end formRow-->

    <?php }?>


    
        
  
   <?php if ($mota_active=="on") {?>         

    <div class="formRow">
			<label>Mô tả <?=$value?>:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Viết mô tả ngắn sản phẩm"  name="mota_<?=$value?>" id="short"><?=@$item['mota_'.$value]?></textarea>
			<script type="text/javascript">//<![CDATA[
            window.CKEDITOR_BASEPATH='ckeditor/';
            //]]></script>
            <script type="text/javascript" src="ckeditor/ckeditor.js?t=B5GJ5GG"></script>
            <script type="text/javascript">//<![CDATA[
            CKEDITOR.replace('mota_<?=$value?>', {"width":<?=$config['ckeditor']['width']?>,"height":<?=$config['ckeditor']['height']?>,});
            //]]></script>
			</div>
			<div class="clear"></div>
		</div><!--end formRow-->

   <?php }?> 
        
        
    
  <?php if ($noidung_active=="on") {?> 
       
    <div class="formRow">
			<label>Nội dung <?=$value?>: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
            
           <div class="clear"></div>
			<div class="formRight-full"><textarea name="noidung_<?=$value?>" rows="8" cols="60"><?=@$item['noidung_'.$value]?></textarea>
			<script type="text/javascript">//<![CDATA[
            window.CKEDITOR_BASEPATH='ckeditor/';
            //]]></script>
            <script type="text/javascript" src="ckeditor/ckeditor.js?t=B5GJ5GG"></script>
            <script type="text/javascript">//<![CDATA[
            CKEDITOR.replace('noidung_<?=$value?>', {"width":<?=$config['ckeditor']['width']?>,"height":<?=$config['ckeditor']['height']?>,});
            //]]></script>
			</div><!--END formRight-full-->
			<div class="clear"></div>
		</div><!--end formRow-->
  <?php }?>  



    </div><!--tab_content-->
      
    <?php }?>  

       
     
    </div><!--end tabs_content_container-->
        
    
    
    </div><!--end tab_gaconit-->
        
       
        
        
         	               
		
        
        
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">
            <input type="checkbox" name="is_noindex" id="check2" <?=(!isset($item['is_index']) || $item['is_index']==1)?'checked="checked"':''?> />
            <label for="check2">Index, follow <img src="./images/question-button.png" alt="Check nếu bạn muốn Google không index sản phẩm này!" class="icon_question tipS" original-title="Check nếu bạn muốn Google không index sản phẩm này!" style="float:right; margin-top:0;" /></label>
                     
          </div>
          <div class="clear"></div>
        </div>       
		
        
        		
		
		
	</div>
   
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
           
            <?php foreach ($config["lang"] as $key => $value) {
          # code...
          $active='';
          if ($key==0)
          {
            $active="active";
          }

          echo '<li class="'.$active.'"><a href="#tab'.$value.'_seo">'.$config["langs"][$value].'</a></li>';

        } ?>  
         
        </ul><!--tabs_seo-->
	</div><!--tabs_container-->
    
    
    
     <div id="tabs_seo_content_container">
      
     
     <?php foreach ($config["lang"] as $key => $value) {
      # code...
      $active_block='';
      if ($key==0)
      {

        $active_block="style='display:block;'";

      }
     ?>     
      
        <div id="tab<?=$value?>_seo" class="tab_seo_content" <?=$active_block?>>
        
        
        <div class="formRow hide_tinhtrang">
      <label>H1 <?=$value?></label>
      <div class="formRight">
        <input type="text" value="<?=@$item['h1_'.$value]?>" name="h1_<?=$value?>" title="Nội dung thẻ meta h1 <?=$value?> dùng để SEO" class="tipS" />
      </div>
      <div class="clear"></div>
    </div>
        
        
        <div class="formRow hide_tinhtrang">
      <label>H2 <?=$value?></label>
      <div class="formRight">
    <input type="text" value="<?=@$item['h2_'.$value]?>" name="h2_<?=$value?>" title="Nội dung thẻ meta h2 <?=$value?> dùng để SEO" class="tipS" />
      </div>
      <div class="clear"></div>
    </div>
        
        
        <div class="formRow">
      <label>Title <?=$value?></label>
      <div class="formRight">
        <input type="text" value="<?=@$item['title_'.$value]?>" name="title_<?=$value?>" title="Nội dung thẻ meta Title <?=$value?> dùng để SEO" class="tipS" />
      </div>
      <div class="clear"></div>
    </div>
        


      <div class="formRow hide_tinhtrang">
      <label>Alt <?=$value?></label>
      <div class="formRight">
        <input type="text" value="<?=@$item['alt_'.$value]?>" name="alt_<?=$value?>" title="Nội dung thẻ meta Alt <?=$value?> dùng để SEO" class="tipS" />
      </div>
      <div class="clear"></div>
    </div>
          
        
        
        <div class="formRow">
      <label>Từ khóa <?=$value?></label>
      <div class="formRight">
        <input type="text" value="<?=@$item['keyword_'.$value]?>" name="keyword_<?=$value?>" title="Từ khóa chính VI cho sản phẩm" class="tipS" />
      </div>
      <div class="clear"></div>
    </div>
        
        
        
        <div class="formRow">
      <label>Description <?=$value?>:</label>
      <div class="formRight">
        <textarea rows="8" cols="" title="Nội dung thẻ meta Description <?=$value?> dùng để SEO" class="tipS" name="description_<?=$value?>"><?=@$item['description_'.$value]?></textarea>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="deschar_<?=$value?>" value="<?=@$item['deschar_'.$value]?>" /> ký tự <b>(Tốt nhất là 160 ký tự)</b>
      </div>
      <div class="clear"></div>
    </div>
        
        
        </div><!--end tab_content-->


     <?php }?>     
        
        
     </div><!--end tabs_content_container-->   
    
    
    </div><!--end tab_gaconit-->   
        

		
	<div class="formRow">
	  <label>Hiển thị:</label>


	  <div class="formRight">

	  <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /> <br /><br />


	  </div><!--end formRight-->

	  <div class="clear"></div>

	  </div>   <!--end formRow-->
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id_cat" id="id_this_product" value="<?=@$item['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>   