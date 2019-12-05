<?php 
	$d->reset();
	$sql = "select ten_$lang,tenkhongdau_$lang,id,mota_$lang,photo,noibat from #_product_list where hienthi=1 and com='product' and noibat>0 order by stt asc";
	$d->query($sql);
	$list_menu_nb = $d->result_array();

?>


<?php for($i=0;$i<count($list_menu_nb);$i++){ ?>
<div class="box_spnb sp_index <?php if(($i+1)%2!=0) echo'bk_x' ?>">
    <div class="container">
    
        <div class="content-container news-content">
  
			<div class="row pd0 mg0 ">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd0">
					<div class="title_right wow zoomInUp"  >
						<a href="<?=$list_menu_nb[$i]["tenkhongdau_$lang"]?>" ><h2 ><?=$list_menu_nb[$i]["ten_$lang"]?></h2>
						<p><?=$row_setting["silogan_$lang"]?></p>
						</a>
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

<?php }?>

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
