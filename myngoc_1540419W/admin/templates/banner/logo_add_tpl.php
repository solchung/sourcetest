<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=banner&act=capnhat&typechild=<?=$_GET['typechild']?>"><span>Cập nhật <?=$name_cap?></span></a></li>
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


<form name="frm" method="post" action="index.php?com=banner&act=save&typechild=<?=$_GET['typechild']?>" enctype="multipart/form-data" class="nhaplieu">

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
      <label><?=$name_cap?> <?=$value?> hiện tại:</label>
      
            
       <div class="formRight">
                 
    <?php
   if($item['banner_'.$value]!=NULL)
   {
   ?>
            
 <img src="<?= _upload_hinhanh . $item['banner_'.$value]?>" alt="" width="300" >
            
   <?php 
   } 
   else 
   {
   echo "Chưa có hình"; 
   }
   ?><br /><br />
            

      </div><!--end formRight-->
            
      <div class="clear"></div>
    </div>


      <div class="formRow">
      <label>Tải <?=$name_cap?> <?=$value?>:</label>
      <div class="formRight">
        <input type="file" name="file_<?=$value?>" /> <strong><?=$kichthuoc_image?> 
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
       
       <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
       
      
       </div><!--end formRight-->
       
       <div class="clear"></div>
       
    </div>   <!--end formRow-->
    
    

    
    <div class="formRow">
			<div class="formRight">
              <input type="submit" value="Lưu" class="blueB" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=banner&act=capnhat&typechild=<?=$_GET['typechild']?>'" class="blueB" />
			</div>
			<div class="clear"></div>
		</div>
	
    
    </div>
</form>   