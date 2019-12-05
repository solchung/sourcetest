<?php 
	$d->reset();
	$sql_news = "select ten_$lang,tenkhongdau_$lang,id,photo,thumb,mota_$lang from #_info where hienthi=1 and com='".$loai."gioithieu' order by stt desc ";
	$d->query($sql_news);
	$gioithieu_nb = $d->fetch_array();


?>




<div class="box_about">
<div class="container  border_gt" >
        <div class="about_index">  
			<div class="row pd0 mg0">
				
				
				<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12  ">
			
					<div class="row pd0 mg0">
								<div class="title_about ">
									<p>Welcome</p>
									<h3><?= $gioithieu_nb['ten_'.$lang] ?></h3>
								</div>
							
								<div class="text_gt ">
                                                                   
									<?=catchuoi($gioithieu_nb["mota_$lang"],1000)?>
									
                                </div>
								<div class="text_center">
								<a href="gioi-thieu"  >
                                    <p  class="icon_xemthem"><?=_xemthem?></p>
								</a>
								</div>	
						
							</div>
				
				</div>
			
				<div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 image_gt">
					<?php if($gioithieu_nb['photo']!="" ){ ?>
					<div class="">
							<a href="gioi-thieu" >
								
										<img src="thumb/605x400/2/<?= _upload_info_l . $gioithieu_nb['photo'] ?>" alt="<?= $gioithieu_nb['ten_'.$lang] ?>">
										
								
							</a>		
					
					
					</div>
					<?php }?>
					
				
				</div>	

			</div>
                  
		</div>
	
</div>

</div>
