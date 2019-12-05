<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=banner&act=man_banner"><span>Cập nhật banner</span></a></li>
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


<form name="frm" method="post" action="index.php?com=banner&act=save_banner_giua" enctype="multipart/form-data" class="nhaplieu">

	<div class="widget">
  
    <div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
    
    	<h6>Nhập dữ liệu</h6>
	</div>



  <div class="tab_gaconit">      
        
    <div id="tabs_container">
      
        <ul id="tabs">
           
    <?php 

  foreach ($config['lang'] as $key => $value) {
      
    $active='';
    if ($key==0)
    {
      $active="active";

    } 

    echo '<li class="'.$active.'"><a href="#tab'.$value.'">'.$config["langs"][$value].'</a></li>';  

  }

  ?>
         
        </ul><!--tabs-->
  </div><!--tabs_container-->
    
    
    <div id="tabs_content_container">
      
       
       <?php foreach ($config["lang"] as $key => $value) {
        
        $active='';
        $active_block='';
        if ($key==0)
        {
          $active="active";

          $active_block="style='display:block' ";


        }

      
       ?>

        <div id="tab<?=$value?>" class="tab_content <?=$active?>" <?=$active_block?> >

         <div class="formRow">
      <label>Hình ảnh <?=$value?> hiện tại:</label>
      
            
       <div class="formRight">
                 
    <?php
   if($item_banner['banner_'.$value]!=NULL)
   {
   ?>
            
      <img src="<?= _upload_hinhanh . $item_banner['banner_'.$value] ?>" alt="" width="358">
            
   <?php 
   } 
   else 
   {
   echo "Chưa có hình ảnh"; 
   }
   ?><br /><br />
            

      </div><!--end formRight-->
            
      <div class="clear"></div>
    </div>


      <div class="formRow">
      <label>Tải hình ảnh <?=$value?>:</label>
      <div class="formRight">
        <input type="file" name="file_<?=$value?>" /> <strong>Width:358px&nbsp;-&nbsp;Height:78px&nbsp;  
        <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình đại diện cho sản phẩm (ảnh JPEG, GIF , JPG , PNG)">
      </div>
      <div class="clear"></div>
    </div>

        </div><!--tab_content-->

       <?php }?> 
       
     
    </div><!--end tabs_content_container-->
    
    
    </div><!--end tab_gaconit-->
    

	</div><!--end formRow-->

       
  <div class="formRow">
  <label>Hiển thị:</label>


  <div class="formRight">

  <input type="checkbox" name="hienthi" <?=(!isset($item_banner['hienthi']) || $item_banner['hienthi']==1)?'checked="checked"':''?> /> <br /><br />


  </div><!--end formRight-->

  <div class="clear"></div>

  </div>   <!--end formRow-->




                <div class="formRow">
                    <div class="formRight">
                        <input type="submit" value="Lưu" class="blueB" />
                        <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=banner&act=add_bnt'" class="blueB" />
                    </div>
                    <div class="clear"></div>
                </div>
	
    
    </div>
</form>   
