<script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>

<!-- Begin ImageZoom  -->

<link rel="stylesheet" type="text/css" href="css/fancybox/cloud-zoom.css" />
<link rel="stylesheet" type="text/css" href="css/fancybox/jquery.fancybox-1.3.4.css" />
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="js/fancybox/cloud-zoom.1.0.2.js"></script>

<!-- Begin ImageZoom  -->

<link rel="stylesheet" type="text/css" href="css/jsCarousel/skins/tango/skin.css" />
<script type="text/javascript" src="css/jsCarousel/lib/jquery.jcarousel.js"></script>


<script type="text/javascript">
  $(document).ready(function() {

    effect_image();
  });

  function effect_image(){
    
    /*
    fancybox init on each cloud-zoom element
     */
    $("#zoom .cloud-zoom").fancybox({
      'transitionIn'  : 'elastic',
      'transitionOut' : 'none',
      'speedIn'   : 600,
      'speedOut'    : 200,
      'overlayShow' : true,
      'overlayColor'  : '#000',
      'cyclic'    : true,
      'easingIn'    : 'easeInOutExpo'
    });

    /*
    because the cloud zoom plugin draws a mousetrap
    div on top of the image, the fancybox click needs
    to be changed. What we do here is to trigger the click
    the fancybox expects, when we click the mousetrap div.
    We know the mousetrap div is inserted after
    the <a> we want to click:
     */
    $("#zoom .mousetrap").live('click',function(){
      $(this).prev().trigger('click');
    });

    /*
    the content element;
    each list item / group with several images
     */
    var $content  = $('#zoom'),
    $thumb_list = $content.find('.thumb > ul');
    /*
    we need to set the width of each ul (sum of the children width);
    we are also defining the click events on the right and left arrows
    of each item.
     */
    $thumb_list.each(function(){
      var $this_list  = $(this),
      total_w   = 0,
      loaded    = 0,
      //preload all the images first
      $images   = $this_list.find('img'),
      total_images= $images.length;
      $images.each(function(){
        var $img  = $(this);
        $('<img/>').load(function(){
          ++loaded;
          if (loaded == total_images){
            $this_list.data('current',0).children().each(function(){
              total_w += $(this).width();
            });
            $this_list.css('width', total_w + 'px');

            //next / prev events

            $this_list.parent()
            .siblings('.next')
            .bind('click',function(e){
              var current = $this_list.data('current');
              if(current == $this_list.children().length -1) return false;
              var next  = ++current,
              ml    = -next * $this_list.children(':first').width();

              $this_list.data('current',next)
              .stop()
              .animate({
                'marginLeft'  : ml + 'px'
              },400);
              e.preventDefault();
            })
            .end()
            .siblings('.prev')
            .bind('click',function(e){
              var current = $this_list.data('current');
              if(current == 0) return false;
              var prev  = --current,
              ml    = -prev * $this_list.children(':first').width();

              $this_list.data('current',prev)
              .stop()
              .animate({
                'marginLeft'  : ml + 'px'
              },400);
              e.preventDefault();
            });
          }
        }).attr('src',$img.attr('src'));
      });
    });
    
    //$('.cloud-zoom').CloudZoom();
    
    $('ul#mycarousel li').hover(function(){
      $('ul#mycarousel li').removeClass('active');
      $(this).addClass('active'); $value_thumbs = $(this).attr('value');
      if($value_thumbs == $('.thumb ul li.active').attr('value')) return false;
      $('.thumb ul li').each(function (){
        var $value = $(this).attr('value');
        if($value_thumbs == $value){
          $('.thumb ul li.active').removeClass('active');
          $(this).addClass('active').css({opacity: 0}).animate({opacity: 1},1000);  
        }
      }); 
    });
    
    $('#mycarousel').jcarousel({
      wrap: 'circular',
      scroll: 1
    });
    
  }
  
</script>
<?php 


     
     
      $d->reset();
     $sql = "select * from #_product_list where hienthi=1 and id=".$row_detail['id_list'];
     $d->query($sql);
     $dm1 = $d->fetch_array();
     
       $d->reset();
     $sql = "select * from #_product_cat where hienthi=1 and id=".$row_detail['id_cat'];
     $d->query($sql);
     $dm2 = $d->fetch_array();

?>





<div class="title-info-detail">
        <h3 class="title-info-detail">
        
        <a href="index.html"><?=_trangchu?></a><span class="color">»</span>
        
        
        <?php if ($dm1=="") {?>   
        
        <?=$row_detail["ten_$lang"]?>
       
        <?php } ?>   
        
        
        <?php if ($dm1!="") {?>   

         <a href="<?=$dm1["tenkhongdau_$lang"]?>/"><?=$dm1["ten_$lang"]?></a><span class="color">»</span>

        
        <?php }?>
        
        
        
        <?php if ($dm2!="") {?>   
        
         <a href="<?=$dm1["tenkhongdau_$lang"]?>/<?=$dm2["tenkhongdau_$lang"]?>/"><?=$dm2["ten_$lang"]?></a>
         
      
        
        <?php }?>
        
        
      <span class="color">»</span><?=$row_detail["ten_$lang"]?></h3>
    </div><!--end title_index_detail-->

    <div class="clear"></div>

<div id="main_dm_product">

<div class="block_content_detail" >
   
    <div class="show-pro-info">
		
       
        <div class="left_sp">
        
  
  		
        
  <div class="jszoom-product">
  <div id="product-img-effect">
    <div id="zoom" class="zoom">
      <div class="item">
      <div class="thumb_wrapper">
        <div class="thumb">
        <ul>
                
                  <li class="active" value="0"><a rev="group2" rel="zoomHeight:280, zoomWidth:350, adjustX: 0, adjustY: 0, position:'body'" class='cloud-zoom' href="<?=_upload_product_l.$row_detail["photo"]?>"><img src="<?=_upload_product_l.$row_detail["photo"]?>" style="width:350px;max-height:530px;" alt="<?=$row_detail['ten_$lang']?>"/></a></li>
          <?php for($i=1,$count = count($album_hinh) ; $i<=$count; $i++){?>
          <li <?php if($i==1){echo 'class="active"';}?> value="<?=$i?>"><a rev="group2" rel="zoomHeight:280, zoomWidth:350, adjustX: 0, adjustY: 0, position:'body'" class='cloud-zoom' href="<?=_upload_product_l.$album_hinh[$i-1]["photo"]?>"><img src="<?=_upload_product_l.$album_hinh[$i-1]["photo"]?>" alt="<?=$album_hinh[$i-1]["ten_$lang"]?>" title="<?=$album_hinh[$i-1]["ten_$lang"]?>"  style="width:350px;max-height:530px;" /></a></li>
          <?php } ?>
        </ul>
        </div><!--end thumb-->
      </div><!--end thumb_wrapper-->
      </div><!--end item-->
         <div class="clear"></div> 
    </div><!--#zoom-->
     <div class="clear"></div>     
     
     
     
  <?php if (count($album_hinh)>0) {?> 
  <div id="jcarousel">
   <ul id="mycarousel" class="jcarousel-skin-tango">
      
        <li Class="active" value="0"><img src="<?=_upload_product_l.$row_detail["photo"]?>" width="75" height="50"></li>    
              
         <?php for($i=1,$count=count($album_hinh);$i<=$count;$i++){?>
        <li <?php if($i==1){echo 'class="active"';}?> value="<?=$i?>"><img src="<?=_upload_product_l.$album_hinh[$i-1]["photo"]?>" alt="<?=$album_hinh[$i-1]["ten_$lang"]?>" title="<?=$album_hinh[$i-1]["ten_$lang"]?>" width="75" height="50"></li>
    <?php } ?>
  </ul><!--end mycarousel-->
  </div><!--#jcarousel-->
    
    <?php }?>
        
</div><!--end product-img-effect-->
  
  
  </div> <!--.jszoom-product-->
        
        <div class="clear"></div>

 		</div> <!--LEFT_SP-->  
    
        
    <div class="right-pro-info">


      <div class="product-description">  
            <ul class="product_info">

  <li><b>Giá: <span style="color:#F00;"><?php if ($row_detail["gianhap"]=="") {?> <?=_lienhe?> <?php } else  {?> <?=$row_detail["gianhap"]?> <?php }?></span></b></li>
    
     
       
       <li><b><?=_ngaydang?>:</b><?=date('d-m-Y',$row_detail["ngaytao"])?></li>       

  <li class="noborder"><b><?=_luotxem?>:</b> <?=$row_detail['luotxem']?></li>


   <li class="noborder"> <?=$row_detail["mota_$lang"]?></li>
               
            </ul><!--end product_info-->
             
          </div><!--end product-description-->  
        
      


    </div><!--end right-pro-info-->
      
      
      
        
          <div class="clear"></div>


           <div style="margin:10px 0">
              <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style">
                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                <a class="addthis_button_tweet"></a>
                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52843d4e1ff0313a"></script>
                <!-- AddThis Button END -->
            </div>




           <div class="clear"></div>



           


<div id="container-tab">
<!--tag-->
<script type="text/javascript">

$(document).ready(function(){
$('#tabs div#tab-1').show();
$('#tabs div#tab-2').hide();
$('#tabs div#tab-3').hide();
$('#tabs div#tab-4').hide();
$('#tabs div#tab-5').hide();
$('#tabs div:first').show();
$('#tabs ul li:first').addClass('active');
$('#tabs ul li a').click(function(){ 
$('#tabs ul li').removeClass('active');
$(this).parent().addClass('active'); 
var currentTab = $(this).attr('href'); 
$('#tabs div#tab-1').hide();
$('#tabs div#tab-2').hide();
$('#tabs div#tab-3').hide();
$('#tabs div#tab-4').hide();
$('#tabs div#tab-5').hide();
$(currentTab).show();
return false;
});
});
</script>



<!--tag-->



<div id="tab_detail">
 

<div id="tabs">
            <ul>
            
             <li id="tab_spformat"><a href="#tab-1"><?=_thongtinchitiet?></a></li>

            
            <?php /*?><li id="tab_spformat"><a href="#tab-2">Thông tin chi tiết</a></li><?php */?>
                
                 
            </ul>
            <div class="clear"></div>
            
        
         
            <div id="tab-1">
                
                <div class="info-content">    
            
              <?=$row_detail["noidung_$lang"]?>
              
                 </div><!--end content-effect-->
		      
            </div><!--end tab-1-->
           
      
		
            
            
        
            <div id="tab-2">
             
             <div class="info-content">        
              
              <?=$row_detail["noidung_$lang"]?>
              
             </div><!--end content-effect-->
		      
            </div><!--end tab-2-->

      </div><!--end tabs-->
      

</div><!--end tab_detail-->      
      

      
</div><!--end container-->


	</div>
</div>


</div><!--end main_dm_product-->


 <div class="clear"></div>

<div class="other-pro">

<div class="title-info">
        <h3 class="title-info-bg"><?=$title_other?></h3>
</div><!--END title_info--> 



<div class="clear"></div>

<div class="product-group">
  <?php
     if(count($sanpham_khac)>0){
  $com_href="san-pham";     
     for($j=0,$count_product_sp=count($sanpham_khac);$j<$count_product_sp;$j++){
?>
  
  
    <div class="product-item" <?php if ( ($j+1)%3==0) {?> style="margin-right:0;" <?php }?>>
                     
                           
    <div class="product-image">
                              
      <a href="<?=$com_href?>/<?=$sanpham_khac[$j]["tenkhongdau_$lang"]?>-<?=$sanpham_khac[$j]["id"]?>.html" title="<?=$sanpham_khac[$j]["ten_$lang"]?>">
    <img  effect="mono" inverse="true" class="img-responsive has-tt colorup colorUpped" src="thumb/210x150/2/<?php if($sanpham_khac[$j]['photo']!=NULL) echo _upload_product_l.$sanpham_khac[$j]['photo']; else echo 'images/no-image-available.png';?>" alt="<?=$sanpham_khac[$j]["alt_$lang"]?>"  />
    </a>
        
    </div><!--end product-image-->
              
    
    <div class="product-name">

     <h3> <a href="<?=$com_href?>/<?=$sanpham_khac[$j]["tenkhongdau_$lang"]?>-<?=$sanpham_khac[$j]["id"]?>.html" title="<?=$sanpham_khac[$j]["ten_$lang"]?>"><?=catchuoi($sanpham_khac[$j]["ten_$lang"],70)?></a></h3>
     

          <div class="price"><b><?=_gia?>:</b><span><?php if($sanpham_khac[$j]["gia_vnd"]==0) echo _lienhe; else echo number_format ($sanpham_khac[$j]["gia_vnd"],0,",",".")." VNĐ";?></span> <div class="clear"></div> </div>     
       
           

        </div><!--end product-name-->
              
              
        <div class="clear"></div>
  </div> <!-- product-item -->
  

  <?php if(($j+1)%3==0){?> <div class="clear" ></div><?php }?>   
      
   <?php } }else echo '<p class="notice">'._noidungdangcapnhat.'</p>';  ?> 
          <div class="clear"></div>
       
                <div class="phantrang" ><?=$paging['paging']?></div>
               
  </div><!--end items_frame-->

</div><!--end other-pro-->






