<?php 
		$d->reset();
		$sql_detail = "select id,photo from #_hasp where hienthi=1 and id_photo='".$tintuc_detail[0]['id']."' and com='".$com_type."' order by stt desc";
		$d->query($sql_detail);
		$hinhbst = $d->result_array();
		
?>


<div class="row pd0 mg0 ">
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
	<br>
	<ul class="list_rp_nb">
           
		<?php foreach($tintuc_gt as $tinkhac){?>
		<li><a href="<?=$tinkhac["tenkhongdau_$lang"]?>"><?=$tinkhac["ten_$lang"]?></a> </li>
		<?php }?>
	</ul>
</div>

<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 ">
<div class="row pd0 mg0 ">

           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="title_right wow zoomInUp"><h2><?=$tintuc_detail[0]["ten_$lang"]?></h2></div>
           </div>
</div>
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
            </div>
            <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52843d4e1ff0313a"></script>
            <!-- AddThis Button END -->
    
         </div>
		 </div>
           </div>
</div>

