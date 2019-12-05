<div id="main_content_web">


<div class="title-info">
        <h3 class="title-info-bg"><?=$title_tcat?></h3>
</div><!--END title_info--> 

    
    <div class="clear"></div>

    


  <?php if (!empty($product)) {?> 
		<div class="main_prouduct_dm">
  

    
   <p class="notice" style="text-align:center;"><?=$notice?></p>
	
	

 
 	'<span class="tukhoa"><?=$tukhoa?></span>' &nbsp;  <b class="chonfont"><?=$com_title?></b>
 
    
	
    <div class="product-group">
        
       
		<?php
		   if(count($product)>0){
		$com_href="san-pham";	 
		   for($j=0,$count_product=count($product);$j<$count_product;$j++){
	   ?>
       
       
       <div class="product-item" <?php if ( ($j+1)%4==0) {?> style="margin-right:0;" <?php }?>>
                     
                           
    <div class="product-image">
                              
      <a href="<?=$com_href?>/<?=$product[$j]["tenkhongdau_$lang"]?>-<?=$product[$j]["id"]?>.html" title="<?=$product[$j]["ten_$lang"]?>">
    <img  effect="mono" inverse="true" class="img-responsive has-tt colorup colorUpped" src="thumb/215x150/2/<?php if($product[$j]['photo']!=NULL) echo _upload_product_l.$product[$j]['photo']; else echo 'images/no-image-available.png';?>" alt="<?=$product[$j]["alt_$lang"]?>" />
    </a>
        
    </div><!--end product-image-->
              
  
  <div class="product-name">

     <h3> <a href="<?=$com_href?>/<?=$product[$j]["tenkhongdau_$lang"]?>-<?=$product[$j]["id"]?>.html" title="<?=$product[$j]["ten_$lang"]?>"><?=catchuoi($product[$j]["ten_$lang"],70)?></a></h3>
     
    <div class="price"><b><?=_gia?>:</b><span><?php if($product[$j]["gia_vnd"]==0) echo _lienhe; else echo number_format ($product[$j]["gia_vnd"],0,",",".")." VNĐ";?></span> <div class="clear"></div> </div>
          

        
        </div><!--end product-name-->
              
          
          
          

                <div class="clear"></div>
  </div> <!-- product-item -->
       
       <?php if(($j+1)%4==0){?> <div class="clear" ></div><?php }?>		
        
        <?php } }else echo '<p class="notice">'._noidungdangcapnhat.'</p>';  ?>    
        <div class="clear"></div>                                 
        <div class="phantrang" ><?=$paging['paging']?></div>
        <div class="clear"></div>

    </div><!--end show-pro-->	
	


</div><!--end product-group-->

<?php }?>

</div><!--end main_content_web-->