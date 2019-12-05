<?php 
	$d->reset();
	$sql = "select ten_$lang,tenkhongdau_$lang,id,mota_$lang,photo,noibat from #_product_list where hienthi=1 and com='product' and noibat>0 order by stt asc";
	$d->query($sql);
	$list_menu_nb = $d->result_array();

?>

<?php 
	$d->reset();
	$sql = "select photo,link, ten_$lang , mota_$lang  from #_image_url where hienthi=1 and com='quangcao' order by stt,id desc ";
	$d->query($sql);
	$quangcao1 = $d->result_array();
?>
<?php for($i=0;$i<count($list_menu_nb);$i++){ ?>
<div class="sp_index">
    <div class="container">
    
        <div class="content-container news-content">
  
			<div class="row pd0 mg0 ">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
					<div class="title_right wow zoomInUp"  >
						<a href="<?=$list_menu_nb[$i]["tenkhongdau_$lang"]?>" ><h2 ><?=$list_menu_nb[$i]["ten_$lang"]?></h2></a>
					</div>
			
					<div class="wrap-tabs ">
					<div class="text_center">
					<ul class="bt_mc list_mc clearfix">
					
						<?php 
							$d->reset();
							$sql = "select ten_$lang,tenkhongdau_$lang,id,photo,mota_$lang from #_product_cat where hienthi=1 and com='product' and id_list='".$list_menu_nb[$i]["id"]."' and noibat>0 order by stt asc";
							$d->query($sql);
							$cat_product_nb = $d->result_array();
							for($j=0;$j<count($cat_product_nb);$j++){
						?>
						<li class="">
						<a data-id="<?=$list_menu_nb[$i]["id"]?>" data-loai="<?=$cat_product_nb[$j]["id"]?>" data-stt="<?=$i?>" >
							<img src="thumb/77x77/2/<?= _upload_product_cat_l . $cat_product_nb[$j]['photo'] ?>" alt="<?= $cat_product_nb[$j]['ten_'.$lang] ?>" />
						</a>
						<p><?= $cat_product_nb[$j]['ten_'.$lang] ?></p>
						</li>
						<?php }?>
					</ul>
					</div>
					<div class="title_bar_index">
						<div class="left_bar" ><img src="images/download.png">
							<ul class="bt_mc item_ul">
								
								<?php 
								
									for($j=0;$j<count($cat_product_nb);$j++){
								?>
								<li class=""><a data-id="<?=$list_menu_nb[$i]["id"]?>" data-loai="<?=$cat_product_nb[$j]["id"]?>" data-stt="<?=$i?>" ><?=$cat_product_nb[$j]["ten_$lang"]?></a></li>
								<?php }?>					
							</ul>
						</div>
					</div>
					
					</div>
			
				</div>
			</div>
			<div class="content-container news-content">			
				<div class="hidden_tab"  id="load_spnb_<?=$i?>" rel="<?=$list_menu_nb[$i]["id"]?>" data_temp="<?=$cat_product_nb[0]["id"]?>" title="Danh sách sản phẩm">
					
					  <script>
						  $().ready(function(){
							loadData_sp(1,"#load_spnb_<?=$i?>");
						  });
					  </script>
				</div>
		
		
			</div>
        </div> 
    </div>   
</div>

<?php if($i==0){ ?>
<div class="run_qct run_none">
		<?php for($j=0;$j<count($quangcao1);$j++){ ?>
			<a href="<?= $quangcao1[$j]["link"] ?>">
				<img src="thumb/1366x360/1/<?=_upload_hinhanh_l.$quangcao1[$j]["photo"]?>" title="<?= $quangcao1[$j]["ten"] ?>" />
			</a>
		<?php }?>	
</div>
<?php }?>
<?php }?>
<script type="text/javascript">
		jQuery(document).ready(function ($) {
				$('.run_qct').slick({
					dots: false,
					infinite: true,
					speed: 1000,
					slidesToShow: 1,
					slidesToScroll: 1,			   
					autoplay: true, arrows: false, 
					cssEase: 'fade'			
				});
			});	
     

</script>
<script>

	
	jQuery(document).ready(function ($) {

			
		$(".bt_mc li").click(function () {        
			$(".list_mc li").removeClass("active_list_mc");
			$(".item_ul li").removeClass("active_list_mc");
			$(this).addClass("active_list_mc");
			var id = $('> a', this).data("id");
			var loai = $('> a', this).data("loai");
			var stt = $('> a', this).data("stt");
			loadData_sp(1,"#load_spnb_"+stt,loai);	
			return false;
		});
		
		
	});	
 
		function loadData_sp(page,id_tab,loai)
	{
			$.ajax
			({
			url: "ajax_paging/ajax_paging_banchay.php",
			type: "POST",
			data: {page:page,dieukien:$(id_tab).attr("rel"),loai:loai},
			success: function(msg)
			{
			$(id_tab).html(msg);
			$(id_tab+" .pagination li.active").click(function(){
			var pager = $(this).attr("p");
			var id_tabr = $(this).parents('.hidden_tab').attr("id");
			var id_danhmucr = $(this).parents('.hidden_tab').attr("title");
				loadData_sp(pager,"#"+id_tabr,loai);
			});
			}
			});
	}

</script>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('.left_bar').click(function(){
			$('> ul', this).slideToggle( "fast" );
		})
	});
</script>