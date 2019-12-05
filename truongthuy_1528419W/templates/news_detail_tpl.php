<?php 
		$d->reset();
		$sql_detail = "select id,photo from #_hasp where hienthi=1 and id_photo='".$tintuc_detail[0]['id']."' and com='".$com_type."' order by stt desc";
		$d->query($sql_detail);
		$hinhbst = $d->result_array();
		
?>
<div class="row pd0 mg0 ">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					<div class="title_right wow zoomInUp"><h2><?=$tintuc_detail[0]["ten_$lang"]?></h2></div>
           </div>
</div>
<div class="row pd0 mg0 ">

           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="box_content">
   <div class="content wow fadeInLeftBig">    
           <?=$tintuc_detail[0]["noidung_$lang"]?>
           <div class="clear" style="height:20px;"></div>

	 <div class="clear" style="height:20px;"></div>
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style">
			
            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
            <a class="addthis_button_tweet"></a>
            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
            <a class="addthis_counter addthis_pill_style"></a>
			<div class="zalo-share-button" data-href="<?=$http.$config_url?>/<?=$tintuc_detail[0]["tenkhongdau_$lang"]?>" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize=false></div>
            </div>
			
            <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52843d4e1ff0313a"></script>
            <!-- AddThis Button END -->
			<script src="https://sp.zalo.me/plugins/sdk.js"></script>
			  <div class="othernews wow fadeInLeftBig">
			
			   <h1><?=_cacbaikhac?></h1>
			   <ul>
			   
				<?php foreach($tintuc_khac as $tinkhac){?>
				<li><a href="<?=$tinkhac["tenkhongdau_$lang"]?>"><?=$tinkhac["ten_$lang"]?></a> </li>
				<?php }?>
					 </ul>
			  </div>			
			  


         </div>
		 </div>
           </div>
</div>

